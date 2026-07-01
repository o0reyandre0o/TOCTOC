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
    [ 'num' => '1,700+',   'label' => 'Lives lost so far (as of July 1, 2026)' ],
    [ 'num' => '10,000+',  'label' => 'People injured' ],
    [ 'num' => '43,000+',  'label' => 'People still missing' ],
    [ 'num' => '70,000+',  'label' => 'Families affected' ],
    [ 'num' => '59,000+',  'label' => 'Buildings damaged or destroyed' ],
    [ 'num' => '200+',     'label' => 'Buildings fully collapsed' ],
    [ 'num' => 'Thousands','label' => 'Children left orphaned', 'sm' => true ],
];

// --- General relief donation links ---
$ve_donations = [
    [
        'name' => 'British Red Cross',
        'desc' => 'Venezuela Earthquake Crisis Appeal — emergency shelter, medical aid and relief for affected communities.',
        'url'  => 'https://donate.redcross.org.uk/appeal/venezuela-earthquake-crisis',
    ],
    [
        'name' => 'Global Empowerment Mission',
        'desc' => 'On-the-ground disaster response delivering aid and essentials directly to families who lost everything.',
        'url'  => 'https://www.globalempowermentmission.org/mission/venezuela-earthquakes/',
    ],
    [
        'name' => 'UN Crisis Relief',
        'desc' => 'The United Nations coordinated humanitarian response for the Venezuela earthquake crisis.',
        'url'  => 'https://crisisrelief.un.org/en/donate-venezuela-crisis',
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
];

// --- Donations for children ---
$ve_donations_children = [
    [
        'name' => 'UNICEF UK',
        'desc' => 'Protecting children affected by the earthquakes with clean water, healthcare and safe spaces.',
        'url'  => 'https://www.unicef.org.uk/donate/donate-to-our-venezuela-earthquake-appeal/',
    ],
    [
        'name' => 'Save the Children',
        'desc' => 'Emergency support for children and families who have lost their homes and loved ones.',
        'url'  => 'https://www.savethechildren.org.uk/how-you-can-help/emergencies/venezuela-earthquake-donate',
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

            <h1 class="text-5xl sm:text-6xl md:text-8xl font-display leading-[0.9] text-white">
                Venezuela <br class="sm:hidden" /><em class="italic text-[#ED1C24] font-display">Needs Us</em> Now
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
        </div>

        <span class="absolute bottom-3 right-4 z-10 text-[10px] text-white/40">Photo: Matias Delacroix / AP</span>
    </section>

    <!-- ================= 2. WHAT HAPPENED ================= -->
    <section class="py-24 md:py-32 bg-slate-950">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl mb-16">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#ED1C24]">What Happened</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-white leading-[0.95]">
                    39 seconds that changed <em class="italic text-[#ED1C24] font-display">Venezuela forever</em>
                </h2>
                <p class="mt-8 text-lg text-white/60 leading-relaxed">
                    On June 24, 2026, a magnitude 7.2 earthquake struck northern Venezuela — and just 39 seconds later, a second, even stronger 7.5 quake followed. In under a minute, entire neighborhoods were reduced to rubble. Aftershocks continue, and survivors urgently need shelter, clean water, food and medical care.
                </p>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                <?php foreach ( $ve_stats as $stat ) :
                    $ve_num_class = ! empty( $stat['sm'] ) ? 'text-3xl sm:text-4xl md:text-5xl' : 'text-3xl sm:text-4xl md:text-6xl';
                ?>
                <div class="p-5 md:p-8 rounded-[2rem] bg-white/5 border border-white/10">
                    <div class="<?php echo $ve_num_class; ?> font-display text-[#ED1C24] leading-none tracking-tight break-words mb-4"><?php echo wp_kses_post( $stat['num'] ); ?></div>
                    <p class="text-xs sm:text-sm text-white/60 leading-relaxed"><?php echo wp_kses_post( $stat['label'] ); ?></p>
                </div>
                <?php endforeach; ?>
            </div>

            <p class="mt-6 text-xs text-white/40 max-w-3xl">
                Figures from Venezuelan authorities and the UN, as of early July 2026. Rescue efforts continue and numbers are still being confirmed — the UN estimates more than 50,000 people may remain missing.
            </p>

            <p class="mt-10 text-lg text-white/70 leading-relaxed max-w-3xl">
                Thousands of families have lost their homes and everything they owned. Behind every number is a person — a child, a parent, a grandparent — waiting for help.
            </p>
        </div>
    </section>

    <!-- ================= 3. FROM THE GROUND (social media) ================= -->
    <section class="py-24 md:py-32 bg-white text-slate-900">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl mb-16">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#ED1C24]">From the Ground</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">The reality, from those <em class="italic text-[#ED1C24] font-display">living it</em></h2>
                <p class="mt-8 text-lg text-slate-500 leading-relaxed">
                    Verified footage and images shared by people and trusted sources on the ground in Venezuela.
                </p>
            </div>

            <div class="columns-1 sm:columns-2 lg:columns-3 gap-6 [column-fill:_balance]">
                <?php foreach ( $ve_gallery as $img ) :
                    $name    = preg_replace( '/\.webp$/', '', $img );
                    $caption = '';
                    if ( preg_match( '/^([a-z]+)(\d+)-(.*)$/', $name, $m ) ) {
                        $rest    = preg_replace( '/^ap-/', '', $m[3] );   // drop "ap-" prefix
                        $rest    = preg_replace( '/\d+$/', '', $rest );    // drop trailing 2, 3...
                        $rest    = trim( $rest, '-' );                     // drop trailing dash
                        $author  = ucwords( str_replace( '-', ' ', $rest ) );
                        $caption = ucfirst( $m[1] ) . ' ' . $m[2] . ' · ' . $author . ' / AP';
                    }
                ?>
                <figure class="break-inside-avoid mb-6">
                    <div class="overflow-hidden rounded-[1.5rem] shadow-soft bg-slate-100">
                        <img
                            src="<?php echo esc_url( $ve_upload . $img ); ?>"
                            alt="Earthquake aftermath in Venezuela — <?php echo esc_attr( $caption ); ?>"
                            class="w-full h-auto object-cover"
                            loading="lazy"
                        />
                    </div>
                    <?php if ( $caption ) : ?>
                    <figcaption class="mt-2 text-xs text-slate-400"><?php echo esc_html( $caption ); ?></figcaption>
                    <?php endif; ?>
                </figure>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ================= 4. MAP ================= -->
    <section class="py-24 md:py-32 bg-slate-50 text-slate-900">
        <div class="mx-auto w-full px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#ED1C24]">Where It Happened</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">The most affected areas</h2>
                <p class="mt-8 text-lg text-slate-500 leading-relaxed">
                    The earthquakes hit northern Venezuela, with the heaviest damage concentrated along the densely populated coastal region.
                </p>
            </div>

            <figure class="mx-auto w-full max-w-[1800px]">
                <!-- Facade: the heavy ArcGIS dashboard loads only on click, keeping the page fast. -->
                <div id="ve-map-embed" data-src="https://www.arcgis.com/apps/dashboards/e414897f14154a55b33ce6c84b147c23" class="overflow-hidden rounded-[2.5rem] shadow-glass bg-slate-100">
                    <button type="button" id="ve-map-load" class="group w-full h-[420px] md:h-[560px] flex flex-col items-center justify-center gap-4 text-center px-6 hover:bg-slate-200/60 transition-colors">
                        <span class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white shadow-soft">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#ED1C24]"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                        </span>
                        <span class="text-2xl md:text-3xl font-display text-slate-900">Live earthquake dashboard</span>
                        <span class="text-sm text-slate-500 max-w-sm">Interactive map and real-time figures from ArcGIS. Loads on demand so this page stays fast.</span>
                        <span class="mt-2 inline-flex items-center gap-2 rounded-full bg-[#ED1C24] text-white px-6 py-3 text-sm font-bold group-hover:scale-105 transition-transform">
                            Load live data
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </button>
                </div>
                <figcaption class="mt-3 text-center text-xs text-slate-400">Live dashboard · Source: ArcGIS</figcaption>
            </figure>
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
            </div>

            <h3 class="text-2xl font-display text-slate-900 mb-6">Emergency relief</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php foreach ( $ve_donations as $d ) : ?>
                <a href="<?php echo esc_url( $d['url'] ); ?>" target="_blank" rel="noopener" class="group flex flex-col p-8 rounded-[2rem] bg-white border border-slate-100 shadow-soft hover:shadow-glass transition-all decoration-none">
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
                <a href="<?php echo esc_url( $d['url'] ); ?>" target="_blank" rel="noopener" class="group flex flex-col p-8 rounded-[2rem] bg-white border border-slate-100 shadow-soft hover:shadow-glass transition-all decoration-none">
                    <h4 class="text-2xl font-display text-slate-900 mb-3 group-hover:text-[#ED1C24] transition-colors"><?php echo esc_html( $d['name'] ); ?></h4>
                    <p class="text-slate-500 text-sm leading-relaxed flex-1"><?php echo esc_html( $d['desc'] ); ?></p>
                    <span class="mt-6 inline-flex items-center gap-2 font-bold text-[#ED1C24] group-hover:gap-3 transition-all">
                        Donate Now
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </span>
                </a>
                <?php endforeach; ?>
            </div>

            <!-- Local bank-transfer option for Cayman donors -->
            <div class="mt-12 rounded-[2rem] bg-slate-50 border border-slate-100 p-8 flex flex-col md:flex-row md:items-center md:justify-between gap-8">
                <div>
                    <img src="https://redcross.org.ky/wp-content/themes/redcross/images/logo_60years.svg" alt="Cayman Islands Red Cross" class="h-14 w-auto mb-5" />
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#ED1C24] mb-2">Prefer a local bank transfer?</p>
                    <p class="text-slate-600 text-sm">Cayman Islands Red Cross · International Emergency Appeals · Butterfield Bank</p>
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
        </div>
    </section>

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

</main>

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
</script>

<?php get_footer(); ?>
