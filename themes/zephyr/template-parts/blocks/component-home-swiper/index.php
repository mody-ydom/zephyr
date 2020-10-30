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
?>
<!-- region Zephyr's Block -->
<?php general_settings_for_blocks($id, $className); ?>
<div class="container iv-st-from-bottom">
  <div class="home-swiper-container swiper-container">
    <div class="swiper-wrapper">
		<?php while (have_rows('swiper_card')) {
	        the_row();
	        $main_image       = get_sub_field( 'image' );
	        $title            = get_sub_field( 'title' );
	        $content          = get_sub_field( 'content' );
	        $background_color = get_sub_field( 'background_color' );
	        ?>
          <div class="home-swiper swiper-slide d-flex" style="background-color: <?=$background_color?>;">
  
            <div class="left-side">
              <div class="left-side-title">
		          <?php if ( $title ) { ?>
                    <h6 class="headline-6 normal"><?=$title;?></h6>
		          <?php } ?>
		          <?php if ( $content ) { ?>
                <h5 class="sub-title"><?=$content;?></h5>
	          <?php } ?>
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
                        <img alt="<?=$image['alt']; ?>"
                             src="<?=$image['url']; ?>" />
                        <div class="category-wrapper">
                          <div class="category-title">
                            <?php if ($block_title) { ?>
                              <h3 class="small-headline"><?=$block_title;?></h3>
                            <?php } ?>
                            <div class="icons">
                              <span class="plus icon">+</span>
                              <span class="minus icon">-</span>
                            </div>
                          </div>
                          <div class="category-content">
                            <?php if ($block_text) { ?>
                              <p class="paragraph-1"><?=$block_text;?></p>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              <?php } ?>
            </div>
  
            <div class="right-side">
              <div class="image-wrapper">
                <img alt="<?=$main_image['alt'];?>"
                     src="<?=$main_image['url'];?>"/>
              </div>
            </div>
  
          </div>
        <?php } ?>
    </div>
    <div class="swiper-pagination small-pagination"></div>
  </div>
</div>
</section>
<!-- endregion Zephyr's Block -->
