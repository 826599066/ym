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
	<div class="contact_top_wrap" style="background-repeat: no-repeat; background-image: url(<?php echo $upload_dir['baseurl'];  ?>/2019/06/contact_bc.jpg);background-size: cover; background-attachment: scroll; background-position: top center; ">
		<div class="container">
			<div class="contact_top_wrap">
				<div class="contact_top_title">
					<div class="en_title">ABOUT US</div>
					<div class="cn_title">公司简介</div>
				</div>
				<div class="contact_top_content">
					<?php 
						echo get_field('company_profile');
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="company_advantage">
		<div class="container">
			<?php
				$company_advantage = get_field('company_advantage');
			?>
			<div class="advantage_wrap">
			<?php
				foreach ($company_advantage as $company_advantage_item){
			?>
				<div class="advantage_item">
					<img src="<?php echo $company_advantage_item['icon']; ?>">
					<div class="advantage_title_content">
						<div class="advantage_title">
							<span><?php echo $company_advantage_item['cn_title'];  ?></span><span><?php echo $company_advantage_item['en_title'];  ?>
							</span>
						</div>
						<div class="advantage_content">
							<?php 
								echo $company_advantage_item['content'];
							?>
						</div>
					</div>
				</div>
				<?php 
					}
				?>
			</div>
		</div>
	</div>
	<div class="contact_us_wrap">
		<div class="container">
			<div class="contact_form_image">
				<div class="left_image">
					<img  src="http://localhost:1234/wp-content/uploads/2019/06/left_image.jpg">
				</div>
				<div class="right_contact">
					<div class="right_title">
						CONTACT
					</div>
					<div class="right_content">
						<?php 
							echo do_shortcode('[contact-form-7 id="93" title="contact page"]')
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	 
<?php wp_footer(); ?>