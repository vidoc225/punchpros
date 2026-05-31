<?php get_header(); ?>

<?php // ── Hero ── ?>
<section class="bg-black text-white pt-20 sm:pt-28 pb-24 sm:pb-32 text-center px-4 -mt-16">
    <p class="text-primary text-sm font-bold tracking-widest uppercase mb-3">Train like a champion</p>
    <h1 class="text-4xl sm:text-5xl md:text-6xl text-white" style="font-family:var(--font-heading)">TRAININGEN</h1>
    <p class="text-gray-400 mt-4 max-w-2xl mx-auto text-lg">Trainingsschema's, tips en meer voor boksen en vechtsporten.</p>
    <div class="flex flex-wrap justify-center gap-4 mt-10">
        <a href="#bokszak-training" class="btn text-sm tracking-widest">BOKSZAK TRAINING</a>
        <a href="#conditioneel" class="btn text-sm tracking-widest">CONDITIONEEL</a>
        <a href="#combinaties" class="btn text-sm tracking-widest">COMBINATIES</a>
    </div>
</section>

<?php // ── Content from WP editor ── ?>
<section class="bg-white px-6 py-16 sm:py-24">
    <div class="max-w-3xl mx-auto">
        <div class="entry-content">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php // ── CTA ── ?>
<section class="bg-black text-white py-16 sm:py-24 text-center px-4">
    <h2 class="text-2xl sm:text-3xl mb-4 text-white" style="font-family:var(--font-heading)">TRAIN MET DE BESTE BESCHERMING</h2>
    <p class="text-gray-400 max-w-xl mx-auto mb-8">Voorkom blessures en train op vol vermogen met PunchPros knokkelbeschermers. Gebruikt door olympische kampioenen.</p>
    <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="btn inline-block text-sm tracking-widest">
        BEKIJK DE SHOP &rarr;
    </a>
</section>

<?php get_footer(); ?>
