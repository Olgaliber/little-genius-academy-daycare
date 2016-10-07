<?php

if( !function_exists ('morpheus_enqueue_scripts') ) :
	function morpheus_enqueue_scripts() {
		$vc_options = get_option('vcard_theme');
		$skill1_array = array( 'some_string1' => __( $vc_options['skill1'] ), 'a_value' => '10' );
		$skill2_array = array( 'some_string2' => __( $vc_options['skill2'] ), 'a_value' => '10' );
		$skill3_array = array( 'some_string3' => __( $vc_options['skill3'] ), 'a_value' => '10' );
		$skill4_array = array( 'some_string4' => __( $vc_options['skill4'] ), 'a_value' => '10' );
		$skill5_array = array( 'some_string5' => __( $vc_options['skill5'] ), 'a_value' => '10' );
		$skill6_array = array( 'some_string6' => __( $vc_options['skill6'] ), 'a_value' => '10' );
		$skill7_array = array( 'some_string7' => __( $vc_options['skill7'] ), 'a_value' => '10' );
		$skill11_array = array( 'some_string11' => __( $vc_options['skill11'] ), 'a_value' => '10' );
		$skill12_array = array( 'some_string12' => __( $vc_options['skill12'] ), 'a_value' => '10' );
		$latitude = array( 'some_string8' => __( $vc_options['lat'] ), 'a_value' => '30' );
		$lngitude = array( 'some_string9' => __( $vc_options['lng'] ), 'a_value' => '30' );
		$icon = array( 'some_string10' => __( $vc_options['micon'] ), 'a_value' => '30' );

			wp_enqueue_script('jquerymin', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', array('jquery'), '1.0',true);
			
			wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/includes/js/bootstrap.js', array('jquery'), '1.0',true);
			
			wp_enqueue_script('script', get_template_directory_uri() . '/includes/js/script.js', array('jquery'), '1.0',true);
			wp_localize_script( 'script', 'object_name1', $skill1_array );
			wp_localize_script( 'script', 'object_name2', $skill2_array );
			wp_localize_script( 'script', 'object_name3', $skill3_array );
			wp_localize_script( 'script', 'object_name4', $skill4_array );
			wp_localize_script( 'script', 'object_name5', $skill5_array );
			wp_localize_script( 'script', 'object_name6', $skill6_array );
			wp_localize_script( 'script', 'object_name7', $skill7_array );
			wp_localize_script( 'script', 'object_name11', $skill11_array );
			wp_localize_script( 'script', 'object_name12', $skill12_array );
			wp_localize_script( 'script', 'object_name8', $latitude );
			wp_localize_script( 'script', 'object_name9', $lngitude );
			wp_localize_script( 'script', 'object_name10', $icon );

			
			wp_enqueue_script('jqueryflexsliderjs', get_template_directory_uri() . '/includes/js/jquery.flexslider.js', array('jquery'), '1.0',true);
						
			wp_enqueue_script('jqueryeasing', get_template_directory_uri() . '/includes/js/jquery.easing.js', array('jquery'), '1.0',true);

			wp_enqueue_script('jquerymixitupmin', get_template_directory_uri() . '/includes/js/jquery.mixitup.min.js', array('jquery'), '1.0',true);

			wp_enqueue_script('nivo-lightbox.minjs', get_template_directory_uri() . '/includes/js/nivo-lightbox.min.js', array('jquery'), '1.0',true);

			
			wp_enqueue_script('jqueryappear', get_template_directory_uri() . '/includes/js/jquery.appear.js', array('jquery'), '1.0',true);

			wp_enqueue_script('jjqueryinview', get_template_directory_uri() . '/includes/js/jquery.inview.js', array('jquery'), '1.0',true);

			

			wp_enqueue_script('contact', get_template_directory_uri() . '/includes/js/contact.js', array('jquery'), '1.0',true);

			wp_enqueue_script('animations', get_template_directory_uri() . '/includes/js/animations.js', array('jquery'), '1.0',true);
			
			wp_enqueue_script('jqueryflexslider', 'http://maps.google.com/maps/api/js?sensor=true.js', array('jquery'), '1.0',true);

			wp_enqueue_script('gmaps', get_template_directory_uri() . '/includes/js/gmaps.js', array('jquery'), '1.0',true);




}
	add_action('wp_enqueue_scripts', 'morpheus_enqueue_scripts');
endif;