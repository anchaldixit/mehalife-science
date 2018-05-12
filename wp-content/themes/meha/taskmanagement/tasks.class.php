<?php
class TaskManagement{

	private $db;
	private $_table = 'tasks';

	function __construct(){
		global $wpdb;
        $this->db = $wpdb;
	}

	function fetch($filters = array()){
		$where_part = '';
		$where = array();
		$valueset = array();
		foreach ($filters as $fieldname => $value) {
			$where[] = "$fieldname = %s";
			$valueset[] = $value;
		}
		if(count($where)){
			$where_part = 'where '.implode(' and ', $where);
		}
		$sql = "select * from {$this->_table} $where_part order by last_modified desc";
		$results = $this->db->get_results($this->db->prepare($sql,$valueset), ARRAY_A);
		return $results;
	}
	function validateSet($req){
		$error = array();
		$data = array();
		if (empty($req['purpose'])) {
			$error[] = "Purpose field cannot be empty";
		}else{
			$data['purpose'] = $req['purpose'];
		}
		$data['description'] = $req['description'];
		$data['address'] = $req['address'];
		if(!empty($req['status'])){
			$data['status'] = $req['status'];
		}
		if(empty($req['id']) ){
			//It means its new insert request, not update
			$data['user_id'] = get_current_user_id() ;
		}
		//create objct of reporting class
		//call fetch function for $data['user_id'] as reporting_id
		//Result is not empty thne set $data['manager_id']
		//Collect all errors, do not proceed in case of any error is set, throw the exception
		$obj_reporting = new ReportingManagement();
		$reporting_filter = array('reporting_id'=>$data['user_id']);
		$reporting_to_result = $obj_reporting->fetch($reporting_filter);
		if(!empty($reporting_to_result) and !empty($reporting_to_result[0]['manager_id'])){
			$data['manager_id'] = $reporting_to_result[0]['manager_id'];
		}
		if(!empty($error)){
			$msg = implode('<br>', $error);
			throw new Exception($msg, 1);
		}
		//everything is good, proceed to save
		return $data;
	}
	function save($req){
		$data = $this->validateSet($req);
		$data['last_modified'] = date('Y-m-d H:i:s');
		if(!empty($data['id'])){
			$this->update($data);
		}else{
			$this->new($data);
		}
	}
	function new($data){
		$this->db->insert(
                $this->_table, $data
        );
        if (!empty($this->db->last_error)) {

            throw new Exception($this->db->last_error, '001');
        }
	}
	function update($data){
		$id = $data['id'];
		unset($data['id']);
		$this->db->update(
                    $this->_table, $data, array('id' => $id)
            );
            if (!empty($this->db->last_error)) {

                throw new Exception($this->db->last_error, '001');
            }
	}
}