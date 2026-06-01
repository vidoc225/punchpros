<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php
$reading_time = ceil( str_word_count( strip_tags( get_the_content() ) ) / 200 );
$categories   = get_the_category();
?>

<!-- ── Artikel Hero ── -->
<section class="bg-black text-white py-14 sm:py-20">
    <div class="container-pp max-w-3xl mx-auto">
        <?php if ( $categories ) : ?>
            <div class="flex flex-wrap gap-2 mb-5">
                <?php foreach ( $categories as $cat ) : ?>
                    <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"
                       class="text-xs font-bold tracking-widest text-primary uppercase no-underline hover:underline"
                       style="font-family: var(--font-body);">
                        <?php echo esc_html( $cat->name ); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <h1 class="text-3xl sm:text-4xl md:text-5xl leading-tight mb-6">
            <?php the_title(); ?>
        </h1>

        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-400" style="font-family: var(--font-body); text-transform: none;">
            <span><?php echo esc_html( get_the_date( 'd F Y' ) ); ?></span>
            <span class="text-gray-600">·</span>
            <span><?php echo $reading_time; ?> min lezen</span>
        </div>
    </div>
</section>

<!-- ── Uitgelichte afbeelding ── -->
<?php if ( has_post_thumbnail() ) : ?>
<div class="bg-gray-100">
    <div class="container-pp max-w-4xl mx-auto">
        <?php the_post_thumbnail( 'large', [
            'class'   => 'w-full h-64 sm:h-96 object-cover',
            'loading' => 'eager',
            'fetchpriority' => 'high',
        ] ); ?>
    </div>
</div>
<?php endif; ?>

<!-- ── Artikel inhoud ── -->
<div class="container-pp py-12 sm:py-16">
    <div class="max-w-3xl mx-auto">

        <!-- Artikel tekst -->
        <div class="prose prose-lg max-w-none
                    prose-headings:font-bold prose-headings:text-black
                    prose-h2:text-2xl prose-h2:mt-10 prose-h2:mb-4
                    prose-h3:text-xl prose-h3:mt-6 prose-h3:mb-3
                    prose-p:text-gray-700 prose-p:leading-relaxed prose-p:mb-5
                    prose-a:text-primary prose-a:no-underline hover:prose-a:underline
                    prose-ul:text-gray-700 prose-li:mb-2
                    prose-strong:text-black"
             style="font-family: var(--font-body); text-transform: none;">
            <?php the_content(); ?>
        </div>

        <!-- Tags -->
        <?php the_tags(
            '<div class="flex flex-wrap gap-2 mt-10 pt-8 border-t border-gray-100">',
            '',
            '</div>',
        ); ?>

        <!-- Navigatie vorige / volgende -->
        <nav class="mt-12 pt-8 border-t border-gray-100 grid grid-cols-2 gap-6 text-sm" style="font-family: var(--font-body); text-transform: none;">
            <?php
            $prev = get_previous_post();
            $next = get_next_post();
            ?>
            <?php if ( $prev ) : ?>
                <a href="<?php echo esc_url( get_permalink( $prev ) ); ?>" class="group flex flex-col gap-1 no-underline">
                    <span class="text-xs text-gray-400 tracking-wider uppercase">← Vorig artikel</span>
                    <span class="font-bold text-black group-hover:text-primary transition-colors"><?php echo esc_html( get_the_title( $prev ) ); ?></span>
                </a>
            <?php else : ?>
                <div></div>
            <?php endif; ?>
            <?php if ( $next ) : ?>
                <a href="<?php echo esc_url( get_permalink( $next ) ); ?>" class="group flex flex-col gap-1 text-right no-underline">
                    <span class="text-xs text-gray-400 tracking-wider uppercase">Volgend artikel →</span>
                    <span class="font-bold text-black group-hover:text-primary transition-colors"><?php echo esc_html( get_the_title( $next ) ); ?></span>
                </a>
            <?php endif; ?>
        </nav>

    </div>
</div>

<!-- ── CTA blok ── -->
<section class="bg-black text-white py-14 sm:py-16">
    <div class="container-pp max-w-2xl mx-auto text-center">
        <h2 class="text-3xl sm:text-4xl mb-4">KLAAR OM TE TRAINEN?</h2>
        <p class="text-gray-300 mb-8" style="font-family: var(--font-body); text-transform: none;">
            Bekijk het volledige assortiment bokshandschoenen, knokkelbeschermers en beschermingsmateriaal van PunchPros.
        </p>
        <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"
           class="btn inline-block">
            BEKIJK ONZE VECHTSPORTARTIKELEN &rarr;
        </a>
    </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>
