<?php session_start();
$email = $_SESSION['mail'];
$var_name = $_SESSION['varname'];
$otdel = $_SESSION['otdel'];
require_once('assests/phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $name = $_POST['user_name'];
// $phone = $_POST['user_phone'];
// $email = $_POST['user_email'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'AiratClubBudo@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'fqhfnbr'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('AiratClubBudo@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress($email);
 // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Создан План на день';
$mail->Body    = '' .$var_name . ' составил план на день ' .'<br>' .$otdel. '<br>Почта этого пользователя: ' .$email;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    // header('location:../index.html');
}
?>
