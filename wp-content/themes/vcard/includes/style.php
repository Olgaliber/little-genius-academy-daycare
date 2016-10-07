<?php
$vc_options = get_option('vcard_theme'); 
//main css
	function morpheus_enqueue_style() {
				//home
				wp_enqueue_style('bootstrapcss', get_template_directory_uri() . '/includes/css/bootstrap.css');
				wp_enqueue_style('fontawesomemin', get_template_directory_uri() . '/includes/font-awesome/css/font-awesome.min.css');
				wp_enqueue_style('stylecss', get_template_directory_uri() . '/includes/css/style.css');
				wp_enqueue_style('flexslidercss', get_template_directory_uri() . '/includes/css/flexslider.css');
				wp_enqueue_style('nivolightboxcss', get_template_directory_uri() . '/includes/css/nivo-lightbox.css');
				wp_enqueue_style('defaultcss', get_template_directory_uri() . '/includes/images/themes/default/default.css');
				wp_enqueue_style('animatecss', get_template_directory_uri() . '/includes/css/animate.css');


				wp_enqueue_style('fontcss', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700,800,700italic,600italic');
				wp_enqueue_style('fontscss', 'http://fonts.googleapis.com/css?family=Neuton:400,200,300');
				
}
	add_action('wp_enqueue_scripts', 'morpheus_enqueue_style');


// Background color option


// light

if ($vc_options['backgroung_color']=="light") {

	function reversal_enqueue_background_style() {
				
				
			wp_enqueue_style('bcolor1', get_template_directory_uri() . '/includes/css/style.css');

}
	add_action('wp_enqueue_scripts', 'reversal_enqueue_background_style');

}	

// light
	
if ($vc_options['backgroung_color']=="dark") {

	function reversal_enqueue_background_style() {
				
				
			wp_enqueue_style('bcolor1', get_template_directory_uri() . '/includes/css/style1.css');

}
	add_action('wp_enqueue_scripts', 'reversal_enqueue_background_style');

}	

// colour Option

//yellow
if ($vc_options['color_option']=="yellow") {

	function reversal_enqueue_color_style() {
				
				
			wp_enqueue_style('color', get_template_directory_uri() . '/includes/css/colors/yellow-black.css');

}
	add_action('wp_enqueue_scripts', 'reversal_enqueue_color_style');

}

// Blue
else if ($vc_options['color_option']=="blue") {

	function reversal_enqueue_color_style() {
				
				
			wp_enqueue_style('color', get_template_directory_uri() . '/includes/css/colors/blue-black.css');

}
	add_action('wp_enqueue_scripts', 'reversal_enqueue_color_style');

}

//green
else if ($vc_options['color_option']=="green") {

	function reversal_enqueue_color_style() {
				
				
			wp_enqueue_style('color', get_template_directory_uri() . '/includes/css/colors/green-black.css');

}
	add_action('wp_enqueue_scripts', 'reversal_enqueue_color_style');

}

//Orange

else if ($vc_options['color_option']=="orange") {

	function reversal_enqueue_color_style() {
				
				
			wp_enqueue_style('color', get_template_directory_uri() . '/includes/css/colors/orange-black.css');

}
	add_action('wp_enqueue_scripts', 'reversal_enqueue_color_style');

}


//pale-green

else if ($vc_options['color_option']=="pale-green") {

	function reversal_enqueue_color_style() {
				
				
			wp_enqueue_style('color', get_template_directory_uri() . '/includes/css/colors/pale-green-black.css');

}
	add_action('wp_enqueue_scripts', 'reversal_enqueue_color_style');

}

//pink

else if ($vc_options['color_option']=="pink") {

	function reversal_enqueue_color_style() {
				
				
			wp_enqueue_style('color', get_template_directory_uri() . '/includes/css/colors/pink-black.css');

}
	add_action('wp_enqueue_scripts', 'reversal_enqueue_color_style');

}


//red

else if ($vc_options['color_option']=="red") {

	function reversal_enqueue_color_style() {
				
				
			wp_enqueue_style('color', get_template_directory_uri() . '/includes/css/colors/red-black.css');

}
	add_action('wp_enqueue_scripts', 'reversal_enqueue_color_style');

}


//violet

else if ($vc_options['color_option']=="violet") {

	function reversal_enqueue_color_style() {
				
				
			wp_enqueue_style('color', get_template_directory_uri() . '/includes/css/colors/violet-black.css');

}
	add_action('wp_enqueue_scripts', 'reversal_enqueue_color_style');

}