<form role="search" class="header-search" action="<?php echo esc_url(home_url('/')); ?>" method="get">
	<input type="search" name="s" placeholder="<?php esc_html_e('Search Here...', 'patron'); ?>" value="<?php echo get_search_query(); ?>" >
	<input name="post_type" value="post" type="hidden">
	<span class="src-close"><i class="fa fa-times" aria-hidden="true"></i></span>
</form>