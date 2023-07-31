<?php if ( is_user_logged_in() ) : ?>

<?php get_header();?>

	<?php if(have_posts()) :  while(have_posts()) : the_post(); ?>
	<?php if( have_rows('previous_match_details') ): ?>
	<?php while( have_rows('previous_match_details') ): the_row(); ?>

	<div class="video-page-container">
		<div class="video-page-livestream">

			<div class="video-playing-wrapper">
				<div class="video-playing-iframe">
					<iframe src="<?php the_sub_field('video_url'); ?>" title="livestream video" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				</div>

				<div class="video-playing-detail mt-1">
					<h3 class="uppercase"><?php the_title(); ?></h3>
					<div class="livestream-like">
						<?php the_content(); ?>
						<div class="toggle-share-social-media">
							<i class="icon icon-share"></i>
							<span>Share</span>
						</div>
					</div>
				</div>

				<div class="video-playing-description uppercase">
					<p><?php the_sub_field('players_list'); ?></p>
					<ul>
						<?php if (get_sub_field('day')) : ?>
							<li><?php the_sub_field('day'); ?></li>
						<?php endif; ?>
						<?php if (get_sub_field('pool_game')) : ?>
							<li><?php the_sub_field('pool_game'); ?></li>
						<?php endif; ?>
						<?php if (get_sub_field('race_to')) : ?>
							<li><?php the_sub_field('race_to'); ?></li>
						<?php endif; ?>
						<?php if (get_sub_field('date')) : ?>
							<li><?php the_sub_field('date'); ?></li>
						<?php endif; ?>
					</ul>
					<p>
						<?php if( get_field('choose_arena') == 'tiger') : ?> 
							Tiger Arena
						<?php elseif(get_field('choose_arena') == 'greatwhite') : ?>
							Great White Arena
						<?php elseif(get_field('choose_arena') == 'hammerhead') : ?>
							Hammerhead Arena
						<?php elseif(get_field('choose_arena') == 'bullshark') : ?>
							Bull Shark Arena
						<?php endif; ?>
					</p>
					<span class="hide">200 watching now</span>
				</div>
			</div>

			<section class="previous-matches-wrap">
				<h4 class="heading-with-cta"><span>PREVIOUS MATCHES</h4>

				<div class="previous-matches-list previous-matches-tiles">

				<?php if( get_field('choose_arena') == 'tiger') : ?> 
					<?php 
            $args = array(
							'post_type'   => 'match',
							'showposts'  => -1,
							'meta_key'    => 'choose_arena',
							'meta_value'   => 'tiger'
            );

            $theposts = get_posts( $args );
            foreach($theposts as $post) :
            setup_postdata($post); 
					?>

						<?php require("components/previous-game.php"); ?>

					<?php
						endforeach;
						wp_reset_postdata();
          ?>

				<?php elseif(get_field('choose_arena') == 'greatwhite') : ?>
					
					<?php 
            $args = array(
							'post_type'   => 'match',
							'showposts'  => -1,
							'meta_key'    => 'choose_arena',
							'meta_value'   => 'greatwhite'
            );

            $theposts = get_posts( $args );
            foreach($theposts as $post) :
            setup_postdata($post); 
					?>
           	
						<?php require("components/previous-game.php"); ?>

					<?php
						endforeach;
						wp_reset_postdata();
          ?>

				<?php elseif(get_field('choose_arena') == 'hammerhead') : ?>
					<?php 
            $args = array(
							'post_type'   => 'match',
							'showposts'  => -1,
							'meta_key'    => 'choose_arena',
							'meta_value'   => 'hammerhead'
            );

            $theposts = get_posts( $args );
            foreach($theposts as $post) :
            setup_postdata($post); 
					?>
           	
						<?php require("components/previous-game.php"); ?>

					<?php
						endforeach;
						wp_reset_postdata();
          ?>

				<?php elseif(get_field('choose_arena') == 'bullshark') : ?>
					<?php 
            $args = array(
							'post_type'   => 'match',
							'showposts'  => -1,
							'meta_key'    => 'choose_arena',
							'meta_value'   => 'bullshark'
            );

            $theposts = get_posts( $args );
            foreach($theposts as $post) :
            setup_postdata($post); 
					?>
           	
						<?php require("components/previous-game.php"); ?>

					<?php
						endforeach;
						wp_reset_postdata();
          ?>

				<?php endif; ?>

				</div>
			</section>
		</div>

		<div class="aside-video-details">
			<?php get_template_part('includes/section', 'advertisement'); ?>
		</div>
	</div>

	<?php endwhile; ?>
	<?php endif; ?>

	<?php endwhile; ?>

	<?php else: ?>
			<p>Nothing to post</p>
	<?php endif; ?>

<?php get_footer();?>

<?php else : ?>
	<?php 
		ob_clean();
		$url = get_home_url() . '/login';
		wp_redirect($url);
		exit(); 
	?>
<?php endif; ?>
