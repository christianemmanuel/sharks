<?php if ( is_user_logged_in() ) : ?>

  <?php
  /* Template Name: Matches */
  get_header();
  ?>

  <section class="previous-matches-wrap previous-matches-page pl-0">
    <h4 class="heading-with-cta"><span>Previous Matches</span></h4>
    <div class="previous-matches-list">

      <?php get_template_part('includes/section', 'previous-game'); ?>

    </div>
  </section>

  <?php get_template_part('includes/section', 'footer'); ?>

  <?php get_footer(); ?>

<?php else : ?>

	<?php wp_redirect('/login');  ?>
  
<?php endif; ?>
