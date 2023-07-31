<?php
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $args = array(
    'post_type' => 'match',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'paged' => $paged,
    'orderby' => 'date',
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
                <p class="card-title"><?php the_title(); ?></p>
                <span class="small">
                  <?php if( get_field('choose_arena') == 'tiger') : ?> 
                    Tiger Arena
                  <?php elseif(get_field('choose_arena') == 'greatwhite') : ?>
                    Great White Arena
                  <?php elseif(get_field('choose_arena') == 'hammerhead') : ?>
                    Hammerhead Arena
                  <?php elseif(get_field('choose_arena') == 'bullshark') : ?>
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

  <!-- end of loop -->
  <?php endwhile; ?>
  <?php else : ?>
	  <p>No previous matches uploaded yet.</p>
  <?php endif; ?>

  <?php wp_reset_postdata(); ?>
