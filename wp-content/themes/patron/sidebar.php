<?php
/**
 * The Sidebar Call from witget sidebar
 */
?>
<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
	<div id="sidebar" class="blog-sidebar padding30 bg-white">
	<?php dynamic_sidebar( 'blog-sidebar' ); ?>
	</div>
<?php endif; ?>
