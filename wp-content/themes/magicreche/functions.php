<?php

/* Theme Support
-------------------------------------------------------------------------------------------------------------------*/

// Translation
load_theme_textdomain('magicreche', get_template_directory() . '/lang');

// Default RSS feed links
add_theme_support('automatic-feed-links');

// Allow shortcodes in widget text
add_filter('widget_text', 'do_shortcode');

// Post Formats
add_theme_support('post-formats', array('gallery', 'video', 'image', 'audio'));

// Register Navigation
register_nav_menu('header_nav', 'Main Navigation');

// Content Width
if (!isset( $content_width )) $content_width = 1170;

// Thumbnails
add_theme_support('post-thumbnails');

add_image_size('blog', 750, 422, false);
add_image_size('staff', 285, 250, false);
add_image_size('gallery', 380, 240, true);
 
function excerpt_more( $more ) {
    return '&hellip;';
}
add_filter('excerpt_more', 'excerpt_more'); 


/* Register Custom Navigation Walker
-------------------------------------------------------------------------------------------------------------------*/

require_once( trailingslashit( get_template_directory() ) . 'framework/inc/wp_bootstrap_navwalker.php' );


/* Include CSS & JS
-------------------------------------------------------------------------------------------------------------------*/

include_once('framework/enqueue.php'); // Enqueue JavaScripts & CSS3
include_once('framework/inc/shortcodes/shortcodes.php'); // Shortcodes

function wpex_fix_shortcodes($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );

    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'wpex_fix_shortcodes');


/* Include OptionTree
-------------------------------------------------------------------------------------------------------------------*/

add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
load_template( trailingslashit( get_template_directory() ) . 'framework/plugins/option-tree/ot-loader.php' );
load_template( trailingslashit( get_template_directory() ) . 'framework/inc/theme-options.php' );
load_template( trailingslashit( get_template_directory() ) . 'framework/inc/meta-boxes.php' );

/* =============================================================================
    Include the Option-Tree Google Fonts Plugin
    ========================================================================== */

    // load the ot-google-fonts plugin if the loader class is available
    if( class_exists( 'OT_Loader' ) ):

        global $ot_options;

        $ot_options = get_option( 'option_tree' );

        // default fonts used in this theme, even though there are no google fonts
        $default_theme_fonts = array(
            'arial' => 'Arial, Helvetica, sans-serif',
            'helvetica' => 'Helvetica, Arial, sans-serif',
            'georgia' => 'Georgia, "Times New Roman", Times, serif',
            'tahoma' => 'Tahoma, Geneva, sans-serif',
            'times' => '"Times New Roman", Times, serif',
            'trebuchet' => '"Trebuchet MS", Arial, Helvetica, sans-serif',
            'verdana' => 'Verdana, Geneva, sans-serif'
        );

        defined('OT_FONT_DEFAULTS') or define('OT_FONT_DEFAULTS', serialize($default_theme_fonts));

        // get the OT-Google-Font plugin file
        include_once( get_template_directory().'/framework/plugins/option-tree-google-fonts/ot-google-fonts.php' );

        // get the google font array - build in ot-google-fonts.php
        $google_font_array = ot_get_google_font();

        // Now apply the fonts to the font dropdowns in theme options with the build in OptionTree hook
        function ot_filter_recognized_font_families( $array, $field_id ) {

            global $google_font_array;

            // loop through the cached google font array if available and append to default fonts
            $font_array = array();
            if($google_font_array){
                foreach($google_font_array as $index => $value){
                     $font_array[$index] = $value['family'];
                }
            }

            // put both arrays together
            $array = array_merge(unserialize(OT_FONT_DEFAULTS), $font_array);

            return $array;

        }
        add_filter( 'ot_recognized_font_families', 'ot_filter_recognized_font_families', 1, 2 );

    endif;


/* Register Widgetized Locations
-------------------------------------------------------------------------------------------------------------------*/

// Register widgetized locations
if(function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Default',
        'id' => 'default',
        'description' => 'This sidebar will be used on pages be default, but can be overriden with custom generated sidebar.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside><hr>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ));
    register_sidebar(array(
        'name' => 'Blog',
        'id' => 'blog',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside><hr>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ));
    register_sidebar(array(
        'name' => 'Post',
        'id' => 'post',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside><hr>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ));
}

// Set the default sidebar
update_option('simple_page_sidebars_default_sidebar', 'Default');


/* Plugins Activation
-------------------------------------------------------------------------------------------------------------------*/

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.5.2
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/framework/plugins/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'magicreche_register_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function magicreche_register_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        array(
            'name'                  => 'Timetable Responsive Schedule For WordPress ', 
            'slug'                  => 'timetable',
            'source'                => trailingslashit( get_template_directory() ) . '/framework/plugins/timetable.zip',
            'required'              => false,
            'version'               => '3.7',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        array(
            'name'      => 'WP Retina 2x',
            'slug'      => 'wp-retina-2x',
            'required'  => false,
        ),
    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.

        /*
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
            'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
            'installing'                      => __( 'Installing Plugin: %s', 'theme-slug' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'theme-slug' ),
            'notice_can_install_required'     => _n_noop(
                'This theme requires the following plugin: %1$s.',
                'This theme requires the following plugins: %1$s.',
                'theme-slug'
            ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop(
                'This theme recommends the following plugin: %1$s.',
                'This theme recommends the following plugins: %1$s.',
                'theme-slug'
            ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop(
                'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
                'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
                'theme-slug'
            ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop(
                'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                'theme-slug'
            ), // %1$s = plugin name(s).
            'notice_ask_to_update_maybe'      => _n_noop(
                'There is an update available for: %1$s.',
                'There are updates available for the following plugins: %1$s.',
                'theme-slug'
            ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop(
                'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
                'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
                'theme-slug'
            ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop(
                'The following required plugin is currently inactive: %1$s.',
                'The following required plugins are currently inactive: %1$s.',
                'theme-slug'
            ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop(
                'The following recommended plugin is currently inactive: %1$s.',
                'The following recommended plugins are currently inactive: %1$s.',
                'theme-slug'
            ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop(
                'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
                'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
                'theme-slug'
            ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop(
                'Begin installing plugin',
                'Begin installing plugins',
                'theme-slug'
            ),
            'update_link'                     => _n_noop(
                'Begin updating plugin',
                'Begin updating plugins',
                'theme-slug'
            ),
            'activate_link'                   => _n_noop(
                'Begin activating plugin',
                'Begin activating plugins',
                'theme-slug'
            ),
            'return'                          => __( 'Return to Required Plugins Installer', 'theme-slug' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'theme-slug' ),
            'activated_successfully'          => __( 'The following plugin was activated successfully:', 'theme-slug' ),
            'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'theme-slug' ),  // %1$s = plugin name(s).
            'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'theme-slug' ),  // %1$s = plugin name(s).
            'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'theme-slug' ), // %s = dashboard link.
            'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'tgmpa' ),

            'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        ),
        */
    );

    tgmpa( $plugins, $config );
}


/* Register Custom Post Type And Taxonomies
-------------------------------------------------------------------------------------------------------------------*/

add_action('init', 'types_taxonomies_init', 10);
function types_taxonomies_init() {


/* Reviews
-------------------------------------------------------------------------------------------------------------------*/

    register_post_type(
        'review',
        array(
            'label' => 'Reviews',
            'labels' => array(
                'name' => 'Reviews',
                'all_items' => 'All Reviews',
                'singular_name' => 'Review',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Review'
            ),
            'public' => true,
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'show_in_menu' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-format-chat',
            'supports' => array(
                'title'
            ),
            'register_meta_box_cb' => '',
            'has_archive' => false
        )
    );


/* Staff
-------------------------------------------------------------------------------------------------------------------*/

    register_post_type(
        'staff',
        array(
            'label' => 'Staff',
            'labels' => array(
                'name' => 'Staff',
                'all_items' => 'All Employees',
                'singular_name' => 'Employee',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Employee'
            ),
            'public' => true,
            'exclude_from_search' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'show_in_menu' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-admin-users',
            'supports' => array(
                'title', 'thumbnail', 'editor', 'custom-fields'
            ),
            'register_meta_box_cb' => '',
            'has_archive' => true
        )
    );

}


/* Menu
-------------------------------------------------------------------------------------------------------------------*/

add_filter('page_link', 'filterPageLink', 10, 3);

function filterPageLink($link, $id, $sample) {

    $parent_id = get_post_ancestors($id);

    if (!is_admin() && !empty($parent_id)) {

        $link = basename($link);

        $link = str_replace('?page_id=', 'section-', $link);

        $link = trailingslashit( get_permalink($parent_id[0]) ) . '#' . $link;
        
    }

    return $link;
}

function getMagicrechePageID($page_ID) {

    $anchor = basename(get_permalink($page_ID));

    $anchor = str_replace('#', '', $anchor);

    return apply_filters('magicreche_page_id', $anchor);
}


/* Comments
-------------------------------------------------------------------------------------------------------------------*/
    
function magicreche_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment; ?>

    <li <?php comment_class('media'); ?> id="li-comment-<?php comment_ID() ?>">
        <div class="pull-left"><?php echo get_avatar($comment, 80); ?></div>
        <article id="comment-<?php comment_ID(); ?>" class="media-body">
            <header class="comment-meta">
                <h5 class="media-heading">
                    <?php printf( __( '%s', 'magicreche'), get_comment_author_link() ); ?>
                    <small class="pull-right"><?php printf(__('%1$s', 'magicreche'), get_comment_date('F j, Y - g:ia') ) ?><?php edit_comment_link( __( '(Edit)', 'magicreche'),'  ','' ) ?></small>
                </h5>
            </header>

            <section class="comment-content"><?php
                comment_text();
                if ( $comment->comment_approved == '0' ) : ?>
                    <p><?php _e( 'Your comment is awaiting moderation.', 'magicreche' ) ?></p><?php
                endif; ?>
                <p><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
            </section>
                      
       </article>
    </li><?php
}


/* Replace Standard Gallery Shortcode
-------------------------------------------------------------------------------------------------------------------*/

remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'magicreche_post_gallery');

function magicreche_post_gallery($attr) {

    wp_enqueue_script('hoverdir');

    $post = get_post();

    static $instance = 0;
    $instance++;

    if ( ! empty( $attr['ids'] ) ) {
        // 'ids' is explicitly ordered, unless you specify otherwise.
        if ( empty( $attr['orderby'] ) )
            $attr['orderby'] = 'post__in';
        $attr['include'] = $attr['ids'];
    }

    // Allow plugins/themes to override the default gallery template.
    $output = apply_filters('post_gallery', '', $attr);
    if ( $output != '' )
        return $output;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post ? $post->ID : 0,
        'itemtag'    => 'li',
        'icontag'    => '',
        'captiontag' => 'span',
        'columns'    => 3,
        'size'       => 'gallery',
        'include'    => '',
        'exclude'    => '',
        'link'       => ''
    ), $attr, 'gallery'));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, 'full', true);
        return $output;
    }

    $columns = intval($columns);
    switch ($columns) {
        case '10':
        case '9':
        case '8':
        case '7':
        case '6':
        case '5':
        case '4':
            $itemwidth = 'col-sm-3';
            $row_break = 4;
            break;
        case '3':
            $itemwidth = 'col-sm-4';
            $row_break = 3;
            break;
        case '2':
        case '1':
            $itemwidth = 'col-sm-6';
            $row_break = 2;
            break;
        
        default:
            $itemwidth = 'col-sm-3';
            $row_break = 3;
            break;
    }

    $selector = "gallery-{$instance}";

    $size_class = sanitize_html_class( $size );
    $gallery_div = '<ul id="' . $selector . '" class="gallery gallery-columns-' . $columns . ' gallery-size-' . $size_class . '">';
    $output = $gallery_div;

    $i = 0;
 
    foreach ( $attachments as $id => $attachment ) {

        $i = $i + 1;

        $thumb = wp_get_attachment_image_src( $id, 'gallery', false );
        $full = wp_get_attachment_image_src( $id, 'full', false );

        $image_output = '<a href="' . $full[0] . '" title="' . wptexturize($attachment->post_excerpt) . '" class="fancybox" data-fancybox-group="' . $selector . '" rel="gallery"><img src="' . $thumb[0] . '"><span><i class="fa fa-search fa-3x"></i></span></a>';

        $image_meta = wp_get_attachment_metadata( $id );

        $output .= '<li class="gallery-item ' . $itemwidth . '">';
        $output .= $image_output;
        $output .= '</li>';

    }

    $output .= '</ul>';

    return $output;
}


/* WPML
-------------------------------------------------------------------------------------------------------------------*/

function icl_post_languages() {

  $languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');

  if( 1 < count($languages) ) {

    echo('<div id="header-languages"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i>');
    foreach($languages as $l) {
        if( $l['active'] ) echo('<img src="' . $l['country_flag_url'] . '" alt="' . $l['native_name'] . '" title="' . $l['native_name'] . '">');
    }
    echo('</span></a><div class="dropdown-menu"><ul>');
    
    foreach($languages as $l) {
        if( !$l['active'] ) echo('<li><a href="' . $l['url'] . '"><img src="' . $l['country_flag_url'] . '" alt="' . $l['native_name'] . '" title="' . $l['native_name'] . '"></a></li>');
    }

    echo('</ul></div></div>');

  }

} ?>
