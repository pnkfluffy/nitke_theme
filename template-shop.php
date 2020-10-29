<?php
/*
Template Name: Shop Page
@package nitketheme
 */
get_header();?>
<div id="primary" class="content-area">
  <main id="main" class="shop-main" role="main">
    <div class="row">
      <div class="col-lg-12">
        <h1><?php the_title();?>
        </h1>
        <?php
if (have_posts()):
    while (have_posts()): the_post();?>
        <?php the_content();?>
        <?php
    endwhile;
  else:
endif
?>
      </div>
    </div>
  </main>
</div>


<?php get_footer();?>