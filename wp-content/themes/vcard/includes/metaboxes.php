<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'rnr_';

global $meta_boxes;

$meta_boxes = array();

global $smof_data;


/* ----------------------------------------------------- */
// Page Sections Metaboxes
/* ----------------------------------------------------- */


/* ----------------------------------------------------- */
// Revolution Slider
/* ----------------------------------------------------- */

$revolutionslider = array();
$revolutionslider[0] = 'No Slider';

if(class_exists('RevSlider')){
    $slider = new RevSlider();
	$arrSliders = $slider->getArrSliders();
	foreach($arrSliders as $revSlider) { 
		$revolutionslider[$revSlider->getAlias()] = $revSlider->getTitle();
	}
}

/* Page Section Background Settings */

$grid_array = array('2 Columns','3 Columns','4 Columns');

$pagebg_type_array = array(
	'image' => 'Image',
	'gradient' => 'Gradient',
	'color' => 'Color'
);


/* ----------------------------------------------------- */
// Page Settings
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'education_info',
	'title' => 'If you Want Google Map in Your Contact Page',
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		array(
			'name'		=> 'Want Google Map?	:',
			'id'		=> $prefix . "assign_type",
			'type'		=> 'select',
			'options'	=> array(
			    'select'=> 'Select',
				'yes'	=> 'Yes',
				'no'	=> 'No',
				
			),
			'multiple'	=> false,
			'std'		=> 'Select Custom Section'
		),

				
	)
);




/* ----------------------------------------------------- */
// Blog Post Metaboxes
/* ----------------------------------------------------- */


/*  Blog Post Slides Metabox */


/*  Blog Link Post Settings */

$meta_boxes[] = array(
	'id' => 'rnr-blogmeta-link',
	'title' => 'Post Format Icon',
	'pages' => array( 'post'),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(

		array(
			'name'		=> 'Want to give any Quotation?',
			'id'		=> $prefix . 'posti',
			'desc'		=> 'Enter your Quote Here',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),

		array(
			'name'		=> 'Font Color',
			'id'		=> $prefix . 'postfc',
			'desc'		=> 'Enter Font Color code',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		array(
			'name'		=> 'Your Name or link Name',
			'id'		=> $prefix . 'postn',
			'desc'		=> 'Enter your Nmae or Site Name',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		array(
			'name'		=> 'Font Color',
			'id'		=> $prefix . 'postfnc',
			'desc'		=> 'Enter Font Color code',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		array(
			'name'		=> 'Font Style',
			'id'		=> $prefix . 'postfns',
			'desc'		=> 'Enter Font Style',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Write your site Url',
			'id'		=> $prefix . 'postu',
			'desc'		=> 'Enter Site Link',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		array(
			'name'		=> 'Background Color',
			'id'		=> $prefix . 'postc',
			'desc'		=> 'Enter Color code',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
	)
);
/*  Blog Quote Post Settings */


/* ----------------------------------------------------- */
/* Education Post Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'education_info',
	'title' => 'Project Details',
	'pages' => array( 'education' ),
	'context' => 'normal',	

	'fields' => array(
		array(
			'name'		=> 'Icon Here: ',
			'id'		=> $prefix . 'eicon',
			'desc'		=> 'Write Here Icon name whatever you want (Eg. fa-calendar)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		array(
			'name'		=> 'Year Of Education',
			'id'		=> $prefix . 'education',
			'desc'		=> 'Write Here Year of your education',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		

				
	)
);
/* ----------------------------------------------------- */
/* experience Post Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'experience_info',
	'title' => 'Project Details',
	'pages' => array( 'experience' ),
	'context' => 'normal',	

	'fields' => array(

		array(
			'name'		=> 'Icon Here: ',
			'id'		=> $prefix . 'exicon',
			'desc'		=> 'Write Here Icon name whatever you want (Eg. fa-calendar)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		array(
			'name'		=> 'Year Of Experience',
			'id'		=> $prefix . 'experience',
			'desc'		=> 'Write Here Write Here Icon name whatever you want',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		

		
	)
);

/* ----------------------------------------------------- */
/* Member Post Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'member_info',
	'title' => 'Member Details',
	'pages' => array( 'team' ),
	'context' => 'normal',	

	'fields' => array(
		array(
			'name'		=> 'Team Member Skill',
			'id'		=> $prefix . 'member_skill',
			'desc'		=> 'Write Your Team Member Skill.',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
		array(
			'name'		=> 'Skill Name 1',
			'id'		=> $prefix . 'skill_name1',
			'desc'		=> 'write Skill Name (Eg: photoshop OR Wordpress)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Skill parcent 1',
			'id'		=> $prefix . 'skill_parcent1',
			'desc'		=> 'write Skill parcent in Number (Eg: Within 0-100)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		array(
			'name'		=> 'Skill Name 2',
			'id'		=> $prefix . 'skill_name2',
			'desc'		=> 'write Skill Name (Eg: photoshop OR Wordpress)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Skill parcent 2',
			'id'		=> $prefix . 'skill_parcent2',
			'desc'		=> 'write Skill parcent in Number (Eg: Within 0-100)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		array(
			'name'		=> 'Skill Name 3',
			'id'		=> $prefix . 'skill_name3',
			'desc'		=> 'write Skill Name (Eg: photoshop OR Wordpress)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Skill parcent 3',
			'id'		=> $prefix . 'skill_parcent3',
			'desc'		=> 'write Skill parcent in Number (Eg: Within 0-100)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		array(
			'name'		=> 'Skill Name 4',
			'id'		=> $prefix . 'skill_name4',
			'desc'		=> 'write Skill Name (Eg: photoshop OR Wordpress)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Skill parcent 4',
			'id'		=> $prefix . 'skill_parcent4',
			'desc'		=> 'write Skill parcent in Number (Eg: Within 0-100)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		
		
	)
);


/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function rocknrolla_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}

// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'rocknrolla_register_meta_boxes' );