<?php /*
Template name: 404
*/ get_Header(); ?>

				<div class="ss">
					<div class="dd">
				
						<!-- SECTION 4 - BLOG / NEWS -->
						<section>
							<div class="item blog" id="">
								<div class="page-head">
									<div class="row">
										<div class="col-md-5">
											<h3><?php _e('Error 404','vcard'); ?></h3>
										</div>
										
									</div>
								</div>
								<div class="col-md-9 blog-wrap">
									<img src="<?php echo get_template_directory_uri();?>/includes/images/error3.png" alt="">
									<div class="clear"></div>
									<h3><?php _e('Ooops This Page Could Not Be Found! ','vcard'); ?></h3>
									<p class="er"><?php _e('Can not find what you need? Take a moment and go to home clicking below!', 'vcard'); ?></p>
									 <span class="input-group-btn error2-btn er">
									 	<a href="<?php echo home_url() ?>"><button class="btn btn-default" type="button"><?php _e('BACK TO HOME PAGE', 'vcard'); ?></button></button></a>
									 </span>
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