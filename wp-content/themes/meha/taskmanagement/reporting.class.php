<?php
class ReportingManagement {

	private $db;
	private $_table = 'reporting_hierarchy';

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

		if (empty($req['manager_id'])) {
			$error[] = "Please select the agent in manager's drop down";
		}else{
			$data['manager_id'] = $req['manager_id'];
		}
		if (empty($req['reporting_id'])) {
			$error[] = "Please select the agents in reporting's drop down";
		}else{
			$data['reporting_id'] = $req['reporting_id'];
		}
		if($req['reporting_id'] == $req['manager_id']){
			$error[] = "Please select different Reporting Agent from Manager";
		}
		
		$data['modified_by'] = get_current_user_id() ;

		var_dump($data);
		//Collect all errors, do not proceed in case of any error is set, throw the exception
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
        $this->db->last_query;
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