 
    <div id="sidebar" class="z-index-8 navOffset">
        
        <button class="mclose absolute no-margin no-border navOffset" style="font-size:1.1em;right:-22px;opacity:0.8;" onclick="
            if ($('#sidebar').position().left >= 0){
                $('#sidebar').animate({'left':'-100%'},200);
            }
        "><span class="fas fa-times"></span></button>
        
        <div style="display:block;max-height:94%;position:relative;overflow:auto;">
        <div class="grid column-1 no-border center">
            <br/>
            <a href="index.php"><button style="background:#606060;border:0;width:60px;padding:6px;color:white;"> WOMEN </button></a> <a href="men.php"><button style="background:#606060;border:0;width:60px;padding:6px;color:white;"> MEN </button></a>
        </div>

            <p></p>
            <a href="index.php"><li><span class="fas fa-home"></span> Home </li></a>
            <hr/>
            <a href="category.php?products=<?php echo urlencode('New in');?>&class=viewall&genre=<?php echo $genre;?>"><li><img src="images/new-icon.png" style="width:30px;" class="fas fa-tshirt"/> New in </li></a>
            <hr/>
            <a href="category.php?products=<?php echo urlencode('Clothing');?>&class=clothing&genre=<?php echo $genre;?>"><li><span class="fas fa-tshirt"></span> Clothing </li></a>
            <hr/>
            <a href="category.php?products=<?php echo urlencode('Shoes');?>&class=shoes&genre=<?php echo $genre;?>"><li><span class="fas fa-shoe"></span> Shoes </li></a>
            <hr/>
            <a href="category.php?products=<?php echo urlencode('Accessories');?>&class=accessories&genre=<?php echo $genre;?>"><li><span class="fas fa-gem"></span> Accessories </li></a>
            <hr/>
            <a href="kkblog"><li><span class="fas fa-paw"></span> Blogs </li></a>
            <hr/>

            <?php
                if (isset($_SESSION['username']) && isset($_SESSION['password'])){
                    echo '<a href="logout.php"><li><span class="fas fa-sign-out-alt"></span> Logout </li></a><hr/>';
                }
                else {
            ?>
                <h4>Discover More</h4>
                <hr/>
                <li style="display:none"><span class="fas fa-shopping-basket"></span> Marketplace </li>
                <hr/>
                <a href="access.php"><li><span class="fas fa-sign-in-alt"></span> Login </li></a>
                <hr/>
                <a href="access.php?u"><li><span class="fas fa-fingerprint"></span> Register </li></a>
                <hr/>
            <?php
                }
            ?>
            <p>&nbsp;</p>
        </div>
    </div>
    