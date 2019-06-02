<?php get_header(); ?>
<?php global $patron_option; ?>

<?php get_template_part('banner', 'layout'); ?>

<section class="full-row bg-gray">
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="blog-detail">
					<?php if ( have_posts() ) : ?>
						<?php while (have_posts()) : the_post(); ?>
						<div class="col-md-12 col-sm-12">
							<div class="blog-item-detail">
								<div class="blog-img">
									<?php 
										if ( has_post_thumbnail()) {
											the_post_thumbnail('pt-thumb-blog');
										} 
									?>
								</div>
								<div class="blog-text">
									<h3 class="thumb-titile margin-top-30"><?php the_title(); ?></h3>
									<div class="post-info color-default">
										<span class="admin">By <?php echo get_the_author(); ?></span>-<span class="date">At <?php the_date(); ?></span>-<span class="comments"><?php comments_number(); ?></span>-<span> <?php the_category(' , '); ?></span>
									</div>
									<div class="line"></div>
									<div class="single-content">
										<?php the_content(); ?>
									</div>
									<?php if(has_tag()) { ?>
										<div class="full-row tag-share margin-30 bg-white">
											<span>
												<?php the_tags(); ?>
											</span>
										</div>
									<?php } ?>
								</div>
							</div>
							<div class="post_pagination">
								<?php
									wp_link_pages();
								?>
							</div>
							<div class="margin-top-50">
							<?php if ( comments_open() || get_comments_number() ) : ?>
								<h4 class="inner-title"><?php comments_number( esc_html__('Comments ( 0 )', 'patron'), esc_html__('Comment ( 1 )', 'patron'), esc_html__('Comments ( % )', 'patron') ); ?></h4>								
								<?php comments_template(); ?>
							<?php  endif; ?> 
							</div>
						</div>
						<?php endwhile; ?>
					<?php endif; ?> 
					</div>
				</div>
			</div>
			<!--<div class="col-md-4 col-sm-12">
				<?php get_sidebar();?>
			</div>-->
		</div>
	</div>
</section> 
	
	
<?php get_footer(); ?>