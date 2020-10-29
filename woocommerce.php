<?php
/*
@package nitketheme
 */
get_header();?>
<div id="primary" class="content-area">
  <main id="main" class="woocommerce-main" role="main">
    <div class="row">
      <div class="col-12">
        <?php woocommerce_content();?>
      </div>
    </div>
  </main>
</div>


<?php get_footer();?>