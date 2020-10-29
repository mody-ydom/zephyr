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
	$header_type       = get_field( 'header_type', 'options' );
?>
<!-- END ACF -->
<body <?php body_class(); ?> data-barba="wrapper">
  <div class="barba-overlay-transition"></div>
  <div class="skew-overlay-transition"></div>
	<?php wp_body_open(); ?>
  <header>
    <div class="container">
      <div class="header-content <?php echo $header_type; ?>">
        <!--      burger menu and cross-->
        <div class="menu">
          <button class="burger-menu" id="burger-menu">
            <span></span>
            <span></span>
            <span></span>
          </button>
        </div>
        <!--      logo-->
        <a class="logo light" href="<?php echo get_home_url(); ?>">
          <img src="<?php echo $header_logo_light['url']; ?>" alt="logo">
        </a>
        <a class="logo dark" href="<?php echo get_home_url(); ?>">
          <img src="<?php echo $header_logo_dark['url']; ?>" alt="logo">
        </a>
        <!--    links-->
        <div class="links">
			<?php
				while ( have_rows( 'header_links', 'options' ) ):
					the_row();
					$link = get_sub_field( 'link' );
			?>
          <a class="small-link" href="<?php echo $link['url']; ?>"
             target="<?php echo $link['target']; ?>"><span
              data-hover="<?php echo $link['title']; ?>"><?php echo $link['title']; ?></span></a>
		<?php endwhile; ?>
        </div>
      </div>
    </div>
  </header>
  <div class="smooth-scroller" smooth-scroll-container>
    <main <?=$header_type || is_404() ? 'colored' : ''?> data-barba="container" data-barba-namespace="<?=is_singular( 'post' ) || is_page_template( 'archive.php' ) ? 'blog' : 'home'?>">
      <!-- overlay dark menu -->
      <div class="<?php echo pageWrapper( $post->post_name ); ?>">
