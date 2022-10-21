<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package NeoMan
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wqtd_bodys_class( $classes ) {

    // Adds a class of no-sidebar when there is no sidebar present.
    if ( is_page() && is_page_template( 'templates/no-sidebars.php' ) ) {
        $classes[] = 'no-sidebar';
    }
    $sidebar_layout = neoman_get_sidebar_layout();
    $classes[] = ( $sidebar_layout ) ? $sidebar_layout : '';
    return $classes;
}
add_filter( 'body_class', 'wqtd_bodys_class' );

/**
 * Adds icon if menu item has class of menu-item-has-children.
 * Filter nav_menu_css_class
 * @param array $classes Classes for the menu item.
 * @param object $menu_item Object for the menu item.
 * @param object $args Object for header-menu.
 * @return array
 */
if ( !function_exists( 'add_icon_item_has_submenu' ) ):
    function add_icon_item_has_submenu( $classes, $menu_item, $args ) {

        if ( 'header-menu' === $args->theme_location && in_array( 'menu-item-has-children', $classes ) ) {
            # code...
            $menu_item->title .= '<span class="dropdown-menu-toggle"></span>';
        }
        return $classes;
    }
endif;
add_filter( 'nav_menu_css_class', 'add_icon_item_has_submenu', 10, 3 );

/**
 * Filter the excerpt length to 25 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
if ( !function_exists( 'neoman_filter_excerpt_length' ) ):
    function neoman_filter_excerpt_length( $length ) {
        if ( is_admin() ) {
            return $length;
        }
        $exceprt_length = get_theme_mod('neoman_excerpt_length');
        $length = (!empty($exceprt_length))? absint($exceprt_length) : 35;

        return $length;
    }
endif;
add_filter( 'excerpt_length', 'neoman_filter_excerpt_length' );

if ( !function_exists( 'neoman_filter_excerpt_more' ) ):
// change excerpt more text
    function neoman_filter_excerpt_more() {
        return sprintf(
            '<a href="%1$s" class="more-link">%2$s »<span class="screen-reader-text"> %3$s</span></a>',
            esc_url(get_permalink()),
            esc_html__( 'Read more', 'neoman' ),
            esc_html__(get_the_title()),
        );
    }
endif;

add_filter( 'excerpt_more', 'neoman_filter_excerpt_more' );

if( !function_exists('neoman_show_excerpt')):
    function neoman_show_excerpt(){

        global $post;

        // Check if more tag is used in post content
        $more_tag = strpos($post->post_content, '<!--more-->');
        $show_exceprt = ('excerpt' === get_theme_mod('neoman_content_display')) ? true : false;
        $show_exceprt = ($more_tag) ? false : $show_exceprt;
        return $show_exceprt;
    }
endif;

if ( !function_exists( 'neoman_get_sidebar_layout' ) ):
    function neoman_get_sidebar_layout() {
        $layout = get_theme_mod( 'neoman_default_layout' );
        $layout = ( $layout ) ? $layout : 'content-sidebar';
        if ( is_single() ) {
            $post_layout = get_theme_mod( 'neoman_blog_post_layout' );
            if ( $post_layout ) {
                $layout = $post_layout;
            }

        }
        if ( is_page() ) {
            $page_layout = get_theme_mod( 'neoman_page_layout' );
            if ( $page_layout ) {
                $layout = $page_layout;
            }
        }
        if ( is_archive() || is_search() || is_tax() ) {
            $archive_layout = get_theme_mod( 'neoman_archive_layout' );
            if ( $archive_layout ) {
                $layout = $archive_layout;
            }
        }
        return $layout;
    }
endif;

/**
 * Get Sidebars
 */

if ( !function_exists( 'neoman_get_sidebars' ) ):
    function neoman_get_sidebars() {
        $layout = neoman_get_sidebar_layout();

        // When to show left sidebar
        $ls = array( 'sidebar-content', 'both-sidebar', 'content-sidebars', 'sidebars-content' );
        //When to show right sidebar
        $rs = array( 'content-sidebar', 'both-sidebar', 'content-sidebars', 'sidebars-content' );

        //show left sidebar
        if (in_array($layout, $ls)) {
            get_sidebar('left');
        }

        //show right sidebar
        if (in_array($layout, $rs)) {
            get_sidebar();
        }
    }
endif;