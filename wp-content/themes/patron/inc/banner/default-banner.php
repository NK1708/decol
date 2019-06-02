<?php

/**
 * Displays default banner
 *
 * @package WordPress
 * @subpackage Patron_Security
 * @version 1.0
 */

?>

<?php global $patron_option; ?>
<!--Banner Section-->

<section id="banner" style="<?php if($patron_option['banner-image-switch']==true){ ?>background: url('<?php if ($patron_option['banner_bg']['url'] != '') { ?> <?php echo esc_url($patron_option['banner_bg']['url']); } ?>') fixed center top; <?php } ?> <?php if($patron_option['banner-image-switch']==false){ ?>background-color: <?php echo esc_attr( $patron_option['banner-bg-color'] ); }?>; <?php if(isset($patron_option['header_style']) and $patron_option['header_style'] == '3'){ ?>padding: 75px 0 0; <?php } ?>">
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
							elseif( is_singular('post') ){
								if($patron_option['single-blog-title'] != ''){ 
									echo esc_attr($patron_option['single-blog-title']); 
								}
								else{ 
									the_title(); 
								}
							}
							elseif( is_search() ){
								echo esc_html__('Search Result', 'patron');
							}
							else {			
								the_title();
							} 
						?>
					</h1>
					<div class="banner-nav pull-right">
						<?php
							if ( class_exists( 'WooCommerce' ) && is_shop() ){
								do_action('breadcrumb_before_main_content');
							}
							else {
								if(function_exists('dimox_breadcrumbs')): 
									dimox_breadcrumbs();
								endif; 
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>