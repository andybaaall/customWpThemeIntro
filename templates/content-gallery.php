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

<!-- <div class="card mb-2 mt-2"> --> <!-- rows -->
<div class="card">	<!-- grid -->
	<div class="card-body border-danger">
		<div class="card-title">
			<?php the_title(); ?>
		</div>
		<a href="<?php the_permalink(); ?>" class="btn btn-round btn-danger">view gallery</a>
	</div>
</div>
