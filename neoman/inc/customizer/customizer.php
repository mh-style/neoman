<?php

/**
 *
 * NeoMan Theme Customizer
 *
 * @package NeoMan
 */

/**
 * Custom Sanitization Callbacks
 */
add_action('customize_register', function () {
    require_once get_template_directory() . '/inc/customizer/sanitize_callback.php';
    require_once get_template_directory() . '/inc/customizer/controls/class-range-control.php';
    require_once get_template_directory() . '/inc/customizer/controls/class-sortable-control.php';
});

if (!function_exists('neoman_customize_register')) :
    function neoman_customize_register($wp_customize)
    {
        /**
         * Footer Section
         */
        $wp_customize->add_section(
            'custom_footer_section',
            array(
                'title'    => esc_html__('Footer', 'neoman'),
                'priority' => 50,
            )
        );
        /**
         * Footer Copyright Text
         */
        $wp_customize->add_setting(
            'neoman_footer_copyright',
            array(
                'default'           => 'Copyright © 2022 <a href="/"> MH-Style </a>, All rights Reserved. Designed by Monabbor Hossen',
                'sanitize_callback' => 'wp_kses_post',
                'transport'         => 'postMessage',
            )
        );
        $wp_customize->add_control(
            'neoman_footer_copyright',
            array(
                'type'    => 'textarea',
                'section' => 'custom_footer_section', // Required, core or custom.
                'label'   => esc_html__('Copyright', 'neoman'),
            )
        );

        /**
         * Show/Hide Footer Credit Text
         */
        $wp_customize->add_setting(
            'neoman_footer_credit',
            array(
                'default'           => false,
                'sanitize_callback' => 'neoman_sanitize_checkbox',
            )
        );
        $wp_customize->add_control(
            'neoman_footer_credit',
            array(
                'type'    => 'checkbox',
                'section' => 'custom_footer_section', // Required, core or custom.
                'label'   => esc_html__('Hide Credit Text', 'neoman'),
            )
        );
        /**
         * Colors Panel
         */
        $wp_customize->add_panel(
            'neoman_colors_panel',
            array(
                'title' => esc_html__('Colors', 'neoman'),
            )
        );
        /**
         * Header Colors Section
         */
        $wp_customize->add_section(
            'neoman_header_color',
            array(
                'title' => esc_html__('Header', 'neoman'),
                'panel' => 'neoman_colors_panel',
            )
        );

        /**
         * Header Background Color
         */
        $wp_customize->add_setting(
            'neoman_header_background',
            array(
                'default'           => '#fff',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'neoman_header_background',
                array(
                    'section' => 'neoman_header_color', // Required, core or custom.
                    'label'   => esc_html__('Background Color', 'neoman'),
                )
            )
        );
        /**
         * Header link Color
         */
        $wp_customize->add_setting(
            'neoman_header_link',
            array(
                'default'           => '#000',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'neoman_header_link',
                array(
                    'section' => 'neoman_header_color', // Required, core or custom.
                    'label'   => esc_html__('Link Color', 'neoman'),
                )
            )
        );
        /**
         * Header link Hover Color
         */
        $wp_customize->add_setting(
            'neoman_header_link_hover',
            array(
                'default'           => '#777',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'neoman_header_link_hover',
                array(
                    'section' => 'neoman_header_color', // Required, core or custom.
                    'label'   => esc_html__('Link Hover Color', 'neoman'),
                )
            )
        );

        /**
         * Footer Colors Section
         */
        $wp_customize->add_section(
            'neoman_footer_color',
            array(
                'title' => esc_html__('Footer', 'neoman'),
                'panel' => 'neoman_colors_panel',
            )
        );
        /**
         * Footer Background Color
         */
        $wp_customize->add_setting(
            'neoman_footer_background',
            array(
                'default'           => '#000',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'neoman_footer_background',
                array(
                    'section' => 'neoman_footer_color', // Required, core or custom.
                    'label'   => esc_html__('Background Color', 'neoman'),
                )
            )
        );

        /**
         * Footer Text Color
         */
        $wp_customize->add_setting(
            'neoman_footer_text_color',
            array(
                'default'           => '#bbb',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'neoman_footer_text_color',
                array(
                    'section' => 'neoman_footer_color', // Required, core or custom.
                    'label'   => esc_html__('Text Color', 'neoman'),
                )
            )
        );
        /**
         * Footer Link Color
         */
        $wp_customize->add_setting(
            'neoman_footer_link_color',
            array(
                'default'           => '#fff',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'neoman_footer_link_color',
                array(
                    'section' => 'neoman_footer_color', // Required, core or custom.
                    'label'   => esc_html__('Link Color', 'neoman'),
                )
            )
        );
        /**
         * Global Panel
         */
        $wp_customize->add_panel(
            'neoman_global_panel',
            array(
                'title' => esc_html__('Global', 'neoman'),
            )
        );
        $wp_customize->add_section(
            'neoman_layout_section',
            array(
                'title' => esc_html__('Layout', 'neoman'),
                'panel' => 'neoman_global_panel',
            )
        );
        $wp_customize->add_setting(
            'neoman_container_width',
            array(
                'default'           => '1200',
                'transport'         => 'postMessage',
                'sanitize_callback' => 'neoman_sanitize_integer',
            )
        );

        $wp_customize->add_control(
            new Neoman_Range_Slider_Control(
                $wp_customize,
                'neoman_container_width',
                array(
                    'type'    => 'neoman-range-slider',
                    'section' => 'neoman_layout_section',
                    'label'   => esc_html__('Container Width', 'neoman'),

                )
            )
        );
        /**
         * Default Layout
         */
        $layout_choices = array(
            ''                 => esc_html__('Default', 'neoman'),
            'content-sidebar'  => esc_html__('Content / Sidebar', 'neoman'),
            'sidebar-content'  => esc_html__('Sidebar / Content', 'neoman'),
            'both-sidebar'     => esc_html__('Sidebar / Content / Sidebar', 'neoman'),
            'no-sidebar'       => esc_html__('No Sidebar', 'neoman'),
            'content-sidebars' => esc_html__('Content / Sidebar / Sidebar', 'neoman'),
            'sidebars-content' => esc_html__('Sidebar / Sidebar / Content', 'neoman'),
        );
        $wp_customize->add_setting(
            'neoman_default_layout',
            array(
                'default'           => 'content-sidebar',
                'sanitize_callback' => 'neoman_sanitize_choices',
            )
        );
        $wp_customize->add_control(
            'neoman_default_layout',
            array(
                'type'    => 'select',
                'section' => 'neoman_layout_section',
                'label'   => esc_html__('Default Width', 'neoman'),
                'choices' => $layout_choices,
            )
        );
        /**
         * Blog Post Layout
         */
        $wp_customize->add_setting(
            'neoman_blog_post_layout',
            array(
                'sanitize_callback' => 'neoman_sanitize_choices',
            )
        );
        $wp_customize->add_control(
            'neoman_blog_post_layout',
            array(
                'type'    => 'select',
                'section' => 'neoman_layout_section',
                'label'   => esc_html__('Blog Post Width', 'neoman'),
                'choices' => $layout_choices,
            )
        );

        /**
         * Page Layout
         */
        $wp_customize->add_setting(
            'neoman_page_layout',
            array(
                'sanitize_callback' => 'neoman_sanitize_choices',
            )
        );
        $wp_customize->add_control(
            'neoman_page_layout',
            array(
                'type'    => 'select',
                'section' => 'neoman_layout_section',
                'label'   => esc_html__('Page Width', 'neoman'),
                'choices' => $layout_choices,
            )
        );
        /**
         * Archives Layout
         */
        $wp_customize->add_setting(
            'neoman_archive_layout',
            array(
                'sanitize_callback' => 'neoman_sanitize_choices',
            )
        );
        $wp_customize->add_control(
            'neoman_archive_layout',
            array(
                'type'    => 'select',
                'section' => 'neoman_layout_section',
                'label'   => esc_html__('Archives Width', 'neoman'),
                'choices' => $layout_choices,
            )
        );
        /**
         * Left Sidebar Width
         */
        $wp_customize->add_setting(
            'neoman_left_sidebar_width',
            array(
                'default'           => '20',
                'transport'         => 'postMessage',
                'sanitize_callback' => 'neoman_sanitize_integer',
            )
        );

        $wp_customize->add_control(
            new Neoman_Range_Slider_Control(
                $wp_customize,
                'neoman_left_sidebar_width',
                array(
                    'type'    => 'neoman-range-slider',
                    'section' => 'neoman_layout_section',
                    'label'   => esc_html__('Left Sidebar Width', 'neoman'),
                    'unit'    => esc_html('%', 'neoman'),
                    'min'     => 0,
                    'max'     => 100,
                    'step'    => 1,
                )
            )
        );
        /**
         * Right Sidebar Width
         */
        $wp_customize->add_setting(
            'neoman_right_sidebar_width',
            array(
                'default'           => '20',
                'transport'         => 'postMessage',
                'sanitize_callback' => 'neoman_sanitize_integer',
            )
        );

        $wp_customize->add_control(
            new Neoman_Range_Slider_Control(
                $wp_customize,
                'neoman_right_sidebar_width',
                array(
                    'type'    => 'neoman-range-slider',
                    'section' => 'neoman_layout_section',
                    'label'   => esc_html__('Right Sidebar Width', 'neoman'),
                    'unit'    => esc_html('%', 'neoman'),
                    'min'     => 0,
                    'max'     => 100,
                    'step'    => 1,
                )
            )
        );
        /**
         * Show or hide Excerpt length control
         */
        function neoman_show_hide_excerpt_length($control)
        {
            $setting = $control->manager->get_setting('neoman_content_display');
            if ('excerpt' === $setting->value()) {
                return true;
            } else {
                return false;
            }
        }
        /**
         * Content Panel
         */
        $wp_customize->add_panel(
            'neoman_content_panel',
            array(
                'title' => esc_html__('Content', 'neoman'),
            )
        );
        /**
         * Blog / Archive Section
         */
        $wp_customize->add_section(
            'neoman_blog_archive',
            array(
                'title' => esc_html__('Blog / Archive', 'neoman'),
                'panel' => 'neoman_content_panel',
            )
        );

        /**
         * Content Display
         */
        $wp_customize->add_setting(
            'neoman_content_display',
            array(
                'default'           => 'excerpt',
                'sanitize_callback' => 'neoman_sanitize_choices',
            )
        );
        $wp_customize->add_control(
            'neoman_content_display',
            array(
                'type'    => 'select',
                'section' => 'neoman_blog_archive',
                'label'   => esc_html__('Content Display', 'neoman'),
                'choices' => array(
                    'excerpt' => esc_html__('Excerpt', 'neoman'),
                    'full'    => esc_html__('Full Content', 'neoman'),
                ),
            )
        );
        /**
         * Excerpt Length
         */
        $wp_customize->add_setting(
            'neoman_excerpt_length',
            array(
                'default'           => '35',
                'sanitize_callback' => 'neoman_sanitize_integer',
            )
        );
        $wp_customize->add_control(
            new Neoman_Range_Slider_Control(
                $wp_customize,
                'neoman_excerpt_length',
                array(
                    'type'    => 'neoman-range-slider',
                    'section' => 'neoman_blog_archive',
                    'label'   => esc_html__('Excerpt Length', 'neoman'),
                    'unit'    => esc_html(''),
                    'min'     => 5,
                    'max'     => 200,
                    'step'    => 1,
                    'active_callback'   => 'neoman_show_hide_excerpt_length'
                )
            )
        );
        /**
         * Blog Post Elements
         */
        $wp_customize->register_control_type('Neoman_Sortable_Control');
        $wp_customize->add_setting(
            'neoman_blog_post_elements',
            array(
                'default'   => array('title', 'meta', 'featured_image', 'content', 'entry_footer'),
                'sanitize_callback' => 'neoman_sanitize_multi_choices',
            )
        );
        $wp_customize->add_control(
            new Neoman_Sortable_Control(
                $wp_customize,
                'neoman_blog_post_elements',
                array(
                    'section'  => 'neoman_blog_archive',
                    'label' => esc_html__('Post Elements', 'neoman'),
                    'choices'   => array(
                        'featured_image'    => esc_html__('Featured Image', 'neoman'),
                        'title' => esc_html__('Title', 'neoman'),
                        'meta'  => esc_html__('Meta', 'neoman'),
                        'content'   => esc_html__('Content', 'neoman'),
                        'entry_footer'  => esc_html__('Entry Footer', 'neoman'),
                    ),
                )
            )
        );
    }
endif;
add_action('customize_register', 'neoman_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if (!function_exists('neoman_customize_preview_init')) :
    function neoman_customize_preview_init()
    {
        wp_enqueue_script('neoman-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), false, true);
    }
endif;

add_action('customize_preview_init', 'neoman_customize_preview_init');

/**
 * Customizer control scripts.
 */
if (!function_exists('neoman_customizer_controls')) :
    function neoman_customizer_controls()
    {
        wp_enqueue_script('neoman-customizer-controls', get_template_directory_uri() . '/assets/js/customizer-controls.js', array('jquery'), false, true);
    }
endif;
add_action('customize_controls_enqueue_scripts', 'neoman_customizer_controls');
