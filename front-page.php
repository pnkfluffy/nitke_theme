<?php
/*
@package nitketheme
 */
get_header();?>
<style>
<?php include 'css/nitke-home.css';?>
</style>
<div id="wonderplugin-fullscreen-slideshow">
<?php echo do_shortcode('[wonderplugin_slider id=1]'); ?>
</div>

<?php get_footer();?>