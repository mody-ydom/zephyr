<?php
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'home-page-wrapper';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
if (get_field('is_screenshot')) :
    /* Render screenshot for example */
    echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/template-parts/blocks/component-hero/screenshot.png" >';
    return;
endif;

/****************************
 *     Custom ACF Meta      *
 ****************************/
$block_title = get_field('block_title');
$block_subtitle = get_field('block_subtitle');

?>
<!-- region Zephyr's Block -->
<?php general_settings_for_blocks($id, $className); ?>
<section class="component-hero no-bg">
    <div class="hero-image">
        <!--        <img alt="hero" src="-->
        <?php //echo get_template_directory_uri(); ?><!--/assets/images/hero.png">-->
    </div>
    <div class="container">
        <div class="content iv-st-from-bottom">
            <h1 class="headline-1 center">
                We combine cutting edge <span>digital design</span> with data- <span>driven unique insights</span> to
                unlock emerging companies growth potential.
            </h1>
            <a class="btn desktop-only" href="#">Have a project? Let’s connect.</a>
        </div>
        <svg class="circle orange-circle" fill="none" height="90" viewBox="0 0 90 90" width="90"
             xmlns="http://www.w3.org/2000/svg">
            <circle cx="45" cy="45" fill="#FE9572" fill-opacity="0.9" r="45"/>
        </svg>

        <svg class="circle aqua-circle" height="171" viewBox="0 0 171 171" width="171"
             xmlns="http://www.w3.org/2000/svg">
            <g>
                <g>
                    <path d="M171 85.5c0 47.22-38.28 85.5-85.5 85.5S0 132.72 0 85.5 38.28 0 85.5 0 171 38.28 171 85.5z"
                          fill="#8aeed6" fill-opacity=".6"/>
                </g>
            </g>
        </svg>

        <img alt="dark-circle" class="circle dark-circle"
             src="<?php echo get_template_directory_uri(); ?>/assets/images/dark-circle.png">

        <svg class="circle oval" fill="none" height="253" viewBox="0 0 258 253" width="258"
             xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd"
                  d="M145.725 1.12358C120.277 4.83717 96.5096 16.07 74.3481 29.145C39.811 49.5244 5.57066 78.9824 0.607883 118.844C-1.604 136.61 2.40987 154.74 9.57122 171.142C32.9158 224.614 93.2636 260.098 150.906 251.797C208.547 243.497 257.218 190.344 257.984 131.983C258.878 63.7665 222.083 -10.0199 145.725 1.12358Z"
                  fill="#8aeed6"
                  fill-opacity=".6" fill-rule="evenodd"/>
        </svg>
    </div>
    <div class="down">
        <svg fill="none" height="56" viewBox="0 0 24 56" width="24" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0)">
                <path clip-rule="evenodd"
                      d="M2 12V30C2 35.5 6.5 40 12 40C17.5 40 22 35.5 22 30V12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12ZM0 12C0 5.4 5.4 0 12 0C18.6 0 24 5.4 24 12V30C24 36.6 18.6 42 12 42C5.4 42 0 36.6 0 30V12Z"
                      fill="white"
                      fill-rule="evenodd"/>
                <path class="dot" clip-rule="evenodd"
                      d="M11 7V11C11 11.6 11.4 12 12 12C12.6 12 13 11.6 13 11V7C13 6.4 12.6 6 12 6C11.4 6 11 6.4 11 7Z"
                      fill="white" fill-rule="evenodd"/>
                <path clip-rule="evenodd"
                      d="M12 53.0002L17.5 47.5002C17.9 47.1002 18.5 47.1002 18.9 47.5002C19.3 47.9002 19.3 48.5002 18.9 48.9002L12.7 55.1002C12.5 55.3002 12.2 55.4002 12 55.4002C11.8 55.4002 11.5 55.3002 11.3 55.1002L4.99995 48.9002C4.59995 48.5002 4.59995 47.9002 4.99995 47.5002C5.39995 47.1002 5.99995 47.1002 6.39995 47.5002L12 53.0002Z"
                      fill="white"
                      fill-rule="evenodd"/>
            </g>
            <defs>
                <clipPath id="clip0">
                    <rect fill="white" height="55.4" width="24"/>
                </clipPath>
            </defs>
        </svg>
    </div>
</section>

</section>
<!-- endregion Zephyr's Block -->
