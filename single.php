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
    //    currently jittery due to refresh on href, can be made smoother
    //    or with transition by using session or javascript
    //    https://stackoverflow.com/questions/13209181/increase-by-one-a-variable-every-time-you-push-a-button-php
    function get_current($change, $current, $attachments)
{
        $current += $change;
        $newcurrent = $current % (count($attachments));
        if ($newcurrent < 0) {
            $newcurrent = count($attachments) - 1;
        }

        return ($newcurrent);
    }
    ?>
<div id="primary" class="content-area">
    <main id="main" class="single-container" role="main">
        <div id="gallery-<?php the_ID();?>" class="gallery-container carousel slide" data-ride="carousel">
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

                    <a class="left carousel-control"
                        href="?img_id=<?php echo get_current(-1, $current, $attachments); ?>" role="button"
                        data-slide="prev">
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control"
                        href="?img_id=<?php echo get_current(1, $current, $attachments); ?>" role="button"
                        data-slide="next">
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="gallery-nav-father">
            <div class="gallery-nav-container">
                <div class="title">
                    hi there
                </div>
                <div class="gallery-navigation">
                    <?php
    $nav_index = 0;
    foreach ($attachments as $attachment):
        $nav_active = ($nav_index == $current ? ' active' : '');
        ?>
                    <a class="gallery-nav-icon<?php echo $nav_active; ?>" href="?img_id=<?php echo $nav_index ?>"
                        role="button">
                        <svg width="4px" height="4px" viewBox="0 0 16 16" class="bi bi-circle-fill" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="8" />
                        </svg>
                    </a>
                    <?php $nav_index++;endforeach;?>
                </div>
            </div>
        </div>
    </main>
</div>

<?php endif;?>
<?php get_footer();?>