<?php get_header(); ?>

<?php
$img = static function ( string $path ) : string {
    return esc_url( get_theme_file_uri( 'assets/images/' . $path ) );
};
?>

<?php // ── Hero ── ?>
<section class="relative h-screen min-h-[600px] flex items-end -mt-16">
    <img
        src="<?php echo $img( 'over-ons-foto.jpg' ); ?>"
        alt="De oprichters van PunchPros"
        class="absolute inset-0 w-full h-full object-cover object-top"
    >
    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-black/10"></div>
    <div class="relative z-10 w-full px-6 pb-16 sm:pb-24 max-w-4xl mx-auto">
        <p class="text-primary text-sm font-bold tracking-widest uppercase mb-3">Ons verhaal</p>
        <h1 class="text-5xl sm:text-7xl md:text-8xl text-white leading-none mb-4" style="font-family:var(--font-heading)">
            OVER PUNCHPROS
        </h1>
        <p class="text-gray-300 text-lg max-w-md">Ontwikkeld door sporters, voor sporters. Dit is ons verhaal.</p>
    </div>
</section>

<?php // ── Intro statement ── ?>
<section class="bg-white px-6 py-20 sm:py-28">
    <div class="max-w-3xl mx-auto text-center">
        <p class="text-3xl sm:text-4xl md:text-5xl leading-tight text-dark" style="font-family:var(--font-heading)">
            NA 4+ JAAR EN MEER DAN 10.000 UUR ONTWIKKELING IS HET ER EINDELIJK.
        </p>
        <div class="w-16 h-1 bg-primary mx-auto mt-8 mb-8"></div>
        <p class="text-gray-500 text-xl">Een product waar we volledig achter staan.</p>
    </div>
</section>

<?php // ── Story ── ?>
<section class="bg-gray-50 px-6 py-20 sm:py-28">
    <div class="max-w-2xl mx-auto">
        <div class="space-y-6 text-gray-700 text-lg leading-relaxed">
            <p>De kans is groot dat je ons al online hebt gezien.</p>
            <p>Inmiddels ondersteunen we olympische atleten, GLORY- en Enfusion-vechters, maar ook recreatieve sporters met klachten zoals artritis en TFCC-blessures. In sommige gevallen hebben we zelfs operaties helpen voorkomen.</p>
            <p>
                PunchPros ontstond vanuit een probleem dat elke vechtsporter kent &mdash;
                <strong class="text-black">knokkel- en polspijn horen bijna bij de sport.</strong>
            </p>
            <p>Maar wat ons opviel? Er was geen echte oplossing.</p>
        </div>

        <blockquote class="my-16 border-l-4 border-primary pl-6">
            <p class="text-2xl sm:text-3xl text-black leading-snug" style="font-family:var(--font-heading)">
                TESTEN. MISLUKKEN.<br>VERBETEREN. HERHALEN.
            </p>
        </blockquote>

        <div class="space-y-6 text-gray-700 text-lg leading-relaxed">
            <p>Totdat we iets maakten dat simpelweg nog niet bestond.</p>
            <p>Wat begon als een persoonlijk probleem is uitgegroeid tot een oplossing voor meerdere sporten.</p>
        </div>
    </div>
</section>

<?php // ── Product highlights ── ?>
<section class="bg-white px-6 py-20 sm:py-28">
    <div class="max-w-4xl mx-auto">
        <p class="text-primary text-sm font-bold tracking-widest uppercase mb-4 text-center">HET PRODUCT</p>
        <h2 class="text-3xl sm:text-4xl text-center mb-14 text-dark" style="font-family:var(--font-heading)">
            ONZE KNOKKELBESCHERMER
        </h2>
        <div class="grid sm:grid-cols-3 gap-8">
            <?php
            $features = [
                [ 'Siliconen bescherming', 'Absorbeert klappen en verdeelt de druk over je knokkel.' ],
                [ 'Past overal', 'Onder bandages en in elke bokshandschoen — zonder aanpassingen.' ],
                [ 'Minder pijn, beter presteren', 'Train langer en herstel sneller. Punt.' ],
            ];
            foreach ( $features as $f ) : ?>
                <div class="border-t-2 border-primary pt-6">
                    <p class="text-lg mb-2 text-dark" style="font-family:var(--font-heading)">
                        <?php echo esc_html( strtoupper( $f[0] ) ); ?>
                    </p>
                    <p class="text-gray-500 text-sm leading-relaxed"><?php echo esc_html( $f[1] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <p class="text-center text-gray-400 text-sm mt-12">Ontworpen en geproduceerd in Nederland met onze eigen 3D-geprinte mallen.</p>
    </div>
</section>

<?php // ── Stats ── ?>
<section class="bg-black text-white px-6 py-16 sm:py-20">
    <div class="max-w-4xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-10 text-center">
        <?php
        $stats = [
            [ '4+', 'Jaar ontwikkeling' ],
            [ '10.000+', 'Uur R&D' ],
            [ '9.9/10', 'Beoordeling' ],
            [ '5', 'Olympische kampioenen' ],
        ];
        foreach ( $stats as $s ) : ?>
            <div>
                <p class="text-4xl sm:text-5xl font-bold text-primary" style="font-family:var(--font-heading)"><?php echo esc_html( $s[0] ); ?></p>
                <p class="text-sm text-gray-400 mt-2 tracking-wide"><?php echo esc_html( $s[1] ); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php // ── CTA ── ?>
<section class="bg-white px-6 py-24 sm:py-32 text-center">
    <p class="text-4xl sm:text-5xl mb-4 text-dark" style="font-family:var(--font-heading)">
        WE ZIJN NOG MAAR NET BEGONNEN.
    </p>
    <p class="text-gray-500 text-lg mb-10">Benieuwd om het zelf te proberen?</p>
    <a href="mailto:info@punchpros.nl" class="btn inline-block text-sm tracking-widest">
        STUUR EEN BERICHT &rarr;
    </a>
</section>

<?php get_footer(); ?>
