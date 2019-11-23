<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ArtStation_Wordpress
 */

get_header();
?>

<main class="container">
	<div class="row">
		<div class="col-lg-12">
			<div id="primary" class="content-area">
				<main id="main" class="site-main row">

					<?php if (have_posts()) : ?>
						<h1 class="page-title text-center w-100"><?php single_term_title() ?></h1>
						<hr class="divider">
					<?php
						/* Start the Loop */
						while (have_posts()) :
							the_post();

							/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
							get_template_part('template-parts/content', get_post_type());

						endwhile;

						the_posts_navigation();

					else :

						get_template_part('template-parts/content', 'none');

					endif;
					?>

				</main><!-- #main -->
			</div><!-- #primary -->

		</div>
	</div>
</main>
<?php
get_footer();
