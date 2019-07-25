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
	  $service_field = get_field('service');
	 ?>
	<div class="service_wrap">
	<?php 
		foreach($service_field as $index => $service_field_item ){
	?>
		<div class="service_item" style="background-repeat: no-repeat; background-image: url('<?php echo $service_field_item['background_image'];  ?>');background-size: cover; background-attachment: scroll; background-position: top center; ">
			<div class="service_content_wrap">
				<div class="service_title"><?php  echo $service_field_item['title'];  ?></div>
				<div class="service_content"><?php  echo $service_field_item['content']; ?></div>
			</div>
			<div class="bottom_arrow">
				<?php
					$short_code_string = "[av_font_icon icon='ue875' font='entypo-fontello' style='' caption='' link='' linktarget='' size='40px' position='left' color=''][/av_font_icon]";
					echo do_shortcode($short_code_string);
				?>
			</div>
			<?php 
				if($index==1){
			?>
				<div class="two_start">
					<img src="http://localhost:1234/wp-content/uploads/2019/07/tow_start.png">
				</div>
			<?php
				}else if($index == 2){
			?>
				<div class="two_start">
					<img src="http://localhost:1234/wp-content/uploads/2019/07/one_start.png">
				</div>
			<?php 
				}
			?>
		</div>
	<?php
		}
	?>

	</div>

<?php wp_footer(); ?>