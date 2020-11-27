<?php
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'component-hero-general';

if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}
if (get_field('is_screenshot')) :
  /* Render screenshot for example */
  echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/template-parts/blocks/component-hero/screenshot1.png" >';
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
<?php if ($background_image) { ?>
  <div class="hero-image">
    <img alt="<?=$background_image['alt'];?>" src="<?=$background_image['url'];?>">
  </div>
<?php } ?>
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
<div class="down">
  <svg width="24" height="56" viewBox="0 0 24 56" fill="none" xmlns="http://www.w3.org/2000/svg">
    <g clip-path="url(#clip0)">
      <path fill-rule="evenodd" clip-rule="evenodd"
            d="M2 12V30C2 35.5 6.5 40 12 40C17.5 40 22 35.5 22 30V12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12ZM0 12C0 5.4 5.4 0 12 0C18.6 0 24 5.4 24 12V30C24 36.6 18.6 42 12 42C5.4 42 0 36.6 0 30V12Z"
            fill="white"/>
      <path class="dot" fill-rule="evenodd" clip-rule="evenodd"
            d="M11 7V11C11 11.6 11.4 12 12 12C12.6 12 13 11.6 13 11V7C13 6.4 12.6 6 12 6C11.4 6 11 6.4 11 7Z"
            fill="white"/>
    
    </g>
    <defs>
      <clipPath id="clip0">
        <rect width="24" height="55.4" fill="white"/>
      </clipPath>
    </defs>
  </svg>
  <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="16" height="9" viewBox="0 0 16 9">
    <g>
      <g>
        <path fill="#fff"
              d="M8 6L13.5.5c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4L8.7 8.1c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3L1 1.9C.6 1.5.6.9 1 .5c.4-.4 1-.4 1.4 0z"/>
      </g>
    </g>
  </svg>
</div>
</section>
<!-- endregion Zephyr's Block -->
