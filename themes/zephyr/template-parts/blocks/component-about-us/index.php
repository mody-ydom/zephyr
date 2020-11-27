<?php
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'component-about-us';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}
if (get_field('is_screenshot')) :
  /* Render screenshot for example */
  echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/template-parts/blocks/component-about-us/screenshot1.png" >';
  return;
endif;

/****************************
 *     Custom ACF Meta      *
 ****************************/
$small_title = get_field('small_title');
$big_title = get_field('big_title');
$block_description = get_field('block_description');
?>
<!-- region Zephyr's Block -->
<?php general_settings_for_blocks($id, $className); ?>
<div class="container">
  <div class="about-us">
    <div class="about-us-content swiper-container">
      <div class="swiper-wrapper row-swiper row">
        <?php
        if (have_rows('blocks')) {
          while (have_rows('blocks')) {
            the_row();
            $image = get_sub_field('image');
            $description = get_sub_field('description');
            $link = get_sub_field('link');
            ?>
            <div class="swiper-slide col-xl-4">
              <div class="about-logo">
                <?php if ($image) { ?>
                  <div class="image-wrapper iv-st-from-bottom">
                    <a href="<?php echo $link; ?>">
                      <img alt="about logo1" src="<?php echo $image['url']; ?>">
                    </a>
                  
                  </div>
                <?php } ?>
                <?php if ($description) { ?>
                  <p class="paragraph-1 iv-st-from-bottom"><?php echo $description; ?></p>
                <?php } ?>
              </div>
            </div>
            <?php
          }
        }
        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</div>
</section>
<!-- endregion Zephyr's Block -->
