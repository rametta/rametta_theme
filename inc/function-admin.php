<?php

/*

@package ramettatheme

	========================
	 Theme Admin Page
	========================

*/

add_action('admin_menu', 'rametta_add_admin_page');

function rametta_add_admin_page() {
	// rametta admin page
	add_menu_page('Rametta Theme Options', 'Rametta', 'manage_options', 'rametta', 'rametta_theme_create_page', get_template_directory_uri() . '/img/rametta-admin-icon.svg', 80);

	// rametta admin submenu pages
	add_submenu_page('rametta', 'Rametta Theme Options', 'Settings', 'manage_options', 'rametta', 'rametta_theme_create_page');
	add_submenu_page('rametta', 'Rametta Style Options', 'Style', 'manage_options', 'rametta_style', 'rametta_theme_settings_page');
	// activate custom settings
	add_action('admin_init', 'rametta_custom_settings');
}

function rametta_theme_create_page() {
	//admin page
	require_once(get_template_directory() . '/inc/templates/rametta-admin.php');
}

function rametta_theme_settings_page() {
	//style page
	echo '<h1>Rametta Theme Styles</h1>';
}

function rametta_custom_settings() {
	register_setting('rametta-settings-group', 'first_name');
	register_setting('rametta-settings-group', 'last_name');

	add_settings_section('rametta-sidebar-options', 'Sidebar Options', 'rametta_sidebar_options', 'rametta');
	add_settings_field('sidebar-name', 'First Name', 'rametta_sidebar_name', 'rametta', 'rametta-sidebar-options');
}

function rametta_sidebar_options() {
	echo '<p>Customize your sidebar settings</p>';
}

function rametta_sidebar_name() {
	$firstName = esc_attr(get_option('first_name'));
	$lastName = esc_attr(get_option('last_name'));
	echo '<input type="text" name="first_name" value="'. $firstName .'" placeholder="First Name" />
	<input type="text" name="last_name" value="'. $lastName .'" placeholder="Last Name" />';
}
