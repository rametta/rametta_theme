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

    // Allows use of media uploader, adds the src to the page
    wp_enqueue_media();

    wp_register_script( 'rametta-admin-script', get_template_directory_uri() . '/js/rametta.main.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'rametta-admin-script' );

}