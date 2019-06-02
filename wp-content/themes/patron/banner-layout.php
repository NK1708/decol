<?php 
/*
* Include banner template
* @package WordPress
* @subpackage Patron_Security
*/
global $patron_option;

if(isset($patron_option)){
	if($patron_option['banner-switch'] == true){ 
		get_template_part('inc/banner/default', 'banner');
	} 
	else { 
	?>
	<div class="no-banner">

	</div>
	<?php 
	}
} else {
?>
<section id="banner-default" class="bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="banner-content">
					<h1 class="page-titile">
						<?php
							if ( class_exists( 'WooCommerce' ) && is_shop() ){
								if ( apply_filters( 'woocommerce_show_page_title', true ) ) :
									woocommerce_page_title();
								endif;
							}
							elseif ( is_front_page() ){
								echo esc_html__('Latest Posts', 'patron');
							}
							elseif( is_archive() ){
								the_archive_title();
							}
							elseif( is_404() ){
								echo wp_specialchars_decode( do_shortcode( $patron_option['404_page_title'] ) );
							}
							elseif( is_search() ){
								echo esc_html__('Search Result', 'patron');
							}
							else {			
								the_title();
							} 
						?>
					</h1>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
} 
?>