<?php
/*Template Name:Contact*/ get_header();?>
				<div class="ss">
					<div class="dd blog">
						<section>
							<div class="item blog">
								<div class="page-head">
									<div class="row">
										<div class="col-md-5">
											<h3><?php the_title();?></h3>
										</div>
										
									</div>
								</div>
								 <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11910.7379386882!2d-93.59782812906528!3d41.72732676651727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1388999556984" width="670" height="200" frameborder="0" style="border:0"></iframe>
            </div>
							 <?php
while(have_posts()):the_post();

the_content();

endwhile; 
wp_reset_query();
?>
							</div>
						</section>

<?php get_footer();?>