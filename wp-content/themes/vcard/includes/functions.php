<?php
global $vc_options;
if( ! function_exists( 'vc_portfolio_post_types' ) ) {
    function vc_portfolio_post_types() {

        register_post_type(
            'Portfolio',
            array(
                'labels' => array(
                    'name'          => __( 'Portfolio Post', 'Portfolio' ),
                    'singular_name' => __( 'portfolio', 'portfolio' ),
                    'add_new'       => __( 'Add New', 'portfolio' ),
                    'add_new_item'  => __( 'Add New Portfolio', 'portfolio' ),
                    'edit'          => __( 'Edit', 'portfolio' ),
                    'edit_item'     => __( 'Edit portfolio', 'portfolio' ),
                    'new_item'      => __( 'New portfolio', 'portfolio' ),
                    'view'          => __( 'View portfolio', 'portfolio' ),
                    'view_item'     => __( 'View portfolio', 'portfolio' ),
                    'search_items'  => __( 'Search portfolio', 'portfolio' ),
                    'not_found'     => __( 'No portfolio found', 'portfolio' ),
                    'not_found_in_trash' => __( 'No portfolio found in Trash', 'portfolio' ),
                    'parent'        => __( 'Parent portfolio', 'portfolio' ),
                ),
                
                'description'       => __( 'Create a portfolio.', 'portfolio' ),
                'public'            => true,
                'show_ui'           => true,
                'show_in_menu'          => true,
                'publicly_queryable'    => true,
                'exclude_from_search'   => true,
                'menu_position'         => 6,
                'hierarchical'      => true,
                'query_var'         => true,
                'supports'  => array (
                    'title', //Text input field to create a post title.
                    'editor',
                    'thumbnail',
                    
                )
            )
        );
register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true, 'label' => 'Portfolio Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
        
        

    }
}

add_action( 'init', 'vc_portfolio_post_types' ); // register post type

register_taxonomy_for_object_type('category', 'custom-type');


//Custom Post Education

if( ! function_exists( 'vc_education_post_types' ) ) {
    function vc_education_post_types() {

        register_post_type(
            'education',
            array(
                'labels' => array(
                    'name'          => __( 'education Post', 'education' ),
                    'singular_name' => __( 'education', 'education' ),
                    'add_new'       => __( 'Add New', 'education' ),
                    'add_new_item'  => __( 'Add New education', 'education' ),
                    'edit'          => __( 'Edit', 'education' ),
                    'edit_item'     => __( 'Edit education', 'education' ),
                    'new_item'      => __( 'New education', 'education' ),
                    'view'          => __( 'View education', 'education' ),
                    'view_item'     => __( 'View education', 'education' ),
                    'search_items'  => __( 'Search education', 'education' ),
                    'not_found'     => __( 'No education found', 'education' ),
                    'not_found_in_trash' => __( 'No education found in Trash', 'education' ),
                    'parent'        => __( 'Parent education', 'education' ),
                ),
                
                'description'       => __( 'Create a education.', 'education' ),
                'public'            => true,
                'show_ui'           => true,
                'show_in_menu'          => true,
                'publicly_queryable'    => true,
                'exclude_from_search'   => true,
                'menu_position'         => 6,
                'hierarchical'      => true,
                'query_var'         => true,
                'supports'  => array (
                    'title', //Text input field to create a post title.
                    'editor',
                    'thumbnail',
                    
                )
            )
        );
register_taxonomy('education_category', 'education', array('hierarchical' => true, 'label' => 'education Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
    }
}
add_action( 'init', 'vc_education_post_types' ); // register post type

register_taxonomy_for_object_type('category', 'custom-type');

//Custom Post Experience

if( ! function_exists( 'vc_experience_post_types' ) ) {
    function vc_experience_post_types() {

        register_post_type(
            'experience',
            array(
                'labels' => array(
                    'name'          => __( 'experience Post', 'experience' ),
                    'singular_name' => __( 'experience', 'experience' ),
                    'add_new'       => __( 'Add New', 'experience' ),
                    'add_new_item'  => __( 'Add New experience', 'experience' ),
                    'edit'          => __( 'Edit', 'experience' ),
                    'edit_item'     => __( 'Edit experience', 'experience' ),
                    'new_item'      => __( 'New experience', 'experience' ),
                    'view'          => __( 'View experience', 'experience' ),
                    'view_item'     => __( 'View experience', 'experience' ),
                    'search_items'  => __( 'Search experience', 'experience' ),
                    'not_found'     => __( 'No experience found', 'experience' ),
                    'not_found_in_trash' => __( 'No experience found in Trash', 'experience' ),
                    'parent'        => __( 'Parent experience', 'experience' ),
                ),
                
                'description'       => __( 'Create a experience.', 'experience' ),
                'public'            => true,
                'show_ui'           => true,
                'show_in_menu'          => true,
                'publicly_queryable'    => true,
                'exclude_from_search'   => true,
                'menu_position'         => 6,
                'hierarchical'      => true,
                'query_var'         => true,
                'supports'  => array (
                    'title', //Text input field to create a post title.
                    'editor',
                    'thumbnail',
                    
                )
            )
        );
register_taxonomy('experience_category', 'experience', array('hierarchical' => true, 'label' => 'experience Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
    }
}
add_action( 'init', 'vc_experience_post_types' ); // register post type

register_taxonomy_for_object_type('category', 'custom-type');


// Add post thumbnail functionality

add_theme_support('post-thumbnails');
add_image_size('blog', 262,191, true);
add_image_size('accommotaion', 370,240, true);
add_image_size('single', 670,377, true);
add_image_size('accommotaionmini', 270,175, true);
add_image_size('mini', 65,82, true);
add_editor_style();
set_post_thumbnail( 100, 100, true );



// For Post view Count Function

function getPostViews($postID){
$count_key = 'post_views_count';
$count = get_post_meta($postID, $count_key, true);
if($count==''){
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
    return "0 View";
}
return $count.' Views';}
function setPostViews($postID) {
$count_key = 'post_views_count';
$count = get_post_meta($postID, $count_key, true);
if($count==''){
    $count = 0;
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
}else{
    $count++;
    update_post_meta($postID, $count_key, $count);
}}


// How comments are displayed


function reversal_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
?>
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-avatar">
    <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    </div>

    <div class="comment-info">
      <?php printf(__('<h6>%s','vcard'), get_comment_author()) ?><?php
        /* translators: 1: date, 2: time */
        printf( __('<span>%1$s</span></h6>','vcard'), get_comment_date()) ?>
    <?php comment_text() ?>
    <div class="space3"></div>

    

   
    <span class="comment_info1">
    <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </span>
    </div>
    
    
    
<?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.','reversal_theme') ?></em>
    <br />
<?php endif; ?>

    

    
    
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php
        }



// Register Menu

function vc_register_my_menus() {
  register_nav_menus(
    array(
      'primary-menu' => __( 'Primary Menu','vcard' ),
      'top-menu' => __( 'Seceondary Menu','vcard' ),
            
    )
  );
}
add_action( 'init', 'vc_register_my_menus' );



class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $object, $depth = 0, $args = Array() , $current_object_id = 0) {
           
           global $wp_query;

           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $object->classes ) ? array() : (array) $object->classes;
           $icon_class = $classes[0];
       $classes = array_slice($classes,1);

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           

           $attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
           $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
           $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
            
            if( $icon_class != '' ) {
              $icon_classes = '<i class="'. $icon_class .'"></i>';
        }
        else{
          $icon_classes = '';
        }

           if($object->object == 'page')
           {
                $varpost = get_post($object->object_id);                
                $separate_page = get_post_meta($object->object_id, "rnr_separate_page", true);
                $disable_menu = get_post_meta($object->object_id, "rnr_disable_section_from_menu", true);
        $current_page_id = get_option('page_on_front');

                if ( ( $disable_menu != true ) && ( $varpost->ID != $current_page_id ) ) {

                  $output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';

                  if ( $separate_page == true )
                    $attributes .= ! empty( $object->url ) ? ' href="'   . esc_attr( $object->url ) .'"' : '';
                  else{
                    if (is_front_page()) 
                      $attributes .= ' href="#' . $varpost->post_name . '"'; 
                    else 
                      $attributes .= ' href="' . home_url() .'#' . $varpost->post_name . '"';
                  } 

                  $object_output = $args->before;
                $object_output .= '<a'. $attributes .'>';
                $object_output .= $args->link_before . $icon_classes . '<span>' . apply_filters( 'the_title', $object->title, $object->ID ) . '</span>';
                $object_output .= $args->link_after;
                $object_output .= '</a>';
                $object_output .= $args->after;    

                 $output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );                              
                }
                                         
           }
           else{

              $output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';

                $attributes .= ! empty( $object->url ) ? ' href="' . esc_attr( $object->url ) .'"' : '';

              $object_output = $args->before;
              $object_output .= '<a'. $attributes .'>';
              $object_output .= $args->link_before . $icon_classes . '<span>' . apply_filters( 'the_title', $object->title, $object->ID ) . '</span>';
              $object_output .= $args->link_after;
              $object_output .= '</a>';
              $object_output .= $args->after;

               $output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );
          }

           
      }
}

// add post-formats to post_type 'page'

