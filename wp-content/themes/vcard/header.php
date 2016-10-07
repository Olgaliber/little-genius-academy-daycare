<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<?php $vc_options = get_option('vcard_theme'); ?>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Multipress - Responsive Multipurpose HTML5 Template">
	<meta name="author" content="">
    <?php if(!empty($vc_options['title'])):?>  
    <title><?php echo ($vc_options['title']);?></title>
    <?php endif?>
       
    <?php if(empty($vc_options['title'])):?>
    <title><?php  bloginfo('name'); ?></title>
    <?php endif?>

	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicons -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png">

	<?php if(!empty($vc_options['favicon'])): ?>
      <link rel="shortcut icon" href="<?php echo $vc_options['favicon']?>" />
    <?php endif?>

	<!--[if lt IE 9]>
	<script src="/js/libs/respond.min.js"></script>
	<![endif]-->

	
<?php  wp_head(); ?>
</head>
<body <?php body_class();?>>

<!-- LOADING MASK -->
<?php if ($vc_options['cube_loader']=="yes") {

?>
                
 <div id="mask">   
    <div class="loader">
        <img src="<?php echo get_template_directory_uri()?>/includes/images/loading.gif" alt='loading'>
    </div>
</div>       
           
<?php
}   ?>


<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="container no-padding">
        <div class="row">
            <div class="col-md-3 l-content">
                <div class="profile-pic">
                    <?php if(!empty($vc_options['logopic'])):?>
                    <div class="pic-bg"><img src="<?php echo ($vc_options['logopic']);?>" class="img-responsive" alt=""/></div><?php endif?>
                    <?php if(empty($vc_options['logopic'])):?>
                    <div class="pic-bg"><img src="<?php echo get_template_directory_uri()?>/includes/images/profile-avatar.png" class="img-responsive" alt=""/></div>
                     <?php endif?>
                </div>
               
                
<nav>           
                 <?php

        $defaults = array(
                    'theme_location'  => 'primary-menu',
                    'menu'            => 'div',
                    'container'       => 'ul',
                    'container_class' => '',
                    'menu_class'      => 'navigation',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'show_top_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          =>  new description_walker
                        );
        $athers = array(
                    'theme_location'  => 'top-menu',
                    'menu'            => 'div',
                    'container'       => 'ul',
                    'container_class' => '',
                    'menu_class'      => 'navigation',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'show_top_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => '',
                        );

                       if(has_nav_menu('primary-menu')) {
                        wp_nav_menu( $defaults );
}
          else if(has_nav_menu('top-menu')){
            wp_nav_menu( $athers );
          }
          else {
            echo 'No menu assigned!';
          }
                        ?>
               
</nav>
                
            </div>
            <div class="col-md-9 r-content">