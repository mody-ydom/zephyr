<?php
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'component-increase';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
if (get_field('is_screenshot')) :
    /* Render screenshot for example */
    echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/template-parts/blocks/component-increase/screenshot.png" >';
    return;
endif;

/****************************
 *     Custom ACF Meta      *
 ****************************/
?>
<!-- region Zephyr's Block -->
<?php general_settings_for_blocks($id, $className); ?>
<div class="container">
    <div class="increase-container swiper-container">
        <div class="row row-swiper swiper-wrapper">
            <?php while(have_rows('expertise')):
                the_row();
            $title=get_sub_field('title');
            $description=get_sub_field('description');
            ?>
            <div class="col-xl-4 swiper-slide">
                <div class="increase-content center">
              <?php if($title){?>
                    <h4 class="headline-4 word-up"><?php echo $title; ?></h4>
                    <?php } ?>
                    <?php if($description){ ?>
                    <p class="paragraph-1 word-up"><?php echo $description; ?></p>
                    <?php } ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

</section>
<!-- endregion Zephyr's Block -->
