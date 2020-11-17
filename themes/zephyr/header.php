<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
        name="viewport">
  <link rel="profile" href="https://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
  <link rel="stylesheet" href="https://use.typekit.net/cca7lwo.css">
</head>
<!-- ACF Fields -->
<?php
	global $post;
	$header_logo_light = get_field( 'header_logo_light', 'options' );
	$header_logo_dark  = get_field( 'header_logo_dark', 'options' );
	$header_links       = get_field( 'header_links', 'options' );
	$page_header_type       = get_field( 'page_header_type' );
?>
<!-- END ACF -->
<?php $website_scroll_speed = get_field( 'scroll_roughness', 'options' ); ?>
<body data-scroll-speed-desktop="<?=$website_scroll_speed['desktop']?>"
      data-scroll-speed-mobile="<?=$website_scroll_speed['mobile']?>"  <?php body_class(); ?> data-barba="wrapper">
  <div class="barba-overlay-transition"></div>
	<?php wp_body_open(); ?>
  <div class="smooth-scroller" smooth-scroll-container>
    <main data-header-class="<?=is_singular( 'post' ) || is_404() || is_tag() || is_category() || is_author() || is_search() || is_page_template( 'archive.php' ) ? 'black' : $page_header_type?>"  data-barba="container" data-barba-namespace="<?=is_singular( 'post' ) || is_page_template( 'archive.php' ) ? 'blog' : 'home'?>">
      <!-- overlay dark menu -->
      <div class="<?php echo pageWrapper( $post->post_name ); ?>">
