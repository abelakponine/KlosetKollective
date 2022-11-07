<?php
    require 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=360px,minimum-scale=0.1,maximum-scale=1,user-scalable=no"/>
    <meta http-equiv="cache-control" content="no-cache,no-store,no-save,s-maxage,must-revalidate,proxy-revalidate,max-age=-1">
    <meta http-equiv="pragma" content="no-cache,no-store,no-save,s-maxage,must-revalidate,proxy-revalidate,max-age=-1">
    <meta name="theme-color" contentt="#404040"/>
    
    <link rel="stylesheet" href="css/glui.app.css"/>
    <link rel="stylesheet" href="css/access.css"/>
    <link rel="stylesheet" href="fontawesome/css/all.css"/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/glui.app.js" async></script>
    <script type="text/javascript" src="js/glui.slider.js" async></script>
    <script type="text/javascript" src="js/jquery.constellation.js"></script>
    <title> Login | KlosetKollective </title>
</head>
<body>
    
    <div class="rowspan">
        <div class="grid column-1 no-border center">
        	<object data="kk.svg" style="width:80px;"></object>
            <h2 style="font-family:arial;" class="no-margin">Kloset Kollective</h2>
        </div>
        
        <div class="grid column-1 no-border navOffsetx2" style="background:white;display:block;max-width:650px;margin:auto;">
        		<a href="index.php"><span class="inline-table color-grey cursor-pointer"> Home </span></a> <small><span class="fas fa-angle-right color-grey"></span></small> <span class="inline-table color-silver cursor-pointer">User Account</span>

        		<p/>

            	<div class="rowspan" id="switch">
        			<button id="sbtn1" class="grid column-2 inline-table" style="background:none;padding:20px 1% !important;border:1px solid #adadad;border-bottom:0;font-weight:bold;font-family:futura-pt,sans-serif;outline:none;"> New to Kloset Kollective? </button>

        			<button id="sbtn2" class="grid column-2 inline-table" style="background:none;padding:20px 1% !important;border:1px solid #adadad;border-top:0;border-right:0;font-weight:bold;font-family:futura-pt,sans-serif;outline:none;"> Already registered? </button>
        		</div>

        		<p></p>


                



            <!-- Signup Form -->
            <form method="post" class="color-grey" id="form1" action="<?php echo htmlspecialchars('process.php')?>" >

                <input type="text" name="email" placeholder="Email"/>
                We'll send your order confirmation here
                <p/>

                <input class="display-hide" type="text" name="form" value="signup" placeholder="Firstname"/>
                <input type="text" name="Fname" placeholder="Firstname" required/>
                <input type="text" name="Lname" placeholder="Lastname" required/>
                <br><b>Gender:</b> <input type="radio" name="gender" value="male" style="width:30px;" class="inline-table" required/> Male <input type="radio" name="gender" value="female" style="width:30px;" class="inline-table" required/> Female </br>
                <input type="number" name="telephone" placeholder="Telephone" required/>
                <textarea name="address" placeholder="Address" style="width:90%;max-width:350px;min-height:80px;border:1px solid silver;padding:2%;border-radius:3px;font-family:arial;font-size:16px;" required></textarea>
                <input type="text" name="username" placeholder="Username" required/>
                <input type="password" name="password" placeholder="password" required/>
                <button class="defaultBtn display-block color-white" style="background:#5d5c5c;border:0;border-radius:0;font-weight:bold;font-size:16px;padding:12px 20px;"> Register </button>

                <p></p>
                 By creating your account, you agree to our <a href="kkblog/privacy-policy/" target="_blank"style="text-decoration:underline;">Terms and Conditions</a> & <a href="kkblog/privacy-policy/" target="_blank"style="text-decoration:underline;">Privacy Policy</a>
                 <p></p>
            </form>



            <!-- Login Form -->
            <form method="post" action="<?php echo htmlspecialchars('process.php')?>" class="color-grey" id="form2" >

                <input class="display-hide" type="text" name="form" value="login" placeholder="Email or Username"/>
                <input type="text" name="username" placeholder="Email or Username"/>
                <input type="password" name="password" placeholder="password"/>
                <button class="defaultBtn display-block color-white" style="background:#5d5c5c;border:0;border-radius:0;font-weight:bold;font-size:16px;padding:12px 20px;"> Login </button>

                 <p></p>
                    <a id="fpass">Forgot Password?</a>
                 <p></p>
            </form>



            <!-- Password Retrieval Form -->
            <form method="post" class="color-grey" id="form3" style="display:none;">

                <input class="display-hide" type="text" name="form" value="rpass" placeholder="Email or Username"/>
                <input type="text" name="email" placeholder="Enter your Email"/>
                We'll need to confirm your account
                <p/>
                <button class="defaultBtn display-block color-white" style="background:#5d5c5c;border:0;border-radius:0;font-weight:bold;font-size:16px;padding:12px 20px;"> Reset </button>

                 <p></p>
                    <a href="access.php">Try again?</a>
                 <p></p>
            </form>


            <?php

            if (!isset($_GET['u'])){
            ?> 
            <script type="text/javascript">
                $('#form1').hide();
                $('#form2').show(120);
                $('#sbtn2').css({'border':'1px solid #adadad','border-bottom':'0px'});
                $('#sbtn1').css({'border':'0px','border-bottom':'1px solid #adadad'});
            </script>
            <?php }

            if (isset($_GET['u'])){
            ?> 
            <script type="text/javascript">
                $('#form2').hide();
                $('#form1').show(120);
                $('#sbtn1').css({'border':'1px solid #adadad','border-bottom':'0px'});
                $('#sbtn2').css({'border':'0px','border-bottom':'1px solid #adadad'});
            </script>
            <?php } ?>

            <script type="text/javascript">
            	
            	$('#sbtn1').on('click', function(event){
            		event.preventDefault();
            		event.stopPropagation();
            		$('#form2').hide(100);
            		$('#form1').show(100);
                    $(this).css({'border':'1px solid #adadad','border-bottom':'0px'});
                    $('#sbtn2').css({'border':'0px','border-bottom':'1px solid #adadad'});
            	});

                $('#sbtn2').on('click', function(event){
                    event.preventDefault();
                    event.stopPropagation();
                    $('#form1').hide();
                    $('#form2').show(120);
                    $(this).css({'border':'1px solid #adadad','border-bottom':'0px'});
                    $('#sbtn1').css({'border':'0px','border-bottom':'1px solid #adadad'});
                });

            	$('#fpass').on('click', function(event){
            		event.preventDefault();
            		event.stopPropagation();
            		$('#form1').hide();
                    $('#form2').hide();
                    $('#switch').hide();
            		$('#form3').show();
            	});
            </script>
            <p class="clear-height"></p>

        </div>
    </div>
    
</body>
</html>

