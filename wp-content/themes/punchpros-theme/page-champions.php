<?php get_header(); ?>

<?php
$img = static function ( string $path ) : string {
    return esc_url( get_theme_file_uri( 'assets/images/' . $path ) );
};

$ambassadors = [
    [
        'name'    => 'Julio Cesar La Cruz',
        'title'   => '2x Olympisch Kampioen',
        'country' => 'Cuba',
        'bio'     => 'Een van de meest gedecoreerde boksers ter wereld. Julio vertrouwt op PunchPros voor zijn dagelijkse training.',
        'image'   => 'champions/julio.jpg',
    ],
    [
        'name'    => 'Roniel Iglesias',
        'title'   => '2x Olympisch Kampioen',
        'country' => 'Cuba',
        'bio'     => 'Olympisch goud in 2012 en 2020. Roniel kiest PunchPros voor de beste handbescherming in de ring.',
        'image'   => 'champions/roniel.jpg',
    ],
    [
        'name'    => 'Gabriëlla Weerheim',
        'title'   => 'Nationaal Kampioen -57kg',
        'country' => 'Nederland',
        'bio'     => 'Nederlands kampioen en een van de meest veelbelovende talenten in het vrouwenboksen.',
        'image'   => 'champions/gabriella.jpg',
    ],
    [
        'name'    => 'Farshid Bos',
        'title'   => 'Nationaal Kampioen -67kg',
        'country' => 'Nederland',
        'bio'     => 'Nationaal kampioen die elke dag traint met PunchPros knokkelbeschermers en bandages.',
        'image'   => 'champions/farshid.jpg',
    ],
    [
        'name'    => 'Geronimo Hartmans',
        'title'   => 'Nationaal Kampioen -63,5kg',
        'country' => 'Nederland',
        'bio'     => 'Een technisch begaafde bokser die PunchPros gebruikt sinds de eerste testfase.',
        'image'   => 'champions/geronimo.jpg',
    ],
];
?>

<?php // ── Hero ── ?>
<section class="bg-black text-white pt-20 sm:pt-28 pb-24 sm:pb-32 text-center px-4 -mt-16">
    <h1 class="text-4xl sm:text-5xl md:text-6xl text-white" style="font-family:var(--font-heading)">#PUNCHPROSCHAMPIONS</h1>
    <p class="text-gray-400 mt-4 max-w-2xl mx-auto text-lg">Topsporters en amateurs die vertrouwen op PunchPros. Van nationaal kampioen tot olympisch goud.</p>
</section>

<?php // ── Ambassadors Grid ── ?>
<section class="max-w-6xl mx-auto px-4 py-16 sm:py-24">
    <div class="space-y-16">
        <?php foreach ( $ambassadors as $i => $amb ) :
            $reverse = $i % 2 === 1;
        ?>
        <div class="grid md:grid-cols-2 gap-8 lg:gap-16 items-center">
            <div class="relative aspect-[3/4] bg-gray-100 rounded-[32px] overflow-hidden shadow-sm <?php echo $reverse ? 'md:order-2' : ''; ?>">
                <img
                    src="<?php echo $img( $amb['image'] ); ?>"
                    alt="<?php echo esc_attr( $amb['name'] ); ?>"
                    class="absolute inset-0 w-full h-full object-cover hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                >
            </div>
            <div class="<?php echo $reverse ? 'md:order-1' : ''; ?>">
                <p class="text-xs text-primary font-bold tracking-wider uppercase mb-2"><?php echo esc_html( $amb['country'] ); ?></p>
                <h2 class="text-2xl sm:text-3xl mb-2 text-dark" style="font-family:var(--font-heading)">
                    <?php echo esc_html( strtoupper( $amb['name'] ) ); ?>
                </h2>
                <p class="text-gray-500 font-bold mb-4"><?php echo esc_html( $amb['title'] ); ?></p>
                <p class="text-gray-600 leading-relaxed text-lg"><?php echo esc_html( $amb['bio'] ); ?></p>
                <div class="mt-6">
                    <span class="inline-flex items-center gap-1 text-sm text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                        <?php echo esc_html( $amb['title'] ); ?>
                    </span>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<?php // ── CTA ── ?>
<section class="bg-black text-white py-16 sm:py-24 text-center px-4">
    <h2 class="text-2xl sm:text-3xl mb-4 text-white" style="font-family:var(--font-heading)">WORD AMBASSADEUR</h2>
    <p class="text-gray-400 max-w-xl mx-auto mb-8">Ben jij een bokser die zijn handen serieus neemt? Neem contact met ons op en word onderdeel van het PunchPros team.</p>
    <a href="mailto:info@punchpros.nl" class="btn inline-block text-sm tracking-wider">
        NEEM CONTACT OP &rarr;
    </a>
</section>

<?php get_footer(); ?>
