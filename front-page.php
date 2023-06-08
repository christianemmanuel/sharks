<?php get_header();?>

  <section class="arenas-livestream-wrap sharks-slider-wrap">
    <div class="arenas-livestream-list temp-live-class-sld">
      
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
                        <?php if (get_the_post_thumbnail_url()) : ?>
                          <img src="<?php the_post_thumbnail_url('arena_thumbnail'); ?>" alt="image">
                        <?php else : ?>
                          <img src="<?php bloginfo('template_directory'); ?>/assets/db-assets/placeholder.jpg" alt="Livestream thumbnail">
                        <?php endif;  ?>
                        <span class="icon-play"></span>
                      </a>
                      <div class="livestream-details card-details">
                        <div class="left-desc">
                          <h5><?php the_sub_field('title'); ?></h5>
                          <p class="players"><?php the_sub_field('players'); ?></p>
                          <p><?php the_sub_field('day'); ?> | <?php the_sub_field('pool_game'); ?> | Race to <?php the_sub_field('race_to'); ?></p>
                        </div>

                        <div class="right-desc">
                          <div class="live-badge">Live <i class="icon icon-circle"></i></div>
                          <div class="date">
                            <?php the_sub_field('date'); ?>          
                          </div>
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

  <section class="previous-matches-wrap sharks-slider-wrap">
    <h4 class="heading-with-cta"><span>PREVIOUS MATCHES</span> <a href="/previous-games/">See all</a></h4>
    <div class="previous-matches-list previous-matches-slider temp-prev-class-sld">

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
              
            <a href="<?php the_permalink(); ?>" class="previous-match-item">
              <div class="previous-match-card">
                <div class="previous-match-thumbnail">
                  <?php if (get_the_post_thumbnail_url()) : ?>
                    <img src="<?php the_post_thumbnail_url('arena_thumbnail'); ?>" alt="<?php the_title(); ?>">
                  <?php else : ?>
                    <img src="<?php bloginfo('template_directory'); ?>/assets/db-assets/placeholder.jpg" alt="Previous match thumbnail">
                  <?php endif;  ?>
                </div>
                <div class="previous-match-details card-details">
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

        <?php endwhile;
          endif; wp_reset_postdata(); 
        ?>

    </div>
  </section>

  <!-- <section class="match-results-wrap sharks-slider-wrap">
    <h4 class="heading-with-cta"><span>MATCH RESULTS</span></h4>

    <div class="match-results-list match-results-slider temp-prev-class-sld">
      <div class="arenas-livestream-list temp-result-class-sld">
        
        <div class="match-result-item">

        </div>

      </div>
    </div>
  </section> -->

  <?php get_template_part('includes/section', 'footer'); ?>

<?php get_footer();?>