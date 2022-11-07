<?php
    require '../config.php';
    require 'admincheck.php';

    $pagename = 'Control Panel';

    if (isset($_POST['form']) && $_POST['form'] == 'remProd'){

        $remProd_sql = "DELETE FROM products WHERE SN = '".secure($_POST['remProd'])."'";
        $remProd  = mysqli_query($conn, $remProd_sql);

        if ($remProd){
            $thowRemProd = 'Product with ID: <b>'.$_POST['remProd'].'</b> has been removed';
        }
        else {
            echo mysqli_error($conn);
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
</head>
<body>
    <div class="rowspan relative">

        <div class="nav">

            <div class="mbtn grid ">
                <button onclick="
                    if ($('.leftbar').parent().position().left < 0){
                        $('.leftbar').parent().animate({'left':'0px'},200);
                    }
                    if ($('.leftbar').parent().position().left >= 0){
                        $('.leftbar').parent().animate({'left':'-100%'},200);
                    }
            "></button>
            </div>


            <div class="grid column-5x2 no-border">

                <h2 class="no-margin"> Control Panel </h2>
            </div>

          <div class="grid column-4 float-right right no-border">
            <h5 class="inline-table color-white" style="margin: auto 8px;"><span class="fas fa-user"></span>&nbsp; Administrator </h5> <span class="fas fa-angle-right"></span> 
            <a class="color-white" href="../logout.php"><h5 class="inline-table" style="margin: auto 8px;"> Logout </h5></a>
          </div>
        </div>

        <div class="grid column-5 fixed z-index-3 inline-block no-border navOffset" style="background:#f0f0f0;height:100%;border-right:;1px solid #eaeaea !important;margin-right:16px;min-width:225px;">
            
            <p> </p>
            <div class="leftbar" style="color:#606060">
                <button id="mbtn" style="padding:6px 4px;border:3px groove #dedede;" onclick="

                    if ($('#menubox').css('display') == 'none'){
                        $('#menubox').show(400);
                    }  
                    else {
                        $('#menubox').hide(400);
                    }

                "> menu </button>
                
                <div id="menubox">

                    <hr/>
                    <a href="../index.php"><h4> Home </h4></a>
                    <hr/>
                    <a onclick="
                        $('.menu').hide();
                        $('.menu.products').show();
                    "><h4> Manage Products </h4></a>

                    <hr/>
                    <a href="index.php?showusers"><h4> Manage Users </h4></a>
                    <hr/>
                    <a href="transactions.php"><h4> View Orders List </h4></a>
                    <hr/>
                    <a onclick="
                        $('.menu').hide();
                        $('.menu.website').show();
                    "><h4> Manage Website </h4></a>
                    <hr/>
                </div>

                <?php if (isset($_GET['page'])):?>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('.menu').hide();
                            $('<?php echo $_GET["page"];?>').show();
                        });
                    </script>
                <?php endif; ?>

                    <script type="text/javascript">
                        $('#menubox a').click(function(){
                            if ($('body').outerWidth() < 965){

                                $('#menubox').hide(300);
                            }
                        });

                        $(window).resize(function(){
                            if ($('body').outerWidth() >= 965){

                                $('#menubox').show(300);
                            }
                        });
                    </script>
            </div>
        </div>

        <div class="control-board grid column-3x2 absolute navOffset inline-block no-border rowspan z-index-2">
            <div class="grid column-2x2 no-margin no-border" style="background:#b9b9b9;#e4d9c3;border-radius:8px 8px 0 0 !important;">
                <h4 style="margin:6px 18px;"> Dashboard </h4>
            </div>
                
                <?php if(isset($_GET['changes'])):?>
                    <div class="grid column-2x2 no-margin no-border">
                        <span class="alert-success color-grey">

                            <?php if (isset($_GET['object'])){

                                echo $_GET['object'];

                                }
                            ?> Created Successfully!
                        </span>
                        <script type="text/javascript">
                            $('.alert-success').delay(2000).fadeOut(800);
                        </script>
                    </div>
                <?php endif; ?>


                    <div class="grid column-2x2 no-margin no-border">
                        <div id="toast" class="alert-success" style="display:none;"></div>
                    </div>


                <!-- Manage Products -->
                <div class="menu products grid column-1" style="margin-top:8px !important;border-color:#ebebeb;border-radius:6px;">
                    
                    <h4 style="margin:6px 18px;color:#707070;"> Manage Products </h4>
                    <br/>

                    <?php
                        if (isset($thowRemProd)){
                            echo "<span class='alert-success'>{$thowRemProd}</span><br/>";
                        }
                    ?>

                    <button class="addProd defaultBtn" style="padding:6px;font-size:15px;" onclick="

                        $('#addProd').show(200);
                        $('#remProd').hide(200);
                        $(this).css({'background':'#f0f0f0'});
                        $('.remProd').css({'background':'#adadad'});

                    "> Add Products </button>

                    <button class="remProd defaultBtn" style="background:#adadad;padding:6px;font-size:15px;" onclick="

                        $('#remProd').show(200);
                        $('#addProd').hide(200);
                        $(this).css({'background':'#f0f0f0'});
                        $('.addProd').css({'background':'#adadad'});

                    "> Remove Products </button>

                            
                            
                    <div id="addProd">
                        <form method="post" action="<?php echo htmlspecialchars('aquery.php'); ?>" class="no-margin" enctype="multipart/form-data">
                        <table>

                            <td class="display-hide"><input class="inline-table" name="form" value="products"  required/></td>

                            
                            <td></td> <td></td> 
                            <td rowspan="6"><div id="imgPreview" style="width:304px;height:236px;overflow:hidden;">
                                  <img alt="preview" style="height:100%;"/>
                            </div></td><tr/>


                            <td><span class="float-left inline-table">Product Title</span></td> &nbsp; <td><input class="inline-table" type="" name="Pname" placeholder="Name your product"  required/></td> <td></td><tr/>

                            <td><span class="float-left inline-table">Product Description</span></td> &nbsp; <td><textarea name="Pdesc" placeholder="Your product description" required></textarea></td> <td></td><tr/>
                            
                            <td><span class="float-left inline-table">Product Category</span></td> &nbsp; <td>
                            <select name="Pcat" style="padding:8px;font-size:15px;" required>

                                <option> Clothing </option>
                                <option> Shoes </option>
                                <option> Accessories </option>
                            </select></td><tr/>


                            <td><span class="float-left display-hide">Brands</span></td> &nbsp; <td>
                            <select name="Pbrand" style="display:none;padding:8px;font-size:15px;" required>
                                        <option selected>None</option>
                                        <optgroup label="Shoes"></optgroup>
                                <?php
                                        $get_brands = "SELECT brand_name FROM `prod_brand` ORDER BY `brand_name` ASC";
                                        $brands_query = mysqli_query($conn, $get_brands);
                                        $prod_brands = mysqli_fetch_all($brands_query);

                                        foreach ($prod_brands as $Brands){
                                            foreach ($Brands as $brand){
                                                echo '<option>'.$brand.'</option>';
                                            }
                                        }
                                ?>

                                        <optgroup label="Clothes"></optgroup>
                                        <option>Chinos</option>

                            </select></td><tr/>

                            <td><span class="float-left inline-table">Product Genre </span></td> &nbsp; <td>
                            <select name="Pgenre" style="padding:8px;font-size:15px;" required>
                                <option value="women"> Female </option>
                                <option value="men"> Male </option>
                            </select></td><tr/>

                            <td><span class="float-left inline-table">Attach Product Image</span></td> &nbsp; <td><input class="inline-table" type="file" name="productImg" style="width:200px;"  required/></td><tr/>

                            <td><span class="float-left inline-table">Price Tag <br/>(must be digits only)</span></td> &nbsp;

                            <td class="inline-block" style="width:50px;">
                            <select name="currency" style="padding:8px;font-size:15px;" required>
                                <option>&#8358;</option>
                                <option>$</option>
                            </select></td> &nbsp; <td class="inline-block"><input class="inline-table" type="number" name="price" placeholder="eg: 5000"  required/></td><tr/>

                            <td></td><td><button style="background:#adadad;padding:6px;border:0;font-size:15px;border-radius:2px;"> Add Item </button></td>

                        </table>
                        </form>
                    </div>

                    <div class="clear-height"></div>

                    <!-- Remove Products -->
                    <div id="remProd" style="display:none;">
                        <form method="post">
                            As administrator, you can get products ID from category page <a href="../category.php">here</a><br></br>

                            <input type="text" name="form" value="remProd" class="display-hide">
                            <input type="number" name="remProd" placeholder="Enter product ID to remove, eg: 20" style="padding:2%" required><br/>
                            <button>Remove Product</button>
                        </form>
                    </div>

              <script>
                
                $('input[name=productImg]').on('change', function(){

                  var file = this.files[0];

                      var URL = window.webkitURL || window.URL;
                      var imgLink = URL.createObjectURL(file);
                      
                      $('#imgPreview').html('<a href="'+imgLink+'" target="_blank"><img src="'+imgLink+'" alt="preview" style="height:100%;"></img></a>');

                });

              </script>

                </div>


         
                <!-- Manage Blogs -->
                <div class="menu blogs grid column-1" style="display:none;margin-top:8px !important;border-color:#ebebeb;border-radius:6px;">
                    
                    <h4 style="margin:6px 18px;color:#707070;"> Manage Blogs </h4>
                </div>
                

                <!-- Manage Users -->
                <div id="users" class="menu users grid column-1" style="display:none;margin-top:8px !important;border-color:#ebebeb;border-radius:6px;">
                    <container>
                         
                        <h4 style="margin:6px 18px;color:#707070;"> Manage Users </h4>

                        <div class="rowspan no-margin no-padding full-width center">
                        
                                        <!-- Find Users -->
                                <div class="grid column-1 no-border">
                                    <form class="form" method="get" action="">
                                        <input type="email" name="usermail" placeholder="Find users by email" required>
                                        <button> Search </button>
                                    </form>
                                    <br/>
                                </div>

                        <?php
                        if (isset($_GET['usermail']) && $_GET['usermail'] !== ''){

                            $getusers = "SELECT * FROM users WHERE email = '".$_GET['usermail']."' ORDER BY `id` ASC";
                            $getusers_query = mysqli_query($conn,$getusers);
                            $users = mysqli_fetch_all($getusers_query, MYSQLI_BOTH);

                            ?>

                            <script>
                                $(document).ready(function(){       
                                    $('.menu').hide();
                                    $('.menu.users').show();
                                });
                            </script>"

                        <?php }

                        else {

                            $getusers = "SELECT * FROM users ORDER BY `id` ASC";
                            $getusers_query = mysqli_query($conn,$getusers);
                            $users = mysqli_fetch_all($getusers_query, MYSQLI_BOTH);
                        }


                        if (isset($_GET['showusers'])){

                            ?>

                            <script>
                                $(document).ready(function(){       
                                    $('.menu').hide();
                                    $('.menu.users').show();
                                });
                            </script>"

                        <?php }


                        foreach ($users as $user){
                        ?>
                        
                            <div class="grid column-3 inline-table" style="margin:4px 0;">
                                
                                <h2><span class="fas fa-user-circle" style="color:#9a9a9a;"></span></h2>
                                
                                <?php
                                    echo $user['Fname'].' '.$user['Lname'].'<br/>'
                                    .$user['email'].'<br/>'
                                    .$user['telephone'].'<br/>'
                                    .$user['gender'].'<br/>'
                                    .$user['country'].'<br></br><b>Address:</b><br/>'
                                    .$user['address'].'<br/>'.'<br></br>
                                    <a href="transactions.php?user='.$user['id'].'" target="_blank">View Transactions</a>';
                                ?>
                                <p/>


                                <?php if ($user['status'] == 'active'): ?>

                                    <button style="background-color:#ce1a1a;border-color:#ffafaf;padding:6px;color:white;border-style:groove;border-radius:4px;font-weight:510;font-family:arial;" onmousedown="$(this).css({'border-style':'ridge'});" onmouseup="$(this).css({'border-style':'groove'});" onclick="doBlock<?php echo $user['id'];?>();">Block</button>

                                    <button style="background-color:#deffde;border:1px solid #93ff93;padding:6px;color:black;border-radius:2px;font-weight:510;font-family:arial;cursor:not-allowed;" disabled>Activate</button>

                                <?php endif; ?>


                                <?php if ($user['status'] == 'blocked'): ?>

                                    <button style="background-color:#c2c2c2;padding:6px;color:white;border:1px solid #cacaca;border-radius:2px;font-weight:510;font-family:arial;" disabled>Block</button>

                                    <button style="background-color:#15e015;border-color:#14f814;padding:6px;color:black;border-radius:2px;font-weight:510;font-family:arial;cursor:pointer;border-style:groove;" onmousedown="$(this).css({'border-style':'ridge'});" onmouseup="$(this).css({'border-style':'groove'});" onclick="doUnblock<?php echo $user['id'];?>();">Activate</button>

                                <?php endif; ?>
                                

                            </div>


                        
                        <script type="text/javascript">
                            function doBlock<?php echo $user['id'];?>(){
                                if (confirm('Do you want to block <?php echo $user['Fname'].' '.$user['Lname'];?> ?') == true){
                                        var user = "<?php echo $user["id"];?>";

                                        $.post('aquery.php',{lockUser: user}, function(){
                                            $('#toast').html('The User <?php echo $user['Fname'].' '.$user['Lname'];?> has been blocked! :(').show(200);
                                            $('#users').load('<?php echo basename($_SERVER['REQUEST_URI']);?> #users container').show();
                                        });
                                }
                            }

                            function doUnblock<?php echo $user['id'];?>(){
                                if (confirm('Do you want to Unblock <?php echo $user['Fname'].' '.$user['Lname'];?> ?') == true){
                                        var user = "<?php echo $user["id"];?>";

                                        $.post('aquery.php',{unlockUser: user}, function(){
                                            $('#toast').html('The User <?php echo $user['Fname'].' '.$user['Lname'];?> has been Unblocked! :)').show(200);
                                            $('#users').load('<?php echo basename($_SERVER['REQUEST_URI']);?> #users container').show();
                                        });
                                }
                            }
                        </script>

                        <?php
                        }
                        ?>

                        </div>
                    </container>
                </div>
                

                <!-- Manage Website -->
                <div class="menu website grid column-1" style="display:none;margin-top:8px !important;border-color:#ebebeb;border-radius:6px;">
                    
                    <h4 style="margin:6px 18px;color:#707070;"> Manage Website </h4>

                    <form method="post" action="<?php echo htmlspecialchars('aquery.php');?>" style="max-width:unset;" enctype="multipart/form-data">
                    <table>

                        <td class="display-hide"><input name="form" value="website"/></td>
                        <td><span class="float-left inline-table">Website Name</span></td> &nbsp; <td><input class="inline-table" type="" name="webName" value="<?php echo $webName;?>" required/></td><tr/>

                        <td><span class="float-left inline-table">Website Description</span></td> &nbsp; <td><textarea name="webDesc" required><?php echo $webDesc;?></textarea></td><tr/>
                        
                        
                        <td style="display:block;min-height:10px;" colspan="2"></td><tr/>


                        <td><span class="float-left inline-table">Header Text 1</span></td> &nbsp; <td><input name="head_maintext" value="<?php echo $web_res['head_maintext'];?>" required/></td><tr/>
                        
                        <td><span class="float-left inline-table">Header Text 2</span></td> &nbsp; <td><input name="head_subtext" value="<?php echo $web_res['head_subtext'];?>" required/></td><tr/>

                                                
                        <td style="display:block;min-height:10px;" colspan="2"></td><tr/>

                        <td colspan="2"><b>Shop The Edit</b> (For Women)</td><tr/>

                        <td style="display:block;min-height:10px;" colspan="2"></td><tr/>


                        <td><span class="float-left inline-table">Left Preview Image</span></td> &nbsp; <td><input name="shoptheeditLeftImg" class="leftimg" value="<?php echo $web_res['shoptheeditLeftImg'];?>" readonly required/></td><td><label for="leftimg"><span style="text-decoration:underline;color:blue;cursor:pointer;">Select Image</span></label><input id="leftimg" name="leftimg" type="file" style="display:none;border:0" onchange="
                            $('.leftimg').val(this.files[0].name);
                        "/></td><tr/>
                                                
                        <td><span class="float-left inline-table">Right Preview Image</span></td> &nbsp; <td><input name="shoptheeditRightImg" class="rightimg" value="<?php echo $web_res['shoptheeditRightImg'];?>" readonly required/></td><td><label for="rightimg"><span style="text-decoration:underline;color:blue;cursor:pointer;">Select Image</span></label><input id="rightimg" name="rightimg" type="file" style="display:none;border:0" onchange="
                            $('.rightimg').val(this.files[0].name);
                        "/></td><tr/>
                        
                        <td><span class="float-left inline-table">Left Main Text</span></td> &nbsp; <td><input name="shoptheeditLeftMainText" value="<?php echo $web_res['shoptheeditLeftMainText'];?>" required/></td><tr/>
                        
                        <td><span class="float-left inline-table">Left Sub Text</span></td> &nbsp; <td><input name="shoptheeditLeftSubText" value="<?php echo $web_res['menshoptheeditLeftSubText'];?>" required/></td><tr/>
                        
                        <td><span class="float-left inline-table">Right Main Text</span></td> &nbsp; <td><input name="shoptheeditRightMainText" value="<?php echo $web_res['shoptheeditRightMainText'];?>" required/></td><tr/>
                        
                        <td><span class="float-left inline-table">Right Sub Text</span></td> &nbsp; <td><input name="shoptheeditRightSubText" value="<?php echo $web_res['shoptheeditRightSubText'];?>" required/></td><tr/>
                                   


                        <td style="display:block;min-height:10px;" colspan="2"></td><tr/>

                        <td colspan="2"><b>Shop The Edit</b> (For Men)</td><tr/>

                        <td style="display:block;min-height:10px;" colspan="2"></td><tr/>


                        <td><span class="float-left inline-table">Left Preview Image</span></td> &nbsp; <td><input name="menshoptheeditLeftImg" class="menleftimg" value="<?php echo $web_res['menshoptheeditLeftImg'];?>" readonly required/></td><td><label for="menleftimg"><span style="text-decoration:underline;color:blue;cursor:pointer;">Select Image</span></label><input id="menleftimg" name="menleftimg" type="file" style="display:none;border:0" onchange="
                            $('.menleftimg').val(this.files[0].name);
                        "/></td><tr/>
                                                
                        <td><span class="float-left inline-table">Right Preview Image</span></td> &nbsp; <td><input name="menshoptheeditRightImg" class="menrightimg" value="<?php echo $web_res['menshoptheeditRightImg'];?>" readonly required/></td><td><label for="menrightimg"><span style="text-decoration:underline;color:blue;cursor:pointer;">Select Image</span></label><input id="menrightimg" name="menrightimg" type="file" style="display:none;border:0" onchange="
                            $('.menrightimg').val(this.files[0].name);
                        "/></td><tr/>
                        
                        <td><span class="float-left inline-table">Left Main Text</span></td> &nbsp; <td><input name="menshoptheeditLeftMainText" value="<?php echo $web_res['menshoptheeditLeftMainText'];?>" required/></td><tr/>
                        
                        <td><span class="float-left inline-table">Left Sub Text</span></td> &nbsp; <td><input name="menshoptheeditLeftSubText" value="<?php echo $web_res['menshoptheeditLeftSubText'];?>" required/></td><tr/>
                        
                        <td><span class="float-left inline-table">Right Main Text</span></td> &nbsp; <td><input name="menshoptheeditRightMainText" value="<?php echo $web_res['menshoptheeditRightMainText'];?>" required/></td><tr/>
                        
                        <td><span class="float-left inline-table">Right Sub Text</span></td> &nbsp; <td><input name="menshoptheeditRightSubText" value="<?php echo $web_res['menshoptheeditRightSubText'];?>" required/></td><tr/>
                        

                        
                        <td style="display:block;min-height:10px;" colspan="2"></td><tr/>

                        <td colspan="2"><b>Set Shop By Category Name</b> (For Women)</td><tr/>

                        <td style="display:block;min-height:10px;" colspan="2"></td><tr/>


                        <td><span class="float-left inline-table">Shop by catergory 1</span></td> &nbsp; <td><input name="shop_bycat1" value="<?php echo $web_res['shop_bycat1'];?>" required/></td><tr/>
                        
                        <td><span class="float-left inline-table">Shop by catergory 2</span></td> &nbsp; <td><input name="shop_bycat2" value="<?php echo $web_res['shop_bycat2'];?>" required/></td><tr/>
                        
                        <td><span class="float-left inline-table">Shop by catergory 3</span></td> &nbsp; <td><input name="shop_bycat3" value="<?php echo $web_res['shop_bycat3'];?>" required/></td><tr/>
                        
                        <td><span class="float-left inline-table">Shop by catergory 4</span></td> &nbsp; <td><input name="shop_bycat4" value="<?php echo $web_res['shop_bycat4'];?>" required/></td><tr/>
                        
                        <td><span class="float-left inline-table">Shop by catergory 5</span></td> &nbsp; <td><input name="shop_bycat5" value="<?php echo $web_res['shop_bycat5'];?>" required/></td><tr/>
                        

                        <td style="display:block;min-height:10px;" colspan="2"></td><tr/>

                        <td colspan="2"><b>Set Shop By Category Image</b> (For Women)</td><tr/>

                        <td style="display:block;min-height:10px;" colspan="2"></td><tr/>


                        <td><span class="float-left inline-table">Shop by catergory 1</span></td> &nbsp; <td><input name="shop_bycat_img1" class="img1" value="<?php echo $web_res['shop_bycat_img1'];?>" readonly required/></td><td><label for="img1"><span style="text-decoration:underline;color:blue;cursor:pointer;">Select Image</span></label><input id="img1" name="img1" type="file" style="display:none;border:0" onchange="
                            $('.img1').val(this.files[0].name);
                        "/></td><tr/>
                        
                        
                        <td><span class="float-left inline-table">Shop by catergory 2</span></td> &nbsp; <td><input name="shop_bycat_img2" class="img2" value="<?php echo $web_res['shop_bycat_img2'];?>" readonly required/></td><td><label for="img2"><span style="text-decoration:underline;color:blue;cursor:pointer;">Select Image</span></label><input id="img2" name="img2" type="file" style="display:none;border:0" onchange="
                            $('.img2').val(this.files[0].name);
                        "/></td><tr/>
                        
                        
                        <td><span class="float-left inline-table">Shop by catergory 3</span></td> &nbsp; <td><input name="shop_bycat_img3" class="img3" value="<?php echo $web_res['shop_bycat_img3'];?>" readonly required/></td><td><label for="img3"><span style="text-decoration:underline;color:blue;cursor:pointer;">Select Image</span></label><input id="img3" name="img3" type="file" style="display:none;border:0" onchange="
                            $('.img3').val(this.files[0].name);
                        "/></td><tr/>
                        
                        
                        <td><span class="float-left inline-table">Shop by catergory 4</span></td> &nbsp; <td><input name="shop_bycat_img4" class="img4" value="<?php echo $web_res['shop_bycat_img4'];?>" readonly required/></td><td><label for="img4"><span style="text-decoration:underline;color:blue;cursor:pointer;">Select Image</span></label><input id="img4" name="img4" type="file" style="display:none;border:0" onchange="
                            $('.img4').val(this.files[0].name);
                        "/></td><tr/>
                        
                        
                        <td><span class="float-left inline-table">Shop by catergory 5</span></td> &nbsp; <td><input name="shop_bycat_img5" class="img5" value="<?php echo $web_res['shop_bycat_img5'];?>" readonly required/></td><td><label for="img5"><span style="text-decoration:underline;color:blue;cursor:pointer;">Select Image</span></label><input id="img5" name="img5" type="file" style="display:none;border:0" onchange="
                            $('.img5').val(this.files[0].name);
                        "/></td><tr/>
                        

                        <td style="display:block;min-height:10px;" colspan="2"></td><tr/>

                        <td colspan="2"><b>Set Shop By Category Name</b> (For Men)</td><tr/>

                        <td style="display:block;min-height:10px;" colspan="2"></td><tr/>


                        <td><span class="float-left inline-table">Shop by catergory 1</span></td> &nbsp; <td><input name="menshop_bycat1" value="<?php echo $web_res['menshop_bycat1'];?>" required/></td><tr/>
                        
                        <td><span class="float-left inline-table">Shop by catergory 2</span></td> &nbsp; <td><input name="menshop_bycat2" value="<?php echo $web_res['menshop_bycat2'];?>" required/></td><tr/>
                        
                        <td><span class="float-left inline-table">Shop by catergory 3</span></td> &nbsp; <td><input name="menshop_bycat3" value="<?php echo $web_res['menshop_bycat3'];?>" required/></td><tr/>
                        
                        <td><span class="float-left inline-table">Shop by catergory 4</span></td> &nbsp; <td><input name="menshop_bycat4" value="<?php echo $web_res['menshop_bycat4'];?>" required/></td><tr/>
                        
                        <td><span class="float-left inline-table">Shop by catergory 5</span></td> &nbsp; <td><input name="menshop_bycat5" value="<?php echo $web_res['menshop_bycat5'];?>" required/></td><tr/>
                        

                        <td style="display:block;min-height:10px;" colspan="2"></td><tr/>

                        <td colspan="2"><b>Set Shop By Category Image</b> (For Men)</td><tr/>

                        <td style="display:block;min-height:10px;" colspan="2"></td><tr/>


                        <td><span class="float-left inline-table">Shop by catergory 1</span></td> &nbsp; <td><input name="menshop_bycat_img1" class="menimg1" value="<?php echo $web_res['menshop_bycat_img1'];?>" readonly required/></td><td><label for="menimg1"><span style="text-decoration:underline;color:blue;cursor:pointer;">Select Image</span></label><input id="menimg1" name="menimg1" type="file" style="display:none;border:0" onchange="
                            $('.menimg1').val(this.files[0].name);
                        "/></td><tr/>
                        
                        
                        <td><span class="float-left inline-table">Shop by catergory 2</span></td> &nbsp; <td><input name="menshop_bycat_img2" class="menimg2" value="<?php echo $web_res['menshop_bycat_img2'];?>" readonly required/></td><td><label for="menimg2"><span style="text-decoration:underline;color:blue;cursor:pointer;">Select Image</span></label><input id="menimg2" name="menimg2" type="file" style="display:none;border:0" onchange="
                            $('.menimg2').val(this.files[0].name);
                        "/></td><tr/>
                        
                        
                        <td><span class="float-left inline-table">Shop by catergory 3</span></td> &nbsp; <td><input name="menshop_bycat_img3" class="menimg3" value="<?php echo $web_res['menshop_bycat_img3'];?>" readonly required/></td><td><label for="menimg3"><span style="text-decoration:underline;color:blue;cursor:pointer;">Select Image</span></label><input id="menimg3" name="menimg3" type="file" style="display:none;border:0" onchange="
                            $('.menimg3').val(this.files[0].name);
                        "/></td><tr/>
                        
                        
                        <td><span class="float-left inline-table">Shop by catergory 4</span></td> &nbsp; <td><input name="menshop_bycat_img4" class="menimg4" value="<?php echo $web_res['menshop_bycat_img4'];?>" readonly required/></td><td><label for="menimg4"><span style="text-decoration:underline;color:blue;cursor:pointer;">Select Image</span></label><input id="menimg4" name="menimg4" type="file" style="display:none;border:0" onchange="
                            $('.menimg4').val(this.files[0].name);
                        "/></td><tr/>
                        
                        
                        <td><span class="float-left inline-table">Shop by catergory 5</span></td> &nbsp; <td><input name="menshop_bycat_img5" class="menimg5" value="<?php echo $web_res['menshop_bycat_img5'];?>" readonly required/></td><td><label for="menimg5"><span style="text-decoration:underline;color:blue;cursor:pointer;">Select Image</span></label><input id="menimg5" name="menimg5" type="file" style="display:none;border:0" onchange="
                            $('.menimg5').val(this.files[0].name);
                        "/></td><tr/>
                        

                        <td style="display:block;min-height:10px;" colspan="2"></td><tr/>

                        <td colspan="2"></td><tr/>

                        <td style="display:block;min-height:10px;" colspan="2"></td><tr/>


                        <td><span class="float-left inline-table">Switch Maintenance Mode</span></td> &nbsp; <td>
                        <select name="webMnt" style="padding:8px;" required>

                            <option <?php if($webMnt == 'Off'){ echo 'selected'; } ?> > Off </option>
                            <option <?php if($webMnt == 'On'){ echo 'selected'; } ?> > On </option>
                        </select></td><tr/>

                        <td></td><td><button id="sbtn" style="background:#57cb71;#adadad;padding:10px;border:0;font-size:15px;border-radius:2px;position:fixed;top:48%;left:860px;box-shadow:0 0 4px #afafaf"> Save changes </button></td>

                    </table>
                    </form>
                </div>

                <script type="text/javascript">

                    $(window).on('load', function(){
                        $('.control-board').css({"left":$('.leftbar').outerWidth()+40});
                    });
                    
                    $(window).resize( function(){
                        $('.control-board').css({"left":$('.leftbar').outerWidth()+40});
                    });
                </script>

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



