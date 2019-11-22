<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ArtStation_Wordpress
 */

get_header();
?>

	<div id="primary" class="container">
		<main id="main" class="row">

			<section class="error-404 not-found col">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'artstation-wordpress' ); ?></h1>
				</header>

				<div class="page-content text-center mb-5 pb-5">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'artstation-wordpress' ); ?></p>

					<?php
					get_search_form();
					?>

				</div>
			</section>

		</main>
	</div>

<?php
get_footer();
