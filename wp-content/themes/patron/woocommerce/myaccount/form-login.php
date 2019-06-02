<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
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
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>
<section class="full-row sign-form no-padding">
	<div class="container">
		<div class="row flex-box">	
			<?php wc_print_notices(); ?>
			<div class="col-md-4 col-sm-4 bg-default padding-70">
				<div class="sign-in-up active">
					<a href="#user-login"><h2 class="thumb-title"><?php esc_html_e( 'Login', 'patron' ); ?></h2></a>
					<p><?php esc_html_e('sign in with your username and password', 'patron' ); ?></p>
				</div>
				<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
					<div class="sign-in-up margin-top-50">
						<a href="#user-signup"><h2 class="thumb-title"><?php esc_html_e( 'Register', 'patron' ); ?></h2></a>
						<p><?php esc_html_e('Sign up with your simple details. It will be cross checked by the administration', 'patron'); ?></p>
					</div>
				<?php endif; ?>
			</div>

			<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

			<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
			<div class="col-md-8 col-sm-8 padding-70">
				<div id="user-login" class="sign-up-form active">			
					<div class="u-columns col2-set" id="customer_login">

							<?php endif; ?>

								<form class="woocommerce-form woocommerce-form-login login" method="post">

									<?php do_action( 'woocommerce_login_form_start' ); ?>

									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
										<label for="username"><?php esc_html_e( 'Username or email address', 'patron' ); ?> <span class="required">*</span></label>
										<input type="text" class="form-control bg-gray" name="username" id="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
									</p>
									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
										<label for="password"><?php esc_html_e( 'Password', 'patron' ); ?> <span class="required">*</span></label>
										<input class="form-control bg-gray" type="password" name="password" id="password" />
									</p>

									<?php do_action( 'woocommerce_login_form' ); ?>

									<p class="form-row">
										<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
										<button type="submit" class="btn btn-secondary margin-right-15" name="login" value="<?php esc_attr_e( 'Login', 'patron' ); ?>"><?php esc_html_e( 'Login', 'patron' ); ?></button>
										<label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
											<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'patron' ); ?></span>
										</label>
									</p>
									<p class="woocommerce-LostPassword lost_password">
										<a class="color-default" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'patron' ); ?></a>
									</p>

									<?php do_action( 'woocommerce_login_form_end' ); ?>

								</form>

							<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

						</div>
					</div>
					
					<div id="user-signup" class="sign-up-form">
						<div class="u-column2 col-2">

							<form method="post" class="register">

								<?php do_action( 'woocommerce_register_form_start' ); ?>

								<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
										<label for="reg_username"><?php esc_html_e( 'Username', 'patron' ); ?> <span class="required">*</span></label>
										<input type="text" class="form-control bg-gray" name="username" id="reg_username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
									</p>

								<?php endif; ?>

								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="reg_email"><?php esc_html_e( 'Email address', 'patron' ); ?> <span class="required">*</span></label>
									<input type="email" class="form-control bg-gray" name="email" id="reg_email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
								</p>

								<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
										<label for="reg_password"><?php esc_html_e( 'Password', 'patron' ); ?> <span class="required">*</span></label>
										<input type="password" class="form-control bg-gray" name="password" id="reg_password" />
									</p>

								<?php endif; ?>

								<?php do_action( 'woocommerce_register_form' ); ?>

								<p class="woocommerce-FormRow form-row">
									<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
									<button type="submit" class="btn btn-secondary margin-right-15" name="register" value="<?php esc_attr_e( 'Register', 'patron' ); ?>"><?php esc_html_e( 'Register', 'patron' ); ?></button>
								</p>

								<?php do_action( 'woocommerce_register_form_end' ); ?>

							</form>

						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</div>

		<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
	</div>
</section>