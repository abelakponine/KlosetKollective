<?php

require 'db.php';


$createdb = "CREATE TABLE `website_info` (
			`webSN` int auto_increment NOT NULL,
			`website_name` varchar(25) NOT NULL,
			`blog_name` varchar(25) NOT NULL,
			`website_desc` Longtext NOT NULL,
			`head_maintext` Longtext NOT NULL,
			`head_subtext` Longtext NOT NULL,
			`shoptheeditLeftImg` Longtext NOT NULL,
			`shoptheeditRightImg` Longtext NOT NULL,
			`shoptheeditLeftMainText` Longtext NOT NULL,
			`shoptheeditLeftSubText` Longtext NOT NULL,
			`shoptheeditRightMainText` Longtext NOT NULL,
			`shoptheeditRightSubText` Longtext NOT NULL,
			`menshoptheeditLeftImg` Longtext NOT NULL,
			`menshoptheeditRightImg` Longtext NOT NULL,
			`menshoptheeditLeftMainText` Longtext NOT NULL,
			`menshoptheeditLeftSubText` Longtext NOT NULL,
			`menshoptheeditRightMainText` Longtext NOT NULL,
			`menshoptheeditRightSubText` Longtext NOT NULL,
			`shop_bycat1` Longtext NOT NULL,
			`shop_bycat2` Longtext NOT NULL,
			`shop_bycat3` Longtext NOT NULL,
			`shop_bycat4` Longtext NOT NULL,
			`shop_bycat5` Longtext NOT NULL,
			`shop_bycat_img1` Longtext NOT NULL,
			`shop_bycat_img2` Longtext NOT NULL,
			`shop_bycat_img3` Longtext NOT NULL,
			`shop_bycat_img4` Longtext NOT NULL,
			`shop_bycat_img5` Longtext NOT NULL,
			`menshop_bycat1` Longtext NOT NULL,
			`menshop_bycat2` Longtext NOT NULL,
			`menshop_bycat3` Longtext NOT NULL,
			`menshop_bycat4` Longtext NOT NULL,
			`menshop_bycat5` Longtext NOT NULL,
			`menshop_bycat_img1` Longtext NOT NULL,
			`menshop_bycat_img2` Longtext NOT NULL,
			`menshop_bycat_img3` Longtext NOT NULL,
			`menshop_bycat_img4` Longtext NOT NULL,
			`menshop_bycat_img5` Longtext NOT NULL,
			`facebook_link` Longtext NOT NULL,
			`twitter_link` Longtext NOT NULL,
			`instagram_link` Longtext NOT NULL,
			`website_mnt` varchar(4) NOT NULL,
			PRIMARY KEY(`webSN`)
)";

$cdb_query = mysqli_query($conn,$createdb);

if ($cdb_query){
	echo 'Table Website Info has Been Created <br/>';
}
else {
	echo mysqli_error($conn).'<br/>';
}

// Insert values to Website Info

$webInfo = "INSERT INTO `website_info` (`website_name`,`blog_name`,`website_desc`,`head_maintext`,`head_subtext`,`shoptheeditLeftImg`,`shoptheeditRightImg`,`shoptheeditLeftMainText`,`shoptheeditLeftSubText`,`shoptheeditRightMainText`,`shoptheeditRightSubText`,`menshoptheeditLeftImg`,`menshoptheeditRightImg`,`menshoptheeditLeftMainText`,`menshoptheeditLeftSubText`,`menshoptheeditRightMainText`,`menshoptheeditRightSubText`,`shop_bycat1`,`shop_bycat2`,`shop_bycat3`,`shop_bycat4`,`shop_bycat5`,`shop_bycat_img1`,`shop_bycat_img2`,`shop_bycat_img3`,`shop_bycat_img4`,`shop_bycat_img5`,`menshop_bycat1`,`menshop_bycat2`,`menshop_bycat3`,`menshop_bycat4`,`menshop_bycat5`,`menshop_bycat_img1`,`menshop_bycat_img2`,`menshop_bycat_img3`,`menshop_bycat_img4`,`menshop_bycat_img5`,`website_mnt`)
			VALUES ('KlosetKollect','K-Blog','E-commerce','Welcome to KlosetKollect','you can change this text from control panel','fashion6.jpg','fashion7.jpg','NEW-SEASON SUITS','Suitability game strong','COLD-WEATHER ACCESSORIES','Coats are only the beginning','fashion-men5.jpg','fashion-men2.jpg','NEW-SEASON SUITS','Suitability game strong','COLD-WEATHER ACCESSORIES','Coats are only the beginning','Dresses','Dresses','Dresses','Dresses','Dresses','fashion1.jpg','fashion3.jpg','fashion6.jpg','fashion9.jpg','fashion11.jpg','Shirts','Shirts','Shirts','Shirts','Shirts','fashion-men1.jpg','fashion-men2.jpg','fashion-men6.jpg','fashion-men5.jpg','fashion-men7.jpg','Off')";

$webInfo_query = mysqli_query($conn,$webInfo);

if ($webInfo_query){
	echo 'Website Info has Been Updated <br/>';
}
else {
	echo mysqli_error($conn).'<br/>';
}





// Orders Table
$orderdb = "CREATE TABLE `orders` (
			`SN` int auto_increment NOT NULL,
			`pid` varchar(25) NOT NULL,
			`no_items` Longtext NOT NULL,
			`cost` Longtext NOT NULL,
			`Tid` Longtext NOT NULL,
			`payments` Longtext NOT NULL,
			`status` varchar(50) NOT NULL,
			`date` varchar(50) NOT NULL,
			PRIMARY KEY(`SN`)
)";

$orderdb_query = mysqli_query($conn,$orderdb);

if ($orderdb_query){
	echo 'Table Orders has Been Created <br/>';
}
else {
	echo mysqli_error($conn).'<br/>';
}




// Users Table
$createdb = "CREATE TABLE `users` (
			`id` int auto_increment NOT NULL,
			`Fname` varchar(25) NOT NULL,
			`Lname` varchar(25) NOT NULL,
			`email` varchar(25) NOT NULL,
			`gender` varchar(25) NOT NULL,
			`telephone` varchar(25) NOT NULL,
			`address` varchar(25) NOT NULL,
			`country` varchar(25) NOT NULL,
			`username` varchar(25) NOT NULL,
			`password` Longtext NOT NULL,
			`avatar` varchar(50) NOT NULL,
			`status` varchar(50) NOT NULL,
			PRIMARY KEY(`id`)
)";

$cdb_query = mysqli_query($conn,$createdb);

if ($cdb_query){
	echo 'Table Users has Been Created <br/>';
}
else {
	echo mysqli_error($conn).'<br/>';
}



// Product Table
$cprod = "CREATE TABLE `products` (
			`SN` int auto_increment NOT NULL,
			`prod_name` varchar(25) NOT NULL,
			`prod_desc` varchar(25) NOT NULL,
			`prod_genre` varchar(25) NOT NULL,
			`prod_brand` varchar(25) NOT NULL,
			`prod_cat` varchar(25) NOT NULL,
			`prod_price` varchar(25) NOT NULL,
			`prod_attach` varchar(50) NOT NULL,
			PRIMARY KEY(`SN`)
)";

$cprod_query = mysqli_query($conn,$cprod);

if ($cprod_query){
	echo 'Table Products has Been Created <br/>';
}
else {
	echo mysqli_error($conn).'<br/>';
}



// Product Colours Table
$cpcolor = "CREATE TABLE `prod_colours` (
			`SN` int auto_increment NOT NULL,
			`colour_name` varchar(25) NOT NULL,
			`colour_code` varchar(25) NOT NULL,
			PRIMARY KEY(`SN`),
			UNIQUE(`colour_name`)
)";

$cpcolor_query = mysqli_query($conn,$cpcolor);

if ($cpcolor_query){
	echo 'Table Product Colours has Been Created <br/>';
}
else {
	echo mysqli_error($conn).'<br/>';
}


$colors = array('Red','Blue','Black','Brown','White','Green','Yellow','Pink','Orange','Silver','Light Blue');



// Insert colours to table
foreach ($colors as $color) {


$spcolor = "INSERT INTO `prod_colours` (`colour_name`)
			VALUES ('$color')";

$spcolor_query = mysqli_query($conn,$spcolor);

if ($spcolor_query){
	echo 'Product Colours '.$color.' has Been Prepared <br/>';
}
else {
	echo mysqli_error($conn).'<br/>';
}


}



// Product Sizes Table
$cpsize = "CREATE TABLE `prod_size` (
			`SN` int auto_increment NOT NULL,
			`class` varchar(25) NOT NULL,
			`size` varchar(25) NOT NULL,
			PRIMARY KEY(`SN`),
			UNIQUE(`size`)
)";

$cpsize_query = mysqli_query($conn,$cpsize);

if ($cpsize_query){
	echo 'Table Product Sizes has Been Created <br/>';
}
else {
	echo mysqli_error($conn).'<br/>';
}

$sizes = array('US 20 (32)','US 22 (23)','US 24 (12)','US 26 (17)','US 4.5 (1)','US 5 (24)','US 5.5 (27)','US 6 (36)','US 6.5 (26)','US 7 (37)','US 7.5 (28)','US 8 (41)','US 8.5 (36)','US 9 (38)','US 9.5 (32)','US 10 (38)','US 10.5 (26)','US 11 (15)','US 11.5 (2)','XXS (94)','XS (314)','S (308)','M (277)','L (308)','XL (239)','XXL (71)','XXXL (17)','One Size (42)','Cupsize 30 A (1)','Cupsize 30 B (3)','Cupsize 30 C (3)','Cupsize 30 D (1)','Cupsize 32 A (3)','Cupsize 32 B (1)','Cupsize 32 C (4)','Cupsize 32 D (5)','Cupsize 32 DDD/F (3)','Cupsize 34 A (3)','Cupsize 34 B (3)','Cupsize 34 C (5)','Cupsize 34 D (4)','Cupsize 34 DD/E (1)','Cupsize 34 DDD/F (3)','Cupsize 36 A (3)','Cupsize 36 B (5)','Cupsize 36 C (5)','Cupsize 36 D (4)','Cupsize 36 DD/E (1)','Cupsize 36 DDD/F (1)','Cupsize 38 A (1)','Cupsize 38 B (3)','Cupsize 38 C (3)','Cupsize 38 D (4)','Cupsize 38 DDD/F (1)','Cupsize 40 C (1)','Cupsize 40 D (1)','Cupsize 40 DDD/F (1)');



// Insert values to Poduct sizes
foreach ($sizes as $size) {


$spcolor = "INSERT INTO `prod_size` (`class`,`size`)
			VALUES ('shoes','$size')";

$spcolor_query = mysqli_query($conn,$spcolor);

if ($spcolor_query){
	echo 'Product Shoes sizes '.$color.' has Been Prepared <br/>';
}
else {
	echo mysqli_error($conn).'<br/>';
}


}


// Product Brands Table
$cpbrand = "CREATE TABLE `prod_brand` (
			`SN` int auto_increment NOT NULL,
			`brand_name` varchar(25) NOT NULL,
			PRIMARY KEY(`SN`),
			UNIQUE(`brand_name`)
)";

$cpbrand_query = mysqli_query($conn,$cpbrand);

if ($cpbrand_query){
	echo 'Table Product Brands has Been Created <br/>';
}
else {
	echo mysqli_error($conn).'<br/>';
}

$brands = array('Dune','Glamorous','Prada','Nike','Public Desire','Puma','Raid','Reebok','Vans');



// Insert values to Poduct Brands
foreach ($brands as $brand) {


$spbrand = "INSERT INTO `prod_brand` (`brand_name`)
			VALUES ('$brand')";

$spbrand_query = mysqli_query($conn,$spbrand);

if ($spbrand_query){
	echo 'Product Brands '.$brand.' has Been Prepared <br/>';
}
else {
	echo mysqli_error($conn).'<br/>';
}


}



// Blog Posts
$cblog = "CREATE TABLE `blog` (
			`SN` int auto_increment NOT NULL,
			`blog_title` varchar(50) NOT NULL,
			`blog_story` Longtext NOT NULL,
			`blog_date` varchar(25) NOT NULL,
			`blog_time` varchar(25) NOT NULL,
			`blog_attach` varchar(50) NOT NULL,
			PRIMARY KEY(`SN`)
)";

$cblog_query = mysqli_query($conn,$cblog);

if ($cblog_query){
	echo 'Table Blog has Been Created <br/>';
}
else {
	echo mysqli_error($conn).'<br/>';
}


// Carts Database
$cart = "CREATE TABLE `carts` (
			`SN` int auto_increment NOT NULL,
			`cid` varchar(50) NOT NULL,
			`prod_id` Longtext NOT NULL,
			`cart_date` varchar(25) NOT NULL,
			`cart_time` varchar(25) NOT NULL,
			PRIMARY KEY(`SN`)
)";

$cart_query = mysqli_query($conn,$cart);

if ($cart_query){
	echo 'Table Cart has Been Created <br/>';
}
else {
	echo mysqli_error($conn).'<br/>';
}



?>


