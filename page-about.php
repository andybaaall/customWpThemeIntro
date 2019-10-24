<?php
// echo('Hello, world!');
get_header(); // wp function that replaces require(template)
?>
<div class="container">
    <div class="row">
        <div class="col">
            <?php if( have_posts() ): ?>
                <?php while( have_posts() ): the_post(); ?>
                    <div class="card my-2 h-100">
                        <h5 class="card-header"><?php the_title(); ?></h5>
                        <div class="card-body">
                            <div class="row">
                                <?php if(has_post_thumbnail()): ?>
                                    <?php if( is_home() ): ?>
                                        <div class="col-12 col-md-3">
                                            <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="col-12 text-center mb-5">
                                            <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <div class="col">
                                    <div>
                                        <?php if( is_home() ): ?>
                                            <?php the_excerpt() ; ?>
                                        <?php else: ?>
                                            <?php the_content(); ?>
                                        <?php endif; ?>
                                    </div>
                                    <?php if( !is_singular() ): ?>
                                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
get_footer(); // wp function that replaces require(template)
 ?>
