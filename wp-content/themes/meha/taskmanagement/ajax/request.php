<?php
/*
* Purpose is to handle post request for Task management 
*/

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
ini_set('display_errors', 1);
$wp_path = $_SERVER["DOCUMENT_ROOT"];
require_once($wp_path.'/wp-load.php');
require_once("./handler.class.php");
$method = $_GET['call'];
$obj = new TaskHandler();
switch ($method){
    case 'save':
        echo $obj->save($_GET);
       
        //Right code to check, it is saved properly

        break;
    case 'delete':
    	$id = $_GET['id'];
        echo $obj->delete($_GET);
        //return success msg
        break;
    case 'closeit':
        echo $obj->closeIt($_GET);
        break;
    default :
        echo json_encode(array('response'=> 'Invalid Request'));
}