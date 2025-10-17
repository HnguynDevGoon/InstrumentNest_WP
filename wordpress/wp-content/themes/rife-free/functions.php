<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/* Here you can insert your functions, filters and actions. */







/* That's all, stop editing! Make a great website!. */

/* Init of the framework */

/* This function exist in WP 4.7 and above.
 * Theme has protection from runing it on version below 4.7
 * However, it has to at least run, to give user info about having not compatible WP version :-)
 */
if( function_exists('get_theme_file_path') ){
	/** @noinspection PhpIncludeInspection */
	require_once( get_theme_file_path( '/advance/class-apollo13-framework.php' ) );
}
else{
	/** @noinspection PhpIncludeInspection */
	require_once( get_template_directory() . '/advance/class-apollo13-framework.php' );
}

global $apollo13framework_a13;
$apollo13framework_a13 = new Apollo13Framework();
$apollo13framework_a13->start();



/* Hiển thị mã giảm giá WooCommerce */
add_action('woocommerce_single_product_summary', 'wpshare247_coupon_popup', 29);
function wpshare247_coupon_popup(){
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
    $posts_per_page = 12;
    $args_filter = array(
        'post_type' => array('shop_coupon'),
        'post_status' => array('publish'),
        'order'                => 'desc',
        'posts_per_page' => $posts_per_page,
        'paged' => $paged
    );
    $the_query = new WP_query($args_filter);
    
    if($the_query->have_posts()):
        ?>
        <style type="text/css">
         .wpshare247-coupon-popup {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 9999999;
            background: rgba(0,0,0,0.65);
            top: 0; left: 0;
            transition: all 0.3s ease;
        }
        .wpshare247-coupon-popup:not(.active){
            display: none;
        }

        .wpshare247-coupon-container {
            width: 90%;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
            background: #fff;
            border-radius: 15px;
            padding: 30px 25px;
            position: relative;
            box-shadow: 0 8px 25px rgba(0,0,0,0.25);
            animation: slideDown 0.3s ease;
        }
        @keyframes slideDown {
            from { transform: translateY(-30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .wpshare247-coupon-container ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .coupon-item {
            border: 2px dashed #ff9800;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 15px;
            background: #fff8f0;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .coupon-item:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 18px rgba(255,152,0,0.25);
        }

        .coupon-item p, .coupon-item li {
            margin: 6px 0;
            font-size: 14px;
            color: #444;
        }
        .coupon-item strong {
            color: #ff6600;
        }

        .js-coupon-copy {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 16px;
            background: linear-gradient(135deg, #ff9800, #ff6600);
            color: #fff !important;
            border-radius: 6px;
            font-size: 13px;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 3px 8px rgba(255,102,0,0.25);
            transition: all 0.25s ease;
        }
        .js-coupon-copy:hover {
            background: linear-gradient(135deg, #ff6600, #e65c00);
            transform: translateY(-2px);
        }
        .js-coupon-copy.copied {
            background: #9e9e9e;
            cursor: not-allowed;
        }

        .popup-cls {
            position: absolute;
            top: 12px;
            right: 12px;
            background: #f44336;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            font-size: 18px;
            text-decoration: none;
            border-radius: 50%;
            transition: background 0.2s;
            font-weight: bold;
        }
        .popup-cls:hover {
            background: #d32f2f;
        }

        .wpshare247-coupon-btn {
            background: linear-gradient(135deg, #ff9800, #ff6600);
            padding: 12px 20px;
            margin-bottom: 15px;
            display: inline-block;
            text-decoration: none;
            color: #fff !important;
            font-weight: 600;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(255,102,0,0.3);
            transition: all 0.25s ease;
        }
        .wpshare247-coupon-btn:hover {
            background: linear-gradient(135deg, #ff6600, #e65c00);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(255,102,0,0.4);
        }


        </style>
        <!-- Html -->
        <a class="js-show-coupon-popup wpshare247-coupon-btn" href="#wpshare247_coupon_popup">Lấy mã giảm giá</a>
        <section id="wpshare247_coupon_popup" class="wpshare247-coupon-popup">
            <div class="wpshare247-coupon-container">
                <a href="#" class="popup-cls" rel="#wpshare247_coupon_popup">x</a>
            <?php 
            while ($the_query->have_posts()) : $the_query->the_post();
                $shop_coupon_id = get_the_ID();
                $coupon_code = get_the_title( $shop_coupon_id );
                $coupon_obj = new WC_Coupon($coupon_code);
                $usage_limit = $coupon_obj->usage_limit;
                $usage_count = $coupon_obj->usage_count;
                ?>
                <div id="coupon-item-<?php echo $shop_coupon_id; ?>" class="coupon-item">
                    <ul>
                        <li><strong>Nhập mã: </strong><span><?php the_title(); ?><span></li>
                        <li><?php the_excerpt(); ?></li>
                        <?php 
                        if($usage_limit){
                            ?>
                            <li><strong>Đã dùng: </strong><span><?php echo $usage_count; ?>/<?php echo $usage_limit; ?></span></li>
                            <?php
                        }
                        ?>
                        <li><a data-copy="<?php echo $coupon_code; ?>" href="#" class="js-coupon-copy">Sao chép</a></li>
                    </ul>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>
            </div>
        </section>
            <script type="text/javascript"> 
                jQuery(document).ready(function($) {
                jQuery(".js-show-coupon-popup").click(function(event) {
                    var coupon_popup_id = jQuery(this).attr("href");
                    if(jQuery(coupon_popup_id).length>0){
                        jQuery(coupon_popup_id).addClass('active');
                        jQuery(coupon_popup_id).find('.js-coupon-copy').removeClass('copied').text('Sao chép');
                    }
                    return false;
                });
                jQuery(".popup-cls").click(function(event) {
                    var coupon_popup_id = jQuery(this).attr("rel");
                    if(jQuery(coupon_popup_id).length>0){
                        jQuery(coupon_popup_id).removeClass('active');
                    }
                    return false;
                });
                jQuery(".js-coupon-copy").click(function(event) {
                    jQuery(this).addClass('copied');
                    var coupon = jQuery(this).data('copy');
                    jQuery(this).text("Đã sao chép mã");
                    navigator.clipboard.writeText(coupon);
                    return false;
                });
            });
            </script>
            
        <?php
    endif;
}