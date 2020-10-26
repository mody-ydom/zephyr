<?php
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'component-our-testimonials';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
if (get_field('is_screenshot')) :
    /* Render screenshot for example */
    echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/template-parts/blocks/component-our-testimonials/screenshot.png" >';
    return;
endif;

/****************************
 *     Custom ACF Meta      *
 ****************************/
$title = get_field('title');
$text = get_field('text');

?>
<!-- region Zephyr's Block -->
<?php general_settings_for_blocks($id, $className); ?>

<div class="container">
    <div class="image-1">
        <div class="image-wrapper ">
            <img src="./../../html/images/sector-expertise-image-2.png" alt="sector-expertise-image-2">
        </div>
        <p class="paragraph-1 ">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Cras mattis consectetur purus sit amet fermentum.</p>
    </div>
</div>

</section>
<!-- endregion Zephyr's Block -->
