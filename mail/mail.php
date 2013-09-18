<?php
include 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->Username = 'axadort@gmail.com';
$mail->Password = '64axaturk32';
$mail->SetFrom($mail->Username, 'Benim Adım');
$mail->AddAddress('atillamutlutr@gmail.com', 'Alıcının Adı');
$mail->CharSet = 'UTF-8';
$mail->Subject = 'Mail Başlığı';
$mail->MsgHTML('Mailin içeriği!');
if($mail->Send()) {
    echo 'Mail gönderildi!';
} else {
    echo 'Mail gönderilirken bir hata oluştu: ' . $mail->ErrorInfo;
}
echo 'qwe';
?>