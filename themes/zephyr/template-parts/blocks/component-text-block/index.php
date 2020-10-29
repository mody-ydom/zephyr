<?php
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'component-text-block';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}
if (get_field('is_screenshot')) :
  /* Render screenshot for example */
  echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/template-parts/blocks/component-text-block/screenshot.png" >';
  return;
endif;

/****************************
 *     Custom ACF Meta      *
 ****************************/
$text_block = get_field('text_block');
?>
<!-- region Zephyr's Block -->
<?php general_settings_for_blocks($id, $className); ?>
<div class="container">
  <div class="wysiwyg-block real-line-up">
    <?=$text_block?>
  </div>
</div>
</section>
