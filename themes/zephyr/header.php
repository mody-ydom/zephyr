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

<body <?php body_class(); ?> data-barba="wrapper">
  <div class="barba-overlay-transition"></div>
	<?php wp_body_open(); ?>
  <header>
      <div class="container">
          <div class="header-content">
              <!--      burger menu and cross-->
              <div class="menu-and-cross">
                  <div class="menu">
                      <svg width="28" height="20" viewBox="0 0 28 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <line x1="28" y1="0.75" x2="-6.79088e-08" y2="0.749997" stroke="#fefefd" stroke-width="1.5"/>
                          <line x1="28" y1="9.75" x2="-6.7828e-08" y2="9.75" stroke="#fefefd" stroke-width="1.5"/>
                          <line x1="28" y1="18.75" x2="-6.7828e-08" y2="18.75" stroke="#fefefd" stroke-width="1.5"/>
                      </svg>
                  </div>
                  <div class="cross">
                      <svg  width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <line x1="1.46967" y1="19.1474" x2="19.1473" y2="1.46974" stroke="#fefefd" stroke-width="1.5"/>
                          <line x1="2.53033" y1="1.46967" x2="20.208" y2="19.1473" stroke="#fefefd" stroke-width="1.5"/>
                      </svg>
                  </div>
              </div>
              <!--      logo-->
              <a class="logo light" href="#">
                  <img src="../../html/images/logo.png" alt="logo">
              </a>
              <a class="logo dark" href="#">
                  <img src="../../html/images/gray-logo.png" alt="logo">
              </a>
              <!--    links-->
              <div class="links">
                  <a class="small-link" href="#"><span data-hover="Sector Expertise">Sector Expertise</span></a>
                  <a class="small-link" href="#"><span data-hover="About">About</span></a>
                  <a class="small-link" href="#"><span data-hover="Growth Guide">Growth Guide</span></a>
                  <a class="small-link" href="#"><span data-hover="Say hello">Say hello</span></a>
              </div>
          </div>
      </div>
  </header>
  <div class="smooth-scroller" smooth-scroll-container>
    <main <?=$header_type || is_404() ? 'colored' : ''?> data-barba="container" data-barba-namespace="home"><!-- overlay dark menu -->
      <div class="wrapper-page-transition"></div>
