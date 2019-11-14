<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ArtStation_Wordpress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <?php if (is_singular()) : ?>
            <div class="col-lg-12">
                <?php the_title('<h1 class="entry-title">', '</h1>') ?>
                <hr class="divider">
                <?php artstation_wordpress_post_thumbnail(); ?>
            </div>
        <?php else : ?>
            <div class="col-lg-4">
                <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>') ?>
                <?php artstation_wordpress_post_thumbnail(); ?>

            </div>
        <?php endif ?>
    </header><!-- .entry-header -->
    </div>




    <footer class="entry-footer">
        <!-- <?php artstation_wordpress_entry_footer(); ?> -->
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->