<?php

 /**
 * Template Name: Sidebar Template
 */	
 
 get_header();
 
 global $patron_option;
?>
	<?php get_template_part('banner', 'layout'); ?>
		
	<section class="full-row bg-gray" style="background-color: <?php if($patron_option['layout-bg-color'] != ''){ echo esc_attr( $patron_option['layout-bg-color'] ); } ?>">
		<?php if(isset($patron_option['layout_fullwidth']) && $patron_option['layout_fullwidth'] == 'yes' ){ ?>
		<div class="container-fluid">
		<?php } else{ ?>
			<div class="container">
		<?php } ?>
			<div class="row">
				<?php if(isset($patron_option['sidebar-layout']) && $patron_option['sidebar-layout'] == 2){ ?>
				<div class="col-md-3 col-sm-5">
					<?php
						$sidebar_navs = array(
							'theme_location'  => 'sidebar-nav',
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
							'items_wrap'      => '<ul class="about-category-nav">%3$s</ul>',
							'depth'           => 0,
						);
						if ( has_nav_menu( 'sidebar-nav' ) ) {
							wp_nav_menu( $sidebar_navs );
						}
					?> 
				</div>
				<?php } ?>
				<div class="col-md-9 col-sm-9">
					<div class="info-pages padding30 bg-white">
						<div class="row">
							<?php while (have_posts()) : the_post()?>
								<?php the_content(); ?>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
				<?php if(isset($patron_option['sidebar-layout']) && $patron_option['sidebar-layout'] == 3){ ?>
					<div class="col-md-3 col-sm-5">
					<?php
						$sidebar_navs = array(
							'theme_location'  => 'sidebar-nav',
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
							'items_wrap'      => '<ul class="about-category-nav">%3$s</ul>',
							'depth'           => 0,
						);
						if ( has_nav_menu( 'sidebar-nav' ) ) {
							wp_nav_menu( $sidebar_navs );
						}
					?> 
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
	
	
<?php 
 get_footer();	
?>