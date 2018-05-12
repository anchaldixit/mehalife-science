<?php
include_once 'tasks.class.php';
include_once 'reporting.class.php';

function show_user_tasklist(){

	$user = wp_get_current_user();
	$user_id =  $user->ID;
	$list = new TaskManagement();
	$filter = array('user_id' => $user_id);
	$rows = $list->fetch($filter);
	ob_start();
	include_once dirname(__FILE__).'/templates/listing.php';
	$html = ob_get_clean();
	return $html;

}
add_shortcode('show_tasklist', 'show_user_tasklist');

/*
 * Description: Add Task Manager l
 */
function products_admin_menu() {
    add_menu_page('Task Manager', 'Task Manager', 'manage_options', 'task_manager', 'task_manager', '', 6);
    add_submenu_page('task_manager', 'task_manager', 'Visits', 'manage_options', 'task_manager');
    add_submenu_page('task_manager', 'task_manager', 'Reporting', 'manage_options', 'reporting2u','reporting2u');
 
    #wp_enqueue_style('product_style', get_template_directory_uri().'/', '', '', '');
}
add_action('admin_menu', 'products_admin_menu');

function task_manager(){
	$list = new TaskManagement();
	$rows = $list->fetch();
	include_once 'templates/admin/show-all.php'; 
}

function reporting2u(){
	//do someting
	$r = new ReportingManagement();
	if(!empty($_POST)){
		try{
			//echo 'in code';
			
    		$r->save($_POST);
    		$m = array('msg' => 'Item added successfully');
    	}catch(Exception $e){
    		$m = array('error'=>$e->getMessage());
    	}
	}elseif ($_GET['action']=='delete') {
		try{
		$id = $_GET['id'];
		$r->delete($id);
		$m = array('msg' => 'Item deleted successfully');
		}catch(Exception $e){
    		$m = array('error'=>$e->getMessage());
    	}
	}
	$agents_list = get_users( [ 'role__in' => [ 'meha_agents' ] ] );
	$all_reportings = $r->fetch();
	include_once 'templates/admin/reporting.php'; 
}

?>