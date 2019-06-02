<?php
	/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Parton_Security
 * @since Patron Security Service 1.0.1
 */
?>
<?php global $patron_option; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="bodyguard, cyber security, guard, office security, privet security, security, security company, security guard, security service">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		<!-- Favicon -->
		<?php custom_favicon(); ?>
		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class(); ?>>
		
		<?php if($patron_option['preload-switch']==true){ ?>
			<div class="preloader">
				<div id="ajaxloader3">
					<div class="outer"></div>
					<div class="inner"></div>
				</div>
			</div>
		<?php } ?>
		
		<!--Header Section-->
		<header id="header-<?php if($patron_option['header_style']){ echo esc_attr($patron_option['header_style']); } ?>" class="header">
			<?php if($patron_option['topbar-switch']==true){ ?>
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-md-<?php echo esc_attr($patron_option['topbar_col_left']); ?> col-sm-<?php echo esc_attr($patron_option['topbar_col_left']); ?>">
							<div class="top-left">
								<div><?php esc_html_e('Call Us', 'patron'); ?> : <span><?php echo esc_attr($patron_option['info_list_phone']); ?></span></div>
								<form class="language" action="#" method="post">
									<span>Lnguage :</span>
									<select>
										<option value="en">EN</option>
										<option value="fr">FR</option>
										<option value="bn">BN</option>
									</select>
								</form>
							</div>
						</div>
						<div class="col-md-<?php echo esc_attr($patron_option['topbar_col_right']); ?> col-sm-<?php echo esc_attr($patron_option['topbar_col_right']); ?>">
							<div class="top-right">
								<?php if ( class_exists( 'WooCommerce' ) ){ ?>
								<ul class="nav navbar-nav">
									<li class="flaticon-people">
										<?php if ( is_user_logged_in() ) { ?>
											<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php esc_html_e('My Account','patron'); ?>"><?php esc_html_e('My Account','patron'); ?></a>
										 <?php } 
										 else { ?>
											<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php esc_html_e('Login or Register','patron'); ?>"><?php esc_html_e('Login','patron'); ?></a>
										<?php } ?>
									</li>
									<li class="flaticon-bag-outline">
										<a href="<?php echo wc_get_cart_url(); ?>" title="<?php esc_html_e( 'View your shopping cart', 'patron' ); ?>"><?php  esc_html_e('Cart', 'patron'); ?> (<?php echo sprintf ( _n( '%d item', '%d items', 'patron', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?>)</a>
									</li>
								</ul>
								<?php } ?>
								<?php
									$top_menu = array(
										'theme_location'  => 'top-menu',
										'menu'            => '',
										'container'       => '',
										'container_class' => '',
										'container_id'    => '',
										'menu_class'      => '',
										'menu_id'         => '',
										'echo'            => true,
										'fallback_cb'     => 'patron_bootstrap_navwalker::fallback',
										'walker'          => new patron_bootstrap_navwalker(),
										'before'          => '',
										'after'           => '',
										'link_before'     => '',
										'link_after'      => '',
										'items_wrap'      => '<ul class="nav navbar-nav help-nav navbar-right">%3$s</ul>',
										'depth'           => 0,
									);
									if ( has_nav_menu( 'top-menu' ) ) {
										wp_nav_menu( $top_menu );
									}
								?> 
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
			<div class="main-nav">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<nav class="navbar navbar-default"> 
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
									<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<?php if ($patron_option['logo']['url'] != '') { ?>
										<img class="logo-static" src="<?php echo esc_url($patron_option['logo']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>">
									<?php } 
									if(!$patron_option){ 
									?>
										<img class="logo-static" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo/logo.png" alt="<?php bloginfo( 'name' ); ?>">
									<?php } ?>
									</a>
								</div>
								
								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<ul class="search-bar navbar-right">
										<li><a href="#search"><i class="fa fa-search"></i></a></li>
										<li id="search" class="search-form">
											<?php get_search_form(); ?>
										</li>
									</ul>
									<?php
										$primary = array(
											'theme_location'  => 'primary',
											'menu'            => '',
											'container'       => '',
											'container_class' => '',
											'container_id'    => '',
											'menu_class'      => '',
											'menu_id'         => '',
											'echo'            => true,
											'fallback_cb'     => 'patron_bootstrap_navwalker::fallback',
											'walker'          => new patron_bootstrap_navwalker(),
											'before'          => '',
											'after'           => '',
											'link_before'     => '',
											'link_after'      => '',
											'items_wrap'      => '<ul class="nav navbar-nav navbar-right">%3$s</ul>',
											'depth'           => 0,
										);
										if ( has_nav_menu( 'primary' ) ) {
											wp_nav_menu( $primary );
										}
									?> 
								</div>
								<!-- /.navbar-collapse --> 
								<!-- /.container-fluid --> 
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>