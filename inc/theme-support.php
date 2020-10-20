<?php
/*
@package nitketheme
=======================
THEME SUPPORT OPTIONS
=======================
 */

$options = get_option('post_formats');
$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
$output = array();
foreach ($formats as $format) {
    $output[] = (@$options[$format] == 1 ? $format : '');
}
if (!empty($options)) {
    add_theme_support('post-formats', $output);
}
//  add_theme_support( 'post-formats', "Gallery" );

function nitke_register_nav_menu()
{
    register_nav_menu('primary', 'Pages Navigation Menu');
}
add_action('after_setup_theme', 'nitke_register_nav_menu');

add_theme_support('post-thumbnails');

/*
@package nitketheme
=======================
blog loop functions
=======================
 */

//  has issue of grabbing media that was UPLOADED on the POST
//  not media UPLOADED then ADDED to the post.

//  needs to be rewritten with get_media_embedded_in_content();

function nitke_get_attachment()
{
    $output = '';

    $attachments = array_reverse(get_posts(array(
        'post_type' => 'attachment',
        'posts_per_page' => 100,
        'post_parent' => get_the_ID(),
    )));

    if ($attachments):
        foreach ($attachments as $attachment):
            $output = wp_get_attachment_url($attachment->ID);
        endforeach;
        wp_reset_postdata();
    endif;

    return $attachments;
}

function nitke_get_thumbnail()
{
    $output = '';
    if (has_post_thumbnail()):
        $output = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
    else:
        $attachments = array_reverse(get_posts(array(
            'post_type' => 'attachment',
            'posts_per_page' => 100,
            'post_parent' => get_the_ID(),
        )));
        $output = wp_get_attachment_url($attachments[0]->ID);
        wp_reset_postdata();
    endif;

    return $output;
}
