<?php 
	get_header(); 
	global $patron_option; 

	// Set theme banner
	get_template_part('banner', 'layout'); 
?>

<section class="full-row" style="background-color: <?php echo esc_attr($patron_option['blog_layout_bg']); ?>">
	<div class="container">
		<div class="row">
			<?php if($patron_option['blog-layout'] == 2){ ?>
			<div class="col-md-4">
				<?php get_sidebar();?>
			</div>
			<?php } ?>
			<?php if($patron_option['blog-layout'] == 1){ ?><div class="col-md-12 col-sm-12"><?php } else{ ?><div class="col-md-8 col-sm-12"><?php } ?>			
				<div class="row post-thumbs">
					<?php
						// Create post loop for front-page template
						while(have_posts()) : the_post();
							get_template_part( 'content', get_post_format());
						endwhile;
					?>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="blog_pagination">
							<nav aria-label="Page navigation">
								<ul class="pagination"><?php echo get_pagination(); // get pagination from theme-function file in inc folder ?>
							</nav>
						</div>	
					</div>
				</div>
			</div>
			<?php if($patron_option['blog-layout'] == 3){ ?>
			<div class="col-md-4">
				<?php get_sidebar();?>
			</div>
			<?php } if(!isset($patron_option)){ ?>
			<div class="col-md-4">
				<?php get_sidebar();?>
			</div>
			<?php } ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
