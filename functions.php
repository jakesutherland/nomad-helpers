<?php
/**
 * Nomad Helpers Composer Package Autoload file.
 *
 * Nomad Helpers provides helper functions and utilities that are used in other
 * Nomad Composer Packages.
 *
 * @since 1.0.0
 *
 * @package Nomad\Helpers
 */

namespace Nomad\Helpers;

if ( ! defined( 'ABSPATH' ) ) exit; // Prevent direct access.

// Nomad Helpers Version.
if ( ! defined( 'NOMAD_HELPERS_VERSION' ) ) {
	define( 'NOMAD_HELPERS_VERSION', '1.0.0' );
}

// Nomad Helpers Path.
if ( ! defined( 'NOMAD_HELPERS_PATH' ) ) {
	define( 'NOMAD_HELPERS_PATH', dirname( __FILE__ ) . '/' );
}

// Nomad Helpers Source Path.
if ( ! defined( 'NOMAD_HELPERS_SRC_PATH' ) ) {
	define( 'NOMAD_HELPERS_SRC_PATH', NOMAD_HELPERS_PATH . 'src/' );
}

// Nomad Environment.
if ( ! defined( 'NOMAD_ENV' ) ) {
	define( 'NOMAD_ENV', 'production' ); // Possible values: 'production' | 'staging' | 'development'. Default: 'production'.
}

// Nomad Debugging.
if ( ! defined( 'NOMAD_DEBUG' ) ) {
	define( 'NOMAD_DEBUG', false );
}

// Include the Nomad Exception class.
if ( ! class_exists( __NAMESPACE__ . '\\Nomad_Exception' ) ) {
	require_once NOMAD_HELPERS_SRC_PATH . 'nomad-exception.php';
}

if ( ! function_exists( __NAMESPACE__ . '\\nomad_error' ) ) {

	/**
	 * Nomad Error.
	 *
	 * Displays Nomad Error messages.
	 *
	 * The purpose for Nomad Errors is to help steer you in the right direction
	 * when developing with Nomad features and utilities.
	 *
	 * Nomad Errors will stop all processing and display error messages when
	 * `NOMAD_ENV` is set to `development`. If `NOMAD_ENV` is set to `staging`
	 * or `production` then Nomad Errors will not be displayed.
	 *
	 * IMPORTANT: IF `NOMAD_ENV` IS NOT DEFINED AND IS NOT SET TO `development`
	 * YOU WILL NOT SEE ANY NOMAD ERROR MESSAGES!
	 *
	 * @since 1.0.0
	 *
	 * @param string $message Message to be displayed.
	 *
	 * @return void
	 */
	function nomad_error( $message ) {

		// Only display Nomad Errors in development environment.
		if ( defined( 'NOMAD_ENV' ) && 'development' !== NOMAD_ENV ) {
			return;
		}

		wp_die( sprintf( '<strong>Nomad Error:</strong> %s', $message ) );
		exit;

	}

}

if ( ! function_exists( __NAMESPACE__ . '\\nomad_trigger_404' ) ) {

	/**
	 * Nomad Trigger 404.
	 *
	 * Triggers a 404 error by setting the global WP_Query and status headers,
	 * then displays the 404 Theme Template and exits.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function nomad_trigger_404() {

		global $wp_query;

		$wp_query->set_404();

		status_header( 404 );

		get_template_part( '404' );
		exit;

	}

}

if ( ! function_exists( __NAMESPACE__ . '\\nomad_format_attributes' ) ) {

	/**
	 * Nomad Format Attributes.
	 *
	 * Provide an array of HTML attribute keys and their associated values and
	 * convert it into a string.
	 *
	 * @since 1.0.0
	 *
	 * @param array $attributes Array of HTML attribute keys and values to be converted to a string.
	 *
	 * @return string|null
	 */
	function nomad_format_attributes( array $attributes ) {

		if ( empty( $attributes ) ) {
			return null;
		}

		$formatted_attributes = '';

		foreach ( $attributes as $key => $value ) {

			// Skip if the attributes value is null.
			if ( is_null( $value ) ) {
				continue;
			}

			if ( is_bool( $value ) && $value ) {
				// If the value is a strict boolean and set to true, just output the key (e.g. required, checked).
				$formatted_attributes .= ' ' . $key;
			} else if ( is_array( $value ) && ! empty( $value ) ) {
				// If the value is an array, join them together as a string separated by a space and escape the value.
				$formatted_attributes .= sprintf( ' %s="%s"', $key, esc_attr( implode( ' ', $value ) ) );
			} else {
				// Otherwise, set the key to its escaped value.
				$formatted_attributes .= sprintf( ' %s="%s"', $key, esc_attr( $value ) );
			}

		}

		return $formatted_attributes;

	}

}
