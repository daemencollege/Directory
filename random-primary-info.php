<?php
require 'connect.php';

function gen_email($i, $link) {
	
	$select = "SELECT first_name, last_name FROM people WHERE id = $i";
	$result = mysqli_query($link, $select);
	$row = mysqli_fetch_assoc($result);
	
	$email = strtolower(substr($row['first_name'],0,1) . substr(preg_replace("/[^A-Za-z0-9]/", '', $row['last_name']),0,7) . '@daemen.edu');

	return $email;
}

function gen_building() {
	$buildings = array('Winterhollow','Redfall','Mistbarrow','Lochmarsh','Greenmere','Northcastle','Edgebeach','Violetfield', 'Valden');
	
	$building = $buildings[array_rand($buildings)];
	
	return $building;
}

for($i = 3; $i <= 202; $i++) {
	
	$email = gen_email($i, $link);
	$phone = rand(5550000,5559999);
	$office = gen_building() . ' ' . rand(100,399);
	$mailbox = rand(1, 999);
	
	$insert = "INSERT INTO work_info (id, email, phone, office, mailbox) VALUES ('$i','$email','$phone','$office','$mailbox')";
	
	mysqli_query($link, $insert) or die(mysqli_error($link));
}