<?php

if (var_dump($_SESSION) == "NULL"){
	header('location:access.php?user=loggedout');
}
else {
	session_start();
	session_unset();
	session_destroy();
}

header('location:access.php?user=loggedout');


?>

