<?php
 get_header();
 
 global $patron_option;
?>

<?php get_template_part('banner', 'layout'); ?>
	
<!-- Profile Details -->
<?php if (have_posts()){ ?>
	<?php while (have_posts()) : the_post()?>
	<section class="full-row no-padding margin-top-50">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-5">
					<div class="profile-details-img"> 
						<?php 
							if ( has_post_thumbnail()) {
								the_post_thumbnail('pt-thumb-tall');
							} 
						?>
						<div class="social-icon text-center full-row bg-gray"> 
							<?php $fb = ottd_meta('_amz_facebook'); if( $fb != '' ){ ?><a href="<?php echo esc_url( $fb ); ?>"><i class="fa fa-facebook bg-dark"></i></a><?php } ?>
							<?php $tw = ottd_meta('_amz_twitter'); if( $tw != '' ){ ?><a href="<?php echo esc_url( $tw ); ?>"><i class="fa fa-twitter bg-dark"></i></a><?php } ?>
							<?php $gp = ottd_meta('_amz_googleplus'); if( $gp != '' ){ ?><a href="<?php echo esc_url( $gp ); ?>"><i class="fa fa-google-plus bg-dark"></i></a><?php } ?>
							<?php $link = ottd_meta('_amz_linkedin'); if( $link != '' ){ ?><a href="<?php echo esc_url( $link ); ?>"><i class="fa fa-linkedin bg-dark"></i></a><?php } ?>
							<?php $pin = ottd_meta('_amz_pinterest'); if( $pin != '' ){ ?><a href="<?php echo esc_url( $pin ); ?>"><i class="fa fa-pinterest-p bg-dark"></i></a><?php } ?>
						</div>
					</div>
				</div>
				<div class="col-md-8 col-sm-8">
					<div class="profile-name">
						<h2 class="no-margin"><?php echo ottd_meta('_amz_client_name'); ?></h2>
						<span><?php echo ottd_meta('_amz_designation'); ?></span>
					</div>
					<div class="margin-top-20">
						<p><?php echo ottd_meta('_amz_description'); ?></p>
					</div>
					<div class="personal-info margin-top-30">
						<h5><?php esc_html_e('Personal Informations', 'patron'); ?></h5>
						<p><?php echo ottd_meta('_amz_details'); ?></p>
						<ul class="margin-top-30">
							<li><?php esc_html_e('Age', 'patron'); ?>:<span><?php echo ottd_meta('_amz_age'); ?> Years</span></li>
							<li><?php esc_html_e('Location', 'patron'); ?> :<span><?php echo ottd_meta('_amz_address'); ?></span></li>
							<li><?php esc_html_e('Experience', 'patron'); ?> :<span><?php echo ottd_meta('_amz_experience'); ?> Years</span></li>
							<li><?php esc_html_e('Country', 'patron'); ?>:<span><?php echo ottd_meta('_amz_country'); ?></span></li>
							<li><?php esc_html_e('Phone', 'patron'); ?>:<span><?php echo ottd_meta('_amz_phone'); ?></span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	
		<?php the_content(); ?>
	<?php endwhile; ?>

<?php }else {
	esc_html_e('Single Member page blank', 'patron'); 
}?>
	
	
<?php 
 get_footer();	
?>