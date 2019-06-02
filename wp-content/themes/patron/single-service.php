<?php
 get_header();
 
 global $patron_option;
?>
	<?php get_template_part('banner', 'layout'); ?>
	
	<?php if(isset($patron_option['service_fullwidth']) and $patron_option['service_fullwidth']!='no' ){ ?>
	<section class="full-row">
		<div class="container-fluid">
			<div class="row">
				<?php while (have_posts()) : the_post()?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
	<?php }else{ ?>
	<section class="full-row">
		<div class="container">
			<div class="row">
				<?php if(isset($patron_option['single-service-layout']) && $patron_option['single-service-layout']== 1 ){ ?>
				<div class="col-md-12 col-sm-12">
					<div class="row">
						<?php while (have_posts()) : the_post()?>
							<?php the_content(); ?>
						<?php endwhile; ?>
					</div>
				</div>
				<?php } ?>
				<?php if(isset($patron_option['single-service-layout']) && $patron_option['single-service-layout']== 2 ){ ?>
				<div class="col-md-3 col-sm-3">
					<?php
						$service_menu = array(
							'theme_location'  => 'service-menu',
							'menu'            => '',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => '',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'patron_bootstrap_navwalker::fallback',
							'walker'          => new patron_bootstrap_navwalker(),
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul class="service-list">%3$s</ul>',
							'depth'           => 0,
						);
						if ( has_nav_menu( 'service-menu' ) ) {
							wp_nav_menu( $service_menu );
						}
					?> 				
					<?php if ( is_active_sidebar( 'service-sidebar' ) ) : ?>
						<div class="margin-top-30 service-widget">
							<?php dynamic_sidebar( 'service-sidebar' ); ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-md-9 col-sm-9">
					<div class="row">
						<?php while (have_posts()) : the_post()?>
							<?php the_content(); ?>
						<?php endwhile; ?>
					</div>
				</div>
				<?php } ?>
				<?php if(isset($patron_option['single-service-layout']) && $patron_option['single-service-layout']== 3 ){ ?>
					<div class="col-md-9 col-sm-9">
						<div class="row">
							<?php while (have_posts()) : the_post()?>
								<?php the_content(); ?>
							<?php endwhile; ?>
						</div>
					</div>
					<div class="col-md-3 col-sm-3">
						<?php
						$service_menu = array(
							'theme_location'  => 'service-menu',
							'menu'            => '',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => '',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'patron_bootstrap_navwalker::fallback',
							'walker'          => new patron_bootstrap_navwalker(),
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul class="service-list">%3$s</ul>',
							'depth'           => 0,
						);
						if ( has_nav_menu( 'service-menu' ) ) {
							wp_nav_menu( $service_menu );
						}
					?> 
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<?php } ?>

<?php 
 get_footer();	
?>