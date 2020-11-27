<?php
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'component-our-team';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}
if (get_field('is_screenshot')) :
  /* Render screenshot for example */
  echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/template-parts/blocks/component-our-team/screenshot.png" >';
  return;
endif;

/****************************
 *     Custom ACF Meta      *
 ****************************/
$block_title = get_field('block_title');
$block_subtitle = get_field('block_subtitle');
?>
<!-- region Zephyr's Block -->
<?php general_settings_for_blocks($id, $className); ?>
<div class="container">
  <div class="our-team">
    <div class="our-team-content">
      <div class="row">
        <?php if (have_rows('team_member')) {
          while (have_rows('team_member')) {
            the_row();
            $name = get_sub_field('name');
            $image = get_sub_field('image');
            $job_title = get_sub_field('job_title');
            $shape_in_background = get_sub_field('shape_in_background');
            ?>
            <div class="col-6 col-md-4 col-xl-3 team-parent">
              <div class="team-person iv-st-from-bottom">
                <div class="image-wrapper">
                  <span class="animated-circle <?=$shape_in_background?>"></span>
                  <?php if ($image) { ?>
                    <img alt="<?=$image['alt'];?>" src="<?=$image['url'];?>">
                  <?php } ?>
                </div>
                <?php if ($name) { ?>
                  <h5 class="name iv-st-from-bottom wu"><?=$name;?></h5>
                <?php } ?>
                <?php if ($job_title) { ?>
                  <h6 class="title-job iv-st-from-bottom wu"><?=$job_title;?></h6>
                <?php } ?>
              </div>
            </div>
          <?php }
        } ?>
      </div>
<!--                  <a class="load-more btn iv-st-from-bottom" href="#">-->
<!--                      Load More-->
<!--                  </a>-->
    </div>
  </div>
</div>
</section>
<!-- endregion Zephyr's Block -->
