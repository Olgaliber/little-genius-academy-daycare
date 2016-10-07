<?php get_header();

	if ( have_posts() ) {
		// Start the Loop.
		while ( have_posts() ) : the_post();

			$page_title = get_post_meta( get_the_ID(), 'magicreche-page-title', true );
			$title_bg = get_post_meta( get_the_ID(), 'magicreche-title-background', true );

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

			if( $page_title == 'enabled' ) { ?>
				<header<?php if( !empty($bg_style) ) echo $bg_style; ?>><?php the_title( '<h1>', '</h1>' ); ?></header><?php
			} ?>
 
			<article id="<?php echo esc_attr(getMagicrechePageID()); ?>" <?php post_class(); ?>>
				<div class="container"><?php

				the_content();

				?></div>
			</article><?php

		endwhile;

	} else {
		// If no content, include the "No posts found" template.
		get_template_part( 'content', 'none' );

	}

get_footer(); ?>