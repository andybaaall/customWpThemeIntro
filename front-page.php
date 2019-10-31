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
		<!-- sidebar nav -->
		<div class="col-2 h-100">
			<?php if(has_nav_menu('sidebar_navigation')): ?>
				<div class="card h-100 mb-2 mt-2 p-2">
					<?php wp_nav_menu( array('theme_location' => 'side_navigation')); ?>
				</div>
			<?php endif; ?>
		</div>

		<!-- if there are posts -->
		<div class="col-10 h-100">
			<?php if (have_posts()): ?>
				<?php while (have_posts()): ?>
					<?php the_post(); ?>
						<?php get_template_part( 'templates/content', get_post_format()); ?>
				<?php endwhile; ?>
		</div>


		<?php else: ?>
			<?php echo 'no posts'; ?>
		<?php endif; ?>
	</div>
</div>

<!-- mission statement thing / jumbotron -->
<?php if (get_theme_mod('1902_frontPageJumbotronImage') != null): ?>
	<div class="row">
		<div class="missionStatementBackground jumbotron w-100 d-flex justify-content-center">
			<h2 class="display-4 text-light"><?php echo get_theme_mod('1902_frontPageJumbotronText', 'This is what we do. Climb aboard.') ?></h2>
		</div>
	</div>
<?php endif; ?>




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
<div class="container">
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

	<!-- next / previous buttons -->
	<div class="row">
		<div class="col d-flex justify-content-between my-2">
			<?php
			add_filter('next_posts_link_attributes', 'posts_link_attributes');
			add_filter('previous_posts_link_attributes', 'posts_link_attributes');
			// https://developer.wordpress.org/reference/functions/add_filter/ - check this out!
			function posts_link_attributes() {
				return 'class="btn btn-round btn-primary"';
			}
			?>
			<?php if (previous_posts_link()): ?>
				<?php echo previous_posts_link(); ?>
			<?php endif; ?>

			<?php if (next_posts_link()): ?>
				<?php echo next_posts_link(); ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<div class="row">
	<div id="frontPageFooter" class="colp-5 bg-light w-100 p-5">
		<p class="d-flex justify-content-center"><?php echo get_theme_mod('1902_footerMessage', '&copy; Cool Theme, powered by Wordpress'); ?></p>

	</div>
</div>


<?php
get_footer(); // wp function that replaces require(template)
?>
