
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
        
        <div class="fixed z-index-10 <?php if(strstr($e_uri[$c_uri],'category.php')){echo 'navOffset';} ?>" id="access-hover" style="display:none;background:#e8e8e8;width:260px;min-height:140px;padding:0px;right:30px;">
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

        <div id="fixedNav" class="relative full-width color-white z-index-5 navOffset">

            <div class="rowspan list-item z-index-3">

                <div class="grid column-1 no-border no-margin no-padding">

                    <ul class="subNav no-padding no-margin inline-table">
                    <a href="category.php?products=<?php echo urlencode('New in');?>&class=viewall&genre=men"><li class="no-padding no-margin"><button> New in </button></li></a>
                        <ul class="absolute no-margin z-index-10 display-hide" style="display:none;background:#e8e8e8;width:200px;min-height:140px;padding:14px 8px;font-size:15px;color:grey;">
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('New in');?>&class=viewall&genre=men"><li><span> View all </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Clothing');?>&class=clothing&genre=men"><li><span> Clothing </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Shoes');?>&class=shoes&genre=men"><li><span> Shoes </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Accessories');?>&class=accessories&genre=men"><li><span> Accessories </span></li></a>
                                <hr/>
                        </ul>
                    </ul>

                    <ul class="subNav no-padding no-margin inline-table">
                    <a href="category.php?products=<?php echo urlencode('Clothing');?>&class=clothing&genre=<?php echo $genre;?>"><li class="no-padding no-margin"><button> Clothing </button></li></a>
                        <ul class="display-hide absolute no-margin z-index-10" style="display:none;background:#e8e8e8;width:200px;min-height:140px;padding:14px 8px;font-size:15px;color:grey;">
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Active wear');?>&class=viewall&genre=men"><li><span> Active wear </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Hoodies & Jackets');?>&class=viewall&genre=men"><li><span> Hoodies & Sweatshirts </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Jackets & Coats');?>&class=viewall&genre=men"><li><span> Jackets & Coats </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Jeans');?>&class=viewall&genre=men"><li><span> Jeans </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Jumpers & Cardigan');?>&class=viewall&genre=men"><li><span> Jumpers & Cardigans </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Lounge wear');?>&class=viewall&genre=men"><li><span> Lounge wear </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Polo Shirts');?>&class=viewall&genre=men"><li><span> Polo Shirts </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Shirts');?>&class=viewall&genre=men"><li><span> Shirts </span></li></a>
                                <hr/>
                        </ul>
                    </ul>

                    <ul class="subNav no-padding no-margin inline-table">
                    <a href="category.php?products=<?php echo urlencode('Shoes');?>&class=shoes&genre=<?php echo $genre;?>"><li class="no-padding no-margin"><button> Shoes </button></li></a>
                        <ul class="display-hide absolute no-margin z-index-10" style="display:none;background:#e8e8e8;width:400px;min-height:140px;padding:14px 8px;font-size:15px;color:grey;">

                             <div class="rowspan inline-table">
                                <div class="grid column-2 no-border no-padding inline-table" style="border-right:1px solid #dadada !important;">
                                    <span class="center"><b> SHOP BY PRODUCT </b></span>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Boots');?>&class=shoes&genre=men"><li><span> Boots </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Flat Shoes');?>&class=shoes&genre=men"><li><span> Flat shoes </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Heels');?>&class=shoes&genre=men"><li><span> Heels </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Loafers');?>&class=shoes&genre=men"><li><span> Loafers </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Sandals');?>&class=shoes&genre=men"><li><span> Sandals </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Slippers');?>&class=shoes&genre=men"><li><span> Slippers </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Socks & Tights');?>&class=shoes&genre=men"><li><span> Socks & Tights </span></li></a>
                                        <hr/>
                                    <a href=""><li><span> Trainers </span></li></a>
                                        <hr/>
                                </div>
                                <div class="grid column-4x2 no-border inline-table">
                                    <span class="center"><b> SHOP BY BRAND </b></span>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Dune Shoes');?>&class=shoes&genre=men"><li><span> Dune </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Glamorous Shoes');?>&class=shoes&genre=men"><li><span> Glamorous </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Prada Shoes');?>&class=shoes&genre=men"><li><span> Prada </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Nike Shoes');?>&class=shoes&genre=men"><li><span> Nike </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Public Desire Shoes');?>&class=shoes&genre=men"><li><span> Public Desire </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Puma Shoes');?>&class=shoes&genre=men"><li><span> Puma </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Raid Shoes');?>&class=shoes&genre=men"><li><span> Raid </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Reebok Shoes');?>&class=shoes&genre=men"><li><span> Reebok </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Vans Shoes');?>&class=shoes&genre=men"><li><span> Vans </span></li></a>
                                        <hr/>
                                </div>
                            </div>
                        </ul>
                    </ul>

                    <ul class="subNav no-padding no-margin inline-table">
                    <a href="category.php?products=<?php echo urlencode('Accessories');?>&class=accessories&genre=<?php echo $genre;?>"><li class="no-padding no-margin"><button> Accessories </button></li></a>
                        <ul class="display-hide absolute no-margin z-index-10" style="display:none;background:#e8e8e8;width:200px;min-height:140px;padding:14px 8px;font-size:15px;color:grey;">
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Bag & Purses');?>&class=accessories&genre=men"><li><span> Bags & Purses </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Belts');?>&class=accessories&genre=men"><li><span> Belts </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Gloves');?>&class=accessories&genre=men"><li><span> Gloves </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Hair Accessories');?>&class=accessories&genre=men"><li><span> Hair Accessories </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Hats');?>&class=accessories&genre=men"><li><span> Hats </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Watches');?>&class=accessories&genre=men"><li><span> Jewellery & Watches </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Scarves');?>&class=accessories&genre=men"><li><span> Scarves </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Socks & Tights');?>&class=accessories&genre=men"><li><span> Socks & Tights </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Sunglasses');?>&class=accessories&genre=men"><li><span> Sunglasses </span></li></a>
                                <hr/>
                        </ul>
                    </ul>

                    <script type="text/javascript">

                        $('.subNav').on('mouseenter click', function(){
                            $(this).find('ul').show(100);
                            $(this).find('button').addClass('active'); 
                        });

                        $('.subNav').on('mouseleave blur', function(){
                            $(this).find('ul').hide();
                            $(this).find('button').removeClass('active');
                        });

                    </script>

                    <a href="kkblog" class="inline-table"><button> Blogs </button></a>
                    <!-- <button> Outlets for Men </button> -->

                    </ul>
                </div>
                
            </div>
        </div>

        <div class="fixed z-index-10" id="navhover1" style="display:none;block;background:#e8e8e8;width:200px;min-height:140px;padding:0px;left:4px;">
            <div class="display-block" style="padding:10px;">
                    <hr/>
                <a href="" class="color-grey"><span> View all </span></a>
                    <hr/>
                <a href="" class="color-grey"><span> Clothing </span></a>
                    <hr/>
                <a href="" class="color-grey"><span> Shoes </span></a>
                    <hr/>
                <a href="" class="color-grey"><span> Accessories </span></a>
                    <hr/>
                <a href="" class="color-grey"><span> Face + Body </span></a>
                    <hr/>
                <a href="" class="color-grey"><span> Living + Gifts </span></a>
                    <hr/>
                <a href="" class="color-grey"><span> Back in stock </span></a>
                    <hr/>
            </div>
        </div>

        
<!-- 
        <div class="rowspan relative no-padding color-white z-index-2 center">
            <div class="grid column-2 no-border center" style="background:black;color:rgb(161, 253, 2);padding: 1.2% 1%;">
                <h4 class="no-margin"> WOMEN: GET UP TO 60% OFF DRESSES </h4>
            </div>

            <div class="grid column-2 no-border center" style="background:rgb(229, 167, 179);padding: 1.2% 1%;">
                    <h4 class="no-margin"> MEN: UP TO 60% OFF TOP BRANDS </h4>
            </div>
        </div> -->
            
            <!-- Overall Navbar Ends -->

        <div class="checkout grid fixed z-index-9" style="background:white;width:96%;height:100%;padding:2%;max-width:350px;top:0;right:-100%;">
            <checkout class="navOffsetx2 display-block">
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

                                            $('container').load('category.php?products=<?php echo urlencode($_GET['products']);?>&class=<?php echo urlencode($_GET['class']);?>&genre=<?php echo $_GET['genre'];?>&search=<?php echo $search;?> #container');
                                        <?php endif; ?>

                                        <?php if (basename($_SERVER['SCRIPT_NAME']) !== 'category.php'):?>

                                            $('cart').load('<?php echo basename($_SERVER['SCRIPT_NAME']);?> cart');

                                            $('checkout').load('<?php echo basename($_SERVER['SCRIPT_NAME']);?> checkout');

                                            $('container').load('category.php?products=<?php echo urlencode($_GET['products']);?>&class=<?php echo urlencode($_GET['class']);?>&genre=<?php echo $_GET['genre'];?>&search=<?php echo $search;?> #container');
                                            
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
                    $(window).on('scroll', function(){
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

