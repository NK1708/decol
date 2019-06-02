<?php

	$amz_prefix = '_amz_';

	$portfolio_metabox = array(
		'metabox'	=> array( 
			'id'         => 'member',
			'title'      => __( 'Employee Info', 'ot-team' ),
			'post_type'  => 'pix_team',
			'context'    => 'normal',
			'priority'   => 'low',
			'tabs' 		 => true
		),
		'fields'     => array(

			array(
				'title' => esc_html__('Overview', 'ot-team'),
				'type'  => 'heading'
			),

			array(
				'id' => $amz_prefix . 'client_name',
				'title' => esc_html__('Client Name', 'ot-team'),
				'description' => esc_html__('Enter the client name.', 'ot-team'),
				//'desc_tip' => '',
				'placeholder' => '',
				'type' => 'text'
			),

			array(
				'id' => $amz_prefix . 'designation',
				'title' => esc_html__('Designation', 'ot-team'),
				'description' => esc_html__('Enter the designation.', 'ot-team'),
				//'desc_tip' => '',
				'placeholder' => '',
				'type' => 'text'
			),

			array(
				'id' => $amz_prefix . 'description',
				'title' => esc_html__('Thumbnail Text', 'ot-team'),
				'description' => esc_html__('Enter text that show with thumbnail view.', 'ot-team'),
				//'desc_tip' => '',
				'placeholder' => '',
				'type' => 'textarea'
			),

			array(
				'title' => esc_html__('Personal Information', 'ot-team'),
				'type'  => 'heading'
			),

			array(
				'id' => $amz_prefix . 'details',
				'title' => esc_html__('About Employee', 'ot-team'),
				'description' => esc_html__('Enter the short description about employee.', 'ot-team'),
				//'desc_tip' => '',
				'placeholder' => '',
				'type' => 'textarea'
			),

			array(
				'id' => $amz_prefix . 'age',
				'title' => esc_html__('Age ( Year )', 'ot-team'),
				'description' => esc_html__('Enter the age of the employee.', 'ot-team'),
				//'desc_tip' => '',
				'placeholder' => 'XXX',
				'type' => 'text'
			),

			array(
				'id' => $amz_prefix . 'address',
				'title' => esc_html__('Location/Address', 'ot-team'),
				'description' => esc_html__('Enter the employee address.', 'ot-team'),
				//'desc_tip' => '',
				'placeholder' => '',
				'type' => 'text'
			),

			array(
				'id' => $amz_prefix . 'experience',
				'title' => esc_html__('Experience ( Year )', 'ot-team'),
				'description' => esc_html__('Enter the employee experience.', 'ot-team'),
				//'desc_tip' => '',
				'placeholder' => '',
				'type' => 'text'
			),
			
			array(
				'id' => $amz_prefix . 'country',
				'title' => esc_html__('Country/Citizen', 'ot-team'),
				'description' => esc_html__('Enter the employee country.', 'ot-team'),
				//'desc_tip' => '',
				'placeholder' => '',
				'type' => 'text'
			),

			array(
				'id' => $amz_prefix . 'phone',
				'title' => esc_html__('Phone Number', 'ot-team'),
				'description' => esc_html__('Enter the employee phone number.', 'ot-team'),
				//'desc_tip' => '',
				'std'	=>	'+1',
				'placeholder' => '',
				'type' => 'text'
			),


			array(
				'title' => esc_html__('Social Media', 'ot-team'),
				'type'  => 'heading'
			),

			array(
				'id'           => $amz_prefix . 'facebook',
				'title'        => esc_html__('Facebook', 'ot-team'),
				'description'  => esc_html__('Add Social media profile link.', 'ot-team'),
				'std'		   => '',
				'placeholder'  => '',
				'type' 		   => 'text'
			),

			array(
				'id'           => $amz_prefix . 'twitter',
				'title'        => esc_html__('Twitter', 'ot-team'),
				'description'  => esc_html__('Add Social media profile link.', 'ot-team'),
				'std'		   => '',
				'placeholder'  => '',
				'type' 		   => 'text'
			),

			array(
				'id'           => $amz_prefix . 'linkedin',
				'title'        => esc_html__('Linked In', 'ot-team'),
				'description'  => esc_html__('Add Social media profile link.', 'ot-team'),
				'std'		   => '',
				'placeholder'  => '',
				'type' 		   => 'text'
			),

			array(
				'id'           => $amz_prefix . 'googleplus',
				'title'        => esc_html__('Google Plus', 'ot-team'),
				'description'  => esc_html__('Add Social media profile link.', 'ot-team'),
				'std'		   => '',
				'placeholder'  => '',
				'type' 		   => 'text'
			),

			array(
				'id'           => $amz_prefix . 'pinterest',
				'title'        => esc_html__('Pinterest', 'ot-team'),
				'description'  => esc_html__('Add Social media profile link.', 'ot-team'),
				'std'		   => '',
				'placeholder'  => '',
				'type' 		   => 'text'
			),

		),
	);

	$portfolio_metabox = new Amazee_Metabox( $portfolio_metabox );