<?php
/**
 * FlairFacilities Theme Functions
 *
 * @package FlairFacilities
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'FLAIR_FACILITIES_VERSION', '1.0.0' );

define( 'FLAIR_FACILITIES_DIR', get_template_directory() );
define( 'FLAIR_FACILITIES_URI', get_template_directory_uri() );

/**
 * Theme setup
 */
function flairfacilities_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'block-templates' );
    add_theme_support( 'block-template-parts' );

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'flairfacilities' ),
        'footer'  => __( 'Footer Menu', 'flairfacilities' ),
    ) );

    add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'flairfacilities_setup' );

/**
 * Enqueue scripts and styles
 */
function flairfacilities_enqueue_assets() {
    wp_enqueue_style(
        'flairfacilities-style',
        FLAIR_FACILITIES_URI . '/assets/css/style.css',
        array(),
        FLAIR_FACILITIES_VERSION
    );

    wp_enqueue_script(
        'flairfacilities-animations',
        FLAIR_FACILITIES_URI . '/assets/js/animations.js',
        array(),
        FLAIR_FACILITIES_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'flairfacilities_enqueue_assets' );

/**
 * Enqueue block assets
 */
function flairfacilities_enqueue_block_assets() {
    wp_enqueue_style(
        'flairfacilities-blocks',
        FLAIR_FACILITIES_URI . '/assets/css/blocks.css',
        array(),
        FLAIR_FACILITIES_VERSION
    );
}
add_action( 'enqueue_block_assets', 'flairfacilities_enqueue_block_assets' );

/**
 * Register block categories
 */
function flairfacilities_block_categories( $categories ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'flairfacilities',
                'title' => __( 'Flair Facilities', 'flairfacilities' ),
                'icon'  => 'building',
            ),
        )
    );
}
add_filter( 'block_categories_all', 'flairfacilities_block_categories', 10, 1 );

/**
 * Register custom blocks
 */
function flairfacilities_register_blocks() {
    $blocks = array( 'service-card', 'stat-counter', 'testimonial-slider', 'cta-banner' );
    
    foreach ( $blocks as $block ) {
        register_block_type( FLAIR_FACILITIES_DIR . '/blocks/' . $block );
    }
}
add_action( 'init', 'flairfacilities_register_blocks' );

/**
 * Register block patterns
 */
function flairfacilities_register_patterns() {
    register_block_pattern_category(
        'flairfacilities',
        array( 'label' => __( 'Flair Facilities', 'flairfacilities' ) )
    );
}
add_action( 'init', 'flairfacilities_register_patterns' );

/**
 * Include required files
 */
require_once FLAIR_FACILITIES_DIR . '/inc/customizer.php';

/**
 * Add custom body classes
 */
function flairfacilities_body_classes( $classes ) {
    if ( is_front_page() ) {
        $classes[] = 'front-page';
    }
    return $classes;
}
add_filter( 'body_class', 'flairfacilities_body_classes' );

/**
 * Output customizer CSS in head
 */
function flairfacilities_customizer_css() {
    $primary_color = get_theme_mod( 'flairfacilities_primary_color', '#1e3a8a' );
    $accent_color  = get_theme_mod( 'flairfacilities_accent_color', '#dc2626' );
    $dark_color    = get_theme_mod( 'flairfacilities_dark_color', '#0f172a' );
    ?>
    <style type="text/css">
        :root {
            --flair-primary: <?php echo esc_attr( $primary_color ); ?>;
            --flair-accent: <?php echo esc_attr( $accent_color ); ?>;
            --flair-dark: <?php echo esc_attr( $dark_color ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'flairfacilities_customizer_css' );
