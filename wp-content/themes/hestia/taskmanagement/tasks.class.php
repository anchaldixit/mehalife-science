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
		$sql = "select * from {$this->_table} $where_part";
		$results = $this->db->get_results($this->db->prepare($sql,$valueset), ARRAY_A);
		return $results;
	}
}