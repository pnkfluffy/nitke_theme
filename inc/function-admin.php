<?php
/*
@package nitketheme
=======================
ADMIN PAGE
=======================
 */

function nitke_add_admin_page()
{
    //Generate Theme Admin Page
    add_menu_page('Nitke Theme Options', 'Nitke', 'manage_options', 'nitke_theme', 'nitke_theme_create_page', get_template_directory_uri() . '/img/nitke_icon_20x.png', 110);

    //Generate Admin Sub Pages
    add_submenu_page('nitke_theme', 'Nitke Theme Options', 'General', 'manage_options', 'nitke_theme', 'nitke_theme_create_page');
    // add_submenu_page('nitke_theme', 'Nitke CSS Options', 'Custom CSS', 'manage_options', 'nitke_css', 'nitke_theme_css_page');
    add_submenu_page('nitke_theme', 'Nitke Posts Options', 'Posts Options', 'manage_options', 'nitke_theme_posts', 'nitke_theme_post_page');
}

add_action('admin_menu', 'nitke_add_admin_page');
add_action('admin_init', 'nitke_custom_settings');

function nitke_custom_settings()
{
    register_setting('nitke-settings-group', 'first_name');
    register_setting('nitke-settings-group', 'last_name');

    add_settings_section('nitke-sidebar-options', 'Sidebar Options', 'nitke_sidebar_options', 'nitke_theme');

    add_settings_field('sidebar-name', 'Full Name', 'nitke_sidebar_name', 'nitke_theme', 'nitke-sidebar-options');

    //Theme Support Options
    register_setting('nitke-theme-support', 'post_formats');
    add_settings_section('nitke-theme-options', 'Posts Options', 'nitke_theme_options', 'nitke_theme_posts');
    add_settings_field('post-formats', 'Post Formats', 'nitke_post_formats', 'nitke_theme_posts', 'nitke-theme-options');
}

function nitke_sidebar_options()
{
    echo 'Customize Sidebar Info';
}
function nitke_sidebar_name()
{
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    echo '<input type="text" name="first_name" value="' . $firstName . '" placeholder="First Name"/> <input type="text" name="last_name" value="' . $lastName . '" placeholder="Last Name"/>';
}
//Generation of our settings subpage
function nitke_theme_create_page()
{
    require_once get_template_directory() . '/inc/templates/nitke-admin.php';
}
function nitke_theme_post_page()
{
    require_once get_template_directory() . '/inc/templates/nitke-posts.php';
}
function nitke_theme_options()
{
    echo 'Activate and Deactivate Specific Theme Support Options';
}
function nitke_post_formats()
{
	$options = get_option( 'post_formats' );
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';
	foreach ( $formats as $format ){
		$checked = ( @$options[$format] == 1 ? 'checked' : '' );
		$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
	}
	echo $output;
}
