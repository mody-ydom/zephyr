<?php wp_footer(); ?>
<!--footer-->
<?php
	$footer_address          = get_field( 'footer_address', 'options' );
	$footer_text_hover_1     = get_field( 'footer_text_hover_1', 'options' );
	$footer_text_hover_2     = get_field( 'footer_text_hover_2', 'options' );
	$copywrite_text          = get_field( 'copywrite_text', 'options' );
	$footer_banner_link      = get_field( 'footer_banner_link', 'options' );
	$facebook_url            = get_field( 'facebook_url', 'options' );
	$linkedin_url            = get_field( 'linkedin_url', 'options' );
	$youtube_url             = get_field( 'youtube_url', 'options' );
	$subscribe_to_newsletter = get_field( 'subscribe_to_newsletter', 'options' );
	$footer_text_bg_color    = get_field( 'footer_text_bg_color', 'options' );
	$contact_modal           = get_field( 'contact_modal', 'options' );
	$contact_title           = $contact_modal['title'];
	$contact_text            = $contact_modal['text'];
	$contact_form            = $contact_modal['form'];
	
	$newsletter_modal       = get_field( 'newsletter_modal', 'options' );
	$newsletter_title       = $newsletter_modal['title'];
	$newsletter_text        = $newsletter_modal['text'];
	$newsletter_form        = $newsletter_modal['form'];
	$newsletter_bottom_text = $newsletter_modal['bottom_text'];
	
	
	$hide_footer                   = get_field( 'hide_footer' );
	$override_general_footer       = get_field( 'override_general_footer' );
	$footer_override_text_hover_1  = get_field( 'footer_text_hover_1' );
	$footer_override_text_hover_2  = get_field( 'footer_text_hover_2' );
	$footer_override_text_bg_color = get_field( 'footer_text_bg_color' );
	$footer_override_banner_link   = get_field( 'footer_banner_link' );
	
	if ( $override_general_footer ) {
		$footer_text_hover_1  = $footer_override_text_hover_1;
		$footer_text_hover_2  = $footer_override_text_hover_2;
		$footer_text_bg_color = $footer_override_text_bg_color;
		$footer_banner_link   = $footer_override_banner_link;
	}
?>

<footer>
  <div class="container">
	  <?php if ( ! $hide_footer ) { ?>
        <div class="footer-content">
          <!--    top content-->
          <div class="row">
            <div class="col-12 col-lg-6">
              <a href="<?php echo $footer_banner_link; ?>">
                <div class="text iv-st-from-left" style="background-image:<?=$footer_text_bg_color?>">
                  <h2 class="headline-1 text-one"><?=$footer_text_hover_1?></h2>
                  <h2 class="headline-1 text-two"><?=$footer_text_hover_2?></h2>
                </div>
              </a>
            </div>
            <div class="col-12 col-lg-6">
              <div class="row content">
                <!--          info-->
                <div class="col-12 col-md-auto">
                  <div class="info">
                    <div class="row flex-column">
                      <div class="col-auto">
                        <h3 class="headline-7 word-up"><?=$footer_address?></h3>
                      </div>
                    </div>
                  </div>
                </div>
                <!--         links-->
                <div class="col-12 col-md-7 col-lg-12">
                  <div class="links">
                    <div class="row">
						<?php while ( have_rows( 'footer_links', 'options' ) ) {
							the_row();
							$link              = get_sub_field( 'link' );
							$run_contact_modal = get_sub_field( 'run_contact_modal' );
							?>
                          <div class="col-6 col-lg-12">
                            <a <?php if ( $run_contact_modal ){ ?>id="contact"<?php } else { ?> target="<?=$link['target']?>" href="<?=$link['url']?>"<?php } ?>
                               class="small-link iv-st-from-bottom"><?=$link['title']?></a>
                          </div>
						<?php } ?>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <a id="subscribe" class="headline-7 subscribe word-up"><?=$subscribe_to_newsletter?></a>
                </div>
              </div>
            </div>
          </div>
        </div>
	  <?php } ?>
    <!--      bottom content-->
    <div class="bottom-content">
      <div class="left-content">
        <a href="<?=site_url()?>">
          <svg height="71" class="footer-logo" viewBox="0 0 170 71" width="170" xmlns="http://www.w3.org/2000/svg">
            <g>
              <g>
                <g>
                  <path d="M32.347 34.204l1.99 12.945-4.024.549zm3.268-5.078l-6.114.837-4.294 26.721 3.84-.524.73-4.842 5.126-.7.714 4.643 4.215-.577z" fill="#0178da"/>
                </g>
                <g>
                  <path d="M41.81 28.28l4.178-.572-.035 22.406 6.873-.94-.005 3.73-11.051 1.515z" fill="#0178da"/>
                </g>
                <g>
                  <path d="M58.856 29.681l6.44-.846.26-3.768-10.871 1.451-.042 26.14 4.178-.572.017-10.792 5.628-.782.256-3.769-5.878.817z" fill="#0178da"/>
                </g>
                <g>
                  <path d="M84.956 33.303l5.734-.785v3.73l-5.736.785-.01 7.654 7.214-.987-.006 3.73-11.397 1.568.04-26.14L92.188 21.3v3.73l-7.216.987z" fill="#2fc9d7"/>
                </g>
                <g>
                  <path
                    d="M100.952 23.838c1.481-.203 2.122.533 2.122 2.398v2.576c-.003 2.091-.953 2.893-2.511 3.106l-1.633.22.012-8.029zm6.768 21.471c-.417-.917-.45-1.842-.45-3.11l.006-4.035c.004-2.726-.68-4.611-2.764-5.184 1.865-1.114 2.743-2.988 2.743-5.677v-2.054c.007-4.033-1.85-5.757-6.18-5.165l-6.304.862-.04 26.14 4.176-.572.017-10.642 1.444-.197c1.899-.26 2.728.522 2.728 2.949l-.005 4.107c-.004 2.129.147 2.52.374 3.16z"
                    fill="#2fc9d7"/>
                </g>
                <g>
                  <path d="M110.039 18.857l4.176-.571-.04 26.14-4.178.572z" fill="#2fc9d7"/>
                </g>
                <g>
                  <path
                    d="M121.08 23.358c.003-1.866.839-2.69 2.169-2.873 1.33-.182 2.16.415 2.16 2.28l-.022 14.117c-.004 1.866-.84 2.69-2.17 2.872-1.328.182-2.16-.416-2.16-2.281zm-4.199 14.425c-.007 4.182 2.23 6.266 6.331 5.705 4.101-.56 6.346-3.257 6.353-7.44l.021-13.592c.007-4.183-2.231-6.266-6.332-5.705-4.101.56-6.346 3.257-6.352 7.44z"
                    fill="#2fc9d7"/>
                </g>
                <g>
                  <path
                    d="M136.28 15.268l-.031 20.164c0 1.865.832 2.426 2.161 2.244 1.33-.182 2.165-.969 2.168-2.836l.032-20.165 3.95-.54-.031 19.907c-.007 4.183-2.139 6.865-6.24 7.425-4.1.561-6.223-1.536-6.217-5.72l.031-19.903z"
                    fill="#2fc9d7"/>
                </g>
                <g>
                  <path
                    d="M153.03 12.677c4.058-.556 6.143 1.548 6.143 5.732v.823l-3.95.54v-1.089c0-1.865-.754-2.473-2.084-2.29-1.33.181-2.085.994-2.092 2.862-.01 5.375 8.154 5.266 8.142 12.736-.006 4.183-2.136 6.863-6.238 7.425-4.102.562-6.225-1.536-6.218-5.72v-1.607l3.95-.54v1.866c0 1.865.831 2.424 2.16 2.242 1.328-.182 2.165-.969 2.169-2.835.008-5.375-8.155-5.266-8.143-12.737.004-4.175 2.096-6.851 6.16-7.408z"
                    fill="#2fc9d7"/>
                </g>
                <g>
                  <path
                    d="M70.25 30.381c-.033-1.873.688-2.703 1.975-2.907 1.287-.204 2.028.394 2.061 2.268l.02 1.088 3.815-.606-.015-.826c-.074-4.2-2.136-6.278-6.06-5.655-1.187.188-2.194.574-3.017 1.13l-.907 11.547c2.383 2.753 6.168 3.796 6.233 7.522.034 1.876-.759 2.678-2.043 2.882-1.285.205-2.102-.342-2.135-2.218l-.033-1.874-2.552.405-.424 5.395c.954 1.725 2.743 2.47 5.32 2.061 3.958-.63 5.97-3.355 5.895-7.555-.134-7.497-8.036-7.256-8.133-12.657z"
                    fill="#2fc9d7"/>
                </g>
                <g>
                  <path d="M19.022 31.393V42.58l-4.748.656V32.035l-4.176.578-.001 26.14 4.176-.58V46.973l4.748-.658v11.22l4.177-.579.001-26.14z" fill="#0178da"/>
                </g>
                <g>
                  <path d="M69.651 16.919l96.328-13.22v41.643l-99.61 13.37-.244 3.11L169.41 48V.142L69.895 13.81z" fill="#0178da"/>
                </g>
                <g>
                  <path d="M62.963 59.188L3.43 67.268V25.945l62.794-8.556.264-3.112L0 23.286V70.77l62.72-8.472z" fill="#0178da"/>
                </g>
              </g>
            </g>
          </svg>
        </a>
        <span class="copy"><?=$copywrite_text?></span>
      </div>
      <div class="right-content">
        <div class="social-links">
          <div class="icon youtube">
            <a href="<?=$youtube_url?>" target="_blank">
              <svg viewBox="0 0 29.195 20.534" width="29.195" xmlns="http://www.w3.org/2000/svg">
                <path fill="#010f3d"
                      d="M4.671,20.241a4.95,4.95,0,0,1-3.219-1.248,6.313,6.313,0,0,1-1.16-2.9A44.166,44.166,0,0,1,0,11.37V9.155A44.164,44.164,0,0,1,.292,4.43a6.314,6.314,0,0,1,1.16-2.9A4.177,4.177,0,0,1,4.377.3C8.463,0,14.591,0,14.591,0H14.6s6.128,0,10.214.3a4.177,4.177,0,0,1,2.925,1.237A6.318,6.318,0,0,1,28.9,4.43a44.224,44.224,0,0,1,.291,4.725V11.37a44.226,44.226,0,0,1-.291,4.725,6.318,6.318,0,0,1-1.161,2.9,4.175,4.175,0,0,1-2.925,1.237c-4.085.3-10.22.3-10.22.3S7.007,20.465,4.671,20.241Z"
                      transform="translate(0 0)"/>
                <path fill="#fff" d="M228.656,215.953v8.2l7.889-4.087Z" transform="translate(-217.074 -210.102)"/>
              </svg>
            </a>
          </div>
          <div class="icon facebook">
            <a href="<?=$facebook_url?>" target="_blank">
              <svg preserveAspectRatio="" height="20.999" viewBox="0 0 9.692 20.999" width="9.692" xmlns="http://www.w3.org/2000/svg">
                <path fill="#010f3d"
                      d="M162.312,157.032h4.228V146.443h2.951l.314-3.545H166.54v-2.019c0-.836.168-1.167.977-1.167H169.8v-3.679h-2.928c-3.146,0-4.565,1.386-4.565,4.038V142.9h-2.2v3.59h2.2Z"
                      transform="translate(-160.112 -136.033)"/>
              </svg>
            </a>
          </div>
          <div class="icon linkedin">
            <a href="<?=$linkedin_url?>" target="_blank">
              <svg height="21.496" viewBox="0 0 21.802 21.496" width="21.802" xmlns="http://www.w3.org/2000/svg">
                <path fill="#010f3d" d="M669.591,250.307a2.323,2.323,0,0,1-2.514,2.33,2.335,2.335,0,1,1,2.514-2.33Zm-4.814,19.165v-15h4.661v15Z" transform="translate(-664.654 -247.976)"/>
                <path fill="#010f3d"
                      d="M701.753,283.685c0-1.87-.061-3.434-.122-4.784h4.047l.215,2.085h.092a5.385,5.385,0,0,1,4.631-2.423c3.066,0,5.366,2.055,5.366,6.47V293.9h-4.661v-8.31c0-1.932-.675-3.25-2.362-3.25a2.559,2.559,0,0,0-2.392,1.748,3.355,3.355,0,0,0-.154,1.165V293.9h-4.661Z"
                      transform="translate(-694.18 -272.401)"/>
              </svg>
            </a>
          </div>
        </div>
      </div>
      <span class="copy"><?=$copywrite_text?></span>
    </div>
  </div>
</footer>

</main><!--end of Barba-->
</div><!--end of smooth-scroll-->
<section class="component-modal" id="model">
  <div class="contact-us modal" id="contact-us-model">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-model">
          <svg height="16" viewBox="0 0 17 16" width="17" xmlns="http://www.w3.org/2000/svg">
            <g>
              <g>
                <path d="M16.274 1.676L14.6 0l-6.19 6.19L2.22 0 .545 1.676l6.19 6.189-6.19 6.19L2.22 15.73l6.19-6.19 6.189 6.19 1.675-1.676-6.189-6.189z" fill="#9899a2"/>
              </g>
            </g>
          </svg>
        </div>
        <h2 class="headline-1"><?=$contact_title?></h2>
        <p class="headline-5"><?=$contact_text?></p>
		  <?=do_shortcode( $contact_form )?>
      </div>
    </div>
  </div>
  <div class="newsletter modal" id="newsletter-model">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-model">
          <svg height="16" viewBox="0 0 17 16" width="17" xmlns="http://www.w3.org/2000/svg">
            <g>
              <g>
                <path d="M16.274 1.676L14.6 0l-6.19 6.19L2.22 0 .545 1.676l6.19 6.189-6.19 6.19L2.22 15.73l6.19-6.19 6.189 6.19 1.675-1.676-6.189-6.189z" fill="#9899a2"/>
              </g>
            </g>
          </svg>
        </div>
        <h2 class="headline-1"><?=$newsletter_title?></h2>
        <p class="headline-5"><?=$newsletter_text?></p>
		  <?=do_shortcode( $newsletter_form )?>
        <p class="tag"><?=$newsletter_bottom_text?></p>
      </div>
    </div>
  </div>
</section>
<div class="service-video-modal" id="service-video-modal">
  <div class="close-modal">
    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16">
      <path fill="CurrentColor" d="M16.274 1.676L14.6 0l-6.19 6.19L2.22 0 .545 1.676l6.19 6.189-6.19 6.19L2.22 15.73l6.19-6.19 6.189 6.19 1.675-1.676-6.189-6.189z"/>
    </svg>
  </div>
  <div class="modal-content">
    <div class="aspect-ratio">
    
    </div>
  </div>
</div>
</body>
</html>