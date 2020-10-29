<?php

//code that overwrites functionality
require get_template_directory() . '/inc/cleanup.php';
require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/walker.php';
require get_template_directory() . '/inc/vendor/Mobile_Detect.php';

// grabs CSS
function nitke_register_styles()
{
    wp_enqueue_style('nitke-css', get_template_directory_uri() . "/style.css", array(), '1.0', get_template_directory_uri() . '/img/nitke_icon_100x.png', 110);
}

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

add_action('wp_enqueue_scripts', 'nitke_register_styles');

// remove width & height attributes from images
//
function remove_img_attr($html)
{
    return preg_replace('/(width|height)="\d+"\s/', "", $html);
}

add_filter('post_thumbnail_html', 'remove_img_attr');
