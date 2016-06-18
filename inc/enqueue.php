<?php

/*

@package ramettatheme

	========================
	ADMIN ENQUEUE FUNCTIONS
	========================

*/

// Main Hooks
add_action( 'admin_enqueue_scripts', 'rametta_load_admin_scripts' );

// Callbacks
function rametta_load_admin_scripts( $hook ) {

    if( $hook != 'toplevel_page_rametta' ) { return; }
    wp_register_style( 'rametta_admin', get_template_directory_uri() . '/css/rametta.admin.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'rametta_admin' );

}