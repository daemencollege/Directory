<?php
require '../connect.php';

function gen_group(){
	$group = array(1,2);
	$group = $group[array_rand($group)];
	return $group;
}

$link = db_connect();

for($i = 1; $i <= 200; $i++) {
	
	$group = gen_group();
	
	$insert = "INSERT INTO in_group (person_id, group_id) VALUES ($i, $group)";
	
	mysqli_query($link, $insert) or die(mysqli_error($link));
}
	