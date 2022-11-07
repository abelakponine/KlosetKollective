<?php
	require 'config.php';
	require 'checkuser.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		if (isset($_POST['items']) && isset($_POST['amount']) && $_POST['amount'] !== '0' && $_POST['items'] !== ''){

			$cksql = "INSERT INTO orders (`pid`,`no_items`,`cost`,`Tid`,`payments`,`status`,`date`) VALUES ('".mysqli_real_escape_string($conn,$fetchuser['id'])."','".mysqli_real_escape_string($conn,secure($_POST['items']))."','".mysqli_real_escape_string($conn,secure($_POST['amount']))."','N/A','Not Paid','Pending','".date('jS M Y')." at ".date('h:i a')."')";
			$ck_query = mysqli_query($conn, $cksql);

			if ($ck_query){

				$_SESSION['amount'] = secure($_POST['amount'])*100;
				$_SESSION['email'] = $fetchuser['email'];
				$_SESSION['token'] = md5(hash('sha256',$_SESSION['email'].$fetchuser['password'].$_SESSION['amount'].date('jSMY-hisa').'klosetkollectPaymentToken'));

				$getorder_sql = "SELECT * FROM orders ORDER BY SN DESC";
				$getorder_query = mysqli_query($conn, $getorder_sql);
				$getorder = mysqli_fetch_array($getorder_query);

				$_SESSION['order'] = $getorder['SN'];

				$del_ck = "DELETE FROM carts WHERE cid = '".$fetchuser['email']."' OR cid = '".$fetchuser['username']."'";
				$delck_query = mysqli_query($conn, $del_ck);

				if ($delck_query){
					header('location:kkpay.php');
				}

			}
			else {
				echo var_dump(error_get_last()).' '.mysqli_error($conn);
			}
		}
		else {
			header('location:orders.php?status=invalid+transaction!');
		}

	}
	else {
		echo 'invalid request method';
	}

?>