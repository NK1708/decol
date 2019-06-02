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
 
  global $patron_option;
?>
<!--Footer Section-->
<?php if( is_active_sidebar( 'footer-area-1'  ) || is_active_sidebar( 'footer-area-2' ) || is_active_sidebar( 'footer-area-3'  ) ||is_active_sidebar( 'footer-area-4' ) ){ ?>
<section id="footer">
	<div class="container">
		<div class="row">
			<?php get_template_part('inc/footer/footer', 'widgets'); ?>
		</div>
	</div>
</section>
<?php } ?>

<!--Footer Bottom-->
<div id="footer-bottom" class="bg-extra-dark">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php
					$footer_menu = array(
						'theme_location'  => 'footer-menu',
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
						'items_wrap'      => '<ul class="bottom-nav">%3$s</ul>',
						'depth'           => 0,
					);
					if ( has_nav_menu( 'footer-menu' ) ) {
						wp_nav_menu( $footer_menu );
					}
				?> 
			</div>
			<div class="col-md-4">
				<div class="copyright">
					<span><?php if($patron_option['copy_text'] != ''){ echo wp_specialchars_decode( do_shortcode( $patron_option['copy_text'] ) ); } else { echo esc_html__('© 2018 All Rights Reserved by Unicoder', 'patron'); } ?></span>
				</div>
			</div>
		</div>
	</div>
</div>


<?php wp_footer(); ?>
</body>
</html>