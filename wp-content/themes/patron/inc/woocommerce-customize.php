<?php

add_action( 'after_setup_theme', 'woocommerce_custom' );
function woocommerce_custom(){
	if ( class_exists( 'WooCommerce' ) ) {
		//WooCommerce theme support
		add_theme_support( 'woocommerce' );
		
		/* Enabling product gallery features (zoom, swipe, lightbox) in 3.0.0 */ 
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );		
	}	
}

// Add woocommerce custom breadcrumb
add_action('init', 'pt_woocommerce_breadcrumb');
function pt_woocommerce_breadcrumb(){
	// breadcrumb woocommerce
	remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	add_action('breadcrumb_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

//Remove woocommerce catelog ordering
add_action('init', 'pt_woocommerce_catalog_ordering');
function pt_woocommerce_catalog_ordering(){
	// woocommerce catalog ordering
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30, 0 );
}

// Remove number of product count
add_action('init', 'pt_woocommerce_result_count');
function pt_woocommerce_result_count(){
	// woocommerce catalog ordering
	remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0 );
}


// Product listview gridview filter
function need_fnc_woocommerce_display_modes(){
	global $wp;
	$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
	
	if ( isset($_COOKIE['need_woo_display']) && $_COOKIE['need_woo_display'] == 'list' ) {
		$woo_display = $_COOKIE['need_woo_display'];
	}
	elseif ( isset($_COOKIE['need_woo_display']) && $_COOKIE['need_woo_display'] == 'grid' ){
		$woo_display = $_COOKIE['need_woo_display'];
	}
	else{
		$woo_display = 'grid';
	}
	echo '<form class="view-category pull-right" method="get">';
		if ( ! get_option('permalink_structure') ) {
			echo '<input type="hidden" name="post_type" value="product">';
		}
		echo '<button title="'.esc_html__('Grid', 'patron').'" class="grid-view '.($woo_display == 'grid' ? 'active' : '').'" value="grid" name="display" type="submit"><i class="fa fa-th"></i></button>';	
		echo '<button title="'.esc_html__('List', 'patron').'" class="list-view '.($woo_display == 'list' ? 'active' : '').'" value="list" name="display" type="submit"><i class="fa fa-th-list"></i></button>';	
	echo '</form>'; 
}


// Add action to init parameter before processing
add_action( 'init', 'need_fnc_before_woocommerce_init' );
function need_fnc_before_woocommerce_init(){
	if( isset($_GET['display']) && ($_GET['display']=='list' || $_GET['display']=='grid') ){  
		setcookie( 'need_woo_display', trim($_GET['display']) , time()+3600*24*100,'/' );
		$_COOKIE['need_woo_display'] = trim($_GET['display']);
	}
}

// Add custom class with product thumbnail image
add_action('woocommerce_before_shop_loop_item', 'pt_custom_product_thumb_class_start', 9);
function pt_custom_product_thumb_class_start(){
	echo '<div class="product-img">';
}

// Add custom class with product thumbnail image
add_action('woocommerce_after_shop_loop_item', 'pt_custom_product_thumb_class_end', 5);
function pt_custom_product_thumb_class_end(){
	echo '</div>';
	echo '<div class="product-detail">';
}

// Get product title in custom location
add_action('init', 'pt_product_title_custom');
function pt_product_title_custom(){
	remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title');
	add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_open', 5);
	add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_title', 6);
	add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 7);
}

// Add rating and price under product details
add_action('init', 'pt_add_product_price_custom');
function pt_add_product_price_custom(){
	remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
	add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 8);
	remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
	add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_rating', 8);
}

// Get product short details for list view
add_action('woocommerce_after_shop_loop_item', 'pt_product_excerpt_for_listview', 9);
function pt_product_excerpt_for_listview(){
	if ( ( isset($_COOKIE['need_woo_display']) && $_COOKIE['need_woo_display'] == 'list' ) ){
			$excerpt= get_the_excerpt();
			echo '<p>'. substr($excerpt, 0, 150) . '</p>';
	}
}

// Add custom end class with product details
add_action('woocommerce_after_shop_loop_item', 'pt_custom_product_details_class_end', 20);
function pt_custom_product_details_class_end(){
	echo '</div>';
}


// Lets create the function to house our form
add_action( 'woocommerce_before_shop_loop', 'pt_woocommerce_catalog_page_ordering', 20 );
function pt_woocommerce_catalog_page_ordering() {
?>


	<div class="pull-left">
		<?php echo '<span class="itemsorder">' . esc_html__('Sort By:', 'patron') . '</span>' ?>
		<?php woocommerce_catalog_ordering(); ?>
	</div>
	<div class="pull-right">
		<?php need_fnc_woocommerce_display_modes(); ?>
	</div>


<?php
}
 
// now we set our cookie if we need to
function dl_sort_by_page($count) {
  if (isset($_COOKIE['shop_pageResults'])) { // if normal page load with cookie
     $count = $_COOKIE['shop_pageResults'];
  }
  if (isset($_POST['woocommerce-sort-by-columns'])) { //if form submitted
    setcookie('shop_pageResults', $_POST['woocommerce-sort-by-columns'], time()+1209600, '/', 'www.your-domain-goes-here.com', false); //this will fail if any part of page has been output- hope this works!
    $count = $_POST['woocommerce-sort-by-columns'];
  }
  // else normal page load and no cookie
  return $count;
}
 
add_filter('loop_shop_per_page','dl_sort_by_page');

// Customize woocommerce catalog filter
add_filter( 'woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby' );

function custom_woocommerce_catalog_orderby( $sortby ) {
	$sortby['menu_order'] = esc_html__('Default', 'patron');
	$sortby['popularity'] = esc_html__('Most Popular', 'patron');
	$sortby['rating'] = esc_html__('Top Rated', 'patron');
	$sortby['date'] = esc_html__('Newest Items', 'patron');
	$sortby['price'] = esc_html__('Price low to high', 'patron');
	$sortby['price-desc'] = esc_html__('Price hight to low', 'patron');
	return $sortby;
}
	
?>