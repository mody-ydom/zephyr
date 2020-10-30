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
<body <?php body_class(); ?> data-barba="wrapper">
  <div class="barba-overlay-transition"></div>
	<?php wp_body_open(); ?>
  <header>
    <div class="container">
      <div class="header-content <?php if(is_singular( 'post' ) || is_page_template( 'archive.php' )){echo 'dark';}?> ">
        <!--burger menu and cross-->
        <div class="menu">
          <button class="burger-menu" id="burger-menu">
            <span></span>
            <span></span>
            <span></span>
          </button>
        </div>
        <!--logo-->
        <a class="logo light" href="<?php echo get_home_url(); ?>">
          <img src="<?php echo $header_logo_light['url']; ?>" alt="logo">
        </a>
        <a class="logo dark" href="<?php echo get_home_url(); ?>">
          <img src="<?php echo $header_logo_dark['url']; ?>" alt="logo">
        </a>
        <!--links-->
        <div class="links">
          <?php foreach ($header_links as $header_link) {
            $link = $header_link['link'];
            if ($header_link['has_menu']) { ?>
              <div class="has-drop-down">
                <a class="small-link link-arrow" href="<?php echo $link['url']; ?>"
                   target="<?php echo $link['target']; ?>"><span
                    data-hover="<?php echo $link['title']; ?>"><?php echo $link['title']; ?></span>
  
                <svg aria-hidden="true" class="svg-inline--fa fa-angle-down fa-w-8 fa-xs" data-icon="angle-down" data-prefix="fal" focusable="false" role="img" viewBox="0 0 256 512"
                       xmlns="http://www.w3.org/2000/svg">
                    <path class=""
                          d="M119.5 326.9L3.5 209.1c-4.7-4.7-4.7-12.3 0-17l7.1-7.1c4.7-4.7 12.3-4.7 17 0L128 287.3l100.4-102.2c4.7-4.7 12.3-4.7 17 0l7.1 7.1c4.7 4.7 4.7 12.3 0 17L136.5 327c-4.7 4.6-12.3 4.6-17-.1z"
                          fill="currentColor"></path>
                  </svg>
                </a>
                <div class="drop-down">
                  <?php foreach ($header_link['sub_links'] as $sub_menu_items) { ?>
                    <a target="<?php echo $sub_menu_items['link']['target']; ?>" class="text" href="<?php echo $sub_menu_items['link']['url']; ?>">
                      <?php echo $sub_menu_items['link']['title']; ?>
                    </a>
                  <?php } ?>
                </div>
              </div>
            <?php } else { ?>
          <a class="small-link" href="<?php echo $link['url']; ?>"
             target="<?php echo $link['target']; ?>"><span
              data-hover="<?php echo $link['title']; ?>"><?php echo $link['title']; ?></span></a>
            <?php } ?>
          <?php } ?>
          
        </div>
      </div>
    </div>
  </header>
  <div class="smooth-scroller" smooth-scroll-container>
    <main <?=$page_header_type || is_404() ? $page_header_type : ''?> data-barba="container" data-barba-namespace="<?=is_singular( 'post' ) || is_page_template( 'archive.php' ) ? 'blog' : 'home'?>">
      <!-- overlay dark menu -->
      <div class="<?php echo pageWrapper( $post->post_name ); ?>">
