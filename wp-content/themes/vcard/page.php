<?php get_header();?>
				<div class="ss">
					<div class="dd blog">
						<section>
							
							 <?php while(have_posts() ) : the_post(); ?>
								<?php the_content();?>
								<?php endwhile; wp_reset_query(); ?>
							
						</section>

<?php get_footer();?>