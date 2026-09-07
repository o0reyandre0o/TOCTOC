<?php
/**
 * The team, as data.
 *
 * Four member pages that differ only in their content have no business being
 * four hand-written templates — the next edit would have to be made four times
 * and would be forgotten in one of them. Everything that changes per person
 * lives here; page-team-member.php is the only thing that knows how to draw it.
 *
 * 'author' is the WordPress user ID, and it is the reason these pages are not
 * thin. Daniel and Andre write the blog, so their pages list what they have
 * published and grow on their own every time an article ships. Nora and Adriana
 * do not write, so theirs carry a longer account of the craft instead — a bio
 * page with nothing but a paragraph and a headshot is exactly the kind of page
 * we spent August removing from this site.
 *
 * @package TocToc
 */

defined( 'ABSPATH' ) || exit;

/**
 * The four people, keyed by page slug (/team/<slug>/).
 *
 * @return array<string, array<string, mixed>>
 */
function toctoc_team_members() {
	return array(

		'daniel-garrido' => array(
			'person_id'=> 'https://toctoc.ky/#daniel-garrido',
			'name'      => 'Daniel Garrido',
			'role'      => 'Founder &amp; CEO',
			'role_plain'=> 'Founder & CEO',
			'photo'     => 'https://toctoc.ky/wp-content/uploads/2026/07/dsf5319-1.webp',
			'linkedin'  => 'https://www.linkedin.com/in/bydanielgarrido/',
			'site'      => 'https://danielgarrido.com',
			'author'    => 1,
			'lede'      => 'The person on the other end of an enquiry &mdash; and the one who decides what a project actually needs before anybody quotes it.',
			'bio'       => array(
				'Daniel founded TocToc Marketing in George Town after years of running and marketing local businesses himself. That is the whole origin of the company: &ldquo;I know what it&rsquo;s like to run a local business &mdash; the feeling of building something special from the ground up. It&rsquo;s my story, too.&rdquo;',
				'A musician before he was a marketer, he approaches a campaign the way he approaches an arrangement &mdash; every part in service of one idea, nothing in it because it was available. Scoping, client strategy and the commercial side of every project sit with him, which is why enquiries reach a director rather than a form queue.',
				'He also writes about AI search visibility under his own name at danielgarrido.com, and represents TocToc at the Cayman Islands Chamber of Commerce.',
			),
			'does'      => array(
				'Scoping a project before it is quoted',
				'Client strategy and the commercial relationship',
				'AI search visibility strategy',
				'Chamber of Commerce and local partnerships',
			),
			'tags'      => array( 'Brand Strategy', 'Digital Marketing', 'SEO', 'Web Design' ),
			'knows'     => array( 'Web Design', 'Search Engine Optimization', 'Digital Marketing', 'Brand Strategy' ),
		),

		'andre-gutierrez' => array(
			'person_id'=> 'https://www.linkedin.com/in/andre-g-9b373a97/#person',
			'name'      => 'Andre Gutierrez',
			'role'      => 'Web Developer &amp; Technical SEO Specialist',
			'role_plain'=> 'Web Developer & Technical SEO Specialist',
			'photo'     => 'https://toctoc.ky/wp-content/uploads/2026/08/andre-gutierrez-toctoc.webp',
			'linkedin'  => 'https://www.linkedin.com/in/andre-g-9b373a97/',
			'orcid'     => 'https://orcid.org/0009-0002-0951-7834',
			'site'      => '',
			'author'    => 3,
			'lede'      => 'Builds the sites. Wrote the theme this page is rendered by.',
			'bio'       => array(
				'Andre is the developer behind TocToc&rsquo;s builds. Every site the agency ships is a WordPress theme written from scratch &mdash; no page builders, no purchased templates &mdash; which is why they load quickly, and why the markup can be shaped around what a search engine and a language model actually read rather than around what a builder happens to output.',
				'He wrote the TocToc Marketing theme itself: the structured-data graph, the dynamic llms.txt, and the schema that ties every page, service and person on this site into one connected entity. This page is rendered by it.',
				'Day to day that means Core Web Vitals, JSON-LD, semantic HTML and the technical SEO work that decides whether a page can be quoted by ChatGPT or Gemini rather than merely indexed by Google.',
			),
			'does'      => array(
				'WordPress themes built from scratch, no page builders',
				'JSON-LD structured data and entity graphs',
				'Core Web Vitals and page performance',
				'Technical and semantic SEO',
				'llms.txt and machine-readable site structure',
			),
			'tags'      => array( 'Vibe Coding', 'WordPress', 'Technical SEO', 'Structured Data', 'AI Development' ),
			'knows'     => array( 'WordPress Development', 'WordPress Theme Development', 'Vibe Coding', 'Technical SEO', 'Semantic SEO', 'JSON-LD Structured Data', 'Conversion Rate Optimization (CRO)', 'Elementor', 'AI-Assisted Development', 'Web Performance' ),
		),

		'nora-bravo' => array(
			'person_id'=> 'https://toctoc.ky/#nora-bravo',
			'name'      => 'Nora Bravo',
			'role'      => 'Graphic Designer',
			'role_plain'=> 'Graphic Designer',
			'photo'     => 'https://toctoc.ky/wp-content/uploads/2026/08/nora-bravo-toctoc.webp',
			'linkedin'  => 'https://www.linkedin.com/in/norabravo92/',
			'site'      => '',
			'author'    => 0,
			'lede'      => 'Decides what a brand looks like before a single line of code is written.',
			'bio'       => array(
				'Nora builds the visual side: logos, brand identities, and the systems that keep a brand consistent once it leaves her hands &mdash; type, colour, spacing, and the rules for how a mark is allowed to be used.',
				'On a website project she works ahead of the build. By the time a site is being coded the palette, the typography and the imagery direction already exist, which is what stops a build from turning into a run of one-off decisions that stop matching each other by the third page.',
				'She also produces the social creatives &mdash; the static posts, carousels and covers a brand publishes week to week &mdash; drawn from the same system, so the feed and the website read as one company rather than two.',
			),
			'does'      => array(
				'Logos and brand identity',
				'Brand guidelines and design systems',
				'Social creatives, carousels and covers',
				'Art direction for web builds',
			),
			'tags'      => array( 'Branding', 'Visual Identity', 'Social Creatives', 'Graphic Design' ),
			'knows'     => array( 'Graphic Design', 'Branding', 'Visual Identity', 'Social Media Creatives' ),
		),

		'adriana-brito' => array(
			'person_id'=> 'https://toctoc.ky/#adriana-brito',
			'name'      => 'Adriana Brito',
			'role'      => 'Video Editor &amp; Social Media',
			'role_plain'=> 'Video Editor & Social Media',
			'photo'     => 'https://toctoc.ky/wp-content/uploads/2026/08/adriana-brito-toctoc.webp',
			'linkedin'  => 'https://www.linkedin.com/in/adriana-brito-b2004034b',
			'site'      => '',
			'author'    => 0,
			'lede'      => 'Turns one article into the video and the stories that carry it.',
			'bio'       => array(
				'Adriana edits the video: reels, shorts and stories for client accounts. Cutting, pacing, captions, subtitles &mdash; the unglamorous craft that decides whether a good idea gets watched or scrolled past.',
				'She also runs the day-to-day publishing on the accounts those pieces live on: scheduling, captions, replies, and holding a posting rhythm that does not collapse the week a client gets busy.',
				'Her work is the second half of how TocToc handles content. An article is written once and then rebuilt as video and images, so the same idea reaches people who will never read a blog post &mdash; and so a business keeps showing up in more than one place at a time.',
			),
			'does'      => array(
				'Reels, shorts and story editing',
				'Captions and subtitling',
				'Publishing, scheduling and account upkeep',
				'Turning a written article into video and images',
			),
			'tags'      => array( 'Video Editing', 'Reels &amp; Shorts', 'Social Media', 'Content Production' ),
			'knows'     => array( 'Video Editing', 'Short-Form Video', 'Instagram Reels', 'Social Media Management', 'Content Production', 'Subtitling' ),
		),
	);
}

/**
 * One member by page slug, or null.
 *
 * @param string $slug Page slug.
 * @return array<string, mixed>|null
 */
function toctoc_team_member( $slug ) {
	$all = toctoc_team_members();
	return $all[ $slug ] ?? null;
}

/**
 * Canonical URL of a member page.
 *
 * Hard-coded rather than resolved through get_permalink() so the schema and the
 * llms.txt still emit the right URL if a page is ever missing or in draft.
 *
 * @param string $slug Page slug.
 * @return string
 */
function toctoc_team_url( $slug ) {
	return home_url( '/team/' . $slug . '/' );
}

/**
 * Person @id for the entity graph.
 *
 * READ THIS BEFORE CHANGING ONE.
 *
 * These identifiers are a contract across domains, not a local detail. Every
 * site we build carries the agency entity block, and those blocks reference
 * these exact strings — roughly thirty sites at the time of writing. Changing
 * an @id here does not rename an entity; it deletes one and creates another,
 * and leaves every client site pointing at something the canonical domain no
 * longer declares.
 *
 * They were changed on 2026-09-07 to the /team/ URLs on the reasoning that a
 * LinkedIn URL is a strange identity for our own employee. The reasoning was
 * fine and the change was still wrong: an @id is an opaque key, not a location.
 * The profile page's job is to CONFIRM the entity — same @id, mainEntity on the
 * page node, and the page URL added to the person's sameAs — not to rehouse it.
 * Reverted the same day.
 *
 * @param string $slug Page slug.
 * @return string
 */
function toctoc_team_person_id( $slug ) {
	$member = toctoc_team_member( $slug );
	return $member['person_id'] ?? ( toctoc_team_url( $slug ) . '#person' );
}

/**
 * The /team/ page node, as a JSON fragment spliced into header.php's @graph.
 *
 * Returned with a leading comma because it is appended to an existing array of
 * nodes. Empty string on any page that is not part of /team/.
 *
 * The Person is referenced by @id and never redefined here — a second
 * definition of the same @id in one graph is exactly the ambiguity the stable
 * identifiers exist to avoid.
 *
 * @return string
 */
function toctoc_team_extra_schema_json() {
	if ( ! is_page() ) {
		return '';
	}
	$slug = get_post_field( 'post_name', get_the_ID() );
	$site = home_url( '/' ) . '#website';

	if ( 'team' === $slug ) {
		$items = array();
		$pos   = 0;
		foreach ( toctoc_team_members() as $member_slug => $member ) {
			$pos++;
			$items[] = array(
				'@type'    => 'ListItem',
				'position' => $pos,
				'item'     => array( '@id' => toctoc_team_person_id( $member_slug ) ),
			);
		}
		$node = array(
			'@type'      => 'CollectionPage',
			'@id'        => home_url( '/team/' ) . '#webpage',
			'url'        => home_url( '/team/' ),
			'name'       => 'The TocToc Marketing team',
			'isPartOf'   => array( '@id' => $site ),
			'about'      => array( '@id' => home_url( '/' ) . '#organization' ),
			'mainEntity' => array(
				'@type'           => 'ItemList',
				'numberOfItems'   => count( $items ),
				'itemListElement' => $items,
			),
		);
		return ',' . wp_json_encode( $node, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
	}

	$member = toctoc_team_member( $slug );
	if ( null === $member ) {
		return '';
	}

	$node = array(
		'@type'              => 'ProfilePage',
		'@id'                => toctoc_team_url( $slug ) . '#webpage',
		'url'                => toctoc_team_url( $slug ),
		'name'               => $member['name'] . ' — ' . $member['role_plain'] . ' at TocToc Marketing',
		'description'        => html_entity_decode( wp_strip_all_tags( $member['lede'] ), ENT_QUOTES, 'UTF-8' ),
		'isPartOf'           => array( '@id' => $site ),
		'about'              => array( '@id' => $member['person_id'] ),
		'mainEntity'         => array( '@id' => $member['person_id'] ),
		'primaryImageOfPage' => array( '@type' => 'ImageObject', 'url' => $member['photo'] ),
	);
	return ',' . wp_json_encode( $node, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
}

/**
 * Posts written by a member, newest first.
 *
 * @param array<string, mixed> $member Member record.
 * @param int                  $limit  Max posts.
 * @return WP_Post[]
 */
function toctoc_team_articles( $member, $limit = 12 ) {
	if ( empty( $member['author'] ) ) {
		return array();
	}
	return get_posts(
		array(
			'author'              => (int) $member['author'],
			'post_status'         => 'publish',
			'numberposts'         => $limit,
			'ignore_sticky_posts' => true,
		)
	);
}
