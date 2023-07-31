<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sharksbilliardleague
 */

?>

	<div id="stop" class="scrollTop">
		<span><a href="">Top</a></span>
	</div>

</div> <!-- main-content -->

<?php wp_footer(); ?>
<?php if(is_front_page()) : ?>
	<script type='text/javascript'>
		$('document').ready(function () {
			lightbox.option({
				'resizeDuration': 200,
				'wrapAround': true
			})
		});	
	</script>
<?php endif; ?>

</body>
</html>
