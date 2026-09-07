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
