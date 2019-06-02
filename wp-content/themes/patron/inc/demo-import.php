<?php

function ocdi_import_files() {
  return array(
    array(
      'import_file_name'           => 'Patron Default',
      'local_import_file'            => trailingslashit( get_template_directory() ) .'/inc/demos/default/content.xml',
	  'local_import_widget_file'     => trailingslashit( get_template_directory() ) .'/inc/demos/default/widget.wie',
	  'local_import_customizer_file' => trailingslashit( get_template_directory() ) .'/inc/demos/default/customizer.dat',
	  'local_import_redux'	=> array(
			array(
				'file_url'    => trailingslashit( get_template_directory() ) .'/inc/demos/default/redux_options.json',
				'option_name' => 'patron_option',
			),
		),
      'import_preview_image_url'   => 'http://www.unicoderbd.com/theme/wordpress/patron/01PT2018/default/default.jpg',
      'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'patron' ),
      'preview_url'                => 'http://www.themes.unicoderbd.com/patron/default/',
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );


// Menu and Front page settigs
function ocdi_after_import_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Default Nav', 'nav_menu' );
	$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
	$service_menu = get_term_by( 'name', 'Service Menu', 'nav_menu' );
	$sidebar_menu = get_term_by( 'name', 'Sidebar Menu', 'nav_menu' );
	$top_menu = get_term_by( 'name', 'Top Menu', 'nav_menu' );
	set_theme_mod( 'nav_menu_locations', array(
			'primary' => $main_menu->term_id,
			'footer-menu' => $footer_menu->term_id,
			'service-menu' => $service_menu->term_id,
			'sidebar-nav' => $sidebar_menu->term_id,
			'top-menu' => $top_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home-1' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );


add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
	
?>