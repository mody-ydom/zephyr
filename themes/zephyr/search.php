<?php
	/**
	 * The template for displaying search results pages
	 *
	 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
	 *
	 * @package Zephyr
	 */
	
	get_header();
?>
  <div class="container">
    <div class="search-results-wrapper">
		
		<?php if ( have_posts() ) : ?>
          <div class="head has-title ">
            <div class="text">نتائج البحث عن</div>
            <h1 class="headline word-up"> <?php echo get_search_query() ?></h1>
          </div>
          <div class="row">
			  <?php
				  global $wp_query;
				  post_cards_loop( $wp_query ) ?>
          </div>
		<?php else: ?>
          <h1 class="headline word-up"> لا يوجد نتائج بحث</h1>
		<?php endif; ?>
    </div>
  </div>
<?php
	get_footer();
