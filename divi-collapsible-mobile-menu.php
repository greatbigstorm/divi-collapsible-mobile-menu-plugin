<?php defined( 'ABSPATH' ) || exit;
/**
 * Plugin Name: Divi Collapsible Mobile Menu
 * Description: Allows sub-menus in Divi's mobile menu to be toggled opened and closed.
 * Plugin URI:  https://github.com/greatbigstorm/divi-collapsible-mobile-menu-plugin
 *
 * Author:      Big Storm
 * Author URI:  https://greatbigstorm.com/
 *
 * Version:     1.4
 */

define( 'DCMM_PLUGIN_VERSION', '1.4' );

define( 'DCMM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
add_action( 'init', function() {  // plugins path is filterable, so set after filters can be registered
	define( 'DCMM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
} );



/* !===== Plugin Assets ===== */

add_action( 'wp_enqueue_scripts', function () {
	/* Styles */
	wp_enqueue_style( 'dcmm', DCMM_PLUGIN_URL . 'public/css/style.css', array(), DCMM_PLUGIN_VERSION );


	/* Scripts */
	wp_enqueue_script( 'dcmm', DCMM_PLUGIN_URL . 'public/js/script.js', array( 'jquery' ), DCMM_PLUGIN_VERSION, true );
} );



/* !===== Plugin Updates ===== */
// ref: https://github.com/YahnisElsts/plugin-update-checker#github-integration

require 'library/plugin-update-checker/plugin-update-checker.php';

$dcmm_update_checker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/greatbigstorm/divi-collapsible-mobile-menu-plugin/',
	__FILE__,
	'divi-collapsible-mobile-menu-plugin'
);
$dcmm_update_checker->setBranch( 'master' );
