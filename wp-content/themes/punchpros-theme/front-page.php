<?php get_header(); ?>

<?php
$img = static function ( string $path ) : string {
    return esc_url( get_theme_file_uri( 'assets/images/' . $path ) );
};
$vid = static function ( string $path ) : string {
    return esc_url( get_theme_file_uri( 'assets/videos/' . $path ) );
};
?>

<?php // ── Hero ─ video background ── ?>
<section class="relative bg-black min-h-screen flex items-center justify-center overflow-hidden -mt-16">
    <video autoplay muted loop playsinline preload="none"
           poster="<?php echo $img( 'hero-bg.webp' ); ?>"
           class="absolute inset-0 w-full h-full object-cover">
        <source src="<?php echo $vid( 'boxing-training.mp4' ); ?>" type="video/mp4">
    </video>
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative z-10 text-center px-4">
        <h1 class="text-white text-4xl sm:text-6xl md:text-7xl lg:text-8xl tracking-tight leading-none">
            WHERE CHAMPIONS<br>GEAR UP.
        </h1>
        <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"
           class="btn mt-8 inline-block">
            BEKIJK BOKSHANDSCHOENEN & GEAR &rarr;
        </a>
    </div>
</section>

<?php // ── Best Sellers ── ?>
<?php if ( class_exists( 'WooCommerce' ) ) : ?>
<section class="py-16 sm:py-24 bg-white">
    <div class="container-pp">
        <h2 class="section-heading">BEST SELLERS</h2>
        <?php echo do_shortcode( '[products limit="8" columns="4" best_selling="true" orderby="popularity"]' ); ?>
    </div>
</section>
<?php endif; ?>

<?php // ── Promo Banner ── ?>
<section class="relative bg-black overflow-hidden min-h-[400px] sm:min-h-[500px] flex items-center">
    <div class="absolute inset-0">
        <img src="<?php echo $img( 'promo-banner.webp' ); ?>"
             alt="PunchPros Knokkelbeschermers"
             width="1400" height="700"
             loading="lazy"
             class="w-full h-full object-cover object-[70%_center] sm:object-right">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-black via-black/80 to-transparent"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>

    <div class="relative z-10 container-pp py-16 sm:py-24 w-full">
        <div class="max-w-xl">
            <p class="text-primary text-xs sm:text-sm font-bold tracking-[0.2em] mb-4 uppercase" style="font-family: var(--font-body);">
                De #1 hand protectie voor vechters wereldwijd
            </p>
            <h2 class="text-white text-4xl sm:text-5xl md:text-7xl leading-[0.9] mb-8 drop-shadow-lg">
                VANAF NU<br>BESCHIKBAAR<br>
                <span class="text-primary">KNOKKEL&shy;BESCHERMERS</span>
            </h2>
            <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"
               class="btn inline-flex items-center gap-2 hover:gap-4 hover:shadow-[0_0_30px_rgba(245,166,35,0.3)]">
                BEKIJK ONZE KNOKKELBESCHERMERS
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
            </a>
        </div>
    </div>
</section>

<?php // ── Champions ── ?>
<?php
$champions = [
    [ 'name' => 'Julio Cesar La Cruz',  'title' => '2x Olympisch kampioen',        'img' => 'champions/julio.webp' ],
    [ 'name' => 'Geronimo Hartmans',    'title' => 'Nationaal kampioen -63,5kg',   'img' => 'champions/geronimo.webp' ],
    [ 'name' => 'Roniel Iglesias',       'title' => '2x Olympisch kampioen',        'img' => 'champions/roniel.webp' ],
    [ 'name' => 'Gabriëlla Weerheim',   'title' => 'Nationaal kampioen -57kg',     'img' => 'champions/gabriella.webp' ],
    [ 'name' => 'Farshid Bos',          'title' => 'Nationaal kampioen -67kg',     'img' => 'champions/farshid.webp' ],
];
?>
<section class="py-16 sm:py-24 bg-white">
    <div class="container-pp">
        <h2 class="section-heading text-primary">#PUNCHPROSCHAMPIONS</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
            <?php foreach ( $champions as $champ ) : ?>
                <div class="text-center">
                    <div class="relative aspect-[3/4] bg-gray-100 rounded-[32px] mb-3 overflow-hidden shadow-sm">
                        <img src="<?php echo $img( $champ['img'] ); ?>"
                             alt="<?php echo esc_attr( $champ['name'] ); ?>"
                             class="absolute inset-0 w-full h-full object-cover hover:scale-105 transition-transform duration-500"
                             loading="lazy">
                    </div>
                    <p class="text-sm text-gray-600" style="text-transform: none; font-family: var(--font-body);">
                        <?php echo esc_html( $champ['name'] ); ?> &ndash; <?php echo esc_html( $champ['title'] ); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php // ── Testimonials ── ?>
<?php
$testimonials = [
    [ 'quote' => 'Sinds ik de PunchPros knokkelbeschermers gebruik, heb ik geen last meer van pijn in mijn handen na het boksen. Eindelijk kan ik volledig focussen op mijn techniek.', 'name' => 'ROY', 'role' => 'Professioneel bokser' ],
    [ 'quote' => 'Op het NK had ik voor het eerst de PunchPros aan. Mijn handen voelden beschermd en ik kon vol vertrouwen slaan. Top product!', 'name' => 'HAYE', 'role' => 'A-klasse bokser' ],
    [ 'quote' => 'Ik train zes dagen per week en had constant last van mijn knokkels. Dankzij PunchPros kan ik nu weer zonder beperkingen trainen.', 'name' => 'SALEHR', 'role' => 'A-klasse bokser' ],
    [ 'quote' => 'Na een blessure kon ik nauwelijks meer op de tas slaan. Met de knokkelbeschermers van PunchPros train ik weer pijnvrij.', 'name' => 'DANIËL', 'role' => 'Amateur bokser – Recreant' ],
    [ 'quote' => 'Na maandenlang pijn in mijn pols te hebben gehad en met een operatie in de planning, kon ik dankzij het gebruik van PunchPros mijn operatie annuleren.', 'name' => 'TIM', 'role' => 'Amateur bokser – Recreant' ],
];
?>
<section class="py-16 sm:py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <div class="text-5xl sm:text-6xl leading-none mb-8" style="font-family: var(--font-heading);">&#10077;&#10077;</div>
        <div class="space-y-12">
            <?php foreach ( $testimonials as $i => $t ) : ?>
                <blockquote class="<?php echo $i > 0 ? 'hidden' : ''; ?>" data-testimonial="<?php echo $i; ?>">
                    <p class="text-xl sm:text-2xl md:text-3xl leading-relaxed mb-8" style="font-family: var(--font-body); text-transform: none;">
                        <?php echo esc_html( $t['quote'] ); ?>
                    </p>
                    <footer>
                        <cite class="not-italic block text-sm tracking-wider" style="font-family: var(--font-heading);"><?php echo esc_html( $t['name'] ); ?></cite>
                        <span class="text-gray-500 text-sm mt-1 block" style="text-transform: none; font-family: var(--font-body);"><?php echo esc_html( $t['role'] ); ?></span>
                    </footer>
                </blockquote>
            <?php endforeach; ?>
        </div>
        <div class="flex justify-center gap-2 mt-8">
            <?php for ( $i = 0; $i < count( $testimonials ); $i++ ) : ?>
                <button class="testimonial-dot w-2.5 h-2.5 rounded-full transition-colors cursor-pointer <?php echo $i === 0 ? 'bg-black' : 'bg-gray-300'; ?>"
                        data-index="<?php echo $i; ?>" aria-label="Testimonial <?php echo $i + 1; ?>"></button>
            <?php endfor; ?>
        </div>
    </div>
</section>

<?php // ── Over Het Merk ── ?>
<section class="py-16 sm:py-20 bg-white" style="font-family: var(--font-body); text-transform: none;">
    <div class="max-w-5xl mx-auto px-4">
        <h2 class="section-heading">OVER HET MERK</h2>
        <p class="text-center text-gray-600 mb-8 max-w-4xl mx-auto">
            Wat begon als een zoektocht naar betere bescherming voor de knokkels van boksers, groeide uit tot een merk dat sporters in elke fase ondersteunt, van de eerste training tot het hoogste niveau.
        </p>
        <div class="space-y-4 max-w-4xl mx-auto text-center text-gray-700">
            <p>&check; <strong>Ontwikkeld door sporters, voor sporters:</strong> Elk product is ontstaan uit praktijkervaring in de ring.</p>
            <p>&check; <strong>Altijd getest, nooit zomaar verkocht:</strong> Voordat iets het PunchPros-label krijgt, wordt het uitvoerig gedragen, getest en verbeterd.</p>
            <p>&check; <strong>Eerlijke prijzen, duurzame kwaliteit:</strong> Goede bescherming moet bereikbaar zijn voor iedereen.</p>
            <p>&check; <strong>Volledige bescherming, één merk:</strong> Van knokkel tot kaak, wij beschermen wat jij op het spel zet.</p>
        </div>
        <div class="text-center mt-10">
            <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'over-ons' ) ) ); ?>"
               class="text-sm font-bold tracking-wider underline hover:text-primary transition-colors"
               style="font-family: var(--font-heading);">
                LEES ONS VOLLEDIGE VERHAAL &rarr;
            </a>
        </div>
    </div>
</section>

<?php // ── Trust Indicators ── ?>
<section class="bg-gray-100 py-12 sm:py-16">
    <div class="max-w-6xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <div class="flex flex-col items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
            <p class="font-bold text-sm" style="font-family: var(--font-body); text-transform: none;">Wereldwijde Verzending</p>
        </div>
        <div class="flex flex-col items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
            <p class="font-bold text-sm" style="font-family: var(--font-body); text-transform: none;">30 dagen bedenktijd</p>
        </div>
        <div class="flex flex-col items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg>
            <p class="font-bold text-sm" style="font-family: var(--font-body); text-transform: none;">Gebruikt door recreanten &eacute;n topsporters</p>
        </div>
        <div class="flex flex-col items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" /></svg>
            <p class="font-bold text-sm" style="font-family: var(--font-body); text-transform: none;">9.9/10 Beoordeeld</p>
        </div>
    </div>
</section>

<?php // ── Partners ── ?>
<section class="py-16 sm:py-20 bg-white">
    <div class="max-w-3xl mx-auto flex flex-col items-center gap-8 px-4">
        <div class="flex items-center gap-4 w-full max-w-xs">
            <div class="flex-1 h-px bg-gray-200"></div>
            <span class="text-xs font-bold tracking-[0.2em] text-gray-400 uppercase whitespace-nowrap" style="font-family: var(--font-body);">Trotse partner van</span>
            <div class="flex-1 h-px bg-gray-200"></div>
        </div>
        <div class="flex flex-col sm:flex-row items-start justify-center gap-12 sm:gap-20">
            <div class="flex flex-col items-center gap-4 w-[200px]">
                <a href="https://www.boksen.nl/" target="_blank" rel="noopener noreferrer"
                   class="relative group w-[180px] h-[180px] flex items-center justify-center no-underline">
                    <div class="absolute -inset-3 rounded-[32px] border-2 border-primary opacity-20 group-hover:opacity-40 transition-opacity duration-500"></div>
                    <img src="<?php echo $img( 'boksbond-logo.png' ); ?>"
                         alt="Nederlandse Boksbond"
                         class="relative w-40 h-40 object-contain group-hover:scale-105 transition-transform duration-500">
                </a>
                <p class="text-center text-gray-500 text-sm" style="font-family: var(--font-body); text-transform: none;">
                    Officieel partner van de Nederlandse Boksbond.
                </p>
            </div>
            <div class="flex flex-col items-center gap-4 w-[200px]">
                <a href="https://masports.nl/" target="_blank" rel="noopener noreferrer"
                   class="relative group w-[180px] h-[180px] flex items-center justify-center no-underline">
                    <div class="absolute -inset-3 rounded-[32px] border-2 border-primary opacity-20 group-hover:opacity-40 transition-opacity duration-500"></div>
                    <div class="relative bg-black rounded-[24px] p-5 w-full h-full flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                        <img src="<?php echo $img( 'logo-1.png' ); ?>"
                             alt="MA Sports"
                             class="w-[130px] h-[130px] object-contain">
                    </div>
                </a>
                <p class="text-center text-gray-500 text-sm" style="font-family: var(--font-body); text-transform: none;">
                    Officieel partner van MA Sports.
                </p>
            </div>
        </div>
    </div>
</section>

<?php // ── Testimonial Carousel Script ── ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var quotes = document.querySelectorAll('[data-testimonial]');
    var dots   = document.querySelectorAll('.testimonial-dot');
    if (!quotes.length) return;
    var current = 0;
    function show(idx) {
        quotes.forEach(function (q) { q.classList.add('hidden'); });
        dots.forEach(function (d) { d.classList.remove('bg-black'); d.classList.add('bg-gray-300'); });
        quotes[idx].classList.remove('hidden');
        quotes[idx].classList.add('animate-fade-in');
        dots[idx].classList.remove('bg-gray-300');
        dots[idx].classList.add('bg-black');
        current = idx;
    }
    dots.forEach(function (d) {
        d.addEventListener('click', function () { show(parseInt(this.dataset.index)); });
    });
    setInterval(function () { show((current + 1) % quotes.length); }, 5000);
});
</script>

<?php get_footer(); ?>
