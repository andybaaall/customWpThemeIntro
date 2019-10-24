<?php
// we need to specify that this is a template - it's a $custom.php template
// the following comment lets the WP dashboard access this template
// we can't enforce the use of a particular slug, but we can sort-of-enforce
// the use of an appropriate template for the appropriate content -
// e.g. a gallery template, an about page template, a testimonials page template ...

// we can also specify which post types this template can be applied to.

/*
	Template Name: Full Width
	Template Post Type: page, post
*/

get_header();
 ?>

 <div class="container">
 	<div class="row">
 		<div class="col">
 			<?php if( have_posts() ): ?>
 				<?php while( have_posts() ): the_post(); ?>
 					<div class="card my-2 h-100">
 						<h5 class="card-header"><?php the_title(); ?></h5>
 						<div class="card-body">
 							<?php the_content(); ?>
 						</div>
 					</div>
 				<?php endwhile; ?>
 			<?php endif; ?>
 		</div>
 	</div>
 </div>
 
 <?php
get_footer();
  ?>
