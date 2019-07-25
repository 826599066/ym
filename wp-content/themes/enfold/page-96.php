<?php
	if ( !defined('ABSPATH') ){ die(); }
	
	global $avia_config;

	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */
	 get_header();


 	 if( get_post_meta(get_the_ID(), 'header', true) != 'no') echo avia_title();
 	 
	  do_action( 'ava_after_main_title' );
	  $upload_dir = wp_upload_dir();
	 ?>
    <div class="advantage_wrap">
        <div class="advantage_left_image">
		</div>
		<div class="advantage_right_image">
			<img src="http://localhost:1234/wp-content/uploads/2019/07/right_circle_image.png">
		</div>
    </div>



<?php wp_footer(); ?>