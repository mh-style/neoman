<?php
/**
 * Dynamic CSS Output
 *
 * @package NeoMan
 */

if ( !function_exists( 'neoman_dynamic_css_output' ) ):

    function neoman_dynamic_css_output( $dynamic_css ) {

        $css_output = array();

        $footer_bg = get_theme_mod( 'neoman_footer_background', '#000' );
        $footer_text_color = get_theme_mod( 'neoman_footer_text_color', '#bbb' );
        $footer_link_color = get_theme_mod( 'neoman_footer_link_color', '#fff' );
        $header_bg = get_theme_mod( 'neoman_header_background', '#fff' );
        $header_link = get_theme_mod( 'neoman_header_link', '#000' );
        $header_link_hover = get_theme_mod( 'neoman_header_link_hover', '#777' );
        $css_output['.site-footer'] = array(
            'background-color' => sanitize_hex_color( $footer_bg ),
            'color'            => sanitize_hex_color( $footer_text_color ),
        );
        $css_output['#footer-bottom a'] = array(
            'color' => sanitize_hex_color( $footer_link_color ),
        );
        $css_output['.site-header,.site-header li .sub-menu'] = array(
            'background-color' => sanitize_hex_color( $header_bg ),
        );
        $css_output['.site-header li a, .site-header li .sub-menu li a'] = array(
            'color' => sanitize_hex_color( $header_link ),
        );
        $css_output['.site-header .menu li a:hover, .site-header .menu li .sub-menu li a:hover'] = array(
            'color' => sanitize_hex_color( $header_link_hover ),
        );
        /**
         * Container Width
         */
        $container_width = get_theme_mod( 'neoman_container_width' );
        $container_width = ( !empty( $container_width ) ) ? $container_width . 'px' : '';
        $css_output['.container, :not(.container) .wp-block-group__inner-container'] = array(
            'max-width' => esc_attr( $container_width ),
        );
        /**
         * Letf Sidebar Width
         */
        $left_sidebar_width = get_theme_mod( 'neoman_left_sidebar_width' );
        $left_sidebar_width = ( !empty( $left_sidebar_width ) ) ? $left_sidebar_width . '%' : '';
        $css_output['.left-sidebar'] = array(
            'flex-basis' => esc_attr( $left_sidebar_width ),
        );
        /**
         * Right Sidebar Width
         */
        $right_sidebar_width = get_theme_mod( 'neoman_right_sidebar_width' );
        $right_sidebar_width = ( !empty( $right_sidebar_width ) ) ? $right_sidebar_width . '%' : '';
        $css_output['.right-sidebar'] = array(
            'flex-basis' => esc_attr( $right_sidebar_width ),
        );

        // Parse CSS from $css_output
        $dynamic_css .= neoman_parse_css( $css_output );
        return $dynamic_css;

        /**
         * Header Background Color
         */

        /**
         * Footer Link Color
         */

        return $dynamic_css;
    }
endif;
add_filter( 'neoman_dynamic_css', 'neoman_dynamic_css_output' );
