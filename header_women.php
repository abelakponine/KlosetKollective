<?php 

    $uri = $_SERVER['REQUEST_URI'];
    $e_uri = explode('/', $uri);
    $c_uri = count($e_uri)-1;

    $date = date('D M Y');
    $time = date('h:i a');


?>

        <div id="fixedNav" class="relative full-width color-white z-index-5 navOffset">

            <div class="rowspan list-item z-index-3">

                <div class="grid column-1 no-border no-margin no-padding">

                    <ul class="subNav no-padding no-margin inline-table">
                    <a href="category.php?products=<?php echo urlencode('New in');?>&class=viewall&genre=women"><li class="no-padding no-margin"><button> New in </button></li></a>
                        <ul class="absolute no-margin z-index-10 display-hide" style="display:none;background:#e8e8e8;width:200px;min-height:140px;padding:14px 8px;font-size:15px;color:grey;">
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('New in');?>&class=viewall&genre=women"><li><span> View all </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Clothing');?>&class=clothing&genre=women"><li><span> Clothing </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Shoes');?>&class=shoes&genre=women"><li><span> Shoes </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Accessories');?>&class=accessories&genre=women"><li><span> Accessories </span></li></a>
                                <hr/>
                        </ul>
                    </ul>

                    <ul class="subNav no-padding no-margin inline-table">
                    <a href="category.php?products=<?php echo urlencode('Clothing');?>&class=clothing&genre=<?php echo $genre;?>"><li class="no-padding no-margin"><button> Clothing </button></li></a>
                        <ul class="display-hide absolute no-margin z-index-10" style="display:none;background:#e8e8e8;width:200px;min-height:140px;padding:14px 8px;font-size:15px;color:grey;">
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Active wear');?>&class=viewall&genre=women"><li><span> Active wear </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Hoodies & Jackets');?>&class=viewall&genre=women"><li><span> Hoodies & Sweatshirts </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Jackets & Coats');?>&class=viewall&genre=women"><li><span> Jackets & Coats </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Jeans');?>&class=viewall&genre=women"><li><span> Jeans </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Jumpers & Cardigan');?>&class=viewall&genre=women"><li><span> Jumpers & Cardigans </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Lounge wear');?>&class=viewall&genre=women"><li><span> Lounge wear </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Polo Shirts');?>&class=viewall&genre=women"><li><span> Polo Shirts </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Shirts');?>&class=viewall&genre=women"><li><span> Shirts </span></li></a>
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
                                    <a href="category.php?products=<?php echo urlencode('Boots');?>&class=shoes&genre=women"><li><span> Boots </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Flat Shoes');?>&class=shoes&genre=women"><li><span> Flat shoes </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Heels');?>&class=shoes&genre=women"><li><span> Heels </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Loafers');?>&class=shoes&genre=women"><li><span> Loafers </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Sandals');?>&class=shoes&genre=women"><li><span> Sandals </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Slippers');?>&class=shoes&genre=women"><li><span> Slippers </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Socks & Tights');?>&class=shoes&genre=women"><li><span> Socks & Tights </span></li></a>
                                        <hr/>
                                    <a href=""><li><span> Trainers </span></li></a>
                                        <hr/>
                                </div>
                                <div class="grid column-4x2 no-border inline-table">
                                    <span class="center"><b> SHOP BY BRAND </b></span>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Dune Shoes');?>&class=shoes&genre=women"><li><span> Dune </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Glamorous Shoes');?>&class=shoes&genre=women"><li><span> Glamorous </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Prada Shoes');?>&class=shoes&genre=women"><li><span> Prada </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Nike Shoes');?>&class=shoes&genre=women"><li><span> Nike </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Public Desire Shoes');?>&class=shoes&genre=women"><li><span> Public Desire </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Puma Shoes');?>&class=shoes&genre=women"><li><span> Puma </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Raid Shoes');?>&class=shoes&genre=women"><li><span> Raid </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Reebok Shoes');?>&class=shoes&genre=women"><li><span> Reebok </span></li></a>
                                        <hr/>
                                    <a href="category.php?products=<?php echo urlencode('Vans Shoes');?>&class=shoes&genre=women"><li><span> Vans </span></li></a>
                                        <hr/>
                                </div>
                            </div>
                        </ul>
                    </ul>

                    <ul class="subNav no-padding no-margin inline-table">
                    <a href="category.php?products=<?php echo urlencode('Accessories');?>&class=accessories&genre=<?php echo $genre;?>"><li class="no-padding no-margin"><button> Accessories </button></li></a>
                        <ul class="display-hide absolute no-margin z-index-10" style="display:none;background:#e8e8e8;width:200px;min-height:140px;padding:14px 8px;font-size:15px;color:grey;">
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Bag & Purses');?>&class=accessories&genre=women"><li><span> Bags & Purses </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Belts');?>&class=accessories&genre=women"><li><span> Belts </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Gloves');?>&class=accessories&genre=women"><li><span> Gloves </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Hair Accessories');?>&class=accessories&genre=women"><li><span> Hair Accessories </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Hats');?>&class=accessories&genre=women"><li><span> Hats </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Watches');?>&class=accessories&genre=women"><li><span> Jewellery & Watches </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Scarves');?>&class=accessories&genre=women"><li><span> Scarves </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Socks & Tights');?>&class=accessories&genre=women"><li><span> Socks & Tights </span></li></a>
                                <hr/>
                            <a href="category.php?products=<?php echo urlencode('Sunglasses');?>&class=accessories&genre=women"><li><span> Sunglasses </span></li></a>
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
                    <!-- <button> Outlets for Women </button> -->
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

