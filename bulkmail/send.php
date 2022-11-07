<?php

function secure($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$to = 'samsungsung1960@gmail.com'; //secure($_POST['email']);
$subject = secure($_POST['subject']);

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<h4>This demo bulk email contains HTML Tags!</h4>

<p>Here goes your message </p>
<hr style='margin:0;border:1px dashed #dedede;'/>
<hr style='margin:0;border:1px dashed #dedede;'/>
<br/>

".secure($_POST['message'])."

<br/>
<hr style='margin:0;border:1px dashed #dedede;'/>
<hr style='margin:0;border:1px dashed #dedede;'/>

</body>
</html>
";

// Set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <'.secure($_POST['sEmail']).'> '.secure($_POST['sName']) . "\r\n";

if (mail($to,$subject,$message,$headers)){
    header('location:index.php?status=sent');
}
else {
    echo '<b>Message sending failed:</b> <br/>'.var_dump(error_get_last());
}

}
else{
    echo 'Invalid request method';
}
?>