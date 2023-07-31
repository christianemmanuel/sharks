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
      </div>

      <div class="right-desc">
        <div class="views hide">5.5k <i class="icon icon-eye"></i></div>
        <p class="nowrap"><?php the_sub_field('date'); ?></p>
      </div>
    </div>
  </div>
</a>
