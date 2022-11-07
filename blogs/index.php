
<?php
    require '../config.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?php echo $blogName;?> | Blog</title>
  <!-- Bootstrap core CSS -->

  <link href="css/grid.css" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.css"/>
  <link href="css/style.css" rel="stylesheet">
  <link href="css/blog.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/glui.app.js"></script>
  <script src="js/glui.slider.js"></script>
</head>

<body style="overflow-x:hidden;">



  <header id="header" style="position:relative;z-index:3 !important;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10">
          <h2 class="inline-table float-left"><object data="../kk.svg" style="display:inline-grid;width:30px;"></object> <span class="inline-grid"><?php echo $blogName;?></span> </h2>


          <div class="grid column-3 float-right right no-border relative">


                    <?php if(!isset($username)):?>

                    <span class="inline-table relative" style="margin:auto 8px;bottom:-6px;">
                    <span class="icon-img" id="accessbtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="22" viewBox="0 0 18 21">
                            <g fill="#FFF" fill-rule="nonzero">
                                <path d="M4.337 18.894c.02.036.47.041.5-.008.812-1.319 3.104-1.319 3.912-.003l.05.08c.03.05.476.05.506 0l.048-.077c.81-1.319 3.103-1.319 3.914 0 .03.05.48.044.5.008.72-1.276 1.156-2.616 1.294-3.943l.038-.55a151.892 151.892 0 0 0 .142-2.452c.04-.83.063-1.522.063-2.022 0-1.445-.3-3.193-1.023-4.662C13.253 3.177 11.549 2 8.882 2c-2.665 0-4.37 1.18-5.399 3.276-.722 1.47-1.022 3.22-1.022 4.65 0 .481.044 1.171.123 2.008a81.335 81.335 0 0 0 .348 2.953c.206 1.37.678 2.718 1.405 4.007zm-1.404-4.003l-.002-.01a10.654 10.654 0 0 0 .002.01zm-1.98.287l-.078-.58a83.313 83.313 0 0 1-.282-2.475c-.085-.894-.132-1.639-.132-2.196 0-1.71.349-3.745 1.227-5.533C3.038 1.645 5.414 0 8.882 0c3.469 0 5.844 1.64 7.193 4.382.88 1.787 1.229 3.82 1.229 5.545 0 .538-.023 1.258-.065 2.118a116.298 116.298 0 0 1-.145 2.489c-.017.26-.03.454-.041.592-.17 1.636-.691 3.239-1.544 4.75-.773 1.372-3.123 1.398-3.946.057-.03-.048-.477-.048-.506 0l-.048.078c-.81 1.319-3.103 1.319-3.912.003l-.05-.08c-.03-.05-.476-.05-.506 0-.824 1.34-3.173 1.314-3.946-.057a13.68 13.68 0 0 1-1.642-4.699z"></path>
                                <circle cx="6.5" cy="6.5" r="1.5"></circle>
                                <circle cx="11.5" cy="6.5" r="1.5"></circle>
                            </g>
                        </svg>
                    </span>
                    </span>
                    
                    <?php endif; ?>

                    <?php if(isset($username)):?>

                    <span class="inline-table relative" style="margin: auto 8px;bottom:-6px;">
                    <span class="icon-img" id="accessbtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="21" viewBox="0 0 16 21">
                            <path fill="#FFF" fill-rule="evenodd" d="M.52 15.507S0 11.718 0 9.867C0 8.013.568 0 8 0s8 7.98 8 9.866c0 1.886-.265 5.634-.265 5.634-.166 1.654-.683 3.28-1.53 4.82-.428.779-1.937.795-2.397.027-.453-.755-1.93-.755-2.382 0l-.052.086c-.453.756-1.929.756-2.382 0l-.052-.086c-.453-.755-1.928-.755-2.382 0-.46.768-1.969.752-2.397-.026A14.25 14.25 0 0 1 .52 15.507zM5.5 8a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm5 0a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                        </svg>
                    </span>
                    </span>

                    <?php endif; ?>


            <a class="color-white" href="../"><h5 class="inline-table" style="margin: auto 8px;"> Home </h5></a>

            <?php if(isset($username)):?>
            <span class="color-white fas fa-angle-right"></span> 
            <a class="color-white" href="../logout.php"><h5 class="inline-table" style="margin: auto 8px;"> Logout </h5></a>

             <?php endif; ?>

            <?php if(!isset($username)):?>
            <span class="color-white fas fa-angle-right"></span> 
            <a class="color-white" href="../access.php"><h5 class="inline-table" style="margin: auto 8px;"> Login </h5></a>

          <?php endif; ?>

          </div>

        </div>

      </div>
    </div>
  </header>


<div id="darkLayer" style="z-index:3 !important;"></div>


<div class="rowspan fixed center z-index-4" style="display:none;top:0;height:100%;">
    <div class="grid column-3x2 no-border no-margin no-padding relative margin-auto" style="background:white;overflow:auto;height:100%;">
          <div id="fetchStory"></div>
          <div class="clear-height"><p></p></div>
    </div>
</div>


  <section id="main" class="z-index-1" style="background:white;min-height:500px;z-index:1 !important;">
    <div class="container">
      <div class="rowspan center">

                <div class="grid no-border rowspan">  

                <?php
                    $get_blog = "SELECT * FROM blog ORDER BY `SN` DESC";
                    $blog_query = mysqli_query($conn, $get_blog);
                    $blog_res = mysqli_fetch_all($blog_query, MYSQLI_BOTH);

                    foreach ($blog_res as $blogs) {

                ?>      

            <div id="blogPost<?php echo $blogs['SN']; ?>" class="grid column-4 no-border inline-block thumbnail" style="transition-duration:10s;box-shadow: 0 0 5px 8px #f8f8f8;min-width:240px;">
                
                <article id="article<?php echo $blogs['SN']; ?>">
                          <div id="imgPreview" style="width:100%;height:160px;overflow:hidden;">
                            <img src="blogimages/<?php echo $blogs['blog_attach']; ?>" style="height:100%;"/>
                          </div>

                          <h3 style="display:block;font-size:1.26em;text-align:left;padding:0;margin:auto;margin-bottom:0px;text-align:center;"><?php echo $blogs['blog_title']; ?></h3>

                          <div style="display:block;text-align:left;height:100px;overflow:hidden;"><?php echo substr(nl2br($blogs['blog_story']),'0','80').' ... &nbsp;&nbsp; <small>[Read More]</small>'; ?></div>
                          <p/>

                          <hr class="no-margin" />
                          <small style="background:#efefef;padding:2px;"><?php echo $blogs['blog_time']; ?></small> <small><span class="fas fa-angle-right"></span></small>
                          <small style="background:#efefef;padding:2px;"> <?php echo $blogs['blog_date']; ?> </small>

                </article>

                <script type="text/javascript">
                  $(document).ready(function(){
                      $('#blogPost<?php echo $blogs['SN']; ?>').on('click', function(){
                          $('#darkLayer').show(400);
                          $('#fetchStory').load('story.inc.php?storySN=<?php echo $blogs['SN']; ?> #story', function(){

                            $('#fetchStory #closeBlogView').on('click', function(){
                                $('#darkLayer').hide(400);
                                $('#fetchStory').parent().parent().hide(400, function(){
                                    $('#fetchStory').empty();
                                });

                            });

                          });
                          $('#fetchStory').parents().show(400);
                      });

                  });
                </script>

            </div>

                    <?php }; ?>



                <div class="clear-float"></div>

            </div>

            <div class="grid column-4 no-border">

            </div>

            <div class="grid column-4 no-border">

            </div>

            <div class="grid column-4 no-border">

            </div>

      </div>
    </div>
  </section>

  <footer id="footer">
    <p>Copyright KlosetKollection, &copy; 2017</p>
  </footer>

  <script>

    CKEDITOR.replace('editor1');
  </script>
  <script src="js/image.js"></script>
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>