<?php
// Custom Heading
add_shortcode('heading','heading_temp');
function heading_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'tagline'	=>	'',
		'title'		=>	'',
		'tag'		=> 	'h2',
		'align'		=>	'',
		'animation'	=>	'yes',
		'size'		=>	'',
		'color'		=>	'',	
		'class'		=>	'',
		'subtitle'	=>	'',
		'animation_style'	=>	'fadeIn',
		'delay_time'	=>	'300ms',
		'duration_time'	=>	'500ms',
	), $atts));
	
	$size1 = (!empty($size) ? 'font-size: '.$size.'px;' : '');
	$color1 = (!empty($color) ? 'color: '.$color.';' : '');
	ob_start(); 
?>
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="section-title-area<?php if($align != ''){ echo esc_attr($align); } ?> wow <?php if( $animation == 'yes' ){ echo esc_attr($animation_style); ?>" data-wow-delay="<?php echo esc_attr($delay_time); ?>" data-wow-duration="<?php echo esc_attr($duration_time); } ?>">
				<?php echo wp_specialchars_decode('<'. $tag .' class="section-title ' . $class . '" style="' . $size1 . $color1 . '" ><span class="title-tag">' . $tagline . '</span> '. $title .'</'. $tag .'>'); ?>
				<?php if( $subtitle != '' ){ ?><span class="sub-title" style="<?php echo esc_attr($color1); ?>"><?php echo wp_specialchars_decode($subtitle); ?></span><?php } ?>
			</div>
		</div>
	</div>
	
<?php
    return ob_get_clean();
}


// Inner title and Box title
add_shortcode('inner_heading','inner_heading_temp');
function inner_heading_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=>	'',
		'tag'		=> 	'h3',
		'align'		=>	'',
		'animation'	=>	'yes',
		'size'		=>	'',
		'class'		=>	'',
	), $atts));
	
	$size1 = (!empty($size) ? 'font-size: '.$size.'px;' : '');
	$align1 = (!empty($align) ? 'text-align: '.$align.';' : '');	
	ob_start(); 
?>

	<?php echo wp_specialchars_decode('<'. $tag .' class="inner-title" style="' . $size1 . $align1 . '" >'. $title .'</'. $tag .'>'); ?>
	
<?php
    return ob_get_clean();
}


// Custom Text Block
add_shortcode('ot_text_block','ot_text_block_temp');
function ot_text_block_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'inner_title'	=>	'',
		'tag'			=> 	'h3',
		'ot_content'	=>	'',
	), $atts));
	
	ob_start(); 
?>

	<div class="row">
		<div class="col-md-12">
			<?php if($inner_title != ''){ echo wp_specialchars_decode('<'. $tag .' class="thumb-title">'. $inner_title .'</'. $tag .'>'); } ?>
			<div class="text-wrapper">
				<?php echo wpb_js_remove_wpautop( $ot_content, true ); ?>
			</div>
		</div>
	</div>
	
<?php
    return ob_get_clean();
}


// Grid Style with round box icon
add_shortcode('ot_icon_grid','ot_icon_grid_temp');
function ot_icon_grid_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'grid_title'	=>	'',
		'tag'			=> 	'h5',
		'icon_class'	=>	'',
		'icon_size'		=>	'',
		'icon_grid_text' =>	'',
	), $atts));
	
	ob_start(); 
?>

	<div class="special-service-item text-center">
		<?php if($icon_class != ''){ ?>
			<span class="<?php echo esc_attr($icon_class); ?> bg-default" style="<?php echo esc_attr($icon_size); ?>"></span>
		<?php } ?>
		<?php if($grid_title != ''){ echo wp_specialchars_decode('<'. $tag .' class="thumb-title">'. $grid_title .'</'. $tag .'>'); } ?>
		<?php echo wpb_js_remove_wpautop( $icon_grid_text, true ); ?>
	</div>
	
<?php
    return ob_get_clean();
}


// Service Grid Style 1
add_shortcode('services','ot_services_grid_temp');
function ot_services_grid_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'number'			=>	'',
		'services_columns'	=>	4,
		'tag'				=> 	'h5',
		'grid_align'		=>	'left',
		'grid_bg'			=>	'',
		'order'				=>	'ASC',
		'show_btn'			=>	'yes',
		'show_icon'			=>	'yes',
		'animation'			=>	'yes',
		'btn_text'			=>	'',
	), $atts));
	$number1 = (!empty($number) ? $number : 4);
	$btntext = (!empty($btn_text) ? $btn_text : 'Read More');
	
	ob_start(); 
?>

<div class="row">
	<?php

		$args = array(
			'post_type' => 'service',
			'showposts' => $number1,
			'order' => 'ASC',
		);
		$x = 1;
		$services = new WP_Query($args);
		if($services->have_posts()) : while($services->have_posts()) : $services->the_post(); 
		$x++;
	?>
	<?php if($grid_align != 'center'){ ?>
	<div class="col-md-<?php echo esc_attr($services_columns); ?> col-sm-6">
		<div class="service-item <?php if($grid_bg != ''){ echo esc_attr($grid_bg); } if($animation == 'yes'){ ?> wow fadeInRight" data-wow-delay="<?php echo intval($x); ?>00ms" data-wow-duration="500ms<?php } ?>"> 
			<?php if($show_icon == 'yes'){ ?><span class="<?php echo rwmb_meta('patron_prefix_icon'); ?>"></span><?php } ?>
			<div class="service-caption margin-left-15">
				<a href="<?php the_permalink(); ?>"><<?php echo esc_attr($tag); ?> class="service-title"><?php the_title(); ?></<?php echo esc_attr($tag); ?>></a>
				<?php the_excerpt(); ?>
				<?php if($show_btn == 'yes'){ ?><a class="btn-link" href="<?php the_permalink(); ?>"><?php echo wp_specialchars_decode($btntext); ?></a><?php } ?>
			</div>
		</div>
	</div>
	<?php } else { ?>	
	<div class="col-md-<?php echo esc_attr($services_columns); ?> col-sm-6">
		<div class="service-item <?php if($grid_align == 'center'){ echo 'text-center'; } ?> <?php if($grid_bg != ''){ echo esc_attr($grid_bg); } if($animation == 'yes'){ ?> wow fadeInRight" data-wow-delay="<?php echo intval($x); ?>00ms" data-wow-duration="500ms<?php } ?>"> 
			<div class="service-caption">
				<?php if($show_icon == 'yes'){ ?><span class="<?php echo rwmb_meta('patron_prefix_icon'); ?>"></span><?php } ?>
				<a href="<?php the_permalink(); ?>" class="<?php if($grid_align == 'center'){ echo 'margin-top-20'; } ?>"><<?php echo esc_attr($tag); ?> class="service-title"><?php the_title(); ?></<?php echo esc_attr($tag); ?>></a>
				<?php the_excerpt(); ?>
				<?php if($show_btn == 'yes'){ ?><a class="btn-link" href="<?php the_permalink(); ?>"><?php echo wp_specialchars_decode($btntext); ?></a><?php } ?>
			</div>
		</div>
	</div>	
	<?php } ?>
	<?php endwhile; wp_reset_postdata(); endif; ?>	
</div>
	
<?php
    return ob_get_clean();
}


// Simple thumbnail grid box
add_shortcode('ot_thumbnail','ot_thumbnail_temp');
function ot_thumbnail_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'grid_image'	=>	'',
		'grid_title'	=>	'',
		'parmalink'		=>	'',
		'tag'			=> 	'h5',
		'animation'		=>	'yes',
		'grid_content'	=>	'',
		'show_btn'		=>	'yes',
		'btn_text' 		=>	'',
		'animation_style'	=>	'',
		'delay_time'	=>	'100ms',
		'duration_time'	=>	'500ms',
	), $atts));
	$img = wp_get_attachment_image_src($grid_image, 'pt-thumb-medium');
	$img_link = $img[0];
	$link = vc_build_link( $parmalink );
	$btntext = (!empty($btn_text) ? $btn_text : 'Read More');
	ob_start(); 
?>
	
	<div class="row">
		<div class="col-md-12">
			<div class="welcome-item image-rotate<?php if($animation == 'yes'){ ?> wow <?php echo esc_attr($animation_style); ?>" data-wow-delay="<?php echo esc_attr($delay_time); ?>" data-wow-duration="<?php echo esc_attr($duration_time); } ?>">
				<?php if($grid_image != ''){ ?>
					<a class="overflow-hidden" href="<?php echo esc_url($link['url']); ?>">
						<img src="<?php echo esc_url($img_link); ?>" alt="<?php echo get_bloginfo('name'); ?>">
					</a>
				<?php } ?>
				<?php if($grid_title != '')
					{ 
						echo wp_specialchars_decode('<a href="'.esc_url($link['url']).'"><'.$tag.' class="thumb-title">'.$grid_title.'</'.$tag.'></a>');
					} 
				 ?>
				<?php echo wpb_js_remove_wpautop( $grid_content, true ); ?>
				<?php if($show_btn == 'yes'){ ?><a class="btn-link" href="<?php echo esc_url($link['url']); ?>"><?php echo wp_specialchars_decode($btntext); ?></a><?php } ?>
			</div>
		</div>
	</div>
	
<?php
    return ob_get_clean();
}



// Achivement banner and fact counter
add_shortcode('ot_fact_banner','ot_fact_banner_temp');
function ot_fact_banner_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'counter'			=>	'yes',
		'count_item'		=>	4,
		'title'				=>	'',
		'tag'				=> 	'h3',
		'banner_text'		=>	'',
		'ac_title1'			=>	'',
		'ac_quantity1'		=>	'',
		'ac_title2'			=>	'',
		'ac_quantity2'		=>	'',
		'ac_title3'			=>	'',
		'ac_quantity3'		=>	'',
		'ac_title4'			=>	'',
		'ac_quantity4'		=>	'',
	), $atts));
	ob_start(); 
?>
	
	<div class="row">
		<?php if($counter == 'yes' && $count_item == 4){ ?>
		<div class="fact-counter color-white">
			<div class="col-md-3 col-sm-3">
				<div class="achivement text-center count wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms">
					<?php if($ac_quantity1 != ''){ echo wp_specialchars_decode('<strong class="count-num" data-speed="3000" data-stop="' .$ac_quantity1. '">' .$ac_quantity1. '</strong>'); } ?> 
					<?php if($ac_title1 != '' ){ echo wp_specialchars_decode('<span>' .$ac_title1. '</span>'); } ?>
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="achivement text-center count wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms">
					<?php if($ac_quantity2 != ''){ echo wp_specialchars_decode('<strong class="count-num" data-speed="3000" data-stop="' .$ac_quantity2. '">' .$ac_quantity2. '</strong>'); } ?> 
					<?php if($ac_title2 != '' ){ echo wp_specialchars_decode('<span>' .$ac_title2. '</span>'); } ?>
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="achivement text-center count wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms"> 
					<?php if($ac_quantity3 != ''){ echo wp_specialchars_decode('<strong class="count-num" data-speed="3000" data-stop="' .$ac_quantity3. '">' .$ac_quantity3. '</strong>'); } ?> 
					<?php if($ac_title3 != '' ){ echo wp_specialchars_decode('<span>' .$ac_title3. '</span>'); } ?>
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="achivement text-center count wow fadeIn" data-wow-delay="300ms" data-wow-duration="300ms"> 
					<?php if($ac_quantity4 != ''){ echo wp_specialchars_decode('<strong class="count-num" data-speed="3000" data-stop="' .$ac_quantity4. '">' .$ac_quantity4. '</strong>'); } ?> 
					<?php if($ac_title4 != '' ){ echo wp_specialchars_decode('<span>' .$ac_title4. '</span>'); } ?> 
				</div>
			</div>
		</div>
		<?php 		
			}
			
			if($counter == 'yes' && $count_item == 3){
		?>
		<div class="fact-counter color-white">
			<div class="col-md-4 col-sm-4">
				<div class="achivement text-center count wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms">
					<?php if($ac_quantity1 != ''){ echo wp_specialchars_decode('<strong class="count-num" data-speed="3000" data-stop="' .$ac_quantity1. '">' .$ac_quantity1. '</strong>'); } ?> 
					<?php if($ac_title1 != '' ){ echo wp_specialchars_decode('<span>' .$ac_title1. '</span>'); } ?> 
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="achivement text-center count wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms">
					<?php if($ac_quantity2 != ''){ echo wp_specialchars_decode('<strong class="count-num" data-speed="3000" data-stop="' .$ac_quantity2. '">' .$ac_quantity2. '</strong>'); } ?> 
					<?php if($ac_title2 != '' ){ echo wp_specialchars_decode('<span>' .$ac_title2. '</span>'); } ?>
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="achivement text-center count wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms"> 
					<?php if($ac_quantity3 != ''){ echo wp_specialchars_decode('<strong class="count-num" data-speed="3000" data-stop="' .$ac_quantity3. '">' .$ac_quantity3. '</strong>'); } ?> 
					<?php if($ac_title3 != '' ){ echo wp_specialchars_decode('<span>' .$ac_title3. '</span>'); } ?>
				</div>
			</div>
		</div>
		<?php 
			}
			
			if($counter == 'yes' && $count_item == 2){
		?>
		<div class="fact-counter color-white">
			<div class="col-md-6 col-sm-6">
				<div class="achivement text-center count wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms">
					<?php if($ac_quantity1 != ''){ echo wp_specialchars_decode('<strong class="count-num" data-speed="3000" data-stop="' .$ac_quantity1. '">' .$ac_quantity1. '</strong>'); } ?> 
					<?php if($ac_title1 != '' ){ echo wp_specialchars_decode('<span>' .$ac_title1. '</span>'); } ?> 
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="achivement text-center count wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms">
					<?php if($ac_quantity2 != ''){ echo wp_specialchars_decode('<strong class="count-num" data-speed="3000" data-stop="' .$ac_quantity2. '">' .$ac_quantity2. '</strong>'); } ?> 
					<?php if($ac_title2 != '' ){ echo wp_specialchars_decode('<span>' .$ac_title2. '</span>'); } ?>
				</div>
			</div>
		</div>
		<?php 
			}
		?>
		<div class="col-md-12 col-sm-12">
			<div class="achivment-caption text-center margin-top-50 wow fadeInDown" data-wow-delay="300ms" data-wow-duration="500ms">
				<?php if($title != ''){ echo wp_specialchars_decode('<' . $tag . ' class="banner-title color-white">' . $title . '</' . $tag . '>'); } ?>
				<?php echo wpb_js_remove_wpautop( $banner_text, true ); ?>
			</div>
		</div>
	</div>
	
<?php
    return ob_get_clean();
}



// Recent News Grid
add_shortcode('ot_recent_news','ot_recent_news_temp');
function ot_recent_news_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'hover_effect'	=>	'yes',
		'item_show'		=>	'',
		'media_size'	=>	'',
		'bg_color'		=>	'#fff',
		'admin_bar'		=>	'yes',
		'animation'		=>	'yes',
	), $atts));
	$number1 = (!empty($item_show) ? $item_show : 3);
	$bg_color1 = (!empty($bg_color) ? 'background-color: '.$bg_color.';' : '');
	ob_start(); 
?>
	
	<div class="row">
		<?php
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => $number1,
				'orderby' => 'post_date',
			);
			$wp_query = new WP_Query($args);
		    while($wp_query->have_posts()) : $wp_query->the_post(); 
		?>
		<div class="col-md-4 col-sm-6">
			<div class="blog-item image-rotate <?php if($animation != ''){ ?>wow zoomIn" data-wow-delay="300ms" data-wow-duration="500ms<?php } ?>" style="<?php echo esc_attr($bg_color1); ?>">
				<div class="full-row overflow-hidden">
					<?php 
						if ( has_post_thumbnail()) {
							the_post_thumbnail($media_size);
						} 
					?>
					<?php if($hover_effect != ''){ ?><div class="overlay"> <a href="<?php the_permalink(); ?>"><span class="flaticon-add plus"></span></a> </div> <?php } ?>
				</div>
				<div class="blog-text">
					<a href="<?php the_permalink(); ?>"><h5 class="thumb-title"><?php the_title(); ?></h5></a>
					<div class="post-admin"><span class="admin">By <?php echo get_the_author(); ?></span>-<span class="date"><?php the_time( get_option( 'date_format' ) ); ?> </span>-<span class="comments"><?php comments_number(); ?></span></div>
					<?php echo patron_blog_excerpt(); ?>
				</div>
			</div>
		</div>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
	
<?php
    return ob_get_clean();
}



// Gallery Image Slider
add_shortcode('ot_gallery_slide','ot_gallery_slide_temp');
function ot_gallery_slide_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'item_show'		=>	'',
		'slider'		=>	'yes',
	), $atts));
	$number1 = (!empty($item_show) ? $item_show : 4);
	ob_start(); 
?>
	
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="<?php if($slider != ''){ ?>photo-gallery<?php } ?>">
				<?php
					$args = array(
						'post_type' => 'gallery',
						'posts_per_page' => $number1,
						'orderby' => 'post_date',
					);
					$wp_query = new WP_Query($args);
					while($wp_query->have_posts()) : $wp_query->the_post(); 
				?>
				<div class="item">
					<div class="gallery-item">
						<?php 
							if ( has_post_thumbnail()) {
								the_post_thumbnail('pt-thumb-tall');
							} 
						?>
						<div class="overlay traingle">
							<a href="<?php the_permalink(); ?>" class="img_view info">
								<span class="flaticon-add plus"></span>
							</a>
						</div>
					</div>
				</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
	
<?php
    return ob_get_clean();
}



// Testimonial Items Slider
add_shortcode('ot_testimonial_slide','ot_testimonial_slide_temp');
function ot_testimonial_slide_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'item_show'		=>	'',
		'slider'		=>	'yes',
	), $atts));
	$number1 = (!empty($item_show) ? $item_show : 3);
	ob_start(); 
?>
	
	
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="testimonials-carousel">
				<?php
					$args = array(
						'post_type' => 'testimonial',
						'posts_per_page' => $number1,
						'orderby' => 'post_date',
					);
					$wp_query = new WP_Query($args);
					while($wp_query->have_posts()) : $wp_query->the_post(); 
				?>
				<div class="item">
					<div class="feedback">
						<?php 
							if ( has_post_thumbnail()) {
								the_post_thumbnail('thumbnail');
							} 
						?>
						<?php the_content(); ?>
						<div class="testimonial-person-detail">
							<h4 class="thumb-title"><?php the_title(); ?></h4>
							<span><?php echo rwmb_meta('patron_prefix_designation'); ?></span>
						</div>
					</div>
				</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
	
	
<?php
    return ob_get_clean();
}



// Simple Slider Bootstrap
add_shortcode('ot_simple_slider','ot_simple_slider_temp');
function ot_simple_slider_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'item_show'		=>	'',
		'bullate'		=>	'yes',
		'position'		=>	'1',
		'quote'			=>	'yes',
		'form_title'	=>	'Form Title',
		'sub_title'		=>	'Form subtitle',
		'id'			=>	'',
	), $atts));
	$number1 = (!empty($item_show) ? $item_show : 1);
	ob_start(); 
?>
	<div class="row">
		<div id="slider" class="slider-item">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
				<!-- Indicators -->
				<?php if($bullate == 'yes'){ ?>
				<div class="<?php if($position == '2'){ echo 'carousel-indicators-2'; } ?>">
					<ol class="carousel-indicators">
						<?php 
							for( $i = 0; $i < $number1; $i++ ){
						?>
							<li data-target="#carousel-example-generic" data-slide-to="<?php echo intval($i); ?>" <?php if( $i== 0 ){ echo 'class="active"'; } ?>></li>
						<?php 
							}
						?>
					</ol>
				</div>
				<?php } ?>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<?php
						$args = array(
							'post_type' => 'slider',
							'posts_per_page' => $number1,
							'orderby' => 'post_date',
						);
						$x = 0;
						$wp_query = new WP_Query($args);
						while($wp_query->have_posts()) : $wp_query->the_post(); 
						$x++
					?>
					<div class="item <?php if ($x==1){ echo 'active'; } ?>"> 
						<?php 
							if ( has_post_thumbnail()) {
								the_post_thumbnail('full');
							} 
						?>
						<div class="carousel-caption">
							<div class="container">
								<div class="row">
									<div class="col-md-8">
										<span><?php the_title(); ?></span>
										<?php if(rwmb_meta('patron_prefix_slider_content') != ''){ ?><p><?php echo rwmb_meta('patron_prefix_slider_content'); ?></p><?php } ?>
										<?php if(rwmb_meta('patron_prefix_slider_button') != ''){ ?><a class="btn btn-primary margin-top-30" href="<?php echo rwmb_meta('patron_prefix_slider_url'); ?>"><?php echo rwmb_meta('patron_prefix_slider_button'); ?></a><?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
			<?php if($quote == 'yes'){ ?>
			<div class="request-quote bg-white"> 
				<div class="quote-title bg-default color-white">
					<h4 class="color-white"><?php echo esc_attr($form_title); ?></h4>
					<p><?php echo esc_attr($sub_title); ?></p>
				</div>
				<?php if($id != ''){ echo do_shortcode('[contact-form-7 id="'.$id.'"]'); }?>
			</div>
			<?php } ?>
		</div>
	</div>
	
<?php
    return ob_get_clean();
}




// Request A Quote Form
add_shortcode('ot_quote_form','ot_quote_form_temp');
function ot_quote_form_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'title'			=>	'Form Title',
		'subtitle'		=>	'Form subtitle',
		'position'		=>	'yes',
		'title_color'	=>	'',
		'bg_color'		=>	'',
		'id'			=>	'',
	), $atts));
	$title_color1 = (!empty($title_color) ? 'color: '.$title_color.';' : '');
	$bg_color1 = (!empty($bg_color) ? 'background: '.$bg_color.';' : '');
	$position1 = (!empty($position) ? 'position: static;' : '');
	ob_start(); 
?>
	
	
	<div class="row">
		<div class="col-md-12">
			<div class="request-quote-2 bg-gray" style="<?php if($bg_color != ''){ echo esc_attr($bg_color1); } ?> <?php if($position != 'yes'){ echo esc_attr($position1); } ?>">
				<div class="quote-title bg-default color-white">
					<?php echo wp_specialchars_decode('<h4 class="color-white" style="' .$title_color1. '">' .$title. '</h4>'); ?>
					<?php echo wp_specialchars_decode('<p>' .$subtitle. '</p>'); ?>
				</div>
				<?php if($id != ''){ echo do_shortcode('[contact-form-7 id="'.$id.'"]'); }?>
			</div>
		</div>
	</div>
	
	
<?php
    return ob_get_clean();
}



// Custom Button
add_shortcode('ot_custom_btn','ot_custom_btn_temp');
function ot_custom_btn_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'btn_style'		=>	'',
		'btn_text'		=>	'',
		'parmalink'		=>	'#',
		'margin'		=>	'',
		'class'			=>	'',
		'size'			=>	'14',
	), $atts));
	$size1 = (!empty($size) ? 'font-size: '.$size.'px;' : '');
	$margin1 = (!empty($margin) ? 'margin-top: '.$margin.'px;' : '');
	$link = vc_build_link( $parmalink );
	ob_start(); 
?>
	<?php 
	if ( strlen( $link['url'] ) > 0 ) {
		echo '<a href="' . esc_url($link['url']) . '" class="btn ' . esc_attr($btn_style) . ' ' . esc_attr($class) . '" style="' . esc_attr($size1) . esc_attr($margin1) . '">' . wp_specialchars_decode($btn_text) . '</a>'; 
	}
	?>
	
<?php
    return ob_get_clean();
}




// Left Content Box On Service Section
add_shortcode('service_left_box','service_left_box_temp');
function service_left_box_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'tagline'	=>	'',
		'title'		=>	'',
		'tag'		=> 	'h2',
		'align'		=>	'',
		'animation'	=>	'yes',
		'size'		=>	'',
		'color'		=>	'',	
		'class'		=>	'',
		'subtitle'	=>	'',
		'ot_content'	=>	'',
		'btn_text'	=>	'',
		'parmalink'	=>	'#',
		'animation_style'	=>	'fadeIn',
		'delay_time'	=>	'300ms',
		'duration_time'	=>	'500ms',
	), $atts));
	$link = vc_build_link( $parmalink );
	$color1 = (!empty($color) ? 'color: '.$color.';' : '');
	ob_start(); 
?>
	
	<div class="row">
		<div class="col-md-12">
			<div class="service-left bg-extra-dark wow <?php if( $animation == 'yes' ){ echo esc_attr($animation_style); ?>" data-wow-delay="<?php echo esc_attr($delay_time); ?>" data-wow-duration="<?php echo esc_attr($duration_time); } ?>">
				<div class="section-title-area<?php if($align != ''){ echo esc_attr($align); } ?>">
					<?php echo wp_specialchars_decode('<'. $tag .' class="section-title ' . $class . '" style="' . $color1 . '" ><span class="title-tag">' . $tagline . '</span> '. $title .'</'. $tag .'>'); ?>
					<?php if( $subtitle != '' ){ ?><span class="sub-title" style="<?php echo esc_attr($color1); ?>"><?php echo wp_specialchars_decode($subtitle); ?></span><?php } ?>
				</div>
				<div class="service-text">
					<?php echo wpb_js_remove_wpautop( $ot_content, true ); ?>
				</div>
				<?php
				if ( strlen( $link['url'] ) > 0 ) {
					echo '<a href="' . esc_url($link['url']) . '" class="btn btn-primary">' . wp_specialchars_decode($btn_text) . '</a>';
				}
				?>
			</div>
		</div>
	</div>
	
<?php
    return ob_get_clean();
}



// Why Choose Content Grid
add_shortcode('ot_why_choose','ot_why_choose_temp');
function ot_why_choose_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=>	'',
		'box_text'	=>	'',
		'tag'		=> 	'h5',
		'align'		=>	'',
		'box_gap'	=>	'30',
		'animation'	=>	'yes',
		'add_link'	=>	'no',
		'parmalink'	=>	'#',
		'animation_style'	=>	'fadeIn',
		'delay_time'	=>	'300ms',
		'duration_time'	=>	'500ms',
	), $atts));
	
	$box_gap1 = (!empty($box_gap) ? 'padding-bottom: '.$box_gap.'px;' : '');
	
	ob_start(); 
?>
	
	<div class="row">
		<div class="col-md-12">
			<div class="flex-box why-us-text text-<?php if($align != ''){ echo esc_attr($align); } ?>" style="<?php if($box_gap1 != ''){ echo esc_attr($box_gap1); } ?>">
				<?php if($align == 'left'){ ?><span class="color-default fa fa-circle-o"></span><?php } ?>
				<div class="margin-<?php if($align != ''){ echo esc_attr($align); } ?>-15 wow <?php if( $animation == 'yes' ){ echo esc_attr($animation_style); ?>" data-wow-delay="<?php echo esc_attr($delay_time); ?>" data-wow-duration="<?php echo esc_attr($duration_time); } ?>"> 
					<?php if($add_link == 'yes'){ ?><a class="margin-bottom-15" href="#"><?php } else { ?><div class="margin-bottom-15"><?php } ?>
						<?php echo wp_specialchars_decode('<' . $tag . ' class="no-margin">' . $title . '</' . $tag . '>'); ?>		
					<?php if($add_link == 'yes'){ ?></a><?php } else { ?></div><?php } ?>
					<p><?php if($box_text != ''){ echo wp_specialchars_decode($box_text); } ?></p>
				</div>
				<?php if($align == 'right'){ ?><span class="color-default fa fa-circle-o"></span><?php } ?>
			</div>
		</div>
	</div>
	
<?php
    return ob_get_clean();
}



// Achivement Simple
add_shortcode('ot_achivment_simple','ot_achivment_simple_temp');
function ot_achivment_simple_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'count_item'		=>	4,
		'ac_title1'			=>	'',
		'ac_quantity1'		=>	'',
		'ac_title2'			=>	'',
		'ac_quantity2'		=>	'',
		'ac_title3'			=>	'',
		'ac_quantity3'		=>	'',
		'ac_title4'			=>	'',
		'ac_quantity4'		=>	'',
		'animation'			=>	'yes',
		'animation_style'	=>	'',
		'delay_time'		=>	'100ms',
		'duration_time'		=>	'500ms',
	), $atts));
	
	
	ob_start(); 
?>
	<div class="row">
		<?php if($count_item == 4){ ?>
		<div class="fact-counter color-white achivement-2">
			<div class="col-md-3 col-sm-3">
				<div class="achivement text-center count wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms">
					<?php if($ac_quantity1 != ''){ echo wp_specialchars_decode('<strong class="count-num color-default" data-speed="3000" data-stop="' .$ac_quantity1. '">' .$ac_quantity1. '</strong>'); } ?> 
					<?php if($ac_title1 != '' ){ echo wp_specialchars_decode('<span>' .$ac_title1. '</span>'); } ?>
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="achivement text-center count wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms">
					<?php if($ac_quantity2 != ''){ echo wp_specialchars_decode('<strong class="count-num color-default" data-speed="3000" data-stop="' .$ac_quantity2. '">' .$ac_quantity2. '</strong>'); } ?> 
					<?php if($ac_title2 != '' ){ echo wp_specialchars_decode('<span>' .$ac_title2. '</span>'); } ?>
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="achivement text-center count wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms"> 
					<?php if($ac_quantity3 != ''){ echo wp_specialchars_decode('<strong class="count-num color-default" data-speed="3000" data-stop="' .$ac_quantity3. '">' .$ac_quantity3. '</strong>'); } ?> 
					<?php if($ac_title3 != '' ){ echo wp_specialchars_decode('<span>' .$ac_title3. '</span>'); } ?>
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="achivement text-center count wow fadeIn" data-wow-delay="300ms" data-wow-duration="300ms"> 
					<?php if($ac_quantity4 != ''){ echo wp_specialchars_decode('<strong class="count-num color-default" data-speed="3000" data-stop="' .$ac_quantity4. '">' .$ac_quantity4. '</strong>'); } ?> 
					<?php if($ac_title4 != '' ){ echo wp_specialchars_decode('<span>' .$ac_title4. '</span>'); } ?> 
				</div>
			</div>
		</div>
		<?php 		
			}
			
			if($count_item == 3){
		?>
		<div class="fact-counter color-white">
			<div class="col-md-4 col-sm-4">
				<div class="achivement text-center count wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms">
					<?php if($ac_quantity1 != ''){ echo wp_specialchars_decode('<strong class="count-num color-default" data-speed="3000" data-stop="' .$ac_quantity1. '">' .$ac_quantity1. '</strong>'); } ?> 
					<?php if($ac_title1 != '' ){ echo wp_specialchars_decode('<span>' .$ac_title1. '</span>'); } ?> 
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="achivement text-center count wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms">
					<?php if($ac_quantity2 != ''){ echo wp_specialchars_decode('<strong class="count-num color-default" data-speed="3000" data-stop="' .$ac_quantity2. '">' .$ac_quantity2. '</strong>'); } ?> 
					<?php if($ac_title2 != '' ){ echo wp_specialchars_decode('<span>' .$ac_title2. '</span>'); } ?>
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="achivement text-center count wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms"> 
					<?php if($ac_quantity3 != ''){ echo wp_specialchars_decode('<strong class="count-num color-default" data-speed="3000" data-stop="' .$ac_quantity3. '">' .$ac_quantity3. '</strong>'); } ?> 
					<?php if($ac_title3 != '' ){ echo wp_specialchars_decode('<span>' .$ac_title3. '</span>'); } ?>
				</div>
			</div>
		</div>
		<?php 
			}
			
			if($count_item == 2){
		?>
		<div class="fact-counter color-white">
			<div class="col-md-6 col-sm-6">
				<div class="achivement text-center count wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms">
					<?php if($ac_quantity1 != ''){ echo wp_specialchars_decode('<strong class="count-num color-default" data-speed="3000" data-stop="' .$ac_quantity1. '">' .$ac_quantity1. '</strong>'); } ?> 
					<?php if($ac_title1 != '' ){ echo wp_specialchars_decode('<span>' .$ac_title1. '</span>'); } ?> 
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="achivement text-center count wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms">
					<?php if($ac_quantity2 != ''){ echo wp_specialchars_decode('<strong class="count-num color-default" data-speed="3000" data-stop="' .$ac_quantity2. '">' .$ac_quantity2. '</strong>'); } ?> 
					<?php if($ac_title2 != '' ){ echo wp_specialchars_decode('<span>' .$ac_title2. '</span>'); } ?>
				</div>
			</div>
		</div>
		<?php 
			}
		?>
	</div>
	
<?php
    return ob_get_clean();
}




// Working Experience
add_shortcode('ot_working_experience','ot_working_experience_temp');
function ot_working_experience_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'org_name'		=>	'',
		'start_year'	=>	'',
		'end_year'		=> 	'',
		'description'	=>	'',
		'ot_position'	=>	'',
		'box_gap'		=>	'30',
	), $atts));
	
	$box_gap1 = (!empty($box_gap) ? 'padding-bottom: '.$box_gap.'px;' : '');
	
	ob_start(); 
?>
	
	<div class="working-experience-items full-row">
		<?php if($ot_position != '' && $ot_position == 'right'){ ?>
		<div class="padding-bottom-30" style="<?php if($box_gap != ''){ echo esc_attr($box_gap1); } ?>">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="btn-experience-left pull-right">
						<a class="btn btn-primary" href="#"><?php if( $start_year != '' ){ echo wp_specialchars_decode( $start_year. '-' .$end_year ); } ?></a>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="experience-content-right">
						<h6><?php if($org_name != ''){ echo wp_specialchars_decode($org_name); } ?></h6>
						<p><?php if($description != ''){ echo wp_specialchars_decode($description); } ?></p>
					</div>
				</div>
			</div>
		</div>
		<?php } else { ?>
		<div class="padding-bottom-30" style="<?php if($box_gap != ''){ echo esc_attr($box_gap1); } ?>">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="experience-content-left text-right">
						<h6><?php if($org_name != ''){ echo wp_specialchars_decode($org_name); } ?></h6>
						<p><?php if($description != ''){ echo wp_specialchars_decode($description); } ?></p>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="btn-experience-right full-row">
						<a class="btn btn-primary" href="#"><?php if( $start_year != '' ){ echo wp_specialchars_decode( $start_year. '-' .$end_year ); } ?></a>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	
<?php
    return ob_get_clean();
}




// Skill Average Progress Bar
add_shortcode('ot_skill_bar','ot_skill_bar_temp');
function ot_skill_bar_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'values'		=>	'0',
		'data_speed'	=> 	'3000',
	), $atts));
	
	$values1 = (array) vc_param_group_parse_atts( $values );
	
	ob_start(); 
?>
	
<div class="average-skill">
	<div class="skill-progress margin-top-20">
		<?php 
			foreach($values1 as $data){ 
			$data['skill'] = isset( $data['skill'] ) ? $data['skill'] : '';
			$data['value'] = isset( $data['value'] ) ? $data['value'] : '';
		?>
		<div class="prgs-bar fact-counter">
			<span><?php echo esc_attr($data['skill']); ?></span>
			<div class="progress count wow fadeIn" data-wow-duration="0ms">
				<div class="skill-percent"><span class="count-num" data-speed="<?php echo esc_attr($data_speed); ?>" data-stop="<?php echo esc_attr($data['value']); ?>">0</span>%</div>
				<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_attr($data['value']); ?>" aria-valuemax="100"> </div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
	
<?php
    return ob_get_clean();
}



// Educational Experience List
add_shortcode('ot_edu_info','ot_edu_info_temp');
function ot_edu_info_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'values'		=>	'',
	), $atts));
	
	$values1 = (array) vc_param_group_parse_atts( $values );
	
	ob_start(); 
?>

	<div class="education-experience">
		<?php 
			foreach($values1 as $data){ 
			$data['edu'] = isset( $data['edu'] ) ? $data['edu'] : '';
			$data['start_year'] = isset( $data['start_year'] ) ? $data['start_year'] : '';
			$data['end_year'] = isset( $data['end_year'] ) ? $data['end_year'] : '';
		?>
		<div class="experience-duration margin-top-30">
			<span class="duration"><?php echo wp_specialchars_decode($data['start_year'].'-'.$data['end_year']); ?></span>
			<p><?php echo wp_specialchars_decode($data['edu']); ?></p>
		</div>
		<?php } ?>
	</div>
	
	
<?php
    return ob_get_clean();
}



// Team Grid Slider
add_shortcode('ot_team_grid','ot_team_grid_temp');
function ot_team_grid_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'item_show'		=>	'',
		'slider'		=>	'yes',
	), $atts));
	
	$number1 = (!empty($item_show) ? $item_show : 4);
	
	ob_start(); 
?>

	<div class="our-team">
		<?php
			$args = array(
				'post_type' => 'pix_team',
				'posts_per_page' => $number1,
				'orderby' => 'post_date',
			);
			$wp_query = new WP_Query($args);
		    while($wp_query->have_posts()) : $wp_query->the_post(); 
		?>
		<div class="item">
			<div class="team-member full-row">
				<?php 
					if ( has_post_thumbnail()) {
						the_post_thumbnail('pt-thumb-tall');
					} 
				?>
				<div class="team-title padding-15 text-center">
					<h6><?php echo ottd_meta('_amz_client_name'); ?></h6>
					<span class="designation">- <?php echo ottd_meta('_amz_designation'); ?> -</span>
				</div>
				<div class="team-overlay">
					<div class="team-title padding-15 text-center"><a href="<?php the_permalink(); ?>"><h6><?php echo ottd_meta('_amz_client_name'); ?></h6></a> <span class="designation">- <?php echo ottd_meta('_amz_designation'); ?> -</span></div>
					<?php the_excerpt(); ?>
					<div class="social-icon margin-top-30">
						<?php $fb = ottd_meta('_amz_facebook'); if( $fb != '' ){ ?><a href="<?php echo esc_url( $fb ); ?>"><i class="fa fa-facebook"></i></a><?php } ?>
						<?php $tw = ottd_meta('_amz_twitter'); if( $tw != '' ){ ?><a href="<?php echo esc_url( $tw ); ?>"><i class="fa fa-twitter"></i></a><?php } ?>
						<?php $gp = ottd_meta('_amz_googleplus'); if( $gp != '' ){ ?><a href="<?php echo esc_url( $gp ); ?>"><i class="fa fa-google-plus"></i></a><?php } ?>
						<?php $link = ottd_meta('_amz_linkedin'); if( $link != '' ){ ?><a href="<?php echo esc_url( $link ); ?>"><i class="fa fa-linkedin"></i></a><?php } ?>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
	
	
<?php
    return ob_get_clean();
}




// Testmonial Style 2
add_shortcode('ot_testimonial_slide2','ot_testimonial_slide2_temp');
function ot_testimonial_slide2_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'item_show'		=>	'',
		'slider'		=>	'yes',
	), $atts));
	$number1 = (!empty($item_show) ? $item_show : 3);
	ob_start(); 
?>
	
	
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="testimonials-carousels">
				<?php
					$args = array(
						'post_type' => 'testimonial',
						'posts_per_page' => $number1,
						'orderby' => 'post_date',
					);
					$wp_query = new WP_Query($args);
					while($wp_query->have_posts()) : $wp_query->the_post(); 
				?>
				<div class="item full-row text-center padding20 margin-30 bg-white">
					<div class="feedback">
						<?php 
							if ( has_post_thumbnail()) {
								the_post_thumbnail('thumbnail');
							} 
						?>
						<div class="testimonial-person-detail margin-30">
							<h4 class="thumb-title"><?php the_title(); ?></h4>
							<span class="rank"><?php echo rwmb_meta('patron_prefix_designation'); ?></span> 
						</div>
						<?php the_content(); ?>
						<span class="thank color-default padding-15"><?php esc_html_e('Thank You', 'patron'); ?></span> 
					</div>
				</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
	
	
<?php
    return ob_get_clean();
}




// Pricing Table
add_shortcode('ot_pricing_table','ot_pricing_table_temp');
function ot_pricing_table_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=>	'',
		'values'	=>	'',
		'price'		=>	'$',
		'currency'	=>	'',
		'float_value'	=>	'99',
		'instalment' =>	'Monthly',
		'btn_style'	=>	'btn-secondary',
		'btn_text'	=>	'Buy Now',
		'parmalink'	=>	'#',
	), $atts));

	$values1 = (array) vc_param_group_parse_atts( $values );
	$link = vc_build_link( $parmalink );
	ob_start(); 
?>
	
	<div class="pricing-item padding-bottom-30 margin-bottom-30 text-center bg-gray-2 wow zoomIn" data-wow-delay="300ms" data-wow-duration="500ms">
		<h3 class="thumb-title padding-30 no-margin"><?php if($title != ''){ echo esc_attr($title); } ?></h3>
		<div class="month-rate padding-15 bg-dark color-white"<?php if($price != ''){ echo wp_specialchars_decode('>'. $currency .'<span>' .$price. '<sup>.' .$float_value. '</sup>/</span>' .$instalment); } ?></div>
		<ul class="price-list margin-top-30">
		<?php 
			foreach($values1 as $data){			
			$data['fac_list'] = isset( $data['fac_list'] ) ? $data['fac_list'] : '';
		?>
		
		<?php echo wp_specialchars_decode('<li>' .$data['fac_list']. '</li>'); ?>
		
		<?php } ?>
		</ul>
		<a class="btn <?php if($btn_style != ''){ echo esc_attr($btn_style); } ?>" href="<?php if($link != ''){ echo esc_url($link['url']); } ?>"><?php if($btn_text != ''){ echo wp_specialchars_decode($btn_text); } ?></a> 
	</div>
	
<?php
    return ob_get_clean();
}



// Simple Text Banner
add_shortcode('ot_simple_banner','ot_simple_banner_temp');
function ot_simple_banner_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=>	'',
		'tag'		=>	'h2',
		'subtitle'	=>	'',
		'color'		=>	'',
	), $atts));
	
	$color1 = (!empty($color) ? 'color: '.$color.';' : '');

	ob_start(); 
?>
	
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="wow zoomIn" data-wow-delay="300ms" data-wow-duration="500ms">
				<<?php echo esc_attr($tag); ?> class="color-white" style="<?php echo esc_attr($color1); ?>"><?php if($title != ''){ echo esc_attr($title); } ?></<?php echo esc_attr($tag); ?>>
				<div class="special-speech-sub-title color-white" style="<?php echo esc_attr($color1); ?>">
					<p><?php if($subtitle != ''){ echo wp_specialchars_decode($subtitle); } ?></p>
				</div>
			</div>
		</div>
	</div>
	
<?php
    return ob_get_clean();
}



// 3Grid Text Banner
add_shortcode('ot_3grid_banner','ot_3grid_banner_temp');
function ot_3grid_banner_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'icon_left'		=>	'',
		'icon_mid'		=>	'',
		'icon_right'	=>	'',
		'title_left'	=>	'',
		'title_mid'		=>	'',	
		'title_right'	=>	'',
		'content_left'	=>	'',		
		'content_mid'	=>	'',
		'content_right'	=>	'',
		'color'			=>	'',
		'top_line'		=>	'yes',
	), $atts));
	
	$color1 = (!empty($color) ? 'color: '.$color.';' : '');

	ob_start(); 
?>
	
	<div class="row">
		<div class="wow zoomIn" data-wow-delay="300ms" data-wow-duration="500ms">
			<div class="col-md-4 col-sm-12">
				<div class="specification-item full-row text-center" style="<?php echo esc_attr($color1); ?>">
					<?php if($top_line == 'yes'){ ?>
						<span class="fa fa-circle-o"></span><strong class="white-line bg-white"></strong> 
					<?php } ?>
					<i class="fa <?php if($icon_left != ''){ echo esc_attr($icon_left); } ?>"></i>
					<h4 class="margin-30 color-white"><?php if($title_left != ''){ echo wp_specialchars_decode($title_left); } ?></h4>
					<p><?php if($content_left != ''){ echo wp_specialchars_decode($content_left); } ?></p>
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="specification-item full-row text-center" style="<?php echo esc_attr($color1); ?>">
					<?php if($top_line == 'yes'){ ?>
						<span class="fa fa-circle-o"></span><strong class="white-line bg-white"></strong>
					<?php } ?>
					<i class="fa <?php if($icon_mid != ''){ echo esc_attr($icon_left); } ?>"></i>
					<h4 class="margin-30 color-white"><?php if($title_mid != ''){ echo wp_specialchars_decode($title_mid); } ?></h4>
					<p><?php if($content_mid != ''){ echo wp_specialchars_decode($content_mid); } ?></p>
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="specification-item full-row text-center" style="<?php echo esc_attr($color1); ?>">
					<?php if($top_line == 'yes'){ ?><span class="fa fa-circle-o"></span><?php } ?>
					<i class="fa <?php if($icon_right != ''){ echo esc_attr($icon_left); } ?>"></i>
					<h4 class="margin-30 color-white"><?php if($title_right != ''){ echo wp_specialchars_decode($title_right); } ?></h4>
					<p><?php if($content_right != ''){ echo wp_specialchars_decode($content_right); } ?></p>
				</div>
			</div>
		</div>
	</div>
	
<?php
    return ob_get_clean();
}



// OT Testimonial Filter
add_shortcode('ot_testmonial_filter','ot_testmonial_filter_temp');
function ot_testmonial_filter_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'title'			=>	'',
		'tag'			=>	'h3',
		'num'			=>	'',
		'pagination'	=>	'',
		'gap'			=>	'30',
		'bg_color'		=>	'',
		'extraclass'	=>	'',
	), $atts));
	
	$bg_color1 = (!empty($bg_color) ? 'background-color: '.$bg_color.';' : '');
	$no_border = (!empty($bg_color) ? 'border: none;' : '');
	$num1 = (!empty($num) ? $num : 5);

	ob_start(); 
?>
	
	<?php if($title != ''){ echo wp_specialchars_decode('<' .$tag. ' class="inner-title">' .$title. '</' .$tag. '>'); } ?>
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<?php
				if ( get_query_var('paged') ) {
					$paged = get_query_var('paged');
				} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
					$paged = get_query_var('page');
				} else {
					$paged = 1;
				}
				$args = array(
					'posts_per_page' => $num1,
					'post_type' => 'testimonial',
					'paged' => $paged,
				);
				$wp_query = new WP_Query($args);
				while($wp_query->have_posts()) : $wp_query->the_post(); 
			?>
			<div class="testimonials margin-top-50 text-center" style="<?php echo esc_attr($bg_color1); ?>">
				<div class="item">
					<div class="feedback">
						<div class="testimonial-person-img margin-bottom-15">
							<?php 
								if ( has_post_thumbnail()) {
									the_post_thumbnail('thumbnail');
								} 
							?>
						</div>
						<?php the_content(); ?>
						<div class="testimonial-person-detail" style="<?php echo esc_attr($no_border); ?>">
							<h4 class="thumb-title"><?php the_title(); ?></h4>
							<span><?php echo rwmb_meta('patron_prefix_designation'); ?></span>
						</div>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
		<?php if($pagination == 'yes'){ ?>
		<div class="blog_pagination">
			<nav aria-label="Page navigation">
				<ul class="pagination">
				<?php
					if ( get_query_var('paged') ) {
						$paged = get_query_var('paged');
					} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
						$paged = get_query_var('page');
					} else {
						$paged = 1;
					}
					$big = 999999999;
					$navigation = array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '',
						'current' => max( 1, $paged ),
						'total' => $wp_query->max_num_pages,                      
						'prev_text' => '<i class="fa fa-angle-double-left"></i>',
						'next_text' => '<i class="fa fa-angle-double-right"></i>',       
						'type'          => 'list',
						'end_size'      => 3,
						'mid_size'      => 3
					);									
					$return = paginate_links($navigation);										
					echo str_replace( "<ul class='page-numbers'>", '', $return );			
				?>	
				<!-- </ul> end from function -->
			</nav>
		</div>
		<?php } ?>
		<?php wp_reset_postdata(); ?>
	</div>
	
<?php
    return ob_get_clean();
}



// OT History List Content
add_shortcode('ot_history_content','ot_history_content_temp');
function ot_history_content_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=>	'',
		'start_year'	=>	'',
		'end_year'	=>	'',
		'ot_content'	=>	'',
		'btn_text'		=>	'',
		'parmalink'		=>	''
	), $atts));
	
	$btntext = (!empty($btn_text) ? $btn_text : 'Read More');
	$link = vc_build_link( $parmalink );
	ob_start(); 
?>
	
	<?php if($title != ''){ ?>
	<div class="history_info">
		<span><?php echo esc_attr($start_year); ?> - <?php echo esc_attr($end_year); ?></span>
		<h5><?php echo esc_attr($title); ?></h5>
		<?php echo wpb_js_remove_wpautop( $ot_content, true ); ?>
		<?php echo '<a class="btn-link" href="' .esc_url($link['url']). '">' .wp_specialchars_decode($btntext). '</a>'; ?>
	</div>
	<?php } ?>
	
<?php
    return ob_get_clean();
}



// OT Award Grid
add_shortcode('ot_award_grid', 'ot_award_grid_temp');
function ot_award_grid_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'award_img'		=>	'',
		'title'			=>	'',
		'institute'		=>	'',
		'date'			=>	'',
		'month'			=>	'',
		'year'			=>	'',
		'award_text'	=>	'',
		'parmalink'		=>	'',
	), $atts));
	
	$img = wp_get_attachment_image_src($award_img, 'pt-thumb-medium');
	$img_link = $img[0];
	$link = vc_build_link( $parmalink );
	ob_start(); 
?>
	<?php if($title != ''){ ?>
	<div class="item flex-box margin-top-20 margin-bottom-30">
		<a href="<?php echo esc_url($link['url']); ?>" title="<?php echo esc_attr($link['title']); ?>"><img class="margin-right-15" src="<?php echo esc_attr($img_link); ?>" alt="<?php echo get_bloginfo('name'); ?>"></a>
		<div class="full-row">
			<a href="<?php echo esc_url($link['url']); ?>" title="<?php echo esc_attr($link['title']); ?>"><h5 class="no-margin"><?php echo wp_specialchars_decode($title); ?></h5></a>
			<ul class="padding-15">
				<?php if($date != ''){ ?><li><span><?php esc_html_e('Award Date', 'patron'); ?> :</span> <?php echo wp_specialchars_decode($date.' '.$month.' '.$year); ?></li><?php } ?>
				<?php if($institute != ''){ ?><li><span><?php esc_html_e('Award By', 'patron'); ?> :</span> <?php echo wp_specialchars_decode($institute); ?></li><?php } ?>
			</ul>
			<p><?php if($award_text != ''){ echo wp_specialchars_decode($award_text); } ?></p>
		</div>
	</div>
	<?php } ?>
	
<?php
    return ob_get_clean();
}



// OT Team Member Filter
add_shortcode('ot_team_filter','ot_team_filter_temp');
function ot_team_filter_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'num'			=>	'',
		'pagination'	=>	'',
		'bg_color'		=>	'',
		'extraclass'	=>	'',
	), $atts));
	
	$bg_color1 = (!empty($bg_color) ? 'background-color: '.$bg_color.';' : '');
	$no_border = (!empty($bg_color) ? 'border: none;' : '');
	$num1 = (!empty($num) ? $num : 5);

	ob_start(); 
?>
	
	<div class="row">
		<?php
			if ( get_query_var('paged') ) {
				$paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
				$paged = get_query_var('page');
			} else {
				$paged = 1;
			}
			$args = array(
				'posts_per_page' => $num1,
				'post_type' => 'pix_team',
				'paged' => $paged,
				'orderby' => 'post_date',
			);
			$wp_query = new WP_Query($args);
			while($wp_query->have_posts()) : $wp_query->the_post(); 
		?>
		<div class="col-md-3 col-sm-6">
			<div class="team-member full-row margin-bottom-30">
				<?php 
					if ( has_post_thumbnail()) {
						the_post_thumbnail('pt-thumb-tall');
					} 
				?>
				<div class="team-title padding-15 text-center">
					<h6><?php echo ottd_meta('_amz_client_name'); ?></h6>
					<span class="designation">- <?php echo ottd_meta('_amz_designation'); ?> -</span>
				</div>
				<div class="team-overlay">
					<div class="team-title padding-15 text-center"><a href="<?php the_permalink(); ?>"><h6><?php echo ottd_meta('_amz_client_name'); ?></h6></a> <span class="designation">- <?php echo ottd_meta('_amz_designation'); ?> -</span></div>
					<?php the_excerpt(); ?>
					<div class="social-icon margin-top-30">
						<?php $fb = ottd_meta('_amz_facebook'); if( $fb != '' ){ ?><a href="<?php echo esc_url( $fb ); ?>"><i class="fa fa-facebook"></i></a><?php } ?>
						<?php $tw = ottd_meta('_amz_twitter'); if( $tw != '' ){ ?><a href="<?php echo esc_url( $tw ); ?>"><i class="fa fa-twitter"></i></a><?php } ?>
						<?php $gp = ottd_meta('_amz_googleplus'); if( $gp != '' ){ ?><a href="<?php echo esc_url( $gp ); ?>"><i class="fa fa-google-plus"></i></a><?php } ?>
						<?php $link = ottd_meta('_amz_linkedin'); if( $link != '' ){ ?><a href="<?php echo esc_url( $link ); ?>"><i class="fa fa-linkedin"></i></a><?php } ?>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php if($pagination == 'yes'){ ?>
			<div class="blog_pagination">
				<nav aria-label="Page navigation">
					<ul class="pagination">
						<?php
						if ( get_query_var('paged') ) {
							$paged = get_query_var('paged');
						} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
							$paged = get_query_var('page');
						} else {
							$paged = 1;
						}
						$big = 999999999;
						$navigation = array(
							'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' => '',
							'current' => max( 1, $paged ),
							'total' => $wp_query->max_num_pages,                      
							'prev_text' => '<i class="fa fa-angle-double-left"></i>',
							'next_text' => '<i class="fa fa-angle-double-right"></i>',       
							'type'          => 'list',
							'end_size'      => 3,
							'mid_size'      => 3
						);									
						$return = paginate_links($navigation);										
						echo str_replace( "<ul class='page-numbers'>", '', $return );			
						?>	
					<!-- </ul> end from function -->
				</nav>
			</div>
			<?php } ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
	
<?php
    return ob_get_clean();
}



// OT Gallery Filter
add_shortcode('ot_gallery_filter','ot_gallery_filter_temp');
function ot_gallery_filter_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'num'			=>	'',
		'pagination'	=>	'',
		'gap'			=>	'',
		'column'		=>	4,
		'bg_color'		=>	'',
		'extraclass'	=>	'',
	), $atts));
	
	$bg_color1 = (!empty($bg_color) ? 'background-color: '.$bg_color.';' : '');
	$no_border = (!empty($bg_color) ? 'border: none;' : '');
	$num1 = (!empty($num) ? $num : 5);

	ob_start(); 
?>
	
	<?php if($gap == 'yes'){ ?><div class="row"><?php } ?>
		<?php
			if ( get_query_var('paged') ) {
				$paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
				$paged = get_query_var('page');
			} else {
				$paged = 1;
			}
			$args = array(
				'posts_per_page' => $num1,
				'post_type' => 'gallery',
				'paged' => $paged,
				'orderby' => 'post_date',
			);
			$wp_query = new WP_Query($args);
			while($wp_query->have_posts()) : $wp_query->the_post(); 
		?>
		<div class="col-md-<?php if($column != ''){ echo esc_attr($column); } ?> col-sm-6">
			<?php if($gap != 'yes'){ ?><div class="row"><?php } ?>
				<div class="gallery-item <?php if($gap != 'yes'){ ?>no-margin<?php } ?>">
					<?php 
						if ( has_post_thumbnail()) {
							the_post_thumbnail('pt-thumb-medium');
						} 
					?>
					<div class="overlay">
						<div class="gallery-text">
							<a class="img_view" href="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url( 'full' ); } ?>" data-fancybox="images"><span class="flaticon-add"></span></a>
							<a href="<?php the_permalink(); ?>"><h5 class="gallery_title full-row color-white"><?php the_title(); ?></h5></a>
						</div>
					</div>
				</div>
			<?php if($gap != 'yes'){ ?></div><?php } ?>
		</div>
		<?php endwhile; ?>
	<?php if($gap == 'yes'){ ?></div><?php } ?>
	<div class="row">
		<div class="col-md-12">
			<?php if($pagination == 'yes'){ ?>
			<div class="blog_pagination margin-top-30">
				<nav aria-label="Page navigation">
					<ul class="pagination">
						<?php
						if ( get_query_var('paged') ) {
							$paged = get_query_var('paged');
						} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
							$paged = get_query_var('page');
						} else {
							$paged = 1;
						}
						$big = 999999999;
						$navigation = array(
							'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' => '',
							'current' => max( 1, $paged ),
							'total' => $wp_query->max_num_pages,                      
							'prev_text' => '<i class="fa fa-angle-double-left"></i>',
							'next_text' => '<i class="fa fa-angle-double-right"></i>',       
							'type'          => 'list',
							'end_size'      => 3,
							'mid_size'      => 3
						);									
						$return = paginate_links($navigation);										
						echo str_replace( "<ul class='page-numbers'>", '', $return );			
						?>	
					<!-- </ul> end from function -->			
				</nav>
			</div>
			<?php } ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
	
<?php
    return ob_get_clean();
}




// Download Banner
add_shortcode('ot_download_banner','ot_download_banner_temp');
function ot_download_banner_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=>	'',
		'tag'		=>	'h3',
		'color'		=>	'#fff',
		'btn_style'	=>	'',
		'btn_text'	=>	'',
		'parmalink'	=>	'',
		'class'		=>	'',
	), $atts));
	
	$color1 = (!empty($color) ? 'color: '.$color.';' : '');

	ob_start(); 
?>
	
	<div class="row">
		<div class="container">
			<div class="row guide">
				<div class="col-md-9 col-sm-7">
					<?php echo wp_specialchars_decode('<'. $tag .' class="banner-title no-margin ' . $class . '" style="' . $color1 . '" >'. $title .'</'. $tag .'>'); ?>
				</div>
				<div class="col-md-3 col-sm-5">
					<?php echo wp_specialchars_decode('<a href="' . esc_url($parmalink) . '" class="btn ' . $btn_style . ' download-btn"><i class="fa fa-file-pdf-o"></i> ' . $btn_text . '</a>'); ?>
				</div>
			</div>
		</div>
	</div>
	
<?php
    return ob_get_clean();
}




// Skill Average Progress Bar
add_shortcode('ot_brand_logo','ot_brand_logo_temp');
function ot_brand_logo_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'values'		=>	'0',
	), $atts));
	
	$values1 = (array) vc_param_group_parse_atts( $values );
	
	
	ob_start(); 
?>
	
	<div class="row">
		<div class="col-md-12">
			<div class="partner-slider">
			<?php 
				foreach($values1 as $data){
				
				$img = wp_get_attachment_image_src($data['attachment'], '');
				$img_link = $img[0];
				$link = vc_build_link( $data['parmalink'] );
			?>
			
			<div class="item">
				<a href="<?php echo esc_url($link['url']); ?>"><img src="<?php echo esc_url($img_link); ?>" alt="<?php echo get_bloginfo('name'); ?>"></a>
			</div>
			<?php } ?>
			</div>
		</div>
	</div>
	
<?php
    return ob_get_clean();
}


// Video Link and Popup
add_shortcode('ot_video_popup','ot_video_popup_temp');
function ot_video_popup_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'video_link'	=>	'',
		'animation'		=>	'yes',
		'poster'		=>	'',
	), $atts));
	
	$img = wp_get_attachment_image_src($poster, '');
	$img_link = $img[0];
	$link = vc_build_link( $video_link );
	ob_start(); 
?>
	
	<div class="about-video <?php if($animation == 'yes'){ ?>wow fadeInRight" data-wow-delay="300ms" data-wow-duration="500ms<?php } ?>">
	<style> .about-video{ background: url(<?php if($img_link != ''){ echo esc_url($img_link); } ?>) } </style>
		<a class="video-popup" href="<?php echo esc_url($link['url']); ?>" title="<?php echo esc_attr($link['title']); ?>"><span class="flaticon-play-button play"></span></a>
		<!-- Use youtube or Vimeo video link in href, first open the video and just copy the link from url and past here -->
	</div>
	
<?php
    return ob_get_clean();
}



// Shadow Content Box
add_shortcode('ot_shadow_content','ot_shadow_content_temp');
function ot_shadow_content_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'title'			=>	'',
		'tag'			=>	'h3',
		'subtitle'		=>	'',
		'ot_content'	=>	'',
		'grid_bg'		=>	'',
		'box_shadow'	=>	'yes',
		'show_btn'		=>	'yes',
		'btn_text'		=>	'',
		'btn_style'		=>	'',
		'parmalink'		=>	'',
		'margin'		=>	'',
	), $atts));
	
	$btntext = (!empty($btn_text) ? $btn_text : 'Read More');
	$margin1 = (!empty($margin) ? 'margin-top: '.$margin.'px;' : '');
	$link = vc_build_link( $parmalink );
	
	ob_start(); 
?>
	
	<div class="padding30 <?php if($box_shadow == 'yes'){ echo 'box-shadow'; } ?>">
		<div class="section-title-area-left">
			<?php echo wp_specialchars_decode('<'. $tag .' class="section-title">'. $title .'</'. $tag .'>'); ?>
			<?php if( $subtitle != '' ){ ?><span class="sub-title"><?php echo wp_specialchars_decode($subtitle); ?></span><?php } ?>
		</div>
		<?php echo wpb_js_remove_wpautop( $ot_content, true ); ?>
		<?php
		if ( strlen( $link['url'] ) > 0 ) {
			echo '<a href="' . esc_url($link['url']) . '" class="btn ' . esc_attr($btn_style) . '" style="' . esc_attr($margin1) . '">' . wp_specialchars_decode($btn_text) . '</a>';
		}
		?>
	</div>
	
<?php
    return ob_get_clean();
}



// Shadow Content Box
add_shortcode('ot_icon_content','ot_icon_content_temp');
function ot_icon_content_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'title'			=>	'',
		'tag'			=>	'h5',
		'ot_content'	=>	'',
		'icon_name'		=>	'',
		'icon_position'	=>	'left',
		'margin'		=>	'',
		'top_margin'	=>	'',
	), $atts));
	
	$margin1 = (!empty($margin) ? 'margin-bottom: '.$margin.'px;' : '');
	$margin2 = (!empty($top_margin) ? 'margin-top: '.$top_margin.'px;' : '');
	
	ob_start(); 
?>
	
	<div class="<?php if($icon_position == 'left'){ echo 'flex-box';  } ?>" style="<?php if($margin1 != ''){ echo esc_attr($margin1); } ?>"> 
		<?php if($icon_name != ''){ ?><span class="<?php echo esc_attr($icon_name); ?>" style="<?php if($top_margin != ''){ echo esc_attr($margin2); } ?>"></span><?php } ?>
		<div class="<?php if($icon_position == 'left'){ echo 'margin-left-15'; } ?>">
			<?php echo wp_specialchars_decode('<'. $tag .' class="thumb-title">' . $title . '</'. $tag .'>'); ?>
			<?php echo wpb_js_remove_wpautop( $ot_content, true ); ?>
		</div>
	</div>
	
<?php
    return ob_get_clean();
}




// Google Map
add_shortcode('ot_gmap','ot_gmap_temp');
function ot_gmap_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'height'		=>	'',
		'latitude'		=>	'',
		'longitude'		=>	'',
		'zoom_map'		=>	'',
		'map_icon'		=>	'',
		'style'			=>	'',
	), $atts));
	
	$height1 = (!empty($height) ? 'height: '.$height.'px;' : '');
	$map_icon1 = wp_get_attachment_image_src($map_icon,'full');
	$map_icon1 = $map_icon1[0];
	
	ob_start(); 
?>
	<div class="row">
		<div id="map" style="<?php echo esc_attr($height1); ?>"></div>
	</div>
	
	<script>
		google.maps.event.addDomListener(window, 'load', init);
		function init() {
			'use strict';			
			var mapOptions = {
				zoom: <?php echo esc_js($zoom_map); ?>,
				center: new google.maps.LatLng(<?php echo esc_js($latitude); ?>, <?php echo esc_js($longitude); ?>), // New York
				styles: 
				[
					{
						"featureType": "administrative",
						"elementType": "all",
						"stylers": [
							{
								"saturation": "-100"
							}
						]
					},
					{
						"featureType": "administrative.province",
						"elementType": "all",
						"stylers": [
							{
								"visibility": "off"
							}
						]
					},
					{
						"featureType": "landscape",
						"elementType": "all",
						"stylers": [
							{
								"saturation": -100
							},
							{
								"lightness": 65
							},
							{
								"visibility": "on"
							}
						]
					},
					{
						"featureType": "poi",
						"elementType": "all",
						"stylers": [
							{
								"saturation": -100
							},
							{
								"lightness": "50"
							},
							{
								"visibility": "simplified"
							}
						]
					},
					{
						"featureType": "road",
						"elementType": "all",
						"stylers": [
							{
								"saturation": "-100"
							}
						]
					},
					{
						"featureType": "road.highway",
						"elementType": "all",
						"stylers": [
							{
								"visibility": "simplified"
							}
						]
					},
					{
						"featureType": "road.arterial",
						"elementType": "all",
						"stylers": [
							{
								"lightness": "30"
							}
						]
					},
					{
						"featureType": "road.local",
						"elementType": "all",
						"stylers": [
							{
								"lightness": "40"
							}
						]
					},
					{
						"featureType": "transit",
						"elementType": "all",
						"stylers": [
							{
								"saturation": -100
							},
							{
								"visibility": "simplified"
							}
						]
					},
					{
						"featureType": "water",
						"elementType": "geometry",
						"stylers": [
							{
								"hue": "#ffff00"
							},
							{
								"lightness": -25
							},
							{
								"saturation": -97
							}
						]
					},
					{
						"featureType": "water",
						"elementType": "labels",
						"stylers": [
							{
								"lightness": -25
							},
							{
								"saturation": -100
							}
						]
					}
				]
			};

			var mapElement = document.getElementById('map');
			var map = new google.maps.Map(mapElement, mapOptions);
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(<?php echo esc_js($latitude); ?>, <?php echo esc_js($longitude); ?>),
				map: map,
				icon: '<?php echo esc_js($map_icon1); ?>',
				title: 'Snazzy!'
			});
		}
	</script>
	
<?php
    return ob_get_clean();
}




// List Content Style
add_shortcode('ot_list_style','ot_list_style_temp');
function ot_list_style_temp($atts, $content = null){
	extract(shortcode_atts(array(
		'style'		=>	'',
		'values'	=>	'0',
		'top_space'	=>	'',
	), $atts));
	
	$values1 = (array) vc_param_group_parse_atts( $values );
	$top_space1 = (!empty($top_space) ? 'padding-top: '.$top_space.'px;' : '');
	
	ob_start(); 
?>
	
	<ul class="agreement-list" style="<?php if($top_space1 != ''){ echo esc_attr($top_space1); } ?>">
		<?php 
			foreach($values1 as $list_data){ 
			$list_data['list'] = isset( $list_data['list'] ) ? $list_data['list'] : '';
		?>
		
			<li><i class="fa <?php if($style != ''){ echo esc_attr($style); } ?>"></i> <span><?php echo wp_specialchars_decode($list_data['list']); ?></span></li>
		<?php } ?>
	</ul>
	
<?php
    return ob_get_clean();
}
?>