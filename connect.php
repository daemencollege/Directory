<?php

function db_connect() {
	static $link;
	
	if(!isset($link)) {
		$user = 'directory_user';
		$password = 'password';
		$db = 'directory';
		$host = 'localhost';
		$port = 8889;
		
		$link = mysqli_connect("localhost", $user, $password, $db);
	}
	
	if($link === false) {
		return mysqli_connect_error();
	}
	
	return $link;
}

function db_query($query) {
    // Connect to the database
    $link = db_connect();

    // Query the database
    $result = mysqli_query($link,$query);

    return $result;
}

function db_select($query) {
    $rows = array();
    $result = db_query($query);

    // If query failed, return `false`
    if($result === false) {
        return false;
    }

    // If query was successful, retrieve all the rows into an array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function db_quote($value) {
    $link = db_connect();
    return "'" . mysqli_real_escape_string($link,$value) . "'";
}
?>