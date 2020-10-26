<?php
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'component-cards';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
if (get_field('is_screenshot')) :
    /* Render screenshot for example */
    echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/template-parts/blocks/component-cards/screenshot.png" >';
    return;
endif;

/****************************
 *     Custom ACF Meta      *
 ****************************/
$mobile_description=get_field('mobile_description');
?>
<!-- region Zephyr's Block -->
<?php general_settings_for_blocks($id, $className); ?>
<div class="container">
    <div class="row">
        <?php
        if(have_rows('card_1')){
        while(have_rows('card_1')){
            the_row();
            $image_1=get_sub_field('image_1');
            $description_1=get_sub_field('description_1');
        ?>
        <div class="col-6 card">
            <div class="image-wrapper">
                <img src="<?php echo $image_1['url']; ?>" alt="<?php echo $image_1['alt']; ?>">
            </div>
            <p class="paragraph-1 real-line-up desktop-only">
              <?php echo $description_1; ?>
            </p>
        </div>
          <?php
        }
        }
        ?>
        <?php
        if(have_rows('card_2')){
            while(have_rows('card_2')){
                the_row();
                $image_2=get_sub_field('image_2');
                $description_2=get_sub_field('description_2');
                ?>
                <div class="col-6 card">
                    <div class="image-wrapper">
                        <img src="<?php echo $image_2['url']; ?>" alt="<?php echo $image_2['alt']; ?>">
                    </div>
                    <p class="paragraph-1 real-line-up desktop-only">
                       <?php echo $description_2; ?>
                    </p>
                </div>
                <?php
            }
        }
        ?>

        <div class="col-12 mobile-only">
            <p class="paragraph real-line-up center"><?php echo $mobile_description; ?></p>
        </div>
    </div>
</div>

</section>
<!-- endregion Zephyr's Block -->
