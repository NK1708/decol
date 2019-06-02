<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! empty( $breadcrumb ) ) {
	
	$delimiter   = ' <li> &gt; </li> '; // delimiter between crumbs
	$linkBefore = '<li>';
	$linkAfter = '</li>';
	$wrap_before = '<ul class="crumb">';
	$wrap_after = '</ul>';

	echo wp_kses($wrap_before, true);

	foreach ( $breadcrumb as $key => $crumb ) {

		echo wp_kses($before, true);

		if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
			echo wp_kses($linkBefore, true) . '<a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a>' . wp_kses($linkAfter, true);
		} else {
			echo wp_kses($linkBefore, true) . esc_html( $crumb[0] ) . wp_kses($linkAfter, true);
		}

		echo wp_kses($after, true);

		if ( sizeof( $breadcrumb ) !== $key + 1 ) {
			echo wp_kses($delimiter, true);
		}
	}

	echo wp_kses($wrap_after, true);

}
