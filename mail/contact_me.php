<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['location']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$location = $_POST['location'];
$message = $_POST['message'];
	
// Create the email and send the message
$to = 'ahmadkbakibi@gmail.com';
$email_subject = "New Message Form:  $name";


$email_body= "
<html>
<head>
<title>HackYourFuture</title>
</head>
<body>
<p>received a new message from HackYourFuture contact form</p>
<table>
 <tr>
                      <td>
                        <p>Name: $name</p>
                        <p>Email: $email_address</p>
                        <p>Location: $location</p>
                        <p>Message:\n$message</p>
                      </td>
                    </tr>
<tr>
</tr>
</table>
</body>
</html>
";
//$email_body = "received a new message from HackYourFuture contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nLocation: $location\n\nMessage:\n$message";

$headers = "From: HackYourFuture\n";
$headers .= "Reply-To: $email_address";
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

mail($to,$email_subject,$email_body,$headers);
return true;			
?>