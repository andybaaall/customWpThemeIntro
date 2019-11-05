<?php
// die('this msg comes from customiser.php');

function add_customizer_options() {
    // okay, but why is this here?
}

function mytheme_customize_register( $wp_customize ) {
    // All our sections, settings, and controls will be added here

    // footer message section
    $wp_customize->add_section( '1902_footerMessageSection' , array(      // again, unique id, plus a text domain from style.css
        'title'      => __( 'Footer Message', '1902Custom' ),
        'priority'   => 160 /* https://developer.wordpress.org/themes/customize-api/customizer-objects/#sections */
    ) );
    // setting
    $wp_customize->add_setting( '1902_footerMessage' , array(
        'default' => '&copy; Cool Theme, powered by Wordpress',
        'transport' => 'refresh'
    ) );
    // control
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, '1902_footerMessageControl', array(
        'label'      => __( 'Footer Message', '1902Custom' ),
        'section'    => '1902_footerMessageSection',
        'settings'   => '1902_footerMessage',
        'description' => 'Some helpful description'

        // https://codex.wordpress.org/Class_Reference%5CWP_Customize_Manager%5Cadd_control - these return the ID, so you can work on the element
        // (this page omits the class WP_Customize_Cropped_Image_Control)
    ) ) );  // really like this business of all the closing brackets being on the same line!


    // background color setting
    $wp_customize->add_setting( '1902_backgroundColour' , array(
        // setting names need to be unique.
        'default'   => '#e2e2e2',
        'transport' => 'refresh'   // how do we want it to transport from the customiser to the site for the preview?
        // there's a Live Preview we can configure in JS https://codex.wordpress.org/Theme_Customization_API
    ) );
        // control
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '1902_backgroundColourControl', array(
            'label'      => __( 'Background Colour', '1902Custom' ),
            'section'    => 'colors',   // this section is native to WP
            'settings'   => '1902_backgroundColour',
            'description' => 'Some helpful description'

            // https://codex.wordpress.org/Class_Reference%5CWP_Customize_Manager%5Cadd_control - these return the ID, so you can work on the element
            // (this page omits the class WP_Customize_Cropped_Image_Control)
        ) ) );

    // header / footer colour setting
    $wp_customize->add_setting( '1902_headerFooterColour' , array(
        'default'   => '#c4b2bf',
        'transport' => 'refresh'
    ) );
        // control
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '1902_headerFooterColourControl', array(
            'label'      => __( 'Nav and Footer Colour', '1902Custom' ),
            'section'    => 'colors',   // this section is native to WP
            'settings'   => '1902_headerFooterColour',
            'description' => 'Some helpful description'

            // https://codex.wordpress.org/Class_Reference%5CWP_Customize_Manager%5Cadd_control - these return the ID, so you can work on the element
            // (this page omits the class WP_Customize_Cropped_Image_Control)
        ) ) );

    // h1 colour setting
    $wp_customize->add_setting( '1902_h1Colour' , array(
        'default'   => '#63535e',
        'transport' => 'refresh'
    ) );
        // control
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '1902_h1ColourControl', array(
            'label'      => __( 'Site Title Colour', '1902Custom' ),
            'section'    => 'colors',   // this section is native to WP
            'settings'   => '1902_h1Colour',
            'description' => 'Some helpful description'

            // https://codex.wordpress.org/Class_Reference%5CWP_Customize_Manager%5Cadd_control - these return the ID, so you can work on the element
            // (this page omits the class WP_Customize_Cropped_Image_Control)
        ) ) );

    // link hover colour setting - so far for post permalinks and nav items
    $wp_customize->add_setting('1902_linkHoverColour', array(
        'default' => '#edc207',
        'transport' => 'refresh'
    ) );
        // control
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '1902_h1ColourControl', array(
            'label'      => __( 'Link Hover Colour', '1902Custom' ),
            'section'    => 'colors',
            'settings'   => '1902_linkHoverColour',
            'description' => 'Some helpful description'
        ) ) );

    // front page jumbotron section
    $wp_customize->add_section( '1902_frontPageJumbotronSection' , array(      // again, unique id, plus a text domain from style.css
        'title'      => __( 'Mission Statement', '1902Custom' ),
        'priority'   => 161 /* https://developer.wordpress.org/themes/customize-api/customizer-objects/#sections */
    ) );
        // setting - image
        $wp_customize->add_setting('1902_frontPageJumbotronImage', array(
            'default' => '',
            'transport' => 'refresh'
        ) );
        // setting - text
        $wp_customize->add_setting('1902_frontPageJumbotronText', array(
            'default' => 'This is what we do. Climb aboard.',
            'transport' => 'refresh'
        ) );
        // control - image
        $wp_customize->add_control(
            new WP_Customize_Image_Control($wp_customize, '1902_frontPageJumbotronImageControl', array(
                'label'      => __( 'Background Image for your Mission Statement', '1902Custom' ),
                'section'    => '1902_frontPageJumbotronSection',
                'settings'   => '1902_frontPageJumbotronImage',
            ) ) );
        // control - text
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, '1902_frontPageJumbotronTextControl', array(
            'label'      => __( 'Mission Statement', '1902Custom' ),
            'section'    => '1902_frontPageJumbotronSection',
            'settings'   => '1902_frontPageJumbotronText',
            'description' => '100 characters or so on what this website\'s about'
        ) ) );

    //front page carousel section
    $wp_customize->add_section( '1902_frontPageCarouselSection' , array(
        'title'      => __( 'Carousel', '1902Custom' ),
        'description' => 'Add up to three images to your carousel. :^)',
        'priority'   => 162
    ) );
        // settings
        $wp_customize->add_setting('1902_frontPageCarouselImage1', array(
            'default' => '',
            'transport' => 'refresh'
        ) );

        $wp_customize->add_setting('1902_frontPageCarouselImage2', array(
            'default' => '',
            'transport' => 'refresh'
        ) );

        $wp_customize->add_setting('1902_frontPageCarouselImage3', array(
            'default' => '',
            'transport' => 'refresh'
        ) );
        // controls
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, '1902_frontPageCarouselImagesControl1', array(
            'label'      => __( 'Carousel Image One', '1902Custom' ),
            'section'    => '1902_frontPageCarouselSection',
            'settings'   => '1902_frontPageCarouselImage1'
        ) ) );

        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, '1902_frontPageCarouselImagesControl2', array(
            'label'      => __( 'Carousel Image Two', '1902Custom' ),
            'section'    => '1902_frontPageCarouselSection',
            'settings'   => '1902_frontPageCarouselImage2'
        ) ) );

        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, '1902_frontPageCarouselImagesControl3', array(
            'label'      => __( 'Carousel Image Three', '1902Custom' ),
            'section'    => '1902_frontPageCarouselSection',
            'settings'   => '1902_frontPageCarouselImage3'
        ) ) );

    // menu location - left or right
    $wp_customize->add_section( '1902_sidebarPositionSection' , array(
        'title'     => __( 'Sidebar Position', '1902Custom' ),
        'panel'     => 'nav_menus'
    ) );

        // setting
        $wp_customize->add_setting('1902_sidebarPosition', array(
            'default' => 'left',
            'transport' => 'refresh'
        ) );

        //control
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, '1902_sidebarPositionControl', array(
            'label'          => __( 'Controls the position of the sidebar navigation.', '1902Custom' ),
            'section'        => '1902_sidebarPositionSection',
            'settings'       => '1902_sidebarPosition',
            'description'    => 'You can have the sidebar (if active) show up on the left or the right of the page.',
            'type'          => 'radio',
            'choices'       => array(
                'left' => __( 'Left' ),
                'right' => __( 'Right' ),
            ),
            'priority'      => 1
        ) ) );

} // function mytheme_customize_register( $wp_customize )

add_action( 'customize_register', 'mytheme_customize_register' );

function mytheme_customize_css()
{
    ?>
    <style type="text/css">
    body {
        background-color: <?php echo get_theme_mod('1902_backgroundColour', '#e2e2e2'); ?> ;
        /* this second setting is the control default value, not the theme modification default value - but still, they should be the same */
    }

    #topNavbar, #frontPageFooter {
        background-color: <?php echo get_theme_mod('1902_headerFooterColour', '#c4b2bf'); ?> !important;
    }

    h1 {
        color: <?php echo get_theme_mod('1902_h1Colour', '#63535e'); ?>;
    }

    #topNavbar a:hover{
        /* could work an if/else to target color/background color more elegantly ?*/
        color: <?php echo get_theme_mod('1902_linkHoverColour', '#edc207'); ?>;
    }

    .card-body a:hover {
        background-color: <?php echo get_theme_mod('1902_linkHoverColour', '#edc207'); ?>;
        color: white;
    }

    .missionStatementBackground {
        background: url("<?php echo get_theme_mod('1902_frontPageJumbotronImage')?>") no-repeat center;
        background-size: cover; /* turns out using classes makes this a lot easier, ty OOCSS */
    }

    <?php if (get_theme_mod('1902_sidebarPosition') === 'right'): ?>
        .sideBarPosition {
            flex-direction: row-reverse !important;
        }
    <?php endif; ?>

    </style>
    <?php
}

add_action( 'wp_head', 'mytheme_customize_css');
