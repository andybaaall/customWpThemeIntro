<?php
/*
Template Name: All Movies Template
Template Post Type: page
*/

get_header();
?>

<div class="container">
	<div class="row">
		<div class="col">
			<?php
			// $args = array(
			//
			// );
			// $query = new WP_Query($args);
			?>
			<?php if (have_posts()): ?>
				<?php while (have_posts()): the_post(); ?>
					<!-- some nice styling -->
					<div class="col">
						<div class="card">
							<?php echo the_content(); ?>
						</div>
					</div>

				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>

	<?php
	$args = array(
		'post_type' => 'movie'
		// https://developer.wordpress.org/reference/classes/wp_query/#post-type-parameters
	);
	$allMovies = new WP_Query($args);
	// print_r($allMovies);
	 ?>

	 <?php if ($allMovies->have_posts()): ?>
	 	<?php while ($allMovies-> have_posts()): $allMovies->the_post(); ?>
			<div class="col">
				<div class="card">
					<?php echo the_title(); ?>
				</div>
			</div>
		<?php endwhile; ?>
	 <?php endif; ?>
</div>

<?php
get_footer();
 ?>
