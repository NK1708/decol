<?php
	
/**
  *@Custom search template of header
  *@Search result will show the post data
  *@if no post data available, will show error message
*/
	
?>

<?php 
	get_header(); 
	global $patron_option; 

	get_template_part('banner', 'layout'); 
?>

<section class="full-row bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<?php if (have_posts()){ ?>
						
						<?php						
							while (have_posts()) : the_post();
						?>
							<?php get_template_part('content', 'search'); ?>
						<?php endwhile; ?>
						
					<?php }else { ?>
					<div class="col-md-12">
						<h2 class="margin-bottom-30"><?php esc_html_e('Nothing Found!', 'patron'); ?></h2>
						<p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'patron'); ?></p>
						<div class="error_page_search">
							<?php get_search_form(); ?>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-md-4">
				<?php get_sidebar();?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>