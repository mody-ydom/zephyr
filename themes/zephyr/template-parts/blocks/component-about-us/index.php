<?php
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'component-about-us';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}
if (get_field('is_screenshot')) :
  /* Render screenshot for example */
  echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/template-parts/blocks/component-about-us/screenshot1.png" >';
  return;
endif;

/****************************
 *     Custom ACF Meta      *
 ****************************/
$small_title = get_field('small_title');
$big_title = get_field('big_title');
$block_description = get_field('block_description');
?>
<!-- region Zephyr's Block -->
<?php general_settings_for_blocks($id, $className); ?>
<div class="container">
  <div class="about-us">
    <div class="about-us-title center">
      <?php if ($small_title) { ?><h6 class="headline-6 normal iv-st-from-bottom wu"><?php echo $small_title ?></h6> <?php } ?>
      <?php if ($big_title) { ?> <h2 class="headline-2 iv-st-from-bottom wu"><?php echo $big_title; ?></h2><?php } ?>
      <?php if ($block_description) { ?><p class="paragraph-1 iv-st-from-bottom rlu"><?php echo $block_description; ?></p><?php } ?>
    </div>
    <div class="about-us-content swiper-container">
      <div class="swiper-wrapper row-swiper row">
        <?php
        if (have_rows('blocks')) {
          while (have_rows('blocks')) {
            the_row();
            $image = get_sub_field('image');
            $description = get_sub_field('description');
            $link = get_sub_field('link');
            ?>
            <div class="swiper-slide col-xl-4">
              <div class="about-logo">
                <?php if ($image) { ?>
                  <div class="image-wrapper iv-st-from-bottom">
                    <a href="<?php echo $link; ?>">
                      <img alt="about logo1" src="<?php echo $image['url']; ?>">
                    </a>
                  
                  </div>
                <?php } ?>
                <?php if ($description) { ?>
                  <p class="paragraph-1 iv-st-from-bottom"><?php echo $description; ?></p>
                <?php } ?>
              </div>
            </div>
            <?php
          }
        }
        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <?php if (have_rows('images_blocks')){ ?>
    <div class="about-us-images">
      <?php while (have_rows('images_blocks')) {
        the_row();
        if (get_row_layout() == '1_image') {
          $block_image_1 = get_sub_field('block_image_1');
          $block_image_2 = get_sub_field('block_image_2');
          $block_description = get_sub_field('block_description');
          ?>
          <div class="image-1 image same-image">
            <div class="image-wrapper iv-st-from-bottom">
              <?php if ($block_image_1) { ?>
                <img alt="<?php echo $block_image_1['alt']; ?>" src="<?php echo $block_image_1['url']; ?>"><?php } ?>
            </div>
            <p class="paragraph-1 iv-st-from-bottom rlu"><?php echo $block_description; ?></p>
          </div>
          <?php
        } elseif (get_row_layout() == '2_images') {
          ?>
          <div class="row two-images-block">
          <?php
          while (have_rows('first_image_block')) {
            the_row();
            $first_image_1 = get_sub_field('first_image_1');
            $first_image_2 = get_sub_field('first_image_2');
            $first_description = get_sub_field('first_description');
            $mobile_description = get_sub_field('mobile_description');
            ?>
            <div class="col-12 col-sm-6">
              <div class="image-2 row-images image">
                <div class="image-wrapper iv-st-from-bottom">
                  <?php if ($first_image_1) { ?>
                    <img alt="<?php echo $first_image_1['alt'] ?>" src="<?php echo $first_image_1['url']; ?>"><?php } ?>
                </div>
                <?php if ($first_description) { ?>
                  <p class="paragraph-1 iv-st-from-bottom rlu mt-5"><?php echo $first_description; ?></p>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
          <?php while (have_rows('second_image_block')) {
            the_row();
            $second_image_1 = get_sub_field('second_image_1');
            $second_image_2 = get_sub_field('second_image_2');
            $second_description = get_sub_field('second_description');
            $mobile_description = get_sub_field('mobile_description');
          }
          ?>
          <div class="col-12 col-sm-6">
            <div class=" row-images image">
              <div class="image-wrapper iv-st-from-bottom">
                <?php if ($second_image_1) { ?>
                  <img alt="<?php echo $second_image_1['alt']; ?>" src="<?php echo $second_image_1['url']; ?>">
                <?php } ?>
                <?php if ($second_image_2) { ?>
                  <img alt="<?php echo $second_image_2['alt']; ?>" class="logo" src="<?php echo $second_image_2; ?>">
                <?php } ?>
              </div>
              <?php if ($second_description) { ?>
                <p class="paragraph-1 iv-st-from-bottom rlu mt-5"><?php echo $second_description; ?></p>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
        </div>
        <?php
      }
      }
      ?>
    </div>
    
    </section>
    <!-- endregion Zephyr's Block -->
