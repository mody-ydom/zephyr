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
$grid_no = 1;
?>
<!-- region Zephyr's Block -->
<?php general_settings_for_blocks($id, $className); ?>
<div class="container">
    <div class="gide-wrapper">
        <?php if (have_rows('grid_images')) {
            while (have_rows('grid_images')) {
                the_row();
                $first_image = get_sub_field('first_image');
                $second_image = get_sub_field('second_image');
                $small_title = get_sub_field('small_title');
                $big_title = get_sub_field('big_title');
                ?>
                <div class="card iv-st-from-bottom  <?php echo gridNumber($grid_no); ?>">
                    <!-- TODO: Issue with wrapper numbers here, how can client choose the best one for his image ? -->
                    <div class="image-wrapper image-wrapper-2">
                        <img src="<?php echo $first_image['url']; ?>" alt="<?php echo $first_image['alt']; ?>">
                    </div>
                    <div class="content">
                        <h5 class="headline-5 word-up"><?php echo $small_title; ?></h5>
                        <h4 class="headline-4 real-line-up"><?php echo $big_title; ?></h4>
                    </div>
                </div>
                <?php
                $grid_no++;
            }
        } ?>
    </div>
    </section>
    <!-- endregion Zephyr's Block -->
