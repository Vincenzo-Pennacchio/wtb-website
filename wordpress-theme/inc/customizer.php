<?php
/**
 * WealthBag Theme Customizer
 *
 * @package WealthBag
 * @since 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 */
function wealthbag_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'wealthbag_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'wealthbag_customize_partial_blogdescription',
        ));
    }

    // WealthBag Banner Section
    $wp_customize->add_section('wealthbag_banner_section', array(
        'title'    => __('Banner Settings', 'wealthbag'),
        'priority' => 30,
    ));

    // First Banner Image
    $wp_customize->add_setting('wealthbag_first_banner_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'wealthbag_first_banner_image', array(
        'label'    => __('First Banner Image', 'wealthbag'),
        'section'  => 'wealthbag_banner_section',
        'settings' => 'wealthbag_first_banner_image',
    )));

    // Main Banner Image
    $wp_customize->add_setting('wealthbag_main_banner_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'wealthbag_main_banner_image', array(
        'label'    => __('Main Banner Image', 'wealthbag'),
        'section'  => 'wealthbag_banner_section',
        'settings' => 'wealthbag_main_banner_image',
    )));

    // Banner Title
    $wp_customize->add_setting('wealthbag_banner_title', array(
        'default'           => get_bloginfo('name'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('wealthbag_banner_title', array(
        'label'    => __('Banner Title', 'wealthbag'),
        'section'  => 'wealthbag_banner_section',
        'type'     => 'text',
    ));

    // WealthBag Social Media Section
    $wp_customize->add_section('wealthbag_social_section', array(
        'title'    => __('Social Media Links', 'wealthbag'),
        'priority' => 35,
    ));

    $social_networks = array(
        'telegram' => 'Telegram',
        'twitter'  => 'Twitter',
        'discord'  => 'Discord',
        'youtube'  => 'YouTube',
    );

    foreach ($social_networks as $network => $label) {
        $wp_customize->add_setting("wealthbag_{$network}_url", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control("wealthbag_{$network}_url", array(
            'label'    => sprintf(__('%s URL', 'wealthbag'), $label),
            'section'  => 'wealthbag_social_section',
            'type'     => 'url',
        ));
    }
}
add_action('customize_register', 'wealthbag_customize_register');

/**
 * Render the site title for the selective refresh partial.
 */
function wealthbag_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 */
function wealthbag_customize_partial_blogdescription() {
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wealthbag_customize_preview_js() {
    wp_enqueue_script('wealthbag-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), WEALTHBAG_VERSION, true);
}
add_action('customize_preview_init', 'wealthbag_customize_preview_js');