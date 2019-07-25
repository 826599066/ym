<?php 
global $avia_config;

$responsive		= avia_get_option('responsive_active') != "disabled" ? "responsive" : "fixed_layout";
$headerS 		= avia_header_setting();
$social_args 	= array('outside'=>'ul', 'inside'=>'li', 'append' => '');
$icons 			= !empty($headerS['header_social']) ? avia_social_media_icons($social_args, false) : "";

if(isset($headerS['disabled'])) return;

?>

<header id='header' class='all_colors header_color <?php avia_is_dark_bg('header_color'); echo " ".$headerS['header_class']; ?>' <?php avia_markup_helper(array('context' => 'header','post_type'=>'forum'));?>>

<?php

if($responsive)
{
	echo '<a id="advanced_menu_toggle" href="#" '.av_icon_string('mobile_menu').'></a>';
	echo '<a id="advanced_menu_hide" href="#" 	'.av_icon_string('close').'></a>';
}


//subheader, only display when the user chooses a social header
if($headerS['header_topbar'] == true)
{
?>
		<div id='header_meta' class='container_wrap container_wrap_meta <?php echo avia_header_class_string(array('header_social', 'header_secondary_menu', 'header_phone_active'), 'av_'); ?>'>
		
			      <div class='container'>
			      <?php
			            /*
			            *	display the themes social media icons, defined in the wordpress backend
			            *   the avia_social_media_icons function is located in includes/helper-social-media-php
			            */
						$nav = "";
						
						//display icons
			            if(strpos( $headerS['header_social'], 'extra_header_active') !== false) echo $icons;
					
						//display navigation
						if(strpos( $headerS['header_secondary_menu'], 'extra_header_active') !== false )
						{
			            	//display the small submenu
			                $avia_theme_location = 'avia2';
			                $avia_menu_class = $avia_theme_location . '-menu';
			                $args = array(
			                    'theme_location'=>$avia_theme_location,
			                    'menu_id' =>$avia_menu_class,
			                    'container_class' =>$avia_menu_class,
			                    'fallback_cb' => '',
			                    'container'=>'',
			                    'echo' =>false
			                );
			                
			                $nav = wp_nav_menu($args);
						}
			                
						if(!empty($nav) || apply_filters('avf_execute_avia_meta_header', false))
						{
							echo "<nav class='sub_menu' ".avia_markup_helper(array('context' => 'nav', 'echo' => false)).">";
							echo $nav;
		                    do_action('avia_meta_header'); // Hook that can be used for plugins and theme extensions (currently: the wpml language selector)
							echo '</nav>';
						}
						
						
						//phone/info text	
						$phone			= $headerS['header_phone_active'] != "" ? $headerS['phone'] : "";
						$phone_class 	= !empty($nav) ? "with_nav" : "";
						if($phone) 		{ echo "<div class='phone-info {$phone_class}'><span>".do_shortcode($phone)."</span></div>"; }
							
							
			        ?>
			      </div>
		</div>

<?php } 
	
	
	
	$output 	 = "";
	$temp_output = "";
	$icon_beside = "";
	
	if($headerS['header_social'] == 'icon_active_main' && empty($headerS['bottom_menu']))
	{
		$icon_beside = " av_menu_icon_beside"; 
	}
	
	
	
	
	
	
?>
		<div  id='header_main' class='container_wrap container_wrap_logo'>
	
        <?php
        /*
        * Hook that can be used for plugins and theme extensions (currently:  the woocommerce shopping cart)
        */
        do_action('ava_main_header');
        if($headerS['header_position'] != "header_top") do_action('ava_main_header_sidebar');
		
				//  $output .= "<div class='container av-logo-container'>";
				 
				// 	$output .= "<div class='inner-container'>";
						
						/*
						*	display the theme logo by checking if the default logo was overwritten in the backend.
						*   the function is located at framework/php/function-set-avia-frontend-functions.php in case you need to edit the output
						*/
						// $addition = false;
						// if( !empty($headerS['header_transparency']) && !empty($headerS['header_replacement_logo']) )
						// {
						// 	$addition = "<img src='".$headerS['header_replacement_logo']."' class='alternate' alt='' title='' />";
						// }
						
						// $output .= avia_logo(AVIA_BASE_URL.'images/layout/logo.png', $addition, 'strong', true);
						
						// 	if(!empty($headerS['bottom_menu']))
						// 	{
						// 		ob_start();
						// 		do_action('ava_before_bottom_main_menu'); // todo: replace action with filter, might break user customizations
						// 		$output .= ob_get_clean();
						// 	}
							
						//     if($headerS['header_social'] == 'icon_active_main' && !empty($headerS['bottom_menu']))
						//     {
						// 	    $output .= $icons;
						//     }
						    
						
						/*
						*	display the main navigation menu
						*   modify the output in your wordpress admin backend at appearance->menus
						*/
						    
						    if($headerS['bottom_menu'])
						    { 
							    // $output .= "</div>";  
								// $output .= "</div>";
								
								if( !empty( $headerS['header_menu_above'] ))
								{
									$avia_config['temp_logo_container'] = "<div class='av-section-bottom-logo header_color'>".$output."</div>";
									$output = "";
								}
								
								$output .= "<div id='header_main_alternate' class='container_wrap'>";
								$output .= "<div class='container'>";
							}
							$upload_dir =wp_upload_dir();
						    $output .= "<nav class='main_menu' data-selectname='".__('Select a page','avia_framework')."' ".avia_markup_helper(array('context' => 'nav', 'echo' => false)).">";
								$output .=  "<div class='left_phone'><img src='".$upload_dir["baseurl"]."/2019/06/phone.png'>".get_field('phone',"option")."</div>";
								$output .=  "<div class='right_menu_wrap' id='right_menu_wrap'> <div class='menu_content_wrap'>";
								$output .=  "<img src='".get_field( "top_image", 'option' )."'>";
								$output .=  "<div class='menu_wrap'>";
								$num = 0;
								// before_log_arr 菜单前面的logo
								$output .=  wp_nav_menu(array('theme_location'  => 'tab_menu','menu' => 'tab_menu','echo'=>false,'before'=> '<span class="nav_fir_img"></span>','before_log_arr' => array()));
								$output .=  "</div>";
								// $output .=  "</div>";
								$output .=  "<div class='about_us'>";
								$output .=  "<div class='about_cn'>关于云脉</div>";
								$output .=  "<div class='about_en'>ABOUT</div>";
								$output .=  "<div class='about_content'>".get_field( 'about', "option" )."</div>";
								$output .=  "</div>";
								$output .=  "</div>";
								$close_icon = "	[av_font_icon icon='ue813' font='entypo-fontello' style='' caption='' link='' linktarget='' size='40px' position='left' color=''][/av_font_icon]";
								$output .= "<div class='close_button' id='close_button'>".do_shortcode($close_icon)."</div>";
								$output .=  "</div>";
								// $output .=  "</div>";
								$avia_theme_location = 'avia';
						        $avia_menu_class = $avia_theme_location . '-menu';
						        $args = array(
						            'theme_location'	=> $avia_theme_location,
						            'menu_id' 			=> $avia_menu_class,
						            'menu_class'		=> 'menu av-main-nav',
						            'container_class'	=> $avia_menu_class.' av-main-nav-wrap'.$icon_beside,
						            'fallback_cb' 		=> 'avia_fallback_menu',
						            'echo' 				=>	false, 
						            'walker' 			=> new avia_responsive_mega_menu()
						        );
						
								$main_nav = wp_nav_menu($args);
								$header_icons = "[av_font_icon icon='uf101' font='flaticon' style='' caption='' link='' linktarget='' size='40px' position='left' color=''][/av_font_icon]";
								$output .= "<div class='header_icon' id='header_icon' >".do_shortcode($header_icons)."</div>";
								$output .= $main_nav;
								$output .= '<script>
								
								jQuery(document).ready(function(){
									jQuery("#header_icon,#close_button").click(function(){
										jQuery("#right_menu_wrap").toggle("slow")
									})
									})

								</script>';

						        
						        
						      
						    /*
						    * Hook that can be used for plugins and theme extensions
						    */
						    ob_start();
						    do_action('ava_inside_main_menu'); // todo: replace action with filter, might break user customizations
						    $output .= ob_get_clean();
						    
						    if($icon_beside)
						    {
							    $output .= $icons; 
						    }
						        
						    $output .= '</nav>';
						
						    /*
						    * Hook that can be used for plugins and theme extensions
						    */
						    ob_start();
						    do_action('ava_after_main_menu'); // todo: replace action with filter, might break user customizations
							$output .= ob_get_clean();
				
					 /* inner-container */
			        $output .= "</div>";
						
		        /* end container */
		        $output .= " </div> ";
		   		
		   		
		   		//output the whole menu     
		        echo $output; 
		        
		        
		   ?>

		<!-- end container_wrap-->
		</div>
		
		<div class='header_bg'></div>

<!-- end header -->
</header>
