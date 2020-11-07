<?php
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'component-image-gallery';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}
if (get_field('is_screenshot')) :
  /* Render screenshot for example */
  echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/template-parts/blocks/component-image-gallery/screenshot1.png" >';
  
  return;
endif;

/****************************
 *     Custom ACF Meta      *
 ****************************/
$images = get_field('images');
?>
<!-- region Zephyr's Block -->
<?php general_settings_for_blocks($id, $className); ?>
<div class="container">
  <div class="images-grid">
    <?php while (have_rows('images')):
    the_row(); ?>
    <?php
    $full_width = get_sub_field('full_width');
    $background_image = get_sub_field('background_image');
    $image = get_sub_field('image');
    $image_left = get_sub_field('image_left');
    $image_right = get_sub_field('image_right');
    $small_title = get_sub_field('small_title');
    $large_title = get_sub_field('large_title');
    $description = get_sub_field('description');
    $link = get_sub_field('link');
    $video_or_image = get_sub_field('video_or_image');
    $video = get_sub_field('video');
    $video_file = $video['video_file'];
    $video_poster_image = $video['video_poster_image'];
    $video_aspect_ratio = $video['video_aspect_ratio'];
    $is_autoplay = $video['is_autoplay'];
    ?>
    <div class="grid-item <?=$full_width ? 'full-width' : 'not-full-width'?>"
    ">
    <div class="image-item-container <?=$full_width ? 'full-width' : 'not-full-width'?>">
      <?php if ($link){ ?><a href="<?=$link?>"> <?php } ?>
        <div  class="image-wrapper <?=$full_width ? 'full-width' : ''?> <?=!$full_width && !$image ? 'pt-0' : ''?>">
          <?php if ($video_or_image === 'image') { ?>
            <?php if ($background_image) { ?>
              <img class="bg" src="<?=$background_image['url']?>" alt="<?=$background_image['alt']?>">
            <?php } ?>
            <?php if (!$full_width && $image) { ?>
              <img data-parallax-factor=".2" class="left" src="<?=$image['url']?>" alt="<?=$image['alt']?>">
            <?php } ?>
            <?php if ($full_width && $image_left) { ?>
              <img
                data-parallax-factor=".2"
                style="width: <?=$image_left['width']?>%;
                  left:<?=$image_left['left_space']?>%;
                <?=get_vertical_style($image_left['vertical_position'])?>"
                class="left"
                src="<?=$image_left['image']['url']?>"
                alt="<?=$image_left['image']['alt']?>">
            <?php } ?>
            <?php if ($full_width && $image_right) { ?>
              <img
                data-parallax-factor=".2"
                style="width: <?=$image_right['width']?>%;
                  right:<?=$image_right['right_space']?>%;
                <?=get_vertical_style($image_right['vertical_position'])?>"
                class="right"
                src="<?=$image_right['image']['url']?>"
                alt="<?=$image_right['image']['alt']?>">
            <?php } ?>
          <?php } ?>
          <?php if ($video_or_image === 'video') { ?>
            
            <div class="video-image" <?php if(!$full_width){ ?> style="padding-top: <?=100 / $video_aspect_ratio ? $video_aspect_ratio : '70'?>%;" <?php }else{ ?> style="height: 100%; width: 100%; position: absolute; top: 0; left: 0;" <?php }?>>
              
              <video <?=$is_autoplay ? 'autoplay muted scroll-play-video loop' : '';?> playsinline poster="<?=$video_poster_image['url']?>" src="<?=$video_file?>"
                                                                                       title="<?=$video_poster_image['alt']?>"></video>
              <?php if (!$is_autoplay) { ?>
                <svg class="play-video" height="80" viewBox="0 0 65 80" width="65" xmlns="http://www.w3.org/2000/svg">
                  <defs>
                    <style>
                        .a-hero-video {
                            fill: none;
                            mix-blend-mode: multiply;
                            isolation: isolate;
                        }
                        
                        .b-hero-video {
                            fill: none;
                            stroke: #1b1c30;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                            stroke-width: 3px;
                        }</style>
                  </defs>
                  <circle class="a-hero-video pause" cx="57" cy="57" r="57"/>
                  <rect class="b-hero-video pause" height="70" width="25" x="5" y="3"/>
                  <rect class="b-hero-video pause" height="70" width="25" x="40" y="3"/>
                  <path class="b-hero-video play" d="M7.5,4.5,65.546,41.815,7.5,79.13Z"/>
                </svg>
              <?php } ?>
            
            </div>
          
          <?php } ?>
        </div>
        <?php if ($link){ ?></a> <?php } ?>
      <div class="content">
        <?php
        if ($small_title) { ?>
          <h5 class="small-title headline-5"><?=$small_title?></h5>
        <?php }
        if ($large_title) { ?>
          <h4 class="large-title headline-4"><?=$large_title?></h4>
        <?php }
        if ($description) { ?>
          <p class="description paragraph-1"><?=$description?></p>
        <?php } ?>
      </div>
    </div>
  </div>
  
  <?php endwhile; ?>
</div>
</div>
</section>
<!-- endregion Zephyr's Block -->
