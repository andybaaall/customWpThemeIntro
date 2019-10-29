<?php
// echo('Hello, world!');
get_header(); // wp function that replaces require(template)
?>

</div>
<?php if(has_header_image()): ?>
	<div class="container-fluid p-0">
		<div class="headerImage" style="background-image:url(<?php echo get_header_image(); ?>);">
			<h1 class="display-3"><?php echo get_bloginfo('name'); ?></h1>
		</div>
	</div>
<?php else: ?>
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<h1 class="display-3"><?php echo get_bloginfo('name'); ?></h1>
			</div>
		</div>
	</div>
<?php endif; ?>

<div class="container">
	<div class="row">
		<?php if (have_posts()): ?>
			<?php while (have_posts()): ?>
				<?php the_post(); ?>
				<div class="col-12 col-md-4 mb-3">
					<?php get_template_part( 'templates/content', get_post_format()); ?>
				</div>
			<?php endwhile; ?>
		<?php else: ?>
			<?php echo 'no posts'; ?>
		<?php endif; ?>
	</div>
	<!-- pagination / page navigation -->
	<?php
	// how many total posts?
	$count_posts = wp_count_posts();
	// print_r($count_posts);
	$published_posts = $count_posts->publish;
	// var_dump($published_posts);

	// how many posts per page in options->reading?
	$default_posts_per_page = get_option( 'posts_per_page' );
	// var_dump($default_posts_per_page);

	?>
	<?php if ($published_posts > $default_posts_per_page): ?>
		<div class="row">
			<?php
			$args = array(
				'type' => 'array'
			);

			$paginationLinks = paginate_links($args);
			// echo('<pre>');
			// var_dump($paginationLinks);
			// echo('</pre>');
			?>

			<nav aria-label="Page navigation">
				<ul class="pagination">
					<?php foreach ($paginationLinks as $link): ?>
						<li class="page-item">
							<?php
							echo str_replace('page-numbers', 'page-link', $link);
							?>
							<!-- string_replace takes three options - what we're replacing, what we want to replace it with, and where to find that thing-->
						</li>
						<?php
						// var_dump($link)
						?>
					<?php endforeach; ?>
				</ul>
			</nav>

			<p><?php //the_posts_pagination($args); ?></p>
		</div>

	<?php endif; ?>
</div>




<?php
get_footer(); // wp function that replaces require(template)
?>
