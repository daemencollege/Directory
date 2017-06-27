<?php
require 'connect.php';

function gen_name(){
	$first = array('Marx','Gala','Rosamaria','Wendi','Lura','Jenna','Rocky','Armando','Misty','Brock','India','Olivia','Solange','Wilfred','Emanuel','Audrea','Sal','George','Antwan','Jada','Sophie','Zachery','Ashley','Jazmyn','Prince','Skyler','Ingrid','Oswaldo','Donovan','Shalya','Sean','Leroy','Pierce','Anabelle','Adam','Jack','Cooper','Faith','Rush','Jude','Perri','Erica','Scott','Chris','Kelly','Darlene','Tom','Justin','Valerie','Dixie','Jordan','Brittany','Emily','Pablo','Thaddeus','Quinn','Evan','Jessica','Griffin','Leonardo','Summer','Elvis','Kobe','Itzel','Roman');
	$last = array("O'Conner",'Glass','West','East','North','South','Stone','McClean','Avery','Parker','Brady','McCann','Small','Ochoa','Baxter','Huff','Carrillo','Solomon','Blankenship','Hobbs','Reed','Santos','Barber','Johnston','Rojas','Murillo','Gates','Vargas','Lamb','Potts','Potato','Escobar','Bird','Dickson','Hart','Melendez','Holloway','Banks','Bombay','Davenport','Wade','Horton','Crosby','Finley','Maddox','Gibbs','Watson','Beck','Hardy','Rollins','McKinney','Lucero','Guerrero','Wolfe','Bolton','McGrath','Fisher',"O'Brian",'Everett','Wise','Char','Jimbles','Grinajin','Dippart','Blunth','Rekt');

$name['first'] = $first[array_rand($first)];
$name['last'] = $last[array_rand($last)];

return $name;
}

for($i = 0; $i < 200; $i++) {
	
	$name = gen_name();
	$first = mysqli_real_escape_string($link,$name['first']);
	$last = mysqli_real_escape_string($link,$name['last']);
	
	$insert = "INSERT INTO people (first_name, last_name) VALUES ('$first','$last')";
	
	mysqli_query($link, $insert) or die(mysqli_error($link));
}