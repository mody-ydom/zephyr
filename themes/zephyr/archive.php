<?php
	/*
   * Template Name: Blog
   * */
	get_header();
	
	$args      = [
		'posts_per_page' => 1,
		'order'          => 'ASC',
	];
	$the_query = new WP_Query( $args );
	while( $the_query->have_posts() ):$the_query->the_post();
		$post_id     = get_the_ID();
		$the_post    = get_post( $post_id );
		$category    = get_the_category( $post_id );
		$author_id   = get_the_author_meta( 'ID' );
		$author_name = get_the_author_meta( 'user_nicename', $author_id );
		?>
      <section class="component-growth-guide">
        <div class="container">
          <div class="growth-guide">
            <div class="growth-guide-title center">
              <h6 class="headline-6 normal word-up">GROWTH GUIDE</h6>
              <h2 class="headline-2 word-up">Digital Growth Marketing & Transformation for small businesses </h2>
            </div>
            <div class="growth-guide-content">
              <div class="row">
                <div class="col-12 col-md-auto">
                  <div class="left-content">
                    <ol class="guide-container">
						<?php
							$args         = array( 'hide_empty' => '1' );
							$categories   = get_categories( $args );
							$cat_index    = 1;
							$single_title = get_the_title();
							foreach( $categories as $categoryloop ){
								if( $category[0]->cat_name == $categoryloop->name ){
									$current_cat_index = $cat_index;
								}
								?>
                              <li class="guide iv-st-from-bottom <?=$category[0]->cat_name == $categoryloop->name ? 'active' : ''?>">
                                <div class="title">
                                  <h3><?php echo $categoryloop->name; ?></h3>
                                  <div class="icons">
                                    <span class="plus icon">+</span>
                                    <span class="minus icon">-</span>
                                  </div>
                                </div>
                                <ol data-cat-index="<?=$cat_index?>" class="guide-content">
									<?php
										$args_posts = array(
											'post_type'      => 'post',
											'order'          => 'ASC',
											'cat'            => $categoryloop->term_id,
											'posts_per_page' => - 1
										);
										$query      = new WP_Query( $args_posts );
										if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
											$post_index = $query->current_post + 1;
											
											if( $single_title == get_the_title() ){
												$current_post_index = $post_index;
											}
											?>
                                          <li class="sub-list-item <?=$single_title == get_the_title() ? 'active' : ''?>" data-post-index="<?=$post_index?>"><a
                                              href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></li>
											<?php
											
											wp_reset_query();
										endwhile; endif;
									?>
                                </ol>
                              
                              </li>
								<?php $cat_index ++;
							}
						?>
                    </ol>
                    <div class="search-input iv-st-from-bottom">
                      <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <div class="input-wrapper">
                          <input name="s" value="<?php echo get_search_query(); ?>" placeholder="Type to Search" type="search">
                          <button type="submit">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.60859 1.10385C9.64401 1.10385 12.1135 3.57336 12.1135 6.60878C12.1135 9.64401 9.64401 12.1135 6.60859 12.1135C3.57336 12.1135 1.10385 9.64401 1.10385 6.60878C1.10385 3.57336 3.57336 1.10385 6.60859 1.10385ZM11.6528 10.8724C12.663 9.67915 13.2174 8.17202 13.2174 6.60878C13.2174 2.96458 10.2528 0 6.60859 0C2.96458 0 0 2.96458 0 6.60878C0 10.2528 2.96458 13.2174 6.60859 13.2174C8.17183 13.2174 9.67896 12.663 10.8724 11.6528L15.2196 16L16 15.2196L11.6528 10.8724Z"
                                    fill="#606060"/>
                            </svg>
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md">
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
	<?php
	endwhile;
	get_footer();