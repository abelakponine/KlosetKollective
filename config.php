<?php
	
	require 'db.php';
	require 'mysqli_fetch_all.php';
	session_start();
	
	$webdata = "SELECT * FROM `website_info`";
	$web_query = mysqli_query($conn,$webdata);
	$web_res = mysqli_fetch_assoc($web_query);

	$webName = $web_res['website_name'];
	$blogName = $web_res['blog_name'];
	$webDesc = $web_res['website_desc'];
	$webMnt = $web_res['website_mnt'];

	$cat_xx = 'women';
    $cat_xy = 'men';
    $sitename = 'Kloset Kollective';

    $uri = $_SERVER['REQUEST_URI'];
    $e_uri = explode('/', $uri);
    $c_uri = count($e_uri)-1;

    $date = date('D M Y');
    $time = date('h:i a');

if (isset($_SESSION['username']) && isset($_SESSION['password'])){
	
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];

}

?>