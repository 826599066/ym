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
      $loop_val = get_field('our_product');
	 ?>

<div class="our_products_wrap" style="background-repeat: no-repeat; background-image: url(<?php echo $upload_dir['baseurl'];  ?>/2019/06/product_bg.jpg);background-size: cover; background-attachment: scroll; background-position: top center; ">
    <div class="container">
        <div class="our_products_title_wrap">
            <div class="our_products_title_en">OUR PRODUCTS</div>
            <div class="our_products_title_cn">旗下产品</div>
            <div class="our_products_content">优质化服务  专业建站  定制开发</div>
        </div>
    </div>
</div>
<div class="product_content_wrap">
    <?php 
        foreach($loop_val as $loop_val_item){
    ?>
        <div class="product_item">
            <div class="top_icon">
                <img src="<?php echo  $loop_val_item['product_icon'] ?>">
            </div>
            <div class="product_describe">
                <?php echo  $loop_val_item['product_describe'] ?>
            </div>
        </div>
    <?php 
        }
    ?>
</div>
<?php wp_footer(); ?>
