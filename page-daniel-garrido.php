<?php
/**
 * Slug-matched shim for a /team/ profile.
 *
 * WordPress resolves page-{slug}.php on its own, so the page needs no template
 * chosen in wp-admin. All four shims are identical on purpose — the content
 * lives in inc/team.php and the markup in inc/team-member-render.php.
 *
 * Guarded: if either inc/ file has not landed yet (functions.php has reached the
 * server ahead of inc/ before, on 2026-08-03), this renders the page's own
 * content instead of raising a fatal.
 *
 * @package TocToc
 */

$tt_render = get_template_directory() . '/inc/team-member-render.php';

if ( function_exists( 'toctoc_team_member' ) && is_readable( $tt_render ) ) {
	require $tt_render;
	return;
}

get_header();
echo '<main class="min-h-screen bg-background text-foreground pt-48 pb-32"><div class="mx-auto max-w-3xl px-6">';
while ( have_posts() ) {
	the_post();
	the_content();
}
echo '</div></main>';
get_footer();
