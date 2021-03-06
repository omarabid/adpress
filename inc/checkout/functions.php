<?php
/**
 * Checkout Functions 
 * 
 * @package     Includes
 * @subpackage  Checkout
 * @since       1.0.0
 */

// Don't load directly
if (!defined('ABSPATH')) {
	die('-1');
}

/**
 * Register Ad
 * 
 * @since 1.0.0
 * @param array $ad_details
 * @param array $user_info
 * @return null|boolean
 */
function wp_adpress_register_ad( $ad_details, $user_info ) {
	if ( !is_array( $ad_details ) || !is_array( $user_info ) ) {
		return;
	}

	$campaign = new wp_adpress_campaign( $ad_details['cid'] );

	$ad_id = $campaign->register_ad( $ad_details['post'] );

	do_action( 'wp_adpress_register_ad_complete', $ad_id, $user_info );

	return $ad_id;
}

/**
 * Return User info
 *
 * @param integer $payment_id Payment ID
 * @return array User Info
 */
function wp_adpress_get_payment_user_info( $payment_id ) {
	/*
	 * $user_info = array(
	 *  'user_id' => '',
	 *  'user_email' => '',
	 *  'user_info' => array(
	 *  ),
	 * );
	 */
	$user_info = array();

	$user_info['user_id'] = get_post_meta( $payment_id, 'wpad_payment_user_id', true );
	$user_info['user_email'] = get_post_meta( $payment_id, 'wpad_payment_user_email', true );
	$user_info['user_info'] = get_post_meta( $payment_id, 'wpad_payment_user_info', true );

	return $user_info;
}

/**
 * Return Ad Details
 *
 * @param integer $payment_id Payment ID
 * @return array Ad Details
 */
function wp_adpress_get_payment_ad_details( $payment_id ) {
	/*
	 * $ad_details = array(
	 *  'cid' => '',
	 *  'post' => array(
	 *   'client_message' => '',
	 *   'destination_url' => '',
	 *   'destination_val' => '',
	 *  ),
	 * );
	 */
	$ad_details = array();

	$ad_details = get_post_meta( $payment_id, 'wpad_payment_ad', true );

	return $ad_details;
}

/**
 * Get the URL of the Success page
 *
 * @since 1.0.0
 * @param array $query_args Extra query args to add to the URI
 * @return mixed Full URL to the success page, if present | null if it doesn't exist
 */
function wp_adpress_get_success_page_uri( $query_args = array() ) {
	$uri = admin_url( 'admin.php?page=adpress-checkout-success' );

	if ( !empty( $query_args ) ) {
		$query_args = wp_parse_args( $query_args );
		$uri = add_query_arg( $query_args, $uri );
	}

	return apply_filters( 'wp_adpress_get_success_page_uri', $uri, $query_args );	
}

/**
 * Send To Success Page
 *
 * Sends the user to the succes page.
 *
 * @param array $query_args Extra args to add to the URI
 * @access      public
 * @since       1.0.0
 * @return      void
 */
function wp_adpress_send_to_success_page( $query_args = array() ) {
	$redirect = wp_adpress_get_success_page_uri( $query_args );

	do_action( 'wp_adpress_redirect_to_success_page', $query_args );

	wp_redirect( apply_filters( 'wp_adpress_send_to_success_page', $redirect, $query_args ) );

	wp_adpress_die();
}

/**
 * Get the URL of the Failre page
 *
 * @since 1.0.0
 * @param array $query_args Extra query args to add to the URI
 * @return mixed Full URL to the failure page, if present | null if it doesn't exist
 */
function wp_adpress_get_failure_page_uri( $query_args = array() ) {
	$uri = admin_url( 'admin.php?page=adpress-checkout-failure' );

	if ( !empty( $query_args ) ) {
		$query_args = wp_parse_args( $query_args );
		$uri = add_query_arg( $query_args, $uri );
	}

	return apply_filters( 'wp_adpress_get_failure_page_uri', $uri, $query_args );
}

/**
 * Send To Failure Page
 *
 * Sends the user to the failure page.
 *
 * @param array $query_args Extra args to add to the URI
 * @access      public
 * @since       1.0.0
 * @return      void
 */
function wp_adpress_send_to_failure_page( $query_args = array() ) {
	$redirect = wp_adpress_get_failure_page_uri( $query_args );

	do_action( 'wp_adpress_redirect_to_failure_page', $query_args );

	wp_redirect( apply_filters( 'wp_adpress_send_to_failure_page', $redirect, $query_args ) );

	wp_adpress_die();
}

/**
 * Get the URL of the Checkout page
 *
 * @since 1.0.0
 * @param array $query_args Extra query args to add to the URI
 * @return mixed Full URL to the checkout page, if present | null if it doesn't exist
 */
function wp_adpress_get_checkout_page_uri( $query_args = array() ) {
	$uri = admin_url( 'admin.php?page=adpress-client' );

	if ( !empty( $query_args ) ) {
		$query_args = wp_parse_args( $query_args );
		$uri = add_query_arg( $query_args, $uri );
	}

	return apply_filters( 'wp_adpress_get_checkout_page_uri', $uri, $query_args );
}

/**
 * Send To Checkout Page
 *
 * Sends the user to the Checkout page.
 *
 * @param array $query_args Extra args to add to the URI
 * @access      public
 * @since       1.0.0
 * @return      void
 */
function wp_adpress_send_to_checkout_page( $query_args = array() ) {
	$redirect = wp_adpress_get_checkout_page_uri( $query_args );

	do_action( 'wp_adpress_redirect_to_checkout_page', $query_args );

	wp_redirect( apply_filters( 'wp_adpress_send_to_checkout_page', $redirect, $args ) );

	wp_adpress_die();
}

/**
 * Get the URL of the Cancel page
 *
 * @since 1.0.0
 * @param array $query_args Extra query args to add to the URI
 * @return mixed Full URL to the cancel page, if present | null if it doesn't exist
 */
function wp_adpress_get_cancel_page_uri( $query_args = array() ) {
	$uri = admin_url( 'admin.php?page=adpress-checkout-cancel' );

	if ( !empty( $query_args ) ) {
		$query_args = wp_parse_args( $query_args );
		$uri = add_query_arg( $query_args, $uri );
	}

	return apply_filters( 'wp_adpress_get_cancel_page_uri', $uri, $query_args );	
}

/**
 * Send To Cancel Page
 *
 * Sends the user to the cancel page.
 *
 * @param array $query_args Extra args to add to the URI
 * @access      public
 * @since       1.0.0
 * @return      void
 */
function wp_adpress_send_to_cancel_page( $query_args = array() ) {
	$redirect = wp_adpress_get_cancel_page_uri( $query_args );

	do_action( 'wp_adpress_redirect_to_cancel_page', $query_args );

	wp_redirect( apply_filters( 'wp_adpress_send_to_cancel_page', $redirect, $query_args ) );

	wp_adpress_die();
}

/**
 * Get the URL of the Notify page
 *
 * @since 1.0.0
 * @param array $query_args Extra query args to add to the URI
 * @return mixed Full URL to the notify page, if present | null if it doesn't exist
 */
function wp_adpress_get_notify_page_uri( $query_args = array() ) {
	$uri = site_url( '?wpad-callback=notify' );

	if ( !empty( $query_args ) ) {
		$query_args = wp_parse_args( $query_args );
		$uri = add_query_arg( $query_args, $uri );
	}

	return apply_filters( 'wp_adpress_get_notify_page_uri', $uri, $query_args );	
}

/**
 * Send To Notify Page
 *
 * Sends the user to the notify page.
 *
 * @param array $query_args Extra args to add to the URI
 * @access      public
 * @since       1.0.0
 * @return      void
 */
function wp_adpress_send_to_notify_page( $query_args = array() ) {
	$redirect = wp_adpress_get_notify_page_uri( $query_args );

	do_action( 'wp_adpress_redirect_to_notify_page', $query_args );

	wp_redirect( apply_filters( 'wp_adpress_send_to_notify_page', $redirect, $query_args ) );

	wp_adpress_die();
}

/**
 * Get the URL of the Custom page
 *
 * @since 1.0.0
 * @param array $query_args Extra query args to add to the URI
 * @return mixed Full URL to the custom page, if present | null if it doesn't exist
 */
function wp_adpress_get_custom_page_uri( $query_args = array() ) {
	$uri = site_url( '?wpad-callback=custom' );

	if ( !empty( $query_args ) ) {
		$query_args = wp_parse_args( $query_args );
		$uri = add_query_arg( $query_args, $uri );
	}

	return apply_filters( 'wp_adpress_get_custom_page_uri', $uri, $query_args );	
}

/**
 * Send To Custom Page
 *
 * Sends the user to the custom page.
 *
 * @param array $query_args Extra args to add to the URI
 * @access      public
 * @since       1.0.0
 * @return      void
 */
function wp_adpress_send_to_custom_page( $query_args = array() ) {
	$redirect = wp_adpress_get_custom_page_uri( $query_args );

	do_action( 'wp_adpress_redirect_to_custom_page', $query_args );

	wp_redirect( apply_filters( 'wp_adpress_send_to_custom_page', $redirect, $query_args ) );

	wp_adpress_die();
}
