<?php

$host = 'localhost:3306';
$dbuser = 'kkollect';
$dbpass = 'kk12345';
$db = 'kkollective';
$conn = mysqli_connect("$host","$dbuser","$dbpass");

if ($conn){
	mysqli_select_db($conn,$db);
}
else {
	echo "Error: ".mysqli_connect_error();
}

function secure($data){
	$data = htmlspecialchars($data);
	$data = trim($data);
	$data = stripslashes($data);
	return $data;
}

?>

