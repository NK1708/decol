<?php
	
	global $patron_option;
/**
 * Redux Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package patron
 */

if ( ! class_exists( 'ReduxFramewrk' ) ) {
    require_once( get_template_directory() . '/inc/sample-config.php' );
    function removeDemoModeLink() { // Be sure to rename this function to something more unique
        if ( class_exists('ReduxFrameworkPlugin') ) {
            remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
        }
        if ( class_exists('ReduxFrameworkPlugin') ) {
            remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
        }
    }
    add_action('init', 'removeDemoModeLink');
}


	
//Theme Set up:
add_action( 'after_setup_theme', 'patron_theme_setup' );
function patron_theme_setup(){
	
	/** Set Content width **/
    if ( ! isset( $content_width ) ) {
        $content_width = 900;
    }

	
	/*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on cubic, use a find and replace
     * to change 'cubic' to the name of your theme in all the template files
     */
	load_theme_textdomain( 'patron', get_template_directory() . '/languages' );
	
	/*
     * This theme uses a custom image size for featured images, displayed on
     * "standard" posts and pages.
     */
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	
	 // Add Image Size Function customize image    
	add_image_size( 'pt-thumb-tall', 370, 450, true ); // 370 pixels width by 430 pixels height
	add_image_size( 'pt-thumb-blog', 770, 390, true ); // 370 pixels width by 430 pixels height
	add_image_size( 'pt-thumb-medium', 370, 220, true ); // 370 pixels width by 430 pixels height
	
	
	// Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );
	
	/*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );
	
	/*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
	
	
	//Post formats
    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ) );
	
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => esc_html__('Primary Menu', 'patron'),
		'footer-menu'   => esc_html__('Footer Menu', 'patron'),
		'top-menu'   => esc_html__('Top Menu', 'patron'),
		'sidebar-nav' => esc_html__('Sidebar Nav', 'patron'),
		'service-menu'	=>	esc_html__('Service Links', 'patron'),
	));	
}


// add excerpt in pages 
add_action( 'init', 'patron_add_excerpts_to_pages' );
function patron_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

//Register style for WP admin panel
add_action( 'admin_enqueue_scripts', 'patron_wp_admin_styles' );
function patron_wp_admin_styles() {
    wp_register_style( 'admin_style', get_theme_file_uri( '/inc/admin/css/admin_style.css') );
    wp_enqueue_style( 'admin_style' );
}

//Register Widget Init
add_action( 'widgets_init', 'patron_widget_init' );
function patron_widget_init(){
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'patron' ),
			'id'            => 'blog-sidebar',        
			'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'patron' ),        
			'before_widget' => '<div id="%1$s" class="widget %2$s margin-bottom-50">',        
			'after_widget'  => '</div>',        
			'before_title'  => '<h5 class="inner-title">',        
			'after_title'   => '</h5>'
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Service Sidebar', 'patron' ),
			'id'            => 'service-sidebar',        
			'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'patron' ),        
			'before_widget' => '<div id="%1$s" class="widget %2$s margin-top-30">',        
			'after_widget'  => '</div>',        
			'before_title'  => '<h5 class="inner-title">',        
			'after_title'   => '</h5>'
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Shop Sidebar', 'patron' ),
			'id'            => 'shop-sidebar',        
			'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'patron' ),        
			'before_widget' => '<div id="%1$s" class="widget %2$s margin-bottom-30 bg-gray padding20">',        
			'after_widget'  => '</div>',        
			'before_title'  => '<h5 class="inner-title">',        
			'after_title'   => '</h5>'
		)
	);
	register_sidebar( array(
			'name'          => esc_html__( 'Footer First Widget Area', 'patron' ),
			'id'            => 'footer-area-1',
			'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'patron' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) 
	);
	register_sidebar( array(
			'name'          => esc_html__( 'Footer Second Widget Area', 'patron' ),
			'id'            => 'footer-area-2',
			'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'patron' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) 
	);
	register_sidebar( array(
			'name'          => esc_html__( 'Footer Third Widget Area', 'patron' ),
			'id'            => 'footer-area-3',
			'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'patron' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) 
	);
	register_sidebar( array(
			'name'          => esc_html__( 'Footer Fourth Widget Area', 'patron' ),
			'id'            => 'footer-area-4',
			'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'patron' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) 
	);
}


// Register custom fonts.

function patron_theme_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $oswald = _x( 'on', 'Oswald font: on or off', 'patron' ); 

    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $dosis = _x( 'on', 'Dosis font: on or off', 'patron' );

    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $montserrat = _x( 'on', 'Montserrat font: on or off', 'patron' ); 

    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'patron' );

    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $pt_sans = _x( 'on', 'PT+Sans font: on or off', 'patron' ); 

    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $raleway = _x( 'on', 'Raleway font: on or off', 'patron' ); 
    
    $font_families = array();
	
	if ( 'off' !== $oswald ) {
        $font_families[] = 'Oswald:200,300,400,500,600,700,800';
    }  
	
    if ( 'off' !== $dosis ) {
        $font_families[] = 'Dosis:200,300,400,500,600,700,800';
    }

    if ( 'off' !== $montserrat ) {
        $font_families[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
    }

    if ( 'off' !== $open_sans ) {
        $font_families[] = 'Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i';
    }

    if ( 'off' !== $pt_sans ) {
        $font_families[] = 'PT+Sans:400,400i,700,700i';
    } 

    if ( 'off' !== $raleway ) {
        $font_families[] = 'Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
    }           

    $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
        'subset' => urlencode( 'cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese' ),
    );

    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

    return esc_url_raw( $fonts_url );
}


// Enqueue scripts and styles.
add_action( 'wp_enqueue_scripts', 'patron_scripts' );
function patron_scripts(){
	global $patron_option;
	$protocol = is_ssl() ? 'https' : 'http';
    $gmap_api = $patron_option['gmap_api'];
	
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'patron-fonts', patron_theme_fonts_url(), array(), null );
	
	// Theme stylesheet.
	wp_enqueue_style( 'paron-style', get_stylesheet_uri() );
	
	// Load Theme Styles
	wp_enqueue_style( 'bootstrap', get_theme_file_uri('/css/bootstrap.min.css'), array(), '3.3.7' );
	
	wp_enqueue_style( 'font-awesome', get_theme_file_uri('/css/font-awesome.min.css'), array(), '4.7.0' );
	
	wp_enqueue_style( 'custom-style', get_theme_file_uri('/css/style.css'), array('paron-style'), '1.0' );
	
	wp_enqueue_style( 'animation-min', get_theme_file_uri('/css/animate.min.css'), array(), '3.5.0' );
	
	wp_enqueue_style( 'fancybox', get_theme_file_uri('/css/jquery.fancybox.min.css'), array(), '3.2.10' );
	
	wp_enqueue_style( 'owl', get_theme_file_uri('/css/owl.css'), array(), '2.0.0' );
	
	wp_enqueue_style( 'default-animation', get_theme_file_uri('/css/default-animation.css'), array('paron-style'), '1.0' );
	
	wp_enqueue_style( 'flaticon', get_theme_file_uri('/fonts/flaticon/flaticon.css'), array(), '1.0' );
	
	wp_enqueue_style( 'range-slide', get_theme_file_uri('/css/range-slider.css'), array(), '1.0' );

	wp_enqueue_style( 'patron-responsive', get_theme_file_uri('/css/responsive.css'), array('paron-style'), '1.0' );
	
	if($patron_option['preload-switch']!= false){
		wp_enqueue_style( 'patron-loder', get_theme_file_uri('/css/loader.css'), array('paron-style'), '1.0' );
	}
	
	/** Js for comment on single post **/    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
	
	
	//all jquery scripts
	
	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri('/js/bootstrap.min.js'), array('jquery'), '3.3.0', false);
	
	wp_enqueue_script( 'YouTubePopUp', get_theme_file_uri('/js/YouTubePopUp.jquery.js'), array('jquery'), '1.0', true);
	
	wp_enqueue_script( 'fancyBox', get_theme_file_uri('/js/jquery.fancybox.min.js'), array('jquery'), '3.2.10', true);
	
	wp_enqueue_script( 'owl-carousel', get_theme_file_uri('/js/owl.js'), array('jquery'), '2.0.0', true);
	
	wp_enqueue_script( 'mixitup', get_theme_file_uri('/js/mixitup.js'), array('jquery'), '2.1.10', true);
	
	wp_enqueue_script( 'validation', get_theme_file_uri('/js/validate.js'), array('jquery'), '1.11.0', true);
	
	wp_enqueue_script( 'wow', get_theme_file_uri('/js/wow.js'), array('jquery'), '1.0.1', true);
	
	wp_enqueue_script( 'custom', get_theme_file_uri('/js/custom.js'), array('jquery'), '1.0', true);
	
	// Set map API
	if($gmap_api != ''){
		wp_enqueue_script( 'jquery-map', "$protocol://maps.googleapis.com/maps/api/js?key=$gmap_api", array(), '1.0', false);
	}
	
	if( is_active_widget(false, false, ('newsletter_widget'), true ) ){
		wp_enqueue_script( 'mc-validate', "$protocol://s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js", array('jquery'), null, true);
	}
}

/**
 * Add color styling from theme
 */
function patron_wpdocs_styles_method() {
	
	wp_enqueue_style( 
		'color-settings', 
		get_template_directory_uri() . '/css/color.css' 
	);
	
	$custom_css = patron_custom_color_style();
	
	wp_add_inline_style( 'color-settings', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'patron_wpdocs_styles_method' );


//Change Gallery Icon
function patron_change_gallery_icon_args($args){
	$args['menu_icon'] = 'dashicons-format-gallery';
	return $args;
}
add_filter('pt_gallery_type_args', 'patron_change_gallery_icon_args');



// Custom Visual Composer template vc_templates
require get_template_directory() . '/inc/custom-visual-option-shortcode.php';

// Page location navigation, right of the banner
require get_template_directory() . '/inc/wp-dimox-breadcrumbs.php';

// All aditional theme functions
require get_template_directory() . '/inc/theme-functions.php';

// Custom Color Settings style
require get_template_directory() . '/inc/color.php';

// VC Option shortcodes for custom element
require get_template_directory() . '/inc/vc_shortcodes.php';

// VC Custom element, active element with shortcodes
require get_template_directory() . '/inc/vc_custom_elements.php';

// Customizer menu item
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

// Implement the Custom Meta Boxs.
require get_template_directory() . '/inc/meta-boxes.php';

// Includer widgets
require get_template_directory() . '/inc/widgets.php';

// Plugin require
require get_template_directory() . '/inc/plugin-activation.php';

// Demo import functions
require get_template_directory() . '/inc/demo-import.php';

// Woocommerce Functions
require get_template_directory() . '/inc/woocommerce-customize.php';

// Woocommerce Product Per page settings
require get_template_directory() . '/inc/woo_product_filter/woocommerce-products-per-page.php';


	
?>