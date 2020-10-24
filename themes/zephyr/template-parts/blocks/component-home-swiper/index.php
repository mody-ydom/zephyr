<?php
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'component-home-swiper';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
if (get_field('is_screenshot')) :
    /* Render screenshot for example */
    echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/template-parts/blocks/component-home-swiper/screenshot.png" >';
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
    <div class="home-swiper-container swiper-container">
        <div class="swiper-wrapper">

            <div class="home-swiper swiper-slide d-flex">
                <?php if (have_rows('left_side')) {
                    while (have_rows('left_side')) {
                        the_row();
                        $title = get_sub_field('title');
                        $content = get_sub_field('content');
                        ?>
                        <div class="left-side iv-st-from-bottom">
                            <div class="left-side-title">
                                <h6 class="headline-6 normal word-up"><?php echo $title; ?></h6>
                                <h5 class="sub-title real-line-up"><?php echo $content; ?></h5>
                            </div>
                            <?php if (have_rows('blocks')) {
                                ?>
                                <div class="row">
                                    <?php while (have_rows('blocks')) {
                                        the_row();
                                        $image = get_sub_field('image');
                                        $block_title = get_sub_field('block_title');
                                        $block_text = get_sub_field('block_text');
                                        ?>
                                        <div class="col-12 col-md-6">
                                            <div class="categories">
                                                <svg class="iv-st-from-bottom" fill="none" height="32"
                                                     viewBox="0 0 32 32"
                                                     width="32"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                            d="M15.9963 30.9995C24.2826 30.9995 31 24.2822 31 15.9959C31 7.70956 24.2826 0.992188 15.9963 0.992188C7.71005 0.992188 0.992676 7.70956 0.992676 15.9959C0.992676 24.2822 7.71005 30.9995 15.9963 30.9995Z"
                                                            stroke="#252525" stroke-miterlimit="10"
                                                            stroke-width="1.08"></path>
                                                    <path
                                                            d="M6.27878 18.9892C7.53172 18.9892 8.54743 17.9735 8.54743 16.7206C8.54743 15.4676 7.53172 14.4519 6.27878 14.4519C5.02584 14.4519 4.01013 15.4676 4.01013 16.7206C4.01013 17.9735 5.02584 18.9892 6.27878 18.9892Z"
                                                            stroke="#252525" stroke-miterlimit="10"
                                                            stroke-width="1.08"></path>
                                                    <path d="M12.3195 8.36972L16.5913 4.0979" stroke="#252525"
                                                          stroke-miterlimit="10"
                                                          stroke-width="1.08"></path>
                                                    <path d="M12.3195 4.0979L16.5913 8.36972" stroke="#252525"
                                                          stroke-miterlimit="10"
                                                          stroke-width="1.08"></path>
                                                    <path d="M23.4852 18.9884L27.757 14.7166" stroke="#252525"
                                                          stroke-miterlimit="10"
                                                          stroke-width="1.08"></path>
                                                    <path d="M23.4852 14.7166L27.757 18.9884" stroke="#252525"
                                                          stroke-miterlimit="10"
                                                          stroke-width="1.08"></path>
                                                    <path d="M7.05054 10.9443C15.4011 11.596 22.022 17.3802 22.022 25.7549"
                                                          stroke="#252525" stroke-miterlimit="10"
                                                          stroke-width="1.08"></path>
                                                    <path d="M18.1198 22.5286L22.0135 26.3418L25.9072 22.5286"
                                                          stroke="#252525"
                                                          stroke-miterlimit="10" stroke-width="1.08"></path>
                                                    <path d="M7.05054 23.4781C15.4011 22.8264 22.022 17.0422 22.022 8.66748"
                                                          stroke="#252525" stroke-miterlimit="10"
                                                          stroke-width="1.08"></path>
                                                    <path d="M18.12 11.8931L22.0137 8.08789L25.9074 11.8931"
                                                          stroke="#252525"
                                                          stroke-miterlimit="10" stroke-width="1.08"></path>
                                                </svg>
                                                <div class="category-wrapper">
                                                    <div class="category-title">
                                                        <h3 class="small-headline word-up"><?php echo $block_title; ?></h3>
                                                        <div class="icons">
                                                            <span class="plus icon">+</span>
                                                            <span class="minus icon">-</span>
                                                        </div>
                                                    </div>
                                                    <div class="category-content">
                                                        <p class="paragraph-1 iv-st-from-bottom"><?php echo $block_text; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php }
                } ?>
                <?php if (have_rows('right_side')) {
                    while (have_rows('right_side')) {
                        the_row();
                        $image = get_sub_field('image');
                        ?>
                        <div class="right-side">
                            <div class="image-wrapper iv-st-from-bottom">
                                <img alt="<?php echo $image['alt']; ?>"
                                     src="<?php echo $image['url']; ?>">
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
        <div class="swiper-pagination small-pagination"></div>
    </div>
</div>
</section>
<!-- endregion Zephyr's Block -->
