<?php
	
	/**
	 * Zephyr functions and definitions
	 *
	 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
	 *
	 * @package Zephyr
	 */
	
	if ( ! defined( '_S_VERSION' ) ) {
		// Replace the version number of the theme on each release.
		define( '_S_VERSION', '1.0.0' );
	}
	
	if ( ! function_exists( 'half_serious_setup' ) ) :
		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 */
		function half_serious_setup() {
			/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Zephyr, use a find and replace
	 * to change 'Zephyr' to the name of your theme in all the template files.
	 */
			load_theme_textdomain( 'zephyr', get_template_directory() . '/languages' );
			
			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );
			
			/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
			add_theme_support( 'title-tag' );
			
			/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
			add_theme_support( 'post-thumbnails' );
			
			/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
			add_theme_support( 'html5',
			                   array(
				                   'search-form',
				                   'comment-form',
				                   'comment-list',
				                   'gallery',
				                   'caption',
			                   ) );
		}
	endif;
	add_action( 'after_setup_theme', 'half_serious_setup' );
	
	/**
	 * Enqueue scripts and styles.
	 */
	function half_serious_scripts() {
		wp_enqueue_style( 'Zephyr', get_template_directory_uri() . '/assets/main.css', [] );
		wp_enqueue_script( 'Zephyr', get_template_directory_uri() . '/assets/main.js', [], null, true );
		wp_deregister_script( 'autosave' );
		
	}
	
	//add_action('admin_enqueue_scripts', 'half_serious_scripts');
	add_action( 'wp_enqueue_scripts', 'half_serious_scripts' );
	
	add_action( 'init', 'add_admin_style_to_post_page_only' );
	function add_admin_style_to_post_page_only() {
		global $pagenow;
		
		if ( 'post.php' == $pagenow || 'post-new.php' == $pagenow || isset( $_GET['post'] ) ) {
			wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/admin.js' );
			wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/main.css' );
			wp_enqueue_style( 'admin', get_template_directory_uri() . '/assets/admin.css', [ 'main' ] );
		}
	}
	
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	
	add_action( 'admin_footer', 'change_blocks_names' );
	function change_blocks_names() {
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
	
	
	function my_plugin_block_categories( $categories ) {
		return array_merge( $categories,
		                    array(
			                    array(
				                    'slug'  => 'zephyr-home',
				                    'title' => __( 'Zephyr Home', 'zephyr' ),
				                    'icon'  => 'welcome-learn-more',
			                    ),
			                    array(
				                    'slug'  => 'zephyr-team',
				                    'title' => __( 'Zephyr Team', 'zephyr' ),
				                    'icon'  => 'admin-users',
			                    ),
			                    array(
				                    'slug'  => 'zephyr-sector-expertise',
				                    'title' => __( 'Zephyr Sector Expertise', 'zephyr' ),
				                    'icon'  => 'welcome-learn-more',
			                    ),
		                    ) );
	}
	
	add_filter( 'block_categories', 'my_plugin_block_categories' );
	function register_acf_block_types() {
		//		$developing = true;
		$developing = false;
	  acf_register_block_type( array(
		                           'name'            => 'component-image-gallery',
		                           'title'           => __( 'Component Images Gallery' ),
		                           'render_template' => 'template-parts/blocks/component-image-gallery/index.php',
		                           'enqueue_style'   => $developing ? '' : get_template_directory_uri() . '/template-parts/blocks/component-image-gallery/style.css',
		                           'category'        => 'zephyr-home',
		                           'icon'            => 'admin-appearance',
		                           'mode'            => 'preview',
		                           'example'         => [
			                           'attributes' => [
				                           'mode' => 'preview',
				                           'data' => [
					                           'is_screenshot' => true,
				                           ],
			                           ]
		                           ]
	                           ) );
		acf_register_block_type( array(
        'name' => 'component-hero-home',
        'title' => __('Component Hero Home'),
        'render_template' => 'template-parts/blocks/component-hero-home/index.php',
        'enqueue_style' => $developing ? '' : get_template_directory_uri() . '/template-parts/blocks/component-hero-home/style.css',
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
        'name' => 'component-hero-general',
        'title' => __('Component Hero General'),
        'render_template' => 'template-parts/blocks/component-hero-general/index.php',
        'enqueue_style' => $developing ? '' : get_template_directory_uri() . '/template-parts/blocks/component-hero-general/style.css',
			                         'category'        => 'zephyr-home',
			                         'icon'            => 'admin-appearance',
			                         'mode'            => 'preview',
			                         'example'         => [
				                         'attributes' => [
					                         'mode' => 'preview',
					                         'data' => [
						                         'is_screenshot' => true,
					                         ],
				                         ]
			                         ]
		                         ) );
		acf_register_block_type( array(
			                         'name'            => 'component-our-journey',
			                         'title'           => __( 'Component Our Journey' ),
			                         'render_template' => 'template-parts/blocks/component-our-journey/index.php',
			                         'enqueue_style'   => $developing ? '' : get_template_directory_uri() . '/template-parts/blocks/component-our-journey/style.css',
			                         'category'        => 'zephyr-home',
			                         'icon'            => 'admin-appearance',
			                         'mode'            => 'preview',
			                         'example'         => [
				                         'attributes' => [
					                         'mode' => 'preview',
					                         'data' => [
						                         'is_screenshot' => true,
					                         ],
				                         ]
			                         ]
		                         ) );
		
		acf_register_block_type( array(
			                         'name'            => 'component-hero',
			                         'title'           => __( 'Component Hero' ),
			                         'render_template' => 'template-parts/blocks/component-hero/index.php',
			                         'enqueue_style'   => $developing ? '' : get_template_directory_uri() . '/template-parts/blocks/component-hero/style.css',
			                         'category'        => 'zephyr-home',
			                         'icon'            => 'admin-appearance',
			                         'mode'            => 'preview',
			                         'example'         => [
				                         'attributes' => [
					                         'mode' => 'preview',
					                         'data' => [
						                         'is_screenshot' => true,
					                         ],
				                         ]
			                         ]
		                         ) );
		
		acf_register_block_type( array(
			                         'name'            => 'component-logo',
			                         'title'           => __( 'Component Logo' ),
			                         'render_template' => 'template-parts/blocks/component-logo/index.php',
			                         'enqueue_style'   => $developing ? '' : get_template_directory_uri() . '/template-parts/blocks/component-logo/style.css',
			                         'category'        => 'zephyr-home',
			                         'icon'            => 'admin-appearance',
			                         'mode'            => 'preview',
			                         'example'         => [
				                         'attributes' => [
					                         'mode' => 'preview',
					                         'data' => [
						                         'is_screenshot' => true,
					                         ],
				                         ]
			                         ]
		                         ) );
		
		acf_register_block_type( array(
			                         'name'            => 'component-our-process',
			                         'title'           => __( 'Component Our Process' ),
			                         'render_template' => 'template-parts/blocks/component-our-process/index.php',
			                         'enqueue_style'   => $developing ? '' : get_template_directory_uri() . '/template-parts/blocks/component-our-process/style.css',
			                         'category'        => 'zephyr-home',
			                         'icon'            => 'admin-appearance',
			                         'mode'            => 'preview',
			                         'example'         => [
				                         'attributes' => [
					                         'mode' => 'preview',
					                         'data' => [
						                         'is_screenshot' => true,
					                         ],
				                         ]
			                         ]
		                         ) );
		
		acf_register_block_type( array(
			                         'name'            => 'component-home-swiper',
			                         'title'           => __( 'Component Home Swiper' ),
			                         'render_template' => 'template-parts/blocks/component-home-swiper/index.php',
			                         'enqueue_style'   => $developing ? '' : get_template_directory_uri() . '/template-parts/blocks/component-home-swiper/style.css',
			                         'category'        => 'zephyr-home',
			                         'icon'            => 'admin-appearance',
			                         'mode'            => 'preview',
			                         'example'         => [
				                         'attributes' => [
					                         'mode' => 'preview',
					                         'data' => [
						                         'is_screenshot' => true,
					                         ],
				                         ]
			                         ]
		                         ) );
		
		acf_register_block_type( array(
			                         'name'            => 'component-our-testimonials',
			                         'title'           => __( 'Component Our Testimonials' ),
			                         'render_template' => 'template-parts/blocks/component-our-testimonials/index.php',
			                         'enqueue_style'   => $developing ? '' : get_template_directory_uri() . '/template-parts/blocks/component-our-testimonials/style.css',
			                         'category'        => 'zephyr-home',
			                         'icon'            => 'admin-appearance',
			                         'mode'            => 'preview',
			                         'example'         => [
				                         'attributes' => [
					                         'mode' => 'preview',
					                         'data' => [
						                         'is_screenshot' => true,
					                         ],
				                         ]
			                         ]
		                         ) );
		
		
		acf_register_block_type( array(
			                         'name'            => 'component-contact-us',
			                         'title'           => __( 'Component Contact Us' ),
			                         'render_template' => 'template-parts/blocks/component-contact-us/index.php',
			                         'enqueue_style'   => $developing ? '' : get_template_directory_uri() . '/template-parts/blocks/component-contact-us/style.css',
			                         'category'        => 'zephyr-home',
			                         'icon'            => 'admin-appearance',
			                         'mode'            => 'preview',
			                         'example'         => [
				                         'attributes' => [
					                         'mode' => 'preview',
					                         'data' => [
						                         'is_screenshot' => true,
					                         ],
				                         ]
			                         ]
		                         ) );
		
		acf_register_block_type( array(
			                         'name'            => 'component-our-team',
			                         'title'           => __( 'Component Our Team' ),
			                         'render_template' => 'template-parts/blocks/component-our-team/index.php',
			                         'enqueue_style'   => $developing ? '' : get_template_directory_uri() . '/template-parts/blocks/component-our-team/style.css',
			                         'category'        => 'zephyr-team',
			                         'icon'            => 'admin-users',
			                         'mode'            => 'preview',
			                         'example'         => [
				                         'attributes' => [
					                         'mode' => 'preview',
					                         'data' => [
						                         'is_screenshot' => true,
					                         ],
				                         ]
			                         ]
		                         ) );
		
		acf_register_block_type( array(
			                         'name'            => 'component-increase',
			                         'title'           => __( 'Component Increase' ),
			                         'render_template' => 'template-parts/blocks/component-increase/index.php',
			                         'enqueue_style'   => $developing ? '' : get_template_directory_uri() . '/template-parts/blocks/component-increase/style.css',
			                         'category'        => 'zephyr-sector-expertise',
			                         'icon'            => 'admin-users',
			                         'mode'            => 'preview',
			                         'example'         => [
				                         'attributes' => [
					                         'mode' => 'preview',
					                         'data' => [
						                         'is_screenshot' => true,
					                         ],
				                         ]
			                         ]
		                         ) );
		
		acf_register_block_type( array(
			                         'name'            => 'component-sector-expertise-image-2',
			                         'title'           => __( 'Component sector Expertise Image 2' ),
			                         'render_template' => 'template-parts/blocks/component-sector-expertise-image-2/index.php',
			                         'enqueue_style'   => $developing ? '' : get_template_directory_uri() . '/template-parts/blocks/component-sector-expertise-image-2/style.css',
			                         'category'        => 'zephyr-sector-expertise',
			                         'icon'            => 'admin-users',
			                         'mode'            => 'preview',
			                         'example'         => [
				                         'attributes' => [
					                         'mode' => 'preview',
					                         'data' => [
						                         'is_screenshot' => true,
					                         ],
				                         ]
			                         ]
		                         ) );
		
		acf_register_block_type( array(
			                         'name'            => 'component-about-us',
			                         'title'           => __( 'Component About us' ),
			                         'render_template' => 'template-parts/blocks/component-about-us/index.php',
			                         'enqueue_style'   => $developing ? '' : get_template_directory_uri() . '/template-parts/blocks/component-about-us/style.css',
			                         'category'        => 'zephyr-sector-expertise',
			                         'icon'            => 'admin-users',
			                         'mode'            => 'preview',
			                         'example'         => [
				                         'attributes' => [
					                         'mode' => 'preview',
					                         'data' => [
						                         'is_screenshot' => true,
					                         ],
				                         ]
			                         ]
		                         ) );
		
		
	}
	
	// Check if function exists and hook into setup.
	if ( function_exists( 'acf_register_block_type' ) ) {
		add_action( 'acf/init', 'register_acf_block_types' );
	}
	
	
	/*General Settings For Blocks*/
	function general_settings_for_blocks( $id, $className ) {
		$padding_top      = get_field( 'section_settings' )['padding_top'];
		$padding_bottom   = get_field( 'section_settings' )['padding_bottom'];
		$margin_top       = get_field( 'section_settings' )['margin_top'];
		$margin_bottom    = get_field( 'section_settings' )['margin_bottom'];
		$background_image = get_field( 'section_settings' )['background_image'];
		$background_color = get_field( 'section_settings' )['background_color'];
		$overlay_color    = get_field( 'section_settings' )['overlay_color'];
		
		$style = $padding_top == 999 ? '' : 'padding-top:' . $padding_top . 'px!important;';
		$style .= $padding_bottom == 999 ? '' : 'padding-bottom:' . $padding_bottom . 'px!important;';
		$style .= $margin_top == 999 ? '' : 'margin-top:' . $margin_top . 'px!important;';
		$style .= $margin_bottom == 999 ? '' : 'margin-bottom:' . $margin_bottom . 'px!important;';
		$style .= ! $background_image ? '' :
			( 'background-image: url("' . $background_image['url'] . '") !important;' . 'background-position: center;' . 'background-repeat: no-repeat;' . 'background-size: cover;' );
		$style .= ! $background_color ? '' : 'background-color:' . $background_color . '!important;';
		$style = $style ? "style='$style'" : '';
		
		$overlay_attr = ! $overlay_color ? '' : '<style>#' . $id . ':after{content: "";background:' . $overlay_color . ';}</style>';
		
		echo '<section ' . $style . ' id="' . esc_attr( $id ) . '" class="zephyr-block ' . esc_attr( $className ) . '">';
		echo $overlay_attr;
	}
	
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page();
	}
	
	remove_filter( 'the_content', 'wpautop' );
	add_filter( 'acf/settings/remove_wp_meta_box', '__return_true' );
	
	
	/**
	 * Responsive Image Helper Function
	 *
	 * @param string $image_id   the id of the image (from ACF or similar)
	 * @param string $image_size the size of the thumbnail image or custom image size
	 * @param string $max_width  the max width this image will be shown to build the sizes attribute
	 */
	
	function awesome_acf_responsive_image( $image_id, $max_width, $image_size ) {
		
		// check the image ID is not blank
		if ( $image_id != '' ) {
			
			// set the default src image size
			$image_src = wp_get_attachment_image_url( $image_id, $image_size );
			
			// set the srcset with various image sizes
			$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );
			
			// generate the markup for the responsive image
			echo 'src="' . $image_src . '" srcset="' . $image_srcset . '" sizes="(max-width: ' . $max_width . ') 100vw, ' . $max_width . '"';
			
		}
	}
	
	// set the max image width
	add_filter( 'max_srcset_image_width', 'awesome_acf_max_srcset_image_width', 10, 2 );
	function awesome_acf_max_srcset_image_width() {
		return 2200;
	}
	
	
	// Remove emojicons from header
	function disable_wp_emojicons() {
		// all actions related to emojis
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	}
	
	add_action( 'init', 'disable_wp_emojicons' );
	
	
	add_shortcode( 'zephyr-words', 'hs_words_shortcode' );
	function hs_words_shortcode( $atts ) {
		$atts       = shortcode_atts( array(
			                              'words' => 'Pop'
		                              ),
		                              $atts,
		                              'zephyr-words' );
		$frist_word = explode( ',', $atts['words'] )[0];
		
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
	
	function add_custom_taxonomies() {
		// Add new "Podcast Categories" taxonomy to Posts
		
		register_taxonomy( 'podcasts_categories',
		                   'podcasts',
		                   array(// Hierarchical taxonomy (like categories)
		                         'hierarchical'   => true,
		                         // This array of options controls the labels displayed in the WordPress Admin UI
		                         'labels'         => array(
			                         'name'              => _x( 'Podcast Categories', 'taxonomy general name', 'zephyr' ),
			                         'singular_name'     => _x( 'Podcast Category', 'taxonomy singular name', 'zephyr' ),
			                         'search_items'      => __( 'Search Podcast Categories', 'zephyr' ),
			                         'all_items'         => __( 'All Podcast Categories', 'zephyr' ),
			                         'parent_item'       => __( 'Parent Podcast Category', 'zephyr' ),
			                         'parent_item_colon' => __( 'Parent Podcast Category:', 'zephyr' ),
			                         'edit_item'         => __( 'Edit Podcast Category', 'zephyr' ),
			                         'update_item'       => __( 'Update Podcast Category', 'zephyr' ),
			                         'add_new_item'      => __( 'Add New Podcast Category', 'zephyr' ),
			                         'new_item_name'     => __( 'New Podcast Category Name', 'zephyr' ),
			                         'menu_name'         => __( 'Podcast Categories', 'zephyr' ),
		                         ),
		                         'show_in_rest'   => true,
		                         'posts_per_page' => - 1,
		                         // Control the slugs used for this taxonomy
		                         'rewrite'        => false,
		                         'public'         => true,
		                   ) );
	}
	
	add_action( 'init', 'add_custom_taxonomies', 10 );
	
	
	/* Some Extra features & functions */
	
	/* Sub category for categories */
	function categoriesPosts( $category ) {
		?>
      <ol class="guide-content">
		  <?php
			  $args_posts = array(
				  'post_type' => 'post',
				  'cat'       => $category->term_id,
			  );
			  $query      = new WP_Query( $args_posts );
			  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
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
	function nextPost( $post_id ) {
		global $post;
		$oldGlobal = $post;
		$post      = get_post( $post_id );
		$next_post = get_next_post();
		$post      = $oldGlobal;
		if ( '' == $next_post ) {
			return 0;
		}
		$next_post_id = $next_post->ID;
		
		if ( get_post_status( $next_post_id ) ) {
			?>
          <a class="next-chapter iv-st-from-bottom" href="<?php echo get_permalink( $next_post_id ); ?>">
            <h3 class="headline-3">Next Chapter <span>></span></h3>
            <h6 class="headline-8"><?php echo get_the_title( $next_post_id ); ?></h6>
          </a>
			<?php
		}
	}
	
	/* Shortcode for highlight text */
	function highlight_text( $atts = array(), $content = null ) {
		$a = shortcode_atts( array( 'color' => '' ), $atts );
		
		$content = '<span style="background-color:rgba(' . $a['color'] . ',0.6)">' . $content . '</span>';
		
		return $content;
	}
	
	add_shortcode( 'highlight', 'highlight_text' );
	
	function gridNumber( $number ) {
		switch ( $number ) {
			case 1 :
				return 'card-one';
			case 2:
				return 'card-two';
			case 3:
				return 'card-three';
			case 4:
				return 'card-four';
		}
		
	}
	
	function pageWrapper( $page ) {
		switch ( $page ) {
			case 'home':
				return 'home-page-wrapper';
			case 'say-hello':
				return 'say-hello-wrapper';
			case 'team':
				return 'team-page-wrapper';
			case 'sector-expertise-2':
				return 'sector-expertise2-page-wrapper';
			case 'sector-expertise':
				return 'sector-expertise-page-wrapper';
		}
	}
	
	
	function teamMemberShapeBG( $field ) {
		switch ( $field ) {
			case 'green-circle':
				echo 'background:url(' . get_template_directory_uri() . '/assets/images/green-circle.png) no-repeat 56% 45%;background-position:20% 35%';
				break;
			case 'oval':
				echo 'background:url(' . get_template_directory_uri() . '/assets/images/oval.png) no-repeat 90% 30%;background-position:top left';
				break;
			case 'red-circle':
				echo 'background:url(' . get_template_directory_uri() . '/assets/images/red-circle.png) no-repeat right 67%;';
				break;
			case 'milky-circle':
				echo 'background:url(' . get_template_directory_uri() . '/assets/images/milky-circle.png) no-repeat left 58%;';
			
		}
	}
	
	function get_vertical_style( $vertical_position ) {
		switch ( $vertical_position ) {
			case 'top':
				return 'bottom:unset;top:0;transform:none';
			case 'bottom':
				return 'top:unset;bottom:0;transform:none';
			default:
				return '';
		}
	}