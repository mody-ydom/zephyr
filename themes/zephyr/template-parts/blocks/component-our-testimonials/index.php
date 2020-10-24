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
    <div class="testimonials-wrapper">
        <div class="circle-shape-1 iv-st-from-bottom">
            <img alt="testimonial-shape-1" src="./../../html/images/testimonial-shape-1.png">
        </div>
        <div class="circle-shape-2 iv-st-from-bottom">
            <img alt="testimonial-shape-2" src="./../../html/images/testimonial-shape-2.png">
        </div>
        <div class="testimonials swiper-container">
            <div class="swiper-wrapper">
                <div class="testimonial swiper-slide">
                    <div class="testimonials-description">
                        <p class="des-p real-line-up">‘Zephyr have played a fundamental role in the success of Fully
                            Charged to date. My team are in constant interaction with the zephyr team discussing ongoing
                            marketing
                            campaigns, optimising our ecommerce store and much more’
                        </p>
                    </div>
                    <div class="image-content center">
                        <img class="iv-st-from-bottom" alt="testimonial-image"
                             src="./../../html/images/testimonial-image.png">
                        <h4 class="name word-up">Ben Jaconelli</h4>
                        <h5 class="job-title word-up">CEO of Fully Charged</h5>
                    </div>
                </div>
                <div class="testimonial swiper-slide">
                    <div class="testimonials-description">
                        <p class="des-p real-line-up">‘Zephyr have played a fundamental role in the success of Fully
                            Charged to date. My team are in constant interaction with the zephyr team discussing ongoing
                            marketing
                            campaigns, optimising our ecommerce store and much more’
                        </p>
                    </div>
                    <div class="image-content center">
                        <img class="iv-st-from-bottom" alt="testimonial-image"
                             src="./../../html/images/testimonial-image.png">
                        <h4 class="name word-up">Ben Jaconelli</h4>
                        <h5 class="job-title word-up">CEO of Fully Charged</h5>
                    </div>
                </div>
                <div class="testimonial swiper-slide">
                    <div class="testimonials-description">
                        <p class="des-p real-line-up">‘Zephyr have played a fundamental role in the success of Fully
                            Charged to date. My team are in constant interaction with the zephyr team discussing ongoing
                            marketing
                            campaigns, optimising our ecommerce store and much more’
                        </p>
                    </div>
                    <div class="image-content center">
                        <img class="iv-st-from-bottom" alt="testimonial-image"
                             src="./../../html/images/testimonial-image.png">
                        <h4 class="name word-up">Ben Jaconelli</h4>
                        <h5 class="job-title word-up">CEO of Fully Charged</h5>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination small-pagination"></div>
        </div>
    </div>
</div>

</section>
<!-- endregion Zephyr's Block -->
