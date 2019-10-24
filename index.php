<?php
// echo('Hello, world!');
get_header();   // wp function that replaces require(template)
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
        <?php if (is_author()): ?>
            <!-- archives -->
            <?php echo 'author id # is ' . is_author(); ?>
        <?php endif; ?>
        
        <?php if (is_search()): ?>
            <!-- search results -->
            <h1 class="my-5">search results</h1>
            <?php get_search_form(); ?>
            <?php if (have_posts()): ?>
                <?php while ( have_posts() ) : the_post();  ?>
                    <div class="card mt-4">
                        <!-- could probably stand to add more details - is it a post, or a page? -->
                        <!-- how many results? can we make it clearer to the user which results they're seeing? -->
                        <h3 class="card-header"><?php the_title(); ?></h3>
                        <div class="card-body"><?php the_excerpt(); ?></div>
                        <a href="<?php the_permalink() ?>" class="btn btn-round btn-primary">permalink</a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <!-- show 'no results found' -->
            <?php endif; ?>
        <?php endif; ?>

        <?php if ( have_posts() ): ?>
            <!-- all posts -->
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
                                    <?php if( !is_singular() ): ?>
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

    <?php
    get_footer(); // wp function that replaces require(template)
    ?>
