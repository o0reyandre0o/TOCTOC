<?php
/**
 * Template Name: Legal Page
 */

get_header();
?>

<main class="min-h-screen bg-background text-slate-900 pt-40 pb-24">
    <div class="mx-auto max-w-4xl px-6">
        <header class="mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 text-[11px] font-bold text-sky-deep mb-6 uppercase tracking-widest bg-sky-deep/5 rounded-full">
                Legal Documentation
            </div>
            <h1 class="text-5xl md:text-7xl font-display leading-tight mb-8">
                <?php the_title(); ?>
            </h1>
            <div class="flex items-center gap-6 text-xs font-bold text-slate-400 uppercase tracking-widest">
                <span>Effective: <?php echo get_the_modified_date('F Y'); ?></span>
                <span class="opacity-30">|</span>
                <span>TocToc Marketing</span>
            </div>
        </header>

        <div class="prose-legal">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    the_content();
                endwhile;
            endif;
            ?>
        </div>
    </div>
</main>

<style>
.prose-legal {
    font-size: 1.125rem;
    line-height: 1.8;
    color: #334155; /* slate-700 */
}
.prose-legal h2 {
    font-family: 'Instrument Serif', serif;
    font-size: 2.5rem;
    margin-top: 4rem;
    margin-bottom: 1.5rem;
    color: #0f172a; /* slate-900 */
}
.prose-legal h3 {
    font-weight: 700;
    font-size: 1.25rem;
    margin-top: 2.5rem;
    margin-bottom: 1rem;
    color: #0f172a;
}
.prose-legal p {
    margin-bottom: 1.5rem;
}
.prose-legal ul, .prose-legal ol {
    margin-bottom: 2rem;
    padding-left: 1.5rem;
}
.prose-legal li {
    margin-bottom: 0.75rem;
}
.prose-legal strong {
    color: #0f172a;
    font-weight: 700;
}
.prose-legal a {
    color: #0284c7; /* sky-600 */
    text-decoration: underline;
    font-weight: 600;
}
.prose-legal a:hover {
    color: #0369a1;
}
</style>

<?php get_footer(); ?>
