<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['address']) 		||
   empty($_POST['email']) 		||
   empty($_POST['phone'])	||
   empty($_POST['laptop'])	||
   empty($_POST['location'])	||
   empty($_POST['education'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }

$name = $_POST['name'];
$address = $_POST['address'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$laptop = $_POST['laptop'];
$location = $_POST['location'];
$education = $_POST['education'];

// Create the email and send the message
$to = 'ahmadkbakibi@gmail.com';
$email_subject = "New Application Request Form:  $name";
$email_body = "New Application Request.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nAddress: $address\n\nLaptop:\n$laptop";
$headers = "From: OpenEmbassy\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	

$autoemail_subject="HackYourFuture: Thanks for your ";
		$auto_replyBody="Hi $name,\n\n".
		" van HackYourFuture\n";


		 $auto_headers = 'From: ahmadkbakibi@gmail.com' . "\r\n" .
				'Reply-To: ahmadkbakibi@gmail.com' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();

		 $mail_status =	mail($to,$email_subject,$email_body,$headers);

			if($mail_status){
			mail($email_address,$autoemail_subject,$auto_replyBody,$auto_headers);
			}
		return true;
?>