<?php get_header(); ?>
<?php global $patron_option; ?>

<!--Banner Section-->
<?php get_template_part('banner', 'layout'); ?>
<!-- Banner Section End -->

<section class="full-row padding-90">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
				<div class="error-page text-center">
					<span class="fa fa-exclamation-triangle color-default margin-bottom-30"></span>
					<h2><?php echo wp_specialchars_decode( do_shortcode( $patron_option['404_title'] ) ); ?></h2>
					<p><?php echo wp_specialchars_decode( do_shortcode( $patron_option['404_content'] ) ); ?></p>
					<a class="btn btn-secondary margin-top-30" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php echo wp_specialchars_decode( do_shortcode($patron_option['back_404']) ); ?>
					</a>
				</div>
            </div>
		</div>
    </div>
</section> 

<?php get_footer(); ?>