<?php
/**
 * The plugins TocToc publishes, as data.
 *
 * Same shape as the client showcase: one array, two consumers. Adding the next
 * plugin is one entry here, not a new template.
 *
 * 'state' is the honest part. A plugin sitting in the WordPress.org review queue
 * has a reserved slug and no public page, and saying otherwise would send people
 * to a 404. Only 'live' prints the directory button; 'review' says what is
 * actually happening and offers early access by email.
 *
 * @package TocToc
 */

defined( 'ABSPATH' ) || exit;

/**
 * @return array<int, array<string, mixed>>
 */
function toctoc_plugins() {
	return array(
		array(
			'slug'        => 'ag-theme-sync-for-github',
			'name'        => 'AG Theme Sync for GitHub',
			'state'       => 'review',
			'version'     => '2.2.0',
			'author'      => 'Andre Gutierrez',
			'author_url'  => 'https://toctoc.ky/team/andre-gutierrez/',
			'wporg'       => 'https://wordpress.org/plugins/ag-theme-sync-for-github/',
			'requires'    => 'WordPress 5.6 · PHP 7.4',
			'zip'         => 'https://toctoc.ky/wp-content/uploads/2026/09/ag-theme-sync-for-github-2.2.0.zip',
			'zip_kb'      => 98,
			'install'     => array(
				'In WordPress, go to <strong>Plugins &rsaquo; Add New &rsaquo; Upload Plugin</strong> and pick the ZIP.',
				'Activate it from the Plugins list.',
				'Open <strong>Settings &rsaquo; AG Theme Sync for GitHub &rsaquo; Settings</strong>.',
				'Enter the repository URL and choose the theme it should update. For a private repository, add a GitHub token.',
				'Press <strong>Verify connection</strong>, then <strong>Save settings</strong>.',
				'Deploy with <strong>Sync Theme</strong> in the admin bar, or from the plugin dashboard.',
			),
			'server'      => 'Your server needs to write directly to <code>wp-content/themes</code> and to reach <code>api.github.com</code>.',
			'lede'        => 'Publish a WordPress theme straight from a GitHub repository, in one click, with a backup and an automatic rollback if the site does not come back up.',
			'problem'     => 'Editing a theme with an AI coding assistant is fast. Getting the result onto the live site is not: FTP, a zip, a file manager, and the hope that nothing was missed. This closes that gap without leaving wp-admin.',
			'features'    => array(
				'One click from the admin bar or the plugin panel',
				'Public and private repositories, by branch',
				'Full theme backup before every deploy',
				'Site verified after install &mdash; automatic rollback if it fails',
				'Live progress for each step, not a spinner',
				'No FTP, no webhooks, no external service',
			),
		),
	);
}

/**
 * Plugins that are published and installable.
 *
 * @return array<int, array<string, mixed>>
 */
function toctoc_plugins_live() {
	return array_values( array_filter( toctoc_plugins(), static function ( $p ) {
		return 'live' === $p['state'];
	} ) );
}
