<?php
require 'connect.php';

function gen_department(){
	$department = array(1,2,3,4,5,6);
	$department = $department[array_rand($department)];
	return $department;
}

$link = db_connect();

for($i = 1; $i <= 200; $i++) {
	
	$department = gen_department();
	
	$insert = "INSERT INTO in_department (person_id, department_id) VALUES ($i, $department)";
	
	mysqli_query($link, $insert) or die(mysqli_error($link));
}