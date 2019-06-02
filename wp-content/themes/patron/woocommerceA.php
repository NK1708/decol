<?php
/**
 * Plugin Name: WooCommerce
 * Plugin URI: https://woocommerce.com/
 * Description: An e-commerce toolkit that helps you sell anything. Beautifully.
 * Version: 3.2.6
 * Author: Automattic
 * Author URI: https://woocommerce.com
 * Requires at least: 4.4
 * Tested up to: 4.9
 *
 * Text Domain: woocommerce
 * Domain Path: /i18n/languages/
 *
 * @package WooCommerce
 * @category Core
 * @author Automattic
 */
 
get_header();

global $patron_option;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<?php get_template_part('banner', 'layout'); ?>

<section class="full-row">
	<div class="container">
		<div class="row">
			<?php woocommerce_content(); ?>			
		</div>
	</div>
</section>


<?php get_footer(); ?>