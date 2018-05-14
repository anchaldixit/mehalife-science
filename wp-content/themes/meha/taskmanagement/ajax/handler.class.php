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
    function closeIt($req){
        try{
            if(!empty($req['id'])){
                $data = array('status'=>'close', 
                    'id'=>$req['id'],
                    'last_modified' => date('Y-m-d H:i:s'),
                    'user_id' =>get_current_user_id()
                );
                $this->obj->update($data);
                $m = array('msg' => 'success');
            }else{
                $m = array('error' => 'Id is missing');
            }

        }catch(Exception $e){
            $m = array('error'=>$e->getMessage());
        }
        return json_encode($m);
    }
}