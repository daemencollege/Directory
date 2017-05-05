<?php
require '../connect.php';

function gen_title(){
	$title_array_1 =
    array('Lead','Senior','Direct','Corporate','Dynamic','Future','Product','National','Regional','District','Central','Global',
    'Customer','Investor','Dynamic','International','Legacy','Forward','Internal','Human','Chief','Principal');

    $title_array_2 = 
    array('Solutions','Program','Brand','Security','Research','Marketing','Directives','Implementation','Integration','Functionality','Response',
    'Paradigm','Tactics','Markets','Group','Division','Applications','Optimization','Operations','Communications','Web','Quality','Accounts','Factors','Metrics');
    
    $title_array_3 =
    array('Supervisor','Associate','Executive','Liason','Officer','Manager','Engineer','Specialist','Director','Coordinator','Administrator','Architect','Analyst','Designer',
    'Planner','Technician','Developer','Agent','Strategist','Assistant');
    
    $title_1 = $title_array_1[array_rand($title_array_1)];
    $title_2 = $title_array_2[array_rand($title_array_2)];
    $title_3 = $title_array_3[array_rand($title_array_3)];
    
    $title = $title_1.' '.$title_2.' '.$title_3;
    return $title;
}

for($i = 1; $i <= 200; $i++) {
	
	$title = db_quote(gen_title());
	$query = "UPDATE work_info SET title = $title WHERE id = $i";
	db_query($query);
    
}
	