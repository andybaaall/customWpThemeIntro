<div class="card">
	<div class="card-body border-danger">
		<div class="card-title">
			<?php the_title(); ?>
		</div>
		<?php
		if (has_blocks()) {
			$allBlocks = parse_blocks(get_the_content());
			// turning the content into an associative array

			for ($i=0; $i < count($allBlocks); $i++) {
				if ($allBlocks[$i]['blockName'] === 'core/gallery') {
					$firstGalleryBlock = $allBlocks[$i];
				};
			};
		};
		?>


		</div>
		<a href="<?php the_permalink(); ?>" class="btn btn-round btn-danger">view gallery</a>

	</div>
</div>
