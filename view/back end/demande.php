<?php

// Importation des classes nécessaires
require_once '../../config.php';
require_once '../../Model/ges_off_emp.php';
require_once '../../controller/ges_off_empG.php';


// Récupération de l'e-mail de la réponse à rechercher
$ymail = $_POST['email'];


// Récupération du message de réponse
$body_rep = $_POST['message'];


// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


// Création d'une nouvelle instance de PHPMailer
$mail = new PHPMailer(true);

// Vérification de l'existence de l'e-mail dans la base de données
if ($ymail != null) {
    try {
        // Paramètres du serveur SMTP
        $mail->isSMTP();                        // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';   // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;               // Enable SMTP authentication
        $mail->Username   = 'choeurproject@gmail.com'; // SMTP username (your Gmail address)
        $mail->Password   = 'oabw kzbc bghm mgeb'; // SMTP password (your Gmail password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                 // TCP port to connect to

        // Expéditeur et destinataire
        $mail->setFrom('choeurproject@gmail.com', 'Mailer'); // Set sender's email address and name
        $mail->addAddress($ymail); // Add recipient's email address and name
        $mail->isHTML(true); // Set email format to HTML

        // Sujet et corps de l'e-mail
        $mail->Subject = 'Reponse';
        $mail->Body    = $body_rep;
        $mail->AltBody = 'Ceci est le corps de l\'e-mail en texte brut pour les clients ne prenant pas en charge le HTML.';

        $mail->send();
        
        echo '<script>alert("Email envoyé avec succès"); window.location.href = "../front%20end/offred\'emploi.php";</script>';
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
    }
} else {
    echo '<script>alert("email introvable dans la base de donnes"); window.location.href = "reponse.html";</script>';
}
?>
