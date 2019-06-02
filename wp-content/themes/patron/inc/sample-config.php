<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "patron_option";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'patron_option/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name'             => $opt_name,
        'display_name'         => $theme->get( 'Name' ),
        'display_version'      => $theme->get( 'Version' ),
        'menu_type'            => 'menu',
        'allow_sub_menu'       => true,
        'menu_title'           => __( 'Patron Options', 'patron' ),
        'page_title'           => __( 'Patron Options', 'patron' ),
        'google_api_key'       => '',
        'google_update_weekly' => false,
        'async_typography'     => false,
        'admin_bar'            => true,
        'admin_bar_icon'       => 'dashicons-portfolio',
        'admin_bar_priority'   => 50,
        'global_variable'      => '',
        'dev_mode'             => true,
        'update_notice'        => true,
        'customizer'           => true,
        'page_priority'        => null,
        'page_parent'          => 'themes.php',
        'page_permissions'     => 'manage_options',
        'menu_icon'            => '',
        'last_tab'             => '',
        'page_icon'            => 'icon-themes',
        'page_slug'            => '',
        'save_defaults'        => true,
        'default_show'         => false,
        'default_mark'         => '',
        'show_import_export'   => true,
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        'output_tag'           => true,
        'database'             => '',
        'use_cdn'              => true,
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );



    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'patron' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'patron' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'patron' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'patron' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'patron' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'patron' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    	
	//Preloader Settings
	Redux::setSection( $opt_name, array(
        'icon' => ' el-icon-repeat',
        'title' => esc_html__('Preload Settings', 'patron'),
        'fields' => array(            
            array(
                'id'       => 'preload-switch',
                'type'     => 'switch', 
                'title'    => esc_html__('Preload Off?', 'patron'),
                'subtitle' => esc_html__('If you do not want to use preload, you can turn it off.', 'patron'),
                'default'  => true,
            ),
            array(
                'id' 		=> 'preload-border-color',
                'type' 		=> 'color',
                'title' 	=> esc_html__('Preload Circle Border Color', 'patron'),
                'subtitle' 	=> esc_html__('Pick the preload Border color (default: #00e5b7).', 'patron'),
                'default' 	=> '#00e5b7',
                'validate' 	=> 'color',
            ),
			array(
                'id' => 'preload-shadow-color',
                'type' => 'color',
                'title' => esc_html__('Preload Circle Shadow Color', 'patron'),
                'subtitle' => esc_html__('Pick the preload Shadow color (default: #004c3d).', 'patron'),
                'default' => '#004c3d',
                'validate' => 'color',
            ), 
            array(
                'id' => 'preload-bg-color',
                'type' => 'color',
                'title' => esc_html__('Preload Background Color', 'patron'),
                'subtitle' => esc_html__('Pick the preload background color (default: #030d26).', 'patron'),
                'default' => '#030d26',
                'validate' => 'color',
            ), 	
        )
    ) );
	
	// Logo and Favicon
	Redux::setSection( $opt_name, array(
        'icon' => ' el-icon-picture',
        'title' => esc_html__('Logo & Favicon Settings', 'patron'),
        'fields' => array(
            array(
                'id' => 'favicon',
                'type' => 'media',
                'url' => false,
                'title' => esc_html__('Favicon', 'patron'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => esc_html__('Recommended Size: 32x32', 'patron'),
                'subtitle' => esc_html__('favicon format: .ico', 'patron'),
               'default' => array('url' => get_template_directory_uri().'/images/favicon.ico'),                     
            ),
            array(
                'id' => 'logo',
                'type' => 'media',
                'url' => false,
                'title' => esc_html__('Logo static on header normal', 'patron'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.                
                'subtitle' => esc_html__('The logo will be used on header normal and side navigation on mobile version.', 'patron'),
                'desc' => esc_html__('This is the logo you see first when visiting the site. Keep it ratio at (236X77)px', 'patron'),
                'default' => array('url' => get_template_directory_uri().'/images/logo.png'),                     
            ),                                            
        )
    ) );
	
	//Top Header Settings
	Redux::setSection( $opt_name, array(
        'icon' => ' el-icon-credit-card',
        'title' => esc_html__('Topbar Header Settings', 'patron'),
        'fields' => array(
            array(
                'id'       => 'topbar-switch',
                'type'     => 'switch', 
                'title'    => esc_html__('Default top bar active', 'patron'),
                'subtitle' => esc_html__('If you do not want to use the topbar, just turn it off.', 'patron'),
                'default'  => true,
            ), 
            array(
                'id'       => 'topbar-allpage',
                'type'     => 'switch', 
                'title'    => esc_html__('Topbar for all pages?', 'patron'),
                'subtitle' => esc_html__('If you do not want to use the topbar for all pages, just turn it off.', 'patron'),
                'default'  => true,
            ), 
            array(
                'id' => 'topbar-text-color',
                'type' => 'color',
                'title' => esc_html__('Topbar Text Color', 'patron'),
                'subtitle' => esc_html__('Pick the topbar text color (default: #ffffff).', 'patron'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),   
            array(
                'id' => 'topbar-border-color',
                'type' => 'color_rgba',
                'title' => esc_html__('Topbar Border Bottom Color', 'patron'),
                'subtitle' => esc_html__('Pick the topbar border bottom color, default: rgba(255, 255, 255, 0.2)', 'patron'),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '0.2'
                ),
            ), 
			array(
                'id'       => 'info_list_phone',
                'type'     => 'text',
                'title'    => __( 'Contact Number', 'patron' ),
                'subtitle' => __( 'Top bar left phone number', 'patron' ),
				'placeholder' => 'Phone Number',
				'default' => '(+1) 828-376-0532',
            ),      
            array(
                'id' => 'topbar_col_left',
                'type' => 'select',
                'title' => esc_html__('Select Columns on left side of top header', 'patron'),
                'subtitle' => esc_html__('Select columns layout for your content on left side of top header.', 'patron'),
                'desc' => __('Use layout 12 columns in Bootstrap 3.x: <a href="http://getbootstrap.com/docs/3.3/css/#grid-example-basic" target="_blank">View layout</a>', 'patron'),
                'options'  => array(                    
                    '1' => '1 Columns',
                    '2' => '2 Columns',
                    '3' => '3 Columns',                    
                    '4' => '4 Columns', 
                    '5' => '5 Columns', 
                    '6' => '6 Columns', 
                    '7' => '7 Columns',                                                                 
                    '8' => '8 Columns', 
                    '9' => '9 Columns', 
                    '10' => '10 Columns', 
                    '11' => '11 Columns', 
                    '12' => '12 Columns', 
                    'none' => 'Hide this column',
                ),
                'default' => '6',
            ), 
            array(
                'id' => 'topbar_col_right',
                'type' => 'select',
                'title' => esc_html__('Select Columns on right side of top header', 'patron'),
                'subtitle' => esc_html__('Select columns layout for your content on right side of top header.', 'patron'),
                'desc' => __('Use layout 12 columns in Bootstrap 3.x: <a href="http://getbootstrap.com/docs/3.3/css/#grid-example-basic" target="_blank">View layout</a>', 'patron'),
                'options'  => array(                    
                    '1' => '1 Columns',
                    '2' => '2 Columns',
                    '3' => '3 Columns',                    
                    '4' => '4 Columns', 
                    '5' => '5 Columns', 
                    '6' => '6 Columns', 
                    '7' => '7 Columns',                                                                 
                    '8' => '8 Columns', 
                    '9' => '9 Columns', 
                    '10' => '10 Columns', 
                    '11' => '11 Columns', 
                    '12' => '12 Columns', 
                    'none' => 'Hide this column',
                ),
                'default' => '6',
            ),                      
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Multi-Languages', 'patron' ),
        'id'         => 'top-header-multi-languages',        
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'multi_languages_shortcode',
                'type' => 'textarea',
                'title' => esc_html__('Add shortcode multi-languages on right side of top header.', 'patron'),
                'subtitle' => esc_html__('Add shortcode from your multi-languages plugins, eg: WPML, qTranslate-X, Polylang, etc...', 'patron'),
                'default' => '',
            ), 
        )
    ) );
	
	// Header Settings Option
	Redux::setSection( $opt_name, array(
        'icon' => 'el el-wrench',
        'title' => esc_html__('Header Settings', 'patron'),
        'fields' => array(            
            array(
                'id' => 'header_style',
                'type' => 'select',
                'title' => esc_html__('Header Style', 'patron'),
                'subtitle' => esc_html__('Header Style is default used for header layout: With Background.', 'patron'),
                'desc' => esc_html__('Please Select your header style from the dropdown menu.', 'patron'),
                'options'  => array(
                    '1' => 'With Background',
                    '2' => 'Transparent Background', 
                    '3' => 'No Top Header'                                               
                ),
                'default' => '1',
            ),
			array(
                'id'       => 'header_bg_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Header Background Color', 'patron' ),
                'subtitle' => esc_html__( 'Gives you the RGBA color.', 'patron' ),
                'default'  => array(
                    'color' => '#000',
                    'alpha' => '.7'
                ),
                //'output'   => array( 'body' ),
                'mode'     => 'background',
                //'validate' => 'colorrgba',
            ),
			array(
                'id'       => 'ot-fixed-navigation',
                'type'     => 'color_rgba',
                'title'    => __( 'Fixed Header Background Color', 'patron' ),
				'output'   => array(
					'background-color'	=> '#header-1.fixed-header .main-nav, #header-2.fixed-header .main-nav, #header-3.fixed-header .main-nav',
				),
                'subtitle' => __( 'Gives you the RGBA color, Secondery color overlay (Default: #000).', 'patron' ),
                'default'  => array(
                    'color' => '#000',
                    'alpha' => '1'
                ),
                'mode'     => 'background',
            ),
			array(
                'id'       => 'scroll-fixed-header',
                'type'     => 'switch', 
                'title'    => esc_html__('Fixed Header After Scroll', 'patron'),
                'subtitle' => esc_html__('If you do not want the header after scroll the page, just turn it off.', 'patron'),
                'default'  => true,
            ),
			array(
                'id'       => 'scroll-fixed-header-mobile',
                'type'     => 'switch', 
                'title'    => esc_html__('Fixed Header After Scroll On Mobile', 'patron'),
                'subtitle' => esc_html__('If you want the header after scroll the page on mobile, just turn it on.', 'patron'),
                'default'  => false,
            ),
            array(
                'id' => 'header-border-bottom-color',
                'type' => 'color',
                'title' => esc_html__('Transparent Header Border Bottom', 'patron'),
                'subtitle' => esc_html__('Transparent Header border botton color, it will visible if you select the transparent background header. Default color is (#5a5a5a)', 'patron'),
                'default' => '#5a5a5a',
                'validate' => 'color',
            ),                    
            array(
                'id' => 'main-nav-text-color',
                'type' => 'color',
                'title' => esc_html__('Main Menu Font Color', 'patron'),
                'subtitle' => esc_html__('Main Menu font color (default: #fff), You need to be sure select Header Style is Header Customize before custom the colours.', 'patron'),
                'default' => '#fff',
                'validate' => 'color',
            ),                                                  
        )
    ));
	
	
	
	// Banner settings for other pages
	Redux::setSection( $opt_name, array(
        'icon' => ' el-icon-credit-card',
        'title' => esc_html__('Banner Settings', 'patron'),
        'fields' => array( 
            array(
                'id'       => 'banner-switch',
                'type'     => 'switch', 
                'title'    => esc_html__('Banner Section', 'patron'),
                'subtitle' => esc_html__('If you do not want to keep the banner in other page, kust switch off.', 'patron'),
                'default'  => true,
            ),
			array(
                'id'       => 'banner-image-switch',
                'type'     => 'switch', 
                'title'    => esc_html__('Banner Background Image', 'patron'),
                'subtitle' => esc_html__('If you do not want to keep banner image, just turn it off', 'patron'),
                'default'  => true,
            ),
            array(
                'id' => 'banner_bg',
                'type' => 'media',
                'url' => false,
                'title' => esc_html__('Banner image for all page', 'patron'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => esc_html__('Top banner background image of other pages', 'patron'),
                'subtitle' => esc_html__('The Background used for Top Header on All Pages', 'patron'),
               'default' => array('url' => get_template_directory_uri().'/images/banner/banner.png'),                     
            ),            
            array(
                'id' => 'banner-text-color',
                'type' => 'color',
                'title' => esc_html__('Banner Text Color', 'patron'),
                'subtitle' => esc_html__('Pick the topbar text color (default color: #fff).', 'patron'),
                'default' => '#fff',
                'validate' => 'color',
            ),   
            array(
                'id' => 'banner-bg-color',
                'type' => 'color',
                'title' => esc_html__('Banner Background Color', 'patron'),
                'subtitle' => esc_html__('You can use it for banner background solid color but it only show when you switch off the background image, (default color: #f5f5f5)', 'patron'),
                'default' => '#f5f5f5',
                'validate' => 'color',
            ), 
            array(
                'id'             => 'banner-spacing',
                'type'           => 'spacing',
                'output'   => array( '.banner-content' ),
                // An array of CSS selectors to apply this font style to
                'mode'     => 'padding',
                // absolute, padding, margin, defaults to padding
                'all'      => false,
                // Have one field that applies to all
                'top'           => true,     // Disable the top
                'right'         => false,     // Disable the right
                'bottom'        => true,     // Disable the bottom
                'left'          => false,     // Disable the left
                'units'          => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
                'units_extended'=> 'true',    // Allow users to select any type of unit
                //'display_units' => 'false',   // Set to false to hide the units if the units are specified
                'title'          => __('Banner Padding Option', 'patron'),
                'subtitle'       => __('Allow you to choose the padding for banner that you want.', 'patron'),
                'desc'           => __('You can enable or disable any piece of this field. Top, Bottom or Units.', 'patron'),
                'default'            => array(
                    'padding-top'     => '60', 
                    'padding-right'   => '0', 
                    'padding-bottom'  => '60', 
                    'padding-left'    => '0',
                    'units'          => 'px', 
                )                                         
            ),                                         
        )
    ));
	
	
	// Single Service Page Settings
	Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Single Service Settings', 'patron' ),
        'id'         => 'services-single',
        'fields'     => array(
            array(
                'id'       => 'single-service-layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Single service option layout', 'patron' ),
                'subtitle' => esc_html__( 'Select option: page fullwidth or page left sidebar.', 'patron' ),
                'desc'     => esc_html__( 'Select option: page fullwidth or page left sidebar, default: page left sidebar.', 'patron' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => '1 Column',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    '2' => array(
                        'alt' => 'Sidebar Left',
                        'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                    ),
                    '3' => array(
                        'alt' => 'Sidebar Right',
                        'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                    ),
                ),
                'default'  => '2',
            ),  
			array(
                'id' => 'service_fullwidth',
                'type' => 'select',
                'title' => esc_html__('Single service Full', 'patron'),
                'subtitle' => esc_html__('Applies with fullwidth layout.', 'patron'),
                'desc' => esc_html__('No for with container or Yes for without container?', 'patron'),
                'options'  => array(
					'no' => 'No',
					'yes' => 'Yes',
                ),
                'default' => 'no',
            ), 
			
        ),        
    ) );
	
	
	
	// Page Layout Settings
	Redux::setSection( $opt_name, array(
		'icon' => 'el el-screen',
        'title'      => esc_html__( 'Layout Settings', 'patron' ),
        'id'         => 'layout-model',
        'fields'     => array(
            array(
                'id'       => 'sidebar-layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Page Layout Model', 'patron' ),
                'subtitle' => esc_html__( 'Left Sidebar Layout Model', 'patron' ),
                'desc'     => esc_html__( 'Select Layout Model Or Style', 'patron' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => '1 Column',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    '2' => array(
                        'alt' => '2 Column Left',
                        'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                    ),
                    '3' => array(
                        'alt' => '2 Column Right',
                        'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                    ),
                ),
                'default'  => '2',
            ),  
			array(
                'id' => 'layout_fullwidth',
                'type' => 'select',
                'title' => esc_html__('Layout Full Width', 'patron'),
                'subtitle' => esc_html__('Applies with fullwidth layout.', 'patron'),
                'desc' => esc_html__('No for with container or Yes for without container?', 'patron'),
                'options'  => array(
					'no' => 'No',
					'yes' => 'Yes',
                ),
                'default' => 'no',
            ),
			array(
                'id' => 'layout-bg-color',
                'type' => 'color',
                'title' => esc_html__('Layout Background Color', 'patron'),
                'subtitle' => esc_html__('Choose a color as layout background color, (default color: #f5f5f5)', 'patron'),
                'default' => '#f5f5f5',
                'validate' => 'color',
            ),
			
        ),        
    ) );
	
	
	// Blog Layout Settings
	Redux::setSection( $opt_name, array(
		'icon' => 'el el-screen',
        'title'      => esc_html__( 'Blog Settings', 'patron' ),
        'id'         => 'blog-settings',
        'fields'     => array(
            array(
                'id'       => 'blog-layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Page Layout Model', 'patron' ),
                'subtitle' => esc_html__( 'Left Sidebar Layout Model', 'patron' ),
                'desc'     => esc_html__( 'Select Layout Model Or Style', 'patron' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => '1 Column',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    '2' => array(
                        'alt' => '2 Column Left',
                        'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                    ),
                    '3' => array(
                        'alt' => '2 Column Right',
                        'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                    ),
                ),
                'default'  => '3',
            ),  
			array(
                'id' => 'blog_layout_bg',
                'type' => 'color',
                'title' => esc_html__('Layout Background Color', 'patron'),
                'subtitle' => esc_html__('Choose a color as layout background color, (default color: #f5f5f5)', 'patron'),
                'default' => '#f5f5f5',
                'validate' => 'color',
            ),
			array(
                'id' => 'blog_excerpt',
                'type' => 'text',
                'title' => esc_html__('Blog custom excerpt lenght', 'patron'),
                'subtitle' => esc_html__('Input Blog custom excerpt lenght', 'patron'),
                'desc' => esc_html__('Blog custom excerpt lenght', 'patron'),
                'default' => '20',
            ),
			array(
                'id'       => 'blog-style',
                'type'     => 'select',
                'title'    => __( 'Blog Style', 'patron' ),
                'subtitle' => __( 'Select your blog thumbnail style', 'patron' ),
                'desc'     => __( 'Select a style from 2 option', 'patron' ),
                'options'  => array(
                    '1' => 'Rectangle Thumb',
                    '2' => 'Tall Thumb',
                    '3' => 'Full Width',
                ),
                'default'  => '1',
            ),
        ),        
    ) );
	Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Single Blog Settings', 'patron' ),
        'id'         => 'single-blog-settings',
		'subsection' => true,
        'fields'     => array(
			array(
                'id'       => 'single-blog-title',
                'type'     => 'text',
                'title'    => __( 'Single Blog Title', 'patron' ),
                'subtitle' => __( 'Custom title text if you dont keep the post title', 'patron' ),
				'default' => '',
            ),
			array(
                'id' 		=> 'single-blog-bg',
                'type' 		=> 'color',
                'title' 	=> esc_html__('Layout Background Color', 'patron'),
                'subtitle' 	=> esc_html__('Choose a color as layout background color, (default color: #f5f5f5)', 'patron'),
                'default' 	=> '#f5f5f5',
                'validate' 	=> 'color',
            ),
			array(
                'id'       => 'single-social-share',
                'type'     => 'switch', 
                'title'    => esc_html__('On/Off Social Share', 'patron'),
                'subtitle' => esc_html__('On or off your share link in single blog page', 'patron'),
                'default'  => true,
            ),
        ),        
    ) );
	
	
	
	
	// Footer Settings
	Redux::setSection( $opt_name, array(
		'icon' => 'el el-icon-credit-card',
        'title'      => esc_html__( 'Footer Settings', 'patron' ),
        'id'         => 'footer-settings',
        'fields'     => array(  
			array(
                'id'       => 'footer-layout',
                'type'     => 'select',
                'title'    => __( 'Select Option', 'patron' ),
                'subtitle' => __( 'Select the layout for the footer you want to use for the site.', 'patron' ),
                'desc'     => __( 'There is 3 different footer layout footer Layout 1 is default', 'patron' ),
                'options'  => array(
                    '1' => 'Layout 1',
                    '2' => 'Layout 2',
                    '3' => 'Layout 3',
                ),
                'default'  => '1',
            ),
			array(
                'id' => 'logo_footer',
                'type' => 'media',
                'title' => esc_html__('Logo for footer layout', 'patron'),
                'subtitle' => esc_html__('Add logo display on bottom of Footer Layout.', 'patron'),                        
                'default' => array('url' => get_template_directory_uri().'/images/logo/footer-logo.png'),
            ),
			array(
                'id' => 'copy_text',
                'type' => 'editor',
                'title' => esc_html__('Footer Copyright Text', 'patron'),
                'subtitle' => esc_html__('Add Your Copyright Text on Bottom Footer.', 'patron'),
                'default' => '© 2018 All Rights Reserved by Unicoder',
            ),
        ),        
    ) );
	
	
	// Miscellaneous Settings
	Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Miscellaneous Settings', 'patron' ),
        'id'         => 'miscellaneous-settings',
		'icon' => 'el el-wrench',
    ) );
	
	Redux::setSection( $opt_name, array(
		'icon' => 'el el-map-marker',
        'title'      => __( 'Google Map', 'patron' ),
        'id'         => 'google-map',
        'subsection' => true,
        'fields'     => array(
			array(
                'id' => 'gmap_api',
                'type' => 'text',
                'title' => esc_html__('Google Map API Key', 'patron'),
                'subtitle' => esc_html__('Add your Google map api key', 'patron'),
                'desc' => esc_html__('Create your Gmap API key here: https://developers.google.com/maps/documentation/javascript/', 'patron'),
                'default' => ''
            ),
		),
	));
	
	
	
	// Color Settings
	Redux::setSection( $opt_name, array(
        'title'     => esc_html__( 'Color Settings', 'patron' ),
        'id'        => 'theme-colors',
		'icon' 		=> 'el el-brush',
		'desc'		=> 'Theme color settings, change the theme colors of all content using the color settings.',
		)
	);
	Redux::setSection( $opt_name, array(
        'title'     => esc_html__( 'Theme Colors', 'patron' ),
        'id'        => 'colors-settings',
		'desc'		=> 'Theme different area color settings',
		'subsection' => true,
		'fields'	=> array (
			array(
                'id'       => 'pt-bg-color1',
                'type'     => 'color',
                'output'   => array( 'background-color' => '.bg-gray' ),
                'title'    => __( 'Light Color', 'patron' ),
                'subtitle' => __( 'Theme light color settings (default: #f5f5f5).', 'patron' ),
                'default'  => '#f5f5f5',
            ),
			array(
                'id'       => 'pt-bg-color2',
                'type'     => 'color',
                'output'   => array( 
					'background-color' 	=> '.btn-primary, .bg-default', 
					'border-color' 		=> '.btn-primary',
				),
                'title'    => __( 'Primary Color', 'patron' ),
                'subtitle' => __( 'Theme primary color, it is the main color of the theme (default: #fb9d5b).', 'patron' ),
                'default'  => '#fb9d5b',
            ),
			array(
                'id'       => 'pt-bg-color3',
                'type'     => 'color',
                'output'   => array( 
					'background-color' => '.bg-dark, .btn-secondary',
					'border-color'	   => '.btn-secondary, .btn-secondary:hover, .btn-secondary:focus',
					'color'			   => '.btn-secondary:hover, .btn-secondary:focus',
				),
                'title'    => __( 'Secondery Color', 'patron' ),
                'subtitle' => __( 'Theme secondery color or the dark color of the theme (default: #030d26).', 'patron' ),
                'default'  => '#030d26',
            ),
			array(
                'id'       => 'pt-bg-color4',
                'type'     => 'color',
                'output'   => array( 
					'background-color' => '#footer',
				),
                'title'    => __( 'Footer Background Color', 'patron' ),
                'subtitle' => __( 'Theme footer background color settings (default: #030d26).', 'patron' ),
                'default'  => '#030d26',
            ),
			array(
                'id'       => 'pt-bg-color5',
                'type'     => 'color',
                'output'   => array( 
					'background-color' => '.bg-extra-dark',
				),
                'title'    => __( 'Dark Background Color', 'patron' ),
                'subtitle' => __( 'Theme extra dark background color (default: #000615).', 'patron' ),
                'default'  => '#000615',
            ),
		),
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'     => esc_html__( 'Font Colors', 'patron' ),
        'id'        => 'font-colors',
		'desc'		=> 'Theme font color settings',
		'subsection' => true,
		'fields'	=> array (
			array(
                'id'       => 'pt-font-color1',
                'type'     => 'color',
                'output'   => array( 
					'color' => '.section-title, .inner-title, .thumb-title, [class^="flaticon-"]::before',
				),
                'title'    => __( 'Title Font Color', 'patron' ),
                'subtitle' => __( 'All title font color (default: #030d26).', 'patron' ),
                'default'  => '#030d26',
            ),
			array(
                'id'       => 'pt-font-color2',
                'type'     => 'color',
                'output'   => array( 
					'background-color' 	=> '.section-title::before, .inner-title::before',
					'color'				=> '.title-tag',
				),
                'title'    => __( 'Title Tagline Color', 'patron' ),
                'subtitle' => __( 'Theme title top tagline and underline color (default: #fb9d5b).', 'patron' ),
                'default'  => '#fb9d5b',
            ),
			array(
                'id'       => 'pt-font-color3',
                'type'     => 'color',
                'output'   => array( 
					'color'	=> 'h1, h2, h3, h4, h5, h6'
				),
                'title'    => __( 'Headline Tag Color', 'patron' ),
                'subtitle' => __( 'Theme headline tag color h1 to h5 (default: #030d26).', 'patron' ),
                'default'  => '#030d26',
            ),
			array(
                'id'       => 'pt-font-color4',
                'type'     => 'color',
                'title'    => __( 'Primary Font Color', 'patron' ),
                'subtitle' => __( 'Change all font color where used the primary color (default: #fb9d5b).', 'patron' ),
                'default'  => '#fb9d5b',
            ),
			array(
                'id'       => 'pt-font-color5',
                'type'     => 'color',
                'title'    => __( 'Navigation Active Color', 'patron' ),
                'subtitle' => __( 'Change all font color where used the primary color (default: #fb9d5b).', 'patron' ),
                'default'  => '#fb9d5b',
            ),
		)
	));
	
	
	
	Redux::setSection( $opt_name, array(
        'title'     => esc_html__( 'Overlay Colors', 'patron' ),
        'id'        => 'overlay-colors',
		'desc'		=> 'Theme overlay RGBA color settings',
		'subsection' => true,
		'fields'	=> array (
			array(
                'id'       => 'ot-overlay-rgba1',
                'type'     => 'color_rgba',
                'title'    => __( 'Primary Color Overlay', 'patron' ),
                'subtitle' => __( 'Gives you the RGBA color, primary color overlay (Default: #fb9d5b).', 'patron' ),
                'default'  => array(
                    'color' => '#fb9d5b',
                    'alpha' => '.9'
                ),
                'mode'     => 'background',
            ),
			array(
                'id'       => 'ot-overlay-rgba2',
                'type'     => 'color_rgba',
                'title'    => __( 'Secondery Color Overlay', 'patron' ),
                'subtitle' => __( 'Gives you the RGBA color, Secondery color overlay (Default: #030d26).', 'patron' ),
                'default'  => array(
                    'color' => '#030d26',
                    'alpha' => '.8'
                ),
                'mode'     => 'background',
            ),
			array(
                'id'       => 'ot-overlay-rgba3',
                'type'     => 'color_rgba',
                'title'    => __( 'Banner Overlay', 'patron' ),
				'output'   => array(
					'background-color'	=> '#banner:before',
				),
                'subtitle' => __( 'Gives you the RGBA color, Secondery color overlay (Default: #1d1b1c).', 'patron' ),
                'default'  => array(
                    'color' => '#1d1b1c',
                    'alpha' => '.8'
                ),
                'mode'     => 'background',
            ),
			array(
                'id'       => 'ot-overlay-rgba4',
                'type'     => 'color_rgba',
                'title'    => __( 'Slider Overlay', 'patron' ),
				'output'   => array(
					'background-color'	=> '.carousel-inner .item::before',
				),
                'subtitle' => __( 'Gives you the RGBA color, Secondery color overlay (Default: #030d26).', 'patron' ),
                'default'  => array(
                    'color' => '#030d26',
                    'alpha' => '.8'
                ),
                'mode'     => 'background',
            ),
		)
	));
	
	
	
	// Error Page Settings
	Redux::setSection( $opt_name, array(
        'title'     => esc_html__( '404 Page Settings', 'patron' ),
        'id'        => 'error-page-settings',
		'icon' 		=> 'el-icon-graph',
		'fields'     => array(
			array(
                'id' => '404_page_title',
                'type' => 'text',
                'title' => esc_html__('Page Title', 'patron'),
                'subtitle' => esc_html__('Page title with banner', 'patron'),
                'desc' => esc_html__('Page title', 'patron'),
                'default' => '404'
            ),
			array(
                'id' => '404_title',
                'type' => 'text',
                'title' => esc_html__('404 Headline', 'patron'),
                'subtitle' => esc_html__('404 page message', 'patron'),
                'desc' => esc_html__('404 Title', 'patron'),
                'default' => '404 Page not found'
            ),
			array(
                'id' => '404_content',
                'type' => 'editor',
                'title' => esc_html__('404 Content', 'patron'),
                'subtitle' => esc_html__('Enter 404 Content', 'patron'),
                'desc' => esc_html__('404 Content', 'patron'),
                'default' => 'The page you are looking for dosen’t exist or another error occourd go back to home or another source.'
            ),
			array(
                'id' => 'back_404',
                'type' => 'text',
                'title' => esc_html__('Button Back Home', 'patron'),                        
                'desc' => esc_html__('Text Button Go To Home.', 'patron'),
                'subtitle' => esc_html__('Button Back Home', 'patron'),
                'default' => 'Return To Home',
            ),
		),
    ) );
	
	
	
	// Theme Typography
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Typography', 'patron' ),
        'id'     => 'theme-typography',
        'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'       => 'pt-typography-body',
                'type'     => 'typography',
                'title'    => __( 'Body Font', 'patron' ),
				'output' => array('body'),
                'subtitle' => __( 'Specify the body font properties.', 'patron' ),
                'google'   => true,
				'line-height' => false,
				'units'       =>'px',
                'default'  => array(
                    'color'       => '',
                    'font-size'   => '',
                    'font-family' => '',
                    'font-weight' => ''
                ),
            ),
			array(
                'id'       => 'pt-typography-headline',
                'type'     => 'typography',
                'title'    => __( 'Headline Font', 'patron' ),
				'output' => array('h1, h2, h3, h4, h5, h6'),
                'subtitle' => __( 'Specify the body font properties.', 'patron' ),
                'google'   => true,
				'text-transform'	=>	true,
				'text-align'	=> false,
				'line-height'	=> false,
				'font-size'	=> false,
				'color'		=> false,
				'units'       =>'px',
                'default'  => array(
                    'font-family' => '',
					'text-transform' => '',
                    'font-weight' => ''
                ),
            ),
            array(
                'id'          => 'pt-typography-paragraph',
                'type'        => 'typography',
                'title'       => __( 'Pragraph Font', 'patron' ),
                'output'      => array( 'p' ),
                'units'       => 'px',
				'google'      => true,
				'line-heigh'  => false,
				'font-size'	  => false,
				'color'	      => false,
				'text-align'  => false,
                'subtitle'    => __( 'Typography option with each property can be called individually.', 'patron' ),
                'default'     => array(
                    'font-style'  => '',
                    'font-family' => '',
					'line-height' => ''
                ),
            ),
        )
    ) );
	
	

    // -> START Slider / Spinner
    Redux::setSection( $opt_name, array(
        'title' => __( 'Slider / Spinner', 'patron' ),
        'id'    => 'slider_spinner',
        'desc'  => __( '', 'patron' ),
        'icon'  => 'el el-adjust-alt'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Slider', 'patron' ),
        'id'         => 'slider_spinner-slider',
        'desc'       => __( 'For full documentation on this field, visit: ', 'patron' ) . '<a href="//docs.reduxframework.com/core/fields/slider/" target="_blank">docs.reduxframework.com/core/fields/slider/</a>',
        'fields'     => array(

            array(
                'id'            => 'opt-slider-label',
                'type'          => 'slider',
                'title'         => __( 'Slider Example 1', 'patron' ),
                'subtitle'      => __( 'This slider displays the value as a label.', 'patron' ),
                'desc'          => __( 'Slider description. Min: 1, max: 500, step: 1, default value: 250', 'patron' ),
                'default'       => 250,
                'min'           => 1,
                'step'          => 1,
                'max'           => 500,
                'display_value' => 'label'
            ),
            array(
                'id'            => 'opt-slider-text',
                'type'          => 'slider',
                'title'         => __( 'Slider Example 2 with Steps (5)', 'patron' ),
                'subtitle'      => __( 'This example displays the value in a text box', 'patron' ),
                'desc'          => __( 'Slider description. Min: 0, max: 300, step: 5, default value: 75', 'patron' ),
                'default'       => 75,
                'min'           => 0,
                'step'          => 5,
                'max'           => 300,
                'display_value' => 'text'
            ),
            array(
                'id'            => 'opt-slider-select',
                'type'          => 'slider',
                'title'         => __( 'Slider Example 3 with two sliders', 'patron' ),
                'subtitle'      => __( 'This example displays the values in select boxes', 'patron' ),
                'desc'          => __( 'Slider description. Min: 0, max: 500, step: 5, slider 1 default value: 100, slider 2 default value: 300', 'patron' ),
                'default'       => array(
                    1 => 100,
                    2 => 300,
                ),
                'min'           => 0,
                'step'          => 5,
                'max'           => '500',
                'display_value' => 'select',
                'handles'       => 2,
            ),
            array(
                'id'            => 'opt-slider-float',
                'type'          => 'slider',
                'title'         => __( 'Slider Example 4 with float values', 'patron' ),
                'subtitle'      => __( 'This example displays float values', 'patron' ),
                'desc'          => __( 'Slider description. Min: 0, max: 1, step: .1, default value: .5', 'patron' ),
                'default'       => .5,
                'min'           => 0,
                'step'          => .1,
                'max'           => 1,
                'resolution'    => 0.1,
                'display_value' => 'text'
            ),

        ),
        'subsection' => true,
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Spinner', 'patron' ),
        'id'         => 'slider_spinner-spinner',
        'desc'       => __( 'For full documentation on this field, visit: ', 'patron' ) . '<a href="//docs.reduxframework.com/core/fields/spinner/" target="_blank">docs.reduxframework.com/core/fields/spinner/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'      => 'opt-spinner',
                'type'    => 'spinner',
                'title'   => __( 'JQuery UI Spinner Example 1', 'patron' ),
                'desc'    => __( 'JQuery UI spinner description. Min:20, max: 100, step:20, default value: 40', 'patron' ),
                'default' => '40',
                'min'     => '20',
                'step'    => '20',
                'max'     => '100',
            ),
        )
    ) );



    // -> START Required
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Field Required / Linking', 'patron' ),
        'id'         => 'required',
        'desc'       => __( 'For full documentation on validation, visit: ', 'patron' ) . '<a href="//docs.reduxframework.com/core/the-basics/required/" target="_blank">docs.reduxframework.com/core/the-basics/required/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-required-basic',
                'type'     => 'switch',
                'title'    => 'Basic Required Example',
                'subtitle' => 'Click <code>On</code> to see the text field appear.',
                'default'  => false
            ),
            array(
                'id'       => 'opt-required-basic-text',
                'type'     => 'text',
                'title'    => 'Basic Text Field',
                'subtitle' => 'This text field is only show when the above switch is set to <code>On</code>, using the <code>required</code> argument.',
                'required' => array( 'opt-required-basic', '=', true )
            ),
            array(
                'id'   => 'opt-required-divide-1',
                'type' => 'divide'
            ),
            array(
                'id'       => 'opt-required-nested',
                'type'     => 'switch',
                'title'    => 'Nested Required Example',
                'subtitle' => 'Click <code>On</code> to see another set of options appear.',
                'default'  => false
            ),
            array(
                'id'       => 'opt-required-nested-buttonset',
                'type'     => 'button_set',
                'title'    => 'Multiple Nested Required Examples',
                'subtitle' => 'Click any buton to show different fields based on their <code>required</code> statements.',
                'options'  => array(
                    'button-text'     => 'Show Text Field',
                    'button-textarea' => 'Show Textarea Field',
                    'button-editor'   => 'Show WP Editor',
                    'button-ace'      => 'Show ACE Editor'
                ),
                'required' => array( 'opt-required-nested', '=', true ),
                'default'  => 'button-text'
            ),
            array(
                'id'       => 'opt-required-nested-text',
                'type'     => 'text',
                'title'    => 'Nested Text Field',
                'required' => array( 'opt-required-nested-buttonset', '=', 'button-text' )
            ),
            array(
                'id'       => 'opt-required-nested-textarea',
                'type'     => 'textarea',
                'title'    => 'Nested Textarea Field',
                'required' => array( 'opt-required-nested-buttonset', '=', 'button-textarea' )
            ),
            array(
                'id'       => 'opt-required-nested-editor',
                'type'     => 'editor',
                'title'    => 'Nested Editor Field',
                'required' => array( 'opt-required-nested-buttonset', '=', 'button-editor' )
            ),
            array(
                'id'       => 'opt-required-nested-ace',
                'type'     => 'ace_editor',
                'title'    => 'Nested ACE Editor Field',
                'required' => array( 'opt-required-nested-buttonset', '=', 'button-ace' )
            ),
            array(
                'id'   => 'opt-required-divide-2',
                'type' => 'divide'
            ),
            array(
                'id'       => 'opt-required-select',
                'type'     => 'select',
                'title'    => 'Select Required Example',
                'subtitle' => 'Select a different option to display its value.  Required may be used to display multiple & reusable fields',
                'options'  => array(
                    'no-sidebar'    => 'No Sidebars',
                    'left-sidebar'  => 'Left Sidebar',
                    'right-sidebar' => 'Right Sidebar',
                    'both-sidebars' => 'Both Sidebars'
                ),
                'default'  => 'no-sidebar',
                'select2'  => array( 'allowClear' => false )
            ),
            array(
                'id'       => 'opt-required-select-left-sidebar',
                'type'     => 'select',
                'title'    => 'Select Left Sidebar',
                'data'     => 'sidebars',
                'default'  => '',
                'required' => array( 'opt-required-select', '=', array( 'left-sidebar', 'both-sidebars' ) )
            ),
            array(
                'id'       => 'opt-required-select-right-sidebar',
                'type'     => 'select',
                'title'    => 'Select Right Sidebar',
                'data'     => 'sidebars',
                'default'  => '',
                'required' => array( 'opt-required-select', '=', array( 'right-sidebar', 'both-sidebars' ) )
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'WPML Integration', 'patron' ),
        'desc'       => __( 'These fields can be fully translated by WPML (WordPress Multi-Language). This serves as an example for you to implement. For extra details look at our <a href="//docs.reduxframework.com/core/advanced/wpml-integration/" target="_blank">WPML Implementation</a> documentation.', 'patron' ),
        'subsection' => true,
        // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
        'fields'     => array(
            array(
                'id'    => 'wpml-text',
                'type'  => 'textarea',
                'title' => __( 'WPML Text', 'patron' ),
                'desc'  => __( 'This string can be translated via WPML.', 'patron' ),
            ),
            array(
                'id'      => 'wpml-multicheck',
                'type'    => 'checkbox',
                'title'   => __( 'WPML Multi Checkbox', 'patron' ),
                'desc'    => __( 'You can literally translate the values via key.', 'patron' ),
                //Must provide key => value pairs for multi checkbox options
                'options' => array(
                    '1' => 'Option 1',
                    '2' => 'Option 2',
                    '3' => 'Option 3'
                ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'icon'            => 'el el-list-alt',
        'title'           => __( 'Customizer Only', 'patron' ),
        'desc'            => __( '<p class="description">This Section should be visible only in Customizer</p>', 'patron' ),
        'customizer_only' => true,
        'fields'          => array(
            array(
                'id'              => 'opt-customizer-only',
                'type'            => 'select',
                'title'           => __( 'Customizer Only Option', 'patron' ),
                'subtitle'        => __( 'The subtitle is NOT visible in customizer', 'patron' ),
                'desc'            => __( 'The field desc is NOT visible in customizer.', 'patron' ),
                'customizer_only' => true,
                //Must provide key => value pairs for select options
                'options'         => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                'default'         => '2'
            ),
        )
    ) );

    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'patron' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'patron' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'patron' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

