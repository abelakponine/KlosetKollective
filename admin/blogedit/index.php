<?php
    require '../../config.php';
    require '../admincheck.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Area | Blog</title>
  <!-- Bootstrap core CSS -->

  <link href="css/grid.css" rel="stylesheet">
    <link rel="stylesheet" href="../../fontawesome/css/all.css"/>
  <link href="css/style.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script> 
</head>

<body style="overflow-x:hidden;">



  <header id="header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10">
          <h3 class="inline-table"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Create and Edit <small>Blog</small></h3>

          <div class="grid column-3 float-right right no-border">
            <a class="color-white" href="../index.php"><h5 class="inline-table" style="margin: auto 8px;"> Admin </h5></a> <span class="fas fa-angle-right color-white"></span>
            <a class="color-white" href="../../blog"><h5 class="inline-table" style="margin: auto 8px;"> View Blog Page </h5></a> <span class="fas fa-angle-right color-white"></span> 
            <a class="color-white" href="../../logout.php"><h5 class="inline-table" style="margin: auto 8px;"> Logout </h5></a>
          </div>


        </div>

      </div>
    </div>
  </header>



  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <!-- Website Overview -->
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Edit Blog </h3>
            </div>


                <?php if(isset($_GET['changes'])):?>
                    <div class="grid column-2x2 no-margin no-border">
                        <span class="alert-success color-grey">
                            Changes Saved Successfully!
                        </span>
                        <script type="text/javascript">
                            $('.alert-success').delay(2000).fadeOut(800);
                        </script>
                    </div>
                <?php endif; ?>



            <div class="panel-body">
              <form method="post" action="<?php echo htmlspecialchars('../aquery.php')?>" enctype="multipart/form-data">

                <div class="display-hide form-group">
                  <input type="text" name="form" value="blogs">
                </div>

                <div class="form-group">
                  <label>Blog Title</label>
                  <input type="text" name="blog_title" class="form-control" placeholder="Blog Title" required/>
                </div>

                <div class="form-group">
                  <label>Blog story</label>
                  <textarea id="editor" name="editor1" class="form-control" placeholder="Write your story" required/></textarea>
                </div>

                <input type="file" name="blogAttach" required/>

                <br/>

                <div id="imgPreview" style="width:304px;max-height:236px;overflow:hidden;">
                  <img alt="preview" style="width:100%;"/>
                </div>
                <br/>

                <div class="container" id="img">

                  <input type="submit" class="btn  btn-reset" value="Reset Image" onclick="$('input[type=file]').val('');return false;">
                </div>


                <input type="submit" class="btn btn-default btn-publish color-white" value="Publish" style="background:grey !important;">
                
              </form>


              <script>
                
                $('input[type=file]').on('change', function(){

                  var file = this.files[0];

                      var URL = window.webkitURL || window.URL;
                      var imgLink = URL.createObjectURL(file);
                      
                      $('#imgPreview').html('<a href="'+imgLink+'" target="_blank"><img src="'+imgLink+'" alt="preview" style="width:100%;"></img></a>');

                });

              </script>


            </div>
          </div>

        </div>
        <div class="col-md-1"></div>
      </div>
    </div>
  </section>

  <footer id="footer">
    <p>Copyright Kloset Kollective, &copy; 2017</p>
  </footer>

  <script>
    CKEDITOR.replace('editor1');
    
    // BalloonEditor
    // .create( document.querySelector( '#editor' ) )
    // .then( editor => {
    //     console.log( editor );
    // } )
    // .catch( error => {
    //     console.error( error );
    // } );
  </script>


</body>

</html>