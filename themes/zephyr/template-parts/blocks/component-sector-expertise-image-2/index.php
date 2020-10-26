<?php
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'component-sector-expertise-image-2';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
if (get_field('is_screenshot')) :
    /* Render screenshot for example */
    echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/template-parts/blocks/component-sector-expertise-image-2/screenshot.png" >';
    return;
endif;

/****************************
 *     Custom ACF Meta      *
 ****************************/
$image = get_field('image');
$small_paragraph = get_field('small_paragraph');

?>
<!-- region Zephyr's Block -->
<?php general_settings_for_blocks($id, $className); ?>

<div class="container">
    <div class="image-1">
        <div class="image-wrapper ">
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
        </div>
        <p class="paragraph-1 "><?php echo $small_paragraph; ?></p>
    </div>
</div>

</section>
<!-- endregion Zephyr's Block -->
