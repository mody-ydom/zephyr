<?php
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'component-hero no-bg';

if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}
if (get_field('is_screenshot')) :
  /* Render screenshot for example */
  echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/template-parts/blocks/component-hero/screenshot.png" >';
  return;
endif;

/****************************
 *     Custom ACF Meta      *
 ****************************/
$small_title = get_field('small_title');
$big_title = get_field('big_title');
$paragraph = get_field('paragraph');
$background_image = get_field('background_image');
$button = get_field('button');
?>
<!-- region Zephyr's Block -->
<?php general_settings_for_blocks($id, $className); ?>
<div class="container">
  <div class="content">
    <?php if ($small_title) { ?><h6 class="headline-6 word-up center"><?=$small_title;?></h6><?php } ?>
    <?php if ($big_title) { ?> <h1 class="headline-1 word-up center"><?=$big_title;?></h1><?php } ?>
    <?php if ($paragraph) { ?>
      <div class="paragraph real-line-up center"><?=$paragraph;?> </div>
    <?php } ?>
    <?php if ($button['title']) { ?>
      <a class="btn iv-st-from-bottom" href="<?=$button['url'];?>"><?=$button['title'];?></a>
    <?php } ?>
  </div>
</div>
<svg class="circle orange-circle" fill="none" height="90" viewBox="0 0 90 90" width="90"
     xmlns="http://www.w3.org/2000/svg">
  <circle cx="45" cy="45" fill="#FE9572" fill-opacity="0.9" r="45"/>
</svg>

<svg class="circle aqua-circle" height="171" viewBox="0 0 171 171" width="171"
     xmlns="http://www.w3.org/2000/svg">
  <g>
    <g>
      <path d="M171 85.5c0 47.22-38.28 85.5-85.5 85.5S0 132.72 0 85.5 38.28 0 85.5 0 171 38.28 171 85.5z"
            fill="#8aeed6" fill-opacity=".6"/>
    </g>
  </g>
</svg>

<img alt="dark-circle" class="circle dark-circle"
     src="<?=get_template_directory_uri();?>/assets/images/dark-circle.png">

<svg class="circle oval" fill="none" height="253" viewBox="0 0 258 253" width="258"
     xmlns="http://www.w3.org/2000/svg">
  <path clip-rule="evenodd"
        d="M145.725 1.12358C120.277 4.83717 96.5096 16.07 74.3481 29.145C39.811 49.5244 5.57066 78.9824 0.607883 118.844C-1.604 136.61 2.40987 154.74 9.57122 171.142C32.9158 224.614 93.2636 260.098 150.906 251.797C208.547 243.497 257.218 190.344 257.984 131.983C258.878 63.7665 222.083 -10.0199 145.725 1.12358Z"
        fill="#8aeed6"
        fill-opacity=".6" fill-rule="evenodd"/>
</svg>
</section>
<!-- endregion Zephyr's Block -->
