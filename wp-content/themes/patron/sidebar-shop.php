<?php
/**
 * The Sidebar Call from witget sidebar
 */
?>
<?php if ( is_active_sidebar( 'shop-sidebar' ) ) : ?>
	<div id="sidebar" class="shop-sidebar">
		<?php dynamic_sidebar( 'shop-sidebar' ); ?>
	</div>
<?php endif; ?>
