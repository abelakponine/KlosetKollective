<?php
    require '../config.php';
    require 'admincheck.php';

    $pagename = 'Control Panel';

    if (isset($_GET['user']) && $_GET['user'] !==''){

    	$_GET['user'] = secure($_GET['user']);
    }

    else if (isset($_POST['user']) && $_POST['user'] !==''){

    	$_GET['user'] = secure($_POST['user']);
    }
    else {
    	$_GET['user'] = 'all';
    }


    $chkuser = "SELECT * FROM users WHERE id = '".$_GET['user']."'";
    $chkuser_query = mysqli_query($conn, $chkuser);
    $chkuser_num = mysqli_num_rows($chkuser_query);
    $fetchuser = mysqli_fetch_array($chkuser_query, MYSQLI_BOTH);



    if (isset($_POST['form']) && $_POST['form'] == 'completeTransction' && isset($_POST['TSN']) && $_POST['TSN'] !== ''){

    	$updTrns = "UPDATE orders SET status = 'Completed', payments = 'Paid' WHERE SN = '".$_POST['TSN']."'";
    	$updTrns_query = mysqli_query($conn, $updTrns);

		if ($updTrns_query){
			echo "<span class='alert-success' style='display:block;max-width:500px;padding:6px;border-radius: 4px;background: #d9f9d7;margin:80px auto 0 auto;text-align:center;'> Transaction updated successfully </span>";
		}

    }


?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,minimum-scale=0.1,maximum-scale=1,user-scalable=yes"/>
    <meta http-equiv="cache-control" content="no-cache,no-store,no-save,s-maxage,must-revalidate,proxy-revalidate,max-age=-1">
    <meta http-equiv="pragma" content="no-cache,no-store,no-save,s-maxage,must-revalidate,proxy-revalidate,max-age=-1">
    <meta name="theme-color" content="#404040"/>
    
    <link rel="stylesheet" href="../css/glui.app.css"/>
    <link rel="stylesheet" href="../css/home.css"/>
    <link rel="stylesheet" href="css/admin.css"/>
    <link rel="stylesheet" href="../fontawesome/css/all.css"/>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/glui.app.js" async></script>
    <script type="text/javascript" src="../js/glui.slider.js" async></script>
    <script type="text/javascript" src="../js/jquery.constellation.js"></script>
    <title> <?php echo $pagename.' | '.$sitename;?> </title>

    <style>
    	table td, table th {
    		min-width: 100px;
    		padding: 4px;
    		border: 1px solid #dedede;
    		text-align: center;
    	}

        th {
            min-width: 76px;
        }

        table {
        	display: block;
        	max-width: 770px;
        	margin: auto;
        }
        tbody {
        	margin: auto;
        }

        table button {
        	display: block;
        	margin: auto;
        }

        @media all and (max-width:920px){

        	.no-border.grid.column-3x2 {
        		width: 98%;
        	}
        }

    </style>
</head>
<body>

		<div class="clear-height"></div>
		<div class="clear-height"></div>

		<div class="rowspan center">
			<div class="grid column-1 no-border">
				<form class="form" method="get" action="">
					<input class="display-hide" type="text" name="user" value="<?php echo $_GET['user'];?>">
					<input type="search" name="ref" placeholder="Find transactions by reference number" required>
					<button> Search </button>
				</form>
				<br/>
			</div>

			<div class=".maincol grid column-3x2 no-border center">

		<br/>
			<a href="index.php?showusers" style="color:blue;text-decoration:none;">&laquo; Go back</a>
		<br></br>

				<?php


				        if (isset($_GET['transaction']) && $_GET['transaction'] == 'success' && isset($_GET['ref'])){

				            echo "<span class='alert-success'> Your transaction was successfull! and will be completed as soon as your orders are deliverd!. <br/>Please note your transaction reference number: <b>".$_GET['ref']."</b> for future inquiries</span>";
				        }
				        if (isset($_GET['transaction']) && $_GET['transaction'] == 'failed'){

				            echo "<span class='alert-error'> Your transaction was unable to be completed.<br/>
				                    Please try again or contact us <a href='kkblog/help'>here</a>
				                </span>";
				        }

				    ?>

				      <b class="color-grey"> View Orders List </b>
				      <br/>
				      <b>Note:</b> Trasactions should only be completed when the user confirms receiving his or her delivery.

						<div class="clear-height"></div>
						<span style="<?php
								if (isset($_GET['ref'])){
									echo "display:none;";
								}
						?>">
							<button id="trnbtn1" style="background:#feb065;border: 1px solid #feb065;padding:6px;" onclick="
		                        $('#trnbtn2').css({'background':'silver','border':'silver'});
		                        $('#trnbtn1').css({'background':'#feb065','border':'1px solid #feb065'});
		                        $('#tbl1').show(100);
		                        $('#tbl2').hide(100);
		                    "> Pending Orders </button>

		                    <button id="trnbtn2" style="background:silver;border: 1px solid silver;padding:6px;" onclick="
		                        $('#trnbtn1').css({'background':'silver','border':'silver'});
		                        $('#trnbtn2').css({'background':'#50ea50','border':'1px solid #50ea50'});
		                        $('#tbl2').show(100);
		                        $('#tbl1').hide(100);
		                    "> Completed Orders </button>


								<div class="clear-height"></div>
								<div class="clear-height"></div>
					
						</span>
				      <br></br>

				<div style="width:100%;height:100%;position:relative;overflow-y:unset;">

					<!-- Pending -->
					<table id="tbl1">
						<th>No. of Items</th> <th>Cost of Items</th> <th> Transact ID </th><th>Payments</th> <th> Status </th> <th> Date </th> <th> Action </th><tr/>

						<?php

							if (!isset($_GET['ref']) && $_GET['user'] !== 'all'){

								$getOrders = "SELECT * FROM orders WHERE pid = '".$fetchuser['id']."' AND status = 'Pending' ORDER BY `payments` DESC LIMIT 0,50";
								$orders_query = mysqli_query($conn, $getOrders);
								$orders = mysqli_fetch_all($orders_query, MYSQLI_BOTH);
				                $orders_num = mysqli_num_rows($orders_query);
				            }
				            
							if (isset($_GET['ref']) && $_GET['user'] !== 'all'){

								$getOrders = "SELECT * FROM orders WHERE pid = '".$fetchuser['id']."' AND Tid = '".$_GET['ref']."' ORDER BY `payments` DESC LIMIT 0,50";
								$orders_query = mysqli_query($conn, $getOrders);
								$orders = mysqli_fetch_all($orders_query, MYSQLI_BOTH);
				                $orders_num = mysqli_num_rows($orders_query);
				            }

				            // All users transaction
							if (!isset($_GET['ref']) && $_GET['user'] == 'all'){

								$getOrders = "SELECT * FROM orders WHERE status = 'Pending' ORDER BY `payments` DESC LIMIT 0,50";
								$orders_query = mysqli_query($conn, $getOrders);
								$orders = mysqli_fetch_all($orders_query, MYSQLI_BOTH);
				                $orders_num = mysqli_num_rows($orders_query);
				            }
				            
							if (isset($_GET['ref']) && $_GET['user'] == 'all'){

								$getOrders = "SELECT * FROM orders WHERE Tid = '".$_GET['ref']."' ORDER BY `payments` DESC LIMIT 0,50";
								$orders_query = mysqli_query($conn, $getOrders);
								$orders = mysqli_fetch_all($orders_query, MYSQLI_BOTH);
				                $orders_num = mysqli_num_rows($orders_query);
				            }

							foreach ($orders as $order) {
								echo "<td>";

									$count_ck = explode(',', $order['no_items']);
									echo count($count_ck)-1;

								echo "</td><td>";

									
			                        if (strlen($order['cost']) == '4'){
			                            echo '&#8358; '.str_split($order['cost'],1)[0].','.substr($order['cost'],1);
			                        }
			                        else if (strlen($order['cost']) == '5'){
			                            echo '&#8358; '.str_split($order['cost'],2)[0].','.substr($order['cost'],2);
			                        }
			                        else if (strlen($order['cost']) == '6'){
			                            echo '&#8358; '.str_split($order['cost'],3)[0].','.substr($order['cost'],3);
			                        }
			                        else if (strlen($order['cost']) == '7'){
			                            echo '&#8358; '.str_split($order['cost'],2)[0].','.substr($order['cost'],2);
			                        }
			                        else {
			                            echo '&#8358; '.$order['cost'].'<br/>';
			                        }

								echo "</td><td>".$order['Tid']."</td><td>".$order['payments']."</td><td>".$order['status']."</td><td>".$order['date']."</td>";

								if ($order['status'] == 'Completed'){
									echo "<td>
										<form method='post' action='".htmlspecialchars('transactions.php')."'>
										<input class='display-hide' type='text' name='user' value='";
										
											if ($_GET['user'] == 'all'){
												echo $order['pid'];
											}
											else {
												echo $_GET['user'];
											}

									echo "'>
										<input class='display-hide' name='form' value='completeTransction'>
										<input class='display-hide' name='TSN' value='".$order['SN']."'>
										<button style='padding:4px;background-color:#ddd;border:1px solid #cfcfcf;border-radius:3px;' disabled> Completed </button>
										</form></td><tr/>";
								}

								if ($order['payments'] == 'Paid' && $order['status'] == 'Pending'){
									echo "<td>
										<form method='post' action='".htmlspecialchars('transactions.php')."'>
										<input class='display-hide' type='text' name='user' value='";

											if ($_GET['user'] == 'all'){
												echo $order['pid'];
											}
											else {
												echo $_GET['user'];
											}

									echo "'>
										<input class='display-hide' name='form' value='completeTransction'>
										<input class='display-hide' name='TSN' value='".$order['SN']."'>
										<button style='padding:4px;background-color: #16ed16;border:1px solid #3cdd0a;border-radius:3px;'> Complete </button>
										</form></td><tr/>";
								}

								if ($order['payments'] == 'Not Paid' && $order['status'] == 'Pending'){
									echo "<td>
										<form method='post' action='".htmlspecialchars('transactions.php')."'>
										<input class='display-hide' type='text' name='user' value='";
										
											if ($_GET['user'] == 'all'){
												echo $order['pid'];
											}
											else {
												echo $_GET['user'];
											}

									echo "'>
										<input class='display-hide' name='form' value='completeTransction'>
										<input class='display-hide' name='TSN' value='".$order['SN']."'>
										<button style='padding:4px;background-color: #16ed16;border:1px solid #3cdd0a;border-radius:3px;'> Complete </button>
										</form></td><tr/>";
								}
							}

			                    if ($orders_num < 1){
			                        echo "<td colspan='7'> <b class='color-grey'>No Transaction Found!</b> </td><tr/>";
			                    }
						?>
					</table>


					<!-- Completed -->
					<table id="tbl2" style="display:none;">
						<th>No. of Items</th> <th>Cost of Items</th> <th> Transact ID </th><th>Payments</th> <th> Status </th> <th> Date </th> <th> Action </th><tr/>

						<?php

							if (!isset($_GET['ref']) && $_GET['user'] !== 'all' && $_SERVER['REQUEST_METHOD'] !== 'POST'){

								$getOrders = "SELECT * FROM orders WHERE pid = '".$fetchuser['id']."' AND status = 'Completed' ORDER BY `payments` DESC LIMIT 0,50";
								$orders_query = mysqli_query($conn, $getOrders);
								$orders = mysqli_fetch_all($orders_query, MYSQLI_BOTH);
				                $orders_num = mysqli_num_rows($orders_query);
				            }
				            

							if (!isset($_GET['ref']) && $_GET['user'] !== 'all' && $_SERVER['REQUEST_METHOD'] == 'POST'){

								$getOrders = "SELECT * FROM orders WHERE status = 'Completed' ORDER BY `payments` DESC LIMIT 0,50";
								$orders_query = mysqli_query($conn, $getOrders);
								$orders = mysqli_fetch_all($orders_query, MYSQLI_BOTH);
				                $orders_num = mysqli_num_rows($orders_query);
				            }
				            

				            // All users transaction
							if (!isset($_GET['ref']) && $_GET['user'] == 'all'){

								$getOrders = "SELECT * FROM orders WHERE status = 'Completed' ORDER BY `payments` DESC LIMIT 0,50";
								$orders_query = mysqli_query($conn, $getOrders);
								$orders = mysqli_fetch_all($orders_query, MYSQLI_BOTH);
				                $orders_num = mysqli_num_rows($orders_query);
				            }
				            

							foreach ($orders as $order) {
								echo "<td>";

									$count_ck = explode(',', $order['no_items']);
									echo count($count_ck)-1;

								echo "</td><td>";

									
			                        if (strlen($order['cost']) == '4'){
			                            echo '&#8358; '.str_split($order['cost'],1)[0].','.substr($order['cost'],1);
			                        }
			                        else if (strlen($order['cost']) == '5'){
			                            echo '&#8358; '.str_split($order['cost'],2)[0].','.substr($order['cost'],2);
			                        }
			                        else if (strlen($order['cost']) == '6'){
			                            echo '&#8358; '.str_split($order['cost'],3)[0].','.substr($order['cost'],3);
			                        }
			                        else if (strlen($order['cost']) == '7'){
			                            echo '&#8358; '.str_split($order['cost'],2)[0].','.substr($order['cost'],2);
			                        }
			                        else {
			                            echo '&#8358; '.$order['cost'].'<br/>';
			                        }

								echo "</td><td>".$order['Tid']."</td><td>".$order['payments']."</td><td>".$order['status']."</td><td>".$order['date']."</td>";

								if ($order['payments'] == 'Paid' && $order['status'] == 'Completed'){
									echo "<td>
										<form method='post' action='".htmlspecialchars('transactions.php')."'>
										<input class='display-hide' type='text' name='user' value='".$_GET['user']."'>
										<input class='display-hide' name='form' value='completeTransction'>
										<input class='display-hide' name='TSN' value='".$order['SN']."'>
										<button style='padding:4px;background-color:#ddd;border:1px solid #cfcfcf;border-radius:3px;' disabled> Completed </button>
										</form></td><tr/>";
								}

								if ($order['payments'] == 'Paid' && $order['status'] == 'Pending'){
									echo "<td>
										<form method='post' action='".htmlspecialchars('transactions.php')."'>
										<input class='display-hide' type='text' name='user' value='".$_GET['user']."'>
										<input class='display-hide' name='form' value='completeTransction'>
										<input class='display-hide' name='TSN' value='".$order['SN']."'>
										<button style='padding:4px;background-color: #16ed16;border:1px solid #3cdd0a;border-radius:3px;'> Complete </button>
										</form></td><tr/>";
								}

								if ($order['payments'] == 'Not Paid' && $order['status'] == 'Pending'){
									echo "<td>
										<form method='post' action='".htmlspecialchars('transactions.php')."'>
										<input class='display-hide' type='text' name='user' value='".$_GET['user']."'>
										<input class='display-hide' name='form' value='completeTransction'>
										<input class='display-hide' name='TSN' value='".$order['SN']."'>
										<button style='padding:4px;background-color: #16ed16;border:1px solid #3cdd0a;border-radius:3px;'> Complete </button>
										</form></td><tr/>";
								}

							}


								if ($orders_num < 1){
									echo "<td colspan='7'> <b class='color-grey'>No Transaction Found!</b> </td><tr/>";
								}
						?>
					</table>


                <div class="clear-height"></div>
                <div class="clear-height"></div>
                <div class="clear-height"></div>

                <div class="grid column-1 no-border center">
                    <h4> Kloset Kollective &copy; 2018 </h4>
                </div>

                
			</div>
		</div>
</body>
</html>

