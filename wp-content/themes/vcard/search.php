<?php  get_Header(); ?>

				<div class="ss">
					<div class="dd">
				
						<!-- SECTION 4 - BLOG / NEWS -->
						<section>
							<div class="item blog" id="">
								<div class="page-head">
									<div class="row">
										<div class="col-md-5">
											<h3><?php _e('Search','vcard'); ?></h3>
										</div>
										
									</div>
								</div>
								<div class="col-md-9 blog-wrap">
									<header class="page-header">
					<h3 class="page-title"><?php printf( __( 'Search Results for: %s', 'vcard' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
										</header>
									 <?php
                
				 if (have_posts()) : 
				 while (have_posts()) : the_post();?>
									<article>
										<div class="row">
											
											
											<div>
												<h3><a href="<?php echo get_the_permalink();?>"><?php the_title();?></a></h3>
												<div class="post-meta">
													<i class="fa fa-calendar"></i> <a href="#"><?php echo get_the_date('j F'); ?></a> 
													<i class="fa fa-user"></i> <a href="#"><?php the_author(); ?></a> 
													<i class="fa fa-comments"></i> <?php comments_popup_link(__('0 Comments', 'vcard'), __('1 Comment', 'vcard'), '% '.__('Comments', 'vcard')); ?>
												</div>
												<?php the_excerpt(); ?>
											</div>
										</div>
									</article>
									
									
								<?php endwhile;?>
								<?php else : ?>

                <article id="post-0" class="post no-results not-found">
                    <header1 class="entry-header">
                        <h2 class="entry-title"><?php _e( 'Nothing Found', 'vcard' ); ?></h2>
                    </header1><!-- .entry-header -->

                    <div class="entry-content">
                        <p><?php _e( 'Sorry, Nothing matched your search criteria. Please try again with some different keywords.', 'vcard' ); ?></p>

                    </div><!-- .entry-content -->
                </article><!-- #post-0 -->

            <?php endif; ?>
								
                    			<?php wp_reset_query();?>
								<div class="blog_pagination">
                        <?php if (function_exists("pagination")) {
                         pagination($wp_query->max_num_pages);
                             } ?>   </div>
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