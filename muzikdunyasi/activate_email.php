<?php

	if(!isset($_SESSION['email_address']))
		header('location:index.php');

	if(!isset($_SESSION)){ 
	  session_start(); 
	} 

	require 'phpmailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               

	$mail->isSMTP();                                    
	$mail->Host = 'smtp.office365.com';  
	$mail->SMTPAuth = true;                              
	$mail->Username = 'hamzaeroglu_dlgn@outlook.com';                
	$mail->Password = 'Hh123456Ee';                           
	$mail->SMTPSecure = 'tls';                            
	$mail->Port = 587;                                   
	$to=$_SESSION['email_address'];
	$mail->setFrom('hamzaeroglu_dlgn@outlook.com', 'Hamza Eroğlu --- Musical World');
	$mail->addAddress($to);     

	$mail->isHTML(true);                                 

	$mail->Subject = 'Hesap Doğrulama Mesajı';
	$mail->Body = "	 Hoşgeldiniz ".$_SESSION['username']. " 
	Hesabınız oluşturuldu. Aktive etmek için linke tıklayın. 
	------------------------<br><br><br><br>
	Username:" .$_SESSION['email_address']."<br>
	Password:" .$_SESSION['password']."<br><br><br><br>
	------------------------
	 
	Hesabı aktive et:----------------------<br><br><br><br>
	http://localhost/musical_world/verify.php?email_address=".$_SESSION['email_address']."&activation_code=".$_SESSION['activation_code']."  "; // Our message above including the link

	if(!$mail->send()){
	    echo 'Mesaj yollanamadı';
	    echo 'Mailer Hatası: ' . $mail->ErrorInfo;
	}else{
			echo '<script type="text/javascript">';
            echo 'setTimeout(function () { sweetAlert("Success","<b> Thank you '. $username .' you have successfully registered.A confirmation link has been sent to your email address '. $email_address .' Please activate your account by clicking the activation link!!!...</b>","success");';
            echo '}, 500);</script>';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/KEERTHANA KUTEERA LOGO-ICON-01.png" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.js"></script>
</head>
<body>

</body>
</html>