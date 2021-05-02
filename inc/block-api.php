<?php
/**
 * Block API endpoints if you are not logged in.
 *
 * @package Jafar_Theme
 */
function myplugin_removes_api_endpoints_for_not_logged_in() {
	if ( ! is_user_logged_in() ) {
			// Removes WordpPress endpoints.
			remove_action( 'rest_api_init', 'create_initial_rest_routes', 99 );
			// Removes Woocommerce endpoints.
		if ( function_exists( 'WC' ) ) {
				remove_action( 'rest_api_init', array( WC()->api, 'register_rest_routes' ), 10 );
		}
	}
} add_action( 'init', 'myplugin_removes_api_endpoints_for_not_logged_in' );
