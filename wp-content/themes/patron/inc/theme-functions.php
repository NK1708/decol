<?php
	
if ( ! function_exists( 'custom_favicon' ) ) :
/**
 * Prints HTML with Custom Favicon.
 */
function custom_favicon() {
    global $patron_option;
    
    if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {        
        if($patron_option['favicon']['url'] !=''){ 
            echo '<link rel="shortcut icon" type="image/x-icon" href="'.esc_url($patron_option['favicon']['url']).'">';    
        } 
    } 
}
endif;


// Remove with and height attribute from img tag, image will follow the div width for responsove help
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

function ottd_meta($field_id){
	return get_post_meta( get_the_ID(), $field_id, true );
}


/**custom function tag widgets**/
function patron_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = 12; //largest tag
	$args['smallest'] = 12; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['format'] = 'list'; //ul with a class of wp-tag-cloud
	$args['exclude'] = ''; //exclude tags by ID
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'patron_tag_cloud_widget' );


// Excerpt limit of Blog Post
function patron_blog_excerpt() {
  global $patron_option;
  
  if(isset($patron_option['blog_excerpt'])){
    $limit = $patron_option['blog_excerpt'];
  }else{
    $limit = 35;
  }

  
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'';
	$excerpt = wp_strip_all_tags( $excerpt, true );
  } else {
    $excerpt = implode(" ",$excerpt);
  }
	  $excerpt = preg_replace( '/\[.+\]/','', $excerpt );
      $excerpt = apply_filters( 'the_content', $excerpt ); 
      $excerpt = str_replace( ']]>', ']]&gt;', $excerpt );
  return $excerpt;
}


//pagination
function get_pagination($prev = '<i class="fa fa-angle-double-left"></i>', $next = '<i class="fa fa-angle-double-right"></i>', $pages='') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }
    $pagination = array(
		'base' 			=> str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
		'format' 		=> '',
		'current' 		=> max( 1, get_query_var('paged') ),
		'total' 		=> $pages,
		'prev_text' 	=> $prev,
        'next_text' 	=> $next,
        'type'			=> 'list',
		'end_size'		=> 3,
		'mid_size'		=> 3
    );
    $return =  paginate_links( $pagination );
	echo str_replace( "<ul class='page-numbers'>", '', $return );
}


//Executer Custom Comments

function patron_comments($comment, $args, $depth){
	$GLOBALS['comment'] = $comment;
?>
	<li class="col-md-12">
		<div id="comment-<?php comment_ID(); ?>" class="comment-item margin-top-30">
			<div class="avata">
				<?php 
                    $comment_author_email = get_comment_author_email();
                    echo get_avatar( $comment_author_email, 70 );
                ?>
			</div>
			<div class="comment-detail">
				<h6><?php printf(__('%s','patron'), get_comment_author()) ?></h6>
				<span><i>Posted On:</i> <?php comment_date('dS M Y'); ?> - <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?></span><span class="comments-edit"><?php edit_comment_link( __( '(Edit)', 'patron' ), '  ', '' ); ?></span>
				<p><?php if ( $comment->comment_approved == '0' ) { ?>
				<?php esc_html_e( 'Your comment is awaiting moderation.', 'patron' ); ?><?php 
			} else{ comment_text(); } ?></p>
			</div>
		</div>
	</li>
<?php } ?>
