<h1>Rametta Theme Options</h1>

<?php settings_errors(); ?>

<form method="post" action="options.php">

	<?php settings_fields('rametta-settings-group'); ?>
	<?php do_settings_sections('rametta'); ?>
	<?php submit_button(); ?>

</form>
