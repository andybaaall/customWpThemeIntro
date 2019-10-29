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
</div>


<?php
get_footer(); // wp function that replaces require(template)
?>
