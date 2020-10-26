<?php
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'component-case-studies';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
if (get_field('is_screenshot')) :
    /* Render screenshot for example */
    echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/template-parts/blocks/component-case-studies/screenshot.png" >';
    return;
endif;

/****************************
 *     Custom ACF Meta      *
 ****************************/
$small_title = get_field('small_title');
$big_title = get_field('big_title');
$image_1 = get_field('image_1');
$image_2 = get_field('image_2');
$small_title_under_image = get_field('small_title_under_image');
$big_title_under_image = get_field('big_title_under_image');
$small_paragraph=get_field('small_paragraph');
?>
<!-- region Zephyr's Block -->
<?php general_settings_for_blocks($id, $className); ?>
<div class="container">
    <?php if($small_title){?> ?><div class="paragraph-1 word-up desktop-only"><?php echo $small_title; ?></div><?php } ?>
    <?php if($big_title){ ?><h1 class="headline-1 real-line-up"><?php echo $big_title; ?></h1><?php } ?>
    <div class="image-wrapper">
        <img alt="<?php echo $image_1['alt']; ?>" class="cara" src="<?php echo $image_1['url']; ?>">
        <img alt="<?php echo $image_2['alt']; ?>" class="mac" src="<?php echo $image_2['url']; ?>">
    </div>

    <div class="content">
        <?php if($small_paragraph){ ?><p class="paragraph-1 "><?php echo $small_paragraph; ?></p> <?php } ?>

              <?php if($small_title_under_image){ ?>  <h5 class="headline-5 word-up"><?php echo $small_title_under_image; ?></h5><?php
              } ?>
                <?php if($big_title_under_image){ ?><h4 class="headline-4 real-line-up"><?php echo $big_title_under_image; ?></h4><?php } ?>
    </div>

</div>

</section>
<!-- endregion Zephyr's Block -->
