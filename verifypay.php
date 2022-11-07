<?php

	require 'config.php';
	require 'checkuser.php';

	if (isset($_GET['token']) && isset($_GET['ref']) && $_GET['token'] == hash('sha256', $_SESSION['token'].$_GET['ref'])){

		$updorder_sql  = "UPDATE orders SET Tid = '".secure($_GET['ref'])."', payments = 'Paid' WHERE SN = '".$_SESSION['order']."'";
		$updorder_query = mysqli_query($conn, $updorder_sql);

		if ($updorder_query){
			unset($_SESSION['amount']);
			unset($_SESSION['token']);
			unset($_SESSION['order']);
			header('location:orders.php?transaction=success&ref='.secure($_GET["ref"]));
		}
		else {
			echo mysqli_error($conn).' <br/> '.var_dump(error_get_last());
		}
	}
	else {
		echo "<div style='width:100%;max-width:500px;margin:80px auto auto auto;text-align:center;font-family:arial;'>
				<h2>KKpay</h2>
				<span style='color:grey;'>KlosetKollect Sayment System</span>
				<br></br>
				<h4 style='font-family:arial'><span style='color:red;'>Invalid transaction</span> <a href='orders.php' style='color:blue;'>click here</a> <span style='color:red;'>to go to transactions page</span></h4>
				</div>";
	}


?>

