<?php
/**
 * Enqueues modifications for Ulimate Member Plugin.
 *
 * @var string
 *
 * @package aap_wp_functionality
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to enqueue the modifications for Ultimate Member plugin.
 *
 * @since 0.1.0
 */
class Sample_Functionality_Setup {

	/**
	 * Main construct
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}

	/**
	 * Register style.
	 *
	 * @since 0.7.4
	 *
	 * @return void
	 */
	public function admin_enqueue_scripts() {
		wp_register_style(
			'aap-admin',
			plugins_url( 'css/aap-admin.css', __DIR__ ),
			array(),
			filemtime( plugin_dir_path( __DIR__ ) . '/css/aap-admin.css' )
		);
		wp_enqueue_style( 'aap-admin' );
	}
}
new Sample_Functionality_Setup();
