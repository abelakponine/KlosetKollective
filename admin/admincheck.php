<?php
	
	// check if user is not admin
    if ($username !== 'admin'){
        header('location:../index.php');
    }
    else {
        //do nothing
    }

?>


