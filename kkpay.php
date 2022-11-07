<?php

	require 'config.php';
	require 'checkuser.php';

?>

<!DOCTYPE html>
<html>
<head>
	<style></style>
</head>
<body>

		
		<br></br>
		<br></br>
	<script src="js/jquery.min.js"></script>
	<script src="js/sha256.js"></script>
	<script src="https://js.paystack.co/v1/inline.js"></script>

	<div style="width:100%;max-width:600px;margin:auto;position:relative;font-family:arial;">

		<br></br>
		<br></br>
			<a href="orders.php" style="color:blue;text-decoration:none;">&laquo; Go back</a>
			<object data="kk.svg" style="display:block;width:80px;height:80px;margin:auto"></object>

				<h4 style='display:block;color:grey;text-align:center;'>KlosetKollect Payment System</h4>

		<div id="paystackEmbedContainer" style="width:100%;max-width:500px;margin:auto;"></div>
	</div>

	<script type="text/javascript">
	  PaystackPop.setup({
	   key: 'pk_test_93fb92867c0aa8d20be9f6ba2be7bdb96a75d4e3',
	   email: '<?php echo $_SESSION['email'];?>',
	   amount: <?php echo $_SESSION['amount'];?>,
	   container: 'paystackEmbedContainer',
	   callback: function(response){
	   	var token =
	        window.location.href='verifypay.php?transaction=success&ref=' + response.reference+'&token='+sha256_digest('<?php echo $_SESSION['token'];?>'+response.reference);
	    },
	  });

	  	
	</script>
	</script>
</body>
</html>
