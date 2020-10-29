<?php
/*
@package nitketheme
 */
get_header();?>

<div id="primary" class="content-area">
    <main id="main" class="home-container" role="main">
        <?php
            $my_query = new WP_Query('category_name=uncategorized&posts_per_page=20');
            if ($my_query->have_posts()):
                while ($my_query->have_posts()): $my_query->the_post();
                    // var_dump(the_post());
                    get_template_part('template-parts/content', get_post_format());
                endwhile;
            endif;
        ?>
    </main>
</div>

<?php get_footer();?>