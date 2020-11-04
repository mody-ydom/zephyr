<?php
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'component-logo';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}
if (get_field('is_screenshot')) :
  /* Render screenshot for example */
  echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/template-parts/blocks/component-logo/screenshot.png" >';
  return;
endif;

/****************************
 *     Custom ACF Meta      *
 ****************************/
?>
<!-- region Zephyr's Block -->
<?php general_settings_for_blocks($id, $className); ?>
<div class="container">
  <div class="row justify-content-start justify-content-xl-between align-items-center">
    <?php if (have_rows('logos')):
      while (have_rows('logos')):
        the_row();
        $logo = get_sub_field('logo');
        $link = get_sub_field('link');
        ?>
        <div class="col-6 col-md-4 col-xl-3">
          <div class="image-wrapper iv-st-from-bottom">
            <?php if ($logo) { ?>
              <a href="<?=$link?>" target="_blank">
                <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
              </a>
            <?php } ?>
          </div>
        </div>
      <?php endwhile; endif; ?>
  </div>
</div>

</section>
<!-- endregion Zephyr's Block -->
