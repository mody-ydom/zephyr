<?php
	/**
	 * The template for displaying 404 pages (not found)
	 *
	 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
	 *
	 * @package Zephyr
	 */
	get_header();
?>
  <div class="page-wrapper-404">
    <div class="container">
      
      <div class="wysiwyg-block">
		  <?=get_field( '404_text', 'options' )?>
      </div>
      <a class="main-btn"
         href="<?=get_field( '404_link', 'options' )['url']?>"
         target="<?=get_field( '404_link', 'options' )['target']?>">
		  <?=get_field( '404_link', 'options' )['title']?>
      </a>
    </div>
  </div>
<?php
	get_footer();
