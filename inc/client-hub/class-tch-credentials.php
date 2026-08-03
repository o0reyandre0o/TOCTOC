<?php
/**
 * Encrypted storage for the OAuth tokens later phases will hold.
 *
 * Nothing writes to this yet — it ships in phase 0 so that when the Google and
 * LinkedIn tokens arrive there is already one obvious place for them, instead of
 * someone reaching for a plain option row under deadline.
 *
 * Threat model: a database dump (backup on a shared host, SQL injection in an
 * unrelated plugin) must not hand over live access to clients' Google Business
 * Profiles. So refresh tokens are encrypted at rest with a key that lives in
 * wp-config.php, i.e. on the filesystem and outside the database.
 *
 * Client ID / Client Secret are NOT stored here at all — they are read straight
 * from wp-config constants, so they never touch the database or a git repo:
 *
 *   define( 'TCH_GOOGLE_CLIENT_ID',     '…apps.googleusercontent.com' );
 *   define( 'TCH_GOOGLE_CLIENT_SECRET', '…' );
 *   define( 'TCH_ENCRYPTION_KEY',       '…64 random hex chars…' );
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class TCH_Credentials {

	const OPTION_PREFIX = 'tch_cred_';

	/**
	 * Encryption key, preferring an explicit constant.
	 *
	 * The AUTH_KEY fallback keeps the plugin working out of the box, but it ties
	 * stored tokens to the site salts: rotating salts (which you should be able to
	 * do freely, e.g. after a compromise) would silently make every token
	 * undecryptable. Define TCH_ENCRYPTION_KEY to decouple the two.
	 */
	private static function key() {
		if ( defined( 'TCH_ENCRYPTION_KEY' ) && '' !== TCH_ENCRYPTION_KEY ) {
			$material = TCH_ENCRYPTION_KEY;
		} elseif ( defined( 'AUTH_KEY' ) ) {
			$material = AUTH_KEY . ( defined( 'SECURE_AUTH_SALT' ) ? SECURE_AUTH_SALT : '' );
		} else {
			return null;
		}
		// 32 raw bytes, the length both sodium and AES-256 want.
		return hash( 'sha256', 'tch|' . $material, true );
	}

	public static function is_available() {
		return null !== self::key()
			&& ( function_exists( 'sodium_crypto_secretbox' ) || function_exists( 'openssl_encrypt' ) );
	}

	public static function encrypt( $plaintext ) {
		$key = self::key();
		if ( null === $key || '' === $plaintext ) {
			return null;
		}

		if ( function_exists( 'sodium_crypto_secretbox' ) ) {
			$nonce  = random_bytes( SODIUM_CRYPTO_SECRETBOX_NONCEBYTES );
			$cipher = sodium_crypto_secretbox( $plaintext, $nonce, $key );
			return 'v1s:' . base64_encode( $nonce . $cipher );
		}

		if ( function_exists( 'openssl_encrypt' ) ) {
			$iv     = random_bytes( 16 );
			$cipher = openssl_encrypt( $plaintext, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv );
			if ( false === $cipher ) {
				return null;
			}
			// Authenticate the ciphertext: CBC on its own is malleable.
			$mac = hash_hmac( 'sha256', $iv . $cipher, $key, true );
			return 'v1o:' . base64_encode( $iv . $mac . $cipher );
		}

		return null;
	}

	public static function decrypt( $payload ) {
		$key = self::key();
		if ( null === $key || ! is_string( $payload ) || strlen( $payload ) < 5 ) {
			return null;
		}
		$prefix = substr( $payload, 0, 4 );
		$blob   = base64_decode( substr( $payload, 4 ), true );
		if ( false === $blob ) {
			return null;
		}

		if ( 'v1s:' === $prefix && function_exists( 'sodium_crypto_secretbox_open' ) ) {
			$nonce_len = SODIUM_CRYPTO_SECRETBOX_NONCEBYTES;
			if ( strlen( $blob ) <= $nonce_len ) {
				return null;
			}
			$plain = sodium_crypto_secretbox_open(
				substr( $blob, $nonce_len ),
				substr( $blob, 0, $nonce_len ),
				$key
			);
			return false === $plain ? null : $plain;
		}

		if ( 'v1o:' === $prefix && function_exists( 'openssl_decrypt' ) ) {
			if ( strlen( $blob ) <= 48 ) {
				return null;
			}
			$iv     = substr( $blob, 0, 16 );
			$mac    = substr( $blob, 16, 32 );
			$cipher = substr( $blob, 48 );
			if ( ! hash_equals( hash_hmac( 'sha256', $iv . $cipher, $key, true ), $mac ) ) {
				return null; // tampered or wrong key
			}
			$plain = openssl_decrypt( $cipher, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv );
			return false === $plain ? null : $plain;
		}

		return null;
	}

	/** Store a secret for a platform, optionally scoped to one client. */
	public static function set( $platform, $name, $value, $client_id = 0 ) {
		$encrypted = self::encrypt( (string) $value );
		if ( null === $encrypted ) {
			return false;
		}
		return update_option( self::option_name( $platform, $name, $client_id ), $encrypted, false );
	}

	public static function get( $platform, $name, $client_id = 0 ) {
		$stored = get_option( self::option_name( $platform, $name, $client_id ), '' );
		return '' === $stored ? null : self::decrypt( $stored );
	}

	public static function delete( $platform, $name, $client_id = 0 ) {
		return delete_option( self::option_name( $platform, $name, $client_id ) );
	}

	private static function option_name( $platform, $name, $client_id = 0 ) {
		return self::OPTION_PREFIX . sanitize_key( $platform ) . '_' . sanitize_key( $name )
			. ( $client_id ? '_' . (int) $client_id : '' );
	}

	/** Which wp-config constants are present — surfaced on the status board. */
	public static function config_status() {
		return array(
			'TCH_GOOGLE_CLIENT_ID'     => defined( 'TCH_GOOGLE_CLIENT_ID' ) && TCH_GOOGLE_CLIENT_ID,
			'TCH_GOOGLE_CLIENT_SECRET' => defined( 'TCH_GOOGLE_CLIENT_SECRET' ) && TCH_GOOGLE_CLIENT_SECRET,
			'TCH_ENCRYPTION_KEY'       => defined( 'TCH_ENCRYPTION_KEY' ) && TCH_ENCRYPTION_KEY,
		);
	}
}
