<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width,minimum-scale=0.1,maximum-scale=1"/>

<link rel="stylesheet" href="css/glui.app.css">
<title>Bulkmail</title>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/test.js"></script>

</head>
<body>
	
	<div class="rowspan center" style="margin-top:40px;">
		<div class="grid column-3x2 inline-block">
		
		<?php
			if (isset($_GET['status']) && $_GET['status'] == 'sent'){
				echo "<span class='alert-success'> Message sent successfully! </span>
				";
			}
		?>
		
		<script>
			$(document).ready(function(){
				setTimeout(function(){
				$('.alert-success').hide(100);
				}, 5000);
			});
		</script>
		
		<h3> Bulkmail </h3>
			<form style="max-width:500px;" method="post" action="<?php echo htmlspecialchars('send.php');?>" enctype="multipart/form-data">
				<table class="left">
					<td>Receivers:</td><td style="min-width:350px;"><input type="text" name="email" placeholder="Multiple receivers' email, seperated by comma" required></td><tr/>
					<td>Subject:</td><td><input type="text" name="subject" placeholder="Write a topic" required></td><tr/>
					<td>Sender's Name:</td><td><input type="text" name="sName" placeholder="Sender's name"></td><tr/>
					<td>Sender's Email:</td><td><input type="email" name="sEmail" placeholder="Sender's email" required></td><tr/>
					<td>Attachment:</td><td><input type="file" name="attachment" required></td><tr/>
					<td></td><td><textarea style="display:;block;width:100%;min-height:200px;" name="message" required></textarea></td><tr/>
					<td></td><td><button> Send </button></td>
			</form>
		</div>
	</div>

</body>
</html>

