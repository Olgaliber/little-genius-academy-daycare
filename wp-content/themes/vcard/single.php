<?php get_header();?>
				<div class="ss">
					<div class="dd">
						<section class="flex-active-slide">
							<div class="item blog blog-single">
								<div class="page-head">
									<div class="row">
										<div class="col-md-5">
											<h3><?php _e('Blog','vcard'); ?></h3>
										</div>
										
										
									</div>
								</div>

								<div class="blog-wrap">
									<article>
										<div class="row">
											<div class="col-md-12 blog-single-img">
												<?php the_post_thumbnail('single'); ?>
											</div>
											<div class="col-md-12">
												<h3><?php the_title();?></h3>
												<div class="post-meta">
													<i class="fa fa-calendar"></i> <a href="#"><?php echo get_the_date('F j'); ?></a> 
													<?php if(have_posts()): the_post(); ?>
													<i class="fa fa-user"></i> <a href="#"><?php the_author();?></a> <?php endif;?>
													<i class="fa fa-comments"></i> <?php comments_popup_link(__('0 Comments', 'Hotel'), __('1 Comment', 'Hotel'), '% '.__('Comments', 'Hotel')); ?> 
												</div>
												<?php the_content();?>
												<div><?php wp_link_pages();?></div>
											</div>
										</div>
									</article>
									<?php comments_template(); ?>
									
									
								</div>
							</div>
						</section>
<?php get_footer();?>