<?php

if (isset($_SESSION['username']) && $_SESSION['password'] !== ''){

    if (isset($_SESSION['genre'])){
        $genre = $_SESSION['genre'];
    }
    else {
        $genre = 'women';
    }

    $chkuser = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' AND password = '".$_SESSION['password']."'";
    $chkuser_query = mysqli_query($conn, $chkuser);
    $chkuser_num = mysqli_num_rows($chkuser_query);
    $fetchuser = mysqli_fetch_array($chkuser_query, MYSQLI_BOTH);

    if ($chkuser_num < 1){

    	unset($_SESSION['username']);
    	unset($_SESSION['password']);
    	header('location:access.php');
    }


}
else {
	header('location:access.php');
}

?>