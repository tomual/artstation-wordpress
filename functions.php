<?php

/**
 * ArtStation Wordpress functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ArtStation_Wordpress
 */

 /**********************************************************************
 *            Theme settings
 ********************************************************************/
class Artstation_Wordpress_Customize {
    public static function register ( $wp_customize ) {
        // Define a new section for the Appearance -> Customize page
        $wp_customize->add_section( 'ts_social_links',
            array(
                'title'       => __( 'Social Links', 'artstation-wordpress' ),
                'priority'    => 1, // Determines what order this appears in (1 = top)
                'capability'  => 'edit_theme_options', // Capability needed to tweak
                'description' => __('Set your social profile URLs.', 'artstation-wordpress'),
            )
        );
 
        // 2.0 Register the new "url_instagram" setting
        $wp_customize->add_setting( 'url_instagram', // id of the setting, no need to prefix when using 'theme_mod' as type
            array(
                'default'    => '', // Default setting/value to save
                'type'       => 'theme_mod', // 'theme_mod' or 'option'. [print-theme-settings] only supports theme related settings (theme_mod)
                'capability' => 'edit_theme_options', // Optional. Special permissions for accessing this setting.
                'transport'  => 'refresh', // What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant).
            )
        );
 
        // 2.1 Define an input for the "url_instagram" setting
        $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'ts_url_instagram_control', // unique ID for the control
            array(
                'label'      => __( 'Instagram URL', 'artstation-wordpress' ),
                'settings'   => 'url_instagram', // id of previously created setting "url_instagram"
                'type'       => 'text',
                'section'    => 'ts_social_links', // ID of our "Social Links" section
            )
        ) );
 
 
        // 2.0 Register the new "url_itch" setting
        $wp_customize->add_setting( 'url_itch', // id of the setting, no need to prefix when using 'theme_mod' as type
            array(
                'default'    => '', // Default setting/value to save
                'type'       => 'theme_mod', // 'theme_mod' or 'option'. [print-theme-settings] only supports theme related settings (theme_mod)
                'capability' => 'edit_theme_options', // Optional. Special permissions for accessing this setting.
                'transport'  => 'refresh', // What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant).
            )
        );
 
        // 2.1 Define an input for the "url_itch" setting
        $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'ts_url_itch_control', // unique ID for the control
            array(
                'label'      => __( 'Itch.io URL', 'artstation-wordpress' ),
                'settings'   => 'url_itch', // id of previously created setting "url_itch"
                'type'       => 'text',
                'section'    => 'ts_social_links', // ID of our "Social Links" section
            )
        ) );
 
        // 2.0 Register the new "url_artstation" setting
        $wp_customize->add_setting( 'url_artstation', // id of the setting, no need to prefix when using 'theme_mod' as type
            array(
                'default'    => '', // Default setting/value to save
                'type'       => 'theme_mod', // 'theme_mod' or 'option'. [print-theme-settings] only supports theme related settings (theme_mod)
                'capability' => 'edit_theme_options', // Optional. Special permissions for accessing this setting.
                'transport'  => 'refresh', // What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant).
            )
        );
 
        // 2.1 Define an input for the "url_artstation" setting
        $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'ts_url_artstation_control', // unique ID for the control
            array(
                'label'      => __( 'ArtStation URL', 'artstation-wordpress' ),
                'settings'   => 'url_artstation', // id of previously created setting "url_artstation"
                'type'       => 'text',
                'section'    => 'ts_social_links', // ID of our "Social Links" section
            )
        ) );
    }
}
 
//  Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'Artstation_Wordpress_Customize' , 'register' ) );
 
//  Register shortcode: [print-theme-setting id="id of the setting" default="(optional) value to show if setting has no value"]
add_shortcode( 'print-theme-setting', 'shortcode_print_theme_setting' );
 
if( ! function_exists( 'shortcode_print_theme_setting') ) {
    function shortcode_print_theme_setting( $attributes ) {
        $setting = shortcode_atts(
            array(
                'id' => false,
                'default' => ''
            ), $attributes, 'print_theme_option' );
 
        if( ! $setting['id'] ) {
            //  no setting ID set, return default value
            return $setting['default'];
        }
 
        $stored = get_theme_mod( $setting['id'] );
 
        if( ! $stored || empty( $stored ) ) {
            // return default as no value is stored
            return $setting['default'];
        }
 
        //  return the setting value
        return nl2br( $stored );
    }
}

function namespace_add_custom_types($query)
{
	if ((is_category() || is_tag()) && $query->is_archive() && empty($query->query_vars['suppress_filters'])) {
		$query->set('post_type', array(
			'post', 'art'
		));
	}
	return $query;
}
add_filter('pre_get_posts', 'namespace_add_custom_types');

function xcompile_post_type_labels($singular = 'Post', $plural = 'Posts')
{
	$p_lower = strtolower($plural);
	$s_lower = strtolower($singular);

	return [
		'name' => $plural,
		'singular_name' => $singular,
		'add_new_item' => "New $singular",
		'edit_item' => "Edit $singular",
		'view_item' => "View $singular",
		'view_items' => "View $plural",
		'search_items' => "Search $plural",
		'not_found' => "No $p_lower found",
		'not_found_in_trash' => "No $p_lower found in trash",
		'parent_item_colon' => "Parent $singular",
		'all_items' => "All $plural",
		'archives' => "$singular Archives",
		'attributes' => "$singular Attributes",
		'insert_into_item' => "Insert into $s_lower",
		'uploaded_to_this_item' => "Uploaded to this $s_lower",
	];
}

if (!function_exists('artstation_wordpress_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function artstation_wordpress_setup()
	{
		add_theme_support('post-thumbnails');

		add_action('init', function () {
			$type = 'art';
			$labels = xcompile_post_type_labels('Art', 'Art');
			$supports = ['title', 'editor', 'revisions', 'page-attributes', 'thumbnail', 'custom-fields'];


			$arguments = [
				'taxonomies' => array('category'), // And post tags
				'rewrite' => array('slug' => 'art'), // Change the archive page URL
				'has_archive' => true, // Enable archive page
				'supports' => $supports, // Apply supports
				'public' => true,
				'description' => 'Art posts.',
				'menu_icon' => 'dashicons-admin-customizer', // Set icon
				'labels'  => $labels
			];
			register_post_type($type, $arguments);
		});

		add_filter('enter_title_here', function ($title) {
			$screen = get_current_screen();

			if ('art' == $screen->post_type) {
				$title = 'Enter piece title here';
			}

			return $title;
		});
		add_filter('post_updated_messages', function ($messages) {
			global $post, $post_ID;
			$link = esc_url(get_permalink($post_ID));

			$messages['art'] = array(
				0 => '',
				1 => sprintf(__('Art post updated. <a href="%s">View art post</a>'), $link),
				2 => __('Custom field updated.'),
				3 => __('Custom field deleted.'),
				4 => __('Art post updated.'),
				5 => isset($_GET['revision']) ? sprintf(__('Art post restored to revision from %s'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
				6 => sprintf(__('Art post published. <a href="%s">View art post</a>'), $link),
				7 => __('Art post saved.'),
				8 => sprintf(__('Art post submitted. <a target="_blank" href="%s">Preview art post</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
				9 => sprintf(__('Art post scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview art post</a>'), date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), $link),
				10 => sprintf(__('Art post draft updated. <a target="_blank" href="%s">Preview art post</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
			);
			return $messages;
		});
		add_filter('bulk_post_updated_messages', function ($bulk_messages, $bulk_counts) {
			$bulk_messages['art'] = array(
				'updated'   => _n("%s art posts updated.", "%s studies updated.", $bulk_counts["updated"]),
				'locked'    => _n("%s art posts not updated, somebody is editing it.", "%s studies not updated, somebody is editing them.", $bulk_counts["locked"]),
				'deleted'   => _n("%s art posts permanently deleted.", "%s studies permanently deleted.", $bulk_counts["deleted"]),
				'trashed'   => _n("%s art posts moved to the Trash.", "%s studies moved to the Trash.", $bulk_counts["trashed"]),
				'untrashed' => _n("%s art posts restored from the Trash.", "%s studies restored from the Trash.", $bulk_counts["untrashed"]),
			);

			return $bulk_messages;
		}, 10, 2);
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ArtStation Wordpress, use a find and replace
		 * to change 'artstation-wordpress' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('artstation-wordpress', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'menu-1' => esc_html__('Primary', 'artstation-wordpress'),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('artstation_wordpress_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		));
	}
endif;
add_action('after_setup_theme', 'artstation_wordpress_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function artstation_wordpress_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('artstation_wordpress_content_width', 640);
}
add_action('after_setup_theme', 'artstation_wordpress_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function artstation_wordpress_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'artstation-wordpress'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.', 'artstation-wordpress'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'artstation_wordpress_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function artstation_wordpress_scripts()
{
	wp_enqueue_style('artstation-wordpress-style', get_stylesheet_uri());

	wp_enqueue_script('artstation-wordpress-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

	wp_enqueue_script('artstation-wordpress-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'artstation_wordpress_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}
