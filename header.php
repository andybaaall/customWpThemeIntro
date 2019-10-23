
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Hello, world!</title>

    <?php wp_head();?>
    
</head>
<body>

    <!-- top_navigation -->
    <nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo get_bloginfo('name'); ?></a>
            <?php
            wp_nav_menu( array(
                'theme_location'    => 'top_navigation',
                'depth'             => 1,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
            ) );
            ?>
        </div>
    </nav>

    <!-- sidebar_navigation -->
    <!-- <nav class="navbar navbar-expand-md navbar-light bg-light col-12 col-lg-3 " role="navigation"> -->
    <?php
    // wp_nav_menu( array(
    //     'theme_location'    => 'sidebar_navigation',
    //     'depth'             => 1,
    //     'container'         => 'div',
    //     'container_class'   => 'collapse navbar-collapse d-flec',
    //     'container_id'      => 'bs-example-navbar-collapse-1',
    //     'menu_class'        => 'nav navbar-nav',
    //     'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
    //     'walker'            => new WP_Bootstrap_Navwalker(),
    // ) );
    ?>
    <!-- </nav> -->
