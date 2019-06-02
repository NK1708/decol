<?php
 get_header();
 
 global $patron_option;
?>

	<?php get_template_part('banner', 'layout'); ?>

	<section class="full-row">
		<div class="container">
			<div class="row">
			<?php while (have_posts()) : the_post()?>
				<div class="col-md-5 col-sm-5">
					<div class="profile-details-img">
						<?php 
							if ( has_post_thumbnail()) {
								the_post_thumbnail('thumb-tall');
							} 
						?>
					</div>
				</div>
				<div class="col-md-7 col-sm-7">
					<?php the_content(); ?>					
				</div>
			<?php endwhile; ?>
			</div>
		</div>
	</section>


<?php 
 get_footer();	
?>