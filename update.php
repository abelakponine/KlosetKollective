<?php
	
	require 'config.php';
	
if (isset($_SESSION['username']) && $_SESSION['password'] !== ''){

    if (isset($_SESSION['genre'])){
        $genre = $_SESSION['genre'];
    }
    else {
        $genre = 'women';
    }
}
else {
	header('location:access.php');
}

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		if (isset($_POST['bot']) && $_POST['bot'] !==''){

			echo var_dump(error_get_last()).' '.die('only verified humans are allowed!');
		}

		else {


			if (isset($_POST['form']) && $_POST['form'] == 'profile'){

				if (isset($_POST['firstname'])){
					$upduser = "UPDATE users SET Fname = '".secure($_POST['firstname'])."' WHERE password = '".md5(hash('sha256', $_POST['password']))."'";
					$upduser_query = mysqli_query($conn, $upduser);

					if ($upduser_query){
						echo 'success!<br/>';
					}
				}

				if (isset($_POST['lastname'])){
					$upduser = "UPDATE users SET Lname = '".secure($_POST['lastname'])."' WHERE password = '".md5(hash('sha256', $_POST['password']))."'";
					$upduser_query = mysqli_query($conn, $upduser);

					if ($upduser_query){
						echo 'success!<br/>';
					}
				}

				if (isset($_POST['email'])){
					$upduser = "UPDATE users SET email = '".secure($_POST['email'])."' WHERE password = '".md5(hash('sha256', $_POST['password']))."'";
					$upduser_query = mysqli_query($conn, $upduser);

					if ($upduser_query){
						echo 'success!<br/>';
					}
				}

				if (isset($_POST['telephone'])){
					$upduser = "UPDATE users SET telephone = '".secure($_POST['telephone'])."' WHERE password = '".md5(hash('sha256', $_POST['password']))."'";
					$upduser_query = mysqli_query($conn, $upduser);

					if ($upduser_query){
						echo 'success!<br/>';
					}
				}

				if (isset($_POST['address'])){
					$upduser = "UPDATE users SET address = '".secure($_POST['address'])."' WHERE password = '".md5(hash('sha256', $_POST['password']))."'";
					$upduser_query = mysqli_query($conn, $upduser);

					if ($upduser_query){
						echo 'success!<br/>';
					}

				}

				header('location:profile.php?status=profile+updated+successfully!');
			}

			// Change password
			if (isset($_POST['form']) && $_POST['form'] == 'chngpass'){

				$pass = md5(hash('sha256', $_POST['chngpass']));
				$_SESSION['password'] = $pass;

				$chngpass_sql = "UPDATE users SET password = '".$pass."' WHERE username = '".$_SESSION['username']."'";
				$chngpass_query = mysqli_query($conn, $chngpass_sql);
				if ($chngpass_query){
					header('location:profile.php?status=Password+changed+successfully!');
				}
			}
		}
	}
	else {
		die('invalid request method');
	}


?>

