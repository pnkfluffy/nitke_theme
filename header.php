<?php
/*
@package nitketheme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
    <title><?php bloginfo('name');
wp_title();?></title>
    <meta name="description" content="<?php bloginfo('description')?>" <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width+device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if (is_singular() && pings_open(get_queried_object())): ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url');?>">
    <?php endif;?>
    <?php wp_head();?>
</head>

<body <?php body_class();?>>
        <div class="navbar">
            <div class="navbar_title">
                <!-- <?php
esc_attr(get_option('first_name'));
esc_attr(get_option('last_name'));
?> -->
            </div>
            <div class="navbar_container navbar_galleries">
            </div>
            <div class="navbar_container navbar_menu">
                <?php
wp_nav_menu(array(
    'theme_location' => 'primary',
    'container' => false,
    'menu_class' => 'nav navbar-nav navbar-nitke',
    'walker' => new Nitke_Walker_Nav_Primary,
))
?>
            </div>
    </div>