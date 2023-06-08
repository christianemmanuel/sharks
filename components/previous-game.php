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