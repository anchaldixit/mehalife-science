<?php

Class TaskHandler{
	var $obj;

	function __construct(){
		$this->obj = new TaskManagement();
	}
	function save($req){
    	//return error in case validation failed
    	try{
    		$this->obj->save($req);
    		$m = array('msg' => 'success');
    	}catch(Exception $e){
    		$m = array('error'=>$e->getMessage());
    	}
    	return json_encode($m);
	}
}