<div class="card">
	<div class="card-body border-danger">
		<div class="card-title">
			<?php the_title(); ?>
		</div>
		<?php echo the_content(); ?>
		<a href="<?php the_permalink(); ?>" class="btn btn-round btn-danger">view gallery</a>

	</div>
</div>
