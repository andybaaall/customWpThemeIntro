<!-- card w/ if else conditional tree for different post formats -->

<div class="card">
	<?php if (has_post_thumbnail()): ?>
		<?php
		set_post_thumbnail_size( 100, 100 );
		echo the_post_thumbnail()
		?>
	<?php endif; ?>
	<div class="card-body">
		<div class="card-title"><?php the_title(); ?></div>
		<p class="card-text"><?php the_excerpt(); ?></p>
		<a href="<?php the_permalink() ?>" class="btn btn-round btn-primary">permalink</a>
	</div>
</div>
