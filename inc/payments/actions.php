<?php
/**
 * Payment Actions
 * 
 * @package     Includes
 * @subpackage  Payments
 * @since       1.0.0
 */

// Don't load directly
if (!defined('ABSPATH')) {
	die('-1');
}

/**
 * Completes a purchase
 *
 * @since 1.0.0
 * @param intger $payment_id Payment ID
 * @param string $new_status New Status
 * @param string $old_status Old Status
 * @return void
 */
function wp_adpress_complete_purchase( $payment_id, $new_status, $old_status ) {
	// Make sure the Ad purchase process is completed once
	if ( $old_status == 'publish' || $old_status == 'complete' ) {
		return;
	}

	// Make sure the Ad purchase is processed only when new status is completed
	if ( $new_status != 'publish' && $new_status != 'complete' ) {
		return;
	}


	$user_info = wp_adpress_get_payment_meta_user_info( $payment_id );	// User Info
	$ad_details = wp_adppress_get_payemnt_ad_details( $payment_id );	// Ad Details

	do_action( 'wp_adpress_pre_complete_purchase', $payment_id );

    if ( is_array($user_info) && is_array($ad_details) ) {

    }

	do_action( 'wp_adpress_complete_purchase', $payment_id );
}
