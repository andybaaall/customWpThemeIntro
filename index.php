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
        <?php
        if( has_nav_menu('top_navigation'){
        // remember, 'top_navigation' is the theme_location under which we registered our menu (1902Custom)!
            wp_nav_menu(array(
                'theme_location' => 'top_navigation',
                'menu_class' => 'top_menu_class',
                'menu_id' => 'top_menu_id'
            ))
            // empty array creates some menu items with default IDs in the database; check 'em out in the Posts table
            // e.g. 'menu-item-22'. These numbers reflect upload order. We need a predictable ID that we can use in JS
            // we'll also need a menu id that's predictable. That's where the $args 'menu' and 'menu_class' etc. come in
        });?>


        </div>
        <div class="container">
            <?php if ( have_posts() ): ?>
    			<?php while( have_posts() ): the_post(); ?>
                    <div class="card mt-4">
                            <h3 class="card-header"><?php the_title(); ?></h3>

                            <div class="card-body">
                                <div class="font-weight-bold">Some Succint and Cogent Title</div>
                                <div class="card-body">

                                <?php if( is_home() ): ?>
                                    <?php
                                        $thumbnailSize = 'thumbnail';
                                        $thumbnailClass = '';
                                        $imageLayout = 'col-4, mb-4';
                                    ?>
                                <?php else: ?>
                                    <?php
                                        $thumbnailSize = 'full';
                                        $thumbnailClass = 'img-fluid';
                                        $imageLayout = 'col-12, mb-4';
                                    ?>
                                <?php endif; ?>

                                <div class="row">
                                    <div class=" <?php echo $imageLayout ?>">
                                        <?php the_post_thumbnail($thumbnailSize, ['class' => $thumbnailClass]); ?>
                                        <!-- https://developer.wordpress.org/reference/functions/the_post_thumbnail/ for sizes, attrs, &c. -->
                                    </div>

                                    <!-- checking to see if we're on the home page or the post, and showing excerpt/content as needed -->
                                    <?php if( is_home() ): ?>
                                        <div class="col">
                                            <?php the_excerpt(); ?>

                                            <!-- checking to see if we're on a single page; if we are, we don't need a permalink btn -->
                                            <?php if( !is_single() ): ?>
                                                <a href="<?php the_permalink() ?>" class="btn btn-round btn-primary">permalink</a>
                                                <!-- https://developer.wordpress.org/reference/functions/the_permalink/ -->
                                            <?php endif; ?>
                                        </div>
                                    <?php else: ?>
                                        <?php the_content(); ?>

                                        <!-- checking to see if we're on a single page; if we are, we don't need a permalink btn -->
                                        <?php if( !is_single() ): ?>
                                            <a href="<?php the_permalink() ?>" class="btn btn-round btn-primary">permalink</a>
                                            <!-- https://developer.wordpress.org/reference/functions/the_permalink/ -->
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>


                                </div>
                            </div>


                    </div>
    			<?php endwhile; ?>
    		<?php endif; ?>
        </div>



		<?php wp_footer(); ?>
 	</body>
 </html>
