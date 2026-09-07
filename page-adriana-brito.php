<?php
/**
 * Slug-matched shim for a /team/ profile.
 *
 * WordPress resolves page-{slug}.php on its own, so the page needs no template
 * chosen in wp-admin. All four shims are identical on purpose — the content
 * lives in inc/team.php and the markup in inc/team-member-render.php.
 *
 * @package TocToc
 */

require get_template_directory() . '/inc/team-member-render.php';
