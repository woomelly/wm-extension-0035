<?php
/*
 * Plugin Name: Woomelly Extension 035 Add ons 
 * Version: 1.0.0
 * Plugin URI: https://woomelly.com
 * Description: Extension that allows replicating only one of the publications with the same name taking into account the type of publication.
 * Author: Team MakePlugins
 * Author URI: https://woomelly.com
 * Requires at least: 4.0
 * Tested up to: 5.1.1
 * WC requires at least: 3.0.0
 * WC tested up to: 3.5.6
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//$wc_product_exist->set_catalog_visibility('hidden');
//$wc_product_exist->save();

if ( ! function_exists( 'wm_filter_validate_sync_add_product_ext_035' ) ) {
	add_action( 'wm_filter_validate_sync_add_product', 'wm_filter_validate_sync_add_product_ext_035', 10, 3 );
	function wm_filter_validate_sync_add_product_ext_015( $status, $data_item ) {
		if ( $data_item->listing_type_id != "gold_special" ) {
			$status = false;
		}
		return $status;
	}
}

if ( ! function_exists( 'wmfilter_before_sync_meli_to_woo_ext_015' ) ) {
	add_action( 'wmfilter_before_sync_meli_to_woo', 'wmfilter_before_sync_meli_to_woo_ext_015', 10, 3 );
	function wmfilter_before_sync_meli_to_woo_ext_015( $status, $data_item, $wc_product_exist ) {
		if ( $data_item->listing_type_id != "gold_special" ) {
			$status = false;
			wp_trash_post( $wc_product_exist->get_id() );
		}
		return $status;
	}
}

?>