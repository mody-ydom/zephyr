<?php
	get_header();
	$posts_per_page = get_field( 'podcasts_initial_number' );
	$load_more_text = get_field( 'load_more_text' );
	$categories     = get_terms( 'podcasts_categories' );
	while ( have_posts() ) : the_post();
		?>
      <section class="zephyr-block component-hero not-video">
        <img class="hero-img" src="<?=get_the_post_thumbnail_url()?>" alt="Podcast Image">
      </section>
      <!-- region Zephyr's Block -->
      <section class="single-podcast">
        <div class="container">
          <div class="podcast-card">
            <a class="hover-arrow back-to-all-podcasts" href="<?=site_url()?>/podcast">
              <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="long-arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <g class="fa-group">
                  <path fill="currentColor" d="M128.09 220H424a24 24 0 0 1 24 24v24a24 24 0 0 1-24 24H128.09l-35.66-36z" class="fa-secondary"></path>
                  <path fill="currentColor"
                        d="M142.56 409L7 273.5v-.06a25.23 25.23 0 0 1 0-34.84l.06-.06 135.5-135.49a24 24 0 0 1 33.94 0l17 17a24 24 0 0 1 0 33.94L92.43 256 193.5 358a24 24 0 0 1 0 33.94l-17 17a24 24 0 0 1-33.94.06z"
                        class="fa-primary"></path>
                </g>
              </svg>
              Back To All Podcasts
            
            </a>
            <div class="title">
              <h1 class="headline-3"><?=get_the_title()?></h1>
              <span class="date"><?=get_the_time( 'F Y, j' )?></span>
            </div>
            <div class="podcast-content">
              <div class="wysiwyg-block"><?=get_the_content()?></div>
              <div class="play-sound" data-audio="<?=get_field( 'audio', get_the_ID() )?>">
                <div class="play-pause-wave-container">
                  <div class="play-pause" disabled>
                    <img src="<?=get_template_directory_uri()?>/play-audio.png" alt="play-audio">
                  </div>
                  <div class="wave-container"></div>
                </div>
                <div class="time">
                  <span class="current">00:00.0</span> / <span class="duration">00:00.0</span>
                </div>
              </div>
				<?php $notes = get_field( 'notes', get_the_ID() ) ?>
				<?php if ( $notes ) { ?>
                  <div class="notes">
                    <h2 class="tag">Show Notes</h2>
					  <?php foreach ( $notes as $note ): ?>
                        <div class="note">
                          <span class="small-text time" data-time="<?=$note['time']?>"><?=$note['time']?></span>
                          <p class="small-text description"><?=$note['text']?></p>
                        </div>
					  <?php endforeach; ?>
                  </div>
				<?php } ?>
            </div>
          </div>
        </div>
      </section> <!-- please don't remove me -->
	<?php
	endwhile; // End of the loop.
	get_footer();