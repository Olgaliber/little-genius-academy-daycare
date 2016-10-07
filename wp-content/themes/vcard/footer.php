<?php $vc_options = get_option('vcard_theme'); ?>
		</div>

<footer>
					<div class="row">
						<div class="col-md-7">
							<?php if(!empty($vc_options['copyrighttext'])):?>
							<p><?php echo ($vc_options['copyrighttext']);?></p>
							<?php endif ?>
						</div>
						<div class="col-md-5">
							<ul class="social">
								<?php if(!empty($vc_options['Social_l1'])):?>
								<li><a href="<?php echo ($vc_options['Social_l1']);?>"><i class="fa fa-facebook"></i></a></li>
								<?php endif?>
								<?php if(!empty($vc_options['Social_l2'])):?>
								<li><a href="<?php echo ($vc_options['Social_l2']);?>"><i class="fa fa-twitter"></i></a></li>
								<?php endif?>
								<?php if(!empty($vc_options['Social_l3'])):?>
								<li><a href="<?php echo ($vc_options['Social_l3']);?>"><i class="fa fa-dribbble"></i></a></li>
								<?php endif?>
								<?php if(!empty($vc_options['Social_l4'])):?>
								<li><a href="<?php echo ($vc_options['Social_l4']);?>"><i class="fa fa-pinterest"></i></a></li>
								<?php endif?>
								<?php if(!empty($vc_options['Social_l5'])):?>
								<li><a href="<?php echo ($vc_options['Social_l5']);?>"><i class="fa fa-linkedin"></i></a></li>
								<?php endif?>
								<?php if(!empty($vc_options['Social_l6'])):?>
								<li><a href="<?php echo ($vc_options['Social_l6']);?>"><i class="fa fa-google-plus"></i></a></li>
								<?php endif?>
								<?php if(!empty($vc_options['Social_l7'])):?>
								<li><a href="<?php echo ($vc_options['Social_l7']);?>"><i class="fa fa-youtube"></i></a></li>
								<?php endif?>
								<?php if(!empty($vc_options['Social_l8'])):?>
								<li><a href="<?php echo ($vc_options['Social_l8']);?>"><i class="fa fa-dropbox"></i></a></li>
								<?php endif?>
								
							</ul>
						</div>
					</div>
				</footer>
			</div>
		</div>
	</div>
</div>
<!-- MAIN CONTENT -->

<?php wp_footer();?>
</body>
</html>