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
        <div class="circle-shape-1">
            <img alt="testimonial-shape-1"
                 src="<?php echo get_template_directory_uri() ?>/assets/images/testimonial-shape-1.png">
        </div>
        <div class="circle-shape-2">
            <img alt="testimonial-shape-2"
                 src="<?php echo get_template_directory_uri() ?>/assets/images/testimonial-shape-2.png">
        </div>
        <div class="testimonials swiper-container">
            <div class="swiper-wrapper">
                <?php if (have_rows('testimonial_card')) {
                    while (have_rows('testimonial_card')) {
                        the_row();
                        $text = get_sub_field('text');
                        $client_name = get_sub_field('client_name');
                        $client_image = get_sub_field('client_image');
                        $client_job = get_sub_field('client_job');
                        ?>
                        <div class="testimonial swiper-slide">
                            <div class="testimonials-description">
                               <?php if($text){ ?>
                                <div class="des-p real-line-up">
                                    <?php echo $text; ?>
                                </div>
                            <?php } ?>
                            </div>
                            <div class="image-content center">
                                <?php if ($client_image) { ?>
                                    <img alt="<?php echo $client_image['alt']; ?>"
                                         src="<?php echo $client_image['url']; ?>">
                                <?php } ?>
                                <h4 class="name iv-st-from-bottom wu"><?php echo $client_name; ?></h4>
                                <?php if ($client_job) { ?><h5
                                        class="job-title iv-st-from-bottom wu"><?php echo $client_job; ?></h5> <?php } ?>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
            <div class="swiper-pagination small-pagination"></div>
        </div>
    </div>
</div>

</section>
<!-- endregion Zephyr's Block -->
