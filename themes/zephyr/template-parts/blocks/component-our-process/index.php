<?php
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'component-our-process';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
if (get_field('is_screenshot')) :
    /* Render screenshot for example */
    echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/template-parts/blocks/component-our-process/screenshot.png" >';
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
    <div class="content">
        <?php if ($title): ?>
            <h5 class="headline-5 center word-up desktop-only"><?php echo $title; ?></h5>
        <?php endif; ?>
        <?php if ($text): ?>
            <h1 class="headline-1">
                <?php echo $text; ?>
            </h1>
        <?php endif; ?>
    </div>

    <svg class="shape aqua" width="195" height="195" viewBox="0 0 195 195" fill="none"
         xmlns="http://www.w3.org/2000/svg">
        <circle opacity="0.900205" cx="97.5" cy="97.5" r="97.5" fill="#C7E4D8"/>
    </svg>

    <svg class="shape orange" width="90" height="90" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="45" cy="45" r="45" fill="#FF9B78"/>
    </svg>

    <svg class="shape pill" width="43" height="80" viewBox="0 0 43 80" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd"
              d="M14.2892 69.4054C10.0831 68.6637 6.24527 66.0811 4.05142 62.0356C0.23388 54.9958 2.84488 46.1945 9.8859 42.3761C20.4939 36.6238 31.216 30.127 41.5842 23.846C47.9567 19.9838 54.546 15.9914 61.1014 12.1748C68.0193 8.14483 76.8984 10.4873 80.9286 17.4093C84.9582 24.3291 82.6153 33.2051 75.6943 37.2355C69.3583 40.9254 62.8781 44.8517 56.6116 48.6482C45.9513 55.1062 34.9291 61.7847 23.71 67.87C20.7155 69.4936 17.4012 69.9541 14.2892 69.4054Z"
              fill="#B8F4E5"/>
    </svg>

    <svg class="shape big-aqua" width="195" height="195" viewBox="0 0 195 195" fill="none"
         xmlns="http://www.w3.org/2000/svg">
        <circle opacity="0.900205" cx="97.5" cy="97.5" r="97.5" fill="#6be3a8"/>
    </svg>

    <img class="shape hand" src="<?php echo get_template_directory_uri(); ?>/assets/images/hand.png" alt="hand-img">
    <img class="shape lines" src="<?php echo get_template_directory_uri(); ?>/assets/images/lines.png" alt="lines-img">

</div>

</section>
<!-- endregion Zephyr's Block -->
