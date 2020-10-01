<h1>Nitke Theme Options </h1>

<?php settings_errors(); ?>
<form method="post" action="options.php">
    <?php settings_fields('nitke-settings-group') ?>
    <?php do_settings_sections( 'nitke_theme' ) ?>
    <?php submit_button( ); ?>
</form>
<!-- <?php bloginfo('name'); ?> -->