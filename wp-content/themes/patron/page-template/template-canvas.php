<?php
/**
	* Template Name: Front-Page Template
 */	
 
 get_header();
?>

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