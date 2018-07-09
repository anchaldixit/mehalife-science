<?php

/**
 * Proper way to enqueue scripts and styles
 */
function theme_name_scripts() {
    $v = 5.0;
    // wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', false, NULL, 'all' );
    // wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), NULL, true );
     #wp_enqueue_style('style', get_template_directory_uri() . 'assets/bootstrap/css/bootstrap.css', array(), $v);
    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/ui.js', array('jquery'), $v);
         wp_enqueue_style('reset', get_template_directory_uri() . '/resetstyle.css', array(), $v);

     wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), $v);
     wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'theme_name_scripts', 1);
function register_my_topnav() {
  register_nav_menu('topnav',__( 'Top Nav' ));
}
add_action( 'init', 'register_my_topnav' );

$result = add_role(
    'meha_agents',
    __( 'Agents' ),
    array(
        'read'         => false,  // true allows this capability
        'edit_posts'   => false,
        'delete_posts' => false, // Use false to explicitly deny
    )
);

include_once 'taskmanagement/task-functions.php';