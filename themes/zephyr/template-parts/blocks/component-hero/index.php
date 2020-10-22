<?php
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'component-hero';
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
$block_title = get_field('block_title');
$block_subtitle = get_field('block_subtitle');

?>
<!-- region Zephyr's Block -->
<?php general_settings_for_blocks($id, $className); ?>
<div class="container">
    <div class="our-journey">
        <div class="our-journey-title center">
            <?php if ($block_title) { ?><h6 class="headline-6 normal word-up"><?= $block_title ?></h6><?php } ?>
            <?php if ($block_subtitle) { ?><h2 class="headline-2 word-up"><?= $block_subtitle ?></h2><?php } ?>
        </div>
        <div class="our-journey-content swiper-container">
            <div class="swiper-wrapper row row-swiper">
                <?php while (have_rows('journey_boxes')):the_row();
                    $top_title = get_sub_field('top_title');
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    $background_color = get_sub_field('background_color'); ?>
                    <div class="swiper-slide iv-st-from-bottom col-xl-4">
                        <div class="journey-box center"
                             style="background: <?= $background_color ? $background_color : '#cce7dc'; ?>">
                            <h6 class="headline-6 word-up"><?= $top_title ?></h6>
                            <img class="iv-st-from-bottom" src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>">
                            <h3 class="small-headline word-up"><?= $title ?></h3>
                            <div class="paragraph-1 real-line-up">
                                <?= $text ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

            </div>
            <div class="swiper-control">
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next">
                    <svg fill="none" height="24" viewBox="0 0 20 24" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.249997 22.6506L19 11.8253L0.249998 0.999999" stroke="black"/>
                    </svg>
                </div>
                <div class="swiper-button-prev">
                    <svg fill="none" height="24" viewBox="0 0 20 24" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.75 1.34937L1 12.1747L19.75 23" stroke="black"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- endregion Zephyr's Block -->
