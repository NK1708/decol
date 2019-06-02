<?php
// Add new Param in Row
if(function_exists('vc_add_param')){
	vc_add_param(
		'vc_row',
		array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Background Parallax', 'patron' ),
            'param_name' => 'row_bg_parallax',
            'value' => array(
                esc_html__( 'Select', 'patron' ) =>  '',
                esc_html__( 'Yes', 'patron' ) =>  'yes',
                esc_html__( 'No', 'patron' ) =>  'no',
            ),
            'description' => esc_html__( 'Add background custom parallax effect', 'patron' ),
        )
    );
	vc_add_param(
		'vc_row',
		array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Background Image Overlay', 'patron' ),
            'param_name' => 'row_bg_overlay',
            'value' => array(
                esc_html__( 'No Overlay', 'patron' ) =>  '',
                esc_html__( 'Default Color Overlay', 'patron' ) =>  'overlay-2',
                esc_html__( 'Dark Color Overlay', 'patron' ) =>  'overlay-1',
            ),
            'description' => esc_html__( 'Add background custom overly', 'patron' ),
        )
    );
	vc_add_param(
		'vc_row',
		array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Background Color', 'patron' ),
            'param_name' => 'row_bg_builting',
            'value' => array(
                esc_html__( 'Select Background', 'patron' ) =>  '',
                esc_html__( 'Gray', 'patron' ) =>  'bg-gray',
                esc_html__( 'Default', 'patron' ) =>  'bg-default',
                esc_html__( 'Dark', 'patron' ) =>  'bg-dark',
                esc_html__( 'White', 'patron' ) =>  'bg-white',
            ),
            'description' => esc_html__( 'Add background default background color of patron', 'patron' ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "dropdown",
            "heading" => esc_html__('Row Content Style', 'patron'),
            "param_name" => "fullwidth",
            "value" => array( 
							esc_html__('Full Width', 'patron') => 'yes',
                            esc_html__('Container Box', 'patron') => 'no',                                                                                  
                          ),
            "description" => esc_html__("Select Fullwidth or not, Default: Yes fullwidth", "patron"),      
        )
    );
	vc_add_param(
        'vc_row',
		array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'No Padding', 'patron' ),
            'param_name' => 'no_padding',
            'description' => esc_html__( 'If checked, turn off the padding of the section.', 'patron' ),
            'value' => array( esc_html__( 'Yes', 'patron' ) => 'yes' ),
		)
	);
	vc_add_param(
		'vc_row_inner',
		array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Row Margin Bottom', 'patron' ),
            'param_name' => 'row_gap_down',
            'value' => array(
                esc_html__( 'No Margin', 'patron' ) =>  '',
                esc_html__( '15px', 'patron' ) => '15',
				esc_html__( '20px', 'patron' ) => '20',
                esc_html__( '30px', 'patron' ) => '30',
                esc_html__( '40px', 'patron' ) => '40',
                esc_html__( '50px', 'patron' ) => '50',
            ),
            'description' => esc_html__( 'Select the row margin for bottom', 'patron' ),
        )
    );
	vc_add_param(
		'vc_column_inner',
		array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Inner Column Height', 'patron' ),
            'param_name' => 'column_height',
            'value' => array(
                esc_html__( 'Default', 'patron' ) =>  '',
                esc_html__( 'Full Height', 'patron' ) => 'yes',
				esc_html__( 'Auto', 'patron' ) => 'no',
            ),
            'description' => esc_html__( 'Select the row margin for bottom', 'patron' ),
        )
    );
}

if(function_exists('vc_remove_param')){
    vc_remove_param( "vc_row", "gap" );
    vc_remove_param( "vc_row", "full_width" );
    vc_remove_param( "vc_row", "parallax" );
}    