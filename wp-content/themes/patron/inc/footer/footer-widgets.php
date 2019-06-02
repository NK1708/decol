<?php
/**
 * Displays footer widgets
 *
 * @package WordPress
 * @subpackage Patron_Security
 * @version 1.0
 */
global $patron_option;
?>

<?php
	if (   ! is_active_sidebar( 'footer-area-1'  ) && ! is_active_sidebar( 'footer-area-2' ) && ! is_active_sidebar( 'footer-area-3'  ) && ! is_active_sidebar( 'footer-area-4' ) )
	return;

	// Check if wedgets actived or used, if it's fear then let's go
	
	$count = 0;
	
	if ( is_active_sidebar( 'footer-area-1' ) ) 
		$count++;
	if ( is_active_sidebar( 'footer-area-2' ) )
		$count++;
	if ( is_active_sidebar( 'footer-area-3' ) )
		$count++;
	if ( is_active_sidebar( 'footer-area-4' ) )
		$count++;	
	$class = '';
	
	switch ( $count ) {
		case '1':
			$class = 'col-md-12';
			break;
		case '2':
			$class = 'col-md-6 col-sm-6';
			break;
		case '3':
			$class = 'col-md-4 col-sm-4';
			break;
		case '4':
			$class = 'col-md-3 col-sm-6';
			break;	
	}

?>

<?php if ( is_active_sidebar('footer-area-1') ) : ?>
	<div class="<?php echo esc_attr( $class ); ?>">
		<div class="footer-widget">
		<?php if ($patron_option['logo_footer']['url'] != '') { ?>
			<img class="footer-logo" src="<?php echo esc_url($patron_option['logo_footer']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>">
		<?php } else{ ?>
			<img class="footer-logo" src="<?php  echo esc_url( get_template_directory_uri() ); ?>/images/logo/footer-logo.png" alt="<?php bloginfo( 'name' ); ?>">
		<?php } ?>
		<?php dynamic_sidebar( 'footer-area-1' ); ?>
		</div>
	</div><!-- end col-lg-3 -->
	<?php endif; ?>

	<?php if ( is_active_sidebar('footer-area-2') ) : ?>
	<div class="<?php echo esc_attr( $class ); ?>">
		<div class="footer-widget">
		<?php dynamic_sidebar( 'footer-area-2' ); ?>
		</div>
	</div><!-- end col-lg-3 -->
	<?php endif; ?>

	<?php if ( is_active_sidebar('footer-area-3') ) : ?>
	<div class="<?php echo esc_attr( $class ); ?>">
		<div class="footer-widget">
		<?php dynamic_sidebar( 'footer-area-3' ); ?>
		</div>
	</div><!-- end col-lg-3 -->
	<?php endif; ?>

	<?php if ( is_active_sidebar('footer-area-4') ) : ?>
	<div class="<?php echo esc_attr( $class ); ?>">
		<div class="footer-widget">
		<?php dynamic_sidebar( 'footer-area-4' ); ?>
		</div>
	</div><!-- end col-lg-3 -->
<?php endif; ?>

