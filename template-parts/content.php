<?php
/*
@package nitketheme
 */
?>
<div id="post-<?php the_ID();?>" <?php post_class();?>>
    <a href="<?php the_permalink();?>" class="post-link">
        <div class="gallery-thumbnail">
            <div class="thumbnail-container">
                <img class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt loading="lazy"
                    src=<?php echo nitke_get_thumbnail()?> />
            </div>
        </div>
        <div class="entry-title">
            <?php the_title('<p>', '</p>');?>
            &nbsp;
            <?php the_excerpt();?>
        </div>
        <!-- <?php the_title('<div class="entry-title">', '</div>')?> -->
        <!-- <div class="entry-meta"> -->
        <!-- <?php nitke_posted_meta?> -->
        <!-- </div/> -->
</div>
</a>