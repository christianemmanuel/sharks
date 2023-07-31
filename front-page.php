<?php get_header();?>

  <section class="match-results-wrap sharks-slider-wrap sld-border-bottom">
    <h4 class="heading-with-cta"><span>MATCH RESULTS</span></h4>
    
    <p class="empty-match-results">Fetching match results...</p>
    <div id="match-results" class="match-results-list match-results-slider temp-class-sld"></div>
  </section>

  <section class="arenas-livestream-wrap sharks-slider-wrap sld-border-bottom">
    <div class="arenas-livestream-list temp-class-sld">
      
      <?php
          $paged = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;
          $args = array(
            'post_type' => 'arena',
            'post_status' => 'publish',
            'posts_per_page' => 9,
            'paged' => $paged,
          );
          $arr_posts = new WP_Query( $args );

          if ( $arr_posts->have_posts() ) : while ( $arr_posts->have_posts() ) : $arr_posts->the_post(); ?>

            <?php if( have_rows('arena_detail') ): ?>
              <?php while( have_rows('arena_detail') ): the_row(); ?>
                
                <?php if( get_sub_field('livestream_option') == 'live' && get_sub_field('livestream_url')): ?> 

                  <div class="livestream-item">
                    <div class="livestream-card">
                      <div class="arena-logo">
                        <img src="<?php the_sub_field('arena_logo'); ?>" alt="Arena logo">
                      </div>
                      <a href="<?php the_permalink(); ?>" class="livestream-thumbnail">
                        <?php if (get_field('thumbnail')) : ?>
                          <img src="<?php the_field('thumbnail'); ?>" alt="image">
                        <?php else : ?>
                          <img src="<?php bloginfo('template_directory'); ?>/assets/db-assets/placeholder-logo.jpg" alt="Thumbnail">
                        <?php endif;  ?>
                        <span class="icon-play"></span>
                      </a>
                      <div class="livestream-details card-details">
                        <div class="left-desc">
                          <h5><?php the_title(); ?></h5>
                        </div>

                        <div class="right-desc">
                          <div class="live-badge">Live <i class="icon icon-circle"></i></div>
                          <div class="date"><?php echo date('F j, Y'); ?></div>
                          <div class="views hide">5.5k views <i class="icon icon-eye"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>

                <?php else: ?>
                  <!-- BLANK -->
                <?php endif; ?>

              <?php endwhile; ?>
            <?php endif; ?>

      <?php endwhile;
        endif; wp_reset_postdata(); 
      ?>

    </div>
  </section>

  <section class="upcoming-matches-wrap sharks-slider-wrap sld-border-bottom">
    <h4 class="heading-with-cta"><span>UPCOMING MATCHES</span></h4>
    <div class="global-slick-slider temp-class-sld">
      <?php
        $paged = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;
        $args = array(
          'post_type' => 'upcoming',
          'post_status' => 'publish',
          'posts_per_page' => 20,
          'paged' => $paged
        );
        $arr_posts = new WP_Query( $args );

        if ( $arr_posts->have_posts() ) : while ( $arr_posts->have_posts() ) : $arr_posts->the_post(); ?>

          <div class="slider-global-item">
            <div class="slider-card">
              <div class="preview-container">
                <a href="<?php the_field('thumbnail'); ?>" data-title="<?php the_title(); ?>" data-alt="<?php the_title(); ?>" data-lightbox="upcoming_matches">
                  <?php if (get_field('thumbnail')) : ?>
                    <img src="<?php the_field('thumbnail'); ?>" alt="<?php the_title(); ?>">
                  <?php else : ?>
                    <img src="<?php bloginfo('template_directory'); ?>/assets/db-assets/placeholder-logo.jpg" alt="Thumbnail">
                  <?php endif;  ?>
                </a>
              </div>
              <div class="bg-transparent justify-center card-details">
                <div class="text-center">
                  <h5><?php the_title(); ?></h5>
                  <p><?php the_field('date'); ?></p>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        <?php else : ?>
          <script>
            $('.upcoming-matches-wrap').remove();  
          </script>
        <?php endif; wp_reset_postdata(); ?>

    </div>
  </section>

  <section class="previous-matches-wrap sharks-slider-wrap sld-border-bottom">
    <h4 class="heading-with-cta"><span>PREVIOUS MATCHES</span> <a href="/previous-games/">See all</a></h4>
    <div class="previous-matches-list global-slick-slider temp-class-sld">

      <?php
        $paged = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;
        $args = array(
          'post_type' => 'match',
          'post_status' => 'publish',
          'posts_per_page' => 20,
          'paged' => $paged
        );
        $arr_posts = new WP_Query( $args );

        if ( $arr_posts->have_posts() ) : while ( $arr_posts->have_posts() ) : $arr_posts->the_post(); ?>

          <?php if( have_rows('previous_match_details') ): ?>
            <?php while( have_rows('previous_match_details') ): the_row(); ?>
              
            <a href="<?php the_permalink(); ?>" class="slider-global-item">
              <div class="slider-card">
                <div class="preview-container">
                  <?php if (get_field('thumbnail')) : ?>
                    <img src="<?php the_field('thumbnail'); ?>" alt="image" alt="<?php the_title(); ?>">
                  <?php else : ?>
                    <img src="<?php bloginfo('template_directory'); ?>/assets/db-assets/placeholder-logo.jpg" alt="Thumbnail">
                  <?php endif;  ?>
                </div>
                <div class="bg-transparent card-details">
                  <div class="left-desc">
                    <p><?php the_title(); ?></p>
                    <span class="small">
                      <?php if( get_sub_field('choose_arena') == 'tiger') : ?> 
                        Tiger Arena
                      <?php elseif(get_sub_field('choose_arena') == 'greatwhite') : ?>
                        Great White Arena
                      <?php elseif(get_sub_field('choose_arena') == 'hammerhead') : ?>
                        Hammerhead Arena
                      <?php elseif(get_sub_field('choose_arena') == 'bullshark') : ?>
                        Bull Shark Arena
                      <?php endif; ?>
                    </span>
                  </div>

                  <div class="right-desc">
                    <div class="views hide">5.5k <i class="icon icon-eye"></i></div>
                    <p class="nowrap"><?php the_sub_field('date'); ?></p>
                  </div>
                </div>
              </div>
            </a>

            <?php endwhile; ?>
          <?php endif; ?>

        <?php endwhile; ?>
        <?php else : ?>
          <script>
            $('.previous-matches-wrap').remove();  
          </script>
        <?php endif; wp_reset_postdata(); ?>

    </div>
  </section>

  <?php get_template_part('includes/section', 'footer'); ?>

<?php get_footer();?>