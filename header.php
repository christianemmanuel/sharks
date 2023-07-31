<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sharksbilliardleague
 */

?>
<!doctype html>
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
	<title>Sharks - The Mecca Of Pool</title>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<aside class="db-sidebar">
		<a href="/" class="nav-logo">
			<img src="<?php bloginfo('template_directory'); ?>/assets/logo.svg" alt="Sharks logo">
		</a>
		
		<div class="menu-list">

			<ul>
				<li><a href="/"><i class="icon icon-home"></i> Home</a></li>
				<li class="dropdown">
					<span><i class="icon icon-arena"></i> Arena</span>
					<ul class="submenu">
						<li><a href="/arena/greate-white-arena/">Great White Arena</a></li>
						<li><a href="/arena/tiger-arena/">Tiger Arena</a></li>
					</ul>
				</li>
				<li><a href="/contact"><i class="icon icon-call"></i> Contact</a></a></li>
			</ul>
		</div>
	</aside>

	<div class="toggle-aside"></div>

	<div class="main-content">
    <header class="db-top-menu">
      <div class="open-aside"></div>
      <div class="btn-login">
				<?php global $current_user; wp_get_current_user(); ?>
				<?php if ( is_user_logged_in() ) : ?>
					<a class="btn-header" href="javascript:void(0);">Hi, <?php echo $current_user->display_name ?> <i class="icon icon-user" style="border-radius: 50%; background-image: url(<?php echo get_avatar_url( get_current_user_id(), array( 'size' => 50 ) ); ?>);"></i></a>
					<div class="user-dropdown">
						<?php if(current_user_can('editor') || current_user_can('administrator')) { ?>
							<a href="<?php echo get_home_url() . '/wp-admin' ?>">Dashboard</a>
						<?php } ?>
						<!-- <a href="/edit-profile">Edit Profile</a> -->
						<a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a>
					</div>
				<?php else: ?>
					<a class="btn-header" href="<?php echo get_home_url() . '/login' ?>">Login / Signup 
					<i class="icon icon-user"></i></a>
				<?php endif; ?>
      </div>
    </header>
    
