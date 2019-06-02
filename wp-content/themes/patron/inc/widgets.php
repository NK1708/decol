<?php

	/**
		* Widget directory path
	*/
	
	define('PATRON_DIR', get_template_directory());	
	define('PATRON_INC', PATRON_DIR . '/inc');
	define('PATRON_WIDGET', PATRON_INC . '/widget');
	
	
	/**
		* Widget files
	*/
	
	require_once(PATRON_WIDGET . '/newsletter.php');
	require_once(PATRON_WIDGET . '/socialmedia.php');
	require_once(PATRON_WIDGET . '/download_btn.php');
	require_once(PATRON_WIDGET . '/title_widget.php');
	require_once(PATRON_WIDGET . '/text_block.php');
?>