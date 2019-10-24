<?php
 // echo 'hello world from gallery (testimonials) pg'
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
