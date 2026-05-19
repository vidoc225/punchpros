<?php
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area mt-10">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title text-xl font-bold text-brand-primary mb-6">
            <?php
            $comment_count = get_comments_number();
            printf(
                /* translators: %d: comment count */
                esc_html( _n( '%d Comment', '%d Comments', $comment_count, 'punchpros-theme' ) ),
                absint( $comment_count )
            );
            ?>
        </h2>

        <ol class="comment-list space-y-4 list-none p-0">
            <?php
            wp_list_comments( [
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 48,
            ] );
            ?>
        </ol>

        <?php the_comments_navigation(); ?>
    <?php endif; ?>

    <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments text-sm text-gray-500"><?php esc_html_e( 'Comments are closed.', 'punchpros-theme' ); ?></p>
    <?php endif; ?>

    <div class="mt-8">
        <?php
        comment_form( [
            'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title text-xl font-bold text-brand-primary mb-4">',
            'title_reply_after'  => '</h2>',
            'class_submit'       => 'btn',
        ] );
        ?>
    </div>

</div>
