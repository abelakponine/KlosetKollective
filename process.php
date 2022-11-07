<?php
	require 'db.php';

	// Registration Process
	function securePass($x){
		return md5(hash('sha256', $x));
	}


	if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form'] == 'signup'){

			$Fname = secure($_POST['Fname']);
			$Lname = secure($_POST['Lname']);
			$email = secure($_POST['email']);
			$gender = secure($_POST['gender']);

			if (isset($_POST['country'])){
				$country = secure($_POST['country']);
			}
			else {
				$country = 'Nigeria';
			}

			$user = secure($_POST['username']);
			$pass = securePass($_POST['password']);


			$checkuser = "SELECT * FROM users WHERE username='$user' AND password='$pass' OR username='$user'";
			$checkuser_query = mysqli_query($conn,$checkuser);
			$chres = mysqli_fetch_array($checkuser_query, MYSQLI_BOTH);
			$count_chres = mysqli_num_rows($checkuser_query);

			if ($count_chres < 1){

				$create_user = "INSERT INTO `users` (`Fname`,`Lname`,`email`,`telephone`,`address`,`gender`,`country`,`username`,`password`,`status`) VALUES('".mysqli_real_escape_string($conn, $Fname)."','".mysqli_real_escape_string($conn, $Lname)."','".mysqli_real_escape_string($conn, $email)."','".mysqli_real_escape_string($conn, secure($_POST['telephone']))."','".mysqli_real_escape_string($conn, secure($_POST['address']))."','".mysqli_real_escape_string($conn, $gender)."','".mysqli_real_escape_string($conn, $country)."','".mysqli_real_escape_string($conn, $user)."','".mysqli_real_escape_string($conn, $pass)."','active')";
				$cuser = mysqli_query($conn, $create_user);

				if ($cuser){

					session_start();
					$_SESSION['username'] = $user;
					$_SESSION['password'] = $pass;

					if ($user == 'admin'){
						header('location:admin');
						$_SESSION['admin'] = $user;
					}
					else {
						
						if ($gender == 'female'){
						header('location:index.php?welcome='.$Fname);
					}
						if ($gender == 'male'){
						header('location:men.php?welcome='.$Fname);
						}

					}
				}
				else {
					header('location:access.php?error='.urlencode('unable to handle request'));
				}
			}
			else {
				header('location:access.php?u&error='.urlencode('user exists'));
			}
	}
	
			

	// Login Process

	if ($_SERVER['REQUEST_METHOD'] == 'POST' &&  isset($_POST['form'])){

		if ($_POST['form'] == 'login'){

				$email = secure($_POST['username']);

				if (isset($_POST['country'])){
					$country = secure($_POST['country']);
				}
				else {
					$country = '';
				}

				$user = secure($_POST['username']);
				$pass = securePass($_POST['password']);


		$checkuser2 = "SELECT * FROM users WHERE username='$user' AND password='$pass' OR email='$user' AND password='$pass'";
		$checkuser2_query = mysqli_query($conn,$checkuser2);
		$chres2 = mysqli_fetch_array($checkuser2_query, MYSQLI_BOTH);
		$count_chres2 = mysqli_num_rows($checkuser2_query);

		if ($count_chres2 >= 1){

						session_start();
						$_SESSION['username'] = $user;
						$_SESSION['password'] = $pass;

						// Redirect Admin
						if ($user == 'admin'){
							header('location:admin');
							$_SESSION['admin'] = $user;
						}
						else {
							
							if ($chres2['gender'] == 'female'){
								header('location:index.php?welcome='.$chres2['Fname']);
							}
							if ($chres2['gender'] == 'male'){
								header('location:men.php?welcome='.$chres2['Fname']);
							}
						}
		}

		else {
			header('location:access.php?error='.urlencode('invalid user'));
		}
		}
	}


	//add to cart
	if (isset($_POST['form']) && $_POST['form'] == 'cart'){

		session_start();

		$chkcart = "SELECT * FROM carts WHERE prod_id = '".secure($_POST['prod_id'])."' AND cid = '".$_SESSION['username']."'";
		$chkcart_query = mysqli_query($conn, $chkcart);
		$chkcart_num = mysqli_num_rows($chkcart_query);

		if ($chkcart_num > 0){
			//do nothing
		}
		else {
			$addcart = "INSERT INTO carts (`cid`,`prod_id`,`cart_date`,`cart_time`) VALUES ('".mysqli_real_escape_string($conn,$_SESSION['username'])."','".mysqli_real_escape_string($conn,$_POST['prod_id'])."','".date('jS m Y')."','".date('h:i a')."')";
			$addcart_query = mysqli_query($conn, $addcart);

			if ($addcart_query){
				header('location:category.php');
			}
			else {
				echo mysqli_error($conn);
			}
		}
	}


	//delete from cart
	if (isset($_POST['form']) && $_POST['form'] == 'del_cart'){

		session_start();

		$delcart = "DELETE FROM carts WHERE prod_id = '".secure($_POST['prod_id'])."' AND cid = '".$_SESSION['username']."'";
		$delcart_query = mysqli_query($conn, $delcart);

		if ($delcart_query){
			header('location:category.php');
		}
		else {
			echo mysqli_error($conn);
		}
	}


?>