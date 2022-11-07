<?php
	require 'config.php';
	require 'checkuser.php';

	if (isset($_POST['SN']) && isset($_POST['amount']) && $_POST['SN'] !== '' && $_POST['amount'] !== ''){

		$_SESSION['amount'] = secure($_POST['amount'])*100;
		$_SESSION['email'] = $fetchuser['email'];
		$_SESSION['token'] = md5(hash('sha256',$_SESSION['email'].$fetchuser['password'].$_SESSION['amount'].date('jSMY-hisa').'klosetkollectPaymentToken'));

		$_SESSION['order'] = $_POST['SN'];
		
		header('location:kkpay.php');

	}

	else {

		header('location:orders.php?transaction=failed');
	}

?>

