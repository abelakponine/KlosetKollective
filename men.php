<?php
    require 'config.php';
    $pagename = 'Online Shopping Mall';
    $genre = 'men';
    $_SESSION['genre'] = $genre;
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,minimum-scale=0.1,maximum-scale=1"/>
    <meta http-equiv="cache-control" content="no-cache,no-store,no-save,s-maxage,must-revalidate,proxy-revalidate,max-age=-1">
    <meta http-equiv="pragma" content="no-cache,no-store,no-save,s-maxage,must-revalidate,proxy-revalidate,max-age=-1">
    <meta name="theme-color" content="#404040"/>

    <link rel="stylesheet" href="css/glui.app.css"/>
    <link rel="stylesheet" href="css/home.css"/>
    <link rel="stylesheet" href="css/men.css"/>
    <link rel="stylesheet" href="fontawesome/css/all.css"/>
    <link rel="stylesheet" href="css/mobile.css"/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/glui.app.js" async></script>
    <script type="text/javascript" src="js/glui.slider.js" async></script>
    <script type="text/javascript" src="js/jquery.constellation.js"></script>
    <title> <?php echo $webName.' | '.$webDesc; ?> </title>

    <style type="text/css">
        .entry-meta a {
            margin: auto 4px auto 8px;
        }
        .blog a[rel=bookmark] {
            display: none;
            margin: 1% auto;
        }
        .blog a[rel=bookmark] img {
            width: 450px;
            height: auto;
        }
        .blog a[rel=bookmark]:nth-of-type(1) {
            display: block;
        }

        #blogLoader2 time[class=updated] {
            display: none;
        }

        #blogLoader2 .entry-container {
            display: none;
        }
        
        #blogLoader2 .entry-container:nth-of-type(1) {
            display: block;
        }
        #blogLoader2 .entry-container:nth-of-type(2) {
            display: block;
        }
        
        @media all and (max-width:900px){

            .no-border.grid.column-3x2 {
                width: 100%;
                text-align: center;
            }
            #blogLoader1 {
                width: 98% !important;
            }

            .blog a[rel=bookmark] img {
                width: 80%;
                height: auto;
            }
        }
    </style>
    
</head>
<body>
  
    <?php include 'sidebar.php';?>

        <div id="darkLayer" class="center navOffset" style="z-index:9;">
            <div id="searchLoader" style="height:100%;overflow:auto;">
                <span class="fas fa-spinner fa-spin navOffsetx3" style="font-size:2.5em;color:#adadad;"></span>
            </div>
        </div>

        <div id="header-Layer" style="display:none;position:fixed;opacity:0.4;z-index:9;"></div>

        <div id="prodbox" style="display:none;background:none;width:100%;height:100%;position:fixed;z-index:9;margin:auto;">
            <div class="navOffset" style="display:block;background:white;width:650px;height:100%;position:relative;margin:auto;padding:2%;">
                <div style="position:relative;z-index:8;"><span class="close fas fa-times absolute" style="top:10px;right:40px;font-size:18px;cursor:pointer;color:grey;"></span></div>
                <section style="display:block;width:100%;height:100%;position:relative;"></section>
            </div>
        </div>

        <div class="grid column-1 absolute no-border z-index-10 full-height" style="display:none;background:white;opacity:0.96;">

        </div>

        <script type="text/javascript">
            function doSearch() {
                if($('input[type=search]').val().length > 0){
                    $('body').css({'overflow-y':'hidden'});
                    $('#darkLayer').show();
                    $('#searchLoader').html('<span class="fas fa-spinner fa-spin navOffsetx3" style="font-size:2.5em;color:#adadad;"></span>');
                    $('#searchLoader').load('category.php?products=New+in&class=viewall&genre=men&search='+$('input[type=search]').val().replace(' ','+')+' container');
                    $('.checkout').load('category.php?products=New+in&class=viewall&genre=men&search='+$('input[type=search]').val().replace('%20',' ')+' checkout');
                }
                else {
                    $('body').css({'overflow-y':'auto'});
                    $('#darkLayer').hide();
                    $('#prodbox').hide(50);
                    $('#header-Layer').hide(50);

                }
            }

            $('.close').click(function(){
                $('#prodbox').hide(50);
                $('#header-Layer').hide(50);
            });
        </script>

    <div id="sidebar" class="z-index-8 navOffset">
        
        <button class="mclose absolute no-margin no-border navOffset" style="font-size:1.3em;right:-22px;border-radius:3px;" onclick="
            if ($('#sidebar').position().left >= 0){
                $('#sidebar').animate({'left':'-100%'},200);
            }
        "><span class="fas fa-times"></span></button>
        
        <div style="display:block;max-height:94%;position:relative;overflow:auto;">
        
        
            <p></p>
            <li><span class="fas fa-home"></span> Home </li>
            <hr/>
            <li><span class="fas fa-box-open"></span> Newbies </li>
            <hr/>
            <li><span class="fas fa-tshirt"></span> Clothing </li>
            <hr/>
            <li><span class="fas fa-home"></span> Shoes </li>
            <hr/>
            <li><span class="fas fa-gem"></span> Accessories </li>
            <hr/>
            <li><span class="fas fa-universal-access"></span> Brands </li>
            <hr/>
            <li><span class="fas fa-home"></span> Outlets (up to 70% off) </li>
            <hr/>
            <h3>Discover More</h3>
            <hr/>
            <li><span class="fas fa-shopping-basket"></span> Marketplace </li>
            <hr/>
            <li><span class="fas fa-home"></span> Inspiration </li>
            <hr/>
            <li><span class="fas fa-sign-in-alt"></span> Login </li>
            <hr/>
            <li><span class="fas fa-fingerprint"></span> Register </li>
            <hr/>
            <p>&nbsp;</p>
        </div>
    </div>
    
    
            <!-- Overall Navbar Starts -->
            
        <div class="nav z-index-2">
            <div class="rowspan display-block">

                <div class="grid column-5x2 no-border no-padding" style="min-width:420px;">
                    <div class="rowspan list-item ">

                        <div class="mbtn grid column-2 no-border">
                            <button onclick="
                        if ($('#sidebar').position().left < 0){
                            $('#sidebar').animate({'left':'0px'},200);
                        }
                        if ($('#sidebar').position().left >= 0){
                            $('#sidebar').animate({'left':'-100%'},200);
                        }
                    "></button>
                        </div>

                        <div class="grid column-2 no-border">
                            <span id='logo1' class="brandName" style="font-size:1.5em;line-height:20px;">
                                <?php echo $webName;?>
                            </span>
                            <span class="brandName" style="font-size:1.5em;line-height:20px;">
                                <object id='logo2' data="kk.svg" style="width:30px;"></object>
                            </span>
                        </div>

                        <div class="grid column-2 no-border no-margin no-padding rowspan">
                            <div class="grid column-2 no-border no-padding">
                                <a href="index.php"><button> WOMEN </button></a>
                            </div>
                            <div class="grid column-2 no-border no-padding">
                                <a href="men.php"><button class="active"> MEN </button></a>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="grid column-5x2 no-border no-padding" style="width:39%;">
                    <form class="relative">
                        <input type="search" placeholder="Search for items and brands" onkeyup="doSearch();"/>
                        <button class="inline-table no-border absolute right"> <span class="fas fa-search"></span> </button>
                    </form>
                </div>
                
                <div class="grid column-5 no-border no-padding center right">

                    <button class="sbtn inline-table no-border no-padding no-margin color-white" style="font-size:22px;background: transparent;"> <span class="fas fa-search"></span> </button>

                    <?php if(!isset($username)):?>

                    <span class="icon-img" id="accessbtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 21">
                            <g fill="#FFF" fill-rule="nonzero">
                                <path fill="#fff" d="M14 6a4 4 0 1 0-8 0 4 4 0 0 0 8 0zm2 0A6 6 0 1 1 4 6a6 6 0 0 1 12 0zm-6 9c-3.068 0-5.67 1.223-7.035 3h14.07c-1.365-1.777-3.967-3-7.035-3zm10 5H0c.553-4.006 4.819-7 10-7s9.447 2.994 10 7z"></path>
                            </g>
                        </svg>
                    </span>
                    
                    <?php endif; ?>

                    <?php if(isset($username)):?>

                    <span class="icon-img" id="accessbtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 21">
                            <path fill="#fff" d="M16 6A6 6 0 1 1 4 6a6 6 0 0 1 12 0zm4 14H0c.553-4.006 4.819-7 10-7s9.447 2.994 10 7z"></path>
                        </svg>
                    </span>

                    <?php endif; ?>

                    <script type="text/javascript">

                        $('#accessbtn').on('mouseenter touchstart', function(){
                            $('#access-hover').show(100);
                        });
                    </script>

                    <cart>

                        <span id="cart" class="icon-img relative" onclick="

                            $('.checkout').css({'right':'0%','transition-duration':'0.4s'});

                        ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="21" viewBox="0 0 18 21" title="My Bag">
                                <g fill="#FFF" fill-rule="nonzero">
                                        <path fill="#FFF" fill-rule="nonzero" d="M18 17.987V7H2v11l16-.013zM4.077 5A5.996 5.996 0 0 1 10 0c2.973 0 5.562 2.162 6.038 5H20v14.986L0 20V5h4.077zm9.902-.005C13.531 3.275 11.86 2 10 2 8.153 2 6.604 3.294 6.144 4.995c.92 0 7.654.03 7.835 0z"></path>
                                </g>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="21" viewBox="0 0 18 21" style="display:none;">
                                <g fill="#FFF" fill-rule="nonzero">
                                        <path fill="#FFF" fill-rule="nonzero" d="M10.618 15.474a21.327 21.327 0 0 0 3.137-2.076c2.697-2.166 4.249-4.619 4.245-7.299-.003-2.284-1.757-4.101-3.881-4.099-1.016 0-1.97.417-2.69 1.158l-1.43 1.467-1.432-1.463a3.748 3.748 0 0 0-2.695-1.151C3.749 2.013 1.998 3.837 2 6.12c.003 2.677 1.559 5.123 4.256 7.281a21.32 21.32 0 0 0 3.756 2.39c.191-.096.394-.202.606-.318zM9.996 1.763l.203-.2A5.726 5.726 0 0 1 14.116 0c3.246-.004 5.88 2.725 5.884 6.097C20.01 13.845 10.014 18 10.014 18S.01 13.87 0 6.124C-.003 2.752 2.624.014 5.87.01A5.733 5.733 0 0 1 9.79 1.564l.205.199z"></path>
                                </g>
                            </svg>
                            <?php
                                
                                if (isset($_SESSION['username']) && $_SESSION['username'] !== ''){
                                    $username = $_SESSION['username'];
                                }
                                else {
                                    $username = '';
                                }

                                $getpd = "SELECT * FROM carts WHERE cid = '".$username."'";
                                $getpd_query = mysqli_query($conn,$getpd);
                                $count_pd = mysqli_num_rows($getpd_query);

                                if ($count_pd > 0):
                            ?>
                            <label class="absolute" style="min-width:15px;min-height:15px;text-align:center;right:-13px;top:14px;border-radius:60%;display: block;padding:3px;border:0px;font-size:12px;background:#f30f30;font-family:arial;cursor:pointer;" for="cart" onclick="

                                $('.checkout').css({'right':'0%','transition-duration':'0.4s'});

                            "><?php echo $count_pd;?></label>
                            <?php endif; ?>

                        </span>
                    </cart>
                    
                    <span class="icon-img" style="display:none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="21" viewBox="0 0 18 21">
                            <g fill="#FFF" fill-rule="nonzero">
                                    <path fill="#FFF" fill-rule="nonzero" d="M18 17.987V7H2v11l16-.013zM4.077 5A5.996 5.996 0 0 1 10 0c2.973 0 5.562 2.162 6.038 5H20v14.986L0 20V5h4.077zm9.902-.005C13.531 3.275 11.86 2 10 2 8.153 2 6.604 3.294 6.144 4.995c.92 0 7.654.03 7.835 0z"></path>
                            </g>
                        </svg>
                    </span>
                    
                </div>
            </div>
        </div>
        

        <div class="fixed z-index-10 navOffset" id="access-hover" style="display:none;background:#e8e8e8;width:260px;min-height:140px;padding:0px;right:30px;">
            <span class="full-width display-block relative" style="background:#d8d8d8;padding:14px 1% !important;">


            <?php

                if (!isset($_SESSION['username']) || !isset($_SESSION['password'])){
            ?>
                <a href="access.php"><span style="margin:auto 10px;" class="color-grey"> Login </span></a> | 
                <a href="access.php?u"><span style="margin:auto 10px;" class="color-grey"> Signup </span></a>
            <?php } ?>

            <?php if(isset($_SESSION['username']) && isset($_SESSION['password'])):?>
                <a href="logout.php"><span style="margin:auto 10px;" class="color-grey"> Logout </span></a>
            <?php endif; ?>

            <?php if(isset($_SESSION['admin'])):?>
                | 
                <a href="admin"><span style="margin:auto 10px;" class="color-grey"> Cpanel </span></a>
            <?php endif; ?>



                <span class="fas fa-times absolute color-grey" style="font-size:18px;right:30px;cursor:pointer;" onclick="$('#access-hover').hide(100);"></span>
            </span>
            <span class="display-block" style="padding:10px;">
                    <hr/>
                <a href="orders.php" class="color-grey"><span>My Orders</a>
                    <hr/>
                <a href="profile.php" class="color-grey"><span>My Profile Information</a>
                    <hr/>
                <a href="kkblog/help" class="color-grey"><span>Support Center</a>
                    <hr/>
            </span>
        </div>

    <header class="relative z-index-1">
    
        <div id="header-Layer" class="z-index-2"></div>
       

            <!-- Overall Navbar Starts -->
            <?php include 'header_men.php'; ?>
            <!-- Overall Navbar Ends -->

        <p/>
            
            <div class="item-grid grid column-3x2 no-border display-block z-index-2 center navOffsetx2 color-white absolute full-width">

                <h1><?php echo $web_res['head_maintext'];?></h1>
                <h3 class="grid no-margin" style="width:unset !important;"><?php echo $web_res['head_subtext'];?></h3>
            </div>
                        
            <div class="grid column-1 center absolute z-index-2 no-border" style="bottom:180px;left:0;">
                <a href="category.php?products=<?php echo urlencode('New in');?>&class=viewall&genre=women"><button class="defaultBtn inline-table font-futuraPT" style="background:white;font-size:20px;line-height:21px;border-radius:0;font-weight:600;"> Shop For Women </button></a>
                <a href="category.php?products=<?php echo urlencode('New in');?>&class=viewall&genre=men"><button class="defaultBtn inline-table font-futuraPT" style="background:white;font-size:20px;line-height:21px;border-radius:0;font-weight:600;"> Shop For Men </button></a>
            </div>

            <div class="grid full-width absolute z-index-2 rowspan " style="background:#525050;bottom:0;">
                <div class="grid column-2 no-border inline-table center color-white">
                    <span class="fas fa-shipping-fast" style="font-size:18px;font-weight:600;"></span> &nbsp; Free Delivery in Lagos, Nigeria
                </div>
                <div class="grid column-2 no-border inline-table center color-white">
                    <span class="fas fa-tag" style="font-size:18px;font-weight:600;transform:rotate(80deg);"></span> &nbsp; Over 70 Brands
                </div>
            </div>
    </header>
        
    
        <div class="checkout grid fixed z-index-9" style="background:white;width:96%;height:100%;padding:2%;max-width:350px;top:0;right:-100%;">
            <checkout class="navOffset display-block">
                <div class="relative">

                    <h4>My Cart</h4> <button style="background:#dadada;border:0;position:absolute;top:6px;right:0;padding:4px;" onclick="

                        $('.checkout').css({'right':'-100%','transition-duration':'0.6s'});

                    "> close </button>

                
                <form method="post" action="<?php echo htmlspecialchars('checkout.php');?>">

                    <button style="background:#0ec00e;border:2px groove #03e603;padding:4px;color:white;" onmousedown="this.style='background:#0ec00e;border:2px ridge #03e603;padding:4px;color:white;';" onmouseup="this.style='background:#0ec00e;border:2px groove #03e603;padding:4px;color:white;';">Check Out</button> &nbsp;&nbsp;&nbsp;&nbsp; <span class="inline-table">Total amount:</span> <h3 class="inline-table">

                        <?php

                            if (isset($_SESSION['username']) && $_SESSION['username'] !== ''){
                                $username = $_SESSION['username'];
                            }
                            else {
                                $username = '';
                            }

                            $getpd = "SELECT * FROM carts WHERE cid = '".$username."'";
                            $getpd_query = mysqli_query($conn,$getpd);
                            $getpd_res = mysqli_fetch_all($getpd_query, MYSQLI_BOTH);
                            $count_pd = mysqli_num_rows($getpd_query);
                            
                                            $xy = array();
                                            $arr;
                            foreach ($getpd_res as $pd){
                            
                                $getprod = "SELECT prod_price FROM products WHERE SN = '".$pd['prod_id']."'";
                                $getprod_query = mysqli_query($conn,$getprod);
                                $getprod_res = mysqli_fetch_all($getprod_query, MYSQLI_BOTH);

                                foreach ($getprod_res as $gprod) {
                                    $x = strlen(explode(' ', $gprod['prod_price'])[1]);
                                    $i;
                                            $calc = 0;
                                    for ($i = 0; $i <= $x-1; $i++){
                                        if (isset($gprod[$i])){
                                            $num = explode(' ', $gprod[$i])[1];
                                            //array_push($xy,$num);
                                            $xy[] = $num;
                                        }
                                    }

                                }
                            }

                                $sum = array_sum($xy);

                                if (strlen($sum) == '4'){
                                    echo '&#8358; '.str_split($sum,1)[0].','.substr($sum,1);
                                }
                                else if (strlen($sum) == '5'){
                                    echo '&#8358; '.str_split($sum,2)[0].','.substr($sum,2);
                                }
                                else if (strlen($sum) == '6'){
                                    echo '&#8358; '.str_split($sum,3)[0].','.substr($sum,3);
                                }
                                else if (strlen($sum) == '7'){
                                    echo '&#8358; '.str_split($sum,2)[0].','.substr($sum,2);
                                }
                                else {
                                    echo '&#8358; '.$sum.'<br/>';
                                }

                                $getpd2 = "SELECT * FROM carts WHERE cid = '".$username."'";
                                $getpd2_query = mysqli_query($conn,$getpd2);
                                $getpd2_res = mysqli_fetch_all($getpd2_query, MYSQLI_BOTH);
                                $count_pd2 = mysqli_num_rows($getpd2_query);

                                ?>
                                <input name="items" value="<?php

                                    foreach ($getpd2_res as $pd) {
                                    echo $pd['prod_id'].',';
                                }
                        ?>" style="display:none;"/>

                        <input type="text" name="amount" value="<?php echo $sum;?>" style="display:none;">
                </form>


                    </h3><br/>
                    <span>Number of Items: <b><?php echo $count_pd; ?></b></span>
                    <hr/>

                    <div id="checkout_block" class="grid column-1 margin-auto relative" style="height:400px;overflow-y:auto;">

                                                
                        <?php

                            if (isset($_SESSION['username']) && $_SESSION['username'] !== ''){
                                $username = $_SESSION['username'];
                            }
                            else {
                                $username = '';
                            }

                            $getpd = "SELECT * FROM carts WHERE cid = '".$username."'";
                            $getpd_query = mysqli_query($conn,$getpd);
                            $getpd_res = mysqli_fetch_all($getpd_query, MYSQLI_BOTH);
                            $count_pd = mysqli_num_rows($getpd_query);
                            

                            if (isset($_GET['search']) && $_GET['search'] !== ''){
                                $search = $_GET['search'];
                            }
                            else {
                                $search = '';
                            }


                            foreach ($getpd_res as $pd){
                            
                                $getprod = "SELECT * FROM products WHERE SN = '".$pd['prod_id']."'";
                                $getprod_query = mysqli_query($conn,$getprod);
                                $getprod_res = mysqli_fetch_all($getprod_query, MYSQLI_BOTH);

                                foreach ($getprod_res as $gprod) {
                                    
                        ?>


                            <div class="grid column-1 margin-auto no-border relative" style="min-height:80px">
                                <span style="display:inline-table;min-width:100px;"><img src="products/images/<?php echo $gprod['prod_attach']; ?>" style="display:inline-table;width:auto;height:80px;"/></span>
                                <span style="display:inline-table;">Price: <?php echo $gprod['prod_price']; ?></span>

                                <span id="remove<?php echo $gprod['SN'];?>" class="fas fa-times absolute" style="font-style:16px;color:grey;top:20px;right:22px;cursor:pointer;" title="remove item" onclick="

                                    if (confirm('Are you sure you want to remove this item?') == true){
                                        $(this).removeClass('fa-times');
                                        $(this).addClass('fa-spinner fa-spin');

                                        $.post('process.php',{form:'del_cart', prod_id:'<?php echo $gprod['SN'];?>'}, function(){
                                            
                                            $('#remove<?php echo $gprod['SN'];?>').parent().hide(50);

                                        <?php if (basename($_SERVER['SCRIPT_NAME']) == 'category.php'):?>

                                            $('cart').load('category.php?products=<?php echo urlencode($_GET['products']);?>&class=<?php echo urlencode($_GET['class']);?>&genre=<?php echo $_GET['genre'];?> cart');

                                            $('checkout').load('category.php?products=<?php echo urlencode($_GET['products']);?>&class=<?php echo urlencode($_GET['class']);?>&genre=<?php echo $_GET['genre'];?> checkout');

                                            $('container').load('category.php?products=<?php echo urlencode($_GET['products']);?>&class=<?php echo urlencode($_GET['class']);?>&genre=<?php echo $_GET['genre'];?>&search='+$('input[type=search]').val()+' #container');
                                        <?php endif; ?>

                                        <?php if (basename($_SERVER['SCRIPT_NAME']) !== 'category.php'):?>

                                            $('cart').load('<?php echo basename($_SERVER['SCRIPT_NAME']);?> cart');

                                            $('checkout').load('<?php echo basename($_SERVER['SCRIPT_NAME']);?> checkout');

                                        <?php endif; ?>

                                        });
                                    }
                                "></span>
                                <hr/>
                            </div>

                        <?php
                                }

                            }
                        ?>

                            <div style="min-height:200px;"></div>
                            
                    </div>
                </div>


                <script type="text/javascript">
                    $('#searchLoader, #checkout_block').on('scroll', function(){
                        if ($(window).scrollTop() >= ($('.nav').outerHeight()+$('#fixedNav').outerHeight())){
                            $('.checkout div').css({'margin-top':$('.nav').outerHeight(),'transition-duration':'0.1s'});
                        }
                        else {
                            $('.checkout div').css({'margin-top':($('.nav').outerHeight()+$('#fixedNav').outerHeight()),'transition-duration':'0.1s'});
                        }
                    });
                </script>
            </checkout>
        </div>


    
        <div class="clear-float"></div>

        <section>
            <?php

                $latestProd = "SELECT * FROM products WHERE prod_genre = 'men' ORDER BY `SN` DESC";
                $latestProd_query = mysqli_query($conn, $latestProd);
                $getlprod = mysqli_fetch_all($latestProd_query, MYSQLI_BOTH);
                $numlprod = mysqli_num_rows($latestProd_query);

                if ($numlprod < 2):
                
            ?>

            <div class="rowspan center">
                    <div id="imgAd" class="grid column-2 no-border center" style="width:unset;">
                        <div class="overflow-x-hide full-width center">
                            <a href="#"><img src="images/<?php echo $web_res['menshoptheeditLeftImg'];?>" style="width:auto;height:600px;"></a>
                                <div class="defaultBtn no-margin no-padding full-width center" style="background:white;padding:3% 0;font-size:24px;line-height:36px;border-radius:0;"> <?php echo $web_res['menshoptheeditLeftMainText'];?> </div>
                                <small><h3 style="font-weight:normal;text-transform:capitalize;"> <?php echo $web_res['menshoptheeditLeftSubText'];?> </h3></small>
                                <a href="#"><button class="defaultBtnn no-margin" style="width:170px;background:white;padding:3% 0;color:#505050;font-size:20px;line-height:21px;border:2px solid #505050;border-radius:0;"> SHOP THE EDIT </button></a>
                        </div>
                    </div>
                    <div id="imgAd" class="grid column-2 no-border center" style="width:unset;">
                        <div class="overflow-x-hide full-width center">
                            <a href="#"><img src="images/<?php echo $web_res['menshoptheeditRightImg'];?>" style="width:auto;height:600px;"></a>
                                <div class="defaultBtn no-margin no-padding full-width center" style="background:white;padding:3% 0;font-size:24px;line-height:36px;border-radius:0;"> <?php echo $web_res['menshoptheeditRightMainText'];?> </div>
                                <small><h3 style="font-weight:normal;text-transform:capitalize;"> <?php echo $web_res['menshoptheeditRightSubText'];?> </h3></small>
                                <a href="#"><button class="defaultBtnn no-margin" style="width:170px;background:white;padding:3% 0;color:#505050;font-size:20px;line-height:21px;border:2px solid #505050;border-radius:0;"> SHOP THE EDIT </button></a>
                        </div>
                    </div>
            </div>

            <?php
                endif;
            
                if ($numlprod >= 2):
                
            ?>

            <div class="rowspan center">
                    <div id="imgAd" class="grid column-2 no-border center" style="width:unset;">
                        <div class="overflow-x-hide full-width center">
                            <a href="category.php?products=New+in&class=viewall&genre=men&search=<?php echo explode(' ', $getlprod[0]['prod_price'])[1];?>"><img src="products/images/<?php echo $getlprod[0]['prod_attach'];?>" style="width:auto;height:600px;"></a>
                                <div class="defaultBtn no-margin no-padding full-width center" style="background:white;padding:3% 0;font-size:24px;line-height:36px;border-radius:0;text-transform:uppercase;"> <?php echo $getlprod[0]['prod_name'];?> </div>

                                <small><h3 style="font-weight:normal;"> <?php echo $getlprod[0]['prod_name'];?> </h3></small>
                                <a href="category.php?products=New+in&class=viewall&genre=men&search=<?php echo explode(' ', $getlprod[0]['prod_price'])[1];?>"><button class="defaultBtnn no-margin" style="width:170px;background:white;padding:3% 0;color:#505050;font-size:20px;line-height:21px;border:2px solid #505050;border-radius:0;"> SHOP THE EDIT </button></a>
                        </div>
                    </div>
                    <div id="imgAd" class="grid column-2 no-border center" style="width:unset;">
                        <div class="overflow-x-hide full-width center">
                            <a href="category.php?products=New+in&class=viewall&genre=men&search=<?php echo explode(' ', $getlprod[1]['prod_price'])[1];?>"><img src="products/images/<?php echo $getlprod[1]['prod_attach'];?>" style="width:auto;height:600px;"></a>
                                <div class="defaultBtn no-margin no-padding full-width center" style="background:white;padding:3% 0;font-size:24px;line-height:36px;border-radius:0;text-transform:uppercase;"> <?php echo $getlprod[1]['prod_name'];?> </div>

                                <small><h3 style="font-weight:normal;"> <?php echo $getlprod[1]['prod_desc'];?> </h3></small>
                                <a href="category.php?products=New+in&class=viewall&genre=men&search=<?php echo explode(' ', $getlprod[1]['prod_price'])[1];?>"><button class="defaultBtnn no-margin" style="width:170px;background:white;padding:3% 0;color:#505050;font-size:20px;line-height:21px;border:2px solid #505050;border-radius:0;"> SHOP THE EDIT </button></a>
                        </div>
                    </div>
            </div>

            <?php
                endif;
            ?>
        </section>



        <div class="clear-float"></div>

    <div class="rowspan center" style="background:#F4F8C8;">
        <div class="grid column-1 no-border relative" style="display:block;width:96%;padding:2%;min-height:200px;">
            <h2>Blog Posts</h2>
            <hr/>

            <div class="rowspan">
                <div id="blogLoader1" class="blog grid column-2 no-border float-left"></div>
                <div id="blogLoader2" class="grid column-3 no-border float-left left"></div>
                <div class="clear-float"></div>
            </div>

            <script type="text/javascript">
                $(document).ready(function(){
                    $('#blogLoader1').load('kkblog #main a[rel=bookmark]');
                    $('#blogLoader2').load('kkblog #main .entry-container');
                });
            </script>
        </div>
    </div>
    

                <div class="grid column-1 no-border float-left" style="background:#ffef38;">

                    <p/>

                    <h2 class="center"> SHOP BY CATEGORY </h2>
                    <p/>

                        <div class="slider">
                            <div class="rowspan">

                                <div class="grid column-5 no-border no-padding" style="width: 170px;">
                                    <div class="full-width overflow-x-hide thumbnail" style="font-size:0px;">    
                                        <img src="images/<?php echo $web_res['menshop_bycat_img1'];?>" style="width:auto;height:250px;position:relative;left:;-5%;"/>
                                        <button class="defaultBtn inline-table no-margin" style="width:170px;background:white;padding:3% 0;font-size:20px;line-height:21px;border-radius:0;"> <?php echo $web_res['menshop_bycat1'];?> </button>
                                    </div>
                                </div>
                                <div class="grid column-5 no-border no-padding" style="width: 170px;">
                                    <div class="full-width overflow-x-hide thumbnail" style="font-size:0px;">    
                                        <img src="images/<?php echo $web_res['menshop_bycat_img2'];?>" style="width:auto;height:250px;position:relative;left:;-5%;"/>
                                        <button class="defaultBtn inline-table no-margin" style="width:170px;background:white;padding:3% 0;font-size:20px;line-height:21px;border-radius:0;"> <?php echo $web_res['menshop_bycat2'];?> </button>
                                    </div>
                                </div>
                                <div class="grid column-5 no-border no-padding" style="width: 170px;">
                                    <div class="full-width overflow-x-hide thumbnail" style="font-size:0px;">    
                                        <img src="images/<?php echo $web_res['menshop_bycat_img3'];?>" style="width:auto;height:250px;position:relative;left:;-5%;"/>
                                        <button class="defaultBtn inline-table no-margin" style="width:170px;background:white;padding:3% 0;font-size:20px;line-height:21px;border-radius:0;"> <?php echo $web_res['menshop_bycat3'];?> </button>
                                    </div>
                                </div>
                                <div class="grid column-5 no-border no-padding" style="width: 170px;">
                                    <div class="full-width overflow-x-hide thumbnail" style="font-size:0px;">    
                                        <img src="images/<?php echo $web_res['menshop_bycat_img4'];?>" style="width:auto;height:250px;position:relative;left:;-5%;"/>
                                        <button class="defaultBtn inline-table no-margin" style="width:170px;background:white;padding:3% 0;font-size:20px;line-height:21px;border-radius:0;"> <?php echo $web_res['menshop_bycat4'];?> </button>
                                    </div>
                                </div>
                                <div class="grid column-5 no-border no-padding" style="width: 170px;">
                                    <div class="full-width overflow-x-hide thumbnail" style="font-size:0px;">    
                                        <img src="images/<?php echo $web_res['menshop_bycat_img5'];?>" style="width:auto;height:250px;position:relative;left:;-5%;"/>
                                        <button class="defaultBtn inline-table no-margin" style="width:170px;background:white;padding:3% 0;font-size:20px;line-height:21px;border-radius:0;"> <?php echo $web_res['menshop_bycat5'];?> </button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                </div>


                    <div class="rowspan">

                        <div class="clear-float"></div>

                    </div>

                <div class="clear-float"></div>
            </div>
        </section>

        <div class="clear-height"></div>

        <?php include 'footer.php'; ?>
        
</body>
</html>

