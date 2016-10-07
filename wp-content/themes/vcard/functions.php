<?php
global $vc_options;
include(get_template_directory().'/includes/style.php');
include(get_template_directory().'/includes/js.php');
include(get_template_directory().'/includes/functions.php');
include(get_template_directory().'/options/options.php');

include(get_template_directory().'/symple-shortcodes/symple-shortcodes.php');
include('pagination.php'); 

/* Include Meta Box Framework */
define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/includes/metaboxes' ) );
define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/includes/metaboxes' ) );

require_once RWMB_DIR . 'meta-box.php';
include(get_template_directory().'/includes/metaboxes.php');


if ( ! isset( $content_width ) ) $content_width = 900;

add_action( 'after_setup_theme', 'vc_setup' );
function vc_setup() {
// Theme Support  
    add_editor_style();
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'custom-background' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'post-formats', array( 'image','video', 'audio','gallery','link','quote' ) );
    add_post_type_support( 'portgallery', 'post-formats' );
}



//Add multiple image
if( class_exists( 'kdMultipleFeaturedImages' ) ) {

        $args = array(
                'id' => 'featured-image-2',
                'post_type' => 'room',      // Set this to post or page
                'labels' => array(
                    'name'      => 'Featured image 2',
                    'set'       => 'Set featured image 2',
                    'remove'    => 'Remove featured image 2',
                    'use'       => 'Use as featured image 2',
                )
        );

        new kdMultipleFeaturedImages( $args );
}

if( class_exists( 'kdMultipleFeaturedImages' ) ) {

        $args = array(
                'id' => 'featured-image-3',
                'post_type' => 'room',      // Set this to post or page
                'labels' => array(
                    'name'      => 'Featured image 3',
                    'set'       => 'Set featured image 3',
                    'remove'    => 'Remove featured image 3',
                    'use'       => 'Use as featured image 3',
                )
        );

        new kdMultipleFeaturedImages( $args );
}


if( class_exists( 'kdMultipleFeaturedImages' ) ) {

        $args = array(
                'id' => 'featured-image-4',
                'post_type' => 'room',      // Set this to post or page
                'labels' => array(
                    'name'      => 'Featured image 4',
                    'set'       => 'Set featured image 4',
                    'remove'    => 'Remove featured image 4',
                    'use'       => 'Use as featured image 4',
                )
        );

        new kdMultipleFeaturedImages( $args );
}

if( class_exists( 'kdMultipleFeaturedImages' ) ) {

        $args = array(
                'id' => 'featured-image-5',
                'post_type' => 'room',      // Set this to post or page
                'labels' => array(
                    'name'      => 'Featured image 5',
                    'set'       => 'Set featured image 5',
                    'remove'    => 'Remove featured image 5',
                    'use'       => 'Use as featured image 5',
                )
        );

        new kdMultipleFeaturedImages( $args );
}


if( class_exists( 'kdMultipleFeaturedImages' ) ) {

        $args = array(
                'id' => 'featured-image-6',
                'post_type' => 'room',      // Set this to post or page
                'labels' => array(
                    'name'      => 'Featured image 6',
                    'set'       => 'Set featured image 6',
                    'remove'    => 'Remove featured image 6',
                    'use'       => 'Use as featured image 6',
                )
        );

        new kdMultipleFeaturedImages( $args );
}
