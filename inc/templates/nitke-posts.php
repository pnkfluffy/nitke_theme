<h1>Nitke Post Options</h1>

<?php settings_errors(); ?>
<form method="post" action="options.php">
    <?php settings_fields('nitke-theme-support') ?>
    <?php do_settings_sections( 'nitke_theme_posts' ) ?>
    <?php submit_button( ); ?>
</form>
<!-- <?php bloginfo('name'); ?> -->