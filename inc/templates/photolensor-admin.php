<h1>Photolensor Contact Options</h1>

<?php settings_errors(); ?>
<form method="post" action="options.php">
  <?php settings_fields( 'photolensor-contact-options' ); ?>
  <?php do_settings_sections( 'nikos_photolensor_theme_contact' ); ?>
  <?php submit_button(); ?>
</form>