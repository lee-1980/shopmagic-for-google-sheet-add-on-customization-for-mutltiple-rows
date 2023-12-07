<?php
/**
 * Plugin Name: Imagnify for Google Sheets
 * Description: Allows adding rows to Google Sheets from automations data.
 * Version: 2.0.4
 * Text Domain: imagnify-for-google-sheets
 * Requires at least: 5.4
 * Tested up to: 6.4
 * WC requires at least: 7.9
 * WC tested up to: 8.3
 * Requires PHP: 7.2
 *
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly


/* THESE TWO VARIABLES CAN BE CHANGED AUTOMATICALLY */
$plugin_version = '2.0.4';

$plugin_name        = 'Imagnify for Google Sheets';
$plugin_class_name  = '\WPDesk\ShopMagicGoogleSheets\Plugin';
$plugin_text_domain = 'imagnify-for-google-sheets';
$product_id         = '';
$plugin_file        = __FILE__;
$plugin_dir         = __DIR__;

$requirements = [
	'php'     => '7.2',
	'wp'      => '5.0',
	'plugins' => [
		[
			'name'      => 'shopmagic-for-woocommerce/shopMagic.php',
			'nice_name' => 'Shopmagic for WooCommerce',
			'version'   => '4.0',
		],
	],
];


require __DIR__ . '/vendor_prefixed/wpdesk/wp-plugin-flow-common/src/plugin-init-php52-free.php';

require_once __DIR__ . '/vendor_prefixed/guzzlehttp/guzzle/src/functions.php';
