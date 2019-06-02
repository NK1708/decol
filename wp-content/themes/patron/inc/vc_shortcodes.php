<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Custom Heading
add_action( 'vc_before_init', 'pt_heading_integrate' );
function pt_heading_integrate(){
   vc_map( 
   array(
	   "name"		=> __("OT Section Title", 'patron'),
	   "base"		=> "heading",
	   "class"		=> "",
	   "icon"		=> "icon-st",
	   "category"	=> __( "Patron Widget", 'patron'),
	   "params"		=> array(
			array(
			 "type"      => "textfield",
			 "class"     => "",
			 "heading"   => __("Top Tagline", 'patron'),
			 "param_name"=> "tagline",
			 "value"     => "",
			 "description" => __("Add text", 'patron')
			),
			array(
			 "type"      => "textfield",
			 "holder"    => "div",
			 "class"     => "",
			 "heading"   => __("Main Headline", 'patron'),
			 "param_name"=> "title",
			 "value"     => "",
			 "description" => __("Add title text", 'patron')
			),
			array(
			"type" => "dropdown",
			"heading" => __('Element Tag', 'patron'),
			"param_name" => "tag",
			"value" => array(
						 __('Select Tag', 'patron') => '',
						 __('h1', 'patron') => 'h1',
						 __('h2', 'patron') => 'h2',
						 __('h3', 'patron') => 'h3',  
						 __('h4', 'patron') => 'h4',
						 __('h5', 'patron') => 'h5',
						 __('h6', 'patron') => 'h6',  
						 __('p', 'patron')  => 'p',
						 __('div', 'patron') => 'div',
						),

			"description" => __("Section Element Tag default h2", 'patron'),      
			),
			array(
			"type" => "dropdown",
			"heading" => __('Text Align', 'patron'),
			"param_name" => "align",
			"value" => array( 
						 __('center', 'patron') => '',  
						 __('left', 'patron') => '-left',
						 __('right', 'patron') => '-right',               
						),
			"description" => __("Title align", 'patron'),      
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Visible Animation?", 'patron'),
				"param_name" => "animation",
				"value" => array(   
							 __('Yes', 'patron') => 'yes',
							 __('no', 'patron') => 'no',
							),
				"description" => __("Active animation effect of the title.", 'patron'),
			),
			array(
			 "type"      => "textfield",
			 "holder"    => "div",
			 "class"     => "",
			 "heading"   => __("Font Size", 'patron'),
			 "param_name"=> "size",
			 "value"     => "",
			 "description" => __("Title Font Size", 'patron')
			),
			array(
			 "type"      => "colorpicker",
			 "holder"    => "div",
			 "class"     => "",
			 "heading"   => __("Color", 'patron'),
			 "param_name"=> "color",
			 "value"     => "",
			 "description" => __("Title Color", 'patron')
			),
			array(
			 "type"      => "textfield",
			 "holder"    => "div",
			 "class"     => "",
			 "heading"   => __("Class Extra", 'patron'),
			 "param_name"=> "class",
			 "value"     => "",
			 "description" => __("Class extra for style", 'patron')
			),
			array(
			 "type"      => "textarea",
			 "holder"    => "div",
			 "class"     => "",
			 "heading"   => __("Sub Title", 'patron'),
			 "param_name"=> "subtitle",
			 "value"     => "",
			 "description" => __("Add Text", 'patron')
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Animation Style", 'patron'),
				"param_name" => "animation_style",
				"value" => array(   
							 __('Select Animation', 'patron') => '',
							 __('Fade In', 'patron') => 'fadeIn',
							 __('Fade In Left', 'patron') => 'fadeInLeft',
							 __('Fade In Right', 'patron') => 'fadeInRight',
							 __('Fade In Up', 'patron') => 'fadeInUp',
							 __('Fade In Down', 'patron') => 'fadeInDown',
							 __('Zoom In', 'patron') => 'zoomIn',
							 __('Flip Horizontal', 'patron') => 'flipInX',
							 __('Bounce', 'patron') => 'bounce',
							 __('bounce In', 'patron') => 'bounceIn',
							 __('Flash', 'patron') => 'flash',
							 __('Rubber Band', 'patron') => 'rubberBand',
							 __('Shake', 'patron') => 'shake',
							 __('Swing', 'patron') => 'swing',
							),
				"description" => __("Select your animation style default Fade In", 'patron'),
				'group' => __( 'Animation Effect', 'patron' ),
				"dependency"  => array( 'element' => 'animation', 'value' => array( 'yes' ) ),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Animation Delay Time", 'patron'),
				"param_name" => "delay_time",
				"value" => array(   
							 __('Animation delay', 'patron') => '300ms',
							 __('100ms', 'patron') => '100ms',
							 __('300ms', 'patron') => '300ms',
							 __('500ms', 'patron') => '500ms',
							 __('700ms', 'patron') => '700ms',
							 __('900ms', 'patron') => '900ms',
							 __('1100ms', 'patron') => '11000ms',
							 __('1300ms', 'patron') => '1300ms',
							),
				"description" => __("Select animation time delay default 300ms", 'patron'),
				'group' => __( 'Animation Effect', 'patron' ),
				"dependency"  => array( 'element' => 'animation', 'value' => array( 'yes' ) ),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Animation Duration Time", 'patron'),
				"param_name" => "duration_time",
				"value" => array(   
							 __('Animation duration', 'patron') => '500ms',
							 __('300ms', 'patron') => '300ms',
							 __('400ms', 'patron') => '400ms',
							 __('500ms', 'patron') => '500ms',
							 __('600ms', 'patron') => '600ms',
							 __('700ms', 'patron') => '700ms',
							 __('800ms', 'patron') => '800ms',
							 __('900ms', 'patron') => '900ms',
							 __('1000ms', 'patron') => '1000ms',
							),
				"description" => __("Select animation time duration default 500ms", 'patron'),
				'group' => __( 'Animation Effect', 'patron' ),
				"dependency"  => array( 'element' => 'animation', 'value' => array( 'yes' ) ),
			),
		)
	));
}


// Inner title and Box title
add_action( 'vc_before_init', 'pt_inner_heading_integrate' );
function pt_inner_heading_integrate(){
   vc_map( 
   array(
	   "name"		=> __("OT Inner Title", 'patron'),
	   "base"		=> "inner_heading",
	   "class"		=> "",
	   "icon"		=> "icon-st",
	   "category"	=> __( "Patron Widget", 'patron'),
	   "params"		=> array(
			array(
			 "type"      => "textfield",
			 "holder"    => "div",
			 "class"     => "",
			 "heading"   => __("Title Text", 'patron'),
			 "param_name"=> "title",
			 "value"     => "",
			 "description" => __("Add title text", 'patron')
			),
			array(
			"type" => "dropdown",
			"heading" => __('Element Tag', 'patron'),
			"param_name" => "tag",
			"value" => array(
						 __('Select Tag', 'patron') => '',
						 __('h1', 'patron') => 'h1',
						 __('h2', 'patron') => 'h2',
						 __('h3', 'patron') => 'h3',  
						 __('h4', 'patron') => 'h4',
						 __('h5', 'patron') => 'h5',
						 __('h6', 'patron') => 'h6',  
						 __('p', 'patron')  => 'p',
						 __('div', 'patron') => 'div',
						),

			"description" => __("Default h3 tag in demo", 'patron'),      
			),
			array(
			"type" => "dropdown",
			"heading" => __('Text Align', 'patron'),
			"param_name" => "align",
			"value" => array( 
						 __('Select Align', 'patron') => '',  
						 __('left', 'patron') => 'left',
						 __('right', 'patron') => 'right',  
						 __('center', 'patron') => 'center',
						 __('justify', 'patron') => 'justify',                  
						),
			"description" => __("Section Overlay", 'patron'),      
			),
			array(
			 "type"      => "textfield",
			 "holder"    => "div",
			 "class"     => "",
			 "heading"   => __("Font Size", 'patron'),
			 "param_name"=> "size",
			 "value"     => "",
			 "description" => __("Title Font Size", 'patron')
			),
			array(
			 "type"      => "textfield",
			 "holder"    => "div",
			 "class"     => "",
			 "heading"   => __("Class Extra", 'patron'),
			 "param_name"=> "class",
			 "value"     => "",
			 "description" => __("Class extra for style", 'patron')
			),
		)
	));
}


// Custom Text Block
add_action( 'vc_before_init', 'pt_text_block_integrate' );
function pt_text_block_integrate(){
	vc_map(
	array(
		"name"		=> __("OT Text Block", 'patron'),
		"base"		=> "ot_text_block",
		"class"		=> "",
		"icon"		=> "icon-st",
		"category"	=> __( "Patron Widget", 'patron'),
		"params"		=> array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title", 'patron' ),
				"param_name" => "inner_title",
				"value" => "",
				"description" => __( "Add the text block headline, if have.", 'patron' )
		    ),
			array(
				"type" => "dropdown",
				"heading" => __('Element Tag', 'patron'),
				"param_name" => "tag",
				"value" => array(
							 __('Select Tag', 'patron') => '',
							 __('h1', 'patron') => 'h1',
							 __('h2', 'patron') => 'h2',
							 __('h3', 'patron') => 'h3',  
							 __('h4', 'patron') => 'h4',
							 __('h5', 'patron') => 'h5',
							 __('h6', 'patron') => 'h6',  
							 __('p', 'patron')  => 'p',
							 __('div', 'patron') => 'div',
							),

				"description" => __("Default h3 tag in demo", 'patron'),      
			),
		    array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Content", 'patron' ),
				"param_name" => "ot_content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
				"value" => __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'patron' ),
				"description" => __( "Add Text Here", 'patron' )
		    ),
		)
	));
}

// Grid Style with round box icon
add_action( 'vc_before_init', 'pt_icon_grid_integrate' );
function pt_icon_grid_integrate(){
	vc_map(
	array(
		"name"		=> __("OT Icon Grid", 'patron'),
		"base"		=> "ot_icon_grid",
		"class"		=> "",
		"icon"		=> "icon-st",
		"category"	=> __( "Patron Widget", 'patron'),
		"params"		=> array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title", 'patron' ),
				"param_name" => "grid_title",
				"value" => "",
				"description" => __( "Add the text grid title.", 'patron' )
		    ),
			array(
				"type" => "dropdown",
				"heading" => __('Element Tag', 'patron'),
				"param_name" => "tag",
				"value" => array(
							 __('Select Tag', 'patron') => '',
							 __('h1', 'patron') => 'h1',
							 __('h2', 'patron') => 'h2',
							 __('h3', 'patron') => 'h3',  
							 __('h4', 'patron') => 'h4',
							 __('h5', 'patron') => 'h5',
							 __('h6', 'patron') => 'h6',  
							),

				"description" => __("Section Element Tag", 'patron'),      
			 ),
			array(
				"type" => "textfield",
				"heading" => __('Flat Icon Class', 'patron'),
				"param_name" => "icon_class",
				"value" => "",
				"description" => __("Input flat icon class name from fonts/flaticon/flaticon.html File", 'patron'),      
			),
			array(
				"type" => "dropdown",
				"heading" => __('Icon Font Size', 'patron'),
				"param_name" => "icon_size",
				"value" => array(
							 __('Select Size', 'patron') => '',
							 __('14px', 'patron') => '14',
							 __('18px', 'patron') => '18',
							 __('24px', 'patron') => '24',  
							 __('30px', 'patron') => '30',
							 __('36px', 'patron') => '36',
							 __('42px', 'patron') => '42',  
							 __('50px', 'patron') => '50',
							 __('60px', 'patron') => '60',
							 __('70px', 'patron') => '70',
							 __('80px', 'patron') => '80',
							),

				"description" => __("Default font size is 54px", 'patron'),      
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Content", 'patron' ),
				"param_name" => "icon_grid_text", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
				"value" => __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'patron' ),
				"description" => __( "Add Text Here", 'patron' )
		    ),
		)
	));
}

// Service Grid Style 1
add_action( 'vc_before_init', 'pt_services_integrate' );
function pt_services_integrate(){
   vc_map( array(
   "name" => __("OT Services", 'patron'),
   "base" => "services",
   "class" => "",
   "category" => __( "Patron Widget", 'patron'),
   "icon" => "icon-st",
   "params" => array(  
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => "Number show services per page.",
			 "param_name" => "number",
			 "value" => "",
			 "description" => __("Add Number -1 for show all post.", 'patron')
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Select Columns", 'patron'),
			 "param_name" => "services_columns",
			 "value" => array(   
						 __('4 Columns', 'patron') => 4,
						 __('6 Columns', 'patron') => 6,
						),
			 "description" => __("Select number columns for show.", 'patron')
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Grid Content Align", 'patron'),
			 "param_name" => "grid_align",
			 "value" => array(   
						 __('Left', 'patron') => 'left',
						 __('Center', 'patron') => 'center',
						),
			 "description" => __("Option show/hide button on service grid.", 'patron'),
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Grid Background", 'patron'),
			 "param_name" => "grid_bg",
			 "value" => array(
						__('Select Background', 'patron') => '',
						__('White', 'patron') => 'bg-white',
						__('Gray', 'patron') => 'bg-gray',
						__('Dark', 'patron') => 'bg-dark',
					),
			 "description" => __("Select number columns for show.", 'patron')
		  ),
		  array(
			"type" => "dropdown",
			"heading" => __('Title Tag', 'patron'),
			"param_name" => "tag",
			"value" => array(
						 __('Select Tag', 'patron') => '',
						 __('h1', 'patron') => 'h1',
						 __('h2', 'patron') => 'h2',
						 __('h3', 'patron') => 'h3',  
						 __('h4', 'patron') => 'h4',
						 __('h5', 'patron') => 'h5',
						 __('h6', 'patron') => 'h6',  
						),

			"description" => __("Grid title tag", 'patron'),      
		  ),
		  array(
			'type' => 'dropdown',
			'heading' => __( 'Sort order', 'patron' ),
			'param_name' => 'order',
			'value' => array(
				__( 'Ascending', 'patron' ) => 'ASC',
				__( 'Descending', 'patron' ) => 'DESC',
			),
			'param_holder_class' => 'vc_grid-data-type-not-ids',
			'description' => __( 'Select sorting order.', 'patron' ),
			'dependency' => array(
				'element' => 'post_type',
				'value_not_equal_to' => array(
					'ids',
					'custom',
				),
			),
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Show service button?", 'patron'),
			 "param_name" => "show_btn",
			 "value" => array(   
						 __('Yes', 'patron') => 'yes',
						 __('no', 'patron') => 'no',
						),
			 "description" => __("Option show/hide button on service grid.", 'patron'),
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Show service icon?", 'patron'),
			 "param_name" => "show_icon",
			 "value" => array(   
						 __('Yes', 'patron') => 'yes',
						 __('no', 'patron') => 'no',
						),
			 "description" => __("Option show/hide icon with service grid.", 'patron'),
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Display Animation?", 'patron'),
			 "param_name" => "animation",
			 "value" => array(   
						 __('Yes', 'patron') => 'yes',
						 __('no', 'patron') => 'no',
						),
			 "description" => __("Option show/hide icon with service grid.", 'patron'),
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => "Button text",
			 "param_name" => "btn_text",
			 "value" => "",
			 "description" => __("Add button text, default: read more.", 'patron'),
			 "dependency"  => array( 'element' => 'show_btn', 'value' => 'yes' ), 
		  ),            
		)
    ));
}

// Simple thumbnail grid box
add_action( 'vc_before_init', 'pt_thumbnail_integrate' );
function pt_thumbnail_integrate(){
   vc_map( array(
	   "name" => __("OT Thumbnail Single", 'patron'),
	   "base" => "ot_thumbnail",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
		array(
			"type" => "attach_image",
			"holder" => "div",
			"class" => "",
			"heading" => "Grid Image",
			"param_name" => "grid_image",
			"value" => "",
			"description" => __("Attach the grid image 370X220 ratio", 'patron')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __( "Title", 'patron' ),
			"param_name" => "grid_title",
			"value" => "",
			"description" => __( "Add the text grid title.", 'patron' )
		),
	    array(
			"type" => "vc_link",
			"holder" => "div",
			"class" => "",
			"heading" => __( "Custom Link", 'patron' ),
			"param_name" => "parmalink",
			"value" => "",
			"description" => __( "Add the permalink of the page with http:// or https://", 'patron' )
		),
		array(
			"type" => "dropdown",
			"heading" => __('Title Tag', 'patron'),
			"param_name" => "tag",
			"value" => array(
						 __('Select Tag', 'patron') => '',
						 __('h1', 'patron') => 'h1',
						 __('h2', 'patron') => 'h2',
						 __('h3', 'patron') => 'h3',  
						 __('h4', 'patron') => 'h4',
						 __('h5', 'patron') => 'h5',
						 __('h6', 'patron') => 'h6',  
						),
			"description" => __("Thumbnail headline tag", 'patron'),      
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => __("Visible Grid Animation?", 'patron'),
			"param_name" => "animation",
			"value" => array(   
						 __('Yes', 'patron') => 'yes',
						 __('no', 'patron') => 'no',
						),
			"description" => __("Active animation effect of the grid.", 'patron'),
        ),
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"class" => "",
			"heading" => __( "Content", 'patron' ),
			"param_name" => "grid_content",
			"value" => __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'patron' ),
			"description" => __( "Add thumbnail text here shortly", 'patron' )
		),
	    array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => __("Show service button?", 'patron'),
			"param_name" => "show_btn",
			"value" => array(   
						 __('Yes', 'patron') => 'yes',
						 __('no', 'patron') => 'no',
						),
			"description" => __("Option show/hide button on service grid.", 'patron'),
        ),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Button text",
			"param_name" => "btn_text",
			"value" => "",
			"description" => __("Add button text, default: read more.", 'patron'),
			"dependency"  => array( 'element' => 'show_btn', 'value' => 'yes' ), 
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => __("Animation Style", 'patron'),
			"param_name" => "animation_style",
			"value" => array(   
						 __('Select Animation', 'patron') => '',
						 __('Fade In', 'patron') => 'fadeIn',
						 __('Fade In Left', 'patron') => 'fadeInLeft',
						 __('Fade In Right', 'patron') => 'fadeInRight',
						 __('Fade In Up', 'patron') => 'fadeInUp',
						 __('Fade In Down', 'patron') => 'fadeInDown',
						 __('Zoom In', 'patron') => 'zoomIn',
						 __('Flip Horizontal', 'patron') => 'flipInX',
						 __('Bounce', 'patron') => 'bounce',
						 __('bounce In', 'patron') => 'bounceIn',
						 __('Flash', 'patron') => 'flash',
						 __('Rubber Band', 'patron') => 'rubberBand',
						 __('Shake', 'patron') => 'shake',
						 __('Swing', 'patron') => 'swing',
						),
			"description" => __("Select your animation style default Fade In", 'patron'),
			'group' => __( 'Grid Animation', 'patron' ),
			"dependency"  => array( 'element' => 'animation', 'value' => array( 'yes' ) ),
        ),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => __("Animation Delay Time", 'patron'),
			"param_name" => "delay_time",
			"value" => array(   
						 __('Animation delay', 'patron') => '100ms',
						 __('100ms', 'patron') => '100ms',
						 __('300ms', 'patron') => '300ms',
						 __('500ms', 'patron') => '500ms',
						 __('700ms', 'patron') => '700ms',
						 __('900ms', 'patron') => '900ms',
						 __('1100ms', 'patron') => '11000ms',
						 __('1300ms', 'patron') => '1300ms',
						),
			"description" => __("Select animation time delay default 100ms", 'patron'),
			'group' => __( 'Grid Animation', 'patron' ),
			"dependency"  => array( 'element' => 'animation', 'value' => array( 'yes' ) ),
        ),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => __("Animation Duration Time", 'patron'),
			"param_name" => "duration_time",
			"value" => array(   
						 __('Animation duration', 'patron') => '500ms',
						 __('300ms', 'patron') => '300ms',
						 __('400ms', 'patron') => '400ms',
						 __('500ms', 'patron') => '500ms',
						 __('600ms', 'patron') => '600ms',
						 __('700ms', 'patron') => '700ms',
						 __('800ms', 'patron') => '800ms',
						 __('900ms', 'patron') => '900ms',
						 __('1000ms', 'patron') => '1000ms',
						),
			"description" => __("Select animation time duration default 500ms", 'patron'),
			'group' => __( 'Grid Animation', 'patron' ),
			"dependency"  => array( 'element' => 'animation', 'value' => array( 'yes' ) ),
        ),
	)
   ));
}


// Achivement banner and fact counter
add_action( 'vc_before_init', 'pt_fact_banner_integrate' );
function pt_fact_banner_integrate(){
	vc_map( array(
	   "name" => __("OT Achivement Banner", 'patron'),
	   "base" => "ot_fact_banner",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Show Achivement?", 'patron'),
				"param_name" => "counter",
				"value" => array(   
							 __('Yes', 'patron') => 'yes',
							 __('no', 'patron') => 'no',
							),
				"description" => __("Show achivment section amount of success, default yes", 'patron'),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __('Show Counter Item', 'patron'),
				"param_name" => "count_item",
				"value" => array(
							 __('Select Number', 'patron') => 4,
							 __('2 Items', 'patron') => 2,
							 __('3 Items', 'patron') => 3,
							 __('4 Items', 'patron') => 4,
							),
				"description" => __("Select How many item you keep, max 4 itmes, default 4 itmes", 'patron'),
				"dependency"  => array( 'element' => 'counter', 'value' => array( 'yes' ) ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Quantity Title 1",
				"param_name" => "ac_title1",
				"value" => "",
				"description" => __("Add the title text", 'patron'),
				"group" => __( 'Count Data', 'patron' ),
				"dependency"  => array( 'element' => 'count_item', 'value' => array( '4', '3', '2' ) ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Quantity 1",
				"param_name" => "ac_quantity1",
				"value" => "",
				"description" => __("Quantity number", 'patron'),
				"group" => __( 'Count Data', 'patron' ),
				"dependency"  => array( 'element' => 'count_item', 'value' => array( '4', '3', '2' ) ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Quantity Title 2",
				"param_name" => "ac_title2",
				"value" => "",
				"description" => __("Add the title text", 'patron'),
				"group" => __( 'Count Data', 'patron' ),
				"dependency"  => array( 'element' => 'count_item', 'value' => array( '4', '3', '2' ) ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Quantity 2",
				"param_name" => "ac_quantity2",
				"value" => "",
				"description" => __("Quantity number", 'patron'),
				"group" => __( 'Count Data', 'patron' ),
				"dependency"  => array( 'element' => 'count_item', 'value' => array( '4', '3', '2' ) ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Quantity Title 3",
				"param_name" => "ac_title3",
				"value" => "",
				"description" => __("Add the title text", 'patron'),
				"group" => __( 'Count Data', 'patron' ),
				"dependency"  => array( 'element' => 'count_item', 'value' => array( '4', '3' ) ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Quantity 3",
				"param_name" => "ac_quantity3",
				"value" => "",
				"description" => __("Quantity number", 'patron'),
				"group" => __( 'Count Data', 'patron' ),
				"dependency"  => array( 'element' => 'count_item', 'value' => array( '4', '3' ) ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Quantity Title 4",
				"param_name" => "ac_title4",
				"value" => "",
				"description" => __("Add the title text", 'patron'),
				"group" => __( 'Count Data', 'patron' ),
				"dependency"  => array( 'element' => 'count_item', 'value' => array( '4' ) ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Quantity 4",
				"param_name" => "ac_quantity4",
				"value" => "",
				"description" => __("Quantity number", 'patron'),
				"group" => __( 'Count Data', 'patron' ),
				"dependency"  => array( 'element' => 'count_item', 'value' => array( '4' ) ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Banner Title",
				"param_name" => "title",
				"value" => "",
				"description" => __("Add banner headline text", 'patron'),
			),
			array(
				"type" => "dropdown",
				"heading" => __('Title Tag', 'patron'),
				"param_name" => "tag",
				"value" => array(
							 __('Select Tag', 'patron') => 'h3',
							 __('h1', 'patron') => 'h1',
							 __('h2', 'patron') => 'h2',
							 __('h3', 'patron') => 'h3',  
							 __('h4', 'patron') => 'h4',
							 __('h5', 'patron') => 'h5',
							 __('h6', 'patron') => 'h6',  
							),
				"description" => __("Section banner title tag, default h3", 'patron'),      
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Banner Content", 'patron' ),
				"param_name" => "banner_text",
				"value" => __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'patron' ),
				"description" => __( "Add banner content here...", 'patron' )
			),
		)
	));
}



// Recent News Grid
add_action( 'vc_before_init', 'pt_recent_news_integrate' );
function pt_recent_news_integrate(){
	vc_map( array(
	   "name" => __("OT Recent News", 'patron'),
	   "base" => "ot_recent_news",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Hover effect on image?", 'patron'),
				"param_name" => "hover_effect",
				"value" => array(   
							 __('Yes', 'patron') => 'yes',
							 __('no', 'patron') => 'no',
							),
				"description" => __("Do you want to keep hover effect on news image", 'patron'),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Media Size",
				"param_name" => "media_size",
				"value" => "medium",
				"description" => __("Enter media size Example: thumbnail, pt-thumb-tall, medium, large. Default used medium size.", 'patron')
			),
			array(
				"type"      => "colorpicker",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Grid Background", 'patron'),
				"param_name"=> "bg_color",
				"value"     => "",
				"description" => __("Grid Background color default #fff", 'patron'),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Admin Bar", 'patron'),
				"param_name" => "admin_bar",
				"value" => array(   
							 __('Yes', 'patron') => 'yes',
							 __('no', 'patron') => 'no',
							),
				"description" => __("Do you want to keep admin bar with news grid", 'patron'),
			), 
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __('Show News Item', 'patron'),
				"param_name" => "item_show",
				"value" => array(
							 __('Select Number', 'patron') => 3,
							 __('2 Items', 'patron') => 2,
							 __('3 Items', 'patron') => 3,
							 __('4 Items', 'patron') => 4,
							),
				"description" => __("Select How many item you keep, max 4 itmes, default 3 itmes", 'patron'),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Visible Grid Animation?", 'patron'),
				"param_name" => "animation",
				"value" => array(   
							 __('Yes', 'patron') => 'yes',
							 __('no', 'patron') => 'no',
							),
				"description" => __("Active animation effect of the grid.", 'patron'),
			),
		)
	));
}



// Gallery Image Slider
add_action( 'vc_before_init', 'pt_gallery_slide_integrate' );
function pt_gallery_slide_integrate(){
	vc_map( array(
	   "name" => __("OT Gallery Slide", 'patron'),
	   "base" => "ot_gallery_slide",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Slide Gallery Itmes",
				"param_name" => "item_show",
				"value" => "",
				"description" => __("Enter the number of gallery item slide.", 'patron')
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Active Slide Effect?", 'patron'),
				"param_name" => "slider",
				"value" => array(   
							 __('Yes', 'patron') => 'yes',
							 __('no', 'patron') => 'no',
							),
				"description" => __("Do you need gallery image slide, default yes", 'patron'),
			),
	   )
	));
}



// Testmonial Section
add_action( 'vc_before_init', 'pt_testimonial_slide_integrate' );
function pt_testimonial_slide_integrate(){
	vc_map( array(
	   "name" => __("OT Testimonial Slider", 'patron'),
	   "base" => "ot_testimonial_slide",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Slide Testmonial Itmes",
				"param_name" => "item_show",
				"value" => "",
				"description" => __("Enter the number of testimonial item slide.", 'patron')
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Active Slide Effect?", 'patron'),
				"param_name" => "slider",
				"value" => array(   
							 __('Yes', 'patron') => 'yes',
							 __('no', 'patron') => 'no',
							),
				"description" => __("Do you need testimonial slide, default yes", 'patron'),
			),
	   )
	));
}



// Simple Slider
add_action( 'vc_before_init', 'pt_simple_slider_integrate' );
function pt_simple_slider_integrate(){
	
	$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

	$contact_forms = array();
	if ( $cf7 ) {
		foreach ( $cf7 as $cform ) {
			$contact_forms[ $cform->post_title ] = $cform->ID;
		}
	} else {
		$contact_forms[ __( 'No contact forms found', 'js_composer' ) ] = 0;
	}
		
	vc_map( array(
	   "name" => __("OT Simple Slider", 'patron'),
	   "base" => "ot_simple_slider",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Slide Itmes",
				"param_name" => "item_show",
				"value" => "",
				"description" => __("Enter the number of item slide.", 'patron')
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Need bullate point?", 'patron'),
				"param_name" => "bullate",
				"value" => array(   
							 __('Yes', 'patron') => 'yes',
							 __('No', 'patron') => 'no',
							),
				"description" => __("Do you need bullate of the slider, default yes", 'patron'),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Quote Form On Slider", 'patron'),
				"param_name" => "quote",
				"value" => array(   
							 __('Yes', 'patron') => 'yes',
							 __('No', 'patron') => 'no',
							),
				"description" => __("Want to keep the quote form on slider", 'patron'),
			),
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Form Title", 'patron'),
				"param_name"=> "form_title",
				"value"     => "",
				"description" => __("Add Text", 'patron'),
				"dependency"  => array( 'element' => 'quote', 'value' => array( 'yes' ) ),
				"group" => __( 'Quote Form', 'patron' ),
			),
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Form Subtitle", 'patron'),
				"param_name"=> "sub_title",
				"value"     => "",
				"description" => __("Add Text", 'patron'),
				"dependency"  => array( 'element' => 'quote', 'value' => array( 'yes' ) ),
				"group" => __( 'Quote Form', 'patron' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Select contact form', 'patron' ),
				'param_name' => 'id',
				'value' => $contact_forms,
				'save_always' => true,
				'description' => __( 'Choose previously created contact form from the drop down list.', 'patron' ),
				'dependency'  => array( 'element' => 'quote', 'value' => array( 'yes' ) ),
				'group' => __( 'Quote Form', 'patron' ),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Bullate Position", 'patron'),
				"param_name" => "position",
				"value" => array(   
							 __('Bottom', 'patron') => '1',
							 __('Right', 'patron') => '2',
							),
				"description" => __("Where the bullater point location?", 'patron'),
			),
	   )
	));
}



// Request A Quote Form
add_action( 'vc_before_init', 'pt_quote_form_integrate' );
function pt_quote_form_integrate(){
	$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

	$contact_forms = array();
	if ( $cf7 ) {
		foreach ( $cf7 as $cform ) {
			$contact_forms[ $cform->post_title ] = $cform->ID;
		}
	} else {
		$contact_forms[ __( 'No contact forms found', 'js_composer' ) ] = 0;
	}
	
	vc_map( array(
	   "name" => __("OT Quote Form", 'patron'),
	   "base" => "ot_quote_form",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title", 'patron' ),
				"param_name" => "title",
				"value" => "",
				"description" => __( "Add the text block headline, if have.", 'patron' )
		    ),
			array(
				"type"      => "textarea",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Sub Title", 'patron'),
				"param_name"=> "subtitle",
				"value"     => "",
				"description" => __("Add Text", 'patron')
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Quote Push to top Section", 'patron'),
				"param_name" => "position",
				"value" => array(   
							 __('Yes', 'patron') => 'yes',
							 __('No', 'patron') => 'no',
							),
				"description" => __("Quote form head position to top section", 'patron'),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Select contact form', 'patron' ),
				'param_name' => 'id',
				'value' => $contact_forms,
				'save_always' => true,
				'description' => __( 'Choose previously created contact form from the drop down list.', 'patron' ),
			),
			array(
				"type"      => "colorpicker",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Font Color", 'patron'),
				"param_name"=> "title_color",
				"value"     => "",
				"description" => __("Title Color", 'patron')
			),
			array(
				"type"      => "colorpicker",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Background Color", 'patron'),
				"param_name"=> "bg_color",
				"value"     => "",
				"description" => __("Form background color, default #f5f5f5", 'patron')
			),
	   )
	));
}


// Custom Button
add_action( 'vc_before_init', 'pt_custom_btn_integrate' );
function pt_custom_btn_integrate(){
	vc_map( array(
	   "name" => __("OT Custom Button", 'patron'),
	   "base" => "ot_custom_btn",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Choose Button Style", 'patron'),
				"param_name" => "btn_style",
				"value" => array(  
							 __('Select Style', 'patron') => '',
							 __('Primary', 'patron') => 'btn-primary',
							 __('Secondary', 'patron') => 'btn-secondary',
							 __('Link', 'patron') => 'btn-link',
							),
				"description" => __("Choose button each option has defferent style", 'patron'),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Button Text", 'patron' ),
				"param_name" => "btn_text",
				"value" => "",
				"description" => __( "Add text that show inside the button", 'patron' )
		    ),
			array(
				"type" => "vc_link",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Custom Link", 'patron' ),
				"param_name" => "parmalink",
				"value" => "",
				"description" => __( "Add the permalink of the page with http:// or https://", 'patron' )
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Margin From Top", 'patron'),
				"param_name" => "margin",
				"value" => array( 
							 __('No Margin', 'patron') => '',
							 __('10px', 'patron') => '10',
							 __('15px', 'patron') => '15',
							 __('20px', 'patron') => '20',
							 __('30px', 'patron') => '30',
							 __('50px', 'patron') => '50',
							),
				"description" => __("Select the button margin from top", 'patron'),
			),
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Class Extra", 'patron'),
				"param_name"=> "class",
				"value"     => "",
				"description" => __("Class extra for style", 'patron'),
			),
	    )
	));
}



// Left Content Box On Section
add_action( 'vc_before_init', 'pt_service_left_box_integrate' );
function pt_service_left_box_integrate(){
	   vc_map( array(
	   "name" => __("OT Left Content of Service", 'patron'),
	   "base" => "service_left_box",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type"      => "textfield",
				"class"     => "",
				"heading"   => __("Top Tagline", 'patron'),
				"param_name"=> "tagline",
				"value"     => "",
				"description" => __("Add text", 'patron'),
			),
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Main Headline", 'patron'),
				"param_name"=> "title",
				"value"     => "",
				"description" => __("Add title text", 'patron'),
			),
			array(
				"type" => "dropdown",
				"heading" => __('Title Tag', 'patron'),
				"param_name" => "tag",
				"value" => array(
							 __('Select Tag', 'patron') => '',
							 __('h1', 'patron') => 'h1',
							 __('h2', 'patron') => 'h2',
							 __('h3', 'patron') => 'h3',  
							 __('h4', 'patron') => 'h4',
							 __('h5', 'patron') => 'h5',
							 __('h6', 'patron') => 'h6',  
							 __('p', 'patron')  => 'p',
							 __('div', 'patron') => 'div',
							),

				"description" => __("Section title tag, default h2", 'patron'),      
			),
			array(
				"type" => "dropdown",
				"heading" => __('Text Align', 'patron'),
				"param_name" => "align",
				"value" => array( 
							 __('Select Align', 'patron') => '',
							 __('center', 'patron') => '',  
							 __('left', 'patron') => '-left',
							 __('right', 'patron') => '-right',               
							),
				"description" => __("Section title align from", 'patron'),      
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Visible Animation?", 'patron'),
				"param_name" => "animation",
				"value" => array(   
							 __('Yes', 'patron') => 'yes',
							 __('no', 'patron') => 'no',
							),
				"description" => __("Active animation effect of the title.", 'patron'),
			),
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Font Size", 'patron'),
				"param_name"=> "size",
				"value"     => "",
				"description" => __("Title Font Size", 'patron'),
			),
			array(
				"type"      => "colorpicker",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Color", 'patron'),
				"param_name"=> "color",
				"value"     => "",
				"description" => __("Title Color", 'patron'),
			),
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Class Extra", 'patron'),
				"param_name"=> "class",
				"value"     => "",
				"description" => __("Class extra for style", 'patron'),
			),
			array(
				"type"      => "textarea",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Sub Title", 'patron'),
				"param_name"=> "subtitle",
				"value"     => "",
				"description" => __("Add Text", 'patron'),
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Content", 'patron' ),
				"param_name" => "ot_content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
				"value" => __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'patron' ),
				"description" => __( "Add Text Here", 'patron' )
		    ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Button Text", 'patron' ),
				"param_name" => "btn_text",
				"value" => "",
				"description" => __( "Add text that show inside the button", 'patron' )
		    ),
			array(
				"type" => "vc_link",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Custom Link", 'patron' ),
				"param_name" => "parmalink",
				"value" => "",
				"description" => __( "Add the permalink of the page with http:// or https://", 'patron' )
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Animation Style", 'patron'),
				"param_name" => "animation_style",
				"value" => array(   
							 __('Select Animation', 'patron') => '',
							 __('Fade In', 'patron') => 'fadeIn',
							 __('Fade In Left', 'patron') => 'fadeInLeft',
							 __('Fade In Right', 'patron') => 'fadeInRight',
							 __('Fade In Up', 'patron') => 'fadeInUp',
							 __('Fade In Down', 'patron') => 'fadeInDown',
							 __('Zoom In', 'patron') => 'zoomIn',
							 __('Flip Horizontal', 'patron') => 'flipInX',
							 __('Bounce', 'patron') => 'bounce',
							 __('bounce In', 'patron') => 'bounceIn',
							 __('Flash', 'patron') => 'flash',
							 __('Rubber Band', 'patron') => 'rubberBand',
							 __('Shake', 'patron') => 'shake',
							 __('Swing', 'patron') => 'swing',
							),
				"description" => __("Select your animation style default Fade In", 'patron'),
				'group' => __( 'Animation Effect', 'patron' ),
				"dependency"  => array( 'element' => 'animation', 'value' => array( 'yes' ) ),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Animation Delay Time", 'patron'),
				"param_name" => "delay_time",
				"value" => array(   
							 __('Animation delay', 'patron') => '300ms',
							 __('100ms', 'patron') => '100ms',
							 __('300ms', 'patron') => '300ms',
							 __('500ms', 'patron') => '500ms',
							 __('700ms', 'patron') => '700ms',
							 __('900ms', 'patron') => '900ms',
							 __('1100ms', 'patron') => '11000ms',
							 __('1300ms', 'patron') => '1300ms',
							),
				"description" => __("Select animation time delay default 300ms", 'patron'),
				'group' => __( 'Animation Effect', 'patron' ),
				"dependency"  => array( 'element' => 'animation', 'value' => array( 'yes' ) ),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Animation Duration Time", 'patron'),
				"param_name" => "duration_time",
				"value" => array(   
							 __('Animation duration', 'patron') => '500ms',
							 __('300ms', 'patron') => '300ms',
							 __('400ms', 'patron') => '400ms',
							 __('500ms', 'patron') => '500ms',
							 __('600ms', 'patron') => '600ms',
							 __('700ms', 'patron') => '700ms',
							 __('800ms', 'patron') => '800ms',
							 __('900ms', 'patron') => '900ms',
							 __('1000ms', 'patron') => '1000ms',
							),
				"description" => __("Select animation time duration default 500ms", 'patron'),
				'group' => __( 'Animation Effect', 'patron' ),
				"dependency"  => array( 'element' => 'animation', 'value' => array( 'yes' ) ),
			), 
		)
    ));
}




// Why Choose Content Grid
add_action( 'vc_before_init', 'pt_why_choose_integrate' );
function pt_why_choose_integrate(){
	vc_map( array(
	   "name" => __("OT Why Choose Content", 'patron'),
	   "base" => "ot_why_choose",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Grid Title", 'patron'),
				"param_name"=> "title",
				"value"     => "",
				"description" => __("Add title text", 'patron'),
			),
			array(
				"type"      => "textarea",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Content", 'patron'),
				"param_name"=> "box_text",
				"value"     => "",
				"description" => __("Add Text", 'patron'),
			),
			array(
				"type" => "dropdown",
				"heading" => __('Title Tag', 'patron'),
				"param_name" => "tag",
				"value" => array(
							 __('Select Tag', 'patron') => '',
							 __('h1', 'patron') => 'h1',
							 __('h2', 'patron') => 'h2',
							 __('h3', 'patron') => 'h3',  
							 __('h4', 'patron') => 'h4',
							 __('h5', 'patron') => 'h5',
							 __('h6', 'patron') => 'h6',  
							 __('p', 'patron')  => 'p',
							 __('div', 'patron') => 'div',
						),
				"description" => __("Section Element Tag default h5", 'patron'),      
			),
			array(
				"type" => "dropdown",
				"heading" => __('Text Align', 'patron'),
				"param_name" => "align",
				"value" => array( 
							 __('Select Align', 'patron') => '',
							 __('left', 'patron') => 'left',
							 __('right', 'patron') => 'right',               
							),
				"description" => __("Box content align from", 'patron'),      
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Gap Bottom", 'patron'),
				"param_name" => "box_gap",
				"value" => array(
							__('Select Gap', 'patron') => '',
							__('No Gap', 'patron') => '0',
							__('10px', 'patron') => '10',
							__('15px', 'patron') => '15',
							__('20px', 'patron') => '20',
							__('30px', 'patron') => '30',
							__('40px', 'patron') => '40',
							__('50px', 'patron') => '50',
						),
				"description" => __("Content box gap bottom of each grid Default 30px", 'patron'),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Visible Animation?", 'patron'),
				"param_name" => "animation",
				"value" => array(   
							 __('Yes', 'patron') => 'yes',
							 __('no', 'patron') => 'no',
							),
				"description" => __("Active animation effect with the grid", 'patron'),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Add Link", 'patron'),
				"param_name" => "add_link",
				"value" => array(
							__('No', 'patron') => 'no',
							__('Yes', 'patron') => 'yes',
						),
				"description" => __("Want custom link with title, Default No", 'patron'),
			),
			array(
				"type" => "vc_link",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Custom Link", 'patron' ),
				"param_name" => "parmalink",
				"value" => "",
				"description" => __( "Add the permalink of the any page with http:// or https://", 'patron' ),
				"dependency"  => array( 'element' => 'add_link', 'value' => array( 'yes' ) ),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Animation Style", 'patron'),
				"param_name" => "animation_style",
				"value" => array(   
							 __('Select Animation', 'patron') => '',
							 __('Fade In', 'patron') => 'fadeIn',
							 __('Fade In Left', 'patron') => 'fadeInLeft',
							 __('Fade In Right', 'patron') => 'fadeInRight',
							 __('Fade In Up', 'patron') => 'fadeInUp',
							 __('Fade In Down', 'patron') => 'fadeInDown',
							 __('Zoom In', 'patron') => 'zoomIn',
							 __('Flip Horizontal', 'patron') => 'flipInX',
							 __('Bounce', 'patron') => 'bounce',
							 __('bounce In', 'patron') => 'bounceIn',
							 __('Flash', 'patron') => 'flash',
							 __('Rubber Band', 'patron') => 'rubberBand',
							 __('Shake', 'patron') => 'shake',
							 __('Swing', 'patron') => 'swing',
							),
				"description" => __("Select your animation style default Fade In", 'patron'),
				'group' => __( 'Animation Effect', 'patron' ),
				"dependency"  => array( 'element' => 'animation', 'value' => array( 'yes' ) ),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Animation Delay Time", 'patron'),
				"param_name" => "delay_time",
				"value" => array(   
							 __('Animation delay', 'patron') => '300ms',
							 __('100ms', 'patron') => '100ms',
							 __('300ms', 'patron') => '300ms',
							 __('500ms', 'patron') => '500ms',
							 __('700ms', 'patron') => '700ms',
							 __('900ms', 'patron') => '900ms',
							 __('1100ms', 'patron') => '11000ms',
							 __('1300ms', 'patron') => '1300ms',
							),
				"description" => __("Select animation time delay default 300ms", 'patron'),
				'group' => __( 'Animation Effect', 'patron' ),
				"dependency"  => array( 'element' => 'animation', 'value' => array( 'yes' ) ),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Animation Duration Time", 'patron'),
				"param_name" => "duration_time",
				"value" => array(   
							 __('Animation duration', 'patron') => '500ms',
							 __('300ms', 'patron') => '300ms',
							 __('400ms', 'patron') => '400ms',
							 __('500ms', 'patron') => '500ms',
							 __('600ms', 'patron') => '600ms',
							 __('700ms', 'patron') => '700ms',
							 __('800ms', 'patron') => '800ms',
							 __('900ms', 'patron') => '900ms',
							 __('1000ms', 'patron') => '1000ms',
							),
				"description" => __("Select animation time duration default 500ms", 'patron'),
				'group' => __( 'Animation Effect', 'patron' ),
				"dependency"  => array( 'element' => 'animation', 'value' => array( 'yes' ) ),
			),
	    )
	));
}



// Achivement Simple
add_action( 'vc_before_init', 'pt_achivment_simple_integrate' );
function pt_achivment_simple_integrate(){
	vc_map( array(
	   "name" => __("OT Achivement Simple", 'patron'),
	   "base" => "ot_achivment_simple",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __('Show Counter Item', 'patron'),
				"param_name" => "count_item",
				"value" => array(
							 __('Select Number', 'patron') => 4,
							 __('2 Items', 'patron') => 2,
							 __('3 Items', 'patron') => 3,
							 __('4 Items', 'patron') => 4,
							),
				"description" => __("Select How many item you keep, max 4 itmes, default 4 itmes", 'patron'),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Quantity Title 1",
				"param_name" => "ac_title1",
				"value" => "",
				"description" => __("Add the title text", 'patron'),
				"group" => __( 'Count Data', 'patron' ),
				"dependency"  => array( 'element' => 'count_item', 'value' => array( '4', '3', '2' ) ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Quantity 1",
				"param_name" => "ac_quantity1",
				"value" => "",
				"description" => __("Quantity number", 'patron'),
				"group" => __( 'Count Data', 'patron' ),
				"dependency"  => array( 'element' => 'count_item', 'value' => array( '4', '3', '2' ) ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Quantity Title 2",
				"param_name" => "ac_title2",
				"value" => "",
				"description" => __("Add the title text", 'patron'),
				"group" => __( 'Count Data', 'patron' ),
				"dependency"  => array( 'element' => 'count_item', 'value' => array( '4', '3', '2' ) ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Quantity 2",
				"param_name" => "ac_quantity2",
				"value" => "",
				"description" => __("Quantity number", 'patron'),
				"group" => __( 'Count Data', 'patron' ),
				"dependency"  => array( 'element' => 'count_item', 'value' => array( '4', '3', '2' ) ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Quantity Title 3",
				"param_name" => "ac_title3",
				"value" => "",
				"description" => __("Add the title text", 'patron'),
				"group" => __( 'Count Data', 'patron' ),
				"dependency"  => array( 'element' => 'count_item', 'value' => array( '4', '3' ) ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Quantity 3",
				"param_name" => "ac_quantity3",
				"value" => "",
				"description" => __("Quantity number", 'patron'),
				"group" => __( 'Count Data', 'patron' ),
				"dependency"  => array( 'element' => 'count_item', 'value' => array( '4', '3' ) ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Quantity Title 4",
				"param_name" => "ac_title4",
				"value" => "",
				"description" => __("Add the title text", 'patron'),
				"group" => __( 'Count Data', 'patron' ),
				"dependency"  => array( 'element' => 'count_item', 'value' => array( '4' ) ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Quantity 4",
				"param_name" => "ac_quantity4",
				"value" => "",
				"description" => __("Quantity number", 'patron'),
				"group" => __( 'Count Data', 'patron' ),
				"dependency"  => array( 'element' => 'count_item', 'value' => array( '4' ) ),
			),
	    )
	));
}



// Working Experience
add_action( 'vc_before_init', 'pt_working_experience_integrate' );
function pt_working_experience_integrate(){
	vc_map( array(
	   "name" => __("OT Working Experience", 'patron'),
	   "base" => "ot_working_experience",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Company/Organization", 'patron'),
				"param_name" => "org_name",
				"value"     => "",
				"description" => __("Add name where worked before", 'patron'),
			),
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Year Of Start", 'patron'),
				"param_name" => "start_year",
				"value"     => "",
				"description" => __("Start of the working year", 'patron'),
			),
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Year Of End", 'patron'),
				"param_name" => "end_year",
				"value"     => "",
				"description" => __("End of the working year", 'patron'),
			),
			array(
				"type"      => "textarea",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Description", 'patron'),
				"param_name" => "description",
				"value"     => "",
				"description" => __("Add the description of experience", 'patron'),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content position", 'patron'),
				"param_name" => "ot_position",
				"value" => array(
							__('Left', 'patron') => 'left',
							__('Right', 'patron') => 'right',
						),
				"description" => __("Select the position of the content, default right", 'patron'),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Gap Bottom", 'patron'),
				"param_name" => "box_gap",
				"value" => array(
							__('Select Gap', 'patron') => '',
							__('No Gap', 'patron') => '0',
							__('10px', 'patron') => '10',
							__('15px', 'patron') => '15',
							__('20px', 'patron') => '20',
							__('30px', 'patron') => '30',
							__('40px', 'patron') => '40',
							__('50px', 'patron') => '50',
						),
				"description" => __("Content box gap bottom of each grid Default 30px", 'patron'),
			),
	    )
	));
}



// Skill Average Progress Bar
add_action( 'vc_before_init', 'pt_skill_bar_integrate' );
function pt_skill_bar_integrate(){
	vc_map( array(
	   "name" => __("OT Skill Bar", 'patron'),
	   "base" => "ot_skill_bar",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				'type' => 'param_group',
				'heading' => __( 'Values', 'patron' ),
				'param_name' => 'values',
				'description' => __( 'Enter values for skill bar.', 'patron' ),
				'value' => urlencode( json_encode( array(
					array(
						'label' => __( 'Development', 'patron' ),
						'value' => '0',
					),
				) )),
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => __( 'Skill Type', 'patron' ),
						'param_name' => 'skill',
						'description' => __( 'Enter text used as title of skill.', 'patron' ),
						'admin_label' => true,
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Value', 'patron' ),
						'param_name' => 'value',
						'description' => __( 'Enter value of bar.', 'patron' ),
						'admin_label' => true,
					),
				),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Data Speed", 'patron'),
				"param_name" => "data_speed",
				"value" => array(
							__('Default', 'patron') => '3000',
							__('1000', 'patron') => '1000',
							__('2000', 'patron') => '2000',
							__('3000', 'patron') => '3000',
							__('4000', 'patron') => '4000',
							__('5000', 'patron') => '5000',
						),
				"description" => __("Content box gap bottom of each grid Default 30px", 'patron'),
			),
	    )
	));
}



// Educational Experience List
add_action( 'vc_before_init', 'pt_edu_info_integrate' );
function pt_edu_info_integrate(){
	vc_map( array(
	   "name" => __("OT Education Info", 'patron'),
	   "base" => "ot_edu_info",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				'type' => 'param_group',
				'heading' => __( 'Education', 'patron' ),
				'param_name' => 'values',
				'description' => __( 'Enter values for list of education skill.', 'patron' ),
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => __( 'Education Title', 'patron' ),
						'param_name' => 'edu',
						'description' => __( 'Enter text used as title of skill.', 'patron' ),
						'admin_label' => true,
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Start', 'patron' ),
						'param_name' => 'start_year',
						'description' => __( 'Enter value of the start year.', 'patron' ),
						'admin_label' => true,
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'End', 'patron' ),
						'param_name' => 'end_year',
						'description' => __( 'Enter value of the end year.', 'patron' ),
						'admin_label' => true,
					),
				),
			),
	    )
	));
}




// Team Grid Slider
add_action( 'vc_before_init', 'pt_team_grid_integrate' );
function pt_team_grid_integrate(){
	vc_map( array(
	   "name" => __("OT Team Member Slide", 'patron'),
	   "base" => "ot_team_grid",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Number Of Item",
				"param_name" => "item_show",
				"value" => "",
				"description" => __("Enter the number of testimonial item slide.", 'patron')
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Active Slide Effect?", 'patron'),
				"param_name" => "slider",
				"value" => array(   
							 __('Yes', 'patron') => 'yes',
							 __('no', 'patron') => 'no',
							),
				"description" => __("Do you need testimonial slide, default yes", 'patron'),
			),
	   )
	));
}




// Testmonial Style 2
add_action( 'vc_before_init', 'pt_testimonial_slide2_integrate' );
function pt_testimonial_slide2_integrate(){
	vc_map( array(
	   "name" => __("OT Testimonial Slider2", 'patron'),
	   "base" => "ot_testimonial_slide2",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Slide Testmonial Itmes",
				"param_name" => "item_show",
				"value" => "",
				"description" => __("Enter the number of testimonial item slide.", 'patron')
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Active Slide Effect?", 'patron'),
				"param_name" => "slider",
				"value" => array(   
							 __('Yes', 'patron') => 'yes',
							 __('no', 'patron') => 'no',
							),
				"description" => __("Do you need testimonial slide, default yes", 'patron'),
			),
	   )
	));
}



// Pricing Table
add_action( 'vc_before_init', 'pt_pricing_table_integrate' );
function pt_pricing_table_integrate(){
	vc_map( array(
	   "name" => __("OT Pricing Table", 'patron'),
	   "base" => "ot_pricing_table",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Plan Heading",
				"param_name" => "title",
				"value" => "",
				"description" => __("Pricing Plan Title", 'patron')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Currency",
				"edit_field_class" => "vc_col-sm-2",
				"param_name" => "currency",
				"value" => "",
				"description" => __("Write down the currency, default is doller", 'patron')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Plan Price",
				"edit_field_class" => "vc_col-sm-6",
				"param_name" => "price",
				"value" => "",
				"description" => __("Plan price amount", 'patron')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Float Price Amount",
				"param_name" => "float_value",
				"value" => "99",
				"description" => __("Input the float price amount default .99", 'patron'),
				"dependency"  => array( 'element' => 'float_query', 'value' => 'yes' ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Instalment Type",
				"param_name" => "instalment",
				"value" => "Monthly",
				"description" => __("Plan price amount", 'patron')
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Keep Float Value?", 'patron'),
				"param_name" => "float_query",
				"value" => array(   
							 __('Yes', 'patron') => 'yes',
							 __('no', 'patron') => 'no',
							),
				"description" => __("Do you want to keep the float value after the price?", 'patron'),
			),
			array(
				'type' => 'param_group',
				'heading' => __( 'Facility', 'patron' ),
				'param_name' => 'values',
				'description' => __( 'Enter values for list of oppertunities', 'patron' ),
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => __( 'Text', 'patron' ),
						'param_name' => 'fac_list',
						'description' => __( 'Enter the oppertunities', 'patron' ),
						'admin_label' => true,
					),
				),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Choose Button Style", 'patron'),
				"param_name" => "btn_style",
				"value" => array(  
							 __('Select Style', 'patron') => '',
							 __('Primary', 'patron') => 'btn-primary',
							 __('Secondary', 'patron') => 'btn-secondary',
							 __('Link', 'patron') => 'btn-link',
							),
				"description" => __("Choose button each option has defferent style", 'patron'),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Button Text", 'patron' ),
				"param_name" => "btn_text",
				"value" => "",
				"description" => __( "Add text that show inside the button", 'patron' )
		    ),
			array(
				"type" => "vc_link",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Custom Link", 'patron' ),
				"param_name" => "parmalink",
				"value" => "",
				"description" => __( "Add the permalink of the page with http:// or https://", 'patron' )
			),
		)
	));
}




// Simple Text Banner
add_action( 'vc_before_init', 'pt_simple_banner_integrate' );
function pt_simple_banner_integrate(){
	vc_map( array(
	   "name" => __("OT Simple Banner", 'patron'),
	   "base" => "ot_simple_banner",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Banner Headline",
				"param_name" => "title",
				"value" => "",
				"description" => __("Pricing Plan Title", 'patron'),
			),
			array(
			"type" => "dropdown",
			"heading" => __('Element Tag', 'patron'),
			"param_name" => "tag",
			"value" => array(
						 __('Select Tag', 'patron') => '',
						 __('h1', 'patron') => 'h1',
						 __('h2', 'patron') => 'h2',
						 __('h3', 'patron') => 'h3',  
						 __('h4', 'patron') => 'h4',
						 __('h5', 'patron') => 'h5',
						 __('h6', 'patron') => 'h6',  
						 __('p', 'patron')  => 'p',
						 __('div', 'patron') => 'div',
						),

			"description" => __("Section Element Tag default h2", 'patron'),      
			),
			array(
				"type"      => "textarea",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Sub Title", 'patron'),
				"param_name"=> "subtitle",
				"value"     => "",
				"description" => __("Add Text", 'patron')
			),
			array(
				"type"      => "colorpicker",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Text Color", 'patron'),
				"param_name"=> "color",
				"value"     => "",
				"description" => __("Select the font color", 'patron'),
			),
		)
	));
}



// 3Grid Text Banner
add_action( 'vc_before_init', 'pt_3grid_banner_integrate' );
function pt_3grid_banner_integrate(){
	vc_map( array(
	   "name" => __("OT 3Grid Text Banner", 'patron'),
	   "base" => "ot_3grid_banner",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Grid Icon Class",
				"param_name" => "icon_left",
				"value" => "",
				"description" => __("Fontawesome icon class", 'patron'),
				"group" => __("Left Box", 'patron'),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Grid Title",
				"param_name" => "title_left",
				"value" => "",
				"description" => __("Left grid title", 'patron'),
				"group" => __("Left Box", 'patron'),
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Description",
				"param_name" => "content_left",
				"value" => "",
				"description" => __("Details Text", 'patron'),
				"group" => __("Left Box", 'patron'),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Grid Icon Class",
				"param_name" => "icon_mid",
				"value" => "",
				"description" => __("Fontawesome icon class", 'patron'),
				"group" => __("Middle Box", 'patron'),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Grid Title",
				"param_name" => "title_mid",
				"value" => "",
				"description" => __("Middle grid title", 'patron'),
				"group" => __("Middle Box", 'patron'),
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Description",
				"param_name" => "content_mid",
				"value" => "",
				"description" => __("Details Text", 'patron'),
				"group" => __("Middle Box", 'patron'),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Grid Icon Class",
				"param_name" => "icon_right",
				"value" => "",
				"description" => __("Fontawesome icon class", 'patron'),
				"group" => __("Right Box", 'patron'),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Grid Title",
				"param_name" => "title_right",
				"value" => "",
				"description" => __("Right grid title text", 'patron'),
				"group" => __("Right Box", 'patron'),
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Description",
				"param_name" => "content_right",
				"value" => "",
				"description" => __("Details Text", 'patron'),
				"group" => __("Right Box", 'patron'),
			),
			array(
				"type"      => "colorpicker",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Text Color", 'patron'),
				"param_name"=> "color",
				"value"     => "",
				"description" => __("Select the font color", 'patron'),
				"group" => __("Settings", 'patron'),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Keep Top Line", 'patron'),
				"param_name" => "top_line",
				"value" => array(   
							 __('Yes', 'patron') => 'yes',
							 __('no', 'patron') => 'no',
							),
				"description" => __("Do you want to keep the top line of the content?", 'patron'),
				"group" => __("Settings", 'patron'),
			),
		)
	));
}




// OT Testimonial Filter
add_action( 'vc_before_init', 'pt_testmonial_filter_integrate' );
function pt_testmonial_filter_integrate(){
	vc_map( array(
	   "name" => __("OT Testimonial Filter", 'patron'),
	   "base" => "ot_testmonial_filter",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
			 "type"      => "textfield",
			 "holder"    => "div",
			 "class"     => "",
			 "heading"   => __("Title Text", 'patron'),
			 "param_name"=> "title",
			 "value"     => "",
			 "description" => __("Add title text", 'patron')
			),
			array(
			 "type" => "dropdown",
			 "holder"    => "div",
			 "class"     => "",
			 "heading" => __('Element Tag', 'patron'),
			 "param_name" => "tag",
			 "value" => array(
						 __('Select Tag', 'patron') => '',
						 __('h1', 'patron') => 'h1',
						 __('h2', 'patron') => 'h2',
						 __('h3', 'patron') => 'h3',  
						 __('h4', 'patron') => 'h4',
						 __('h5', 'patron') => 'h5',
						 __('h6', 'patron') => 'h6',  
						 __('p', 'patron')  => 'p',
						 __('div', 'patron') => 'div',
						),

			 "description" => __("Section Element Tag default h2", 'patron'),      
			),
			array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "edit_field_class" => "vc_col-sm-6",
			 "heading" => __("Items per page", 'patron'),
			 "param_name" => "num",
			 "value" => 5,
			 "description" => __("Set max limit number of items to show per page or enter -1 to display all", 'patron' )
			),
			array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "edit_field_class" => "vc_col-sm-6",
			 "heading" => __("Show Pagination", 'patron'),
			 "param_name" => "pagination",
			 "value" => array(   
						 __('No', 'patron') => 'no',                     
						 __('Yes', 'patron') => 'yes',
						),
			 "description" => __("Select pagination show/hide.", 'patron')
			),
			array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "edit_field_class" => "vc_col-sm-6",
			 "heading" => __("Bottom Gap", 'patron'),
			 "param_name" => "gap",
			 "value" => array(   
						  __('0px', 'patron') => 0,
						  __('1px', 'patron') => 1,
						  __('2px', 'patron') => 2,
						  __('3px', 'patron') => 3,
						  __('4px', 'patron') => 4,
						  __('5px', 'patron') => 5,
						  __('10px', 'patron') => 10,
						  __('15px', 'patron') => 15,
						  __('20px', 'patron') => 20,
						  __('25px', 'patron') => 25,
						  __('30px', 'patron') => 30,
						  __('35px', 'patron') => 35,
						),
			 "description" => __("Select gap between grid elements default 30px.", 'patron')
			),
			array(
			 "type"      => "colorpicker",
			 "holder"    => "div",
			 "class"     => "",
			 "edit_field_class" => "vc_col-sm-6",
			 "heading"   => __("Grid Background Color", 'patron'),
			 "param_name"=> "bg_color",
			 "value"     => "",
			 "description" => __("Select the bg color", 'patron'),
			),
			array(
			 "type"      => "textfield",
			 "holder"    => "div",
			 "class"     => "",
			 "heading"   => __("Extra class name", 'patron'),
			 "param_name"=> "extraclass",
			 "value"     => "",
			 "description" => __("Style particular content element differently - add a class name and refer to it in custom CSS.", 'patron')
			),
		)
	));
}



// OT History List Content
add_action( 'vc_before_init', 'pt_history_content_integrate' );
function pt_history_content_integrate(){
	vc_map( array(
	   "name" => __("OT Company History", 'patron'),
	   "base" => "ot_history_content",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Title Text", 'patron'),
				"param_name"=> "title",
				"value"     => "",
				"description" => __("Add title text", 'patron'),
			),
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"edit_field_class" => "vc_col-sm-6",
				"heading"   => __("Year From", 'patron'),
				"param_name"=> "start_year",
				"value"     => "",
				"description" => __("Add Year of history begin", 'patron'),
			),
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"edit_field_class" => "vc_col-sm-6",
				"heading"   => __("Year To", 'patron'),
				"param_name"=> "end_year",
				"value"     => "",
				"description" => __("Add Year of history begin end", 'patron'),
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Content", 'patron' ),
				"param_name" => "ot_content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
				"value" => __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'patron' ),
				"description" => __( "Add Text Here", 'patron' ),
		    ),
			array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Show Link", 'patron'),
			 "param_name" => "btn",
			 "value" => array( 
						 __('Yes', 'patron') => 'yes',
						 __('No', 'patron') => 'no',                     
						),
			 "description" => __("Keep history details reading link", 'patron')
			),
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Button Text", 'patron'),
				"param_name"=> "btn_text",
				"value"     => "",
				"description" => __("Button Text", 'patron'),
				"dependency"  => array( 'element' => 'btn', 'value' => array( 'yes' ) ),
			),
			array(
				"type" => "vc_link",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Custom Link", 'patron' ),
				"param_name" => "parmalink",
				"value" => "",
				"description" => __( "Add the permalink of the page with http:// or https://", 'patron' ),
				"dependency"  => array( 'element' => 'btn', 'value' => array( 'yes' ) ),
			),
		)
	));
}




// OT Award Grid
add_action( 'vc_before_init', 'pt_award_grid_integrate' );
function pt_award_grid_integrate(){
	vc_map( array(
	   "name" => __("OT Award Grid", 'patron'),
	   "base" => "ot_award_grid",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type"      => "attach_image",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Award Image", 'patron'),
				"param_name"=> "award_img",
				"value"     => "",
				"description" => __("Add Award Image", 'patron')
			),
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Title Text", 'patron'),
				"param_name"=> "title",
				"value"     => "",
				"description" => __("Add title text", 'patron'),
			),
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Award By", 'patron'),
				"param_name"=> "institute",
				"value"     => "",
				"description" => __("Add the institute name of the award provider", 'patron'),
			),
			array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "edit_field_class" => "vc_col-sm-3",
			 "heading" => __("Award Date", 'patron'),
			 "param_name" => "date",
			 "value" => array(   
						  __('Select Date', 'patron') => '',
						  __('1', 'patron') => 1,
						  __('2', 'patron') => 2,
						  __('3', 'patron') => 3,
						  __('4', 'patron') => 4,
						  __('5', 'patron') => 5,
						  __('6', 'patron') => 6,
						  __('7', 'patron') => 7,
						  __('8', 'patron') => 8,
						  __('9', 'patron') => 9,
						  __('10', 'patron') => 10,
						  __('11', 'patron') => 11,
						  __('12', 'patron') => 12,
						  __('13', 'patron') => 13,
						  __('14', 'patron') => 14,
						  __('15', 'patron') => 15,
						  __('16', 'patron') => 16,
						  __('17', 'patron') => 17,
						  __('18', 'patron') => 18,
						  __('19', 'patron') => 19,
						  __('20', 'patron') => 20,
						  __('21', 'patron') => 21,
						  __('22', 'patron') => 22,
						  __('23', 'patron') => 23,
						  __('24', 'patron') => 24,
						  __('25', 'patron') => 25,
						  __('26', 'patron') => 26,
						  __('27', 'patron') => 27,
						  __('28', 'patron') => 28,
						  __('29', 'patron') => 29,
						  __('30', 'patron') => 30,
						  __('31', 'patron') => 31,
						),
			 "description" => __("Select date", 'patron')
			),
			array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "edit_field_class" => "vc_col-sm-3",
			 "heading" => __("Award Month", 'patron'),
			 "param_name" => "month",
			 "value" => array(   
						  __('Select Month', 'patron') => '',
						  __('January', 'patron') => 'January',
						  __('February', 'patron') => 'February',
						  __('March', 'patron') => 'March',
						  __('April', 'patron') => 'April',
						  __('May', 'patron') => 'May',
						  __('June', 'patron') => 'June',
						  __('July', 'patron') => 'July',
						  __('August', 'patron') => 'August',
						  __('September', 'patron') => 'September',
						  __('October', 'patron') => 'October',
						  __('November', 'patron') => 'November',
						  __('December', 'patron') => 'December',
						),
			 "description" => __("Select date", 'patron')
			),
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"edit_field_class" => "vc_col-sm-3",
				"heading"   => __("Award Year", 'patron'),
				"param_name"=> "year",
				"value"     => "",
				"description" => __("Just write the year", 'patron')
			),
			array(
				"type"      => "textarea",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Description", 'patron'),
				"param_name"=> "award_text",
				"value"     => "",
				"description" => __("Add Text", 'patron')
			),
			array(
				"type" => "vc_link",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Custom Link", 'patron' ),
				"param_name" => "parmalink",
				"value" => "",
				"description" => __( "Add the permalink of the page with http:// or https://", 'patron' ),
			),
		)
	));
}



// OT Team Member Filter
add_action( 'vc_before_init', 'pt_team_filter_integrate' );
function pt_team_filter_integrate(){
	vc_map( array(
	   "name" => __("OT Team Filter", 'patron'),
	   "base" => "ot_team_filter",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Items per page", 'patron'),
			 "param_name" => "num",
			 "value" => 10,
			 "description" => __("Set max limit number of items to show per page or enter -1 to display all", 'patron' )
			),
			array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "edit_field_class" => "vc_col-sm-6",
			 "heading" => __("Show Pagination", 'patron'),
			 "param_name" => "pagination",
			 "value" => array(   
						 __('No', 'patron') => 'no',                     
						 __('Yes', 'patron') => 'yes',
						),
			 "description" => __("Select pagination show/hide.", 'patron')
			),
			array(
			 "type"      => "colorpicker",
			 "holder"    => "div",
			 "class"     => "",
			 "edit_field_class" => "vc_col-sm-6",
			 "heading"   => __("Grid Background Color", 'patron'),
			 "param_name"=> "bg_color",
			 "value"     => "",
			 "description" => __("Select the bg color", 'patron'),
			),
			array(
			 "type"      => "textfield",
			 "holder"    => "div",
			 "class"     => "",
			 "heading"   => __("Extra class name", 'patron'),
			 "param_name"=> "extraclass",
			 "value"     => "",
			 "description" => __("Style particular content element differently - add a class name and refer to it in custom CSS.", 'patron')
			),
		)
	));
}



// OT Gallery Filter
add_action( 'vc_before_init', 'pt_gallery_filter_integrate' );
function pt_gallery_filter_integrate(){
	vc_map( array(
	   "name" => __("OT Gallery Filter", 'patron'),
	   "base" => "ot_gallery_filter",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Items per page", 'patron'),
			 "param_name" => "num",
			 "value" => 12,
			 "description" => __("Set max limit number of items to show per page or enter -1 to display all", 'patron' )
			),
			array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "edit_field_class" => "vc_col-sm-6",
			 "heading" => __("Thumbnail Gap", 'patron'),
			 "param_name" => "gap",
			 "value" => array(   
						 __('No', 'patron') => 'no',                     
						 __('Yes', 'patron') => 'yes',
						),
			 "description" => __("Space between thumbnail", 'patron')
			),
			array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "edit_field_class" => "vc_col-sm-6",
			 "heading" => __("Column", 'patron'),
			 "param_name" => "column",
			 "value" => array(   
						 __('Select Grid Column', 'patron') => '',                   
						 __('3 Column', 'patron') => 3,                   
						 __('4 Column', 'patron') => 4,
						 __('6 Column', 'patron') => 6,
						),
			 "description" => __("Column show for grid item, default 4 column", 'patron')
			),
			array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "edit_field_class" => "vc_col-sm-6",
			 "heading" => __("Show Pagination", 'patron'),
			 "param_name" => "pagination",
			 "value" => array(   
						 __('No', 'patron') => 'no',                     
						 __('Yes', 'patron') => 'yes',
						),
			 "description" => __("Select pagination show/hide.", 'patron')
			),
			array(
			 "type"      => "colorpicker",
			 "holder"    => "div",
			 "class"     => "",
			 "edit_field_class" => "vc_col-sm-6",
			 "heading"   => __("Grid Background Color", 'patron'),
			 "param_name"=> "bg_color",
			 "value"     => "",
			 "description" => __("Select the bg color", 'patron'),
			),
			array(
			 "type"      => "textfield",
			 "holder"    => "div",
			 "class"     => "",
			 "heading"   => __("Extra class name", 'patron'),
			 "param_name"=> "extraclass",
			 "value"     => "",
			 "description" => __("Style particular content element differently - add a class name and refer to it in custom CSS.", 'patron')
			),
		)
	));
}



// Download Banner
add_action( 'vc_before_init', 'pt_download_banner_integrate' );
function pt_download_banner_integrate(){
	vc_map( array(
	   "name" => __("OT Download Banner", 'patron'),
	   "base" => "ot_download_banner",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Banner Title", 'patron'),
				"param_name"=> "title",
				"value"     => "",
				"description" => __("Add title text", 'patron'),
			),
			array(
				"type" => "dropdown",
				"heading" => __('Element Tag', 'patron'),
				"param_name" => "tag",
				"value" => array(
							 __('Select Tag', 'patron') => '',
							 __('h1', 'patron') => 'h1',
							 __('h2', 'patron') => 'h2',
							 __('h3', 'patron') => 'h3',  
							 __('h4', 'patron') => 'h4',
							 __('h5', 'patron') => 'h5',
							 __('h6', 'patron') => 'h6',  
							 __('p', 'patron')  => 'p',
							 __('div', 'patron') => 'div',
							),

				"description" => __("Section Element Tag default h3", 'patron'),      
			),
			array(
				"type"      => "colorpicker",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Color", 'patron'),
				"param_name"=> "color",
				"value"     => "",
				"description" => __("Title font color default #fff", 'patron'),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Choose Button Style", 'patron'),
				"param_name" => "btn_style",
				"value" => array(  
							 __('Select Style', 'patron') => '',
							 __('Primary', 'patron') => 'btn-primary',
							 __('Secondary', 'patron') => 'btn-secondary',
							 __('Link', 'patron') => 'btn-link',
							),
				"description" => __("Choose button each option has defferent style", 'patron'),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Button Text", 'patron' ),
				"param_name" => "btn_text",
				"value" => "",
				"description" => __( "Add text that show inside the button", 'patron' )
		    ),
			array(
				"type" => "vc_link",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Custom Link", 'patron' ),
				"param_name" => "parmalink",
				"value" => "",
				"description" => __( "Add the permalink of the page with http:// or https://", 'patron' )
			),
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Class Extra", 'patron'),
				"param_name"=> "class",
				"value"     => "",
				"description" => __("Class extra for style", 'patron'),
			),
		)
	));
}




// Brand Logo
add_action( 'vc_before_init', 'pt_brand_logo_integrate' );
function pt_brand_logo_integrate(){
	vc_map( array(
	   "name" => __("OT Brand Logo", 'patron'),
	   "base" => "ot_brand_logo",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				'type' => 'param_group',
				'heading' => __( 'Values', 'patron' ),
				'param_name' => 'values',
				'description' => __( 'Upload brand logo image', 'patron' ),
				'value' => urlencode( json_encode( array(
					array(
						'label' => __( 'Development', 'patron' ),
						'value' => '0',
					),
				) )),
				'params' => array(
					array(
						"type"      => "attach_image",
						"holder"    => "div",
						"class"     => "",
						"heading"   => __("Brand Image", 'patron'),
						"param_name"=> "attachment",
						"value"     => "",
						"description" => __("Add Brand Image", 'patron')
					),
					array(
						"type" => "vc_link",
						"holder" => "div",
						"class" => "",
						"heading" => __( "Custom Link", 'patron' ),
						"param_name" => "parmalink",
						"value" => "",
						"description" => __( "Add the permalink of the page with http:// or https://", 'patron' )
					),
				),
			),
	    )
	));
}


// Video Link and Popup
add_action( 'vc_before_init', 'pt_video_popup_integrate' );
function pt_video_popup_integrate(){
	vc_map( array(
	   "name" => __("OT Video Popup", 'patron'),
	   "base" => "ot_video_popup",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type" => "vc_link",
				"holder" => "div",
				"class" => "",
				"heading" => __("Enter Your Video Link", 'patron'),
				"param_name" => "video_link",
				"value" => "",
				"description" => __("Your video link, the link look like https://vimeo.com/173404890", 'patron')
		    ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Keep the animation?", 'patron'),
				"param_name" => "animation",
				"value" => array(
					 __('Yes', 'patron') => 'yes',
					 __('No', 'patron') => 'no',                     
				),
				"description" => __("Parallax animation yes/no", 'patron')
			),
			array(
				"type"      => "attach_image",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Video Poster", 'patron'),
				"param_name"=> "poster",
				"value"     => "",
				"description" => __("Add video poster and overlay image", 'patron')
			),
	    )
	));
}



// Shadow Content Box
add_action( 'vc_before_init', 'pt_shadow_content_integrate' );
function pt_shadow_content_integrate(){
	vc_map( array(
	   "name" => __("OT Box-Shadow Content", 'patron'),
	   "base" => "ot_shadow_content",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Main Headline", 'patron'),
				"param_name"=> "title",
				"value"     => "",
				"description" => __("Add title text", 'patron')
			),
			array(
				"type" => "dropdown",
				"heading" => __('Element Tag', 'patron'),
				"param_name" => "tag",
				"value" => array(
							 __('Select Tag', 'patron') => '',
							 __('h1', 'patron') => 'h1',
							 __('h2', 'patron') => 'h2',
							 __('h3', 'patron') => 'h3',  
							 __('h4', 'patron') => 'h4',
							 __('h5', 'patron') => 'h5',
							 __('h6', 'patron') => 'h6',  
							 __('p', 'patron')  => 'p',
							 __('div', 'patron') => 'div',
							),

				"description" => __("Section Element Tag default h2", 'patron'),      
			),
			array(
				"type"      => "textarea",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Sub Title", 'patron'),
				"param_name"=> "subtitle",
				"value"     => "",
				"description" => __("Add Text", 'patron')
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Content", 'patron' ),
				"param_name" => "ot_content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
				"value" => __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'patron' ),
				"description" => __( "Add Text Here", 'patron' )
		    ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Grid Background", 'patron'),
				"param_name" => "grid_bg",
				"value" => array(
						__('Select Background', 'patron') => '',
						__('White', 'patron') => 'bg-white',
						__('Gray', 'patron') => 'bg-gray',
						__('Dark', 'patron') => 'bg-dark',
					),
				"description" => __("Select number columns for show.", 'patron')
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Need box shadow?", 'patron'),
				"param_name" => "box_shadow",
				"value" => array(
					 __('Yes', 'patron') => 'yes',
					 __('No', 'patron') => 'no',                     
				),
				"description" => __("Active box shadow with yes/no", 'patron')
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Show service button?", 'patron'),
				"param_name" => "show_btn",
				"value" => array(   
					 __('Yes', 'patron') => 'yes',
					 __('no', 'patron') => 'no',
					),
				"description" => __("Option show/hide button on service grid.", 'patron'),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Button text",
				"param_name" => "btn_text",
				"value" => "",
				"description" => __("Add button text, default: read more.", 'patron'),
				"dependency"  => array( 'element' => 'show_btn', 'value' => 'yes' ), 
			),
			array(
				"type" => "vc_link",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Parmalink Link", 'patron' ),
				"param_name" => "parmalink",
				"value" => "",
				"description" => __( "Add the permalink of the button with http:// or https://", 'patron' )
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Choose Button Style", 'patron'),
				"param_name" => "btn_style",
				"value" => array(  
							 __('Select Style', 'patron') => '',
							 __('Primary', 'patron') => 'btn-primary',
							 __('Secondary', 'patron') => 'btn-secondary',
							 __('Link', 'patron') => 'btn-link',
							),
				"description" => __("Choose button each option has defferent style", 'patron'),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Button Space Top", 'patron'),
				"param_name" => "margin",
				"value" => array( 
							 __('No Margin', 'patron') => '',
							 __('10px', 'patron') => '10',
							 __('15px', 'patron') => '15',
							 __('20px', 'patron') => '20',
							 __('30px', 'patron') => '30',
							 __('50px', 'patron') => '50',
							),
				"description" => __("Select the button margin from top", 'patron'),
			),
	    )
	));
}




// Icon Content Box
add_action( 'vc_before_init', 'pt_icon_content_integrate' );
function pt_icon_content_integrate(){
	vc_map( array(
	   "name" => __("OT Icon Content", 'patron'),
	   "base" => "ot_icon_content",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Main Headline", 'patron'),
				"param_name"=> "title",
				"value"     => "",
				"description" => __("Add title text", 'patron')
			),
			array(
				"type" => "dropdown",
				"heading" => __('Element Tag', 'patron'),
				"param_name" => "tag",
				"value" => array(
							 __('Select Tag', 'patron') => '',
							 __('h1', 'patron') => 'h1',
							 __('h2', 'patron') => 'h2',
							 __('h3', 'patron') => 'h3',  
							 __('h4', 'patron') => 'h4',
							 __('h5', 'patron') => 'h5',
							 __('h6', 'patron') => 'h6',  
							 __('p', 'patron')  => 'p',
							 __('div', 'patron') => 'div',
							),

				"description" => __("Title Element Tag default h5", 'patron'),      
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Content", 'patron' ),
				"param_name" => "ot_content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
				"value" => __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'patron' ),
				"description" => __( "Add Text Here", 'patron' )
		    ),
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Icon Class", 'patron'),
				"param_name"=> "icon_name",
				"value"     => "",
				"description" => __("Write the icon class name", 'patron')
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon position", 'patron'),
				"param_name" => "icon_position",
				"value" => array(
					 __('Left', 'patron') => 'left',
					 __('Top', 'patron') => 'top',                     
				),
				"description" => __("Set the icon position", 'patron')
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Box Gap bottom", 'patron'),
				"param_name" => "margin",
				"value" => array( 
							 __('No Margin', 'patron') => '',
							 __('10px', 'patron') => '10',
							 __('15px', 'patron') => '15',
							 __('20px', 'patron') => '20',
							 __('30px', 'patron') => '30',
							 __('50px', 'patron') => '50',
							),
				"description" => __("Select the box margin bottom", 'patron'),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Gap Top", 'patron'),
				"param_name" => "top_margin",
				"value" => array( 
							 __('No Margin', 'patron') => '',
							 __('10px', 'patron') => '10',
							 __('15px', 'patron') => '15',
							 __('20px', 'patron') => '20',
							 __('30px', 'patron') => '30',
							 __('50px', 'patron') => '50',
							),
				"description" => __("Select the box margin bottom", 'patron'),
			),
	    )
	));
}



// Google Map
add_action( 'vc_before_init', 'pt_gmap_integrate' );
function pt_gmap_integrate(){
	vc_map( array(
	   "name" => __("OT Google Map", 'patron'),
	   "base" => "ot_gmap",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Map Height", 'patron'),
				"param_name"=> "height",
				"value"     => 500,
				"description" => __("Set the map height default is 500px", 'patron')
			),
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Latitude", 'patron'),
				"param_name"=> "latitude",
				"value"     => 40.672324,
				"description" => __("Please enter Latitude google map", 'patron')
			),
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Longitude", 'patron'),
				"param_name"=> "longitude",
				"value"     => -74.357372,
				"description" => __("Please enter Longitude google map", 'patron')
			),
			array(
				"type"      => "textfield",
				"holder"    => "div",
				"class"     => "",
				"heading"   => __("Zoom Map", 'patron'),
				"param_name"=> "zoom_map",
				"value"     => 14,
				"description" => __("Please enter Zoom Map, Default: 15", 'patron')
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Map Marker",
				"param_name" => "map_icon",
				"value" => "",
				"description" => __("Icon Map marker, 64 x 64", 'patron')
			),
			array(
			    "type" => "dropdown",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Select Map Style", 'patron'),
			    "param_name" => "style",
			    "value" => array(                        
						__('Style 1: Dark', 'patron') => 'dark',
						__('Style 2: Light', 'patron') => 'light',
						__('Customize Gmap Style', 'patron') => 'customize_gmap',
					),
			    "description" => __("Select your style for gmap.", 'patron')
		    ), 
	    )
	));
}




// List Content Style
add_action( 'vc_before_init', 'pt_list_style_integrate' );
function pt_list_style_integrate(){
	vc_map( array(
	   "name" => __("OT List Style Content", 'patron'),
	   "base" => "ot_list_style",
	   "class" => "",
	   "category" => __( "Patron Widget", 'patron'),
	   "icon" => "icon-st",
	   "params" => array(
			array(
			    "type" => "dropdown",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Select List Style", 'patron'),
			    "param_name" => "style",
			    "value" => array( 
						__('No Style', 'patron') => '',
						__('Circle Style', 'patron') => 'fa-circle-o',
						__('Check Box Syle', 'patron') => 'fa-check-square-o',
						__('Number Style', 'patron') => 'list-number',
					),
			    "description" => __("Select your style for gmap.", 'patron')
		    ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Gap Top", 'patron'),
				"param_name" => "top_space",
				"value" => array( 
							 __('No Space', 'patron') => '',
							 __('10px', 'patron') => '10',
							 __('15px', 'patron') => '15',
							 __('20px', 'patron') => '20',
							 __('30px', 'patron') => '30',
							 __('50px', 'patron') => '50',
							),
				"description" => __("Select the box margin bottom", 'patron'),
			),
			array(
				'type' => 'param_group',
				'heading' => __( 'Values', 'patron' ),
				'param_name' => 'values',
				'description' => __( 'Upload brand logo image', 'patron' ),
				'value' => urlencode( json_encode( array(
					array(
						'label' => __( 'Development', 'patron' ),
						'value' => '0',
					),
				))),
				'params' => array(					
					array(
						'type' => 'textfield',
						'heading' => __( 'List Text', 'patron' ),
						'param_name' => 'list',
						'description' => __( 'ul/ol list in different style, each of the box content will show in li', 'patron' ),
						'admin_label' => true,
					),
				),
			),
	    )
	));
}