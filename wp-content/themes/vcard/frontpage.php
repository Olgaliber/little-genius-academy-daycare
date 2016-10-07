<?php
/*
Template name: Frontpage Template
*/
 get_header(); ?>

                <div class="flexslider">
                    <div class="slides">

 <?php 
    if ( ( $locations = get_nav_menu_locations() ) && $locations['primary-menu'] ) {
        $menu = wp_get_nav_menu_object( $locations['primary-menu'] );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        $include = array();
        foreach($menu_items as $item) {
            if($item->object == 'page')
                
                $include[] = $item->object_id;
        }
        $main_query = new WP_Query( array( 'post_type' => 'page', 'post__in' => $include, 'posts_per_page' => count($include), 'orderby' => 'post__in' ) );
   $i = 1;
    while ($main_query->have_posts()) : $main_query->the_post();
    

    $post_name = $post->post_name;
    
    $post_id = get_the_ID();?>
    <?php if (get_post_meta($post_id, "rnr_assign_type", true) == "yes"){ 
        ?>
        <section class="no-height">
                            <div class="item contact" id="5">
                                <div class="page-head">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <h3><?php the_title();?></h3>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="np-main">
                                                <p>Go to next/previous page</p>
                                                <div class="np-controls">
                                                    <a href="#" class="previous"><i class="fa fa-arrow-circle-left"></i></a>
                                                    <a href="#" class="next"><i class="fa fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if(empty($vc_options['lat'])):?>  
                                <div class="google-map"><?php echo get_post_meta($post->ID,'rnr_gmap',true
                                );?></div>
                                <?php endif?>
                                 <?php if(!empty($vc_options['lat'])):?> 
                                <div class="map">
                                    <div class="gmap">
                                        <div id="map"></div>
                                    </div>
                                </div>
                                <?php endif?>
                               <?php global $more; $more = 0; the_content('');?>
                                
                            </div>
                        </section>
<?php } else{ ?>
         <section class="no-display" id="<?php echo $post->post_name;?>">
                            
            
            <?php global $more; $more = 0; the_content('');?>
                    
   
    </section>
    <?php }?>
     <?php $i++;?>
    <?php endwhile; wp_reset_query(); ?>
    <?php
    }

    else if ( ( $locations = get_nav_menu_locations() ) && $locations['top-menu'] ) {
        printf('<div class="item resume"><h1>Plese select Primary menu</h1><br
            ><h3>OR</h3><br><p>If You Use secondary 
            menu than All Page should be select<h3> default template</h3></p></div>');
    }
    
 
   
     ?>
    

    
    
    


 <?php get_footer();?>