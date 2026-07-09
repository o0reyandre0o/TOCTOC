<?php
/**
 * TocToc — Free SEO / GEO / AEO Checker (public lead magnet).
 *
 * Two AJAX endpoints:
 *   toctoc_seo_check  → fast on-page SEO + GEO/AEO audit (also captures the lead)
 *   toctoc_seo_psi    → Google PageSpeed Insights (slower, called separately)
 *
 * PageSpeed needs a free Google API key. Add it to wp-config.php:
 *   define( 'TOCTOC_PSI_KEY', 'your-key-here' );
 * or save it in an option named 'toctoc_psi_key'.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'wp_ajax_toctoc_seo_check', 'toctoc_seo_check_handler' );
add_action( 'wp_ajax_nopriv_toctoc_seo_check', 'toctoc_seo_check_handler' );
add_action( 'wp_ajax_toctoc_seo_psi', 'toctoc_seo_psi_handler' );
add_action( 'wp_ajax_nopriv_toctoc_seo_psi', 'toctoc_seo_psi_handler' );

/**
 * Admin settings page: WordPress → Settings → SEO Checker.
 * Paste the PageSpeed API key here (no need to edit wp-config.php).
 */
add_action( 'admin_menu', function () {
	add_options_page( 'SEO Checker', 'SEO Checker', 'manage_options', 'toctoc-seo-checker', 'toctoc_seo_settings_page' );
} );
add_action( 'admin_init', function () {
	register_setting( 'toctoc_seo_settings', 'toctoc_psi_key', array( 'sanitize_callback' => 'sanitize_text_field' ) );
	register_setting( 'toctoc_seo_settings', 'toctoc_ts_site', array( 'sanitize_callback' => 'sanitize_text_field' ) );
	register_setting( 'toctoc_seo_settings', 'toctoc_ts_secret', array( 'sanitize_callback' => 'sanitize_text_field' ) );
} );
function toctoc_seo_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	$leads = get_option( 'toctoc_seo_leads', array() );
	?>
	<div class="wrap">
		<h1>SEO / GEO Checker</h1>
		<form method="post" action="options.php">
			<?php settings_fields( 'toctoc_seo_settings' ); ?>
			<table class="form-table" role="presentation">
				<tr>
					<th scope="row"><label for="toctoc_psi_key">Google PageSpeed API key</label></th>
					<td>
						<input type="text" id="toctoc_psi_key" name="toctoc_psi_key" value="<?php echo esc_attr( get_option( 'toctoc_psi_key', '' ) ); ?>" class="regular-text" style="width:440px;" placeholder="AIza..." />
						<p class="description">Paste your free PageSpeed Insights API key here. <a href="https://developers.google.com/speed/docs/insights/v5/get-started" target="_blank" rel="noopener">How to get one &rarr;</a></p>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="toctoc_ts_site">Cloudflare Turnstile — Site key</label></th>
					<td>
						<input type="text" id="toctoc_ts_site" name="toctoc_ts_site" value="<?php echo esc_attr( get_option( 'toctoc_ts_site', '' ) ); ?>" class="regular-text" style="width:440px;" placeholder="0x4AAA..." />
						<p class="description">Optional anti-spam. Leave both Turnstile fields empty to disable. <a href="https://dash.cloudflare.com/?to=/:account/turnstile" target="_blank" rel="noopener">Get free keys &rarr;</a></p>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="toctoc_ts_secret">Cloudflare Turnstile — Secret key</label></th>
					<td>
						<input type="text" id="toctoc_ts_secret" name="toctoc_ts_secret" value="<?php echo esc_attr( get_option( 'toctoc_ts_secret', '' ) ); ?>" class="regular-text" style="width:440px;" placeholder="0x4AAA..." />
					</td>
				</tr>
			</table>
			<?php submit_button(); ?>
		</form>

		<?php if ( is_array( $leads ) && $leads ) : ?>
		<hr>
		<h2>Recent leads (<?php echo count( $leads ); ?>)</h2>
		<table class="widefat striped" style="max-width:900px;">
			<thead><tr><th>When</th><th>Name</th><th>Email</th><th>URL analysed</th></tr></thead>
			<tbody>
			<?php foreach ( array_slice( $leads, 0, 30 ) as $l ) : ?>
				<tr>
					<td><?php echo esc_html( $l['time'] ); ?></td>
					<td><?php echo esc_html( $l['name'] ); ?></td>
					<td><?php echo esc_html( $l['email'] ); ?></td>
					<td><?php echo esc_html( $l['url'] ); ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		<?php endif; ?>
	</div>
	<?php
}

/**
 * Normalise + validate a user URL and block SSRF to private/reserved hosts.
 * Returns the safe URL string, or false.
 */
function toctoc_seo_safe_url( $url ) {
	$url = trim( (string) $url );
	if ( '' === $url ) {
		return false;
	}
	if ( ! preg_match( '#^https?://#i', $url ) ) {
		$url = 'https://' . $url;
	}
	$parts = wp_parse_url( $url );
	if ( empty( $parts['host'] ) || empty( $parts['scheme'] ) ) {
		return false;
	}
	if ( ! in_array( strtolower( $parts['scheme'] ), array( 'http', 'https' ), true ) ) {
		return false;
	}
	$host = strtolower( $parts['host'] );
	if ( in_array( $host, array( 'localhost', '127.0.0.1', '::1' ), true ) ) {
		return false;
	}
	// Reject explicit ports other than 80/443.
	if ( ! empty( $parts['port'] ) && ! in_array( (int) $parts['port'], array( 80, 443 ), true ) ) {
		return false;
	}
	// Resolve to IPv4 and block private / reserved ranges (basic SSRF guard).
	$ip = gethostbyname( $host );
	if ( filter_var( $ip, FILTER_VALIDATE_IP ) ) {
		if ( ! filter_var( $ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE ) ) {
			return false;
		}
	}
	return $url;
}

/**
 * Simple per-IP hourly rate limit. Returns true when the caller is over the limit.
 */
function toctoc_seo_rate_limited( $bucket = 'check', $max = 15 ) {
	$ip  = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : 'unknown';
	$key = 'ttseo_' . $bucket . '_' . md5( $ip );
	$n   = (int) get_transient( $key );
	if ( $n >= $max ) {
		return true;
	}
	set_transient( $key, $n + 1, HOUR_IN_SECONDS );
	return false;
}

/** Verify the Cloudflare Turnstile token. Returns true when disabled or valid. */
function toctoc_seo_turnstile_ok() {
	$secret = get_option( 'toctoc_ts_secret', '' );
	if ( empty( $secret ) ) {
		return true; // Anti-spam not configured.
	}
	$token = isset( $_POST['ts_token'] ) ? sanitize_text_field( wp_unslash( $_POST['ts_token'] ) ) : '';
	if ( empty( $token ) ) {
		return false;
	}
	$resp = wp_remote_post(
		'https://challenges.cloudflare.com/turnstile/v0/siteverify',
		array(
			'timeout' => 10,
			'body'    => array(
				'secret'   => $secret,
				'response' => $token,
				'remoteip' => isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '',
			),
		)
	);
	if ( is_wp_error( $resp ) ) {
		return false;
	}
	$data = json_decode( (string) wp_remote_retrieve_body( $resp ), true );
	return ! empty( $data['success'] );
}

/** Build a single check row. */
function toctoc_seo_row( $label, $status, $detail, $why = '' ) {
	return array(
		'label'  => $label,
		'status' => $status, // pass | warn | fail | info
		'detail' => $detail,
		'why'    => $why,
	);
}

/** Read a <meta name="..."> or <meta property="..."> content value. */
function toctoc_seo_meta( DOMXPath $xp, $key, $attr = 'name' ) {
	$nodes = $xp->query( '//meta[@' . $attr . '="' . $key . '"]/@content' );
	if ( $nodes && $nodes->length ) {
		return trim( $nodes->item( 0 )->nodeValue );
	}
	return '';
}

/** Fetch a helper resource (robots.txt, sitemap, llms.txt) with a short timeout. */
function toctoc_seo_fetch( $url, $timeout = 8 ) {
	$r = wp_remote_get(
		$url,
		array(
			'timeout'     => $timeout,
			'redirection' => 2,
			'user-agent'  => 'TocTocSEOChecker/1.0 (+https://toctoc.ky)',
		)
	);
	if ( is_wp_error( $r ) ) {
		return array( 'code' => 0, 'body' => '' );
	}
	return array(
		'code' => (int) wp_remote_retrieve_response_code( $r ),
		'body' => (string) wp_remote_retrieve_body( $r ),
	);
}

/** Plain-language "what to do" for each check (for a non-technical reader). */
function toctoc_seo_tips() {
	return array(
		'Title tag'                  => "Add a clear page title — it's the blue headline people see in Google. Keep it short and descriptive.",
		'Meta description'           => "Write a 1-2 sentence summary of the page. It's the little text under your title in Google and helps people decide to click.",
		'H1 heading'                 => "Give the page one main heading that clearly says what it's about.",
		'Subheadings (H2)'           => "Break the content into sections with subheadings — easier to read for people and for Google.",
		'Canonical tag'              => "Add a canonical link so Google doesn't get confused if the page has more than one web address.",
		'Indexable'                  => "This page is currently hidden from Google. Turn that off so it can show up in search results.",
		'Mobile viewport'            => "Make the page work well on phones — right now it's missing the mobile setting.",
		'Social / Open Graph'        => "Add a preview image and title so the page looks good when shared on WhatsApp, Facebook or LinkedIn.",
		'Image alt text'             => "Add short descriptions to your images. It helps Google understand them and helps blind visitors.",
		'Language attribute'         => "Tell browsers and Google what language the page is written in.",
		'HTTPS'                      => "Get an SSL certificate so your site shows the padlock and loads securely. Visitors and Google trust it more.",
		'Content depth'              => "Add more helpful text to the page. Very short pages are hard to rank and don't answer people's questions.",
		'Structured data (JSON-LD)'  => "Add 'schema' — hidden code that tells Google and AI what your business is. It unlocks rich results and AI recommendations.",
		'FAQ / Q&A schema'           => "Add a FAQ section (with schema). It's one of the best ways to get quoted by ChatGPT and Google's AI answers.",
		'AI crawler access'          => "Your site is blocking AI bots like ChatGPT's. Let them in so your business can show up when people ask AI.",
		'XML sitemap'                => "Add a sitemap — a map of all your pages — so search engines find everything.",
		'llms.txt'                   => "Optional: add an 'llms.txt' file to guide AI models around your site. Nice-to-have, not urgent.",
		'Semantic HTML'              => "Use proper page structure so AI and screen readers read your content in the right order.",
	);
}

/** Build the audit report as an HTML email body (plain-English summary first, then technical). */
function toctoc_seo_report_html( $result, $lead = array() ) {
	$tips   = toctoc_seo_tips();
	$icons  = array( 'pass' => '&#9989;', 'warn' => '&#9888;&#65039;', 'fail' => '&#10060;', 'info' => '&#8505;&#65039;' );
	$render = function ( $items ) use ( $icons ) {
		$out = '';
		foreach ( $items as $r ) {
			$ic   = isset( $icons[ $r['status'] ] ) ? $icons[ $r['status'] ] : '&#8226;';
			$out .= '<tr>'
				. '<td style="padding:7px 8px;vertical-align:top;font-size:16px;">' . $ic . '</td>'
				. '<td style="padding:7px 8px;border-bottom:1px solid #eee;">'
				. '<strong style="color:#111;">' . esc_html( $r['label'] ) . '</strong><br>'
				. '<span style="color:#666;font-size:13px;">' . esc_html( $r['detail'] ) . '</span>'
				. '</td></tr>';
		}
		return $out;
	};

	$seo_score = isset( $result['scores']['seo'] ) ? (int) $result['scores']['seo'] : 0;
	$geo_score = isset( $result['scores']['geo'] ) ? (int) $result['scores']['geo'] : 0;
	$avg       = (int) round( ( $seo_score + $geo_score ) / 2 );

	if ( $avg >= 80 ) {
		$verdict = "Great news — your website is in good shape. Just a few small tweaks and you're set.";
	} elseif ( $avg >= 50 ) {
		$verdict = "Your website is doing okay, but there are some important things to improve so more people — and AI — can find it.";
	} else {
		$verdict = "Your website needs some work — but don't worry, everything is fixable. Here is exactly what to do, in plain language.";
	}

	$all    = array_merge( $result['seo'], $result['geo'] );
	$issues = array();
	$good   = array();
	foreach ( $all as $r ) {
		if ( 'fail' === $r['status'] || 'warn' === $r['status'] ) {
			$issues[] = $r;
		} elseif ( 'pass' === $r['status'] ) {
			$good[] = $r['label'];
		}
	}
	// Failures first.
	usort( $issues, function ( $a, $b ) {
		$rank = array( 'fail' => 0, 'warn' => 1 );
		return $rank[ $a['status'] ] - $rank[ $b['status'] ];
	} );

	$h  = '<div style="font-family:Arial,Helvetica,sans-serif;max-width:640px;color:#222;">';
	if ( ! empty( $lead ) ) {
		$h .= '<p style="background:#f4f4f5;padding:12px 16px;border-radius:8px;"><strong>New lead:</strong> ' . esc_html( $lead['name'] ) . ' &middot; ' . esc_html( $lead['email'] ) . '</p>';
	}

	// ---- Plain English ----
	$h .= '<h2 style="margin:16px 0 6px;">Your report in plain English</h2>';
	$h .= '<p style="margin:0 0 12px;"><a href="' . esc_url( $result['url'] ) . '">' . esc_html( $result['url'] ) . '</a></p>';
	$h .= '<p style="font-size:16px;color:#333;line-height:1.5;">' . esc_html( $verdict ) . '</p>';
	$h .= '<p style="font-size:16px;"><strong>SEO:</strong> ' . $seo_score . '/100 &nbsp;|&nbsp; <strong>GEO / AEO:</strong> ' . $geo_score . '/100</p>';

	if ( $issues ) {
		$h .= '<h3 style="margin:20px 0 8px;">What to improve (' . count( $issues ) . ')</h3><ul style="padding-left:0;list-style:none;">';
		foreach ( $issues as $r ) {
			$dot = ( 'fail' === $r['status'] ) ? '&#128308;' : '&#128993;'; // red / yellow circle
			$tip = isset( $tips[ $r['label'] ] ) ? $tips[ $r['label'] ] : ( isset( $r['why'] ) ? $r['why'] : $r['label'] );
			$h  .= '<li style="margin-bottom:10px;color:#333;line-height:1.5;">' . $dot . ' ' . esc_html( $tip ) . '</li>';
		}
		$h .= '</ul>';
	} else {
		$h .= '<p style="color:#16a34a;">Nothing major to fix — nicely done!</p>';
	}
	if ( $good ) {
		$h .= '<p style="color:#16a34a;font-size:13px;">&#10003; Already good: ' . esc_html( implode( ', ', $good ) ) . '.</p>';
	}

	// ---- Technical ----
	$h .= '<hr style="margin:28px 0;border:none;border-top:1px solid #eee;">';
	$h .= '<h2 style="margin:0 0 6px;">The technical details</h2>';
	$h .= '<h3 style="margin:22px 0 6px;">On-page SEO</h3><table style="border-collapse:collapse;width:100%;">' . $render( $result['seo'] ) . '</table>';
	$h .= '<h3 style="margin:22px 0 6px;">GEO / AEO / AI visibility</h3><table style="border-collapse:collapse;width:100%;">' . $render( $result['geo'] ) . '</table>';
	$h .= '<p style="color:#999;font-size:12px;margin-top:24px;">Speed / Core Web Vitals are shown live in the tool. Generated by the TocToc SEO Checker.</p>';
	$h .= '</div>';
	return $h;
}

/** Email the full report to the team and to the lead, then log the lead. */
function toctoc_seo_send_report( $name, $email, $url, $result ) {
	$headers = array( 'Content-Type: text/html; charset=UTF-8' );
	$host    = wp_parse_url( $url, PHP_URL_HOST );

	// Team copy (with lead details + full report).
	$team = apply_filters( 'toctoc_seo_lead_email', array( 'info@toctoc.ky', 'daniel@toctoc.ky', 'web@toctoc.ky' ) );
	wp_mail(
		$team,
		'SEO Checker: ' . $host . ' — lead ' . $email,
		toctoc_seo_report_html( $result, array( 'name' => $name, 'email' => $email ) ),
		$headers
	);

	// Lead copy (their own report — the form promises it).
	if ( is_email( $email ) ) {
		$intro = '<p style="font-family:Arial,sans-serif;">Hi ' . esc_html( $name ? $name : 'there' ) . ', here is your free SEO &amp; GEO report from TocToc Marketing.</p>';
		wp_mail( $email, 'Your SEO report for ' . $host, $intro . toctoc_seo_report_html( $result ), $headers );
	}

	// Running lead log (last 200) — visible in Settings → SEO Checker.
	$log = get_option( 'toctoc_seo_leads', array() );
	if ( ! is_array( $log ) ) {
		$log = array();
	}
	array_unshift( $log, array( 'name' => $name, 'email' => $email, 'url' => $url, 'time' => current_time( 'mysql' ) ) );
	update_option( 'toctoc_seo_leads', array_slice( $log, 0, 200 ), false );
}

/**
 * Main handler: on-page SEO + GEO/AEO audit.
 */
function toctoc_seo_check_handler() {
	check_ajax_referer( 'toctoc_seo', 'nonce' );

	if ( ! toctoc_seo_turnstile_ok() ) {
		wp_send_json_error( array( 'message' => 'Anti-spam verification failed. Please refresh and try again.' ) );
	}

	if ( toctoc_seo_rate_limited( 'check', 15 ) ) {
		wp_send_json_error( array( 'message' => 'You have reached the hourly limit. Please try again later.' ), 429 );
	}

	$raw_url = isset( $_POST['url'] ) ? wp_unslash( $_POST['url'] ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';

	if ( ! is_email( $email ) ) {
		wp_send_json_error( array( 'message' => 'Please enter a valid email address.' ) );
	}

	$url = toctoc_seo_safe_url( $raw_url );
	if ( ! $url ) {
		wp_send_json_error( array( 'message' => 'Please enter a valid, public website URL.' ) );
	}

	$resp = wp_remote_get(
		$url,
		array(
			'timeout'     => 20,
			'redirection' => 3,
			'user-agent'  => 'TocTocSEOChecker/1.0 (+https://toctoc.ky)',
			'headers'     => array( 'Accept' => 'text/html,application/xhtml+xml' ),
		)
	);

	if ( is_wp_error( $resp ) ) {
		wp_send_json_error( array( 'message' => 'Could not reach that URL: ' . $resp->get_error_message() ) );
	}

	$status = (int) wp_remote_retrieve_response_code( $resp );
	$html   = (string) wp_remote_retrieve_body( $resp );

	if ( $status >= 400 || '' === $html ) {
		wp_send_json_error( array( 'message' => 'The URL returned HTTP status ' . $status . ' or no HTML.' ) );
	}

	$result = toctoc_seo_analyze( $url, $html );

	// Email the full report to the team + the lead, and log the lead.
	toctoc_seo_send_report( $name, $email, $url, $result );

	wp_send_json_success( $result );
}

/**
 * Analyse the fetched HTML and return the structured report.
 */
function toctoc_seo_analyze( $url, $html ) {
	$parts  = wp_parse_url( $url );
	$origin = $parts['scheme'] . '://' . $parts['host'];

	libxml_use_internal_errors( true );
	$doc = new DOMDocument();
	$doc->loadHTML( '<?xml encoding="utf-8" ?>' . $html );
	libxml_clear_errors();
	$xp = new DOMXPath( $doc );

	$seo  = array();
	$geo  = array();
	$meta = array();

	// ---------- SEO ----------
	$titles = $doc->getElementsByTagName( 'title' );
	$title  = $titles->length ? trim( $titles->item( 0 )->textContent ) : '';
	$meta['title'] = $title;
	$tlen = function_exists( 'mb_strlen' ) ? mb_strlen( $title ) : strlen( $title );
	$seo[] = toctoc_seo_row(
		'Title tag',
		'' === $title ? 'fail' : ( ( $tlen >= 30 && $tlen <= 65 ) ? 'pass' : 'warn' ),
		'' === $title ? 'Missing' : $tlen . ' characters',
		'Aim for a unique, descriptive title of ~30–65 characters.'
	);

	$desc = toctoc_seo_meta( $xp, 'description' );
	$meta['description'] = $desc;
	$dlen = function_exists( 'mb_strlen' ) ? mb_strlen( $desc ) : strlen( $desc );
	$seo[] = toctoc_seo_row(
		'Meta description',
		'' === $desc ? 'fail' : ( ( $dlen >= 70 && $dlen <= 165 ) ? 'pass' : 'warn' ),
		'' === $desc ? 'Missing' : $dlen . ' characters',
		'A compelling meta description of ~120–160 characters improves click-through rate.'
	);

	$h1 = $doc->getElementsByTagName( 'h1' );
	$seo[] = toctoc_seo_row(
		'H1 heading',
		1 === $h1->length ? 'pass' : ( 0 === $h1->length ? 'fail' : 'warn' ),
		$h1->length . ' found',
		'Each page should have exactly one clear H1.'
	);

	$h2 = $doc->getElementsByTagName( 'h2' );
	$seo[] = toctoc_seo_row(
		'Subheadings (H2)',
		$h2->length > 0 ? 'pass' : 'warn',
		$h2->length . ' found',
		'H2/H3 structure helps both readers and search engines understand the page.'
	);

	$canon = $xp->query( '//link[@rel="canonical"]/@href' );
	$seo[] = toctoc_seo_row(
		'Canonical tag',
		( $canon && $canon->length ) ? 'pass' : 'warn',
		( $canon && $canon->length ) ? trim( $canon->item( 0 )->nodeValue ) : 'Missing',
		'A canonical URL prevents duplicate-content issues.'
	);

	$robots     = strtolower( toctoc_seo_meta( $xp, 'robots' ) );
	$noindex    = ( false !== strpos( $robots, 'noindex' ) );
	$seo[] = toctoc_seo_row(
		'Indexable',
		$noindex ? 'fail' : 'pass',
		$noindex ? 'Page is set to noindex' : 'Search engines can index this page',
		'A noindex tag keeps the page out of Google.'
	);

	$viewport = toctoc_seo_meta( $xp, 'viewport' );
	$seo[] = toctoc_seo_row(
		'Mobile viewport',
		'' !== $viewport ? 'pass' : 'fail',
		'' !== $viewport ? 'Responsive viewport set' : 'Missing viewport meta',
		'The viewport meta tag is required for mobile-friendliness.'
	);

	$og_ok = ( '' !== toctoc_seo_meta( $xp, 'og:title', 'property' ) ) && ( '' !== toctoc_seo_meta( $xp, 'og:image', 'property' ) );
	$seo[] = toctoc_seo_row(
		'Social / Open Graph',
		$og_ok ? 'pass' : 'warn',
		$og_ok ? 'og:title + og:image present' : 'Incomplete Open Graph tags',
		'Open Graph tags control how the page looks when shared.'
	);

	$imgs    = $doc->getElementsByTagName( 'img' );
	$imgc    = $imgs->length;
	$noalt   = 0;
	foreach ( $imgs as $img ) {
		$a = trim( $img->getAttribute( 'alt' ) );
		if ( '' === $a ) {
			$noalt++;
		}
	}
	$seo[] = toctoc_seo_row(
		'Image alt text',
		0 === $imgc ? 'info' : ( 0 === $noalt ? 'pass' : ( $noalt / max( 1, $imgc ) > 0.3 ? 'fail' : 'warn' ) ),
		0 === $imgc ? 'No images' : ( $imgc - $noalt ) . ' of ' . $imgc . ' images have alt text',
		'Alt text improves accessibility and image SEO.'
	);

	$langn = $xp->query( '//html/@lang' );
	$lang  = ( $langn && $langn->length ) ? trim( $langn->item( 0 )->nodeValue ) : '';
	$seo[] = toctoc_seo_row(
		'Language attribute',
		'' !== $lang ? 'pass' : 'warn',
		'' !== $lang ? $lang : 'Missing <html lang>',
		'The lang attribute helps search engines and screen readers.'
	);

	$https = ( 'https' === strtolower( $parts['scheme'] ) );
	$seo[] = toctoc_seo_row(
		'HTTPS',
		$https ? 'pass' : 'fail',
		$https ? 'Served over HTTPS' : 'Not secure (HTTP)',
		'HTTPS is a ranking signal and a trust requirement.'
	);

	// Word count (approx).
	$body_text = '';
	$bodies    = $doc->getElementsByTagName( 'body' );
	if ( $bodies->length ) {
		$body_text = preg_replace( '/\s+/', ' ', trim( $bodies->item( 0 )->textContent ) );
	}
	$words = $body_text ? count( preg_split( '/\s+/', $body_text ) ) : 0;
	$seo[] = toctoc_seo_row(
		'Content depth',
		$words >= 300 ? 'pass' : ( $words >= 120 ? 'warn' : 'fail' ),
		$words . ' words',
		'Thin pages (<300 words) are harder to rank and to answer questions from.'
	);

	// ---------- GEO / AEO / AI ----------
	$ld_nodes = $xp->query( '//script[@type="application/ld+json"]' );
	$types    = array();
	if ( $ld_nodes ) {
		foreach ( $ld_nodes as $node ) {
			$json = json_decode( trim( $node->textContent ), true );
			if ( ! is_array( $json ) ) {
				continue;
			}
			$stack = isset( $json['@graph'] ) && is_array( $json['@graph'] ) ? $json['@graph'] : array( $json );
			foreach ( $stack as $item ) {
				if ( isset( $item['@type'] ) ) {
					foreach ( (array) $item['@type'] as $t ) {
						$types[] = $t;
					}
				}
			}
		}
	}
	$types = array_values( array_unique( $types ) );
	$geo[] = toctoc_seo_row(
		'Structured data (JSON-LD)',
		count( $types ) ? 'pass' : 'fail',
		count( $types ) ? implode( ', ', array_slice( $types, 0, 8 ) ) : 'No JSON-LD schema found',
		'Schema.org markup helps Google and AI engines understand and cite your content.'
	);

	$has_faq = in_array( 'FAQPage', $types, true );
	$geo[] = toctoc_seo_row(
		'FAQ / Q&A schema',
		$has_faq ? 'pass' : 'warn',
		$has_faq ? 'FAQPage schema present' : 'No FAQ schema',
		'FAQ schema is one of the strongest signals for Answer Engine Optimization (AEO).'
	);

	// robots.txt — is it blocking AI crawlers?
	$robots_txt = toctoc_seo_fetch( $origin . '/robots.txt' );
	$rbody      = strtolower( $robots_txt['body'] );
	$ai_bots    = array( 'gptbot', 'oai-searchbot', 'chatgpt-user', 'claudebot', 'anthropic-ai', 'google-extended', 'perplexitybot', 'ccbot' );
	$blocked    = array();
	if ( 200 === $robots_txt['code'] && '' !== $rbody ) {
		foreach ( $ai_bots as $bot ) {
			// crude: bot section followed by a blanket disallow.
			if ( preg_match( '/user-agent:\s*' . preg_quote( $bot, '/' ) . '\b[^#]*?disallow:\s*\/\s*(\n|$)/is', $rbody ) ) {
				$blocked[] = $bot;
			}
		}
	}
	$geo[] = toctoc_seo_row(
		'AI crawler access',
		count( $blocked ) ? 'warn' : 'pass',
		count( $blocked ) ? 'robots.txt blocks: ' . implode( ', ', $blocked ) : ( 200 === $robots_txt['code'] ? 'AI crawlers are allowed' : 'No robots.txt (AI crawlers allowed)' ),
		'Blocking GPTBot / ClaudeBot / Google-Extended keeps you out of AI answers.'
	);

	// Sitemap: declared in robots.txt or reachable at /sitemap.xml.
	$has_sitemap = ( false !== strpos( $rbody, 'sitemap:' ) );
	if ( ! $has_sitemap ) {
		$sm = toctoc_seo_fetch( $origin . '/sitemap.xml', 6 );
		$has_sitemap = ( 200 === $sm['code'] );
	}
	$geo[] = toctoc_seo_row(
		'XML sitemap',
		$has_sitemap ? 'pass' : 'warn',
		$has_sitemap ? 'Sitemap found' : 'No sitemap detected',
		'A sitemap helps crawlers discover every page of the site.'
	);

	// llms.txt (emerging standard for AI).
	$llms = toctoc_seo_fetch( $origin . '/llms.txt', 6 );
	$geo[] = toctoc_seo_row(
		'llms.txt',
		200 === $llms['code'] ? 'pass' : 'info',
		200 === $llms['code'] ? 'Present' : 'Not found (optional, emerging)',
		'llms.txt gives AI models a curated guide to your site. Nice-to-have, not required yet.'
	);

	// Semantic HTML landmarks.
	$has_semantic = $doc->getElementsByTagName( 'main' )->length || $doc->getElementsByTagName( 'article' )->length;
	$geo[] = toctoc_seo_row(
		'Semantic HTML',
		$has_semantic ? 'pass' : 'warn',
		$has_semantic ? '<main>/<article> landmarks used' : 'No <main>/<article> landmarks',
		'Semantic landmarks make content easier for AI and assistive tech to parse.'
	);

	return array(
		'url'    => $url,
		'meta'   => $meta,
		'seo'    => $seo,
		'geo'    => $geo,
		'scores' => array(
			'seo' => toctoc_seo_score( $seo ),
			'geo' => toctoc_seo_score( $geo ),
		),
	);
}

/** Turn a set of check rows into a 0–100 score. */
function toctoc_seo_score( $rows ) {
	$total = 0;
	$got   = 0;
	foreach ( $rows as $r ) {
		if ( 'info' === $r['status'] ) {
			continue;
		}
		$total += 1;
		if ( 'pass' === $r['status'] ) {
			$got += 1;
		} elseif ( 'warn' === $r['status'] ) {
			$got += 0.5;
		}
	}
	if ( 0 === $total ) {
		return 0;
	}
	return (int) round( ( $got / $total ) * 100 );
}

/**
 * PageSpeed Insights handler (separate, slower call).
 */
function toctoc_seo_psi_handler() {
	check_ajax_referer( 'toctoc_seo', 'nonce' );

	if ( toctoc_seo_rate_limited( 'psi', 15 ) ) {
		wp_send_json_error( array( 'message' => 'Rate limit reached.' ), 429 );
	}

	$url = toctoc_seo_safe_url( isset( $_POST['url'] ) ? wp_unslash( $_POST['url'] ) : '' );
	if ( ! $url ) {
		wp_send_json_error( array( 'message' => 'Invalid URL.' ) );
	}

	$key = defined( 'TOCTOC_PSI_KEY' ) ? TOCTOC_PSI_KEY : get_option( 'toctoc_psi_key', '' );

	$endpoint  = 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed';
	$endpoint .= '?strategy=mobile&category=PERFORMANCE';
	$endpoint .= '&url=' . rawurlencode( $url );
	if ( $key ) {
		$endpoint .= '&key=' . rawurlencode( $key );
	}

	// Without an API key PageSpeed is heavily throttled and will usually time out.
	if ( ! $key ) {
		wp_send_json_error( array( 'message' => 'Add your PageSpeed API key in WordPress → Settings → SEO Checker to enable speed scoring.' ) );
	}

	$resp = wp_remote_get( $endpoint, array( 'timeout' => 55 ) );
	if ( is_wp_error( $resp ) ) {
		wp_send_json_error( array( 'message' => 'PageSpeed unavailable: ' . $resp->get_error_message() ) );
	}

	$data = json_decode( (string) wp_remote_retrieve_body( $resp ), true );
	if ( empty( $data['lighthouseResult'] ) ) {
		$msg = isset( $data['error']['message'] ) ? $data['error']['message'] : 'PageSpeed returned no data (add a Google API key for reliable results).';
		wp_send_json_error( array( 'message' => $msg ) );
	}

	$lh     = $data['lighthouseResult'];
	$cat    = isset( $lh['categories'] ) ? $lh['categories'] : array();
	$audits = isset( $lh['audits'] ) ? $lh['audits'] : array();
	$score  = function ( $c ) use ( $cat ) {
		return isset( $cat[ $c ]['score'] ) && null !== $cat[ $c ]['score'] ? (int) round( $cat[ $c ]['score'] * 100 ) : null;
	};
	$disp   = function ( $a ) use ( $audits ) {
		return isset( $audits[ $a ]['displayValue'] ) ? $audits[ $a ]['displayValue'] : '—';
	};

	wp_send_json_success(
		array(
			'performance'   => $score( 'performance' ),
			'seo'           => $score( 'seo' ),
			'accessibility' => $score( 'accessibility' ),
			'best'          => $score( 'best-practices' ),
			'lcp'           => $disp( 'largest-contentful-paint' ),
			'cls'           => $disp( 'cumulative-layout-shift' ),
			'tbt'           => $disp( 'total-blocking-time' ),
			'fcp'           => $disp( 'first-contentful-paint' ),
			'si'            => $disp( 'speed-index' ),
		)
	);
}
