<?php 

// Can be a custom message set in here// And a new conflict comment
$error = "";

if(!filter_var(trim($_REQUEST['sc-email']), FILTER_VALIDATE_EMAIL)) {
    $error .= "Please enter a valid email address.";
	$error .= "<br />";
}
if($_REQUEST['sc-verify'] != '4') {
	$error .= "Wrong verify code.";
	$error .= "<br />";
}

if($error == "") { 
	
	$domain = $_SERVER['SERVER_NAME'];
	$to      = 'your@email.com'; // your contact email address
	$subject = $_REQUEST['sc-subject'];
	$from = "Name: ".trim($_REQUEST['sc-name'])." \n";
	$from_email = "Email: ".trim($_REQUEST['sc-email'])." \n";
	$message = "Message: ".trim($_REQUEST['sc-comments'])." \n";
	$body .= $from;
	$body .= $from_email;
	$body .= $message;
	
	$headers = "Infos: $domain Contact Form \n";
	
	if(mail($to, $subject, $body, $headers)) { 
		echo "Email sent successfully.<br />Thank you , your message has been submitted to us."; 
	} 
	else {
		echo "Error sending email";
	}

} 
else {
	echo $error;
}
?>