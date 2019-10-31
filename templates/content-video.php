<?php

if (has_blocks()){
	$allBlocks = parse_blocks(get_the_content());
	// echo '<pre>';
	// var_dump($allBlocks);
	// echo '</pre>';
	// die();

	for ($i=0; $i < count($allBlocks); $i++) {
		// we need to find any blocks that contain a video
		// echo '<pre>';
		// print_r($allBlocks);
		// print_r($allBlocks[$i]);

		// echo 'block number ' . $i . ' is a ' . $allBlocks[$i]['blockName'];
		// this is very like writing 'allBlocks[i].blockname' in JS
		// if we wanted to navigate through a couple of nested associative arrays, we might write
		// something like: '$allBlocks[0]['attrs'][0]'
			// cf: array(1) {
				    // [0]=>
				    // array(5) {
				    //     ["blockName"]=>
				    //     string(18) "core-embed/youtube"
				    //     ["attrs"]=>
				    //     array(4) {
				    //         ["url"]=>
				    //         string(28) "https://youtu.be/4yBG_nJW0R0"
				    //         ["type"]=>
				    //         string(5) "video"
				    //         ["providerNameSlug"]=>
				    //         string(7) "youtube"
				    //         ["className"]=>
				    //         string(40) "wp-embed-aspect-16-9 wp-has-aspect-ratio"
				    //     } ... &c. &c.

		if ($allBlocks[$i]['blockName'] === 'core-embed/youtube') {
			$firstVideoBlock = $allBlocks[$i];
			break;
			// we break so that if there are multiple videos, we don't get the last one
			// ... also, you can't break a foreach loop
			// var_dump($firstVideoBlock);
		}
	}
}

?>

<!-- <div class="card mb-2 mt-2">  --><!-- rows -->
<div class="card">	<!-- grid -->
	<div class="card-body border-warning">
		<div class="card-title">
			<?php the_title(); ?>
		</div>
		<?php if($firstVideoBlock): ?>
			<div class="fullWidthVideo">
				<?php echo apply_filters( 'the_content', render_block( $firstVideoBlock ) ); ?>
				<!-- we'll use a descendant selector targeting any iframes that are descendants of our fullVideo div -->
			</div>
		<?php endif; ?>
		<a href="<?php the_permalink() ?>" class="btn btn-round btn-warning">watch video</a>

	</div>
</div>
