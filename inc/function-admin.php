<?php

/*

@package ramettatheme

	========================
	 Theme Admin Page
	========================

*/

add_action( 'admin_menu', 'rametta_add_admin_page' );

function rametta_add_admin_page() {
	// rametta admin page
	add_menu_page( 'Rametta Sidebar Options', 'Rametta', 'manage_options', 'rametta', 'rametta_theme_create_page', get_template_directory_uri() . '/img/rametta-admin-icon.svg', 80 );
	
	// rametta admin submenu pages
	add_submenu_page( 'rametta', 'Rametta Sidebar Options', 'Sidebar', 'manage_options', 'rametta', 'rametta_theme_create_page' );
	add_submenu_page( 'rametta', 'Rametta Style Options', 'Style', 'manage_options', 'rametta_style', 'rametta_theme_style_page' );

	// activate custom settings
	add_action( 'admin_init', 'rametta_custom_settings' );
}

function rametta_theme_create_page() {
	//admin page
	require_once( get_template_directory() . '/inc/templates/rametta-admin-sidebar.php' );
}

function rametta_theme_style_page() {
	//style page
	require_once( get_template_directory() . '/inc/templates/rametta-admin-style.php' );
}

function rametta_custom_settings() {
	register_setting( 'rametta-settings-group', 'first_name' );
	register_setting( 'rametta-settings-group', 'last_name' );
	register_setting( 'rametta-settings-group', 'user_description' );
	register_setting( 'rametta-settings-group', 'twitter_handle' , 'rametta_sanitize_social_media_handle' );
	register_setting( 'rametta-settings-group', 'instagram_handle' , 'rametta_sanitize_social_media_handle' );
	register_setting( 'rametta-settings-group', 'github_handle' , 'rametta_sanitize_social_media_handle' );

	add_settings_section( 'rametta-sidebar-options', 'Sidebar Options', 'rametta_sidebar_options', 'rametta' );

	add_settings_field( 'sidebar-name', 'Full Name', 'rametta_sidebar_name', 'rametta', 'rametta-sidebar-options' );
	add_settings_field( 'sidebar-description', 'Short Description', 'rametta_sidebar_description', 'rametta', 'rametta-sidebar-options' );
	add_settings_field( 'sidebar-twitter', 'Twitter handle', 'rametta_sidebar_twitter', 'rametta', 'rametta-sidebar-options' );
	add_settings_field( 'sidebar-instagram', 'Instagram handle', 'rametta_sidebar_instagram', 'rametta', 'rametta-sidebar-options' );
	add_settings_field( 'sidebar-tgithub', 'Github handle', 'rametta_sidebar_github', 'rametta', 'rametta-sidebar-options' );
}

function rametta_sidebar_options() {
	echo '<p>Customize your sidebar settings</p>';
}

function rametta_sidebar_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	echo '<input type="text" name="first_name" value="'. $firstName .'" placeholder="First Name" />
	<input type="text" name="last_name" value="'. $lastName .'" placeholder="Last Name" />';
}

function rametta_sidebar_description() {
	$description = esc_attr( get_option( 'user_description' ) );
	echo '<input type="text" name="user_description" value="'. $description .'" placeholder="Description" /><p class="description">A few words about yourself</p>';
}

function rametta_sidebar_twitter() {
	$twitter = esc_attr( get_option( 'twitter_handle' ) );
	echo '<input type="text" name="twitter_handle" value="'. $twitter .'" placeholder="Twitter Handle" />';
}

function rametta_sidebar_instagram() {
	$instagram = esc_attr( get_option( 'instagram_handle' ) );
	echo '<input type="text" name="instagram_handle" value="'. $instagram .'" placeholder="Instagram Handle" />';
}

function rametta_sidebar_github() {
	$github = esc_attr( get_option( 'github_handle' ) );
	echo '<input type="text" name="github_handle" value="'. $github .'" placeholder="Github Handle" />';
}

// Sanitizations //

function rametta_sanitize_social_media_handle( $input ) {
	$output = sanitize_text_field( $input );
	$output = str_replace( '@', '', $output );
	return $output;
}
