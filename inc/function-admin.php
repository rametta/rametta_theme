<?php

/*

@package ramettatheme

	========================
	 Theme Admin Page
	========================
*/

function rametta_add_admin_page() {
	add_menu_page('Rametta Theme Options', 'Rametta', 'manage_options', 'rametta', 'rametta_theme_create_page', get_template_directory_uri() . '/img/rametta-admin-icon.svg', 89);
}
add_action('admin_menu', 'rametta_add_admin_page');

function rametta_theme_create_page() {

}