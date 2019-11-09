<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ArtStation_Wordpress
 */

get_header();
?>
<main class="container">
        <div class="row">
            <div class="col-lg-12">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					the_post_navigation();

					// If comments are open or we have at least one comment, load up the comment template.
					// if ( comments_open() || get_comments_number() ) :
					// 	comments_template();
					// endif;

				endwhile; // End of the loop.
				?>
            </div>
            <a href="list.html" class="btn btn-link text-light d-inline-block m-auto p-3">« Back to Concept Art</a>
        </div>

    </main>

<?php
get_footer();
