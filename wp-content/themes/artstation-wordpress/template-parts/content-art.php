<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ArtStation_Wordpress
 */

?>

<?php if (is_singular()) : ?>
    <div class="col-lg-12 text-center">
        <?php the_title('<h1 class="entry-title">', '</h1>') ?>
        <hr class="divider">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'artstation-wordpress' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'artstation-wordpress' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
<?php else : ?>
    <div class="col-lg-4">
        <a class="thumb" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
            <?php the_post_thumbnail(); ?>
            <div class="thumb-info">
                <div class="thumb-heading"><?php echo the_title() ?></div>
            </div>
        </a>
    </div>
<?php endif ?>