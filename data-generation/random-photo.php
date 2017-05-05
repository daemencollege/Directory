<?php
require '../connect.php';

function gen_photo(){
	$photos = array('ana','bastion','dva','genji','hanzo','junkrat','lucio','mccree','mei','mercy','pharah','reaper','reinhardt','roadhog','soldier76','sombra','symmetra','torbjorn','tracer','widowmaker','winston','zarya','zenyatta');
    $photo = $photos[array_rand($photos)];
    return $photo;
}

for($i = 1; $i <= 200; $i++) {
	
	$photo = gen_photo();
	$photo = db_quote($photo);
	$query = "UPDATE people SET photo = $photo WHERE id = $i";
	db_query($query);
    
}
	