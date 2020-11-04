<?php
global $post;
// Create id attribute allowing for custom "anchor" value.
$id = 'contact-us';
//if (!empty($block['anchor'])) {
//  $id = $block['anchor'];
//}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'component-contact-us';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}
if (get_field('is_screenshot')) :
  /* Render screenshot for example */
  echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/template-parts/blocks/component-contact-us/screenshot1.png" >';
  return;
endif;

/****************************
 *     Custom ACF Meta      *
 ****************************/
$title = get_field('title');
$description = get_field('description');
$email = get_field('email');
$phone = get_field('phone');
$address = get_field('address');
$contact_form_shortcode = get_field('contact_us_shortcode');
$form_type = get_field('form_type');
$email_text = get_field('email_text');
$phone_text = get_field('phone_text');
$address_text = get_field('address_text');
$address_link = get_field('address_link');
?>
<!-- region Zephyr's Block -->
<?php general_settings_for_blocks($id, $className) ?>
<div class="container">
  <div class="contact-us-model iv-st-from-bottom <?=$form_type == 'second_option' ? 'in-about-page' : ''?>">
    
    <?php if ($contact_form_shortcode) { ?>
      <div class="data">
        <?=$contact_form_shortcode?>
        <svg class="arrow" width="25" height="40" viewBox="0 0 25 40" fill="none"
             xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M0 20L25 40L25 0L0 20Z" fill="#333333"/>
        </svg>
      </div>
    <?php } ?>
    
    <div class="content">
      <?php if ($title) { ?>
        <h3 class="title-contact "> <?=$title?> </h3>
      <?php } ?>
      <?php if ($description) { ?>
        <div class="paragraph-1  small-fz center">
          <?=$description?>
        </div>
      <?php } ?>
      <div class="contact-info">
        <?php if ($email) { ?>
          <div class="icon-and-info">
            <svg class="desktop-only" width="20" height="14" viewBox="0 0 20 14" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
              <path d="M19.0001 1H1.1001V13.3057H19.0001V1Z" stroke="#252525" stroke-width="1.08"
                    stroke-miterlimit="10"/>
              <path d="M1 1L10.0503 7.99337L18.9 1" stroke="#252525" stroke-width="1.08"
                    stroke-miterlimit="10"/>
              <path d="M1.1001 13.3056L8.73427 6.97803" stroke="#252525" stroke-width="1.08"
                    stroke-miterlimit="10"/>
              <path d="M18.9999 13.3056L11.3657 6.97803" stroke="#252525" stroke-width="1.08"
                    stroke-miterlimit="10"/>
            </svg>
            <svg class="mobile-only" width="18" height="14" viewBox="0 0 20 14" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
              <path d="M18.9996 1H1.09961V13.3057H18.9996V1Z" fill="#6BE3A8" stroke="white"
                    stroke-width="1.08" stroke-miterlimit="10"/>
              <path d="M1 1L10.0503 7.99337L18.9 1" fill="#6BE3A8"/>
              <path d="M1 1L10.0503 7.99337L18.9 1" stroke="white" stroke-width="1.08"
                    stroke-miterlimit="10"/>
              <path d="M1.09961 13.3056L8.73378 6.97803" stroke="white" stroke-width="1.08"
                    stroke-miterlimit="10"/>
              <path d="M19.0004 13.3056L11.3662 6.97803" stroke="white" stroke-width="1.08"
                    stroke-miterlimit="10"/>
            </svg>
            <div class="info">
              <h3 class="text desktop-only"><?=$email_text?></h3>
              <a target="_blank" class="paragraph-1  small-fz"
                 href="mailto:<?=$email?>"><?=$email?></a>
            </div>
          </div>
        <?php } ?>
        <?php if ($address) { ?>
          <div class="icon-and-info location">
            <svg class="desktop-only" width="20" height="23" viewBox="0 0 17 23" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
              <path
                d="M8.58849 11.5276C10.414 11.5276 11.8938 10.0477 11.8938 8.22228C11.8938 6.39682 10.414 4.91699 8.58849 4.91699C6.76303 4.91699 5.2832 6.39682 5.2832 8.22228C5.2832 10.0477 6.76303 11.5276 8.58849 11.5276Z"
                stroke="#252525" stroke-width="1.08" stroke-miterlimit="10"/>
              <path
                d="M8.58803 1C2.11284 1 -0.758283 8.18014 2.71507 13.0214C4.78321 15.9065 7.78505 20.2902 8.58803 21.4713C9.39101 20.2949 12.3928 15.9065 14.461 13.0214C17.9343 8.18014 15.0586 1 8.58803 1Z"
                stroke="#252525" stroke-width="1.08" stroke-miterlimit="10"/>
            </svg>
            <svg class="mobile-only" width="18" height="21" viewBox="0 0 15 21" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
              <path
                d="M7.58754 0C1.11235 0 -1.75877 7.18014 1.71458 12.0214C3.78272 14.9065 6.78456 19.2902 7.58754 20.4713C8.39052 19.2949 11.3924 14.9065 13.4605 12.0214C16.9339 7.18014 14.0581 0 7.58754 0Z"
                fill="#6BE3A8"/>
              <path
                d="M7.58849 10.5276C9.41396 10.5276 10.8938 9.04774 10.8938 7.22228C10.8938 5.39682 9.41396 3.91699 7.58849 3.91699C5.76303 3.91699 4.2832 5.39682 4.2832 7.22228C4.2832 9.04774 5.76303 10.5276 7.58849 10.5276Z"
                fill="white"/>
            </svg>
            <div class="info">
              <h3 class="text desktop-only"><?=$address_text?></h3>
              <a target="_blank" href="<?=$address_link ? $address_link : '#'?>" class="paragraph-1  small-fz"><?=$address?></a>
            </div>
          </div>
        <?php } ?>
        <?php if ($phone) { ?>
          <div class="icon-and-info">
            <svg class="desktop-only" width="20" height="20" viewBox="0 0 20 20" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
              <path
                d="M3.87135 1.01247C3.85473 0.995842 3.82979 0.995842 3.81317 1.01247L1.00772 3.81913C0.691845 9.97713 10.1431 18.9335 16.1821 19L18.9875 16.1933C19.0042 16.1767 19.0042 16.1518 18.9875 16.1351L14.4947 11.6403C14.478 11.6237 14.4531 11.6237 14.4365 11.6403L12.2877 13.79C10.6626 13.711 6.44821 9.20374 6.21962 7.71934L8.36839 5.56965C8.38501 5.55301 8.38501 5.52807 8.36839 5.51143L3.87135 1.01247Z"
                stroke="#252525" stroke-width="1.08" stroke-miterlimit="10"/>
            </svg>
            <svg class="mobile-only" width="18" height="18" viewBox="0 0 18 18" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
              <path
                d="M2.87135 0.012474C2.85473 -0.004158 2.82979 -0.004158 2.81317 0.012474L0.00771825 2.81913C-0.308155 8.97713 9.14309 17.9335 15.1821 18L17.9875 15.1933C18.0042 15.1767 18.0042 15.1518 17.9875 15.1351L13.4947 10.6403C13.478 10.6237 13.4531 10.6237 13.4365 10.6403L11.2877 12.79C9.66262 12.711 5.44821 8.20374 5.21962 6.71934L7.36839 4.56965C7.38501 4.55301 7.38501 4.52807 7.36839 4.51143L2.87135 0.012474Z"
                fill="#6BE3A8"/>
            </svg>
            <div class="info">
              <h3 class="text desktop-only"><?=$phone_text?></h3>
              <a target="_blank" class="paragraph-1  small-fz" href="tel:<?=$phone?>"><?=$phone?></a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  
  </div>
</div>
</section>
<!--endregion Zephyr's Block -->
