<?php
  /* Template Name: Contact */
  get_header();
  ?>

  <section class="contact-container">
    <div class="contact-form-wrapper">
      <div class="contact-for-header">
        <h3>Contact us</h3>
        <p>For any concerns kindly send us a message</p>
      </div>
      
      <?php the_content(); ?>
    </div>
  </section>

  <?php get_template_part('includes/section', 'footer'); ?>

  <?php get_footer(); ?>