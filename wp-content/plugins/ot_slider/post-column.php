<?php
	
//Exir if access directly
if(!defined('ABSPATH')){
	exit;
}


 // add column heading
 
function slider_columns_head( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'featured_image' => 'Feature Thumb',
		'title' => __('Title', 'ot-slider'),
		'author' => __('Author', 'ot-slider'),
		'taxonomy-tags' => __('Tags', 'ot-slider'),
		'comments' => '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>',
		'date' => __('Date', 'ot-slider'),
	);
	return $columns;
}
add_filter('manage_slider_posts_columns' , 'slider_columns_head', 10);


// get featured image function
function slider_featured_image($post_ID) {
	$post_thumbnail_id = get_post_thumbnail_id($post_ID);
	if ($post_thumbnail_id) {
		$post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail');
		return $post_thumbnail_img[0];
	}
}

// show featured image in column
function slider_columns_content($column_name, $post_ID) {
	if ($column_name == 'featured_image') {
		$post_featured_image = slider_featured_image($post_ID);
		if ($post_featured_image) {
			echo '<img src="' . $post_featured_image . '" />';
		}
	}
}
add_action('manage_slider_posts_custom_column', 'slider_columns_content', 10, 2);


?>