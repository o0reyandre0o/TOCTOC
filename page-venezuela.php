<?php
/**
 * Template Name: Venezuela Earthquake Appeal
 * Template Post Type: page
 *
 * Landing page: Venezuela Earthquake Appeal, promoting online donations from the
 * Cayman Islands to trusted international relief organizations. URL: /venezuela
 */
get_header();

// --- Statistics (as of July 1, 2026) ---
$ve_stats = [
    [ 'num' => '2',        'label' => 'Earthquakes in 39 seconds — magnitude 7.2 &amp; 7.5' ],
    [ 'num' => '2,295+',   'label' => 'People confirmed killed' ],
    [ 'num' => '10,000',   'label' => 'Death toll could reach this (UN)' ],
    [ 'num' => '43,000+',  'label' => 'People reported missing' ],
    [ 'num' => '15,866',   'label' => 'People left homeless' ],
    [ 'num' => '59,000+',  'label' => 'Buildings damaged or destroyed' ],
    [ 'num' => '430+',     'label' => 'Buildings fully collapsed' ],
    [ 'num' => 'Thousands','label' => 'Children left orphaned', 'sm' => true ],
];

// --- International relief donation links ---
$ve_donations = [
    [
        'name' => 'British Red Cross',
        'desc' => 'Venezuela Earthquake Crisis Appeal — emergency shelter, medical aid and relief for affected communities.',
        'url'  => 'https://donate.redcross.org.uk/appeal/venezuela-earthquake-crisis',
        'logo' => 'https://toctoc.ky/wp-content/uploads/2026/07/svgexport-1.svg',
    ],
    [
        'name' => 'Global Empowerment Mission',
        'desc' => 'On-the-ground disaster response delivering aid and essentials directly to families who lost everything.',
        'url'  => 'https://www.globalempowermentmission.org/mission/venezuela-earthquakes/',
        'logo' => 'https://www.globalempowermentmission.org/wp-content/uploads/2024/11/GEM-logo-1536x384.png',
    ],
    [
        'name' => 'UN Crisis Relief',
        'desc' => 'The United Nations coordinated humanitarian response for the Venezuela earthquake crisis.',
        'url'  => 'https://crisisrelief.un.org/en/donate-venezuela-crisis',
        'logo' => 'https://toctoc.ky/wp-content/uploads/2026/07/un-crisis-relief-png-ea5540.webp',
    ],
    [
        'name' => 'Wayúu Taya Foundation',
        'desc' => 'A grassroots foundation delivering direct humanitarian aid to Venezuelan and indigenous communities affected by the earthquakes.',
        'url'  => 'https://wayuutaya.org/',
        'logo' => 'https://img1.wsimg.com/isteam/ip/ee54cd24-3e7f-42d7-8a7f-cbb134d83b74/Recurso%206-0001.png/:/rs=w:834,h:188,cg:true,m/cr=w:834,h:188/qt=q:95',
    ],
    [
        'name' => 'GiveDirectly',
        'desc' => 'Sends cash directly to families affected by the earthquakes, so they can buy exactly what they need most — the fastest, most flexible way to help.',
        'url'  => 'https://www.givedirectly.org/venezuela-earthquakes',
        'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/GiveDirectly_logo.svg/500px-GiveDirectly_logo.svg.png',
    ],
];

// --- Photo gallery (already uploaded to toctoc.ky media library). ---
// Filename encodes date + photographer, e.g. june26-ap-ariana-cubillos.webp
$ve_upload  = 'https://toctoc.ky/wp-content/uploads/2026/07/';
$ve_gallery = [
    'june26-ap-ariana-cubillos.webp',
    'june26-ap-juan-pablo-arraez.webp',
    'june26-ap-fernando-vergara.webp',
    'june26-ap-fernando-vergara-2.webp',
    'june27-ap-matias-delacroix.webp',
    'june27-ap-matias-delacroix-1.webp',
    'june27-ap-matias-delacroix2.webp',
    'june27-matias-delacroix.webp',
    'june27-matias-delacroix-2.webp',
    'june27-ap-fernando-vergara.webp',
    'june27-ap-fernando-vergara-1.webp',
    'june27-ap-fernando-vergara2.webp',
    'june28-ap-matias-delacroix.webp',
    'june28-matias-delacroix.webp',
    'june28-ap-pedro-mattey.webp',
    'june30-ariana-cubillos.webp',
    'june30-ariana-cubillos-2.webp',
    'june30-ariana-cubillos2.webp',
    'june30-ap-ariana-cubillos-scaled.webp',
    'june30-ap-matias-delacroix-1-scaled.webp',
];

// --- Videos (YouTube IDs). Loaded on click to keep the page fast. ---
// Footage clips are shown right after the hero; the rest live in the videos section.
$ve_footage = [ 'zYix2i05aII', 'RBZw5Ml3wds', 'IGEsM_MPuU8' ];
$ve_videos = [
    'The moment the earthquake hit' => [ '9qvGVIrrGpI', 'hfi_JccQYCo', 'XFveu6m1MmE' ],
    'People rescued'                => [ '36E6bYq_WXg', 'yDGhN4NiZ7k', 'ER2LoVEbPH8', '8DibFQh0wrY', '_cUAJ-5lL_0', 'U-3CdymZ69Q' ],
];

// --- Donations for children ---
$ve_donations_children = [
    [
        'name' => 'UNICEF UK',
        'desc' => 'Protecting children affected by the earthquakes with clean water, healthcare and safe spaces.',
        'url'  => 'https://www.unicef.org.uk/donate/donate-to-our-venezuela-earthquake-appeal/',
        'logo' => 'https://www.unicef.org.uk/wp-content/uploads/2022/10/unicef-uk-logo-horizontal.png',
    ],
    [
        'name' => 'Save the Children',
        'desc' => 'Emergency support for children and families who have lost their homes and loved ones.',
        'url'  => 'https://www.savethechildren.org.uk/how-you-can-help/emergencies/venezuela-earthquake-donate',
        'logo' => 'https://www.savethechildren.org.uk/themes/custom/scuk_theme/images/logo.svg',
    ],
];

// --- Sections NOT ready to publish yet. Flip the flag to true (and fill the array) to show them. ---
$ve_show_events = true;  // Local fundraising events in Cayman
$ve_show_news   = true;  // News / CEO interviews coverage

$ve_events = [
    [
        'name' => 'La Casita — Venezuela Day',
        'date' => 'July 18, 2026',
        'desc' => 'A Venezuela Day fundraiser at the Cayman restaurant La Casita, with Venezuelan-inspired food and drink specials and proceeds supporting relief efforts.',
        'url'  => 'https://lacasita.ky/',
    ],
    [
        'name' => 'BodyWorks Holistic Wellness Centre',
        'date' => 'Thursday evenings · all July',
        'desc' => 'Free Thursday evening Relaxation Music Sessions — all contributions collected are donated to humanitarian organisations responding to the Venezuela earthquake disaster.',
        'url'  => 'https://www.bodyworkscayman.com/',
    ],
    [
        'name' => 'Venezuelan Community Charity Run',
        'date' => 'September 2026',
        'desc' => 'A charity run organised by Cayman\'s Venezuelan community to raise additional funds for earthquake relief.',
    ],
];

$ve_news = [
    // For a video interview set 'youtube' to the video ID; for an article set 'url'. Both optional.
    [
        'date'    => 'July 2, 2026',
        'source'  => 'Cayman Compass',
        'title'   => 'How Cayman residents can help Venezuela after the earthquakes',
        'url'     => 'https://www.caymancompass.com/2026/07/02/how-cayman-residents-can-help-venezuela-after-the-earthquakes/',
        'image'   => 'https://toctoc.ky/wp-content/uploads/2026/07/june27-ap-matias-delacroix.webp',
        'youtube' => '',
    ],
    [
        'date'    => 'July 2, 2026',
        'source'  => 'Cayman Marl Road',
        'title'   => 'Venezuelan community in Cayman rallies support for earthquake victims',
        'url'     => 'https://caymanmarlroad.com/2026/07/02/venezuelan-community-in-cayman-rallies-support-for-earthquake-victims/',
        'image'   => 'https://toctoc.ky/wp-content/uploads/2026/07/june26-ap-juan-pablo-arraez.webp',
        'youtube' => '',
    ],
    [
        'date'    => 'June 26, 2026',
        'source'  => 'Cayman Compass',
        'title'   => 'Cayman\'s Venezuelan community in shock following double earthquake',
        'url'     => 'https://www.caymancompass.com/2026/06/26/caymans-venezuelan-community-in-shock-following-double-earthquake/',
        'image'   => 'https://toctoc.ky/wp-content/uploads/2026/07/june25-ap-pedro-mattey-scaled.webp',
        'youtube' => '',
    ],
];
?>

<main class="min-h-screen bg-slate-950 text-white">

    <!-- ================= 1. HERO ================= -->
    <section class="relative min-h-[100svh] flex items-center overflow-hidden">
        <img
            src="https://toctoc.ky/wp-content/uploads/2026/07/june27-ap-matias-delacroix.webp"
            alt="Earthquake destruction in northern Venezuela, June 2026"
            class="absolute inset-0 w-full h-full object-cover"
        />
        <div class="absolute inset-0 bg-slate-950/70"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/30 to-slate-950/60"></div>

        <div class="relative z-10 mx-auto max-w-4xl px-6 pt-36 pb-28 text-center flex flex-col items-center">
            <div class="inline-flex items-center gap-2 rounded-full border border-[#ED1C24]/40 bg-[#ED1C24]/10 px-4 py-1.5 text-[11px] font-bold text-white mb-8 uppercase tracking-widest">
                <span class="w-2 h-2 rounded-full bg-[#ED1C24] animate-pulse"></span>
                Emergency Appeal · From the Cayman Islands
            </div>

            <h1 class="text-7xl sm:text-8xl md:text-9xl font-display leading-[0.95] text-white">
                Cayman, Venezuela <br /><em class="italic text-[#ED1C24] font-display">Need Us</em> Now
            </h1>

            <p class="mt-8 mx-auto max-w-2xl text-lg sm:text-xl text-white/80 leading-relaxed">
                On June 24, 2026, two earthquakes struck northern Venezuela in just <strong class="text-white">39 seconds</strong> — leaving thousands dead and tens of thousands of families with nothing. From the Cayman Islands, we can help them recover today.
            </p>

            <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
                <a href="#donate" class="group inline-flex items-center justify-center gap-3 rounded-full bg-[#ED1C24] text-white pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 hover:bg-[#c8161d] decoration-none">
                    Donate Now
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white text-[#ED1C24] transition-transform group-hover:rotate-45">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                    </span>
                </a>
            </div>

            <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
                <span class="text-[11px] font-bold uppercase tracking-widest text-white/50">As featured in</span>
                <a href="https://www.caymancompass.com/2026/07/02/how-cayman-residents-can-help-venezuela-after-the-earthquakes/" target="_blank" rel="noopener" class="inline-flex items-center rounded-lg bg-white px-3 py-1.5 shadow-soft hover:scale-105 transition-transform" aria-label="Read the Cayman Compass article">
                    <img src="https://caymancompass.s3.amazonaws.com/wp-content/uploads/2025/04/cayman-compass-logo-icon-544x180-1.png" alt="Cayman Compass" class="h-5 w-auto" />
                </a>
                <a href="https://caymanmarlroad.com/2026/07/02/venezuelan-community-in-cayman-rallies-support-for-earthquake-victims/" target="_blank" rel="noopener" class="inline-flex items-center rounded-lg bg-white px-3 py-2 text-xs font-bold text-[#2AABE2] shadow-soft hover:scale-105 transition-transform decoration-none">
                    Cayman Marl Road
                </a>
            </div>
        </div>

        <span class="absolute bottom-3 right-4 z-10 text-[10px] text-white/40">Photo: Matias Delacroix / AP</span>
    </section>

    <!-- ================= FOOTAGE (after hero) ================= -->
    <section class="py-20 md:py-28 bg-slate-950">
        <div class="mx-auto max-w-6xl px-6">
            <h2 class="text-center text-3xl md:text-5xl font-display text-white mb-10">Footage from <em class="italic text-[#ED1C24] font-display">the ground</em></h2>
            <div class="flex flex-wrap justify-center gap-5 md:gap-6">
                <?php foreach ( $ve_footage as $vid ) : ?>
                <div class="ve-video group relative aspect-[9/16] w-[80%] sm:w-52 lg:w-60 overflow-hidden rounded-2xl bg-slate-800 cursor-pointer ring-1 ring-white/10" data-id="<?php echo esc_attr( $vid ); ?>" role="button" tabindex="0" aria-label="Play video">
                    <img src="https://i.ytimg.com/vi/<?php echo esc_attr( $vid ); ?>/hqdefault.jpg" alt="Video from Venezuela" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy" decoding="async" />
                    <span class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></span>
                    <span class="absolute inset-0 flex items-center justify-center">
                        <span class="inline-flex items-center justify-center w-12 h-12 md:w-14 md:h-14 rounded-full bg-[#ED1C24] text-white shadow-pill transition-transform group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                        </span>
                    </span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ================= 2. WHAT HAPPENED ================= -->
    <section class="py-24 md:py-32 bg-slate-950">
        <div class="mx-auto max-w-6xl px-6">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center mb-16 md:mb-20">
                <div>
                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#ED1C24]">What Happened</span>
                    <h2 class="mt-6 text-4xl md:text-6xl font-display text-white leading-[0.95]">
                        39 seconds that changed <em class="italic text-[#ED1C24] font-display">Venezuela forever</em>
                    </h2>
                    <p class="mt-8 text-lg text-white/60 leading-relaxed">
                        On June 24, 2026, a magnitude 7.2 earthquake struck northern Venezuela — and just 39 seconds later, a second, even stronger 7.5 quake followed. In under a minute, entire neighborhoods were reduced to rubble. Aftershocks continue, and survivors urgently need shelter, clean water, food and medical care.
                    </p>
                </div>
                <figure>
                    <div class="relative overflow-hidden rounded-[2.5rem] shadow-glass ring-1 ring-white/10">
                        <img
                            src="<?php echo esc_url( $ve_upload . 'june26-ap-juan-pablo-arraez.webp' ); ?>"
                            alt="Rescuers search collapsed buildings after the June 2026 Venezuela earthquakes"
                            class="w-full h-full object-cover aspect-[4/5]"
                            loading="lazy"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/50 via-transparent to-transparent pointer-events-none"></div>
                    </div>
                    <figcaption class="mt-3 text-xs text-white/40">June 26 · Juan Pablo Arraez / AP</figcaption>
                </figure>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                <?php foreach ( $ve_stats as $i => $stat ) :
                    $ve_num_class = ! empty( $stat['sm'] ) ? 'text-3xl sm:text-4xl md:text-5xl' : 'text-3xl sm:text-4xl md:text-6xl';
                ?>
                <div class="p-5 md:p-8 rounded-[2rem] bg-white/5 border border-white/10">
                    <div class="<?php echo $ve_num_class; ?> font-display text-[#ED1C24] leading-none tracking-tight break-words mb-1"><?php echo wp_kses_post( $stat['num'] ); ?></div>
                    <p class="text-xs sm:text-sm text-white/60 leading-relaxed"><?php echo wp_kses_post( $stat['label'] ); ?></p>
                </div>
                <?php if ( $i === 3 ) : ?>
                <figure class="col-span-full my-2 md:my-4">
                    <div class="overflow-hidden rounded-[2rem] shadow-glass ring-1 ring-white/10">
                        <img
                            src="https://toctoc.ky/wp-content/uploads/2026/07/june27-ap-fernando-vergara3-scaled.webp"
                            alt="Aftermath of the June 2026 Venezuela earthquakes"
                            class="w-full h-56 md:h-96 object-cover"
                            loading="lazy"
                        />
                    </div>
                    <figcaption class="mt-2 text-xs text-white/40">June 27 · Fernando Vergara / AP</figcaption>
                </figure>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <p class="mt-6 text-xs text-white/40 max-w-3xl">
                Figures as of early July 2026; rescue efforts continue and numbers are still being confirmed. Sources:
                <a href="https://news.sky.com/story/venezuela-earthquake-live-high-casualties-feared-after-back-to-back-tremors-hit-south-american-country-13557399" target="_blank" rel="noopener" class="underline hover:text-white">Sky News</a>
                and
                <a href="https://elpais.com/internacional/2026-06-29/cuantos-edificios-han-colapsado-los-satelites-ya-han-identificado-434-bloques-destruidos.html" target="_blank" rel="noopener" class="underline hover:text-white">El País</a>. This page is updated regularly as the response evolves.
            </p>

            <p class="mt-10 text-lg text-white/70 leading-relaxed max-w-3xl">
                Thousands of families have lost their homes and everything they owned. Behind every number is a person — a child, a parent, a grandparent — waiting for help.
            </p>
        </div>
    </section>

    <!-- ================= VIDEOS ================= -->
    <section class="py-24 md:py-32 bg-slate-950 text-white">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl mb-16">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#ED1C24]">Video</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-white leading-[0.95]">Watch what <em class="italic text-[#ED1C24] font-display">happened</em></h2>
                <p class="mt-8 text-lg text-white/60 leading-relaxed">
                    Verified footage from Venezuela following the earthquakes. Tap any clip to play.
                </p>
            </div>

            <?php foreach ( $ve_videos as $ve_cat => $ve_ids ) : ?>
            <h3 class="text-center text-3xl md:text-4xl font-display text-white mb-8 mt-16 first:mt-0"><?php echo esc_html( $ve_cat ); ?></h3>
            <div class="flex flex-wrap justify-center gap-5 md:gap-6">
                <?php foreach ( $ve_ids as $vid ) : ?>
                <div class="ve-video group relative aspect-[9/16] w-[80%] sm:w-52 lg:w-60 overflow-hidden rounded-2xl bg-slate-800 cursor-pointer ring-1 ring-white/10" data-id="<?php echo esc_attr( $vid ); ?>" role="button" tabindex="0" aria-label="Play video">
                    <img src="https://i.ytimg.com/vi/<?php echo esc_attr( $vid ); ?>/hqdefault.jpg" alt="Video from Venezuela" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy" decoding="async" />
                    <span class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></span>
                    <span class="absolute inset-0 flex items-center justify-center">
                        <span class="inline-flex items-center justify-center w-12 h-12 md:w-14 md:h-14 rounded-full bg-[#ED1C24] text-white shadow-pill transition-transform group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                        </span>
                    </span>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endforeach; ?>
            <p class="mt-10 text-center text-xs text-white/40">Videos hosted on YouTube. Sources retain all rights.</p>
        </div>
    </section>

    <!-- ================= FROM THE GROUND (photos) ================= -->
    <section class="py-24 md:py-32 bg-white text-slate-900">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl mb-16">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#ED1C24]">From the Ground</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">The reality, from those <em class="italic text-[#ED1C24] font-display">living it</em></h2>
                <p class="mt-8 text-lg text-slate-500 leading-relaxed">
                    Verified images from trusted sources on the ground in Venezuela.
                </p>
            </div>

            <div class="flex md:grid md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-5 overflow-x-auto md:overflow-visible snap-x snap-mandatory pb-4 md:pb-0 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                <?php foreach ( $ve_gallery as $img ) :
                    $name    = preg_replace( '/\.webp$/', '', $img );
                    $caption = '';
                    if ( preg_match( '/^([a-z]+)(\d+)-(.*)$/', $name, $m ) ) {
                        $rest    = preg_replace( '/^ap-/', '', $m[3] );
                        $rest    = preg_replace( '/-?scaled$/', '', $rest );  // drop WP -scaled suffix
                        $rest    = preg_replace( '/-?\d+$/', '', $rest );      // drop trailing dedup numbers
                        $rest    = trim( $rest, '-' );
                        $author  = ucwords( str_replace( '-', ' ', $rest ) );
                        $caption = ucfirst( $m[1] ) . ' ' . $m[2] . ' · ' . $author . ' / AP';
                    }
                ?>
                <figure class="snap-center shrink-0 w-[75%] sm:w-[45%] md:w-auto">
                    <div class="aspect-[4/5] overflow-hidden rounded-2xl bg-slate-100">
                        <img
                            src="<?php echo esc_url( $ve_upload . $img ); ?>"
                            alt="Earthquake aftermath in Venezuela — <?php echo esc_attr( $caption ); ?>"
                            class="ve-gallery-img w-full h-full object-cover cursor-pointer transition-transform duration-500 hover:scale-105"
                            loading="lazy"
                            decoding="async"
                        />
                    </div>
                    <?php if ( $caption ) : ?>
                    <figcaption class="mt-2 text-[11px] text-slate-400"><?php echo esc_html( $caption ); ?></figcaption>
                    <?php endif; ?>
                </figure>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ================= 4. MAP ================= -->
    <section class="py-24 md:py-32 bg-slate-50 text-slate-900">
        <div class="mx-auto max-w-3xl px-6 text-center flex flex-col items-center">
            <span class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-[#ED1C24]/10 mb-8">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#ED1C24]"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
            </span>
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#ED1C24]">Where It Happened</span>
            <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">The most affected areas</h2>
            <p class="mt-8 text-lg text-slate-500 leading-relaxed">
                The earthquakes hit northern Venezuela, with the heaviest damage concentrated along the densely populated coastal region. Explore the interactive map to see the epicenters and the areas hit hardest.
            </p>
            <div class="mt-10">
                <a href="https://storymaps.arcgis.com/stories/89a9d8a7cade4a2b90c0d7ebe9983359" target="_blank" rel="noopener" class="group inline-flex items-center gap-3 rounded-full bg-slate-950 text-white pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 decoration-none">
                    View the interactive map
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-[#ED1C24] text-white transition-transform group-hover:rotate-45">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                    </span>
                </a>
                <p class="mt-4 text-xs text-slate-400">Opens in ArcGIS StoryMaps</p>
            </div>
        </div>
    </section>

    <!-- ================= QUOTE (Daniel Garrido, via Cayman Compass) ================= -->
    <section class="py-20 md:py-28 bg-slate-950 text-white">
        <div class="mx-auto max-w-4xl px-6 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 24 24" fill="currentColor" class="mx-auto mb-8 text-[#ED1C24]/40"><path d="M9.983 3v7.391c0 5.704-3.731 9.57-8.983 10.609l-.995-2.151c2.432-.917 3.995-3.638 3.995-5.849h-4v-10h9.983zm14.017 0v7.391c0 5.704-3.748 9.571-9 10.609l-.996-2.151c2.433-.917 3.996-3.638 3.996-5.849h-3.983v-10h9.983z"/></svg>
            <blockquote class="text-2xl md:text-4xl font-display leading-[1.25] text-white">
                Shipping goods into Venezuela is expensive, slow and complicated. <em class="italic text-[#ED1C24] font-display">Financial donations let trusted organisations already on the ground buy what people need most</em> and get help to communities much faster.
            </blockquote>
            <div class="mt-8">
                <p class="text-lg font-bold text-white">Daniel Garrido</p>
                <p class="text-sm text-white/50">Founder of TocToc · via <a href="https://www.caymancompass.com/2026/07/02/how-cayman-residents-can-help-venezuela-after-the-earthquakes/" target="_blank" rel="noopener" class="underline hover:text-white">Cayman Compass</a></p>
            </div>
        </div>
    </section>

    <!-- ================= 5. DONATE ================= -->
    <section id="donate" class="py-24 md:py-32 bg-white text-slate-900">
        <div class="mx-auto max-w-6xl px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#ED1C24]">Donate Now</span>
                <h2 class="mt-6 text-5xl md:text-7xl font-display text-slate-900 leading-[0.95]">Give hope in <em class="italic text-[#ED1C24] font-display">one click</em></h2>
                <p class="mt-8 text-lg text-slate-500 leading-relaxed">
                    Donate directly to trusted international organizations delivering emergency relief in Venezuela. 100% of your donation goes through these official appeals.
                </p>
                <div class="mt-8 inline-flex items-center gap-3 rounded-2xl bg-[#ED1C24]/5 border border-[#ED1C24]/15 px-6 py-4 text-left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0 text-[#ED1C24]"><path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C4 11.1 5 13 5 15a7 7 0 0 0 7 7z"/></svg>
                    <p class="text-base md:text-lg font-medium text-slate-700">Even <strong class="text-[#ED1C24]">$1</strong> can buy clean water for someone who has lost everything.</p>
                </div>
            </div>

            <h3 class="text-2xl font-display text-slate-900 mb-6">Donate locally in the Cayman Islands</h3>
            <div id="ve-local-transfer" class="mb-16 rounded-[2rem] bg-slate-50 border border-slate-100 p-8 flex flex-col md:flex-row md:items-center md:justify-between gap-8">
                <div>
                    <img src="https://redcross.org.ky/wp-content/themes/redcross/images/logo_60years.svg" alt="Cayman Islands Red Cross" class="h-14 w-auto mb-5" />
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#ED1C24] mb-2">Bank transfer · Butterfield Bank</p>
                    <p class="text-slate-600 text-sm">Cayman Islands Red Cross · International Emergency Appeals</p>
                    <p class="mt-3 text-xs text-slate-500 leading-relaxed">Or by cheque payable to <strong>Cayman Islands Red Cross</strong>, memo &ldquo;Venezuela Earthquake&rdquo;. Appeal open until 31 July.</p>
                </div>
                <div class="shrink-0 text-left md:text-right">
                    <p class="text-xs text-slate-400 font-medium mb-1">Account (KYD)</p>
                    <div class="flex items-center gap-3 md:justify-end">
                        <p id="ve-account" class="text-2xl md:text-3xl font-display text-slate-900">136-035054-0060</p>
                        <button id="ve-copy" type="button" class="inline-flex items-center gap-1.5 rounded-full bg-[#ED1C24] text-white px-4 py-2 text-xs font-bold hover:bg-[#c8161d] transition-colors shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>
                            <span id="ve-copy-label">Copy</span>
                        </button>
                    </div>
                </div>
            </div>

            <h3 class="text-2xl font-display text-slate-900 mb-6">Emergency relief</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ( $ve_donations as $d ) : ?>
                <a href="<?php echo esc_url( $d['url'] ); ?>" target="_blank" rel="noopener" data-donate="<?php echo esc_attr( $d['name'] ); ?>" class="group flex flex-col p-8 rounded-[2rem] bg-white border border-slate-100 shadow-soft hover:shadow-glass transition-all decoration-none">
                    <?php if ( ! empty( $d['logo'] ) ) : ?>
                    <div class="h-12 mb-6 flex items-center">
                        <img src="<?php echo esc_url( $d['logo'] ); ?>" alt="<?php echo esc_attr( $d['name'] ); ?> logo" class="max-h-12 w-auto object-contain" loading="lazy" onerror="this.style.display='none'" />
                    </div>
                    <?php endif; ?>
                    <h4 class="text-2xl font-display text-slate-900 mb-3 group-hover:text-[#ED1C24] transition-colors"><?php echo esc_html( $d['name'] ); ?></h4>
                    <p class="text-slate-500 text-sm leading-relaxed flex-1"><?php echo esc_html( $d['desc'] ); ?></p>
                    <span class="mt-6 inline-flex items-center gap-2 font-bold text-[#ED1C24] group-hover:gap-3 transition-all">
                        Donate Now
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </span>
                </a>
                <?php endforeach; ?>
            </div>

            <h3 class="text-2xl font-display text-slate-900 mt-16 mb-6">Donate for the children</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php foreach ( $ve_donations_children as $d ) : ?>
                <a href="<?php echo esc_url( $d['url'] ); ?>" target="_blank" rel="noopener" data-donate="<?php echo esc_attr( $d['name'] ); ?>" class="group flex flex-col p-8 rounded-[2rem] bg-white border border-slate-100 shadow-soft hover:shadow-glass transition-all decoration-none">
                    <?php if ( ! empty( $d['logo'] ) ) : ?>
                    <div class="h-12 mb-6 flex items-center">
                        <img src="<?php echo esc_url( $d['logo'] ); ?>" alt="<?php echo esc_attr( $d['name'] ); ?> logo" class="max-h-12 w-auto object-contain" loading="lazy" onerror="this.style.display='none'" />
                    </div>
                    <?php endif; ?>
                    <h4 class="text-2xl font-display text-slate-900 mb-3 group-hover:text-[#ED1C24] transition-colors"><?php echo esc_html( $d['name'] ); ?></h4>
                    <p class="text-slate-500 text-sm leading-relaxed flex-1"><?php echo esc_html( $d['desc'] ); ?></p>
                    <span class="mt-6 inline-flex items-center gap-2 font-bold text-[#ED1C24] group-hover:gap-3 transition-all">
                        Donate Now
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </span>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php if ( $ve_show_events && ! empty( $ve_events ) ) : ?>
    <!-- ================= LOCAL EVENTS ================= -->
    <section class="py-24 md:py-32 bg-slate-50 text-slate-900">
        <div class="mx-auto max-w-6xl px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#ED1C24]">Local ways to help</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Events in the Cayman Islands</h2>
                <p class="mt-8 text-lg text-slate-500 leading-relaxed">The Cayman community is coming together for Venezuela. Join one of these local fundraisers and help while you are at it.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php foreach ( $ve_events as $ev ) :
                    $ev_link = ! empty( $ev['url'] );
                ?>
                <?php if ( $ev_link ) : ?>
                <a href="<?php echo esc_url( $ev['url'] ); ?>" target="_blank" rel="noopener" class="group flex flex-col p-8 rounded-[2rem] bg-white border border-slate-100 shadow-soft hover:shadow-glass transition-all decoration-none">
                <?php else : ?>
                <article class="flex flex-col p-8 rounded-[2rem] bg-white border border-slate-100 shadow-soft">
                <?php endif; ?>
                    <p class="text-xs font-bold uppercase tracking-widest text-[#ED1C24] mb-4"><?php echo esc_html( $ev['date'] ); ?></p>
                    <h3 class="text-2xl font-display text-slate-900 mb-3 <?php echo $ev_link ? 'group-hover:text-[#ED1C24] transition-colors' : ''; ?>"><?php echo esc_html( $ev['name'] ); ?></h3>
                    <p class="text-slate-500 text-sm leading-relaxed flex-1"><?php echo esc_html( $ev['desc'] ); ?></p>
                    <?php if ( $ev_link ) : ?>
                    <span class="mt-6 inline-flex items-center gap-2 font-bold text-[#ED1C24] group-hover:gap-3 transition-all">
                        Visit website
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </span>
                    <?php endif; ?>
                <?php echo $ev_link ? '</a>' : '</article>'; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if ( $ve_show_news && ! empty( $ve_news ) ) : ?>
    <!-- ================= NEWS / MEDIA (hidden until content confirmed) ================= -->
    <section class="py-24 md:py-32 bg-white text-slate-900">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl mb-16">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#ED1C24]">In the news</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Latest coverage</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ( $ve_news as $n ) : ?>
                <article class="group rounded-[2rem] border border-slate-100 shadow-soft overflow-hidden bg-white">
                    <?php if ( ! empty( $n['youtube'] ) ) : ?>
                    <div class="ve-video group relative aspect-video w-full overflow-hidden bg-slate-800 cursor-pointer" data-id="<?php echo esc_attr( $n['youtube'] ); ?>" role="button" tabindex="0" aria-label="Play video">
                        <img src="https://i.ytimg.com/vi/<?php echo esc_attr( $n['youtube'] ); ?>/hqdefault.jpg" alt="<?php echo esc_attr( $n['title'] ); ?>" class="absolute inset-0 w-full h-full object-cover" loading="lazy" />
                        <span class="absolute inset-0 flex items-center justify-center">
                            <span class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-[#ED1C24] text-white shadow-pill">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                            </span>
                        </span>
                    </div>
                    <?php elseif ( ! empty( $n['image'] ) ) : ?>
                    <a href="<?php echo esc_url( $n['url'] ); ?>" target="_blank" rel="noopener" class="block aspect-video overflow-hidden">
                        <img src="<?php echo esc_url( $n['image'] ); ?>" alt="<?php echo esc_attr( $n['title'] ); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy" />
                    </a>
                    <?php endif; ?>
                    <div class="p-8">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-2"><?php echo esc_html( $n['date'] ); ?><?php if ( ! empty( $n['source'] ) ) echo ' · ' . esc_html( $n['source'] ); ?></p>
                        <h3 class="text-2xl font-display text-slate-900 mb-4"><?php echo esc_html( $n['title'] ); ?></h3>
                        <?php if ( ! empty( $n['url'] ) ) : ?>
                        <a href="<?php echo esc_url( $n['url'] ); ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-2 font-bold text-[#ED1C24] hover:gap-3 transition-all decoration-none">
                            <?php echo ! empty( $n['youtube'] ) ? 'Watch the interview' : 'Read the full story'; ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                        <?php endif; ?>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ================= FAQ (AEO / GEO — Cayman searches) ================= -->
    <?php
    $ve_faqs = [
        [
            'q' => 'How can I donate to Venezuela from the Cayman Islands?',
            'a' => 'You can donate online in minutes to trusted international relief organizations listed on this page — the British Red Cross, Global Empowerment Mission and UN Crisis Relief. If you prefer a local bank transfer, the Cayman Islands Red Cross accepts donations for its International Emergency Appeals at Butterfield Bank, account 136-035054-0060 (KYD).',
        ],
        [
            'q' => 'Where can I donate to help the children affected by the Venezuela earthquake?',
            'a' => 'To help children specifically, donate to UNICEF UK or Save the Children. Both are providing clean water, healthcare, safe spaces and emergency support for children and families in Venezuela.',
        ],
        [
            'q' => 'Is the Cayman Islands Red Cross collecting donations for Venezuela?',
            'a' => 'Yes. The Cayman Islands Red Cross is collecting donations locally through its International Emergency Appeals. You can make a bank transfer directly to their Butterfield Bank account, number 136-035054-0060 (KYD).',
        ],
        [
            'q' => 'What happened in the 2026 Venezuela earthquakes?',
            'a' => 'On June 24, 2026, two powerful earthquakes struck northern Venezuela just 39 seconds apart — a magnitude 7.2 followed by a 7.5. At least 2,295 people have been confirmed killed, and the UN warns the death toll could reach 10,000. More than 43,000 people are reported missing, over 15,000 have been left homeless, and hundreds of buildings have collapsed.',
        ],
        [
            'q' => 'Are these Venezuela donation organizations trustworthy?',
            'a' => 'Yes. Every organization listed here is an established international humanitarian body — the British Red Cross, UNICEF, the United Nations (UN Crisis Relief), Save the Children and Global Empowerment Mission — and donations are made directly through their own official appeal pages.',
        ],
    ];
    ?>
    <section class="py-24 md:py-32 bg-slate-50 text-slate-900">
        <div class="mx-auto max-w-4xl px-6">
            <div class="text-center mb-16">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#ED1C24]">Donation FAQ</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">How to help from <em class="italic text-[#ED1C24] font-display">the Cayman Islands</em></h2>
            </div>
            <div class="space-y-4">
                <?php foreach ( $ve_faqs as $faq ) : ?>
                <details class="group rounded-[1.5rem] border border-slate-100 bg-white p-7 shadow-soft transition-all">
                    <summary class="flex cursor-pointer items-center justify-between gap-4 text-xl md:text-2xl font-display text-slate-900 list-none [&::-webkit-details-marker]:hidden">
                        <span><?php echo esc_html( $faq['q'] ); ?></span>
                        <span class="shrink-0 inline-flex items-center justify-center w-9 h-9 rounded-full bg-[#ED1C24]/10 text-[#ED1C24] transition-transform group-open:rotate-45">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"/><path d="M5 12h14"/></svg>
                        </span>
                    </summary>
                    <p class="mt-5 text-base md:text-lg leading-relaxed text-slate-600"><?php echo esc_html( $faq['a'] ); ?></p>
                </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <script type="application/ld+json">
    <?php
    echo wp_json_encode( [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => array_map( function ( $f ) {
            return [
                '@type'          => 'Question',
                'name'           => $f['q'],
                'acceptedAnswer' => [ '@type' => 'Answer', 'text' => $f['a'] ],
            ];
        }, $ve_faqs ),
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
    ?>
    </script>

    <!-- ================= 6. SHARE ================= -->
    <section class="py-20 md:py-28 bg-slate-950 text-center">
        <div class="mx-auto max-w-2xl px-6">
            <h2 class="text-4xl md:text-6xl font-display leading-[0.95] text-white">Can't donate? <em class="italic text-[#ED1C24] font-display">Share it</em></h2>
            <p class="mt-6 text-lg text-white/60">Every share reaches someone who can give. Help us get the word out across the Cayman Islands.</p>
            <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://toctoc.ky/venezuela/" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-full bg-white/5 border border-white/10 px-6 py-3 text-sm font-bold text-white hover:bg-white/10 transition-colors decoration-none">Share on Facebook</a>
                <a href="https://wa.me/?text=Venezuela%20Earthquake%20Appeal%20%E2%80%94%20please%20help%20from%20the%20Cayman%20Islands%3A%20https://toctoc.ky/venezuela/" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-full bg-white/5 border border-white/10 px-6 py-3 text-sm font-bold text-white hover:bg-white/10 transition-colors decoration-none">Share on WhatsApp</a>
                <a href="https://twitter.com/intent/tweet?text=Venezuela%20Earthquake%20Appeal%20%E2%80%94%20please%20help%20from%20the%20Cayman%20Islands&url=https://toctoc.ky/venezuela/" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-full bg-white/5 border border-white/10 px-6 py-3 text-sm font-bold text-white hover:bg-white/10 transition-colors decoration-none">Share on X</a>
            </div>
        </div>
    </section>

    <!-- ================= IMPACT BAND (final CTA) ================= -->
    <section class="relative py-32 md:py-48 overflow-hidden">
        <img
            src="https://toctoc.ky/wp-content/uploads/2026/07/june25-ap-pedro-mattey-scaled.webp"
            alt="A family amid the destruction after the June 2026 Venezuela earthquakes"
            class="absolute inset-0 w-full h-full object-cover"
            loading="lazy"
        />
        <div class="absolute inset-0 bg-slate-950/75"></div>

        <div class="relative z-10 mx-auto max-w-3xl px-6 text-center">
            <p class="text-3xl md:text-5xl font-display text-white leading-[1.12]">
                When the ground stops shaking, the need is just beginning. <em class="italic text-[#ED1C24] font-display">Your donation brings shelter, water and hope.</em>
            </p>
            <div class="mt-12">
                <a href="#donate" class="group inline-flex items-center justify-center gap-3 rounded-full bg-[#ED1C24] text-white pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 hover:bg-[#c8161d] decoration-none">
                    Donate Now
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white text-[#ED1C24] transition-transform group-hover:rotate-45">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                    </span>
                </a>
            </div>
        </div>

        <span class="absolute bottom-3 right-4 z-10 text-[10px] text-white/40">Photo: Pedro Mattey / AP</span>
    </section>

</main>

<!-- Persistent mobile Donate button (always visible on phones) -->
<a href="#donate" class="md:hidden fixed bottom-4 inset-x-4 z-[800] inline-flex items-center justify-center gap-2 rounded-full bg-[#ED1C24] text-white py-4 text-base font-bold shadow-pill hover:bg-[#c8161d] transition-colors decoration-none">
    Donate Now
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
</a>

<!-- Gallery lightbox -->
<div id="ve-lightbox" class="fixed inset-0 z-[1100] hidden items-center justify-center bg-black/90 p-4 cursor-zoom-out">
    <img id="ve-lightbox-img" src="" alt="" class="max-w-full max-h-full rounded-lg object-contain" />
    <button id="ve-lightbox-close" type="button" aria-label="Close" class="absolute top-5 right-5 w-11 h-11 rounded-full bg-white/10 text-white flex items-center justify-center hover:bg-white/20 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>
</div>

<script>
(function () {
    var box = document.getElementById('ve-map-embed');
    var btn = document.getElementById('ve-map-load');
    if (!box || !btn) return;

    // Warm up the connection to ArcGIS on hover, so the click loads faster.
    var warmed = false;
    function warm() {
        if (warmed) return;
        warmed = true;
        ['https://www.arcgis.com', 'https://js.arcgis.com'].forEach(function (h) {
            var l = document.createElement('link');
            l.rel = 'preconnect';
            l.href = h;
            l.crossOrigin = '';
            document.head.appendChild(l);
        });
    }
    btn.addEventListener('pointerenter', warm);

    btn.addEventListener('click', function () {
        warm();
        var f = document.createElement('iframe');
        f.src = box.getAttribute('data-src');
        f.className = 'w-full h-[640px] md:h-[820px] border-0';
        f.setAttribute('allow', 'fullscreen');
        f.setAttribute('allowfullscreen', '');
        f.setAttribute('referrerpolicy', 'strict-origin');
        f.setAttribute('title', 'Live dashboard of the 2026 Venezuela earthquakes');
        box.innerHTML = '';
        box.appendChild(f);
    });
})();

(function () {
    var copyBtn = document.getElementById('ve-copy');
    var account = document.getElementById('ve-account');
    var label   = document.getElementById('ve-copy-label');
    if (!copyBtn || !account) return;
    copyBtn.addEventListener('click', function () {
        var number = account.textContent.trim();
        navigator.clipboard.writeText(number).then(function () {
            label.textContent = 'Copied!';
            setTimeout(function () { label.textContent = 'Copy'; }, 2000);
        });
    });
})();

(function () {
    document.querySelectorAll('.ve-video').forEach(function (el) {
        function play() {
            var id = el.getAttribute('data-id');
            var f = document.createElement('iframe');
            f.src = 'https://www.youtube.com/embed/' + id + '?autoplay=1&rel=0&playsinline=1';
            f.className = 'absolute inset-0 w-full h-full';
            f.setAttribute('frameborder', '0');
            f.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
            f.setAttribute('allowfullscreen', '');
            el.innerHTML = '';
            el.appendChild(f);
        }
        el.addEventListener('click', play);
        el.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); play(); }
        });
    });
})();

(function () {
    var lb    = document.getElementById('ve-lightbox');
    var lbImg = document.getElementById('ve-lightbox-img');
    if (!lb || !lbImg) return;
    function open(src, alt) {
        lbImg.src = src;
        lbImg.alt = alt || '';
        lb.classList.remove('hidden');
        lb.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    function close() {
        lb.classList.add('hidden');
        lb.classList.remove('flex');
        lbImg.src = '';
        document.body.style.overflow = '';
    }
    document.querySelectorAll('.ve-gallery-img').forEach(function (img) {
        img.addEventListener('click', function () {
            open(img.getAttribute('src'), img.getAttribute('alt'));
        });
    });
    lb.addEventListener('click', close);
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') close();
    });
})();

/* Donation click tracking -> Google Tag Manager (dataLayer) */
(function () {
    window.dataLayer = window.dataLayer || [];
    document.querySelectorAll('[data-donate]').forEach(function (a) {
        a.addEventListener('click', function () {
            window.dataLayer.push({
                event: 'donate_click',
                donate_org: a.getAttribute('data-donate'),
                donate_url: a.getAttribute('href')
            });
        });
    });
    var copyBtn2 = document.getElementById('ve-copy');
    if (copyBtn2) {
        copyBtn2.addEventListener('click', function () {
            window.dataLayer.push({
                event: 'donate_click',
                donate_org: 'Cayman Islands Red Cross (bank transfer)',
                donate_url: 'account-copied'
            });
        });
    }
})();
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "@id": "https://toctoc.ky/venezuela/#webpage",
  "url": "https://toctoc.ky/venezuela/",
  "name": "Venezuela Earthquake Appeal — Donate Now | Cayman Islands",
  "description": "Verified ways for Cayman Islands residents to donate to trusted organizations responding to the June 2026 Venezuela earthquakes.",
  "inLanguage": "en",
  "isPartOf": { "@id": "https://toctoc.ky/#website" },
  "about": { "@type": "Place", "name": "Venezuela" },
  "creator": {
    "@type": "Person",
    "name": "Daniel Garrido",
    "jobTitle": "Founder & CEO",
    "worksFor": { "@type": "Organization", "name": "TocToc Marketing", "url": "https://toctoc.ky" }
  },
  "citation": {
    "@type": "NewsArticle",
    "headline": "How Cayman residents can help Venezuela after the earthquakes",
    "url": "https://www.caymancompass.com/2026/07/02/how-cayman-residents-can-help-venezuela-after-the-earthquakes/",
    "datePublished": "2026-07-02",
    "author": { "@type": "Person", "name": "Daphne Ewing-Chow" },
    "publisher": { "@type": "Organization", "name": "Cayman Compass", "url": "https://www.caymancompass.com" }
  }
}
</script>

<?php get_footer(); ?>
