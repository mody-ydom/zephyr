<?php wp_footer(); ?>
<!--footer-->
<?php
$footer_logo = get_field('footer_logo', 'options');
$copywrite_text = get_field('copywrite_text', 'options');
$facebook_url = get_field('facebook_url', 'options');
$linkedin_url = get_field('linkedin_url', 'options');
$youtube_url = get_field('youtube_url', 'options');
$subscribe_to_newsletter = get_field('subscribe_to_newsletter', 'options');
?>

<footer>
    <div class="container">
        <div class="footer-content">
            <!--        logo and copy right-->
            <div class="logo-and-copy iv-st-from-bottom">
                <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo $footer_logo['url']; ?>" alt="logo.png">
                </a>
                <p class="paragraph">
                    <?php echo $copywrite_text; ?>
                </p>
            </div>
            <!--      links-->
            <div class="links">
                <div class="title-and-link iv-st-from-bottom  newsletter">
                    <h3 class="headline-7">JOIN OUR NEWSLETTER</h3>
                    <input type="email" placeholder="Email">
                    <a class="btn has-bg" href="#">Submit</a>
                </div>

                <?php while (have_rows('footer_links', 'options')):the_row(); ?>
                    <?php if (get_row_layout() == 'footer_links_block'):
                        $block_title = get_sub_field('block_title');
                        ?>
                        <div class="title-and-link iv-st-from-bottom  <?php echo strtolower($block_title); ?>">
                            <?php if ($block_title == 'social'):
                                ?>
                                <h3 class="headline-7 mobile">FOLLOW</h3>
                                <h3 class="headline-7 desktop">SOCIAL</h3>
                                <div class="icons mobile-only">
                                    <a class="icon" href="#">
                                        <svg class="tw" width="25" height="21" viewBox="0 0 25 21" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22.4121 5.54688C23.3887 4.81445 24.2676 3.93555 24.9512 2.91016C24.0723 3.30078 23.0469 3.59375 22.0215 3.69141C23.0957 3.05664 23.877 2.08008 24.2676 0.859375C23.291 1.44531 22.168 1.88477 21.0449 2.12891C20.0684 1.10352 18.75 0.517578 17.2852 0.517578C14.4531 0.517578 12.1582 2.8125 12.1582 5.64453C12.1582 6.03516 12.207 6.42578 12.3047 6.81641C8.05664 6.57227 4.24805 4.52148 1.70898 1.44531C1.26953 2.17773 1.02539 3.05664 1.02539 4.0332C1.02539 5.79102 1.9043 7.35352 3.32031 8.28125C2.49023 8.23242 1.66016 8.03711 0.976562 7.64648V7.69531C0.976562 10.1855 2.73438 12.2363 5.07812 12.7246C4.6875 12.8223 4.19922 12.9199 3.75977 12.9199C3.41797 12.9199 3.125 12.8711 2.7832 12.8223C3.41797 14.873 5.32227 16.3379 7.56836 16.3867C5.81055 17.7539 3.61328 18.584 1.2207 18.584C0.78125 18.584 0.390625 18.5352 0 18.4863C2.24609 19.9512 4.93164 20.7812 7.86133 20.7812C17.2852 20.7812 22.4121 13.0176 22.4121 6.23047C22.4121 5.98633 22.4121 5.79102 22.4121 5.54688Z"
                                                  fill="white"/>
                                        </svg>
                                    </a>
                                    <a class="icon" href="#">
                                        <svg class="fa" width="25" height="25" viewBox="0 0 25 25" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M24.6094 12.625C24.6094 5.93555 19.1895 0.515625 12.5 0.515625C5.81055 0.515625 0.390625 5.93555 0.390625 12.625C0.390625 18.6797 4.78516 23.709 10.5957 24.5879V16.1406H7.51953V12.625H10.5957V9.98828C10.5957 6.96094 12.4023 5.25195 15.1367 5.25195C16.5039 5.25195 17.8711 5.49609 17.8711 5.49609V8.47461H16.3574C14.8438 8.47461 14.3555 9.40234 14.3555 10.3789V12.625H17.7246L17.1875 16.1406H14.3555V24.5879C20.166 23.709 24.6094 18.6797 24.6094 12.625Z"
                                                  fill="white"/>
                                        </svg>
                                    </a>
                                    <a class="icon" href="#">
                                        <svg class="in" width="22" height="23" viewBox="0 0 22 23" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20.3125 0.6875H1.51367C0.683594 0.6875 0 1.41992 0 2.29883V21C0 21.8789 0.683594 22.5625 1.51367 22.5625H20.3125C21.1426 22.5625 21.875 21.8789 21.875 21V2.29883C21.875 1.41992 21.1426 0.6875 20.3125 0.6875ZM6.5918 19.4375H3.36914V9.03711H6.5918V19.4375ZM4.98047 7.57227C3.90625 7.57227 3.07617 6.74219 3.07617 5.7168C3.07617 4.69141 3.90625 3.8125 4.98047 3.8125C6.00586 3.8125 6.83594 4.69141 6.83594 5.7168C6.83594 6.74219 6.00586 7.57227 4.98047 7.57227ZM18.75 19.4375H15.4785V14.3594C15.4785 13.1875 15.4785 11.625 13.8184 11.625C12.1094 11.625 11.8652 12.9434 11.8652 14.3105V19.4375H8.64258V9.03711H11.7188V10.4531H11.7676C12.207 9.62305 13.2812 8.74414 14.8438 8.74414C18.1152 8.74414 18.75 10.9414 18.75 13.7246V19.4375Z"
                                                  fill="white"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="link desktop-only">
                                    <a class="paragraph" href="#"><span data-hover="Facebook">Facebook</span></a>
                                    <a class="paragraph" href="#"><span data-hover="Linkedin">Linkedin</span></a>
                                    <a class="paragraph" href="#"><span data-hover="Twitter">Twitter</span></a>
                                </div>
                            <?php else: ?>
                                <h3 class="headline-7"><?php echo $block_title; ?></h3>
                                <div class="link">
                                    <?php while (have_rows('links', 'options')): the_row();
                                        $link = get_sub_field('link');
                                        ?>
                                        <a class="paragraph" href="<?php echo $link['url']; ?>"><span
                                                    data-hover="<?php echo $block_title; ?>"><?php echo $link['title']; ?></span>
                                        </a>
                                    <?php endwhile; ?>
                                </div>

                            <?php endif;
                            ?>

                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</footer>

</main><!--end of Barba-->
</div><!--end of smooth-scroll-->
</body>
</html>