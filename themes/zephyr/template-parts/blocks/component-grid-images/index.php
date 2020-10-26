<?php
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'component-grid-images';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
if (get_field('is_screenshot')) :
    /* Render screenshot for example */
    echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/template-parts/blocks/component-grid-images/screenshot.png" >';
    return;
endif;

/****************************
 *     Custom ACF Meta      *
 ****************************/
?>
<!-- region Zephyr's Block -->
<?php general_settings_for_blocks($id, $className); ?>
<div class="container">
    <div class="paragraph-1 center word-up">case studies</div>
    <h1 class="headline-1 real-line-up">Other success stories</h1>
    <div class="grid row">
        <?php if (have_rows('grid_images')) {
        while (have_rows('grid_images')) {
        the_row();
        $first_image = get_sub_field('first_image');
        $second_image = get_sub_field('second_image');
        $small_title = get_sub_field('small_title');
        $big_title = get_sub_field('big_title');
        $second_image_padding_top=get_sub_field('second_image_padding_top');
        ?>
        <div class="grid-item iv-st-from-bottom col-12 col-sm-6">
            <div class="image-wrapper">
                <img src="<?php echo $first_image['url']; ?>" alt="<?php echo $first_image['alt']; ?>">
                <img style="top:<?= $second_image_padding_top; ?>%" class="iphone" src="<?php echo $second_image['url']; ?>" alt="<?php echo $second_image['alt']; ?>">
            </div>
            <div class="content">
                <h5 class="headline-5 word-up"><?php echo $small_title; ?></h5>
                <h4 class="headline-4 real-line-up"><?php echo $big_title; ?></h4>
            </div>
        </div>
            <?php
        }
        } ?>
        <div class="grid-sizer grid-item col-12 col-sm-6 stamp"></div>
    </div>
</div>


    </section>
    <!-- endregion Zephyr's Block -->
