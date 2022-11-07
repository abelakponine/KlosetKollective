<?php
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure  = "ssl";                     // enables SMTP Secure
	$mail->Host       = "smtp.gmail.com"; // SMTP server example Gmail is (smtp.gmail.com)
	$mail->Port       = 465; //25;              // set the SMTP port for the GMAIL server (port: 465 or 587)
	$mail->isHTML(true);
	$mail->Username   = "exploxi@gmail.com"; // SMTP account username example
	$mail->Password   = "Exploxi2#";        // SMTP account password example
	$mail->setFrom("exploxi@gmail.com");
	$mail->Subject 	  = "Hello smtp!";
	$mail->Body       = "This is a test";
	$mail->addAddress("exploxi@gmail.com");
	if ($mail->Send()){
		echo 'message sent!';
	}
?>

