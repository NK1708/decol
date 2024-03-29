<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
function my_theme_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
	
		array(
            'name'               => esc_html__('Meta Box', 'patron'),
            'slug'               => 'meta-box',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false
        ),
		array(
            'name'      		 => esc_html__('Redux Framework', 'patron'),
            'slug'      		 => 'redux-framework',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false
        ),
		array(
            'name'               => esc_html__('Contact Form 7', 'patron'),
            'slug'               => 'contact-form-7',
            'required'           => true
        ),
		array(
            'name'               => esc_html__('Woocommerce', 'patron'),
            'slug'               => 'woocommerce',
            'required'           => false
        ),		
        array(
            'name'               => esc_html__('WPBakery Visual Composer', 'patron'), 
			'slug'               => 'js_composer',
            'source'             => get_stylesheet_directory(). '/inc/plugins/js_composer.zip',
            'version'            => '5.4.7',
            'force_activation'   => false,
            'force_deactivation' => false
        ),
		array(            
            'name'               => esc_html__('One Click Demo Import', 'patron'),
            'slug'               => 'one-click-demo-import',
            'source'             => get_stylesheet_directory(). '/inc/plugins/one-click-demo-import.zip',
            'required'           => false,
			'version'            => '2.5.0', 
            'force_activation'   => false,
            'force_deactivation' => false
        ),
		array(            
            'name'               => esc_html__('OT Gallery', 'patron'),
            'slug'               => 'ot_gallery',
            'source'             => get_stylesheet_directory(). '/inc/plugins/ot_gallery.zip',
            'required'           => false, 
			'version'            => '1.0',
            'force_activation'   => false,
            'force_deactivation' => false
        ),
		array(            
            'name'               => esc_html__('OT Services', 'patron'), 
            'slug'               => 'ot_service', 
            'source'             => get_stylesheet_directory(). '/inc/plugins/ot_service.zip',
            'required'           => false, 
			'version'            => '1.0',
            'force_activation'   => false,
            'force_deactivation' => false
        ),
		array(            
            'name'               => esc_html__('OT Slider', 'patron'), 
            'slug'               => 'ot_slider', 
            'source'             => get_stylesheet_directory(). '/inc/plugins/ot_slider.zip',
            'required'           => false, 
			'version'            => '1.0', 
            'force_activation'   => false,
            'force_deactivation' => false
        ),
		array(            
            'name'               => esc_html__('OT Team', 'patron'), 
            'slug'               => 'ot_team', 
            'source'             => get_stylesheet_directory(). '/inc/plugins/ot_team.zip',
            'required'           => false, 
			'version'            => '1.0', 
            'force_activation'   => false,
            'force_deactivation' => false
        ),
		array(            
            'name'               => esc_html__('OT Testimonial', 'patron'), 
            'slug'               => 'ot_testimonial', 
            'source'             => get_stylesheet_directory(). '/inc/plugins/ot_testimonial.zip',
            'required'           => false,
			'version'            => '1.0', 
            'force_activation'   => false,
            'force_deactivation' => false
        ),
	);


	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
