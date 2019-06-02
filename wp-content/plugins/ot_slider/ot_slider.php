<?php
/*
	Plugin Name: OT Slider
	Plugin URI: http://unicoderbd.com/
	Description: Declares a plugin that will create a custom post type displaying slider.
	Version: 1.0
	Author: Unicoder
	Author URI: http://unicoderbd.com/
	Text Domain: ot-slider
	Domain Path: /lang
	License: GPLv2 or later
*/


//Exir if access directly
if(!defined('ABSPATH')){
	exit;
}

define( 'SLIDER__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/* UPDATE 
  register_activation_hook is not called when a plugin is updated
  so we need to use the following function 
*/
function ot_slider_update() {
	load_plugin_textdomain('ot-slider', FALSE, dirname(plugin_basename(__FILE__)) . '/lang/');
}
add_action('plugins_loaded', 'ot_slider_update');


// register Default Slider as custom post plugin and add option
function register_ot_slider(){
	$singular = apply_filters('pt_slider_singlular', 'Slider');
	$plural = apply_filters('pt_slider_plural', 'Sliders');
	
	$slug = __( 'slider', 'ot-slider' );
	
	$labels = array( 
        'name' 					=> __( 'All ' .$plural, 'ot-slider' ),
        'singular_name' 		=> 	$singular,
        'add_new' 				=> __( 'Add New Slider', 'ot-slider' ),
        'add_new_item' 			=> __( 'Add New ' .$singular, 'ot-slider' ),
        'edit_item' 			=> __( 'Edit ' .$singular, ' ot-slider' ),
        'new_item' 				=> __( 'Add New', 'ot-slider' ),
		'all_items' 			=> __( 'All ' .$plural,'ot-slider' ),
        'view_item' 			=> __( 'View Item', 'ot-slider' ),
        'search_items' 			=> __( 'Search Item', 'ot-slider' ),
        'not_found' 			=> __( 'No ' .$singular. ' Items found..', 'ot-slider' ),
        'not_found_in_trash' 	=> __( 'No ' .$singular. ' Items found in Trash', 'ot-slider' ),
        'parent_item_colon' 	=> __( 'Parent Item:', 'ot-slider' ),
        'menu_name' 			=> __( 'Simple ' .$singular, 'ot-slider' ),
    );
	
	$args = apply_filters('pt_slider_type_args',array( 
        'labels' 				=> $labels,
        'hierarchical' 			=> true,
        'description' 			=> __( $singular.' List', 'ot-slider' ),
        'supports' 				=> array( 'title', 'thumbnail', 'page-attributes', 'comments', 'post-formats', 'custom-fields' ),
        'public' 				=> true,
        'show_ui' 				=> true,
        'show_in_menu' 			=> true,
        'menu_position' 		=> 37,
        'menu_icon' 			=> 'dashicons-media-code',
        'show_in_nav_menus' 	=> false,
		'show_in_admin_bar'   	=> false,
        'publicly_queryable' 	=> true,
        'exclude_from_search' 	=> false,
        'has_archive' 			=> true,
        'query_var' 			=> true,
        'can_export' 			=> true,
        'rewrite' 				=> array( 'slug' => $slug ), //In Permalink Settings page
        'capability_type' 		=> 'post'
    ));
    register_post_type( 'slider', $args );
}

add_action( 'init', 'register_ot_slider' );



//Create custom taxonomy for Tag option
function create_slider_tag_taxonomy(){
	
	
	// Add new taxonomy labels
	$labels = array(
		'name' => __( 'Tags', 'ot-gallery' ),
		'singular_name' => __( 'Tag', 'ot-gallery' ),
		'search_items' =>  __( 'Search Tag','ot-gallery' ),
		'all_items' => __( 'All Tags','ot-gallery' ),
		'parent_item' => __( 'Parent Tag','ot-gallery' ),
		'parent_item_colon' => __( 'Parent Tag:','ot-gallery' ),
		'edit_item' => __( 'Edit Tag','ot-gallery' ), 
		'update_item' => __( 'Update Tag','ot-gallery' ),
		'add_new_item' => __( 'Add New Tag','ot-gallery' ),
		'new_item_name' => __( 'New Tag Name','ot-gallery' ),
		'menu_name' => __( 'Tags','ot-gallery' ),
	);
	
	// Now register the taxonomy
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => false,
		'show_in_nav_menus' => false,
		'show_in_admin_bar' => false,
		'show_admin_column' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array( 'slug' => __( 'tags', 'ot-slider' ) ), //In Permalink Settings page
	);
	
	register_taxonomy('slider_tags', 'slider', $args);
}
add_action('init', 'create_slider_tag_taxonomy', 0);


// All aditional theme functions
require_once( SLIDER__PLUGIN_DIR . 'post-column.php' );
	
?>