<?php
// echo('Hello, world!');
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 	<head>
 		<meta charset="utf-8">
 		<title>Hello, world!</title>

		<?php wp_head();?>
 	</head>
 	<body>

        <div class="container">
            <?php if ( have_posts() ): ?>
    			<?php while( have_posts() ): the_post(); ?>
                    <div class="card mt-4">
                            <h3 class="card-header"><?php the_title(); ?></h3>
                            
                            <div class="card-body">
                                <div class="card-title">Some Succint and Cogent Title</div>
                                <div class="card-body"><?php the_content(); ?></div>
                            </div>
                    </div>
    			<?php endwhile; ?>
    		<?php endif; ?>
        </div>



		<?php wp_footer(); ?>
 	</body>
 </html>
