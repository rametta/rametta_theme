<h1>Rametta Sidebar Options</h1>

<?php 
	settings_errors(); 
?>

<?php
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	$fullName = $firstName . ' ' . $lastName; 
	$description = esc_attr( get_option( 'user_description' ) );
?>

<div class="rametta-sidebar-preview">
	<div class="rametta-sidebar">
		<h1 class="rametta-username"><?php print $fullName; ?></h1>
		<h2 class="rametta-description"><?php print $description; ?></h2>
		<div class="icon-wrapper">

		</div>
	</div>
</div>

<form method="post" action="options.php" class="rametta-general-form">
	<?php settings_fields('rametta-settings-group'); ?>
	<?php do_settings_sections('rametta'); ?>
	<?php submit_button(); ?>
</form>
