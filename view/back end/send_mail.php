<?php
// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require_once '../vendor/autoload.php';
// Create a new instance of PHPMailer
$mail = new PHPMailer(true);

try {
    // SMTP server settings
    $mail->isSMTP();                        // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';   // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;               // Enable SMTP authentication
    $mail->Username   = 'choeurproject@gmail.com'; // SMTP username (your Gmail address)
    $mail->Password   = 'oabw kzbc bghm mgeb'; // SMTP password (your Gmail password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                 // TCP port to connect to

    // Sender and recipient
    $mail->setFrom('choeurproject@gmail.com', 'Mailer'); // Set sender's email address and name
    $mail->addAddress('riahieya028028@gmail.com', 'Destinataire'); // Add recipient's email address and name
    $mail->isHTML(true); // Set email format to HTML

    // Email subject and body
    $mail->Subject = 'Sujet de l\'e-mail';
    $mail->Body    = 'Ceci est le corps de l\'e-mail en HTML.';
    $mail->AltBody = 'Ceci est le corps de l\'e-mail en texte brut pour les clients ne prenant pas en charge le HTML.';

    // Send the email
    $mail->send();
    echo 'L\'e-mail a été envoyé avec succès.';
} catch (Exception $e) {
    // Handle exceptions
    echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
}
?>
