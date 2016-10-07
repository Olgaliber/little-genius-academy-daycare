<?php get_header();?>
				<div class="ss">
					<div class="dd">
						<section class="flex-active-slide">
							<div class="item blog blog-single">
								<div class="page-head">
									<div class="row">
										<div class="col-md-5">
											<h3><?php _e('Work Details ','vcard'); ?></h3>
										</div>
										
										
									</div>
								</div>

								<div class="blog-wrap">
									<article>
										<div class="row">
											<div class="col-md-12 blog-single-img woe">
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
									<h4> Recent Work </h4>
									<div class="sep2"></div>
									<ul id="portfolio">
										<?php
										query_posts(array('post_type' => 'portfolio',
														  'showposts' => 3
														    ));
										while ( have_posts() ) : the_post();?>
											<li class="item col-md-4 webdesign">
												<a href="<?php the_permalink();?>" class="nivo-lbox">
													<div class="folio-img">
														<?php the_post_thumbnail(); ?>
														<div class="overlay">
															<div class="overlay-inner">
																<h4><?php the_title();?></h4>
																<p>By,<?php the_author();?> </p>
																
															</div>
														</div>
													</div>
												</a>
											</li>
										<?php endwhile?>
											
										</ul>
									
									
								</div>
							</div>
						</section>
<?php get_footer();?>