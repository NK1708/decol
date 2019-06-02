<?php
/*
	Plugin Name: OT Testimonial
	Plugin URI: http://unicoderbd.com/
	Description: Declares a plugin that will create a custom post type displaying Testimonial.
	Version: 1.0
	Author: Unicoder
	Author URI: http://unicoderbd.com/
	Text Domain: ot-testimonial
	Domain Path: /lang
	License: GPLv2 or later
*/	


//Exir if access directly
if(!defined('ABSPATH')){
	exit;
}

define( 'TESTIMONIAL__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/* UPDATE 
  register_activation_hook is not called when a plugin is updated
  so we need to use the following function 
*/
function ot_testimonial_update() {
	load_plugin_textdomain('ot-testimonial', FALSE, dirname(plugin_basename(__FILE__)) . '/lang/');
}
add_action('plugins_loaded', 'ot_testimonial_update');


// register testimonial as custom post plugin and add option
function register_ot_testimonial (){
	$singular = apply_filters('pt_testimonial_singlular', 'Testimonial');
	$plural = apply_filters('pt_testimonial_plural', 'Testimonials');
	
	$slug = __( 'all_testimonial', 'ot-testimonial' );
	
	$labels = array( 
        'name' 					=> __( 'All ' .$plural, 'ot-testimonial' ),
        'singular_name' 		=> 	$singular,
        'add_new' 				=> __( 'Add New', 'ot-testimonial' ),
        'add_new_item' 			=> __( 'Add New ' .$singular, 'ot-testimonial' ),
        'edit_item' 			=> __( 'Edit ' .$singular, ' ot-testimonial' ),
        'new_item' 				=> __( 'Add New', 'ot-testimonial' ),
		'all_items' 			=> __( 'All ' .$plural,'ot-testimonial' ),
        'view_item' 			=> __( 'View Item', 'ot-testimonial' ),
        'search_items' 			=> __( 'Search Item', 'ot-testimonial' ),
        'not_found' 			=> __( 'No ' .$singular. ' Items found..', 'ot-testimonial' ),
        'not_found_in_trash' 	=> __( 'No ' .$singular. ' Items found in Trash', 'ot-testimonial' ),
        'parent_item_colon' 	=> __( 'Parent Item:', 'ot-testimonial' ),
        'menu_name' 			=> __( $plural, 'ot-testimonial' ),
    );
	
	$args = apply_filters('pt_testimonial_type_args',array( 
        'labels' 				=> $labels,
        'hierarchical' 			=> true,
        'description' 			=> __( $singular.' List', 'ot-testimonial' ),
        'supports' 				=> array( 'title', 'editor', 'thumbnail', 'page-attributes', 'comments', 'post-formats', 'excerpt', 'custom-fields' ),
        'public' 				=> true,
        'show_ui' 				=> true,
        'show_in_menu' 			=> true,
        'menu_position' 		=> 31,
        'menu_icon' 			=> 'dashicons-admin-comments',
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
    register_post_type( 'testimonial', $args );
}

add_action( 'init', 'register_ot_testimonial' );



//Create custom taxonomy for category option
function create_testimonial_category_taxonomy (){
	
	$singular = apply_filters('pt_service_label_singlular', 'Category');
	$plural = apply_filters('pt_service_label_plural', 'Categories');
	
	// Add new taxonomy labels
	$labels = array(
		'name' 					=> __( $plural, 'ot-testimonial' ),
		'singular_name' 		=> __( $singular, 'ot-testimonial' ),
		'search_items' 			=>  __( 'Search '.$singular,'ot-testimonial' ),
		'all_items' 			=> __( 'All '.$singular,'ot-testimonial' ),
		'parent_item'	 		=> __( 'Parent '.$singular,'ot-testimonial' ),
		'parent_item_colon' 	=> __( 'Parent '.$singular.':','ot-testimonial' ),
		'edit_item' 			=> __( 'Edit '.$singular,'ot-testimonial' ), 
		'update_item' 			=> __( 'Update '.$singular,'ot-testimonial' ),
		'add_new_item' 			=> __( 'Add New '.$singular,'ot-testimonial' ),
		'new_item_name' 		=> __( 'New '.$singular.' Name','ot-testimonial' ),
		'menu_name' 			=> __( $singular,'ot-testimonial' ),
	);
	
	// Now register the taxonomy
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' 	=> false,
		'show_in_admin_bar'   	=> false,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array( 'slug' => __( 'categories', 'ot-testimonial' ) ), //In Permalink Settings page
	);
	
	register_taxonomy('categories', 'testimonial', $args);
}
add_action('init', 'create_testimonial_category_taxonomy', 0);
	
?>