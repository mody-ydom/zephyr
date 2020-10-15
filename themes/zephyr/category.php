<?php
	get_header();
?>
  <div class="container">
    <div class="loop-page-wrapper">
		
		<?php if ( have_posts() ) : ?>
          <h1 class="headline word-up"><?php echo single_cat_title(); ?></h1>
          <div class="row">
			  <?php
				  global $wp_query;
				  post_cards_loop( $wp_query ) ?>
          </div>
		<?php endif; ?>
    </div>
  </div>
<?php
	get_footer();