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
			<?php if($patron_option['blog-layout'] == 1){ ?>
			<div class="col-md-12 col-sm-12"><?php } else{ ?><div class="col-md-8 col-sm-12"><?php } ?>	
				<div class="blog-detail">
					<?php if (have_posts()){ ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
							<?php while (have_posts()) : the_post()?>                        
								<?php the_post_thumbnail(); ?>
								<div class="blog-text">
									<?php the_content(); ?>
								</div>
								<?php
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif; 
								?>
								<?php
									wp_link_pages( array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'patron' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
										'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'patron' ) . ' </span>%',
										'separator'   => '<span class="screen-reader-text">, </span>',
									) );
								?>
							<?php endwhile; ?>                
						</div> 
					<?php 
						}else {
						  esc_html_e('Page not found', 'patron'); 
					}?>
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