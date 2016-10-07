<?php
/*
 *
 * Set the text domain for the theme or plugin.
 *
 */
define('Redux_TEXT_DOMAIN', 'redux-opts');
define('vcard_theme', 'redux-opts');

/*
 *
 * Require the framework class before doing anything else, so we can use the defined URLs and directories.
 * If you are running on Windows you may have URL problems which can be fixed by defining the framework url first.
 *
 */
//define('Redux_OPTIONS_URL', site_url('path the options folder'));
if(!class_exists('Redux_Options')) {
    require_once(dirname(__FILE__) . '/options/defaults.php');
}

/*
 *
 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 *
 * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
 * so you must use get_template_directory_uri() if you want to use any of the built in icons
 *
 */
function add_another_section($sections) {
    //$sections = array();
    $sections[] = array(
        'title' => __('A Section added by hook', Redux_TEXT_DOMAIN),
        'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', Redux_TEXT_DOMAIN),
		'icon' => 'paper-clip',
		'icon_class' => 'icon-large',
        // Leave this as a blank section, no options just some intro text set above.
        'fields' => array()
    );

    return $sections;
}
//add_filter('redux-opts-sections-twenty_eleven', 'add_another_section');


/*
 *
 * Custom function for filtering the args array given by a theme, good for child themes to override or add to the args array.
 *
 */
function change_framework_args($args) {
    //$args['dev_mode'] = false;

    return $args;
}
//add_filter('redux-opts-args-twenty_eleven', 'change_framework_args');


/*
 *
 * Most of your editing will be done in this section.
 *
 * Here you can override default values, uncomment args and change their values.
 * No $args are required, but they can be over ridden if needed.
 *
 */
function setup_framework_options() {
    $args = array();

    // Setting dev mode to true allows you to view the class settings/info in the panel.
    // Default: true
    //$args['dev_mode'] = true;

	// Set the icon for the dev mode tab.
	// If $args['icon_type'] = 'image', this should be the path to the icon.
	// If $args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: info-sign
	//$args['dev_mode_icon'] = 'info-sign';

	// Set the class for the dev mode tab icon.
	// This is ignored unless $args['icon_type'] = 'iconfont'
	// Default: null
	$args['dev_mode_icon_class'] = 'icon-large';

    // If you want to use Google Webfonts, you MUST define the api key.
    //$args['google_api_key'] = 'xxxx';

    // Define the starting tab for the option panel.
    // Default: '0';
    //$args['last_tab'] = '0';

    // Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
    // If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
    // If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
    // Default: 'standard'
    //$args['admin_stylesheet'] = 'standard';

    // Add HTML before the form.
    $args['intro_text'] = '';

    // Add content after the form.
    $args['footer_text'] = '';

    // Set footer/credit line.
    //$args['footer_credit'] = __('<span id="footer-thankyou">This text is displayed in the options panel footer across from the WordPress version (where it normally says \'Thank you for creating with WordPress\'). This field accepts all HTML.</span>', Redux_TEXT_DOMAIN);

    // Setup custom links in the footer for share icons
    $args['share_icons']['twitter'] = array(
        'link' => 'http://twitter.com/vcardtheme',
        'title' => ('Follow VcardTheme on Twitter'),
        'img' => Redux_OPTIONS_URL . 'img/social/Twitter.png'
    );
    $args['share_icons']['linked_in'] = array(
        'link' => 'http://www.linkedin.com/pages/vcardtheme/view?id=52559281',
        'title' => ('Find VcardTheme on LinkedIn'),
        'img' => Redux_OPTIONS_URL . 'img/social/LinkedIn.png'
    );

    // Enable the import/export feature.
    // Default: true
    $args['show_import_export'] = false;

	// Set the icon for the import/export tab.
	// If $args['icon_type'] = 'image', this should be the path to the icon.
	// If $args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: refresh
	//$args['import_icon'] = 'refresh';

	// Set the class for the import/export tab icon.
	// This is ignored unless $args['icon_type'] = 'iconfont'
	// Default: null
	$args['import_icon_class'] = 'icon-large';
    $vcard_theme="";
    // Set a custom option name. Don't forget to replace spaces with underscores!
    $args['opt_name'] = 'vcard_theme';

    // Set a custom menu icon.
    //$args['menu_icon'] = '';

    // Set a custom title for the options page.
    // Default: Options
    $args['menu_title'] = __('Vcard Theme Options', vcard_theme);

    // Set a custom page title for the options page.
    // Default: Options
    $args['page_title'] = __('Vcard Theme Options', vcard_theme);

    // Set a custom page slug for options page (wp-admin/themes.php?page=***).
    // Default: redux_options
    $args['page_slug'] = 'redux_options';

    // Set a custom page capability.
    // Default: manage_options
    //$args['page_cap'] = 'manage_options';

    // Set the menu type. Set to "menu" for a top level menu, or "submenu" to add below an existing item.
    // Default: menu
    //$args['page_type'] = 'submenu';

    // Set the parent menu.
    // Default: themes.php
    // A list of available parent menus is available at http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    //$args['page_parent'] = 'options-general.php';

    // Set a custom page location. This allows you to place your menu where you want in the menu order.
    // Must be unique or it will override other items!
    // Default: null
    $args['page_position'] = 50;

    // Set a custom page icon class (used to override the page icon next to heading)
    //$args['page_icon'] = 'icon-themes';

	// Set the icon type. Set to "iconfont" for Font Awesome, or "image" for traditional.
	// Redux no longer ships with standard icons!
	// Default: iconfont
	//$args['icon_type'] = 'image';
	//$args['dev_mode_icon_type'] = 'image';
	//$args['import_icon_type'] == 'image';

    // Disable the panel sections showing as submenu items.
    // Default: true
    //$args['allow_sub_menu'] = false;

    // Set ANY custom page help tabs, displayed using the new help tab API. Tabs are shown in order of definition.
    $args['help_tabs'][] = array(
        'id' => 'redux-opts-1',
        'title' => __('Theme Information 1', Redux_TEXT_DOMAIN),
        'content' => __('<p>This is the tab content, HTML is allowed.</p>', vcard_theme)
    );
    $args['help_tabs'][] = array(
        'id' => 'redux-opts-2',
        'title' => __('Theme Information 2', vcard_theme),
        'content' => __('<p>This is the tab content, HTML is allowed.</p>', vcard_theme)
    );

    // Set the help sidebar for the options page.
    $args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', vcard_theme);

    $sections = array();

    $sections[] = array(
		
		'icon_type' => 'image',
		'icon' => Redux_OPTIONS_URL . 'img/home.png',
		// Set the class for this icon.
		// This field is ignored unless $args['icon_type'] = 'iconfont'
		'icon_class' => 'icon-large',
        'title' => __('General Options', Redux_TEXT_DOMAIN),
		'desc' => __('<p class="description">This is the description field for this section. HTML is allowed</p>', Redux_TEXT_DOMAIN),
		'fields' => array(

            array(
                'id' => 'logopic',
                'type' => 'upload',
                'title' => __('Upload Profile Picture', vcard_theme), 
                'sub_desc' => __('Upload a Picture not More than 120px x 120px .png or .gif image that will be your or Admin Picture.', vcard_theme),
                'desc' => ''
            ),


            array(
                'id' => 'title',
                'type' => 'text',
                'title' => __('Title of the WebSite', vcard_theme), 
                'sub_desc' => __('Write a Title of your WebSite', vcard_theme),
                'desc' => '',
                "std" => __('Select a category:', vcard_theme),
            ),
            array(
                'id' => 'favicon',
                'type' => 'upload',
                'title' => __('Favicon Upload', vcard_theme), 
                'sub_desc' => __('Upload a 16px x 16px .png or .gif image that will be your favicon.', vcard_theme),
                'desc' => ''
            ),

            array(
                'id' => 'cube_loader',
                'type' => 'select',
                'title' => __('Want Spinning Cube Loader ?:', vcard_theme), 
                'sub_desc' => __('Select, You Want Spinning Cube Loader.', vcard_theme),
                'desc' => '',
                'options' => array(
                    'no'=> __('NO', vcard_theme),
                    'yes' => __('Yes', vcard_theme),
                    
                                        
                ),
                'std' => 'no'
            ),

            array(
                'id' => 'backgroung_color',
                'type' => 'select',
                'title' => __('Select Bacground', vcard_theme), 
                'sub_desc' => __('Select Your Website Background Color.', vcard_theme),
                'desc' => '',
                'options' => array(
                    'light'=> __('LIGHT', vcard_theme),
                    'dark' => __('DARK', vcard_theme),
                    
                                        
                ),
                'std' => 'LIGHT'
            ),


            array(
                'id' => 'color_option',
                'type' => 'select',
                'title' => __('Select Color', vcard_theme), 
                'sub_desc' => __('Select Your Website Color.', vcard_theme),
                'desc' => '',
                'options' => array(
                    'yellow'=> __('YELLOW', vcard_theme),
                    'blue' => __('BLUE', vcard_theme),
                    'green' => __('GREEN', vcard_theme),
                    'orange' => __('ORANGE', vcard_theme),
                    'pale-green' => __('PLANE GREEN', vcard_theme),
                    'pink' => __('PINK', vcard_theme),
                    'red' => __('RED', vcard_theme),
                    'violet' => __('VIOLET', vcard_theme),
                   
                    
                                        
                ),
                'std' => 'yellow'
            ),


		)
    );






// footer Options
    


     $sections[] = array(
        'icon' => 'file-alt',
        'icon_class' => 'icon-large',
        'title' => __('Footer Options', vcard_theme),
        'desc' => __('All footer related options are listed here. Remember to include the "http://" in any URLs!', vcard_theme),
        'fields' => array(
             


             array(
                'id'        => 'copyrighttext',
                'type'      => 'text',
                'title'     => __('Footer Copyright Text', vcard_theme),
                'sub_desc'  => __('Write Footer Copyright Text in your site', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),
             
             
              array(
                'id'        => 'Social_l1',
                'type'      => 'text',
                'title'     => __('Facebook Link :', vcard_theme),
                'sub_desc'  => __('Write Your Social Icon Link', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

              

              array(
                'id'        => 'Social_l2',
                'type'      => 'text',
                'title'     => __('Twitter Link :', vcard_theme),
                'sub_desc'  => __('Write Your Social Icon Link', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

              

               array(
                'id'        => 'Social_l3',
                'type'      => 'text',
                'title'     => __('dribbble Link :', vcard_theme),
                'sub_desc'  => __('Write Your Social Icon Link', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

               

                array(
                'id'        => 'Social_l4',
                'type'      => 'text',
                'title'     => __('pinterest Link :', vcard_theme),
                'sub_desc'  => __('Write Your Social Icon Link', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

                array(
                'id'        => 'Social_l5',
                'type'      => 'text',
                'title'     => __('LinkedIn Link :', vcard_theme),
                'sub_desc'  => __('Write Your Social Icon Link', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

                array(
                'id'        => 'Social_l6',
                'type'      => 'text',
                'title'     => __('Google Plus Link :', vcard_theme),
                'sub_desc'  => __('Write Your Social Icon Link', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),
                array(
                'id'        => 'Social_l7',
                'type'      => 'text',
                'title'     => __('youtube Link :', vcard_theme),
                'sub_desc'  => __('Write Your Social Icon Link', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

                array(
                'id'        => 'Social_l8',
                'type'      => 'text',
                'title'     => __('dropbox Link :', vcard_theme),
                'sub_desc'  => __('Write Your Social Icon Link', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

                 

            
        )
    );
    

 // Resume Skill Options
    


     $sections[] = array(
        'icon' => 'file-alt',
        'icon_class' => 'icon-large',
        'title' => __('Resume Skill Options', vcard_theme),
        'desc' => __('All Resume Skill related options are listed here. Remember to include the "http://" in any URLs!', vcard_theme),
        'fields' => array(
             

            array(
                'id'        => 'skilln1',
                'type'      => 'text',
                'title'     => __('Skill Name 1', vcard_theme),
                'sub_desc'  => __('Write Skill Name 1', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),
             array(
                'id'        => 'skill1',
                'type'      => 'text',
                'title'     => __('Skill Percent 1', vcard_theme),
                'sub_desc'  => __('Write Skill 1 in With %', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

             array(
                'id'        => 'skilln2',
                'type'      => 'text',
                'title'     => __('Skill Name 2', vcard_theme),
                'sub_desc'  => __('Write Skill Name 2', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),
             
             array(
                'id'        => 'skill2',
                'type'      => 'text',
                'title'     => __('Skill Percent 2', vcard_theme),
                'sub_desc'  => __('Write Skill 2 in With %', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

             array(
                'id'        => 'skilln3',
                'type'      => 'text',
                'title'     => __('Skill Name 3', vcard_theme),
                'sub_desc'  => __('Write Skill Name 3', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

              array(
                'id'        => 'skill3',
                'type'      => 'text',
                'title'     => __('Skill Percent 3', vcard_theme),
                'sub_desc'  => __('Write Skill 3 in With %', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

              array(
                'id'        => 'skilln4',
                'type'      => 'text',
                'title'     => __('Skill Name 4', vcard_theme),
                'sub_desc'  => __('Write Skill Name 4', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

              array(
                'id'        => 'skill4',
                'type'      => 'text',
                'title'     => __('Skill Percent 4', vcard_theme),
                'sub_desc'  => __('Write Skill 4 in With %', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

              array(
                'id'        => 'skilln5',
                'type'      => 'text',
                'title'     => __('Skill Name 5', vcard_theme),
                'sub_desc'  => __('Write Skill Name 5', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

             array(
                'id'        => 'skill5',
                'type'      => 'text',
                'title'     => __('Skill Percent 5', vcard_theme),
                'sub_desc'  => __('Write Skill 5 in With %', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

             array(
                'id'        => 'skilln6',
                'type'      => 'text',
                'title'     => __('Skill Name 6', vcard_theme),
                'sub_desc'  => __('Write Skill Name 6', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

             array(
                'id'        => 'skill6',
                'type'      => 'text',
                'title'     => __('Skill Percent 6', vcard_theme),
                'sub_desc'  => __('Write Skill 6 in With %', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

              array(
                'id'        => 'skilln7',
                'type'      => 'text',
                'title'     => __('Skill Name 7', vcard_theme),
                'sub_desc'  => __('Write Skill Name 7', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

             array(
                'id'        => 'skill7',
                'type'      => 'text',
                'title'     => __('Skill Percent 7', vcard_theme),
                'sub_desc'  => __('Write Skill 7 in With %', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

              array(
                'id'        => 'skilln11',
                'type'      => 'text',
                'title'     => __('Skill Name 8', vcard_theme),
                'sub_desc'  => __('Write Skill Name 8', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

             array(
                'id'        => 'skill11',
                'type'      => 'text',
                'title'     => __('Skill Percent 8', vcard_theme),
                'sub_desc'  => __('Write Skill 8 in With %', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

             array(
                'id'        => 'skilln12',
                'type'      => 'text',
                'title'     => __('Skill Name 9', vcard_theme),
                'sub_desc'  => __('Write Skill Name 9', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

             array(
                'id'        => 'skill12',
                'type'      => 'text',
                'title'     => __('Skill Percent 9', vcard_theme),
                'sub_desc'  => __('Write Skill 9 in With %', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),




             

                           
        )
    );
    
// Google Map Options
    


     $sections[] = array(
        'icon' => 'file-alt',
        'icon_class' => 'icon-large',
        'title' => __('Google Map', vcard_theme),
        'desc' => __('All Google map related options are listed here. Remember to include the "http://" in any URLs!', vcard_theme),
        'fields' => array(
             


            array(
                'id'        => 'lat',
                'type'      => 'text',
                'title'     => __('Map Latitude', vcard_theme),
                'sub_desc'  => __('Write Latitude for your place', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

             array(
                'id'        => 'lng',
                'type'      => 'text',
                'title'     => __('Map Longitude', vcard_theme),
                'sub_desc'  => __('Write Longitude for your place', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),

             array(
                'id'        => 'micon',
                'type'      => 'upload',
                'title'     => __('Map Marker', vcard_theme),
                'sub_desc'  => __('Upload Map Marker', vcard_theme),
                'dece'      => __('',vcard_theme),
            ),
            

                 

            
        )
    );       


   

   

    $tabs = array();

    if (function_exists('wp_get_theme')){
        $theme_data = wp_get_theme();
        $item_uri = $theme_data->get('ThemeURI');
        $description = $theme_data->get('Description');
        $author = $theme_data->get('Author');
        $author_uri = $theme_data->get('AuthorURI');
        $version = $theme_data->get('Version');
        $tags = $theme_data->get('Tags');
    }else{
        $theme_data = wp_get_theme(trailingslashit(get_stylesheet_directory()) . 'style.css');
        $item_uri = $theme_data['URI'];
        $description = $theme_data['Description'];
        $author = $theme_data['Author'];
        $author_uri = $theme_data['AuthorURI'];
        $version = $theme_data['Version'];
        $tags = $theme_data['Tags'];
     }

    $item_info = '<div class="redux-opts-section-desc">';
    $item_info .= '<p class="redux-opts-item-data description item-uri">' . __('<strong>Theme URL:</strong> ', Redux_TEXT_DOMAIN) . '<a href="' . $item_uri . '" target="_blank">' . $item_uri . '</a></p>';
    $item_info .= '<p class="redux-opts-item-data description item-author">' . __('<strong>Author:</strong> ', Redux_TEXT_DOMAIN) . ($author_uri ? '<a href="' . $author_uri . '" target="_blank">' . $author . '</a>' : $author) . '</p>';
    $item_info .= '<p class="redux-opts-item-data description item-version">' . __('<strong>Version:</strong> ', Redux_TEXT_DOMAIN) . $version . '</p>';
    $item_info .= '<p class="redux-opts-item-data description item-description">' . $description . '</p>';
    $item_info .= '<p class="redux-opts-item-data description item-tags">' . __('<strong>Tags:</strong> ', Redux_TEXT_DOMAIN) . implode(', ', $tags) . '</p>';
    $item_info .= '</div>';

    $tabs['item_info'] = array(
		'icon' => 'info-sign',
		'icon_class' => 'icon-large',
        'title' => __('Theme Information', Redux_TEXT_DOMAIN),
        'content' => $item_info
    );

    if(file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
        $tabs['docs'] = array(
			'icon' => 'book',
			'icon_class' => 'icon-large',
            'title' => __('Documentation', Redux_TEXT_DOMAIN),
            'content' => nl2br(include(trailingslashit(dirname(__FILE__)) . 'README.html'))
        );
    }

    global $Redux_Options;
    $Redux_Options = new Redux_Options($sections, $args, $tabs);

}
add_action('init', 'setup_framework_options', 0);

/*
 *
 * Custom function for the callback referenced above
 *
 */
function my_custom_field($field, $value) {
    print_r($field);
    print_r($value);
}

/*
 *
 * Custom function for the callback validation referenced above
 *
 */
function validate_callback_function($field, $value, $existing_value) {
    $error = false;
    $value =  'just testing';
    /*
    do your validation

    if(something) {
        $value = $value;
    } elseif(somthing else) {
        $error = true;
        $value = $existing_value;
        $field['msg'] = 'your custom error message';
    }
    */

    $return['value'] = $value;
    if($error == true) {
        $return['error'] = $field;
    }
    return $return;
}
