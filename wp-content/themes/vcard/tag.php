<?php  get_Header(); ?>

				<div class="ss">
					<div class="dd">
				
						<!-- SECTION 4 - BLOG / NEWS -->
						<section>
							<div class="item blog" id="">
								<div class="page-head">
									<div class="row">
										<div class="col-md-5">
											<h3><?php _e('Tag','vcard'); ?></h3>
										</div>
										
									</div>
								</div>
								<div class="col-md-9 blog-wrap">
									 <?php
                query_posts('post_type=post&post_status=publish&paged='. get_query_var('paged')); 
				 if (have_posts()) : 
				 while (have_posts()) : the_post();?>
									<article>
										<div class="row">
											<div class="col-md-5">
												<?php the_post_thumbnail('blog'); ?>
											</div>
											<div class="col-md-7">
												<h3><a href="./blog-single.html"><?php the_title();?></a></h3>
												<div class="post-meta">
													<i class="fa fa-calendar"></i> <a href="#"><?php echo get_the_date('j F'); ?></a> 
													<i class="fa fa-user"></i> <a href="#"><?php the_author(); ?></a> 
													<i class="fa fa-comments"></i> <?php comments_popup_link(__('0 Comments', 'Morpheus'), __('1 Comment', 'Morpheus'), '% '.__('Comments', 'Morpheus')); ?>
												</div>
												<?php the_content(); ?>
											</div>
										</div>
									</article>
									
									
								<?php endwhile; endif;?>
                    			<?php wp_reset_query();?>
								</div>
								<div class="col-md-3 blog-wrap">
									<article>
									<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('blog Sidebar') ) : else : ?>
                     <?php endif; ?>
                     				</article>
								</div>

							</div>
						</section>
						<!-- SECTION 4 - BLOG / NEWS -->

						
					</div>
			
						
<?php get_footer(); ?>