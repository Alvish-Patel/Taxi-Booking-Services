<?php
/**
 * Abstract class for register post type
 *
 * @package    WordPress
 * @subpackage Plugin
 * @author     Mahfuzur Rashid <rashidcloud@gmail.com>
 * @version    1.0
 */

namespace CONEXIPLUGIN\Inc\Post_Types;

use CONEXIPLUGIN\Inc\Abstracts\Post_Type;

if ( ! function_exists( 'add_action' ) ) {
	exit;
}

/**
 * Abstract Post Type
 * Implemented by classes using the same CRUD(s) pattern.
 *
 * @version  2.6.0
 * @package  CONEXIPLUGIN/Abstracts
 * @category Abstract Class
 * @author   Wptech
 */
class Services extends Post_Type {

	protected $post_type = 'conexi_service';

	protected $menu_icon = 'dashicons-products';

	protected $taxonomies = array();

	public static $instance;


	/**
	 * [instance description]
	 *
	 * @return [type] [description]
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * [init description]
	 *
	 * @return [type] [description]
	 */
	public static function init() {

		self::instance()->menu_name = esc_html__( 'Services', 'wpfixker' );
		self::instance()->singular  = esc_html__( 'Service', 'wpconexi' );
		self::instance()->plural    = esc_html__( 'Services', 'wpconexi' );
		self::instance()->supports    = array('title', 'editor', 'thumbnail', 'excerpt');

		add_action( 'init', array( self::instance(), 'register' ) );
	}


}
