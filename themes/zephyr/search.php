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
    <div class="loop-page-wrapper">
      <?php if (have_posts()) : ?>
          <h2 class="headline-2 word-up">Search Results For
            <span><?php echo get_search_query() ?></span></h2>
          <?php post_cards_loop() ?>
      <?php else: ?>
        <p class="there-is-no-results iv-st-from-bottom">there is no search results</p>
      <?php endif; ?>
    </div>
  </div>
<?php
get_footer();
