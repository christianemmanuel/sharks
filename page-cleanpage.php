<?php
/* Template Name: Clean Page */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <!-- Mobile -->
  <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/assets/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory'); ?>/assets/favicon/favicon-16x16.png">

	<meta name="msapplication-TileColor" content="#EB6900">
	<meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>
</head>

<body>

  <?php if (is_user_logged_in() ) : ?>
    <script>
      window.location.replace("/");
    </script>
  <?php else : ?>
    <?php the_content(); ?>
  <?php endif; ?>
  
  <?php wp_footer(); ?>
</body>
</html>
