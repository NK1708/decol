<?php /**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
 ?>
 
<?php if ( have_comments() ) : ?>
	<div class="row">
		<ul class="post-comments">
			<?php wp_list_comments('callback=patron_comments'); ?>
			<?php
				// Are there comments to navigate through?
				if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			?>
				<nav class="navigation comment-navigation" role="navigation">		   
					<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'patron' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'patron' ) ); ?></div>
					<div class="clearfix"></div>
				</nav><!-- .comment-navigation -->
			<?php endif; // Check for comment navigation ?>

			<?php if ( ! comments_open() && get_comments_number() ) : ?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'patron' ); ?></p>
			<?php endif; ?>
		</ul>
	</div>		
<?php endif; ?>

<div class="comments-form margin-30">									
	<?php        
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$comment_args = array(
				'id_form' => 'comments-form', 
				'class_form' =>	'contact_message',
				'title_reply'=> '<span class="inner-title">'.esc_html__('Leave your comment','patron').'</span>',
				'fields' => apply_filters( 'comment_form_default_fields', array(
					'author' => '<div class="row"><div class="form-group col-md-6 col-sm-6"><input id="author" name="author" type="text" class="form-control" value="" placeholder="'. esc_html__( 'Name *', 'patron' ) .'" /></div>',
					'email' => '<div class="form-group col-md-6 col-sm-6"><input value="" name="email" type="text" class="form-control" placeholder="'. esc_html__( 'Email *', 'patron' ) .'" /></div></div>', 
				) ),                                
				 'comment_field' => '<div class="row"><div class="form-group col-md-12 col-sm-6"><textarea name="comment"'.$aria_req.' class="form-control" placeholder="'. esc_html__( 'Comment *', 'patron' ) .'" ></textarea></div></div>',                                                   
				 'label_submit' => esc_html__( 'Submit', 'patron' ),
				 'class_submit' =>	'btn btn-primary',
				 'comment_notes_before' => '',
				 'comment_notes_after' => '',               
		)
	?>
	<?php comment_form($comment_args); ?>
	<!-- //LEAVE A COMMENT -->
</div>