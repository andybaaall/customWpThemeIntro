<?php
/*
Template Name: All Movies Template
Template Post Type: page
*/

get_header();

// $page = get_page_by_title(get_the_title());
// $title = apply_filters('the_content', $page->post_title);
// $content = apply_filters('the_content', $page->post_content);
// going to do this again, but using the loop
?>

<div class="container">
	<div class="row">
		<div class="col">
			<h1><?php echo the_title(); ?></h1>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php
			if ( have_posts() ) :
			   while ( have_posts() ) : the_post();
				  ?> <div><?php echo the_content(); ?><div> <?php
			   endwhile;
		   	endif;
			 ?>
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

	<div class="row">
			<?php if ($allMovies->have_posts()): ?>
	   	 	<?php while ($allMovies-> have_posts()): $allMovies->the_post(); ?>
				<div class="col-4 h-100">
					<div class="card">
	   					<div class="card-body">
	   						<div class="card-title h3"> <?php echo the_title(); ?> </div>
	   						<div class="card-text"> <?php echo the_content(); ?> </div>
							<div class="card-text mb-2">
								<span class="badge badge-primary">
									<?php echo get_post_meta( get_the_id(), '1902_year', true);?>
									<!-- we give get_post_meta() the page ID and the meta key
										 and it retrieves the value -->
								</span>
								<span class="badge badge-primary">
									<?php echo get_post_meta( get_the_id(), '1902_genre', true);?>
									<!-- we give get_post_meta() the page ID and the meta key
										 and it retrieves the value -->
								</span>

							</div>
	   						<a href="<?php echo the_permalink() ?>" class="btn btn-primary">More Info</a>
	   					</div>
	   				</div>
				</div>
	   		<?php endwhile; ?>
	   	 <?php endif; ?>
	</div>
</div>

<?php
get_footer();
// print_r( get_post_meta(get_the_id(), '', true ) );
