<?php
/*
Template Name: Banner Page
Template Post Type: page, post
*/

get_header();
?>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><?php echo get_bloginfo('name'); ?></h1>
    <p class="lead"><?php echo the_excerpt('')?> </p>
  </div>
</div>
<div class="container">
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
