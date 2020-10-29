<?php
	// Create id attribute allowing for custom "anchor" value.
	$id = $block['id'];
	if ( ! empty( $block['anchor'] ) ) {
		$id = $block['anchor'];
	}
	
	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'component-image-gallery';
	if ( ! empty( $block['className'] ) ) {
		$className .= ' ' . $block['className'];
	}
	if ( ! empty( $block['align'] ) ) {
		$className .= ' align' . $block['align'];
	}
	if ( get_field( 'is_screenshot' ) ) :
		/* Render screenshot for example */
		echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/template-parts/blocks/component-image-gallery/screenshot.png" >';
		
		return;
	endif;
	
	/****************************
	 *     Custom ACF Meta      *
	 ****************************/
	$images = get_field( 'images' );
?>
<!-- region Zephyr's Block -->
<?php general_settings_for_blocks( $id, $className ); ?>
<div class="container">
  <div class="images-grid">
	  <?php while ( have_rows( 'images' ) ):
		  the_row(); ?>
	  <?php
		  $full_width       = get_sub_field( 'full_width' );
		  $background_image = get_sub_field( 'background_image' );
		  $image            = get_sub_field( 'image' );
		  $image_left       = get_sub_field( 'image_left' );
		  $image_right      = get_sub_field( 'image_right' );
		  $small_title      = get_sub_field( 'small_title' );
		  $large_title      = get_sub_field( 'large_title' );
		  $description      = get_sub_field( 'description' );
	  ?>
    <div class="grid-item <?=$full_width ? 'full-width' : 'not-full-width'?>"
    ">
    <div class="image-item-container <?=$full_width ? 'full-width' : 'not-full-width'?>">
      <div class="image-wrapper <?=$full_width ? 'full-width' : ''?> <?=! $full_width && ! $image ? 'pt-0' : ''?>">
		  <?php if ( $background_image ) { ?>
            <img class="bg" src="<?=$background_image['url']?>" alt="<?=$background_image['alt']?>">
		  <?php } ?>
		  <?php if ( ! $full_width && $image ) { ?>
            <img class="left" src="<?=$image['url']?>" alt="<?=$image['alt']?>">
		  <?php } ?>
		  <?php if ( $full_width && $image_left ) { ?>
            <img
              style="width: <?=$image_left['width']?>%;
                left:<?=$image_left['left_space']?>%;
			  <?=get_vertical_style( $image_left['vertical_position'] )?>"
              class="left"
              src="<?=$image_left['image']['url']?>"
              alt="<?=$image_left['image']['alt']?>">
		  <?php } ?>
		  <?php if ( $full_width && $image_right ) { ?>
            <img
              style="width: <?=$image_right['width']?>%;
                right:<?=$image_right['right_space']?>%;
			  <?=get_vertical_style( $image_right['vertical_position'] )?>"
              class="right"
              src="<?=$image_right['image']['url']?>"
              alt="<?=$image_right['image']['alt']?>">
		  <?php } ?>
      </div>
      <div class="content">
		  <?php
			  if ( $small_title ) { ?>
                <h5 class="small-title word-up headline-5"><?=$small_title?></h5>
			  <?php }
			  if ( $large_title ) { ?>
                <h4 class="large-title word-up headline-4"><?=$large_title?></h4>
			  <?php }
			  if ( $description ) { ?>
                <p class="description real-line-up paragraph-1"><?=$description?></p>
			  <?php } ?>
      </div>
    </div>
  </div>
	
	<?php endwhile; ?>
</div>
</div>
</section>
<!-- endregion Zephyr's Block -->
