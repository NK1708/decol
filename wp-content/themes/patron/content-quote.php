<?php global $patron_option; $link_quote = get_post_meta(get_the_ID(),'patron_prefix_quote', true);  ?>
<?php if($patron_option['blog-layout'] == 1){ ?><div class="col-md-4 col-sm-4"><?php } else{ if($patron_option['blog-style'] != '3'){?><div class="col-md-6 col-sm-6"><?php } else { ?><div class="col-md-12 col-sm-12"><?php } } ?>
	<div class="blog-item image-rotate <?php if(is_sticky()){ echo 'bg-gray'; } else{ echo 'bg-white'; } ?>">
		<div class="full-row overflow-hidden">
			<?php if($link_quote != ''){ ?>
                <div class="quote-thumb padding20 bg-gray color-dark"><p><?php echo sprintf(__('%s', 'patron'), $link_quote); ?></p></div>
            <?php }else{ ?>
				<?php 
				if($patron_option['blog-style'] != '' && $patron_option['blog-style'] == '1'){
					if ( has_post_thumbnail()) {
						the_post_thumbnail('pt-thumb-medium');
					}
				}
				elseif($patron_option['blog-style'] != '' && $patron_option['blog-style'] == '2'){
					if ( has_post_thumbnail()) {
						the_post_thumbnail('pt-thumb-tall');
					}
				}
				elseif($patron_option['blog-style'] != '' && $patron_option['blog-style'] == '3'){
					if ( has_post_thumbnail()) {
						the_post_thumbnail('pt-thumb-blog');
					}
				}
				else{
					if ( has_post_thumbnail()) {
						the_post_thumbnail('pt-thumb-medium');
					}
				}
				?>
			<?php } ?>
		</div>
		<div class="blog-text">
			<a href="<?php the_permalink(); ?>">
				<h4 class="thumb-title"><?php the_title(); ?></h4>
			</a>
			<div class="post-admin"><span class="admin">By <?php echo get_the_author(); ?></span>-<span class="date"><?php the_time( get_option( 'date_format' ) ); ?> </span>-<span class="comments"><?php comments_number(); ?></span></div>
			<?php echo patron_blog_excerpt(); ?>
		</div>
	</div>
</div>