<?php
/**
 * One JSON-LD block per page.
 *
 * The theme used to print a separate <script type="application/ld+json"> from
 * every template that had something to say — header.php, single.php, and ten
 * service pages — so a typical page shipped three of them. Two of those pages
 * went further and re-declared https://toctoc.ky/#organization inside a
 * `provider`, leaving Google to choose between two versions of the same entity
 * on the same page.
 *
 * Nodes are collected here instead and printed once, in a single @graph, on
 * wp_footer. Position does not matter to a parser; a split graph does.
 *
 * Templates keep their schema exactly as they wrote it. They only swap the
 * <script> wrapper for ob_start() / toctoc_schema_add_raw(), so the JSON itself
 * is never rewritten by hand.
 *
 * @package TocToc
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add one node (or a list of nodes) to the page graph.
 *
 * @param array<string, mixed>|array<int, mixed> $node Node, or list of nodes.
 * @return void
 */
function toctoc_schema_add( $node ) {
	if ( ! is_array( $node ) || ! $node ) {
		return;
	}
	// A list (numeric keys) is several nodes; anything else is one node.
	if ( array_keys( $node ) === range( 0, count( $node ) - 1 ) ) {
		foreach ( $node as $one ) {
			toctoc_schema_add( $one );
		}
		return;
	}
	unset( $node['@context'] ); // The context is declared once, on the graph.
	$GLOBALS['toctoc_schema_nodes'][] = $node;
}

/**
 * Add captured JSON-LD text.
 *
 * Takes whatever a template printed between its old <script> tags, so the
 * template's own PHP interpolation still runs and its JSON is never edited.
 *
 * Accepts a full document ({"@context":…,"@graph":[…]}), a single node, a bare
 * list of nodes, or a comma-separated run of nodes with no enclosing brackets
 * (which is how header.php's graph body arrives).
 *
 * If the text will not parse, it is printed as its own block rather than
 * dropped. A page with two blocks is a tidiness problem; a page that silently
 * lost its Article schema is a real one.
 *
 * @param string $json Captured output.
 * @return void
 */
function toctoc_schema_add_raw( $json ) {
	$json = trim( (string) $json );
	if ( '' === $json ) {
		return;
	}

	$data = json_decode( $json, true );

	// A comma-separated run of nodes is not valid JSON on its own; bracket it.
	if ( null === $data ) {
		$data = json_decode( '[' . $json . ']', true );
	}

	if ( null === $data ) {
		$GLOBALS['toctoc_schema_orphans'][] = $json;
		return;
	}

	if ( isset( $data['@graph'] ) && is_array( $data['@graph'] ) ) {
		toctoc_schema_add( $data['@graph'] );
		return;
	}

	toctoc_schema_add( $data );
}

/**
 * Join the page-level nodes into one connected graph.
 *
 * Templates each add what they know — a breadcrumb from the header, an FAQ from
 * the page, an Article from single.php — and none of them knows about the
 * others. The result was a set of valid but disconnected blocks: a
 * BreadcrumbList and an FAQPage that nothing pointed at, so nothing traversing
 * the graph could tell they belonged to this page or this business.
 *
 * This runs once, when the whole graph is known, and only ever fills gaps. It
 * never overwrites a property a template set and never changes an existing
 * @id; a node that had no @id gets one, which is adding identity, not moving it.
 *
 * - The page gets one page node. A template's own (AboutPage, ProfilePage,
 *   CollectionPage, WebPage) is used when present; otherwise a WebPage is
 *   created. On a post it takes the @id the Article already names in
 *   mainEntityOfPage, so the reference resolves instead of becoming a second
 *   page.
 * - That node is tied to the WebSite, to the breadcrumb (by the breadcrumb's
 *   real @id, which is built differently from the canonical) and, on the home
 *   page only, to the Organization it is about.
 * - Every FAQPage gets an @id and is declared part of the page.
 *
 * @param array<int, array<string, mixed>> $nodes De-duplicated nodes.
 * @return array<int, array<string, mixed>>
 */
function toctoc_schema_stitch( $nodes ) {
	$page = $GLOBALS['toctoc_page_meta'] ?? array();
	if ( empty( $page['url'] ) || is_404() || is_search() ) {
		return $nodes;
	}

	$site       = home_url( '/' ) . '#website';
	$org        = home_url( '/' ) . '#organization';
	$page_types = array( 'WebPage', 'AboutPage', 'CollectionPage', 'ProfilePage', 'ContactPage', 'ItemPage', 'QAPage', 'SearchResultsPage' );

	$page_i   = null;
	$crumb_id = '';
	$main_of  = '';
	foreach ( $nodes as $i => $n ) {
		$types = (array) ( $n['@type'] ?? array() );
		if ( null === $page_i && array_intersect( $types, $page_types ) ) {
			$page_i = $i;
		}
		if ( '' === $crumb_id && in_array( 'BreadcrumbList', $types, true ) && ! empty( $n['@id'] ) ) {
			$crumb_id = (string) $n['@id'];
		}
		if ( '' === $main_of && ! empty( $n['mainEntityOfPage']['@id'] ) && is_string( $n['mainEntityOfPage']['@id'] ) ) {
			$main_of = $n['mainEntityOfPage']['@id'];
		}
	}

	if ( null === $page_i ) {
		$nodes[] = array_filter(
			array(
				'@type'       => 'WebPage',
				'@id'         => $main_of ? $main_of : $page['url'] . '#webpage',
				'url'         => $page['url'],
				'name'        => $page['name'] ?? '',
				'description' => $page['desc'] ?? '',
			)
		);
		$page_i = count( $nodes ) - 1;
	}

	if ( empty( $nodes[ $page_i ]['@id'] ) ) {
		$nodes[ $page_i ]['@id'] = $page['url'] . '#webpage';
	}
	if ( empty( $nodes[ $page_i ]['isPartOf'] ) ) {
		$nodes[ $page_i ]['isPartOf'] = array( '@id' => $site );
	}
	if ( empty( $nodes[ $page_i ]['breadcrumb'] ) && '' !== $crumb_id ) {
		$nodes[ $page_i ]['breadcrumb'] = array( '@id' => $crumb_id );
	}
	if ( empty( $nodes[ $page_i ]['about'] ) && is_front_page() ) {
		$nodes[ $page_i ]['about'] = array( '@id' => $org );
	}
	$page_id = $nodes[ $page_i ]['@id'];

	$faq = 0;
	foreach ( $nodes as $i => $n ) {
		if ( ! in_array( 'FAQPage', (array) ( $n['@type'] ?? array() ), true ) ) {
			continue;
		}
		$faq++;
		if ( empty( $n['@id'] ) ) {
			$nodes[ $i ]['@id'] = $page['url'] . '#faq' . ( $faq > 1 ? '-' . $faq : '' );
		}
		if ( empty( $n['isPartOf'] ) ) {
			$nodes[ $i ]['isPartOf'] = array( '@id' => $page_id );
		}
	}

	return $nodes;
}

/**
 * Print the graph.
 *
 * Nodes are de-duplicated by @id, first definition winning: header.php declares
 * the Organization and the four people in full, and anything later that names
 * the same @id is a reference, not a competing definition. A node with no @id
 * (a FAQPage, a Service) is always kept.
 *
 * @return void
 */
function toctoc_schema_render() {
	$nodes = $GLOBALS['toctoc_schema_nodes'] ?? array();
	$seen  = array();
	$keep  = array();

	foreach ( $nodes as $node ) {
		$id = $node['@id'] ?? '';
		if ( '' !== $id ) {
			if ( isset( $seen[ $id ] ) ) {
				continue;
			}
			$seen[ $id ] = true;
		}
		$keep[] = $node;
	}

	$keep = toctoc_schema_stitch( $keep );

	if ( $keep ) {
		echo '<script type="application/ld+json">'
			. wp_json_encode(
				array(
					'@context' => 'https://schema.org',
					'@graph'   => $keep,
				),
				JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
			)
			. '</script>' . "\n";
	}

	foreach ( $GLOBALS['toctoc_schema_orphans'] ?? array() as $orphan ) {
		echo '<script type="application/ld+json">' . $orphan . '</script>' . "\n";
	}
}
add_action( 'wp_footer', 'toctoc_schema_render', 5 );
