<?php defined( 'ABSPATH' ) || exit;
/**
 * Plugin Name: Divi Collapsible Mobile Menu
 * Description: Allows sub-menus in Divi's mobile menu to be toggled opened and closed.
 *
 * Author:     Big Storm
 * Author URI: https://greatbigstorm.com/
 *
 * Version: 1.0
 */

define( 'DCMM_PLUGIN_VERSION', '1.0b2' );

define( 'DCMM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
add_action( 'init', function() {  // plugins path is filterable, so set after filters can be registered
	define( 'DCMM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
} );



/* !===== Plugin Assets ===== */

add_action( 'wp_enqueue_scripts', function () {
	/* Styles */
	wp_enqueue_style( 'dcmm', DCMM_PLUGIN_URL . 'public/css/style.css', array(), DCMM_PLUGIN_VERSION );


	/* Scripts */
	wp_enqueue_script( 'dcmm', DCMM_PLUGIN_URL . 'public/js/script.js', array(), DCMM_PLUGIN_VERSION, true );
} );
