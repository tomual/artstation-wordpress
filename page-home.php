<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ArtStation_Wordpress
 */

get_header();
?>
<div class="home" style="background-image: url(<?php echo get_theme_mod('home_background_image') ?>)">
</div>
<?php
get_footer();
