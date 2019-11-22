<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ArtStation_Wordpress
 */

?>
<?php wp_footer() ?>
<footer class="">
	<div class="container d-flex justify-content-between">
		<div>
			<?php if (get_theme_mod('url_instagram')) : ?>
				<a href="<?php echo get_theme_mod('url_instagram') ?>"><img class="mr-3" height="20" width="20" src="<?php echo get_template_directory_uri() ?>/img/instagram.svg"></a>
			<?php endif ?>
			<?php if (get_theme_mod('url_artstation')) : ?>
				<a href="<?php echo get_theme_mod('url_artstation') ?>"><img class="mr-3" height="20" width="20" src="<?php echo get_template_directory_uri() ?>/img/artstation.svg"></a>
			<?php endif ?>
			<?php if (get_theme_mod('url_itch')) : ?>
				<a href="<?php echo get_theme_mod('url_itch') ?>"><img class="mr-3" height="20" width="20" src="<?php echo get_template_directory_uri() ?>/img/itch-dot-io.svg"></a>
			<?php endif ?>
		</div>
		<div>
			<a class="text-muted text-decoration-none" href="<?php echo get_site_url() ?>/contact"><img height="20" width="20" src="<?php echo get_template_directory_uri() ?>/img/minutemailer.svg"> Contact Me</a>
		</div>
		<div class="small text-muted">
			© 2019 soulant. All rights reserved.
		</div>

	</div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" us"></script>
</body>

</html>