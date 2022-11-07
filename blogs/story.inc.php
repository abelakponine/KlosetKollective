<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/glui.app.css">
	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
</head>
<body>

		<div id="story" class="rowspan center">
	
					<?php

						require '../config.php';

						if (isset($_GET['storySN'])):

					    $get_blog = "SELECT * FROM blog WHERE SN = '".$_GET['storySN']."' ORDER BY `SN` DESC";
					    $blog_query = mysqli_query($conn, $get_blog);
					    $blog_res = mysqli_fetch_all($blog_query, MYSQLI_BOTH);

					    foreach ($blog_res as $blogs) {
					    	?>


							<div class="grid column-1 margin-auto display-block">
												
												<div class="right display-block relative">
													<h4 id="closeBlogView" class="inline-block fixed" style="background:#f8f8f8;padding:4px;cursor:pointer;right: 6px;">
														<span>Blogs</span> <span class="fas fa-angle-double-left"></span> <span>Go back</span>
													</h4>
													<p/>
												</div>

									                <article id="article<?php echo $blogs['SN']; ?>">
									                          <div id="imgPreview" style="width:100%;height:;260px;overflow:hidden;">
									                            <img src="blogimages/<?php echo $blogs['blog_attach']; ?>" style="width:100%;height:;100%;"/>
									                          </div>

									                          <h3 style="font-size:1.26em;text-align:left;padding:0;margin-bottom:0px;"><?php echo $blogs['blog_title']; ?></h3>
									                          <p/>

									                        <span class="left">
									                          <small style="background:#efefef;padding:2px;">@ <?php echo $blogs['blog_time']; ?></small> <small><span class="fas fa-angle-right"></span></small>
									                          <small style="background:#efefef;padding:2px;"> <?php echo $blogs['blog_date']; ?> </small>
															</span>

									                          <hr class="no-margin" />


									                          <div style="display:block;text-align:left;"><?php echo nl2br($blogs['blog_story']); ?></div>
									                          <p></p>

									                </article>

							</div>
							
						<?php    }

								endif;
						?>   

		</div>
				<p></p>
				<div class="clear-height">&nbsp;</div>

</body>
</html>
