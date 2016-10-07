<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php
	if ( is_single() ) :
		the_title( '<h2 class="entry-title">', '</h2>' );
	else :
		the_title( '<h2 class="entry-title" style="color: #E75D5D">', '</h2>' );
	endif;

	// get_template_part( 'includes/post-meta' );
	get_template_part( 'includes/thumbnail' );

	 ?>
   <div class="entry-content"><?php	the_excerpt(); ?>
    </div>
</article>