<?php
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'home-page-wrapper';
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
$image = get_field('image');
$small_title_under_image = get_field('small_title_under_image');
$big_title_under_image = get_field('big_title_under_image');
?>
<!-- region Zephyr's Block -->
<?php general_settings_for_blocks($id, $className); ?>
<section class="component-case-studies">
    <div class="container">
        <div class="paragraph-1 word-up desktop-only"><?php echo $small_title; ?></div>
        <h1 class="headline-1 real-line-up">We collaborate with exciting new companies…</h1>

        <div class="row">
            <div class="col-12 bike-image">
                <?php if ($image) { ?>
                    <div class="image-wrapper" data-reveal-direction="left">
                        <img src="<?php echo $image['url']; ?>"
                             alt="<?php echo $image['alt']; ?>">
                    </div>
                <?php } ?>
                <div class="content">
                    <h5 class="headline-5 word-up"><?php echo $small_title_under_image; ?></h5>
                    <h4 class="headline-4 real-line-up"><?php echo $big_title_under_image; ?></h4>
                </div>
            </div>
        </div>
    </div>
</section>

</section>
<!-- endregion Zephyr's Block -->
