<?php
get_header();
global $post;
$category = get_the_category();
$author_id = $post->post_author;
$author_name = get_the_author_meta('user_nicename', $author_id);
$post_id = get_the_ID();
?>
    <section class="component-growth-guide">
        <div class="container">
            <div class="growth-guide">
                <div class="growth-guide-title center">
                    <h6 class="headline-6 normal word-up">GROWTH GUIDE</h6>
                    <h2 class="headline-2 word-up"><?php the_title(); ?></h2>
                </div>
                <div class="growth-guide-content">
                    <div class="row">
                        <div class="col-12 col-md-auto">
                            <div class="left-content">
                                <ol class="guide-container">
                                    <?php
                                    $args = array('hide_empty' => '0');
                                    $categories = get_categories($args);
                                    foreach ($categories as $category) {
                                        ?>
                                        <li class="guide iv-st-from-bottom">
                                            <div class="title">
                                                <h3><?php echo $category->name; ?></h3>
                                                <div class="icons">
                                                    <span class="plus icon">+</span>
                                                    <span class="minus icon">-</span>
                                                </div>
                                            </div>
                                            <?php subCategories($category); ?>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ol>
                                <div class="search-input iv-st-from-bottom">
                                    <div class="input-wrapper">
                                        <input placeholder="Type to Search" type="search">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M6.60859 1.10385C9.64401 1.10385 12.1135 3.57336 12.1135 6.60878C12.1135 9.64401 9.64401 12.1135 6.60859 12.1135C3.57336 12.1135 1.10385 9.64401 1.10385 6.60878C1.10385 3.57336 3.57336 1.10385 6.60859 1.10385ZM11.6528 10.8724C12.663 9.67915 13.2174 8.17202 13.2174 6.60878C13.2174 2.96458 10.2528 0 6.60859 0C2.96458 0 0 2.96458 0 6.60878C0 10.2528 2.96458 13.2174 6.60859 13.2174C8.17183 13.2174 9.67896 12.663 10.8724 11.6528L15.2196 16L16 15.2196L11.6528 10.8724Z"
                                                  fill="#606060"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md">
                            <div class="right-content">
                                <h3 class="headline-3 word-up"><?php echo $category->name; ?></h3>
                                <h6 class="headline-8 iv-st-from-bottom">Who is this guide for?
                                </h6>
                                <div class="paragraph-1 small-fz iv-st-from-bottom">
                                    <?php the_content(); ?>
                                </div>
                                <div class="written-by d-flex align-items-center iv-st-from-bottom">
                                    <img alt="name of person"
                                         src="<?php echo get_template_directory_uri(); ?>/assets/images/se.png">
                                    <p class="paragraph-1">Writen by
                                        <span><?php echo $author_name; ?>
</span></p>
                                </div>
                                <?php
                                nextPost($post_id);
                                ?>
                                <div class="mobile-select iv-st-from-bottom">
                                    <svg class="arrow-select" width="11" height="7" viewBox="0 0 11 7"
                                         fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.18945 6.2168C5.45312 6.48047 5.89258 6.48047 6.15625 6.2168L10.1406 2.23242C10.4336 1.93945 10.4336 1.5 10.1406 1.23633L9.49609 0.5625C9.20312 0.298828 8.76367 0.298828 8.5 0.5625L5.6582 3.4043L2.8457 0.5625C2.58203 0.298828 2.14258 0.298828 1.84961 0.5625L1.20508 1.23633C0.912109 1.5 0.912109 1.93945 1.20508 2.23242L5.18945 6.2168Z"
                                              fill="#252525"/>
                                    </svg>

                                    <select class="headline-6">
                                        <option selected>Go to chapter</option>
                                        <option>Go to chapter two</option>
                                        <option>Go to chapter three</option>
                                        <option>Go to chapter four</option>
                                        <option>Go to chapter five</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();