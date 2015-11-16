<?php
/**
 * Misc Functions
 *
 * @package     Includes 
 * @subpackage  Functions
 * @copyright   Copyright (c) 2014, Abid Omar 
 * @since       0.9.8 
 */

// Don't load directly
if (!defined('ABSPATH')) {
	die('-1');
}

/**
 * Retrieve the time zone id
 * @since 0.98
 * @return string $time_zone the time zone id
 */
function wp_adpress_get_timezone_id() {
	// if site timezone string exists, return it
	if ( $timezone = get_option( 'timezone_string' ) ) {
		return $timezone;
	}

	// get UTC offset, if it isn't set return UTC
	if ( ! ( $utc_offset = 3600 * get_option( 'gmt_offset', 0 ) ) ) {
		return 'UTC';
	}

	// attempt to guess the timezone string from the UTC offset
	$timezone = timezone_name_from_abbr( '', $utc_offset );

	// last try, guess timezone string manually
	if ( $timezone === false ) {

		$is_dst = date( 'I' );

		foreach ( timezone_abbreviations_list() as $abbr ) {
			foreach ( $abbr as $city ) {
				if ( $city['dst'] == $is_dst &&  $city['offset'] == $utc_offset ) {
					return $city['timezone_id'];
				}
			}
		}
	}

	// fallback
	return 'UTC';
}

/**
 * Convert a timestamp to AdPress Date Format 
 * @since 1.1.0
 * @return int $timestamp Timestamp to convert 
 */
function wp_adpress_format_time( $timestamp ) {
	$date    = strtotime( $timestamp );
	$settings = get_option( 'adpress_settings' );
	$formatted   = date_i18n( $settings['time_format'], $date );

	return $formatted;
}
	
/**
 * Get User IP
 *
 * Returns the IP address of the current visitor
 *
 * @since 1.0.0
 * @return string $ip User's IP address
 */
function wp_adpress_get_ip() {
	if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
		//check ip from share internet
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
		//to check ip is pass from proxy
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return apply_filters( 'wp_adpress_get_ip', $ip );
}

/**
 * Get the currency set in AdPress settings 
 * 
 *
 * @since 1.0.0
 * @return string 
 */
function wp_adpress_get_currency() {
	$settings = get_option( 'adpress_settings' );
	$currency = $settings['currency'];

	return apply_filters( 'wp_adpress_settings_currency', $currency );
}

/**
 * Return True if Sandbox mode is enabled
 *
 * @since 1.0.0
 * @return bool
 */
function wp_adpress_sandbox_mode() {
	$settings = get_option( 'adpress_settings' );	

	if ( isset( $settings['sandbox_mode'] ) ) {
		return true;
	}

	return false;
}

/**
 * Kill WordPress Execution
 *
 * @since 1.0.0
 * @return void
 */
function wp_adpress_die() {
	exit;
}

/**
 * Determines if a post, identified by the specified ID, exist
 * within the WordPress database.
 *
 * @param    int    $id    The ID of the post to check
 * @return   bool          True if the post exists; otherwise, false.
 * @since    1.2.0
 */
function wp_adpress_post_exists( $id ) {
  return is_string( get_post_status( $id ) );
}
