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

<?php if(is_front_page()) : ?>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const date = new Date();
			const current_date = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+ date.getDate();
			
			fetch(`https://billiards.luckytaya.com/api/event/info/${current_date}`)
				.then(response => response.json())
				.then(data => {
					

					
				})
				.catch(error => {
					console.error(error);
				});
		})
	</script>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
