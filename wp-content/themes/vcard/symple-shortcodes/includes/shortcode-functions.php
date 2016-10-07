<?php
/**
*
*
*
 * Allow shortcodes in widgets
 * @since v1.0
 */
add_filter('widget_text', 'do_shortcode');



// Vcard Shortcode Start Here

// Profile Shortcode

if(! function_exists('vc_Profile_shortcode')){
	function vc_Profile_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'say'=>'',
			'name'=>'',
			'designation'=> ''
			
					

			), $atts) );

				
		return '
			<div class="profile">
			<h2>'.$say.' <span>'.$name.'</span></h2>
			<h2>'.$designation.'</h2>
				 <div class="sep1"></div>
							'.do_shortcode($content).'	
					<div class="clearfix"></div>
			</div>
				';
	}
	add_shortcode('Profile', 'vc_Profile_shortcode');
}


if(! function_exists('vc_Profile_objective_shortcode')){
	function vc_Profile_objective_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			
					

			), $atts) );

				
		return '
				 <p>'.$content.'</p>
				';
	}
	add_shortcode('Profile_objective', 'vc_Profile_objective_shortcode');
}


if(! function_exists('vc_Profile_info_shortcode')){
	function vc_Profile_info_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			
			
					

			), $atts) );

				
		return '
				 <div class="personal-info col-md-12 no-padding">
									<h4>'.$title.'</h4>
									<div class="sep2"></div>
									<ul>
										'.do_shortcode($content).'
									</ul>
								</div>
				';
	}
	add_shortcode('Profile_info', 'vc_Profile_info_shortcode');
}


if(! function_exists('vc_Profile_info_body_shortcode')){
	function vc_Profile_info_body_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			'desc'=> '',
			
			
					

			), $atts) );

				
		return '
				
										<li>
											<div class="p-info"><em>'.$title.'</em><span>'.$desc.'</span></div>
										</li>
										
									
				';
	}
	add_shortcode('Profile_info_section', 'vc_Profile_info_body_shortcode');
}


// Vcard Portfolio

if(! function_exists('vc_portfolio_shortcode')){
	function vc_portfolio_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			
					

			), $atts) );

				
		return '
				 <div class="works">
				 '.do_shortcode($content).'
				 </div>
				';
	}
	add_shortcode('portfolio', 'vc_portfolio_shortcode');
}


if(! function_exists('vc_portfolio_head_shortcode')){
	function vc_portfolio_head_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=> '',
			'pagination'=>'',
			
					

			), $atts) );

				
		return '
				 <div class="page-head">
									<div class="row">
										<div class="col-md-5">
											<h3>'.$title.'</h3>
										</div>
										<div class="col-md-7">
											<div class="np-main">
												<p>'.$pagination.'</p>
												<div class="np-controls">
													<a href="#" class="previous"><i class="fa fa-arrow-circle-left"></i></a>
													<a href="#" class="next"><i class="fa fa-arrow-circle-right"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
				';
	}
	add_shortcode('portfolio_head', 'vc_portfolio_head_shortcode');
}


if(! function_exists('vc_portfolio_body_shortcode')){
	function vc_portfolio_body_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			
			
					

			), $atts) );

		$html='';
		$html .= '<div class="portfolio-wrap">';
		$html .= '<div class="row">';
		if(!get_post_meta(get_the_ID(), 'portfolio_category', true)):
		$portfolio_category = get_terms('portfolio_category');
		if($portfolio_category):
		$html .= '<ul id="filter-list" class="clearfix">';
		$html .= '<li class="filter" data-filter="all"><i class="fa fa-th"></i> All</li>';
		foreach($portfolio_category as $portfolio_cat):
		$html .= '<li class="filter" data-filter="';
		$html .= $portfolio_cat->slug;;
		$html .= '">';
		$html .= $portfolio_cat->name;
		$html .= '</li>';
		endforeach;
		$html .= '</ul>';
		endif;
		endif;
		$html .= '<ul id="portfolio">';
		global $post;
		query_posts(array('post_type' => 'portfolio',
						  'showposts' => -1
						    ));
		while ( have_posts() ) : the_post();
		$portfolio_category = wp_get_post_terms($post->ID,'portfolio_category'); 
		$html .= '<li class="item col-md-4 ';
		foreach ($portfolio_category as $item)
		$html .= $item->slug.' ';
		$html .= '">';
		$html .= '<a href="';
		$html .= wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'homepage-thumb') );
		$html .= '" class="nivo-lbox">';
		$html .= '<div class="folio-img">';
		$html .= get_the_post_thumbnail();
		$html .= '<div class="overlay">';
		$html .= '<div class="overlay-inner">';
		$html .= '<h4>';
		$html .= get_the_title();
		$html .= '</h4>';
		$html .= '<p> By, ';
		$html .= get_the_author();
		$html .= '</p>';
		$html .= '<h4><a href="';
		$html .= get_the_permalink();
		$html .= '">';
		$html .= 'Details</a></h4>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</a>';
		$html .= '</li>';
		endwhile;
		
		$html .= '</ul>';
		$html .= '</div>';
		$html .= '</div>';


				
		return $html;
	}
	add_shortcode('portfolio_body', 'vc_portfolio_body_shortcode');
}



// Vcard Resume

if(! function_exists('vc_resume_shortcode')){
	function vc_resume_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			
					

			), $atts) );

				
		return '
				 <div class="item resume">
				 '.do_shortcode($content).'
				 </div>
				';
	}
	add_shortcode('resume', 'vc_resume_shortcode');
}


if(! function_exists('vc_resume_head_shortcode')){
	function vc_resume_head_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			'pagination'=>'',
			
					

			), $atts) );

				
		return '
				 <div class="page-head">
									<div class="row">
										<div class="col-md-5">
											<h3>'.$title.'</h3>
										</div>
										<div class="col-md-7">
											<div class="np-main">
												<p>'.$pagination.'</p>
												<div class="np-controls">
													<a href="#" class="previous"><i class="fa fa-arrow-circle-left"></i></a>
													<a href="#" class="next"><i class="fa fa-arrow-circle-right"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
				';
	}
	add_shortcode('resume_head', 'vc_resume_head_shortcode');
}


if(! function_exists('vc_resume_education_shortcode')){
	function vc_resume_education_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>''
									

			), $atts) );

		$html='';
		$html .= '<div class="resume-info">';
		$html .= '<h4>'.$title.'</h4>';
		$html .= '<div class="sep2"></div>';
		$html .= '<ul>';
		global $post;
		query_posts(array(
		'post_type' => 'education',
		'showposts' => -1
		));
		while ( have_posts() ) : the_post();
		$html .= '<li>';
		$html .= '<h5>';
		$html .= get_the_title();
		$html .= '</h5>';
		$html .= '<span class="year"><i class="fa ';
		$html .= get_post_meta($post->ID,'rnr_eicon',true);
		$html .= '"></i>';
		$html .= get_post_meta($post->ID,'rnr_education',true);
		$html .= '</span>';
		$html .= '<p>';
		$html .= get_the_content();
		$html .= '</p>';
		$html .= '</li>';
		endwhile;
		wp_reset_query();
		$html .= '</ul>';
		$html .= '</div>';

				
		return $html;
	}
	add_shortcode('resume_education', 'vc_resume_education_shortcode');
}

// Resume Skill
if(! function_exists('vc_resume_skill_shortcode')){
	function vc_resume_skill_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=> '',
			

			
					

			), $atts) );

		$vc_options = get_option('vcard_theme');
		$html='';
		$html .= '<div class="skills-info">';
		$html .= '<h4>'.$title.'</h4>';
		$html .= '<div class="sep2"></div>';
		$html .= '<ul>';
		if(!empty($vc_options['skilln1'])):
		$html .= '<li>';
		$html .= '<p>'.$vc_options['skilln1'].' <span>'.$vc_options['skill1'].'</span></p>';
		$html .= '<div class="skills-bg"><span class="skill1"></span></div>';
		$html .= '</li>';
		endif;
		if(!empty($vc_options['skilln2'])):
		$html .= '<li>';
		$html .= '<p>'.$vc_options['skilln2'].' <span>'.$vc_options['skill2'].'</span></p>';
		$html .= '<div class="skills-bg"><span class="skill2"></span></div>';
		$html .= '</li>';
		endif;
		if(!empty($vc_options['skilln3'])):
		$html .= '<li>';
		$html .= '<p>'.$vc_options['skilln3'].' <span>'.$vc_options['skill3'].'</span></p>';
		$html .= '<div class="skills-bg"><span class="skill3"></span></div>';
		$html .= '</li>';
		endif;
		if(!empty($vc_options['skilln4'])):
		$html .= '<li>';
		$html .= '<p>'.$vc_options['skilln4'].' <span>'.$vc_options['skill4'].'</span></p>';
		$html .= '<div class="skills-bg"><span class="skill4"></span></div>';
		$html .= '</li>';
		endif;
		if(!empty($vc_options['skilln5'])):
		$html .= '<li>';
		$html .= '<p>'.$vc_options['skilln5'].' <span>'.$vc_options['skill5'].'</span></p>';
		$html .= '<div class="skills-bg"><span class="skill5"></span></div>';
		$html .= '</li>';
		endif;
		if(!empty($vc_options['skilln6'])):
		$html .= '<li>';
		$html .= '<p>'.$vc_options['skilln6'].' <span>'.$vc_options['skill6'].'</span></p>';
		$html .= '<div class="skills-bg"><span class="skill6"></span></div>';
		$html .= '</li>';
		endif;
		if(!empty($vc_options['skilln7'])):
		$html .= '<li>';
		$html .= '<p>'.$vc_options['skilln7'].' <span>'.$vc_options['skill7'].'</span></p>';
		$html .= '<div class="skills-bg"><span class="skill7"></span></div>';
		$html .= '</li>';
		endif;
		if(!empty($vc_options['skilln11'])):
		$html .= '<li>';
		$html .= '<p>'.$vc_options['skilln11'].' <span>'.$vc_options['skill11'].'</span></p>';
		$html .= '<div class="skills-bg"><span class="skill11"></span></div>';
		$html .= '</li>';
		endif;
		if(!empty($vc_options['skilln12'])):
		$html .= '<li>';
		$html .= '<p>'.$vc_options['skilln12'].' <span>'.$vc_options['skill12'].'</span></p>';
		$html .= '<div class="skills-bg"><span class="skill12"></span></div>';
		$html .= '</li>';
		endif;
		$html .= '</ul>';
		$html .= '</div>';

		return $html;
	}
	add_shortcode('resume_skill', 'vc_resume_skill_shortcode');
}



if(! function_exists('vc_resume_skilln_shortcode')){
	function vc_resume_skilln_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=> '',
			

			
					

			), $atts) );

		$vc_options = get_option('vcard_theme');
		return '
				<div class="skills-info">
									<h4>'.$title.'</h4>
									<div class="sep2"></div>
									<ul>
										<li>
											<p>'.$vc_options['skilln1'].' <span>'.$vc_options['skill1'].'</span></p>
											<div class="skills-bg"><span class="skill1"></span></div>
										</li>
										<li>
											<p>'.$vc_options['skilln2'].' <span>'.$vc_options['skill2'].'</span></p>
											<div class="skills-bg"><span class="skill2"></span></div>
										</li>
										<li>
											<p>'.$vc_options['skilln3'].' <span>'.$vc_options['skill3'].'</span></p>
											<div class="skills-bg"><span class="skill3"></span></div>
										</li>
										<li>
											<p>'.$vc_options['skilln4'].' <span>'.$vc_options['skill4'].'</span></p>
											<div class="skills-bg"><span class="skill4"></span></div>
										</li>
										<li>
											<p>'.$vc_options['skilln5'].' <span>'.$vc_options['skill5'].'</span></p>
											<div class="skills-bg"><span class="skill5"></span></div>
										</li>
									</ul>
								</div>
				';
	}
	add_shortcode('resume_skilln', 'vc_resume_skilln_shortcode');
}


// Resume Service


if(! function_exists('vc_resume_service_shortcode')){
	function vc_resume_service_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=> 'Services',
			
			
			
					

			), $atts) );

				
		return '
				<div class="services-info">
									<h4>'.$title.'</h4>
									<div class="sep2"></div>
									<ul>
										'.do_shortcode($content).'
									</ul>
								</div>
				';
	}
	add_shortcode('resume_service', 'vc_resume_service_shortcode');
}

if(! function_exists('vc_resume_service_body_shortcode')){
	function vc_resume_service_body_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'service_n'=> '',
			'service_i'=> '',
			
			
					

			), $atts) );

				
		return '
										<li>
											<i class="fa '.$service_i.'"></i>
											<h5>'.$service_n.'</h5>
										</li>
										
				';
	}
	add_shortcode('resume_service_body', 'vc_resume_service_body_shortcode');
}



if(! function_exists('vc_resume_servicen_shortcode')){
	function vc_resume_servicen_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=> 'Services',
			'service_n1'=> 'Design',
			'service_i1'=> 'fa-cloud',
			'service_n2'=> 'Coding',
			'service_i2'=> 'fa-smile-o',
			'service_n3'=> 'Responsive',
			'service_i3'=> 'fa-desktop',
			'service_n4'=> 'Planing',
			'service_i4'=> 'fa-text-width',
			'service_n5'=> 'Wordpress',
			'service_i5'=> 'fa-comment',
			'service_n6'=> 'Photography',
			'service_i6'=> 'fa-picture-o',
			
					

			), $atts) );

				
		return '
				<div class="services-info">
									<h4>'.$title.'</h4>
									<div class="sep2"></div>
									<ul>
										<li>
											<i class="fa '.$service_i1.'"></i>
											<h5>'.$service_n1.'</h5>
										</li>
										<li>
											<i class="fa '.$service_i2.'"></i>
											<h5>'.$service_n2.'</h5>
										</li>
										<li>
											<i class="fa '.$service_i3.'"></i>
											<h5>'.$service_n3.'</h5>
										</li>
										<li>
											<i class="fa '.$service_i4.'"></i>
											<h5>'.$service_n4.'</h5>
										</li>
										<li>
											<i class="fa '.$service_i5.'"></i>
											<h5>'.$service_n5.'</h5>
										</li>
										<li>
											<i class="fa '.$service_i6.'"></i>
											<h5>'.$service_n6.'</h5>
										</li>
									</ul>
								</div>
				';
	}
	add_shortcode('resume_servicen', 'vc_resume_servicen_shortcode');
}

if(! function_exists('vc_resume_other_shortcode')){
	function vc_resume_other_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=> 'Other Head',


			), $atts) );

				
		return '
				<div class="resume-info">
					<h4>'.$title.'</h4>
					<div class="sep2"></div>
						<p>'.$content.'</p>	
					<div class="clearfix"></div>
									
								</div>
				';
	}
	add_shortcode('resume_other', 'vc_resume_other_shortcode');
}


if(! function_exists('vc_resume_experience_shortcode')){
	function vc_resume_experience_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			
					

			), $atts) );
		$html='';
		$html .= '<div class="resume-info">';
		$html .= get_post_meta($post->ID,'rnr_experience',true);
		$html .= '<h4>'.$title.'</h4>';
		$html .= '<div class="sep2"></div>';
		$html .= '<ul>';
		global $post;
		query_posts(array(
		'post_type' => 'experience',
		'showposts' => -1
		));
		while ( have_posts() ) : the_post();
		$html .= '<li>';
		$html .= '<h5>';
		$html .= get_the_title();
		$html .= '</h5>';
		$html .= '<span class="year"><i class="fa ';
		$html .= get_post_meta($post->ID,'rnr_exicon',true);
		$html .= '"></i>';
		$html .= get_post_meta($post->ID,'rnr_experience',true);
		$html .= '</span>';
		$html .= '<p>';
		$html .= get_the_content();
		$html .= '</p>';
		$html .= '</li>';
		endwhile;
	    wp_reset_query();
		$html .= '</ul>';
		$html .= '</div>';

				
		return $html;
	}
	add_shortcode('resume_experience', 'vc_resume_experience_shortcode');
}


// Vcard Blog

if(! function_exists('vc_blog_shortcode')){
	function vc_blog_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			
					

			), $atts) );

				
		return '
				 <div class="item blog">
				 '.do_shortcode($content).'
				 </div>
				';
	}
	add_shortcode('blog', 'vc_blog_shortcode');
}


if(! function_exists('vc_blog_head_shortcode')){
	function vc_blog_head_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=> '',
			'pagination'=>'',
			
					

			), $atts) );

				
		return '
				 <div class="page-head">
									<div class="row">
										<div class="col-md-5">
											<h3>'.$title.'</h3>
										</div>
										<div class="col-md-7">
											<div class="np-main">
												<p>'.$pagination.'</p>
												<div class="np-controls">
													<a href="#" class="previous"><i class="fa fa-arrow-circle-left"></i></a>
													<a href="#" class="next"><i class="fa fa-arrow-circle-right"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
				';
	}
	add_shortcode('blog_head', 'vc_blog_head_shortcode');
}

if(! function_exists('vc_blog_body_shortcode')){
	function vc_blog_body_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			
					

			), $atts) );
		$html='';
		$html .= '<div class="blog-wrap">';
		global $post;
		query_posts(array('post_type' => 'post',
						  'showposts' => -1
						    ));
		while ( have_posts() ) : the_post();
		$html .= '<article>';
		$html .= '<div class="row">';
		$html .= '<div class="col-md-5">';
		$html .= get_the_post_thumbnail();
		$html .= '</div>';
		$html .= '<div class="col-md-7">';
		$html .= '<h3><a href="';
		$html .= get_the_permalink();
		$html .= '">';
		$html .= get_the_title();
		$html .= '</a></h3>';
		$html .= '<div class="post-meta">';
		$html .= '<i class="fa fa-calendar"></i> <a href="#">';
		$html .= get_the_date('j F');
		$html .= '</a> ';
		$html .= '<i class="fa fa-user"></i> <a href="#">';
		$html .= get_the_author();
		$html .= '</a>';
		
		$html .= '</div>';
		$html .= get_the_excerpt();
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</article>';
		$html .= '<div class="quote-post" style=" background-color:';
		$html .= get_post_meta($post->ID,'rnr_postc',true);
		$html .= '">';
		$html .= '<div class="row">';
		$html .= '<div class="col-md-12">';
		$html .= '<blockquote>';
		$html .= get_post_meta($post->ID,'rnr_posti',true);
		$html .= '</blockquote>';
		if ( has_post_format( 'video' )) {
		$html .= '<i class="fa fa-film"></i>';
		}
		else if  ( has_post_format( 'audio' )) {
		$html .= '<i class="fa fa-music"></i>';
		}
		else if  ( has_post_format( 'image' )) {
		$html .= '<i class="fa fa-image"></i>';
		}
		else if  ( has_post_format( 'gallery' )) {
		$html .= '<i class="fa fa-images"></i>';
		}
		else if  ( has_post_format( 'quote' )) {
		$html .= '<i class="fa fa-quote-left"></i>';
		}
		else if ( has_post_format( 'link' )) {
		$html .= '<i class="fa fa-link"></i>';
		$html .= '<a href="';
		$html .= get_post_meta($post->ID,'rnr_postu',true);
		$html .= '">';
		}
		else{
		$html .= '<i class="fa fa-pushpin"></i>';
		}
		
		$html .= '<span class="author-name" style=" color:';
		$html .= get_post_meta($post->ID,'rnr_postfnc',true);
		$html .= '; font-style:';
		$html .= get_post_meta($post->ID,'rnr_postfns',true);
		$html .= '">';
		$html .= get_post_meta($post->ID,'rnr_postn',true);
		$html .= '</span>';
		$html .= '</a>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		endwhile;
 		wp_reset_query(); 
		$html .= '</div>';

				
		return $html;
	}
	add_shortcode('blog_body', 'vc_blog_body_shortcode');
}


// Vcard Contact

if(! function_exists('vc_contact_shortcode')){
	function vc_contact_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			
					

			), $atts) );

				
		return '
				  <div class="item contact">
				 '.do_shortcode($content).'
				 </div>
				';
	}
	add_shortcode('contact', 'vc_contact_shortcode');
}



if(! function_exists('vc_contact_head_shortcode')){
	function vc_contact_head_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=> '',
			
					

			), $atts) );

				
		return '
				 <div class="page-head">
									<div class="row">
										<div class="col-md-5">
											<h3>'.$title.'</h3>
										</div>
										<div class="col-md-7">
											<div class="np-main">
												<p>Go to next/previous page</p>
												<div class="np-controls">
													<a href="#" class="previous"><i class="fa fa-arrow-circle-left"></i></a>
													<a href="#" class="next"><i class="fa fa-arrow-circle-right"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
				';
	}
	add_shortcode('contact_head', 'vc_contact_head_shortcode');
}


if(! function_exists('vc_contact_googlemap_shortcode')){
	function vc_contact_googlemap_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			
			
					

			), $atts) );

				
		return '
				<div class="map">
									<div class="gmap">
										<div id="map"></div>
									</div>
								</div>
				';
	}
	add_shortcode('contact_googlemap', 'vc_contact_googlemap_shortcode');
}

function google_maps_shortcode($atts, $content = null) {
  extract(shortcode_atts(array(
      "width" => '100%',
      "height" => '360px',
      "src" => ''
   ), $atts));
  
return '<div class="google-map"><iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'"></iframe></div>';
}
add_shortcode("googlemap", "google_maps_shortcode");

if(! function_exists('vc_contact_info_shortcode')){
	function vc_contact_info_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			
			
					

			), $atts) );

				
		return '
				<div class="contact-info">
									'.do_shortcode($content).'
								</div>
				';
	}
	add_shortcode('contact_info', 'vc_contact_info_shortcode');
}


if(! function_exists('vc_contact_info_body_shortcode')){
	function vc_contact_info_body_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=> '',
			
					

			), $atts) );

				
		return '
				
									<h4>'.$title.'</h4>
									<p>'.$content.'</p>
									
				';
	}
	add_shortcode('contact_body_head', 'vc_contact_info_body_shortcode');
}

if(! function_exists('vc_contact_body_info_shortcode')){
	function vc_contact_body_info_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			
			
			), $atts) );

				
		return '
			
									<ul>
										'.do_shortcode($content).'
									</ul>
								
				';
	}
	add_shortcode('contact_body_info', 'vc_contact_body_info_shortcode');
}


if(! function_exists('vc_contact_body_info_de_shortcode')){
	function vc_contact_body_info_de_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'name'=> '',
			'icon'=>'',
			
					

			), $atts) );

				
		return '			
							
				<li><i class="fa '.$icon.'"></i> '.$name.'</li>
				
								
								
				';
	}
	add_shortcode('contact_body_details', 'vc_contact_body_info_de_shortcode');
}