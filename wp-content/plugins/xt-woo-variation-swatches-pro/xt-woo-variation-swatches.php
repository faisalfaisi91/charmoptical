<?php
/**
 * XT WooCommerce Variation Swatches
 *
 * @package     XT_Woo_Variation_Swatches
 * @author      XplodedThemes
 * @copyright   2018 XplodedThemes
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: XT WooCommerce Variation Swatches Pro
 * Plugin URI:  https://xplodedthemes.com/products/woo-variation-swatches/
 * Description: A WooCommerce extension that transforms variation dropdowns to beautiful color, image or label swatches. Image swatches will automatically be applied for variation color attributes that contains an image.
 * Version:     1.1.9
 * WC requires at least: 3.0.0
 * WC tested up to: 3.8.0
 * Author:      XplodedThemes
 * Author URI:  https://xplodedthemes.com
 * Text Domain: xt-woo-variation-swatches
 * Domain Path: /i18n
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @fs_premium_only /xt-framework/includes/license
 */
 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

global $xt_woovs_plugin;

$market = 'envato';

$xt_woovs_plugin = array(
    'version'       => '1.1.9',
    'name'          => esc_html__('XT WooCommerce Variation Swatches', 'xt-woo-variation-swatches'),
    'menu_name'     => esc_html__('Woo Variation Swatches', 'xt-woo-variation-swatches'),
	'url'          => 'https://xplodedthemes.com/products/woo-variation-swatches/',
	'icon'          => 'dashicons-image-filter',
    'slug'          => 'xt-woo-variation-swatches',
	'prefix'       => 'xt_woo_variation_swatches',
	'short_prefix' => 'xt_woovs',
    'market'        => $market,
    'markets'       => array(
	    'freemius' => array(
		    'id'            => 2908,
		    'key'           => 'pk_26b8433696e8731a0fa36371fecb6',
		    'url'           => 'https://xplodedthemes.com/products/woo-variation-swatches/',
		    'premium_slug'  => 'xt-woo-variation-swatches-pro',
		    'freemium_slug' => 'xt-woo-variation-swatches'
	    ),
        'envato' => array(
            'id' => 23358604,
            'url' => 'https://codecanyon.net/item/woocommerce-variation-swatches/23358604',
            'premium_slug'  => 'xt-woo-variation-swatches-pro'
        )
    ),
	'dependencies' => array(
        array(
            'name'  => 'WooCommerce',
            'class' => 'WooCommerce',
            'url'   => 'https://en-ca.wordpress.org/plugins/woocommerce/'
        )
	),
    'conflicts' => array(
        array(
            'name'  => 'Variation Swatches for WooCommerce',
            'path'  => 'woo-variation-swatches/woo-variation-swatches.php',
        )
    ),
    'file'          => __FILE__
);

if ( function_exists( 'xt_woo_variation_swatches' ) ) {

	xt_woo_variation_swatches()->access_manager()->set_basename( true, __FILE__ );

} else {

	/**
	 * Require XT Framework
	 *
	 * @since    1.0.0
	 */
	require_once plugin_dir_path( __FILE__ ) . 'xt-framework/start.php';

	/**
	 * Require main plugin file
	 *
	 * @since    1.0.0
	 */
	require_once plugin_dir_path( __FILE__ ) . 'class-core.php';

    /**
     * Begins execution of the plugin.
     *
     * Since everything within the plugin is registered via hooks,
     * then kicking off the plugin from this point in the file does
     * not affect the page life cycle.
     *
     * @since    1.0.0
     */
    function xt_woo_variation_swatches() {

        global $xt_woovs_plugin;

        return XT_Woo_Variation_Swatches::instance($xt_woovs_plugin);
    }

    // Run Plugin.
	xt_woo_variation_swatches();

}