<?php

function add_custom_meta_boxes(){
    add_meta_box(   'moviesInfo',           // unique ID
                    'More Movies Info',     // metabox title
                    'moviesInfoCallback',   // callback function for this metabox
                    'movie',                // page (editor) on which to render this metabox
                    'normal',               // location on the page - e.g. not 'side' or 'advanced'
                    'default',              // priority
                    null );                 // callback arguments
}

add_action('add_meta_boxes', 'add_custom_meta_boxes');


function moviesInfoCallback($post){
    require_once get_template_directory() . '/inc/moviesInfoForm.php';
    // get the form that we just wrote
}

function save_moviesInfo_meta_boxes($post_id){
    if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
        return;
        // stop what you're doing if you're doing a wordpress autosave!
    }
    $fields = [
        '1902_year'
    ];
    foreach($fields as $field){
        if(array_key_exists($field, $_POST)){
            // if a key exists with the $field and a post req (i.e. if someone's entered a metabox value and hit 'publish'), update the meta with the following information:
            update_post_meta($post_id, $field, $_POST[$field]);
            // the post req is an object that takes a bunch of values. We set up key : value pairs when we created the moviesInfoForm - name / value is analogous to meta_key / meta_value
        }
    }
}
add_action('save_post', 'save_moviesInfo_meta_boxes');
// add the save post action to the metaboxes, which wordpress doesn't actually do by default?
