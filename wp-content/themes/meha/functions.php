<?php

/**
 * Proper way to enqueue scripts and styles
 */
function theme_name_scripts() {
    $v = 5.0;
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), $v);
    wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', false, NULL, 'all' );
    wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), NULL, true );
     #wp_enqueue_style('style', get_template_directory_uri() . 'assets/bootstrap/css/bootstrap.css', array(), $v);
    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/ui.js', array('jquery'), $v);
}
add_action('wp_enqueue_scripts', 'theme_name_scripts', 1);
function register_my_topnav() {
  register_nav_menu('topnav',__( 'Top Nav' ));
}
add_action( 'init', 'register_my_topnav' );
include_once 'taskmanagement/task-functions.php';