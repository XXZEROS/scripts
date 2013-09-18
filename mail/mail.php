<?php
include 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'mail.tekbilim.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->Username = 'Support@tekbilim.com';
$mail->Password = 'su8465su';
$mail->SetFrom($mail->Username, 'Benim Adım');
$mail->AddAddress('cakirchat@gmail.com', 'Alıcının Adı');
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