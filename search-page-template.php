<?php
/*
Template Name: Search Page
Template Post Type: page, post
*/

get_header();
?>

<div class="container">
	<div class="row">
		<div class="col">
			<form class="" action="<?php echo home_url(); ?>" method="get">
			<!-- using wordpress, we don't have to action to the search.php -->
				<div class="form-group row">
					<label for="searchBarInput" class="col-sm-2 col-form-label">What are you looking for?</label>
					<div class="col">
						<input type="text" class="form-control" name="s" id="searchBarInput" placeholder="e.g. 'Japale&#241;o poppers'" value="<?php the_search_query(); ?>"> <!-- wordpress search bars need to have this name & val. It'll configure yr search backend automatically-->
						<input type="hidden" name="post_type" value="post"><!-- this is one method we might use to filter results --> 
					</div>
					<button type="submit" class="btn btn-primary mb-2">Let's go.</button>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php if( have_posts() ): ?>
				<?php while( have_posts() ): the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php
get_footer();
?>
