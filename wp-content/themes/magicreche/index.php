<?php get_header();

$blog_page_id = get_option('page_for_posts', true);

$blog_page_title = get_the_title( $blog_page_id );

$title_bg = get_post_meta( $blog_page_id, 'magicreche-title-background', true );

if( !empty( $title_bg ) ) {
	$bg_style = ' style="';
	if( !empty($title_bg['background-color']) ) $bg_style .= 'background-color:' . $title_bg['background-color'] . ';';
	if( !empty($title_bg['background-repeat']) ) $bg_style .= 'background-repeat:' . $title_bg['background-repeat'] . ';';
	if( !empty($title_bg['background-attachment']) ) $bg_style .= 'background-attachment:' . $title_bg['background-attachment'] . ';';
	if( !empty($title_bg['background-position']) ) $bg_style .= 'background-position:' . $title_bg['background-position'] . ';';
	if( !empty($title_bg['background-size']) ) $bg_style .= 'background-size:' . $title_bg['background-size'] . ';';
	if( !empty($title_bg['background-image']) ) $bg_style .= 'background-image:url(' . $title_bg['background-image'] . ');';
	$bg_style .= '"';
}

if( !empty($blog_page_title) ) $blog_page_title = __('Blog', 'magicreche'); ?>

<header<?php if( !empty($bg_style) ) echo $bg_style; ?>><h1><?php echo $blog_page_title; ?></h1></header>

<div class="container posts-archives"><?php

	if( ot_get_option('blog_sidebar', 1) ) { ?>
	<div class="row">
		<div class="col-sm-8"><?php
	}
			if ( have_posts() ) {
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					if( is_single() ) {
						get_template_part( 'content', 'single' );
					} else {
						get_template_part( 'content' );
					}

				endwhile;

				?><nav class="pagination"><?php posts_nav_link(); ?></nav><?php

			} else {
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			}
	if( ot_get_option('blog_sidebar', 1) ) { ?>
		</div>
		<div class="col-sm-4 sidebar"><?php get_sidebar(); ?></div><?php
	} ?>
	</div>
</div>
<?php get_footer(); ?>