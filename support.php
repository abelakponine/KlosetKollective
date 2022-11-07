<?php

function secure($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

if (isset($_POST['botbox']) && $_POST['botbox'] !== ''){
	die('You are not allowed');
}
else {

	if (isset($_POST['form']) && $_POST['form'] == 'support'){

		echo 'correct';

		if (isset($_POST['telephone']) && $_POST['telephone'] !== ''){
			$telephone = $_POST['telephone'];
		}
		else {
			$telephone = 'NULL';
		}

		$to = 'abelakponine@tanta.com.ng'; //secure($_POST['email']);
		$subject = 'Support request from '.secure($_POST['firstname']).' '.secure($_POST['lastname']); //secure($_POST['subject']);

		$message = "
		<html>
		<head>
		<title>HTML email</title>
		</head>
		<body>

		<br></br>

		<b>From: </b>".secure($_POST['firstname'])." ".secure($_POST['lastname'])." (customer)<br/>
		<b>Email: </b>".secure($_POST['email'])."<br/>
		<b>Phone number: </b>".secure($telephone)."<br></br>
		<br></br><br></br>

		<hr style='border:1px dashed #dedede;'/>
		<br/>
		".secure($_POST['message'])."

		<br></br>
		<br></br>
		<hr style='margin:0;border:1px dashed #dedede;'/>

		<br></br><br></br> For more inquiries you can email us at: support@klosetkollect.com <br></br><br></br>
		<hr style='margin:0;border:1px dashed #dedede;'/>

		</body>
		</html>
		";

		// Set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: '.secure($_POST['firstname']) .' '.secure($_POST['lastname']).' <'.secure($_POST['email']).'> ' . "\r\n";

		if (mail($to,$subject,$message,$headers)){
		    header('location:kkblog/help?status=sent');
		}
		else {
		    echo '<b>Message sending failed:</b> <br/>'.var_dump(error_get_last());
		    header('location:kkblog/help?status=failed');
		}
	}
}

}
else{
    echo 'Invalid request method';
}
?>