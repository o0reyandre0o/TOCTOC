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
			'name'      => 'Andre Gutierrez',
			'role'      => 'Web Developer &amp; Technical SEO Specialist',
			'role_plain'=> 'Web Developer & Technical SEO Specialist',
			'photo'     => 'https://toctoc.ky/wp-content/uploads/2026/08/andre-gutierrez-toctoc.webp',
			'linkedin'  => 'https://www.linkedin.com/in/andre-g-9b373a97/',
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
 * These are the stable identifiers the rest of the site points at. Before the
 * team pages existed, Andre's Person node was identified by a LinkedIn URL,
 * which had the ownership backwards: our own site should assert who a person is
 * and use sameAs to point outward for confirmation, not the other way round.
 *
 * @param string $slug Page slug.
 * @return string
 */
function toctoc_team_person_id( $slug ) {
	return toctoc_team_url( $slug ) . '#person';
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
