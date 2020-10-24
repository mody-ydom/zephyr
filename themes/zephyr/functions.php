<?php

/**
 * Zephyr functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Zephyr
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

if (!function_exists('half_serious_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function half_serious_setup()
    {
        /*
       * Make theme available for translation.
       * Translations can be filed in the /languages/ directory.
       * If you're building a theme based on Zephyr, use a find and replace
       * to change 'Zephyr' to the name of your theme in all the template files.
       */
        load_theme_textdomain('zephyr', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
       * Let WordPress manage the document title.
       * By adding theme support, we declare that this theme does not use a
       * hard-coded <title> tag in the document head, and expect WordPress to
       * provide it for us.
       */
        add_theme_support('title-tag');

        /*
       * Enable support for Post Thumbnails on posts and pages.
       *
       * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
       */
        add_theme_support('post-thumbnails');

        /*
       * Switch default core markup for search form, comment form, and comments
       * to output valid HTML5.
       */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
    }
endif;
add_action('after_setup_theme', 'half_serious_setup');

/**
 * Enqueue scripts and styles.
 */
function half_serious_scripts()
{
    wp_enqueue_style('Zephyr', get_template_directory_uri() . '/assets/main.css', []);
    wp_enqueue_script('Zephyr', get_template_directory_uri() . '/assets/main.js', [], null, true);
    wp_deregister_script('autosave');

}

//add_action('admin_enqueue_scripts', 'half_serious_scripts');
add_action('wp_enqueue_scripts', 'half_serious_scripts');

add_action('init', 'add_admin_style_to_post_page_only');
function add_admin_style_to_post_page_only()
{
    global $pagenow;

    if ('post.php' == $pagenow || 'post-new.php' == $pagenow || isset($_GET['post'])) {
        wp_enqueue_style('admin-css', get_template_directory_uri() . '/admin.css', []);
    }
}

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

/**
 * Make a small-wysiwyg version
 */
add_action('admin_head', 'admin_styles');
function admin_styles()
{
    ?>
    <style>
        .small-field .acf-editor-wrap iframe,
        .small-field .acf-editor-wrap.delay .wp-editor-area {
            min-height: 0 !important;
            height: 100px !important;
        }

        .wp-block-freeform.block-library-rich-text__tinymce p {
            min-height: 2vh;
            margin: 0 !important;
        }
    </style>
    <?php
}


add_action('admin_footer', 'change_blocks_names');
function change_blocks_names()
{
    ?>
    <script>
        var $ = jQuery;
        $(window).on('load', function () {
            setTimeout(function () {
                $('.a7a-accordion > .acf-accordion-title label').each(function () {
                    $(this).text($(this).closest('.wp-block').attr('aria-label').replace('Block: ', ''));
                });
            }, 2000);
        });
        $('body').on('click', '.block-editor-block-types-list__list-item button, .components-toolbar button,.components-menu-group button', function () {
            setTimeout(function () {
                $('.a7a-accordion > .acf-accordion-title label').each(function () {
                    $(this).text($(this).closest('.wp-block').attr('aria-label').replace('Block: ', ''));
                });
            }, 400);
        });
    </script>
    <?php
}


function my_plugin_block_categories($categories)
{
    return array_merge($categories, array(
        array(
            'slug' => 'zephyr-home',
            'title' => __('Zephyr Home', 'zephyr'),
            'icon' => 'welcome-learn-more',
        ),
    ));
}

add_filter('block_categories', 'my_plugin_block_categories');
function register_acf_block_types()
{
    $developing = true;
    acf_register_block_type(array(
        'name' => 'component-our-journey',
        'title' => __('Component Our Journey'),
        'render_template' => 'template-parts/blocks/component-our-journey/index.php',
        'enqueue_style' => $developing ? '' : get_template_directory_uri() . '/template-parts/blocks/component-our-journey/style.css',
        'category' => 'zephyr-home',
        'icon' => 'admin-appearance',
        'mode' => 'preview',
        'example' => [
            'attributes' => [
                'mode' => 'preview',
                'data' => [
                    'is_screenshot' => true,
                ],
            ]
        ]
    ));

    acf_register_block_type(array(
        'name' => 'component-hero',
        'title' => __('Component Hero'),
        'render_template' => 'template-parts/blocks/component-hero/index.php',
        'enqueue_style' => $developing ? '' : get_template_directory_uri() . '/template-parts/blocks/component-hero/style.css',
        'category' => 'zephyr-home',
        'icon' => 'admin-appearance',
        'mode' => 'preview',
        'example' => [
            'attributes' => [
                'mode' => 'preview',
                'data' => [
                    'is_screenshot' => true,
                ],
            ]
        ]
    ));

    acf_register_block_type(array(
        'name' => 'component-case-studies',
        'title' => __('Component Case Studies'),
        'render_template' => 'template-parts/blocks/component-case-studies/index.php',
        'enqueue_style' => $developing ? '' : get_template_directory_uri() . '/template-parts/blocks/component-case-studies/style.css',
        'category' => 'zephyr-home',
        'icon' => 'admin-appearance',
        'mode' => 'preview',
        'example' => [
            'attributes' => [
                'mode' => 'preview',
                'data' => [
                    'is_screenshot' => true,
                ],
            ]
        ]
    ));

    acf_register_block_type(array(
        'name' => 'component-grid-images',
        'title' => __('Component Grid Images'),
        'render_template' => 'template-parts/blocks/component-grid-images/index.php',
        'enqueue_style' => $developing ? '' : get_template_directory_uri() . '/template-parts/blocks/component-grid-images/style.css',
        'category' => 'zephyr-home',
        'icon' => 'admin-appearance',
        'mode' => 'preview',
        'example' => [
            'attributes' => [
                'mode' => 'preview',
                'data' => [
                    'is_screenshot' => true,
                ],
            ]
        ]
    ));

    acf_register_block_type(array(
        'name' => 'component-logo',
        'title' => __('Component Logo'),
        'render_template' => 'template-parts/blocks/component-logo/index.php',
        'enqueue_style' => $developing ? '' : get_template_directory_uri() . '/template-parts/blocks/component-logo/style.css',
        'category' => 'zephyr-home',
        'icon' => 'admin-appearance',
        'mode' => 'preview',
        'example' => [
            'attributes' => [
                'mode' => 'preview',
                'data' => [
                    'is_screenshot' => true,
                ],
            ]
        ]
    ));

    acf_register_block_type(array(
        'name' => 'component-our-process',
        'title' => __('Component Our Process'),
        'render_template' => 'template-parts/blocks/component-our-process/index.php',
        'enqueue_style' => $developing ? '' : get_template_directory_uri() . '/template-parts/blocks/component-our-process/style.css',
        'category' => 'zephyr-home',
        'icon' => 'admin-appearance',
        'mode' => 'preview',
        'example' => [
            'attributes' => [
                'mode' => 'preview',
                'data' => [
                    'is_screenshot' => true,
                ],
            ]
        ]
    ));
}

// Check if function exists and hook into setup.
if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types');
}


/*General Settings For Blocks*/
function general_settings_for_blocks($id, $className)
{
    $padding_top = get_field('section_settings')['padding_top'];
    $padding_bottom = get_field('section_settings')['padding_bottom'];
    $margin_top = get_field('section_settings')['margin_top'];
    $margin_bottom = get_field('section_settings')['margin_bottom'];
    $background_image = get_field('section_settings')['background_image'];
    $background_color = get_field('section_settings')['background_color'];
    $overlay_color = get_field('section_settings')['overlay_color'];

    $style = $padding_top == 999 ? '' : 'padding-top:' . $padding_top . 'px!important;';
    $style .= $padding_bottom == 999 ? '' : 'padding-bottom:' . $padding_bottom . 'px!important;';
    $style .= $margin_top == 999 ? '' : 'margin-top:' . $margin_top . 'px!important;';
    $style .= $margin_bottom == 999 ? '' : 'margin-bottom:' . $margin_bottom . 'px!important;';
    $style .= !$background_image ? '' :
        ('background-image: url("' . $background_image['url'] . '") !important;' . 'background-position: center;' . 'background-repeat: no-repeat;' . 'background-size: cover;');
    $style .= !$background_color ? '' : 'background-color:' . $background_color . '!important;';
    $style = $style ? "style='$style'" : '';

    $overlay_attr = !$overlay_color ? '' : '<style>#' . $id . ':after{content: "";background:' . $overlay_color . ';}</style>';

    echo '<section ' . $style . ' id="' . esc_attr($id) . '" class="zephyr-block ' . esc_attr($className) . '">';
    echo $overlay_attr;
}

/*to get a valid url, we need to use the below code,
so the user can add a full video link
and we will generate the embed url*/
function generateVideoEmbedUrl($url)
{
    //This is a general function for generating an embed link of an FB/Vimeo/Youtube Video.
    $finalUrl = '';
    if (strpos($url, 'vimeo.com/') !== false) {
        //it is Vimeo video
        $videoId = explode("vimeo.com/", $url)[1];
        if (strpos($videoId, '&') !== false) {
            $videoId = explode("&", $videoId)[0];
        }
        $finalUrl .= 'https://player.vimeo.com/video/' . $videoId;
    } else {
        if (strpos($url, 'youtube.com/') !== false) {
            //it is Youtube video
            $videoId = explode("v=", $url)[1];
            if (strpos($videoId, '&') !== false) {
                $videoId = explode("&", $videoId)[0];
            }
            $finalUrl .= 'https://www.youtube.com/embed/' . $videoId;
        } else {
            if (strpos($url, 'youtu.be/') !== false) {
                //it is Youtube video
                $videoId = explode("youtu.be/", $url)[1];
                if (strpos($videoId, '&') !== false) {
                    $videoId = explode("&", $videoId)[0];
                }
                $finalUrl .= 'https://www.youtube.com/embed/' . $videoId;
            } else {
                //Enter valid video URL
            }
        }
    }

    return $finalUrl;
}


if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}

/*
* Add fonts
* */
add_filter('tiny_mce_before_init', 'wpex_mce_google_fonts_array');
function wpex_mce_google_fonts_array($initArray)
{

    $primary_font = get_field('primary_font_name', 'options');
    $secondary_font = get_field('secondary_font_name', 'options');
    $theme_advanced_fonts = "$primary_font='$primary_font';";
    $theme_advanced_fonts .= "$secondary_font='$secondary_font';";
    while (have_rows('additional_fonts_for_text_editors', 'options')) {
        the_row();
        $font = get_sub_field('font_name');

        $theme_advanced_fonts .= "$font='$font';";
    }
    $theme_advanced_fonts .= "Andale Mono=andale mono,times;" . "Arial=arial,helvetica,sans-serif;" . "Arial Black=arial black,avant garde;" . "Book Antiqua=book antiqua,palatino;" .
        "Comic Sans MS=comic sans ms,sans-serif;" . "Courier New=courier new,courier;" . "Georgia=georgia,palatino;" . "Helvetica=helvetica;" . "Impact=impact,chicago;" . "Symbol=symbol;" .
        "Tahoma=tahoma,arial,helvetica,sans-serif;" . "Terminal=terminal,monaco;" . "Times New Roman=times new roman,times;" . "Trebuchet MS=trebuchet ms,geneva;" . "Verdana=verdana,geneva;" .
        "Webdings=webdings;" . "Wingdings=wingdings,zapf dingbats";
    $initArray['font_formats'] = $theme_advanced_fonts;

    return $initArray;
}

add_action('admin_init', 'wpex_mce_google_fonts_styles');
function wpex_mce_google_fonts_styles()
{
    $primary_font = get_field('primary_font_link', 'options');
    $secondary_font = get_field('secondary_font_link', 'options');
    add_editor_style(str_replace(',', '%2C', $primary_font));
    add_editor_style(str_replace(',', '%2C', $secondary_font));
    while (have_rows('additional_fonts_for_text_editors', 'options')) {
        the_row();
        $font = get_sub_field('font_link');
        add_editor_style(str_replace(',', '%2C', $font));
    }
}

add_action('admin_head-post.php', function () {
    $primary_font = get_field('primary_font_link', 'options');
    $secondary_font = get_field('secondary_font_link', 'options');
    ?>
    <style>
        @import url(<?= $primary_font; ?>);
        @import url(<?= $secondary_font; ?>);
        <?php
        while(have_rows('additional_fonts_for_text_editors','options')){
          the_row();
          $font = get_sub_field('font_link'); ?>
        @import url(<?= $font; ?>);

        <?php } ?>
    </style>
    <?php
});
function my_mce_before_init_insert_formats($init_array)
{

    $style_formats = array(
        array(
            'title' => 'Line 1',
            'block' => 'span',
            'wrapper' => true,
            'styles' => ['line-height' => '1em',],
        ),
        array(
            'title' => 'Line 2',
            'block' => 'span',
            'styles' => ['line-height' => '2em',],
            'wrapper' => true,
        ),
        array(
            'title' => 'Line 3',
            'block' => 'span',
            'styles' => ['line-height' => '3em',],
            'wrapper' => true,
        ),
        array(
            'title' => 'Line 4',
            'block' => 'span',
            'styles' => ['line-height' => '4em',],
            'wrapper' => true,
        ),
        array(
            'title' => 'Line 5',
            'block' => 'span',
            'styles' => ['line-height' => '5em',],
            'wrapper' => true,
        ),
        array(
            'title' => 'Line 6',
            'block' => 'span',
            'styles' => ['line-height' => '6em',],
            'wrapper' => true,
        ),
        array(
            'title' => 'Line 7',
            'block' => 'span',
            'styles' => ['line-height' => '7em',],
            'wrapper' => true,
        ),
        array(
            'title' => 'Line 8',
            'block' => 'span',
            'styles' => ['line-height' => '8em',],
            'wrapper' => true,
        ),
        array(
            'title' => 'Line 9',
            'block' => 'span',
            'styles' => ['line-height' => '9em',],
            'wrapper' => true,
        ),
        array(
            'title' => 'Line 10',
            'block' => 'span',
            'styles' => ['line-height' => '10em',],
            'wrapper' => true,
        ),
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode($style_formats);

    return $init_array;

}

// Attach callback to 'tiny_mce_before_init'
add_filter('tiny_mce_before_init', 'my_mce_before_init_insert_formats');
add_action('admin_footer', 'admin_footer_test', PHP_INT_MAX);
function admin_footer_test()
{
    ?>
    <script>
        window.addEventListener('load', function () {
            setTimeout(function () {
                const a = document.querySelectorAll('.mce-toolbar-grp .mce-btn-has-text .mce-txt');
                for (const item of a) {
                    if (item.innerText.toLowerCase() == 'formats') item.innerText = 'Line Height';
                }
            }, 1000);
        });
    </script>
    <?php
}

add_action('admin_head', 'custom_block_width');
remove_filter('the_content', 'wpautop');

function custom_block_width()
{
    echo '<style>
		.editor-styles-wrapper .wp-block {
			max-width: calc(100% - 32px)!important;
		}
    .block-editor-inserter__preview-container .wp-block{
    	max-width: 100%!important;
    	margin: 0!important;
    }
    .block-editor-inserter__preview-container img{
    	max-width: 100%!important;
    	max-height: 318px!important;
    	object-fit: contain!important;
    }
    .block-editor-block-preview__container.editor-styles-wrapper{
        height: 350px!important;
    }
    .block-editor-inserter__preview-container{
       width: 600px!important;
    }
    div.block-editor-block-preview__content{
    	transform: scale(1)!important;
    	width: calc(100% - 32px)!important;
    }
    .interface-interface-skeleton__sidebar>div{
     width: 100%!important;
    }
    .interface-interface-skeleton__sidebar{
      width: 500px!important;
    }
  </style>';

    ?>
    <script>
        jQuery(window).on('load', function () {

            jQuery('.li-field-name').each(function () {
                const text = jQuery.trim(jQuery(this).text());
                if (text != '') {
                    jQuery('#acf-field-group-locations').append(`$${text} = get_field('${text}'); </br>`);
                }
            });
        });
    </script>

<?php }


add_filter('acf/settings/remove_wp_meta_box', '__return_true');


/**
 * Responsive Image Helper Function
 *
 * @param string $image_id the id of the image (from ACF or similar)
 * @param string $image_size the size of the thumbnail image or custom image size
 * @param string $max_width the max width this image will be shown to build the sizes attribute
 */

function awesome_acf_responsive_image($image_id, $max_width, $image_size)
{

    // check the image ID is not blank
    if ($image_id != '') {

        // set the default src image size
        $image_src = wp_get_attachment_image_url($image_id, $image_size);

        // set the srcset with various image sizes
        $image_srcset = wp_get_attachment_image_srcset($image_id, $image_size);

        // generate the markup for the responsive image
        echo 'src="' . $image_src . '" srcset="' . $image_srcset . '" sizes="(max-width: ' . $max_width . ') 100vw, ' . $max_width . '"';

    }
}

// set the max image width
add_filter('max_srcset_image_width', 'awesome_acf_max_srcset_image_width', 10, 2);
function awesome_acf_max_srcset_image_width()
{
    return 2200;
}


// Remove emojicons from header
function disable_wp_emojicons()
{
    // all actions related to emojis
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
}

add_action('init', 'disable_wp_emojicons');


add_shortcode('zephyr-words', 'hs_words_shortcode');
function hs_words_shortcode($atts)
{
    $atts = shortcode_atts(array(
        'words' => 'Pop'
    ), $atts, 'zephyr-words');
    $frist_word = explode(',', $atts['words'])[0];

    return "<span class='changeable-text' data-text-variations='{$atts['words']}'>$frist_word</span>";
}


//	function custom_post_type() {
//		// Set UI labels for Custom Post Type
//		$labels = array(
//			'name'               => _x( 'Podcasts', 'Post Type General Name', 'zephyr' ),
//			'singular_name'      => _x( 'Podcast', 'Post Type Singular Name', 'zephyr' ),
//			'menu_name'          => __( 'Podcasts', 'zephyr' ),
//			'parent_item_colon'  => __( 'Parent Podcast', 'zephyr' ),
//			'all_items'          => __( 'All Podcasts', 'zephyr' ),
//			'view_item'          => __( 'View Podcast', 'zephyr' ),
//			'add_new_item'       => __( 'Add New Podcast', 'zephyr' ),
//			'add_new'            => __( 'Add New Podcast', 'zephyr' ),
//			'edit_item'          => __( 'Edit Podcast', 'zephyr' ),
//			'update_item'        => __( 'Update Podcast', 'zephyr' ),
//			'search_items'       => __( 'Search Podcast', 'zephyr' ),
//			'not_found'          => __( 'Podcast Not Found', 'zephyr' ),
//			'not_found_in_trash' => __( 'Podcast Not found in Trash', 'zephyr' ),
//		);
//
//		// Set other options for Custom Post Type
//
//		$args = array(
//			'label'               => __( 'podcast', 'zephyr' ),
//			'description'         => __( 'Podcast news and reviews', 'zephyr' ),
//			'labels'              => $labels,
//			'hierarchical'        => false,
//			'supports'            => array(
//				'title',
//				'editor',
//				'thumbnail'
//			),
//			'public'              => true,
//			'show_ui'             => true,
//			'show_in_rest'        => true,
//			'show_in_menu'        => true,
//			'show_in_nav_menus'   => true,
//			'menu_icon'           => 'dashicons-smiley',
//			'show_in_admin_bar'   => true,
//			'menu_position'       => 5,
//			'can_export'          => true,
//			//      'rewrite'             => array('slug' => 'icon'),
//			'has_archive'         => true,
//			'exclude_from_search' => false,
//			'publicly_queryable'  => true,
//			'capability_type'     => 'page',
//		);
//
//		// Registering your Custom Post Type
//		register_post_type( 'podcasts', $args );
//
//	}
//	add_action( 'init', 'custom_post_type', 0 );

function add_custom_taxonomies()
{
    // Add new "Podcast Categories" taxonomy to Posts

    register_taxonomy('podcasts_categories', 'podcasts', array(// Hierarchical taxonomy (like categories)
        'hierarchical' => true,
        // This array of options controls the labels displayed in the WordPress Admin UI
        'labels' => array(
            'name' => _x('Podcast Categories', 'taxonomy general name', 'zephyr'),
            'singular_name' => _x('Podcast Category', 'taxonomy singular name', 'zephyr'),
            'search_items' => __('Search Podcast Categories', 'zephyr'),
            'all_items' => __('All Podcast Categories', 'zephyr'),
            'parent_item' => __('Parent Podcast Category', 'zephyr'),
            'parent_item_colon' => __('Parent Podcast Category:', 'zephyr'),
            'edit_item' => __('Edit Podcast Category', 'zephyr'),
            'update_item' => __('Update Podcast Category', 'zephyr'),
            'add_new_item' => __('Add New Podcast Category', 'zephyr'),
            'new_item_name' => __('New Podcast Category Name', 'zephyr'),
            'menu_name' => __('Podcast Categories', 'zephyr'),
        ),
        'show_in_rest' => true,
        'posts_per_page' => -1,
        // Control the slugs used for this taxonomy
        'rewrite' => false,
        'public' => true,
    ));
}

add_action('init', 'add_custom_taxonomies', 10);


/* Some Extra features & functions */

/* Sub category for categories */
function categoriesPosts($category)
{
    ?>
    <ol class="guide-content">
        <?php
        $args_posts = array(
            'post_type' => 'post',
            'cat' => $category->term_id,
        );
        $query = new WP_Query($args_posts);
        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
            ?>
            <li><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></li>
            <?php
            wp_reset_query();
        endwhile; endif;
        ?>
    </ol>
    <?php
}

/* Get Next Post Title & Link */
function nextPost($post_id)
{
    global $post;
    $oldGlobal = $post;
    $post = get_post($post_id);
    $next_post = get_next_post();
    $post = $oldGlobal;
    if ('' == $next_post) {
        return 0;
    }
    $next_post_id = $next_post->ID;

    if (get_post_status($next_post_id)) {
        ?>
        <a class="next-chapter iv-st-from-bottom" href="<?php echo get_permalink($next_post_id); ?>">
            <h3 class="headline-3">Next Chapter <span>></span></h3>
            <h6 class="headline-8"><?php echo get_the_title($next_post_id); ?></h6>
        </a>
        <?php
    }
}

/* Shortcode for highlight text */
function highlight_text($atts = array(), $content = null)
{
    $a = shortcode_atts(array(
        'color' => ''
    ), $atts);

    $content = '<span style="background-color:rgba(' . $a['color'] . ',0.6)">' . $content . '</span>';
    return $content;
}

add_shortcode('highlight', 'highlight_text');

function gridNumber($number)
{
    switch ($number) {
        case 1 :
            return 'card-one';
            break;
        case 2:
            return 'card-two';
            break;
        case 3:
            return 'card-three';
            break;
        case 4:
            return 'card-four';
            break;
    }


}