<?php

	/***
	Server SMTP/POP : mail.thaicreate.com
	Email Account : webmaster@thaicreate.com
	Password : 123456
	*/
	require_once('class.phpmailer.php');

	$mail = new PHPMailer();
	$mail->IsHTML(true);
	$mail->IsSMTP();
	$mail->SMTPAuth = true; // enable SMTP authentication
	$mail->SMTPSecure = ""; // sets the prefix to the servier
	$mail->Host = "smtp-relay.gmail.com"; // sets GMAIL as the SMTP server
	$mail->Port = 587; // set the SMTP port for the GMAIL server
	$mail->Username = "sunksun.lap@lru.ac.th"; // GMAIL username
	$mail->Password = "Y8L5f76w"; // GMAIL password
	$mail->From = "sunksun.lap@lru.ac.th"; // "name@yourdomain.com";
	//$mail->AddReplyTo = "sunksun.lap@lru.ac.th"; // Reply
	$mail->FromName = "Mr.Weerachai Nukitram";  // set from Name
	$mail->Subject = "Test sending mail."; 
	$mail->Body = "My Body & <b>My Description</b>";

	$mail->AddAddress("sunksunlapunt@gmail.com", "Mr.Adisorn Boonsong"); // to Address

	$mail->Send(); 
?>