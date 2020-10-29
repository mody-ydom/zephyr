<?php
get_header();
?>
  <div class="container">
    <div class="loop-page-wrapper">
      <?php
      $author = get_queried_object();
      $author_id = $author->ID;
      // Get user object
      $recent_author = get_user_by( 'ID', $author_id );
      // Get user display name
      $author_display_name = $recent_author->display_name;

      if (have_posts()) : ?>
        <h2 class="headline-2 word-up"><?php echo $author_display_name; ?></h2>
        <?php post_cards_loop() ?>
      <?php else: ?>
        <p class="there-is-no-results iv-st-from-bottom">there is no search results</p>
      <?php endif; ?>
    </div>
  </div>
<?php
get_footer();