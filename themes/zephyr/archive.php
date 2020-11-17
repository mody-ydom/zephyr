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
	  $post_id            = get_the_ID();
	  $the_post           = get_post( $post_id );
	  $category           = get_the_category( $post_id );
	  $author_id          = get_the_author_meta( 'ID' );
	  $author_name        = get_the_author_meta( 'user_nickname', $author_id );
	  $current_cat_index  = 1;
	  $current_post_index = 1;
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
                <div class="right-content">
                  <div class="mobile-select iv-st-from-bottom">
                    <svg class="arrow-select" width="11" height="7" viewBox="0 0 11 7"
                         fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M5.18945 6.2168C5.45312 6.48047 5.89258 6.48047 6.15625 6.2168L10.1406 2.23242C10.4336 1.93945 10.4336 1.5 10.1406 1.23633L9.49609 0.5625C9.20312 0.298828 8.76367 0.298828 8.5 0.5625L5.6582 3.4043L2.8457 0.5625C2.58203 0.298828 2.14258 0.298828 1.84961 0.5625L1.20508 1.23633C0.912109 1.5 0.912109 1.93945 1.20508 2.23242L5.18945 6.2168Z"
                        fill="#252525"/>
                    </svg>
                    <label>
                      <select onchange="location = this.value;" class="headline-6">
						  <?php
							  $args       = array( 'hide_empty' => '1' );
							  $categories = get_categories( $args );
							  foreach( $categories as $category ){
								  ?>
                                <optgroup label="<?php echo $category->name; ?>">
									<?php
										$args_posts = array( 'cat' => $category->term_id );
										$query      = new WP_Query( $args_posts );
										if( $query->have_posts() ):
											while( $query->have_posts() ):
												$query->the_post();
												$post_id_2 = get_the_ID();
												?>
                                              <option value="<?php the_permalink(); ?>" <?php if( $post_id == $post_id_2 ){
												  echo 'selected';
											  } ?>>
                                                <a href="<?php the_permalink(); ?>">
													<?php the_title(); ?>
                                                </a>
                                              </option>
						  <?php wp_reset_query();endwhile; endif; ?>
                                </optgroup>
				    <?php
			    }
			  ?>
                      </select>
                    </label>
                  </div>
                  <h3 class="headline-3 word-up"><?=$current_cat_index?>. <?=$category[0]->cat_name;?></h3>
                  <h6 class="headline-8 iv-st-from-bottom"><span class="sub"><?=$current_cat_index?>.<?=$current_post_index?></span> <?=get_the_title( $post_id )?></h6>
                  <div class="paragraph-1 wysiwyg-block small-fz iv-st-from-bottom">
	                  <?=get_post_field( 'post_content', $post_id );?>
                  </div>
	                <?php
		                $posttags = get_the_tags( $post_id );
		                $count    = 0;
		                $sep      = '';
		                if( $posttags ){
			                echo '<div class="tags-wrapper iv-st-from-bottom"><p class="headline-3">Tags:</p> ';
			                foreach( $posttags as $tag ){ ?>
                              <a href="<?=get_tag_link( $tag->term_id )?>">
				                  <?=$tag->name?>
                              </a>
			                <?php }
			                echo '</div>';
		                }
	                ?>
                  <div class="written-by d-flex align-items-center iv-st-from-bottom">
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>">
                      <img alt="<?php echo $author_name; ?>"
                           src="<?=get_avatar_url( get_the_author_meta( 'ID' ) ) ? get_avatar_url( get_the_author_meta( 'ID' ) ) : get_template_directory_uri();?>/assets/images/se.png"/>
                    </a>
                    <p class="paragraph-1">Writen by
                      <span>
                   <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php the_author(); ?></a>
</span></p>
                  </div>
	                <?php
		                nextPost( $post_id, $current_cat_index, $current_post_index );
	                ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php
	endwhile;
	get_footer();