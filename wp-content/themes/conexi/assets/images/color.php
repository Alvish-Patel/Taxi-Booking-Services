<?php


/** Set ABSPATH for execution */
define( 'ABSPATH', dirname(dirname(__FILE__)) . '/' );
define( 'WPINC', 'wp-includes' );


/**
 * @ignore
 */
function add_filter() {}

/**
 * @ignore
 */
function esc_attr($str) {return $str;}

/**
 * @ignore
 */
function apply_filters() {}

/**
 * @ignore
 */
function get_option() {}

/**
 * @ignore
 */
function is_lighttpd_before_150() {}

/**
 * @ignore
 */
function add_action() {}

/**
 * @ignore
 */
function did_action() {}

/**
 * @ignore
 */
function do_action_ref_array() {}

/**
 * @ignore
 */
function get_bloginfo() {}

/**
 * @ignore
 */
function is_admin() {return true;}

/**
 * @ignore
 */
function site_url() {}

/**
 * @ignore
 */
function admin_url() {}

/**
 * @ignore
 */
function home_url() {}

/**
 * @ignore
 */
function includes_url() {}

/**
 * @ignore
 */
function wp_guess_url() {}

if ( ! function_exists( 'json_encode' ) ) :
/**
 * @ignore
 */
function json_encode() {}
endif;



/* Convert hexdec color string to rgb(a) string */
 
function hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}

$color = $_GET['main_color'];

ob_start(); ?>
/*========== Color ====================*/

.header-top .info li i,
.main-menu .navigation > li.current > a, .main-menu .navigation > li:hover > a,
.about-section .content_block_1 .content-box h3,
.content_block_2 .content-box .inner-box .single-item .inner .icon-box,
.news-block-one .inner-box .lower-content h3 a:hover,
.news-block-one .inner-box .lower-content .post-info li a:hover,
.main-footer .right-column .subscribe-box .form-group button:hover,
.main-footer .post-widget .post h6 a:hover,
.main-footer .links-widget .links-list li a:hover,
.main-footer .widget-section .contact-widget .info-list li i,
.team-block-one .inner-box .lower-content h5 a:hover,
.main-header.style-two .header-upper .upper-info li h6 a:hover,
.footer-bottom p a:hover,
.page-title .content-box .bread-crumb li a:hover,
.content_block_6 .content-box .inner-box .left-column .icon-box,
.content_block_6 .content-box .support-box h3 a,
.process-block-one .inner-box .icon-box,
.accordion-box .block .acc-btn.active h5,
.accordion-box .block .acc-btn.active .icon-outer,
.service-details-content .content-two .single-item .icon-box,
.service-details-content .two-column .text h4,
.logged-in-as a:last-child,
.contact-style-two .info-inner .info-list li i

{
	color:#<?php echo esc_attr( $color ); ?>!important;
}

/*==============================================
   Theme Background Css
===============================================*/

.theme-btn.style-one,
.banner-carousel .owl-nav .owl-prev, .banner-carousel .owl-nav .owl-next,
.scroll-top,
.image_block_1 .image-box:after,
.service-block-one .inner-box .image-box:before,
.service-block-one .inner-box .lower-content .icon-box,
.service-block-one .inner-box .lower-content .link a:hover,
.pricing-block-one .icon-box,
.pricing-block-one .inner-box .link a:hover,
.cta-section .inner-box .btn-box .theme-btn:before, .cta-section .inner-box .btn-box .theme-btn:after,
.news-block-one .inner-box .lower-content .link a:hover,
.main-footer .right-column .social-links li a:hover,
.main-footer .footer-logo,
.main-footer .links-widget .links-list li a:before,
.main-footer .widget-section .contact-widget .btn-box a:hover,
.team-block-one .inner-box .lower-content .social-links li a:hover,
.content_block_5 .content-box .lower-box .right-content,
.progress-box .bar-inner,
.feature-block-one .inner-box .bg-layer:before,
.main-header.style-two .outer-box .social-links li a:hover,
.image_block_3 .image-box .bottom-content,
.process-block-one .inner-box .icon-box:before,
.service-sidebar .categories-widget .widget-title,
.service-sidebar .download-borucher a,
.widget_search .sidebar-search-box form input,
.widget_categories ul li a:hover:before,
.widget_tag_cloud .tagcloud a:hover,
blockquote,
.tags.pull-left a:hover,
.blog-details-content .post-share-option .social-links li a:hover,
.blog-details-content .comments-area .comment .text-holder.text a,
.add-comment-box #add-comment-form .button-box button

{
	background: #<?php echo esc_attr( $color ); ?>!important;
	background-color:#<?php echo esc_attr( $color ); ?>!important;
}


/*==============================================
   Theme Border Color Css
===============================================*/


{
    border-color: #<?php echo esc_attr( $color ); ?>!important;  
}

/*==============================================
   RGB
===============================================*/

.video-galler-outer-bg:before {
    background-color: <?php echo esc_attr( hex2rgba($color, 0.9));?>!important;
}
.main-slider .content h3:before{
    background: <?php echo esc_attr( hex2rgba($color, 0.4));?>!important;
}




<?php 

$out = ob_get_clean();
$expires_offset = 31536000; // 1 year
header('Content-Type: text/css; charset=UTF-8');
header('Expires: ' . gmdate( "D, d M Y H:i:s", time() + $expires_offset ) . ' GMT');
header("Cache-Control: public, max-age=$expires_offset");
header('Vary: Accept-Encoding'); // Handle proxies
header('Content-Encoding: gzip');

echo gzencode($out);
exit;