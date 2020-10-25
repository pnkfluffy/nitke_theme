<?php
/*
@package nitketheme
 */
get_header();?>
<div id="primary" class="content-area">
  <main id="main" class="page-main" role="main">
    <?php
if (have_posts()):
    while (have_posts()): the_post();
        get_template_part('template-parts/content', 'page');
    endwhile;
endif
?>
  </main>
</div>


<?php get_footer();?>