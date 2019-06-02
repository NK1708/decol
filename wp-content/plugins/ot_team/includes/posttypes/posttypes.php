<?php
/*
 *  Post Types Inialization
 */
	
    global $smof_data;

    //Portfolio Options
    $slug_team = isset($smof_data['slug_team']) ? esc_html(strtolower($smof_data['slug_team'])) : 'team';

	$por_arr = array(
		'menu_icon' =>'dashicons-portfolio',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
		'menu_position' => 37,
		'rewrite' 	=> array(
			'slug' => $slug_team
			),
		'capability_type' => 'post',
		);
	$por_tax_arr = array(
		"Categories"   => array( 
			'singular_name' => 'Category',
			'query_var' => 'team_cat',
			'rewrite' => array( 'slug' => 'member-category' ) 
		) 
	);

	$team = new Amazee_Post_Type('Team', 'Member', $por_arr);
	$team->taxonomies('Team', $por_tax_arr);


/*
 *  Manage Custom Post Type Columns
 */

//adding column to team posts type
add_filter( 'manage_edit-pix_team_columns', 'my_edit_pix_team_columns' ) ;

function my_edit_pix_team_columns( $columns ) {
	$new = array();
	foreach($columns as $key => $title) {
		if ($key=='title') // Put the Thumbnail column before the Author column
			$new['featured_image'] = 'Feature Thumb';
		$new[$key] = $title;
	}
	return $new;
}


// get featured image function
function pix_team_featured_image($post_id) {
	$post_thumbnail_id = get_post_thumbnail_id($post_id);
	if ($post_thumbnail_id) {
		$post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail');
		return $post_thumbnail_img[0];
	}
}

// show featured image in column
function my_manage_team_columns($column_name, $post_id) {
	if ($column_name == 'featured_image') {
		$post_featured_image = pix_team_featured_image($post_id);
		if ($post_featured_image) {
			echo '<img width="75" height="75" src="' . $post_featured_image . '" />';
		}
	}
}
add_action('manage_pix_team_posts_custom_column', 'my_manage_team_columns', 10, 2);

