<?php
/**
	* Template Name: Inner Page Template
 */	
 
 get_header();
 
 global $patron_option;
?>

	<!--Banner Section-->
	<?php get_template_part('banner', 'layout'); ?>
	<!-- Banner Section End -->


	<?php if (have_posts()){ ?>
	
		<?php while (have_posts()) : the_post();?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	
	<?php }else {
		_e('Page Canvas For Page Builder', 'patron'); 
	}?>

<?php 
get_footer();	
?>