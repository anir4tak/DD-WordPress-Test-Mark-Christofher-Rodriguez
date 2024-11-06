<?php
function enqueue_parent_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_uri(), array('parent-style'));
}
add_action('wp_enqueue_scripts', 'enqueue_parent_styles');

function create_deer_tests_post_type() {
    register_post_type('deer_tests', array(
        'public' => true,
        'label'  => 'Deer Tests',
        'has_archive' => true, 
        'rewrite' => array('slug' => 'deer-tests'), 
        'supports' => array('title', 'editor', 'thumbnail')
    ));
}
add_action('init', 'create_deer_tests_post_type');

?>

