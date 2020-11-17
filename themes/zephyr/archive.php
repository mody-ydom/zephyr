<?php
/*
 * Template Name: Blog
 * */
get_header();

$args = [
  'posts_per_page' => 1,
  'order'          => 'ASC',
];
$the_query = new WP_Query($args);
while ($the_query->have_posts()):$the_query->the_post();
  $post_id = get_the_ID();
  $the_post = get_post($post_id);
  $category = get_the_category($post_id);
  $author_id = get_the_author_meta('ID');
  $author_name = get_the_author_meta('user_nicename', $author_id);
  ?>
  444444444444444444
<?php
endwhile;
get_footer();