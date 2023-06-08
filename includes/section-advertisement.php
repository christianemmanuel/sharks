
<?php
    $paged = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;
    $args = array(
      'post_type' => 'sharksadvertisements',
      'post_status' => 'publish',
      'posts_per_page' => 1,
      'paged' => $paged,
    );
    $arr_posts = new WP_Query( $args );

    if ( $arr_posts->have_posts() ) : while ( $arr_posts->have_posts() ) : $arr_posts->the_post(); ?>

      <!-- ACF LOOPING -->
      <?php if( have_rows('advertisement') ): ?>
        <?php while( have_rows('advertisement') ): the_row(); ?>

        <?php if ( get_sub_field('ads_image' ) ): ?>

          <a href="<?php the_sub_field('ads_url'); ?>" class="ads-aside" target="_blank">
            <img src="<?php the_sub_field('ads_image'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
          </a>

        <?php else: ?>
          <!-- BLANK -->
        <?php endif; ?>

        <?php endwhile; ?>
      <?php endif; ?>

    <?php endwhile;
  endif; wp_reset_postdata(); 
?>
