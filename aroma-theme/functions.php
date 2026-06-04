<?php
/**
 * Aroma Slastičarna — WordPress Theme Functions
 *
 * Registers theme supports and enqueues assets.
 * TailwindCSS (CDN), GSAP (CDN) and all inline scripts are loaded via
 * header.php / footer.php — no separate wp_enqueue_script() calls are needed
 * for those. Only the generated style.css (theme header) is enqueued here so
 * WordPress can identify the theme version.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// ---------------------------------------------------------------------------
// Theme Setup
// ---------------------------------------------------------------------------
function aroma_setup() {
    /*
     * Let WordPress manage the <title> tag.
     * Outputs via wp_head() in header.php.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for post thumbnail / featured image.
     * Used if custom page templates or blog posts are added later.
     */
    add_theme_support( 'post-thumbnails' );

    /*
     * Register menus (nav locations). The primary menu is rendered inline in
     * header.php; register here so admins can assign it via Appearance → Menus.
     */
    register_nav_menus( array(
        'primary' => __( 'Primarna Navigacija', 'aroma' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    /*
     * Add default posts and comments RSS feed links to head.
     */
    add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'aroma_setup' );

// ---------------------------------------------------------------------------
// Enqueue Styles
// ---------------------------------------------------------------------------
function aroma_enqueue_assets() {
    /*
     * Enqueue the main stylesheet (style.css in the theme root).
     * Versioned with the theme version from the file header for cache busting.
     */
    wp_enqueue_style(
        'aroma-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get( 'Version' )
    );
}
add_action( 'wp_enqueue_scripts', 'aroma_enqueue_assets' );

// ---------------------------------------------------------------------------
// Custom Image Sizes
// ---------------------------------------------------------------------------
add_image_size( 'aroma-hero',  1920, 1080, true );
add_image_size( 'aroma-card',   600,  450, true );
add_image_size( 'aroma-thumb',  400,  400, true );

// ---------------------------------------------------------------------------
// Security: Remove WordPress version from output
// ---------------------------------------------------------------------------
remove_action( 'wp_head', 'wp_generator' );

// ---------------------------------------------------------------------------
// Disable XML-RPC (not used; reduces attack surface)
// ---------------------------------------------------------------------------
add_filter( 'xmlrpc_enabled', '__return_false' );

// ---------------------------------------------------------------------------
// Add rel="noopener noreferrer" to all external links in content
// (Security best practice for target="_blank" links added via the editor)
// ---------------------------------------------------------------------------
function aroma_rel_noopener( $content ) {
    return preg_replace(
        '/<a(\s[^>]*target=["\']_blank["\'][^>]*)>/i',
        '<a$1 rel="noopener noreferrer">',
        $content
    );
}
add_filter( 'the_content', 'aroma_rel_noopener' );
