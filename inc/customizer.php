<?php
/**
 * Customizer settings for FlairFacilities
 *
 * @package FlairFacilities
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Customizer setup
 */
function flairfacilities_customize_register( $wp_customize ) {
    
    // Colors Section
    $wp_customize->add_section( 'flairfacilities_colors', array(
        'title'    => __( 'Flair Colors', 'flairfacilities' ),
        'priority' => 20,
    ) );
    
    $wp_customize->add_setting( 'flairfacilities_primary_color', array(
        'default'           => '#1e3a8a',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'flairfacilities_primary_color', array(
        'label'   => __( 'Primary Color', 'flairfacilities' ),
        'section' => 'flairfacilities_colors',
    ) ) );
    
    $wp_customize->add_setting( 'flairfacilities_accent_color', array(
        'default'           => '#dc2626',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'flairfacilities_accent_color', array(
        'label'   => __( 'Accent Color', 'flairfacilities' ),
        'section' => 'flairfacilities_colors',
    ) ) );
    
    $wp_customize->add_setting( 'flairfacilities_dark_color', array(
        'default'           => '#0f172a',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'flairfacilities_dark_color', array(
        'label'   => __( 'Dark Color', 'flairfacilities' ),
        'section' => 'flairfacilities_colors',
    ) ) );

    // Contact Info Section
    $wp_customize->add_section( 'flairfacilities_contact', array(
        'title'    => __( 'Flair Contact Info', 'flairfacilities' ),
        'priority' => 30,
    ) );
    
    $wp_customize->add_setting( 'flairfacilities_phone', array(
        'default'           => '020 7998 9005',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'flairfacilities_phone', array(
        'label'   => __( 'Main Phone', 'flairfacilities' ),
        'section' => 'flairfacilities_contact',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'flairfacilities_email', array(
        'default'           => 'info@flairfacilities.co.uk',
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'flairfacilities_email', array(
        'label'   => __( 'Email Address', 'flairfacilities' ),
        'section' => 'flairfacilities_contact',
        'type'    => 'email',
    ) );
    
    $wp_customize->add_setting( 'flairfacilities_address', array(
        'default'           => "24 Kemp House, 152 City Road\nLondon, EC1V 2NX",
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'flairfacilities_address', array(
        'label'   => __( 'Address', 'flairfacilities' ),
        'section' => 'flairfacilities_contact',
        'type'    => 'textarea',
    ) );

    // Typography Section
    $wp_customize->add_section( 'flairfacilities_typography', array(
        'title'    => __( 'Flair Typography', 'flairfacilities' ),
        'priority' => 40,
    ) );
    
    $wp_customize->add_setting( 'flairfacilities_body_font', array(
        'default'           => 'inter',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'flairfacilities_body_font', array(
        'label'   => __( 'Body Font', 'flairfacilities' ),
        'section' => 'flairfacilities_typography',
        'type'    => 'select',
        'choices' => array(
            'inter'     => 'Inter (Modern)',
            'system'    => 'System Default',
            'georgia'   => 'Georgia (Serif)',
        ),
    ) );
}
add_action( 'customize_register', 'flairfacilities_customize_register' );
