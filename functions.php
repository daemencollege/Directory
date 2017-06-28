<?php
	require('connect.php');

	function get_departments() {
		$link = db_connect();
		$query = "SELECT * FROM departments";
		$rows = db_select($query);
		return $rows;
	}
	
	function format_phone_number($number) {
    	$number = substr($number,0,3). '-' . substr($number,3);
    	return $number;
	}
	
	function in_departments($person_id){
    	$link = db_connect();
    	$query = "SELECT name FROM departments JOIN in_department ON id = department_id WHERE person_id = $person_id ORDER BY name";
    	$rows = db_select($query);
    	return $rows;
	}
	
?>