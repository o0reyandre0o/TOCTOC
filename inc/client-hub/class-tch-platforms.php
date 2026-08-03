<?php
/**
 * Single source of truth for the platforms the hub tracks.
 *
 * Everything else — the meta boxes, the status board, and later the API sync —
 * is generated from this definition, so adding a platform or a field is a change
 * in exactly one place.
 *
 * 'api' records how the platform will eventually be integrated, and it is not
 * aspirational: it reflects what each provider actually grants.
 *   phase-N  → an API exists and we can realistically be approved for it
 *   manual   → no reachable API; the hub tracks it as a human checklist
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class TCH_Platforms {

	public static function all() {
		return array(

			'gbp' => array(
				'label' => 'Google Business Profile',
				'icon'  => '📍',
				'api'   => 'phase-2',
				'note'  => 'Needs Business Profile API approval. Check the quota in Cloud Console: 0 QPM = still pending, 300 QPM = approved.',
				'fields' => array(
					'account_id'  => array( 'label' => 'Account ID', 'type' => 'text', 'hint' => 'accounts/{id}' ),
					'location_id' => array( 'label' => 'Location ID', 'type' => 'text', 'hint' => 'locations/{id}' ),
					'url'         => array( 'label' => 'Public listing URL', 'type' => 'url' ),
					'primary_category' => array( 'label' => 'Primary category', 'type' => 'text' ),
				),
				// Field that decides whether the platform counts as wired up.
				'key_field' => 'location_id',
			),

			'youtube' => array(
				'label' => 'YouTube',
				'icon'  => '▶️',
				'api'   => 'phase-1',
				'note'  => 'YouTube Data API v3 needs no approval — just enable it in the same Cloud project.',
				'fields' => array(
					'channel_id' => array( 'label' => 'Channel ID', 'type' => 'text', 'hint' => 'UC…' ),
					'url'        => array( 'label' => 'Channel URL', 'type' => 'url' ),
					'handle'     => array( 'label' => 'Handle', 'type' => 'text', 'hint' => '@example' ),
				),
				'key_field' => 'channel_id',
			),

			'linkedin' => array(
				'label' => 'LinkedIn',
				'icon'  => '💼',
				'api'   => 'phase-4',
				'note'  => 'Community Management API: registered company, verified Page, two review tiers and a screencast.',
				'fields' => array(
					'organization_urn' => array( 'label' => 'Organization URN', 'type' => 'text', 'hint' => 'urn:li:organization:123456' ),
					'url'              => array( 'label' => 'Company Page URL', 'type' => 'url' ),
				),
				'key_field' => 'organization_urn',
			),

			'apple' => array(
				'label' => 'Apple Business Connect',
				'icon'  => '🍎',
				'api'   => 'phase-5',
				'note'  => 'Requires an approved Third-Party Partner ID, and each client must delegate authority to you.',
				'fields' => array(
					'location_id' => array( 'label' => 'Business Connect location ID', 'type' => 'text' ),
					'url'         => array( 'label' => 'Apple Maps place URL', 'type' => 'url' ),
				),
				'key_field' => 'location_id',
			),

			'bing' => array(
				'label' => 'Bing Places',
				'icon'  => '🔎',
				'api'   => 'manual',
				'note'  => 'No API: the Bing Places partner programme requires managing 10,000+ listings. Import the listing from Google Business Profile instead — roughly two minutes per client, once.',
				'fields' => array(
					'url'      => array( 'label' => 'Bing Places listing URL', 'type' => 'url' ),
					'imported' => array(
						'label'   => 'Imported from GBP',
						'type'    => 'select',
						'options' => array( '' => '—', 'yes' => 'Yes', 'no' => 'Not yet', 'na' => 'Not applicable' ),
					),
				),
				'key_field' => 'url',
			),
		);
	}

	public static function get( $slug ) {
		$all = self::all();
		return $all[ $slug ] ?? null;
	}

	/** Meta key for one platform field. Namespaced so nothing collides. */
	public static function meta_key( $platform, $field ) {
		return '_tch_' . $platform . '_' . $field;
	}
}
