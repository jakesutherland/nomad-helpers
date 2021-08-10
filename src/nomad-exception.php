<?php
/**
 * Nomad Exception class file.
 *
 * @since 1.1.0
 *
 * @package Nomad/Helpers
 */

namespace Nomad\Helpers;

if ( ! defined( 'ABSPATH' ) ) exit; // Prevent direct access.

if ( ! class_exists( __NAMESPACE__ . '\\Nomad_Exception' ) ) {

	class Nomad_Exception extends \Exception {

		public function __construct( $message, $code = 0, \Throwable $previous = null ) {

			// Call parent constructor.
			parent::__construct( $message, $code, $previous );

			$this->nomad_message();

		}

		/**
		 * Nomad Message.
		 *
		 * Displays a Nomad Exception message.
		 *
		 * Shows additional information in development environments with debugging on.
		 * Message itself will still be displayed in staging and production environments.
		 *
		 * @since 1.1.0
		 *
		 * @return void
		 */
		public function nomad_message() {

			$message = sprintf( '<p><strong>Nomad Exception:</strong> %s</p>', $this->getMessage() );

			// Only show in development environments with debugging on.
			if ( 'development' === NOMAD_ENV && NOMAD_DEBUG ) {

				$stack_trace = str_replace( "\n", '<br />', $this->getTraceAsString() );

				$message .= sprintf( '<p>Thrown in <code>%s</code> on line <code>%s</code>.</p>', $this->getFile(), $this->getLine() );
				$message .= sprintf( '<p><strong>Stack Trace:</strong><br />%s</p>', $stack_trace );

			}

			wp_die( $message );
			exit;

		}

	}

}
