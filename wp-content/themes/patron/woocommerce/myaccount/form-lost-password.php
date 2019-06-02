<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
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
					<h2 class="thumb-title"><?php esc_html_e( 'Reset Password', 'patron' ); ?></h2>
					<p><?php esc_html_e('sign in with your username and password', 'patron' ); ?></p>
				</div>
			</div>
			<div class="col-md-8 col-sm-8 padding-70">
				<div id="user-login" class="sign-up-form active">
										
					<form method="post" class="woocommerce-ResetPassword lost_reset_password login">

						<p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'patron' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

						<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
							<label for="user_login"><?php esc_html_e( 'Username or email', 'patron' ); ?></label>
							<input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" />
						</p>

						<div class="clear"></div>

						<?php do_action( 'woocommerce_lostpassword_form' ); ?>

						<p class="woocommerce-form-row form-row">
							<input type="hidden" name="wc_reset_password" value="true" />
							<button type="submit" class="btn btn-secondary margin-right-15" value="<?php esc_attr_e( 'Reset password', 'patron' ); ?>"><?php esc_html_e( 'Reset password', 'patron' ); ?></button>
						</p>

						<?php wp_nonce_field( 'lost_password' ); ?>

					</form>
				</div>
			</div>
		</div>
	</div>
</section>
