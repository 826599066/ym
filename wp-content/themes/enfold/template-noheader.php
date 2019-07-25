<?php 
	/*
	Template Name: Blank No Header -  No Footer No Header
	*/
	
	if ( !defined('ABSPATH') ){ die(); }
	//get_header();
	echo avia_title();
	
	do_action( 'ava_after_main_title' );

/*
 * A blank Template that allows you to build landing pages, coming soon pages etc
 */	
	 
 global $avia_config;
 $avia_config['template'] = "avia-blank"; //important part. this var is checked in header and footer php and if set prevents them from rendering. also an additional class is applied to the body
 
 
 
 
 if(!empty($avia_config['conditionals']['is_builder']))
 {
 	$avia_config['conditionals']['is_builder_template'] = true;
 	get_template_part('template-builder');
    exit();
 }
 else
 {
 	get_template_part('page');
    exit();
 }