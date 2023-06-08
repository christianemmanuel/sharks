<?php if ( is_user_logged_in() ) : ?>
		
	<?php get_header();?>

	<?php if(have_posts()) :  while(have_posts()) : the_post(); ?>
	<?php if( have_rows('arena_detail') ): ?>
	<?php while( have_rows('arena_detail') ): the_row(); ?>

	<div class="video-page-container">
		<div class="video-page-livestream">

			<!-- CONDITION IF LIVESTREAM URL IS AVAILABLE -->
			<?php if( get_sub_field('livestream_option') == 'live' && get_sub_field('livestream_url')): ?> 
			
				<div class="video-playing-wrapper">
					<div class="video-playing-iframe">
						<iframe src="<?php the_sub_field('livestream_url'); ?>" title="livestream video" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
					</div>

					<?php if(in_category('great-white-arena')): ?> 
						<div class="video-playing-detail mt-1">
							<h3 class="uppercase" id="game-title"></h3>
						</div>

						<div class="video-playing-description uppercase">
							<div id="game-players"></div>
							<ul>
								<li id="game-date"></li>
							</ul>
						</div>
					<?php elseif(in_category('bull-shark-arena')): ?>
						
					<?php elseif(in_category('hammerhead-arena')): ?>
						
					<?php elseif(in_category('tiger-arena')): ?>
						<div class="video-playing-detail mt-1">
							<h3 class="uppercase" id="game-title"></h3>
						</div>

						<div class="video-playing-description uppercase">
							<div id="game-players"></div>
							<ul>
								<li id="game-date"></li>
							</ul>
						</div>
					<?php else : ?>
						
					<?php endif; ?>
					
				</div>

			<?php else: // livestream_url returned false ?>
				<div class="video-playing-description uppercase mt-0 mb-2">
					<p class="no-livestream">Livestream is not available at this time...</p>
				</div>
			<?php endif; // end of if livestream_url logic ?>

			<section class="previous-matches-wrap">
				
				<h4>PREVIOUS MATCHES</h4>

				<div class="previous-matches-list previous-matches-tiles">

					<?php if(in_category('great-white-arena')): ?> 
						<!-- GREAT WHITE ARENA PREVIOUS GAME -->
						<?php get_template_part('includes/section', 'prevgame-greatwhite'); ?>

					<?php elseif(in_category('bull-shark-arena')): ?>
						<!-- BULLSHARK ARENA PREVIOUS GAME -->
						<?php get_template_part('includes/section', 'prevgame-bullshark'); ?>

					<?php elseif(in_category('hammerhead-arena')): ?>
						<!-- HAMMERHEAD ARENA PREVIOUS GAME -->
						<?php get_template_part('includes/section', 'prevgame-hammerhead'); ?>

					<?php elseif(in_category('tiger-arena')): ?>
						<!-- TIGER ARENA PREVIOUS GAME -->
						<?php get_template_part('includes/section', 'prevgame-tiger'); ?>
					
					<?php else : ?>
						<p>There has been no previous game at this time.</p>
					<?php endif; ?>
					
				</div>
			</section>

		</div>

		<div class="aside-video-details">
			<div class="arenas-slider hide-mobile">
				<?php previous_post_link(); ?>   
				<div class="arenas-slider-list">
					<a href="<?php the_permalink() ?>" class="arenas-slider-item">
						<img src="<?php the_sub_field('arena_logo'); ?>" alt="Arena logo">
					</a>
				</div>
				<?php next_post_link(); ?>
			</div>
			<div id="eventInfo" class="game-schedule-details">
				<?php if(in_category('great-white-arena')): ?> 
					<?php require("services/great-white-api.php"); ?>
					<ul>
						<li class="initialize_loading">Initializing Game Schedule...</li>
					</ul>
				<?php elseif(in_category('bull-shark-arena')): ?>
					
				<?php elseif(in_category('hammerhead-arena')): ?>
					
				<?php elseif(in_category('tiger-arena')): ?>
					<?php require("services/tiger-api.php"); ?>
					<ul>
						<li class="initialize_loading">Initializing Game Schedule...</li>
					</ul>
				<?php else : ?>
					
				<?php endif; ?>
				
			</div>

			<?php get_template_part('includes/section', 'advertisement'); ?>
		</div>
	</div>

	<?php get_template_part('includes/section', 'footer'); ?>

	<?php endwhile; ?>
	<?php endif; ?>

	<?php endwhile; ?>

	<?php else: ?>
			<p>Nothing to post</p>
	<?php endif; ?>

	<?php get_footer();?>

<?php else : ?>
	<?php wp_redirect('/login');  ?>
<?php endif; ?>
