<?php

	require '../config.php';

// manage products

	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form']) ){

		 if ($_POST['form'] == 'products'){
			
			$insProd = "INSERT INTO `products` (`prod_name`, `prod_desc`, `prod_genre`, `prod_brand`, `prod_cat`, `prod_price`,`prod_attach`) VALUES ('".mysqli_real_escape_string($conn,$_POST["Pname"])."','".mysqli_real_escape_string($conn,$_POST["Pdesc"])."','".mysqli_real_escape_string($conn,$_POST["Pgenre"])."','".mysqli_real_escape_string($conn,$_POST["Pbrand"])."','".mysqli_real_escape_string($conn,$_POST["Pcat"])."','".mysqli_real_escape_string($conn,htmlspecialchars($_POST["currency"]).' '.$_POST["price"])."','".date('DMY_his').'_'.$_FILES["productImg"]["name"]."')";
			$insProd_query = mysqli_query($conn, $insProd);

			if ($insProd_query){
				
				if (move_uploaded_file($_FILES["productImg"]["tmp_name"], '../products/images/'.date('DMY_his').'_'.$_FILES["productImg"]["name"])){
					header('location:./?changes=success&object=Product&page='.urlencode(".menu.".$_POST['form']));
				}
				else {
					print_r(error_get_last());
				}

			}

			else{
				echo mysqli_error($conn);
			}
		}

	}


// manage website data 

	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form']) ){

		 if ($_POST['form'] == 'website'){
			
			$updWeb = "UPDATE `website_info` SET `website_name` = '".$_POST["webName"]."', `blog_name` = '".$_POST["blogName"]."', `website_desc` ='".$_POST["webDesc"]."',`head_maintext` = '".$_POST["head_maintext"]."', `head_subtext` = '".$_POST["head_subtext"]."', `shoptheeditLeftImg` = '".$_POST["shoptheeditLeftImg"]."', `shoptheeditRightImg` = '".$_POST["shoptheeditRightImg"]."', `shoptheeditLeftMainText` = '".$_POST["shoptheeditLeftMainText"]."', `shoptheeditLeftSubText` = '".$_POST["shoptheeditLeftSubText"]."', `shoptheeditRightMainText` = '".$_POST["shoptheeditRightMainText"]."', `shoptheeditRightSubText` = '".$_POST["shoptheeditRightSubText"]."', `menshoptheeditLeftImg` = '".$_POST["menshoptheeditLeftImg"]."', `menshoptheeditRightImg` = '".$_POST["menshoptheeditRightImg"]."', `menshoptheeditLeftMainText` = '".$_POST["menshoptheeditLeftMainText"]."', `menshoptheeditLeftSubText` = '".$_POST["menshoptheeditLeftSubText"]."', `menshoptheeditRightMainText` = '".$_POST["menshoptheeditRightMainText"]."', `menshoptheeditRightSubText` = '".$_POST["menshoptheeditRightSubText"]."', `shop_bycat1` = '".$_POST["shop_bycat1"]."', `shop_bycat2` = '".$_POST["shop_bycat2"]."', `shop_bycat3` = '".$_POST["shop_bycat3"]."', `shop_bycat4` = '".$_POST["shop_bycat4"]."', `shop_bycat5` = '".$_POST["shop_bycat5"]."', `shop_bycat_img1` = '".$_POST["shop_bycat_img1"]."', `shop_bycat_img2` = '".$_POST["shop_bycat_img2"]."', `shop_bycat_img3` = '".$_POST["shop_bycat_img3"]."', `shop_bycat_img4` = '".$_POST["shop_bycat_img4"]."', `shop_bycat_img5` = '".$_POST["shop_bycat_img5"]."', `menshop_bycat1` = '".$_POST["menshop_bycat1"]."', `menshop_bycat2` = '".$_POST["menshop_bycat2"]."', `menshop_bycat3` = '".$_POST["menshop_bycat3"]."', `menshop_bycat4` = '".$_POST["menshop_bycat4"]."', `menshop_bycat5` = '".$_POST["menshop_bycat5"]."', `menshop_bycat_img1` = '".$_POST["menshop_bycat_img1"]."', `menshop_bycat_img2` = '".$_POST["menshop_bycat_img2"]."', `menshop_bycat_img3` = '".$_POST["menshop_bycat_img3"]."', `menshop_bycat_img4` = '".$_POST["menshop_bycat_img4"]."', `menshop_bycat_img5` = '".$_POST["menshop_bycat_img5"]."', `website_mnt` ='".$_POST["webMnt"]."'  WHERE `webSN` = '1' ";
			$updWeb_query = mysqli_query($conn, $updWeb);


			// Shop The Edit Images For Women

			if (isset($_FILES['leftimg']['name']) && $_FILES['leftimg']['name'] !== ''){

				if (!file_exists('../images')){
					mkdir('../images', 0777, true);
				}
				if (move_uploaded_file($_FILES['leftimg']['tmp_name'], '../images/'.$_FILES['leftimg']['name'])){
					//do nothing
				}

				$updWebimg = "UPDATE `website_info` SET shoptheeditLeftImg = '".$_FILES['leftimg']['name']."' WHERE `webSN` = '1' ";
				$updWebimg_query = mysqli_query($conn, $updWebimg);

				if ($updWebimg_query){
					//do nothing
				}
			}

			if (isset($_FILES['rightimg']['name']) && $_FILES['rightimg']['name'] !== ''){

				if (!file_exists('../images')){
					mkdir('../images', 0777, true);
				}
				if (move_uploaded_file($_FILES['rightimg']['tmp_name'], '../images/'.$_FILES['rightimg']['name'])){
					//do nothing
				}

				$updWebimg = "UPDATE `website_info` SET shoptheeditRightImg = '".$_FILES['rightimg']['name']."' WHERE `webSN` = '1' ";
				$updWebimg_query = mysqli_query($conn, $updWebimg);

				if ($updWebimg_query){
					//do nothing
				}
			}

			// Category Images For Women
			
			if (isset($_FILES['img1']['name']) && $_FILES['img1']['name'] !== ''){

				if (!file_exists('../images')){
					mkdir('../images', 0777, true);
				}
				if (move_uploaded_file($_FILES['img1']['tmp_name'], '../images/'.$_FILES['img1']['name'])){
					//do nothing
				}

				$updWebimg = "UPDATE `website_info` SET shop_bycat_img1 = '".$_FILES['img1']['name']."' WHERE `webSN` = '1' ";
				$updWebimg_query = mysqli_query($conn, $updWebimg);

				if ($updWebimg_query){
					//do nothing
				}
			}

			if (isset($_FILES['img2']['name']) && $_FILES['img2']['name'] !== ''){

				if (!file_exists('../images')){
					mkdir('../images', 0777, true);
				}
				if (move_uploaded_file($_FILES['img2']['tmp_name'], '../image/'.$_FILES['img2']['name'])){
					//do nothing
				}

				$updWebimg = "UPDATE `website_info` SET shop_bycat_img2 = '".$_FILES['img2']['name']."' WHERE `webSN` = '1' ";
				$updWebimg_query = mysqli_query($conn, $updWebimg);

				if ($updWebimg_query){
					//do nothing
				}
			}

			if (isset($_FILES['img3']['name']) && $_FILES['img3']['name'] !== ''){

				if (!file_exists('../images')){
					mkdir('../images', 0777, true);
				}
				if (move_uploaded_file($_FILES['img3']['tmp_name'], '../images/'.$_FILES['img3']['name'])){
					//do nothing
				}

				$updWebimg = "UPDATE `website_info` SET shop_bycat_img3 = '".$_FILES['img3']['name']."' WHERE `webSN` = '1' ";
				$updWebimg_query = mysqli_query($conn, $updWebimg);

				if ($updWebimg_query){
					//do nothing
				}
			}

			if (isset($_FILES['img4']['name']) && $_FILES['img4']['name'] !== ''){

				if (!file_exists('../images')){
					mkdir('../images', 0777, true);
				}
				if (move_uploaded_file($_FILES['img4']['tmp_name'], '../images/'.$_FILES['img4']['name'])){
					//do nothing
				}

				$updWebimg = "UPDATE `website_info` SET shop_bycat_img4 = '".$_FILES['img4']['name']."' WHERE `webSN` = '1' ";
				$updWebimg_query = mysqli_query($conn, $updWebimg);

				if ($updWebimg_query){
					//do nothing
				}
			}

			if (isset($_FILES['img5']['name']) && $_FILES['img5']['name'] !== ''){

				if (!file_exists('../images')){
					mkdir('../images', 0777, true);
				}
				if (move_uploaded_file($_FILES['img5']['tmp_name'], '../images/'.$_FILES['img5']['name'])){
					//do nothing
				}

				$updWebimg = "UPDATE `website_info` SET shop_bycat_img5 = '".$_FILES['img5']['name']."' WHERE `webSN` = '1' ";
				$updWebimg_query = mysqli_query($conn, $updWebimg);

				if ($updWebimg_query){
					//do nothing
				}
			}


			// Shop The Edit Images For Men

			if (isset($_FILES['menleftimg']['name']) && $_FILES['menleftimg']['name'] !== ''){

				if (!file_exists('../images')){
					mkdir('../images', 0777, true);
				}
				if (move_uploaded_file($_FILES['menleftimg']['tmp_name'], '../images/'.$_FILES['menleftimg']['name'])){
					//do nothing
				}

				$updWebimg = "UPDATE `website_info` SET menshoptheeditLeftImg = '".$_FILES['menleftimg']['name']."' WHERE `webSN` = '1' ";
				$updWebimg_query = mysqli_query($conn, $updWebimg);

				if ($updWebimg_query){
					//do nothing
				}
			}

			if (isset($_FILES['menrightimg']['name']) && $_FILES['menrightimg']['name'] !== ''){

				if (!file_exists('../images')){
					mkdir('../images', 0777, true);
				}
				if (move_uploaded_file($_FILES['menrightimg']['tmp_name'], '../images/'.$_FILES['menrightimg']['name'])){
					//do nothing
				}

				$updWebimg = "UPDATE `website_info` SET menshoptheeditRightImg = '".$_FILES['menrightimg']['name']."' WHERE `webSN` = '1' ";
				$updWebimg_query = mysqli_query($conn, $updWebimg);

				if ($updWebimg_query){
					//do nothing
				}
			}

			// Category Images For Men

			if (isset($_FILES['menimg1']['name']) && $_FILES['menimg1']['name'] !== ''){

				if (!file_exists('../images2')){
					mkdir('../images2', 0777, true);
				}
				if (move_uploaded_file($_FILES['menimg1']['tmp_name'], '../images2/'.$_FILES['menimg1']['name'])){
					//do nothing
				}

				$updWebimg = "UPDATE `website_info` SET menshop_bycat_img1 = '".$_FILES['menimg1']['name']."' WHERE `webSN` = '1' ";
				$updWebimg_query = mysqli_query($conn, $updWebimg);

				if ($updWebimg_query){
					//do nothing
				}
			}

			if (isset($_FILES['menimg2']['name']) && $_FILES['menimg2']['name'] !== ''){

				if (!file_exists('../images')){
					mkdir('../images', 0777, true);
				}
				if (move_uploaded_file($_FILES['menimg2']['tmp_name'], '../image/'.$_FILES['menimg2']['name'])){
					//do nothing
				}

				$updWebimg = "UPDATE `website_info` SET menshop_bycat_img2 = '".$_FILES['menimg2']['name']."' WHERE `webSN` = '1' ";
				$updWebimg_query = mysqli_query($conn, $updWebimg);

				if ($updWebimg_query){
					//do nothing
				}
			}

			if (isset($_FILES['menimg3']['name']) && $_FILES['menimg3']['name'] !== ''){

				if (!file_exists('../images')){
					mkdir('../images', 0777, true);
				}
				if (move_uploaded_file($_FILES['menimg3']['tmp_name'], '../images/'.$_FILES['menimg3']['name'])){
					//do nothing
				}

				$updWebimg = "UPDATE `website_info` SET menshop_bycat_img3 = '".$_FILES['menimg3']['name']."' WHERE `webSN` = '1' ";
				$updWebimg_query = mysqli_query($conn, $updWebimg);

				if ($updWebimg_query){
					//do nothing
				}
			}

			if (isset($_FILES['menimg4']['name']) && $_FILES['menimg4']['name'] !== ''){

				if (!file_exists('../images')){
					mkdir('../images', 0777, true);
				}
				if (move_uploaded_file($_FILES['menimg4']['tmp_name'], '../images/'.$_FILES['menimg4']['name'])){
					//do nothing
				}

				$updWebimg = "UPDATE `website_info` SET menshop_bycat_img4 = '".$_FILES['menimg4']['name']."' WHERE `webSN` = '1' ";
				$updWebimg_query = mysqli_query($conn, $updWebimg);

				if ($updWebimg_query){
					//do nothing
				}
			}

			if (isset($_FILES['menimg5']['name']) && $_FILES['menimg5']['name'] !== ''){

				if (!file_exists('../images')){
					mkdir('../images', 0777, true);
				}
				if (move_uploaded_file($_FILES['menimg5']['tmp_name'], '../images/'.$_FILES['menimg5']['name'])){
					//do nothing
				}

				$updWebimg = "UPDATE `website_info` SET menshop_bycat_img5 = '".$_FILES['menimg5']['name']."' WHERE `webSN` = '1' ";
				$updWebimg_query = mysqli_query($conn, $updWebimg);

				if ($updWebimg_query){
					//do nothing
				}
			}

			if ($updWeb_query){
				header('location:./?changes=success&page='.urlencode(".menu.".$_POST['form']));
			}
			else{
				echo mysqli_error($conn);
			}

		}

	}



// manage blog post data

	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form']) ){

		 if ($_POST['form'] == 'blogs'){
			
			

			$insBlog = "INSERT INTO `blog` (`blog_title`,`blog_story`,`blog_date`,`blog_time`,`blog_attach`) VALUES ('".mysqli_real_escape_string($conn,$_POST["blog_title"])."','".mysqli_real_escape_string($conn,$_POST["editor1"])."','".mysqli_real_escape_string($conn,$date)."','".mysqli_real_escape_string($conn,$time)."','".date('DMY_his').'_'.$_FILES["blogAttach"]["name"]."')";
			$insBlog_query = mysqli_query($conn, $insBlog);

			if ($insBlog_query){

				if (move_uploaded_file($_FILES["blogAttach"]["tmp_name"], '../blogs/blogimages/'.date('DMY_his').'_'.$_FILES["blogAttach"]["name"])){
					header('location:./blogedit/?changes=success&object=Blog&page='.urlencode(".menu.".$_POST['form']));
				}
				else {
					print_r(error_get_last());
				}

			}
			else{
				echo mysqli_error($conn);
			}

		}

	}



// manage users

	// Lock user
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lockUser']) ){

		 if ($_POST['lockUser'] == true){
			
			$blockUser = "UPDATE users SET status = 'blocked' WHERE id = '".$_POST['lockUser']."'";
            $blockUser_query = mysqli_query($conn,$blockUser);
                                    
			if ($blockUser_query){

					header('location:./?changes=success&object=User+Blocked&page='.urlencode(".menu.users"));
				}
				else {
					header('location:./?changes=error&object=Cannot+Block+User&page='.urlencode(".menu.users"));
				}

			}
			else{
				echo mysqli_error($conn);
			}

		}


	// Unlock User
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['unlockUser']) ){

		 if ($_POST['unlockUser'] == true){
			
			$unblockUser = "UPDATE users SET status = 'active' WHERE id = '".$_POST['unlockUser']."'";
            $unblockUser_query = mysqli_query($conn,$unblockUser);
                                    
			if ($unblockUser_query){

					header('location:./?changes=success&object=User+Blocked&page='.urlencode(".menu.users"));
				}
				else {
					header('location:./?changes=error&object=Cannot+Block+User&page='.urlencode(".menu.users"));
				}

			}
			else{
				echo mysqli_error($conn);
			}

		}


?>




