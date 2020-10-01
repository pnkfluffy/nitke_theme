<?php
/*
@package nitketheme
 */
get_header();?>

<div id="primary" class="content-area">
    <main id="main" class="home-container" role="main">
        <?php
if (have_posts()):
    while (have_posts()): the_post();
        get_template_part('template-parts/content', get_post_format());
    endwhile;
endif;
?>
    </main>
</div>

<?php get_footer();?>