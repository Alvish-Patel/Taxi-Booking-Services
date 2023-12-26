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

.single-funfact-one i,
.site-header.header-two .top-bar .contact-infos li a i,
.site-header.header-two .top-bar .contact-infos li a:hover,
.site-header.header-two .header-navigation ul.navigation-box > li.current > a, .site-header.header-two .header-navigation ul.navigation-box > li:hover > a,
.site-header.header-two .header-navigation .container .right-side-box .contact-btn-block:hover .text-block,
.main-banner-wrapper .carousel-btn-block .carousel-btn:hover,
.scroll-to-top:hover i,
.single-feature-one h3 a:hover,
.single-feature-one a.more-link:hover,
.single-testimonial-one h3,
.single-blog-style-one .text-block h3 a:hover,
.single-blog-style-two .text-block .meta-info a:not(.date-block):hover,
.single-blog-style-two .text-block h3 a:hover,
.site-footer .footer-widget .contact-infos li i,
.site-footer .footer-widget .link-lists li a:hover,
.site-footer .footer-widget .link-lists li a:before,
.site-footer .bottom-footer .link-lists li a:hover,
.site-footer .bottom-footer .left-block span a,
.site-header.header-one .header-navigation .right-side-box .contact-btn-block .text-block,
.site-header.header-one .header-navigation .right-side-box .contact-btn-block .icon-block,
.site-footer .footer-widget .social-block a:hover,
.single-offer-one .text-block h3 a:hover,
.single-offer-one .text-block a.more-link:hover,
.single-team-one .text-block .social-block a:hover,
.team-style-one .single-team-one .text-block h3 a:hover,
.history-style-one .history-content h3,
.single-taxi-faq-one .accrodion-grp .accrodion .accrodion-title h4:before,
.book-ride-two .booking-form-two ul.special-checkbox li.active .input-checker:before,
.book-ride-two .booking-form-two button[type=submit]:hover,
.post_button span,
.post_button a:hover,
.post_tag a:hover,
.comment-reply-link:hover,
.site-header.header-one .top-bar .left-block a:hover,
.site-header.header-one .top-bar .left-block a i

{
	color:#<?php echo esc_attr( $color ); ?>!important;
}

/*==============================================
   Theme Background Css
===============================================*/

.woocommerce #place_order, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
.cta-style-two,
.site-header.header-two .header-navigation ul.navigation-box > li > a:before,
.header-navigation ul.navigation-box > li > .sub-menu > li:hover > a,
.banner-style-one .banner-btn,
.scroll-to-top,
.block-title .dot-line,
.single-taxi-one:hover .book-taxi-btn,
.single-feature-one .icon-block,
.thm-base-bg,
[class*=single-blog-style-] .image-block .inner-block > a,
.single-blog-style-one .text-block .date-block,
.single-blog-style-two .text-block .date-block,
.cta-style-one,
.site-footer .footer-widget .subscribe-form button[type=submit],
.site-header.header-one .header-navigation.stricky-fixed,
.scroll-to-top,
.site-header.header-one .header-navigation .container,
.scroll-to-top:after, .scroll-to-top:before,
.single-offer-one .image-block > a,
.single-taxi-faq-one .accrodion-grp .accrodion.active,
.book-ride-two .booking-form-two [type="radio"]:checked + label:after, .book-ride-two .booking-form-two [type="radio"]:not(:checked) + label:after,
.bootstrap-select .dropdown-menu > li.selected > a,
.bootstrap-select .dropdown-menu > li > a:hover,
.book-ride-two .booking-form-two button[type=submit],
.pagination li .current,
.pagination li a:hover,
blockquote,
.post_tag a,
.comment-reply-link,
#commentform .submit.theme-btn.style-four,
.contact-form-style-one [type=submit],
.sidebar-search .form-group button

{
	background: #<?php echo esc_attr( $color ); ?>!important;
	background-color:#<?php echo esc_attr( $color ); ?>!important;
}


/*==============================================
   Theme Border Color Css
===============================================*/

.main-banner-wrapper .carousel-btn-block .carousel-btn:hover,
.single-taxi-one:before,
.single-taxi-one:after,.woocommerce-pagination ul li a, .woocommerce-pagination ul li span 

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