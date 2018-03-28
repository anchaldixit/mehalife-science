<?php
/*
* Purpose is to handle post request for Task management 
*/

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$wp_path = $_SERVER["DOCUMENT_ROOT"];
require_once($wp_path.'/wp-load.php');

$method = $_GET['call'];
$obj = new TaskHandler();
switch ($method){
case 'save':
    $data = $obj->validate($_POST);
    //return error in case validation failed
    $obj->save($data);
    //Right code to check, it is saved properly

    break;
case 'delete':
	$id = $_GET['id']
    echo $obj->delete($_POST);
    //return success msg
    break;
default :
    echo json_encode(array('response'=> 'Invalid Request'));
}