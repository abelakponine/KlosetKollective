<?php
    require 'config.php';

    if (isset($_SESSION['username']) && $_SESSION['username'] !== 'admin' && !isset($_GET['products']) && !isset($_GET['class']) && !isset($_GET['genre']) || !isset($_SESSION['username']) && !isset($_GET['products']) && !isset($_GET['class']) && !isset($_GET['genre'])){

        header('location:category.php?products=New+in&class=viewall&genre=women');
    }

    if (!isset($_GET['products'])){
        $_GET['products'] = 'New+in';
    }
    
    if (!isset($_GET['class'])){
        $_GET['class'] = '';
    }
    
    if (!isset($_GET['genre'])){
        $_GET['genre'] = 'Mixed';
    }

    $webDesc = $_GET['products'];

    if (isset($_SESSION['genre'])){
        $genre = $_SESSION['genre'];
    }
    else {
        $genre = 'women';
    }
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
    <link rel="stylesheet" href="fontawesome/css/all.css"/>
    <link rel="stylesheet" href="css/mobile.css"/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/glui.app.js" async></script>
    <script type="text/javascript" src="js/glui.slider.js" async></script>
    <script type="text/javascript" src="js/jquery.constellation.js"></script>
    <title> <?php echo $webDesc.' | '.$sitename;?> </title>
</head>
<body>

    <?php include 'sidebar.php';?>

    
        <div id="darkLayer" class="z-index-9 center navOffset">
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
                    $('#searchLoader').load('category.php?products=Clothing&class=clothing&genre=<?php echo $_GET['genre'];?>&search='+$('input[type=search]').val().replace('%20',' ')+' container');
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


        <?php

            if ($_GET['genre'] == 'women'){
                include 'header_cat_women.php';
            }

            if ($_GET['genre'] == 'men'){
                include 'header_cat_men.php';
            }

        ?>

        <section id="Loader">
            <div class="rowspan">

                <div class="grid column-1 no-border"> 
                    <a href="index.php"><span class="inline-table color-grey cursor-pointer"> Home </span></a> <small><span class="fas fa-angle-right color-grey"></span></small> <span class="inline-table  color-grey cursor-pointer"> <span style="text-transform:capitalize;"><?php echo $_GET['genre'];?></span> </span> <small><span class="fas fa-angle-right color-grey"></span></small> <span class="inline-table color-silver cursor-pointer">New in</span>
                </div>

                <div class="grid column-1 no-padding no-side-border center" style="background:#f8f8f8;width:100%;bor">
                    <h2><span style="text-transform:capitalize;"><?php echo $_GET['genre'];?></span>'s <span style="text-transform:capitalize;"><?php echo urldecode($_GET['products']);?></span></h2>
                </div>

                <container>
                <div id="container">

                        <div class="grid column-1 no-padding no-border center" style="background:#eaeaea;width:100%;bor">

                            <div style="display:none;">
                                <h4 class="inline-table color-grey">Sort By:</h4>
                                <select class="sortby" style="padding:4px 14px;font-size:14px;">
                                    <option style="display:block;padding:6px;font-size:15px;"><h2>New to Old</h2></option>
                                    <option style="display:block;padding:6px;font-size:15px;"><h2>Old to New</h2></option>
                                </select>
                                &nbsp;
                                <h4 class="inline-table color-grey">Brand:</h4>
                                <select class="brands" style="padding:4px 14px;font-size:14px;">
                                    <option style="display:block;padding:6px;font-size:15px;"> View All </option>
                                    <optgroup label="Shoes"></optgroup>
                                <?php
                                        $get_brands = "SELECT brand_name FROM `prod_brand` ORDER BY `brand_name` ASC";
                                        $brands_query = mysqli_query($conn, $get_brands);
                                        $prod_brands = mysqli_fetch_all($brands_query);
                                        

                                        foreach ($prod_brands as $Brands){
                                            foreach ($Brands as $brand){
                                                echo '<option style="display:block;padding:6px;font-size:15px;">'.$brand.'</option>';
                                            }
                                        }
                                    ?>
                                    <optgroup label="Clothes"></optgroup>
                                    <option>Chinos</option>
                                </select>
                                &nbsp;


                                <!-- <h4 class="inline-table color-grey">Size:</h4>
                                <select class="sizes" style="padding:4px 14px;font-size:14px;">

                                <?php
                                        $get_sizes = "SELECT size FROM `prod_size` WHERE class='shoes' ORDER BY `size` ASC";
                                        $size_query = mysqli_query($conn, $get_sizes);
                                        $prod_sizes = mysqli_fetch_all($size_query);
                                        

                                        foreach ($prod_sizes as $Sizes){
                                            foreach ($Sizes as $size){
                                                echo '<option style="display:block;padding:6px;font-size:15px;">'.$size.'</option>';
                                            }
                                        }
                                    ?>

                                </select> -->
                                &nbsp;


                                <h4 class="inline-table color-grey">Colour:</h4>
                                <select class="colour" style="padding:4px 14px;font-size:14px;">
                                    
                                <?php
                                        $get_color = "SELECT colour_name FROM `prod_colours` ORDER BY `colour_name` ASC";
                                        $color_query = mysqli_query($conn, $get_color);
                                        $colors = mysqli_fetch_all($color_query);
                                        

                                        foreach ($colors as $colour){
                                            foreach ($colour as $color){
                                                echo '<option style="display:block;padding:6px;font-size:15px;">'.$color.'</option>';
                                            }
                                        }
                                    ?>

                                </select>
                            </div>

                            <script type="text/javascript">
                                $('.brands option[value=<?php echo $_GET["class"]; ?>]').eq(0).attr('selected',true);
                            </script>

                            <p><small> <h3 class="color-grey"> <?php

                            if (!isset($_GET['search']) || $_GET['search'] == ''){

                                //Sort by New in
                                if ($_GET['products'] == 'New in'){

                                    if (isset($_GET['products'])){
                                        $prod_cat = $_GET['products'];
                                    }
                                    else {
                                        $prod_cat = '';
                                    }

                                    if (isset($_GET['genre'])){
                                        $prod_genre = $_GET['genre'];
                                    }
                                    else {
                                        $prod_genre = '';
                                    }

                                        $countpd_sql = "SELECT * FROM products WHERE prod_genre = '".$prod_genre."'";
                                        $countpd_query = mysqli_query($conn, $countpd_sql);
                                        $countpd = mysqli_num_rows($countpd_query);
                                        echo $countpd;
                                }

                                else {

                                    if (isset($_GET['products'])){
                                        $prod_cat = $_GET['products'];
                                    }
                                    else {
                                        $prod_cat = '';
                                    }

                                    if (isset($_GET['genre'])){
                                        $prod_genre = $_GET['genre'];
                                    }
                                    else {
                                        $prod_genre = '';
                                    }

                                        $countpd_sql = "SELECT * FROM products WHERE prod_cat = '".$prod_cat."' AND prod_genre = '".$prod_genre."'";
                                        $countpd_query = mysqli_query($conn, $countpd_sql);
                                        $countpd = mysqli_num_rows($countpd_query);
                                        echo $countpd;
                                }
                            }

                            else {

                                    if (isset($_GET['products'])){
                                        $prod_cat = $_GET['products'];
                                    }
                                    else {
                                        $prod_cat = '';
                                    }

                                    if (isset($_GET['genre'])){
                                        $prod_genre = $_GET['genre'];
                                    }
                                    else {
                                        $prod_genre = '';
                                    }

                                        
                                    $countpd_sql = "SELECT * FROM products WHERE prod_genre = '".$prod_genre."'";
                                    $countpd_query = mysqli_query($conn, $countpd_sql);
                                    $countpd = mysqli_num_rows($countpd_query);
                                    $prods = mysqli_fetch_all($countpd_query, MYSQLI_BOTH);

                                    $arr_count = [];

                                    foreach ($prods as $prod) {
                                        
                                        if (stristr($prod['prod_name'], $_GET['search']) || stristr($prod['prod_desc'], $_GET['search']) || stristr($prod['prod_brand'], $_GET['search']) || stristr($prod['prod_price'], $_GET['search'])){

                                            array_push($arr_count, $prod['prod_name']);
                                        }
                                        else {
                                            echo "";
                                        }
                                    }

                                        echo count($arr_count);

                            }
                            
                            ?> styles found </h3> </small></p>

                        </div>

                        <p/>


                        <!-- Display Products start -->

                        <div class="grid column-1 no-border center rowspan center">


                            <div class="grid column-1 no-border no-margin no-padding full-width" style="display:flex;">
                            <!-- Display Products -->
                            <?php

                                if (isset($_GET['class']) && $_GET['class'] !== ''){

                                    if (isset($_GET['genre'])  && $_GET['genre'] !== ''){

                                    $where = "WHERE";

                                    }
                                    else {
                                        $where = "";
                                    }

                                    if (isset($_GET['class']) && $_GET['class'] == 'viewall'){
                                        $sort_cat = " prod_genre = '".$_GET['genre']."'";
                                    }
                                    if (isset($_GET['class']) && $_GET['class'] !== '' && $_GET['class'] !== 'viewall'){
                                        $sort_cat = " prod_cat = '".$_GET['class']."'";
                                    }
                                    else {
                                        // do nothing
                                    }
                                    if (isset($_GET['genre']) && $_GET['genre'] !== ''){
                                        $sort_genre = " AND prod_genre = '".$_GET['genre']."'";
                                    }
                                    else {
                                        $sort_genre = "";
                                    }
                                }
                                else {
                                    $where = "";
                                    $sort_genre = "";
                                    $sort_cat = "";
                                }


                                if (isset($_GET['search']) && $_GET['search'] !== '') {

                                    $get_prod = "SELECT * FROM `products` WHERE prod_genre = '".$_GET['genre']."' ORDER BY `SN` DESC";
                                    $getprod_query = mysqli_query($conn, $get_prod);
                                    $prods = mysqli_fetch_all($getprod_query, MYSQLI_BOTH);
                                    $prods_num = mysqli_num_rows($getprod_query);

                                }
                                else {
                                    $get_prod = "SELECT * FROM `products` ".$where.$sort_cat.$sort_genre." ORDER BY `SN` DESC";
                                    $getprod_query = mysqli_query($conn, $get_prod);
                                    $prods = mysqli_fetch_all($getprod_query, MYSQLI_BOTH);
                                    $prods_num = mysqli_num_rows($getprod_query);
                                }

                              
                                    if (!isset($prods_num) || !$prods_num >= 1){

                                ?>
                                            
                                                <div class="grid column-5 inline-grid thumbnail no-border" style="min-width:220px;">
                                                    <h4 class="color-grey"> !Oops No Item Found :(  Please check back.</h4>
                                                </div>
                                    
                                    <?php   }
                                        else {

                                            if (isset($arr_count) && count($arr_count) == 0){

                                            echo '<div class="grid column-5 inline-grid thumbnail no-border" style="min-width:220px;">
                                                    <h3 class="color-grey"> !Oops No Item Found :(  Please check back.</h3>
                                                </div>';
                                            }


                                            foreach ($prods as $prod) {

                                                // search query
                                                if (isset($_GET['search']) && $_GET['search'] !== ''){

                                                    if (stristr($prod['prod_name'], $_GET['search']) == true || stristr($prod['prod_desc'], $_GET['search']) == true || stristr($prod['prod_brand'], $_GET['search']) == true || stristr($prod['prod_price'], $_GET['search']) == true){

                                    ?>

                                        <div id="itemblock<?php echo $prod['SN'];?>" class="grid column-5 inline-grid thumbnail" style="margin:auto 10px !important;min-width:220px;cursor:pointer;" 

                                                <?php

                                                echo "
                                                    onclick=\"
                                                        $('#header-Layer').show(100);
                                                        $('#prodbox section').html($('#itemblock".$prod['SN']." div:first-child').html());

                                                        $('#prodbox section').append(document.querySelector('#price".$prod['SN']."').outerHTML);

                                                        $('#prodbox section').append(document.querySelector('#cartbtn".$prod['SN']."').outerHTML);
                                                        
                                                        $('#prodbox section').append('<span id=\'tagCart\'>Add to Cart</span>');
                                                        

                                                        $('#prodbox section img').css({'width':'auto','height':'65%','display':'block','margin':'auto'});

                                                        $('#prodbox #price".$prod['SN']."').css({'max-width':'80px','bottom':'-30px','display':'block','position':'relative','font-weight':'bold','font-size':'20px','margin':'auto'});

                                                        $('#prodbox #cartbtn".$prod['SN']."').css({'bottom':'60%','right':'15%','position':'absolute'});

                                                        $('#tagCart').css({'bottom':'56%','right':'13%','position':'absolute'});

                                                        $('#prodbox').show(50);
                                                    \"
                                                ";?>

                                            >


                                            <div class="no-border no-padding" style="height:318px;overflow:hidden;">
                                                <img src="products/images/<?php echo $prod['prod_attach'];?>" style="width:100%;"/>
                                            </div>

                                            <div>

                                            <?php
                                                if (isset($_SESSION['username']) && $_SESSION['username'] !== ''){
                                                    $username = $_SESSION['username'];
                                                }
                                                else {
                                                    $username = '';
                                                }

                                                if (isset($_GET['search']) && $_GET['search'] !== ''){
                                                    $search = $_GET['search'];
                                                }
                                                else {
                                                    $search = '';
                                                }

                                                $getpd = "SELECT * FROM carts WHERE cid = '".$username."' AND prod_id = '".$prod['SN']."'";
                                                $getpd_query = mysqli_query($conn,$getpd);
                                                $count_pd = mysqli_num_rows($getpd_query);
                                                

                                                if ($count_pd < 1):?>

                                                <button id="cartbtn<?php echo $prod['SN'];?>" class="defaultBtn absolute z-index-3" style="bottom:120px;right:30px;border:2px solid white;border-radius:60%;" onmouseenter="$(this).find('span').addClass('fas');
                                                    $('#cartbtn<?php echo $prod['SN'];?>').on('click', function(event){
                                                        event.preventDefault();
                                                        event.stopPropagation();

                                                    <?php

                                                        if (isset($_SESSION['username']) && $_SESSION['username'] !== ''){
                                                            //do nothing
                                                        }
                                                        else {
                                                            echo "if (confirm('Sorry, you need to login to use this platform! Login Now?') == true){

                                                                $('#cartbtn".$prod['SN']."').off('click');
                                                                window.location.href='access.php';

                                                                $('#cartbtn".$prod['SN']."').off('click');
                                                                
                                                                return false;
                                                                return false;
                                                                }

                                                                else {

                                                                $('#cartbtn".$prod['SN']."').off('click');
                                                                
                                                                return false;
                                                                return false;
                                                                }";
                                                        }
                                                    ?>
                                                    
                                                        $(this).find('span').attr({'class':'fas fa-spinner fa-spin'});
                                                        $(this).attr('onmouseleave','');

                                                        $.post('process.php',{form:'cart', prod_id:'<?php echo $prod['SN'];?>'}, function(){
                                                            $('container').load('category.php?products=<?php echo urlencode($_GET['products']);?>&class=<?php echo urlencode($_GET['class']);?>&genre=<?php echo $_GET['genre'];?>&search=<?php echo $search;?> #container');

                                                                $('#header-Layer').hide(100);
                                                                $('#prodbox').hide(50);

                                                                $('cart').load('category.php?products=<?php echo urlencode($_GET['products']);?>&class=<?php echo urlencode($_GET['class']);?>&genre=<?php echo $_GET['genre'];?> cart');
                                                                
                                                                $('checkout').load('category.php?products=<?php echo urlencode($_GET['products']);?>&class=<?php echo urlencode($_GET['class']);?>&genre=<?php echo $_GET['genre'];?> checkout');
                                                        });
                                                        //return false;
                                                    });
                                                " onmouseleave="$(this).find('span').removeClass('fas');"

                                                title="Add to Cart"> <span class="far fa-heart" style="font-size:22px;"></span> </button>

                                                <?php endif; ?>


                                                <?php if ($count_pd >= 1):?>

                                                <button id="cartbtn<?php echo $prod['SN'];?>" class="defaultBtn absolute z-index-3" style="bottom:120px;right:30px;border:2px solid white;border-radius:60%;" onmouseenter="$(this).find('span').addClass('fas');
                                                    $('#cartbtn<?php echo $prod['SN'];?>').on('click', function(event){
                                                        event.preventDefault();
                                                        event.stopPropagation();

                                                    <?php

                                                        if (isset($_SESSION['username']) && $_SESSION['username'] !== ''){
                                                            //do nothing
                                                        }
                                                        else {
                                                            echo "if (confirm('Sorry, you need to login to use this platform! Login Now?') == true){

                                                                $('#cartbtn".$prod['SN']."').off('click');
                                                                window.location.href='access.php';
                                                                
                                                                $('#cartbtn".$prod['SN']."').off('click');
                                                                
                                                                return false;
                                                                return false;
                                                                }
                                                                
                                                                else {

                                                                $('#cartbtn".$prod['SN']."').off('click');
                                                                
                                                                return false;
                                                                return false;
                                                                }";
                                                        }
                                                    ?>
                                                    
                                                        $(this).find('span').attr({'class':'fas fa-spinner fa-spin'});
                                                        $(this).attr('onmouseleave','');

                                                        $.post('process.php',{form:'del_cart', prod_id:'<?php echo $prod['SN'];?>'}, function(){
                                                            $('container').load('category.php?products=<?php echo urlencode($_GET['products']);?>&class=<?php echo urlencode($_GET['class']);?>&genre=<?php echo $_GET['genre'];?>&search=<?php echo $search;?> #container');

                                                                $('#header-Layer').hide(100);
                                                                $('#prodbox').hide(50);

                                                                $('cart').load('category.php?products=<?php echo urlencode($_GET['products']);?>&class=<?php echo urlencode($_GET['class']);?>&genre=<?php echo $_GET['genre'];?> cart');

                                                                $('checkout').load('category.php?products=<?php echo urlencode($_GET['products']);?>&class=<?php echo urlencode($_GET['class']);?>&genre=<?php echo $_GET['genre'];?> checkout');

                                                        });
                                                        
                                                        return false;
                                                    });

                                                " title="Remove from Cart"> <span class="fas fa-heart" style="font-size:22px;"></span> </button>

                                                <?php endif; ?>


                                                            <br/>

                                                        <?php if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin'): ?>
                                                            <h4>Product ID: <?php echo $prod['SN'];?></h4>

                                                        <?php endif; ?>

                                                            <small><?php echo $prod['prod_desc'];?></small>
                                                            <p/>
                                                            <b><price id="price<?php echo $prod['SN'];?>"><?php echo $prod['prod_price'];?></price></b>

                                            </div>
                                        </div>

                                      
                                <?php   }

                                    }

                                    // end of search




                                //  show categories
                                else {

                                ?>

                                    <div id="itemblock<?php echo $prod['SN'];?>" class="grid column-5 inline-grid thumbnail" style="min-width:220px;cursor:pointer;" 

                                                    <?php

                                                    echo "
                                                        onclick=\"
                                                            $('#header-Layer').show(100);
                                                            $('#prodbox section').html($('#itemblock".$prod['SN']." div:first-child').html());

                                                            $('#prodbox section').append(document.querySelector('#price".$prod['SN']."').outerHTML);

                                                            $('#prodbox section').append(document.querySelector('#cartbtn".$prod['SN']."').outerHTML);
                                                            
                                                            $('#prodbox section').append('<span id=\'tagCart\'>Add to Cart</span>');
                                                            

                                                            $('#prodbox section img').css({'width':'auto','height':'65%','display':'block','margin':'auto'});

                                                            $('#prodbox #price".$prod['SN']."').css({'max-width':'80px','bottom':'-30px','display':'block','position':'relative','font-weight':'bold','font-size':'20px','margin':'auto'});

                                                            $('#prodbox #cartbtn".$prod['SN']."').css({'bottom':'60%','right':'15%','position':'absolute'});

                                                            $('#tagCart').css({'bottom':'56%','right':'13%','position':'absolute'});

                                                            $('#prodbox').show(50);
                                                        \"
                                                    ";?>

                                                >


                                                <div class="no-border no-padding" style="height:318px;overflow:hidden;">
                                                    <img src="products/images/<?php echo $prod['prod_attach'];?>" style="width:100%;"/>
                                                </div>

                                                <div>

                                                <?php
                                                    if (isset($_SESSION['username']) && $_SESSION['username'] !== ''){
                                                        $username = $_SESSION['username'];
                                                    }
                                                    else {
                                                        $username = '';
                                                    }

                                                    $getpd = "SELECT * FROM carts WHERE cid = '".$username."' AND prod_id = '".$prod['SN']."'";
                                                    $getpd_query = mysqli_query($conn,$getpd);
                                                    $count_pd = mysqli_num_rows($getpd_query);
                                                    

                                                    if ($count_pd < 1):?>

                                                    <button id="cartbtn<?php echo $prod['SN'];?>" class="defaultBtn absolute z-index-3" style="bottom:120px;right:30px;border:2px solid white;border-radius:60%;" onmouseenter="$(this).find('span').addClass('fas');
                                                        $('#cartbtn<?php echo $prod['SN'];?>').on('click', function(event){
                                                            event.preventDefault();
                                                            event.stopPropagation();

                                                        <?php

                                                            if (isset($_SESSION['username']) && $_SESSION['username'] !== ''){
                                                                //do nothing
                                                            }
                                                            else {
                                                                echo "if (confirm('Sorry, you need to login to use this platform! Login Now?') == true){

                                                                    $('#cartbtn".$prod['SN']."').off('click');
                                                                    window.location.href='access.php';

                                                                    $('#cartbtn".$prod['SN']."').off('click');
                                                                    
                                                                    return false;
                                                                    return false;
                                                                    }

                                                                    else {

                                                                    $('#cartbtn".$prod['SN']."').off('click');
                                                                    
                                                                    return false;
                                                                    return false;
                                                                    }";
                                                            }
                                                        ?>
                                                        
                                                            $(this).find('span').attr({'class':'fas fa-spinner fa-spin'});
                                                            $(this).attr('onmouseleave','');

                                                            $.post('process.php',{form:'cart', prod_id:'<?php echo $prod['SN'];?>'}, function(){
                                                                $('container').load('category.php?products=<?php echo urlencode($_GET['products']);?>&class=<?php echo urlencode($_GET['class']);?>&genre=<?php echo $_GET['genre'];?>&search=<?php echo $search;?> #container');

                                                                    $('#header-Layer').hide(100);
                                                                    $('#prodbox').hide(50);

                                                                    $('cart').load('category.php?products=<?php echo urlencode($_GET['products']);?>&class=<?php echo urlencode($_GET['class']);?>&genre=<?php echo $_GET['genre'];?> cart');
                                                                    
                                                                    $('checkout').load('category.php?products=<?php echo urlencode($_GET['products']);?>&class=<?php echo urlencode($_GET['class']);?>&genre=<?php echo $_GET['genre'];?> checkout');
                                                            });
                                                            //return false;
                                                        });
                                                    " onmouseleave="$(this).find('span').removeClass('fas');"

                                                    title="Add to Cart"> <span class="far fa-heart" style="font-size:22px;"></span> </button>

                                                    <?php endif; ?>


                                                    <?php if ($count_pd >= 1):?>

                                                    <button id="cartbtn<?php echo $prod['SN'];?>" class="defaultBtn absolute z-index-3" style="bottom:120px;right:30px;border:2px solid white;border-radius:60%;" onmouseenter="$(this).find('span').addClass('fas');
                                                        $('#cartbtn<?php echo $prod['SN'];?>').on('click', function(event){
                                                            event.preventDefault();
                                                            event.stopPropagation();

                                                        <?php

                                                            if (isset($_SESSION['username']) && $_SESSION['username'] !== ''){
                                                                //do nothing
                                                            }
                                                            else {
                                                                echo "if (confirm('Sorry, you need to login to use this platform! Login Now?') == true){

                                                                    $('#cartbtn".$prod['SN']."').off('click');
                                                                    window.location.href='access.php';
                                                                    
                                                                    $('#cartbtn".$prod['SN']."').off('click');
                                                                    
                                                                    return false;
                                                                    return false;
                                                                    }
                                                                    
                                                                    else {

                                                                    $('#cartbtn".$prod['SN']."').off('click');
                                                                    
                                                                    return false;
                                                                    return false;
                                                                    }";
                                                            }
                                                        ?>
                                                        
                                                            $(this).find('span').attr({'class':'fas fa-spinner fa-spin'});
                                                            $(this).attr('onmouseleave','');

                                                            $.post('process.php',{form:'del_cart', prod_id:'<?php echo $prod['SN'];?>'}, function(){
                                                                $('container').load('category.php?products=<?php echo urlencode($_GET['products']);?>&class=<?php echo urlencode($_GET['class']);?>&genre=<?php echo $_GET['genre'];?>&search=<?php echo $search;?> #container');

                                                                    $('#header-Layer').hide(100);
                                                                    $('#prodbox').hide(50);

                                                                    $('cart').load('category.php?products=<?php echo urlencode($_GET['products']);?>&class=<?php echo urlencode($_GET['class']);?>&genre=<?php echo $_GET['genre'];?> cart');

                                                                    $('checkout').load('category.php?products=<?php echo urlencode($_GET['products']);?>&class=<?php echo urlencode($_GET['class']);?>&genre=<?php echo $_GET['genre'];?> checkout');

                                                            });
                                                            
                                                            return false;
                                                        });

                                                    " title="Remove from Cart"> <span class="fas fa-heart" style="font-size:22px;"></span> </button>

                                                    <?php endif; ?>


                                                                <br/>

                                                            <?php if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin'): ?>
                                                                <h4>Product ID: <?php echo $prod['SN'];?></h4>

                                                            <?php endif; ?>

                                                                <small><?php echo $prod['prod_desc'];?></small>
                                                                <p/>
                                                                <b><price id="price<?php echo $prod['SN'];?>"><?php echo $prod['prod_price'];?></price></b>

                                                </div>
                                            </div>

                                          
                                    <?php   }

                                            }
                                            }

                                            //-------///
                                    ?>


                                <div class="clear-float"></div>
                                <div class="clear-height"></div>


                                <div class="rowspan display-hide">
                                    <div class="pagination no-border no-margin">
                                        <button class="defaultBtn">1</button>
                                        <button  class="defaultBtn">2</button>
                                        <button class="defaultBtn">3</button>
                                        <button class="defaultBtn">4</button>
                                        <button class="defaultBtn">5</button>
                                        <button class="defaultBtn">6</button>
                                        <button class="defaultBtn">7</button>
                                        <button class="defaultBtn">8</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Display Products End -->
                        
                        <div class="clear-height"><br></br></div>
                        <div class="clear-height"><br></br></div>
                        <div class="clear-height"><br></br></div>

                </div>
                </container>

            </div>

        </section>




        <div class="clear-height"></div>

        <?php include 'footer.php';?>

</body>
</html>

