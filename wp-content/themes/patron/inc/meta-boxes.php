<?php 
/**
 * Register meta boxes
 *
 * @since 1.0
 *
 * @param array $meta_boxes
 *
 * @return array
 */

 
add_filter( 'rwmb_meta_boxes', 'patron_register_meta_boxes' );
function patron_register_meta_boxes( $meta_boxes ) {
	
    $prefix = 'patron_prefix_';
	$meta_boxes[] = array(
		'id'       => 'format_detail',
		'title'    => __( 'Format Details', 'patron' ),
		'pages'    => array( 'post' ),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields'   => array(
			array(
				'name'             => __( 'Image', 'patron' ),
				'id'               => $prefix . 'image',
				'type'             => 'image_advanced',
				'class'            => 'image',
				'max_file_uploads' => 1,
			),
			array(
				'name'  => __( 'Gallery', 'patron' ),
				'id'    => $prefix . 'images',
				'type'  => 'image_advanced',
				'class' => 'gallery',
			),
			array(
				'name'  => __( 'Quote', 'patron' ),
				'id'    => $prefix . 'quote',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'quote',
			),
			array(
				'name'  => __( 'Author', 'patron' ),
				'id'    => $prefix . 'quote_author',
				'type'  => 'text',
				'class' => 'quote',
			),
			array(
				'name'  => __( 'Audio', 'patron' ),
				'id'    => $prefix . 'link_audio',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'audio',
				'desc' => 'Ex: https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/139083759',
			),
			array(
				'name'  => __( 'Video', 'patron' ),
				'id'    => $prefix . 'link_video',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'video',
				'desc' => 'Example: <b>http://www.youtube.com/embed/0ecv0bT9DEo</b> or <b>http://player.vimeo.com/video/47355798</b>',
			),			
		),
	);
	
	// For service icon meta box
    $meta_boxes[] = array(
        'id'         => 'service_icon',
        'title'      => 'Service Icon',
        'pages'	 => array( 'service' ),
        'context'    => 'side',
        'priority'   => 'high',
		'autosave' => true,
        'fields' => array(
            array(
                'name'  => __('Class Name', 'patron'),
                'desc'  => 'Add flaticon class name here..',
                'id'    => $prefix . 'icon',
                'type'  => 'text',
            ),
        )
    );
	
	// Client Info
	$meta_boxes[] = array(
        'id'         => 'user_info',
        'title'      => 'User Info',
        'pages'	 => array( 'testimonial' ),
        'context'    => 'normal',
        'priority'   => 'high',
		'autosave' => true,
        'fields' => array(
            array(
                'name'  => __('Designation', 'patron'),
                'desc'  => 'Add user designation',
                'id'    => $prefix . 'designation',
                'type'  => 'text',
            ),
        )
    );
	
	// Slider Content
	$meta_boxes[] = array(
		'id'     => 'slider_cont',
        'title'  => 'Slider Content',
		'pages'	 => array( 'slider' ),
        'fields' => array(
			array(
                'name'    => __('Slider Content', 'patron'),
                'id'      => $prefix . 'slider_content',
                'type'    => 'textarea',
            ),
            array(
                'name'    => __('Button Text', 'patron'),
                'id'      => $prefix . 'slider_button',
                'type'    => 'text',
            ),
            array(
                'name'    => __('Button Url', 'patron'),
                'id'      => $prefix . 'slider_url',
                'type'    => 'url',
            ),
        ),
    );
	

    // Add more meta boxes if you want
    // $meta_boxes[] = ...

    return $meta_boxes;
}

	
?>