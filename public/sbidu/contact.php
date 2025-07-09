<?php
$name = $_POST['name']; 
$email = $_POST['email'];
$message = $_POST['message'];


$to = 'demo@gmail.com';

$from = 'rock@Sbidu.com';

if($name && $email && $message){
		$headers = "From:  $from \r\n";
		$headers .= "Reply-To:  $name<$email> \r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=utf-8\r\n";
		$res = mail($to, $message, $headers);
		if($res){
		echo 'Your Message has been sent successfully!'; 
	} else {
		echo 'Something went wrong, Please Try Again.'; 
	}
} else {
	echo 'All Fields are Required.';
}