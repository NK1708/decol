<?php
	/**
		* Template Name: Blog Page Template
	 */	
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
				<?php
					// Set post query in for default template
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$wp_query = new WP_Query(array( 'post_type' => 'post', 'paged' => $paged, 'orderby' => 'post_date'));				
					if($wp_query->have_posts()): 
				?>			
				<div class="row">
					<?php					
						while($wp_query->have_posts()) : $wp_query->the_post();
							get_template_part( 'content', get_post_format()); // get post thumbnail from content file
						endwhile;
					?>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="blog_pagination">
							<nav aria-label="Page navigation">
								<ul class="pagination"><?php  echo get_pagination(); // get pagination from theme-function file in inc folder ?>
							</nav>
						</div>	
					</div>
				</div>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
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
