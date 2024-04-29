<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require_once "./phpqrcode/phpqrcode.php";

session_start();

        $_SESSION['tad']=$_POST['adresse'] ;
       $_SESSION['tname']=$_POST['fname'] ;
       $_SESSION['tdate']=$_POST['date'] ;
       $_SESSION['tphone']=$_POST['phone'] ;

// Générer le code QR
$qrText = "Bonjour,: " . $montant_fac . ", la date de votre rendez-vous est : " . $date_de_delivration;
$qrCodePath = "qrcode.png";
QRcode::png($qrText, $qrCodePath, QR_ECLEVEL_L, 10);

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'tahayassine.kouas@esprit.tn';
$mail->Password = 'Trollface360';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->isHTML(true);
$mail->setFrom($email_fac, $type_fac);
$mail->addAddress($email_fac);
$mail->Subject = "$date_de_delivration ($type_fac)";
$mail->Body = "votre rendez vous a ete pris <br><br><img src='cid:qrcode'><br><br>";
$mail->AddEmbeddedImage($qrCodePath, 'qrcode');

$mail->send();
header('Location:test.php');