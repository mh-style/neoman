<?php
/**
 * NeoMan functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NeoMan
 */

 /**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
if ( !function_exists( 'neoman_setup_theme' ) ):
    function neoman_setup_theme( $param ) {
        /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on NeoMan, use a find and replace
		* to change 'neoman' to the name of your theme in all the template files.
		*/
        load_theme_textdomain( 'neoman', get_template_directory() . '/languages' );

        /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
        add_theme_support( 'title-tag' );
        add_theme_support('custom-spacing');
        add_theme_support('align-wide');
        add_theme_support('responsive-embeds');
        add_theme_support('custom-background', array(
            'default-color'      => 'FFF',
            'default-image'      => '',
            'default-repeat'     => 'no-repeat',
        ));
        
        add_theme_support('editor-font-sizes', array(
            array(
                'name' => esc_attr__('Small' , 'neoman'),
                'size' => 13,
                'slug' => 'small'
            ),
            array(
                'name' => esc_attr__('Normal' , 'neoman'),
                'size' => 14,
                'slug' => 'normal'
            ),
            array(
                'name' => esc_attr__('Regular' , 'neoman'),
                'size' => 16,
                'slug' => 'regular'
            ),
            array(
                'name' => esc_attr__('Medium' , 'neoman'),
                'size' => 20,
                'slug' => 'medium'
            ),
            array(
                'name' => esc_attr__('Large' , 'neoman'),
                'size' => 36,
                'slug' => 'large'
            ),
            array(
                'name' => esc_attr__('Extra Large' , 'neoman'),
                'size' => 42,
                'slug' => 'extra-large'
            ),
            array(
                'name' => esc_attr__('Huge' , 'neoman'),
                'size' => 52,
                'slug' => 'huge'
            ),
        ));
        //*** Display site title and taglien */
        //add_theme_support('custom-header');

        /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
        add_theme_support( 'post-thumbnails' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        $logo_args = array(
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            //'header-text'          => array( 'site-title', 'site-description' ),
            'unlink-homepage-logo' => true,
        );

        add_theme_support( 'custom-logo', $logo_args );

        add_theme_support( 'menus' );
        
	// This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'header-menu' => __( 'On Header', 'neoman' ),
            )
        );
    }
endif;

add_action( 'after_setup_theme', 'neoman_setup_theme' );

/**
 * Enqueue scripts and styles.
 */
if ( !function_exists( 'neoman_theme_scripts' ) ):
//Theme Scripts
    function neoman_theme_scripts() {
        wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap' );

        wp_enqueue_style( 'neoman-style', get_stylesheet_uri() );

        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'neoman-script', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), false, true );
        
        $css_output = apply_filters('neoman_dynamic_css', '');
        wp_add_inline_style( 'neoman-style', $css_output );
    }
endif;
add_action( 'wp_enqueue_scripts', 'neoman_theme_scripts' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if ( !function_exists( 'my_register_sidebars' ) ):
    function my_register_sidebars() {
        /* Register the 'primary' sidebar. */
        register_sidebar(
            array(
                'id'            => 'sidebar-1',
                'name'          => __( 'Right Sidebar', 'neoman' ),
                'description'   => __( 'Add widgets to show on Sidebar.', 'neoman' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
        register_sidebar(
            array(
                'id'            => 'sidebar-2',
                'name'          => __( 'Left Sidebar', 'neoman' ),
                'description'   => __( 'Add widgets to show on Sidebar.', 'neoman' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
        register_sidebar(
            array(
                'id'            => 'footer-widgets',
                'name'          => __( 'Footer Widgets', 'neoman' ),
                'description'   => __( 'Add widgets to show on Sidebar.', 'neoman' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
        /* Repeat register_sidebar() code for additional sidebars. */
    }
endif;
add_action( 'widgets_init', 'my_register_sidebars' );

// Filter Hook
// $social_icons = array(
//     'facrbook'  => 'Facebook',
//     'twitter'   => 'Twitter',
//     'instagram' => 'Instagram',
// );

// $social_icons = apply_filters('wpd_social_icons', $social_icons);

// foreach ( $social_icons as $key => $text ) {
//     echo "<p><a href='http://$key.com'>$text</a></p>";
// }

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/theme-functions.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Helpers Functions.
 */
require_once get_template_directory() . '/inc/helpers.php';

/**
 * Dynamic CSS Output.
 */
require_once get_template_directory() . '/inc/dynamic-css.php';