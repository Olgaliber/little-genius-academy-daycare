<?php /*

*/ get_Header(); ?>

				<div class="ss">
					<div class="dd">
				
						<!-- SECTION 4 - BLOG / NEWS -->
						<section>
							<div class="item blog" id="4">
								<div class="page-head">
									<div class="row">
										<div class="col-md-5">
											<h3><?php _e('Blog','vcard'); ?></h3>
										</div>
										<div class="col-md-7">
											<div class="np-main">
												<p><?php _e('Go to next/previous page','vcard'); ?></p>
												<div class="np-controls">
													<a href="#" class="previous"><i class="fa fa-arrow-circle-left"></i></a>
													<a href="#" class="next"><i class="fa fa-arrow-circle-right"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="blog-wrap">
									<?php  query_posts(array(
							        'post_type' => 'post',
							        'showposts' => -1
							    )); ?>

							<?php while ( have_posts() ) : the_post();?>
									<article>
										<div class="row">
											<div class="col-md-5">
												<?php the_post_thumbnail('blog');?>
											</div>
											<div class="col-md-7">
												<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
												<div class="post-meta">
													<i class="fa fa-calendar"></i> <a href="#"><?php echo get_the_date('j F'); ?></a> 
													<i class="fa fa-user"></i> <a href="#"><?php the_author();?></a> 
													<i class="fa fa-comments"></i><?php comments_popup_link(__('0 Comments', 'vcard'), __('1 Comment', 'vcard'), '% '.__('Comments', 'vcard')); ?>
												</div>
												<?php the_content();?>
											</div>
										</div>
									</article>

									<div class="quote-post" style=" background-color: <?php echo get_post_meta($post->ID,'rnr_postc',true);?>">
										<div class="row">
											<div class="col-md-12">
												<blockquote><?php echo get_post_meta($post->ID,'rnr_posti',true);?></blockquote>
												<?php if ( has_post_format( 'video' )) {
										  echo '<i class="fa fa-film"></i>';
										} 
										 else if  ( has_post_format( 'audio' )) {
										 echo '<i class="fa fa-music"></i>';
										} 
										 else if  ( has_post_format( 'image' )) {
										  echo '<i class="fa fa-image"></i>';
										} 
										  else if  ( has_post_format( 'gallery' )) {
										  echo '<i class="fa fa-images"></i>';
										} 
										  else if  ( has_post_format( 'quote' )) {
										  echo '<i class="fa fa-quote-left"></i>';
										} 
										  else if ( has_post_format( 'link' )) {
										  echo '<i class="fa fa-link"></i>';
										}  else{echo '<i class="fa fa-pushpin"></i>';}
										?>

												<a href="<?php echo get_post_meta($post->ID,'rnr_postu',true);?>" target="_blank"><span class="author-name" style=" color: <?php echo get_post_meta($post->ID,'rnr_postfnc',true);?>; font-style: <?php echo get_post_meta($post->ID,'rnr_postfns',true);?>"><?php echo get_post_meta($post->ID,'rnr_postn',true);?></span></a>
											</div>
										</div>
									</div>
									<?php endwhile;
 									 wp_reset_query(); ?>
									
									
								</div>
							</div>
						</section>
						<!-- SECTION 4 - BLOG / NEWS -->

						
					
<?php get_footer(); ?>