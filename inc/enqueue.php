<?php
/*
@package nitketheme
=======================
ADMIN ENQUEUE FUNCTIONS
=======================
 */

function nitke_load_admin_scripts($hook)
{

    //checks if on theme admin page
    if ('toplevel_page_nitke_theme' != $hook) {
        return;
    }

    wp_register_style('nitke_admin_css', get_template_directory_uri() . '/css/nitke.admin.css', array(), '1.0.0', 'all');
    wp_enqueue_style('nitke_admin_css');
}

add_action('admin_enqueue_scripts', 'nitke_load_admin_scripts');

/*
@package nitketheme
=======================
FRONT-END ENQUEUE FUNCTIONS
=======================
 */
function nitke_load_scripts()
{
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.5.2', 'all');

    wp_register_style('nitke_css', get_template_directory_uri() . '/css/buggy/nitke.css', array(), '1.0.0', 'all');
    wp_enqueue_style('nitke_css');

    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.js', false, '3.5.1', true);
    wp_enqueue_script('jquery');
    wp_enqueue_script('popper', get_template_directory_uri() . '/js/popper.min.js', false, '1.14.3', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.5.2', true);
}
add_action('wp_enqueue_scripts', 'nitke_load_scripts');
