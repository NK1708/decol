<?php
/**
 * Lost password reset form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices(); ?>
<section class="full-row sign-form no-padding">
	<div class="container">
		<div class="row flex-box">
			<div class="col-md-4 col-sm-4 bg-default padding-70">
				<div class="sign-in-up active">
					<h2 class="thumb-title"><?php esc_html_e( 'Password Recovery', 'patron' ); ?></h2>
					<p><?php esc_html_e('sign in with your username and password', 'patron' ); ?></p>
				</div>
			</div>
			<div class="col-md-8 col-sm-8 padding-70">
				<div id="user-login" class="sign-up-form active">
					<form method="post" class="woocommerce-ResetPassword lost_reset_password login">

						<p><?php echo apply_filters( 'woocommerce_reset_password_message', esc_html__( 'Enter a new password below.', 'patron' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

						<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
							<label for="password_1"><?php esc_html_e( 'New password', 'patron' ); ?> <span class="required">*</span></label>
							<input type="password" class="form-control bg-gray" name="password_1" id="password_1" />
						</p>
						<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
							<label for="password_2"><?php esc_html_e( 'Re-enter new password', 'patron' ); ?> <span class="required">*</span></label>
							<input type="password" class="form-control bg-gray" name="password_2" id="password_2" />
						</p>

						<input type="hidden" name="reset_key" value="<?php echo esc_attr( $args['key'] ); ?>" />
						<input type="hidden" name="reset_login" value="<?php echo esc_attr( $args['login'] ); ?>" />

						<div class="clear"></div>

						<?php do_action( 'woocommerce_resetpassword_form' ); ?>

						<p class="woocommerce-form-row form-row">
							<input type="hidden" name="wc_reset_password" value="true" />
							<button type="submit" class="btn btn-secondary margin-right-15" value="<?php esc_attr_e( 'Save', 'patron' ); ?>"><?php esc_html_e( 'Save', 'patron' ); ?></button>
						</p>

						<?php wp_nonce_field( 'reset_password' ); ?>

					</form>
				</div>
			</div>
		</div>
	</div>
</section>
