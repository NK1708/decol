<?php
/*
	Plugin Name: OT Services
	Plugin URI: http://unicoderbd.com/
	Description: Declares a plugin that will create a custom post type displaying Services.
	Version: 1.0
	Author: Unicoder
	Author URI: http://unicoderbd.com/
	Text Domain: ot-service
	Domain Path: /lang
	License: GPLv2 or later
*/

//Exir if access directly
if(!defined('ABSPATH')){
	exit;
}

define( 'SERVICE__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/* UPDATE 
  register_activation_hook is not called when a plugin is updated
  so we need to use the following function 
*/
function ot_service_update() {
	load_plugin_textdomain('ot-service', FALSE, dirname(plugin_basename(__FILE__)) . '/lang/');
}
add_action('plugins_loaded', 'ot_service_update');


// register service post plugin and add option
function register_ot_service(){
	
	$service_singular = apply_filters('pt_service_label_singlular', 'Service');
	$service_plural = apply_filters('pt_services_label_plural', 'Services');
	$slug = __( 'all_services', 'ot-service' );
	
	$labels = array( 
        'name' 					=> __( 'All ' .$service_plural, 'ot-service' ),
        'singular_name' 		=> 	'Service',
        'add_new' 				=> __( 'Add New Service', 'ot-service' ),
        'add_new_item' 			=> __( 'Add New ' .$service_singular, 'ot-service' ),
        'edit_item' 			=> __( 'Edit ' .$service_singular, ' ot-service' ),
        'new_item' 				=> __( 'Add New', 'ot-service' ),
		'all_items' 			=> __( 'All ' .$service_plural,'ot-service' ),
        'view_item' 			=> __( 'View Item', 'ot-service' ),
        'search_items' 			=> __( 'Search Item', 'ot-service' ),
        'not_found' 			=> __( 'No ' .$service_singular. ' Items found..', 'ot-service' ),
        'not_found_in_trash' 	=> __( 'No ' .$service_singular. ' Items found in Trash', 'ot-service' ),
        'parent_item_colon' 	=> __( 'Parent Item:', 'ot-service' ),
        'menu_name' 			=> __( $service_plural, 'ot-service' ),
    );
	
	$args = apply_filters('pt_service_type_args', array( 
        'labels' 				=> $labels,
        'hierarchical' 			=> false,
        'description' 			=> __( $service_singular.' List', 'ot-service' ),
        'supports' 				=> array( 'title', 'editor', 'thumbnail', 'page-attributes', 'comments', 'post-formats', 'excerpt', 'custom-fields' ),
        'public' 				=> true,
        'show_ui' 				=> true,
        'show_in_menu' 			=> true,
        'menu_position' 		=> 31,
        'menu_icon' 			=> 'dashicons-admin-tools',
        'show_in_nav_menus' 	=> true,
		'show_in_admin_bar'   	=> false,
        'publicly_queryable' 	=> true,
        'exclude_from_search' 	=> false,
        'has_archive' 			=> true,
        'query_var' 			=> true,
        'can_export' 			=> true,
        'rewrite' 				=> array( 'slug' => $slug ), //In Permalink Settings page
        'capability_type' 		=> 'post',
    ));
    register_post_type( 'service', $args );
}
add_action( 'init', 'register_ot_service' );

//Create custom taxonomy for category option
function create_service_category_taxonomy (){
	
	
	// Add new taxonomy labels
	$labels = array(
		'name' 					=> __( 'Categories', 'ot-service' ),
		'singular_name' 		=> __( 'Category', 'ot-service' ),
		'search_items' 			=> __( 'Search Category','ot-service' ),
		'all_items' 			=> __( 'All Category','ot-service' ),
		'parent_item'	 		=> __( 'Parent Category','ot-service' ),
		'parent_item_colon' 	=> __( 'Parent Category:','ot-service' ),
		'edit_item' 			=> __( 'Edit Category','ot-service' ), 
		'update_item' 			=> __( 'Update Category','ot-service' ),
		'add_new_item' 			=> __( 'Add New Category','ot-service' ),
		'new_item_name' 		=> __( 'New Category Name','ot-service' ),
		'menu_name' 			=> __( 'Category','ot-service' ),
	);
	
	// Now register the taxonomy
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'show_in_admin_bar' => false,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array( 'slug' => __( 'categories', 'ot-service' ) ), //In Permalink Settings page
	);
	
	register_taxonomy('service_category', 'service', $args);
}
add_action('init', 'create_service_category_taxonomy', 0);

//Create custom taxonomy for Tag option
function create_service_tag_taxonomy(){
	
	
	// Add new taxonomy labels
	$labels = array(
		'name' => __( 'Tags', 'ot-service' ),
		'singular_name' => __( 'Tag', 'ot-service' ),
		'search_items' =>  __( 'Search Tag', 'ot-service' ),
		'all_items' => __( 'All Tags', 'ot-service' ),
		'parent_item' => __( 'Parent Tag','ot-service' ),
		'parent_item_colon' => __( 'Parent Tag:','ot-service' ),
		'edit_item' => __( 'Edit Tag','ot-service' ), 
		'update_item' => __( 'Update Tag','ot-service' ),
		'add_new_item' => __( 'Add New Tag','ot-service' ),
		'new_item_name' => __( 'New Tag Name','ot-service' ),
		'menu_name' => __( 'Tags','ot-service' ),
	);
	
	// Now register the taxonomy
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'show_in_admin_bar' => false,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array( 'slug' => __( 'tags', 'ot-service' ) ), //In Permalink Settings page
	);
	
	register_taxonomy('service_tags', 'service', $args);
}
add_action('init', 'create_service_tag_taxonomy', 0);

// All aditional theme functions
require_once( SERVICE__PLUGIN_DIR . 'post-column.php' );
require_once( SERVICE__PLUGIN_DIR . 'custom-field-meta.php' );

?>