<?php

/**
 * Proper way to enqueue scripts and styles
 */
function theme_name_scripts() {
    $v = 5.0;
    // wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', false, NULL, 'all' );
    // wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), NULL, true );
     #wp_enqueue_style('style', get_template_directory_uri() . 'assets/bootstrap/css/bootstrap.css', array(), $v);
    
    wp_enqueue_style('reset', get_template_directory_uri() . '/resetstyle.css', array(), $v);
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), $v);
    wp_enqueue_style('image', get_template_directory_uri() . '/assets/images/logo.ice', array(), $v);

     
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/ui.js', array('jquery'), $v);
    wp_enqueue_script('stick', get_template_directory_uri() . '/stick.js', array('jquery'), $v);
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

add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );
function my_show_extra_profile_fields( $user ) { ?>
<h3>Extra profile information</h3>
    <table class="form-table">
<tr>
            <th><label for="phone">Phone Number</label></th>
            <td>
            <input type="text" name="phone" id="phone" value="<?php echo esc_attr( get_the_author_meta( 'phone', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your phone number.</span>
            </td>
</tr>
</table>

<?php 
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {
if ( !current_user_can( 'edit_user', $user_id ) )
    return false;
update_usermeta( $user_id, 'phone', $_POST['phone'] );
}
}
