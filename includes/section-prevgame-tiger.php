<?php
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $args = array(
    'post_type' => 'match',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'paged' => $paged,
    'orderby' => 'date',
    'meta_query' => array(
      array(
        'key'     => 'choose_arena',
        'value'   => 'tiger',
      ),
    )
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
            <div class="previous-match-details card-details flex-col align-start">
              <div class="left-desc">
                <p class="card-title"><?php the_title(); ?></p>
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
	  <p>There has been no previous game at this time.</p>
  <?php endif; ?>

  <?php wp_reset_postdata(); ?>
