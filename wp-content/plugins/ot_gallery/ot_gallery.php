<?php
/*
	Plugin Name: OT Gallery
	Plugin URI: http://unicoderbd.com/
	Description: Declares a plugin that will create a custom post type displaying Gallery or Portfolio.
	Version: 1.0
	Author: Unicoder
	Author URI: http://unicoderbd.com/
	Text Domain: ot-gallery
	Domain Path: /lang
	License: GPLv2 or later
*/


//Exir if access directly
if(!defined('ABSPATH')){
	exit;
}

define( 'GALLERY__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/* UPDATE 
  register_activation_hook is not called when a plugin is updated
  so we need to use the following function 
*/
function ot_gallery_update() {
	load_plugin_textdomain('ot-gallery', FALSE, dirname(plugin_basename(__FILE__)) . '/lang/');
}
add_action('plugins_loaded', 'ot_gallery_update');


// register gallery plugin and add option
function register_ot_gallery(){
	
	$gallery_name = apply_filters('pt_gallery_label', 'Gallery');
	$slug = __( 'all_gallery', 'ot-gallery' );
	
	$labels = array( 
        'name' 					=> __( 'All ' .$gallery_name. ' Items', 'ot-gallery' ),
        'singular_name' 		=> 	'Gallery',
        'add_new' 				=> __( 'Add New Item', 'ot-gallery' ),
        'add_new_item' 			=> __( 'Add New ' .$gallery_name. ' Item', 'ot-gallery' ),
        'edit_item' 			=> __( 'Edit ' .$gallery_name, ' ot-gallery' ),
        'new_item' 				=> __( 'Add New', 'ot-gallery' ),
		'all_items' 			=> __('All ' .$gallery_name. ' Items','ot-gallery'),
        'view_item' 			=> __( 'View Item', 'ot-gallery' ),
        'search_items' 			=> __( 'Search Item', 'ot-gallery' ),
        'not_found' 			=> __( 'No ' .$gallery_name. ' Items found..', 'ot-gallery' ),
        'not_found_in_trash' 	=> __( 'No ' .$gallery_name. ' Items found in Trash', 'ot-gallery' ),
        'parent_item_colon' 	=> __( 'Parent Item:', 'ot-gallery' ),
        'menu_name' 			=> __( $gallery_name, 'ot-gallery' ),
    );
	
	$args = apply_filters('pt_gallery_type_args', array( 
        'labels' 				=> $labels,
        'hierarchical' 			=> false,
        'description' 			=> __( $gallery_name.' List', 'ot-gallery' ),
        'supports' 				=> array( 'title', 'editor', 'thumbnail', 'comments', 'post-formats', 'excerpt', 'custom-fields' ),
        'public' 				=> true,
        'show_ui' 				=> true,
        'show_in_menu' 			=> true,
        'menu_position' 		=> 30,
        'menu_icon' 			=> 'dashicons-format-image',
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
    register_post_type( 'gallery', $args );
}
add_action( 'init', 'register_ot_gallery' );


//Create custom taxonomy for category option
function create_gallery_category_taxonomy (){
	
	
	// Add new taxonomy labels
	$labels = array(
		'name' 					=> __( 'Categories', 'ot-gallery' ),
		'singular_name' 		=> __( 'Category', 'ot-gallery' ),
		'search_items' 			=> __( 'Search Category', 'ot-gallery' ),
		'all_items' 			=> __( 'All Categories','ot-gallery' ),
		'parent_item'	 		=> __( 'Parent Category','ot-gallery' ),
		'parent_item_colon' 	=> __( 'Parent Category:','ot-gallery' ),
		'edit_item' 			=> __( 'Edit Category','ot-gallery' ), 
		'update_item' 			=> __( 'Update Category','ot-gallery' ),
		'add_new_item' 			=> __( 'Add New Category','ot-gallery' ),
		'new_item_name' 		=> __( 'New Category Name','ot-gallery' ),
		'menu_name' 			=> __( 'Category','ot-gallery' ),
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
		'rewrite' => array( 'slug' => __( 'categories', 'ot-gallery' ) ), //In Permalink Settings page
	);
	
	register_taxonomy('gallery_category', 'gallery', $args);
}
add_action('init', 'create_gallery_category_taxonomy', 0);


//Create custom taxonomy for Tag option
function create_gallery_tag_taxonomy(){
	
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
		'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'show_in_admin_bar' => false,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array( 'slug' => __( 'tags', 'ot-gallery' ) ), //In Permalink Settings page
	);
	
	register_taxonomy('gallery_tags', 'gallery', $args);
}
add_action('init', 'create_gallery_tag_taxonomy', 0);



// All aditional theme functions
require_once( GALLERY__PLUGIN_DIR . 'post-column.php' );
	
?>