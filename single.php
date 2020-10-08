<?php
/*
@package nitketheme
 */
get_header();?>

<?php if (nitke_get_attachment()):
    $attachments = nitke_get_attachment();
    $current = 0;
    if (empty($_GET['img_id'])) {
        $current = 0;
    } else {
        $current = $_GET['img_id'];
    }

    ?>
<?php
    function get_current($change, $current, $attachments)
{
        $current += $change;
        $newcurrent = $current % (count($attachments));
        if ($newcurrent < 0) {
            $newcurrent = count($attachments) - 1;
        }
        $current = $newcurrent;
        return ($newcurrent);
    }
    ?>
<div id="primary" class="content-area">
  <main id="main" class="single-container" role="main">
    <div id="gallery-view" class="gallery-container carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <?php
    $index = 0;
    foreach ($attachments as $attachment):
        $active = ($index == $current ? ' active' : ' hidden');
        ?>
        <img class="item<?php echo $active; ?> gallery-featured"
          src=<?php echo wp_get_attachment_url($attachment->ID); ?> />

        <?php $index++;endforeach;?>
        <div class="carousel-nav">

          <a class="left carousel-control" href="?img_id=<?php echo get_current(-1, $current, $attachments); ?>"
            role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="?img_id=<?php echo get_current(1, $current, $attachments); ?>"
            role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
    <div id="gallery-nav-father" class="gallery-nav-father">
      <div class="gallery-nav-container">
        <div class="title">
          <?php echo $attachments[$current]->post_excerpt; ?>
        </div>
        <div class="gallery-navigation">
          <?php
    $nav_index = 0;
    foreach ($attachments as $attachment):
        $nav_active = ($nav_index == $current ? ' active' : '');
        ?>
          <a class="gallery-nav-icon<?php echo $nav_active; ?>" href="?img_id=<?php echo $nav_index ?>" role="button">
            <svg width="4px" height="4px" viewBox="0 0 16 16" class="bi bi-circle-fill" fill="currentColor"
              xmlns="http://www.w3.org/2000/svg">
              <circle cx="8" cy="8" r="8" />
            </svg>
          </a>
          <!-- THIS COMMENTED OUT CODE IS THE START
								                    OF TRYING TO GET THIS TO WORK IN JAVASCRIPT
								                    INSTEAD OF PHP --!>
								                    <!-- <a class="gallery-nav-icon<?php echo $nav_active; ?>" onClick="changePage(<?php echo $nav_index ?>)"
								                        role="button">
								                        <svg width="4px" height="4px" viewBox="0 0 16 16" class="bi bi-circle-fill" fill="currentColor"
								                            xmlns="http://www.w3.org/2000/svg">
								                            <circle cx="8" cy="8" r="8" />
								                        </svg>
						                            </a>
						                            <script>
						                            function changePage(pageNum) {
						                                console.log("hi", pageNum);
						                                window.history.replaceState(null, null, `?img_id=${pageNum}`);
						                            }
						                            </script> -->
          <?php $nav_index++;endforeach;?>
        </div>
        <div class="to-thumbnail-view" onClick="toThumbnail()">
          SHOW THUMBNAILS
        </div>
      </div>
    </div>
    <div id="thumbnail-view">
      <ul>
        <?php
    $gal_index = 0;
    foreach ($attachments as $attachment):
    ?>
        <li>
          <img class="image-thumbnail" onclick="window.location.href='?img_id=<?php echo $gal_index ?>'"
            src=<?php echo wp_get_attachment_url($attachment->ID); ?> />
        </li>
        <?php $gal_index++;endforeach;?>
      </ul>
    </div>
  </main>
</div>

<script>
function toThumbnail() {
  document.getElementById('gallery-view').style.display = "none";
  document.getElementById('gallery-nav-father').style.display = "none";
  document.getElementById('thumbnail-view').style.display = 'block';
}

function toSlideshow() {
  document.getElementById('gallery-view').style.display = "block";
  document.getElementById('gallery-nav-father').style.display = "block";
  document.getElementById('thumbnail-view').style.display = 'none';
}
</script>



<?php endif;?>
<?php get_footer();?>