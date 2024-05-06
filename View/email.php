<?php
if (isset($_POST['sendMailBtn'])) {
    $fromEmail = $_POST['fromEmail'];
    $toEmail = $_POST['toEmail'];
    $subjectName = $_POST['subject'];
    $message = $_POST['message'];
    $to = $toEmail;
    $subject = $subjectName;
    $header = "MIME-Version: 1.0" . "\r\n";
    $header.='From:"coup de chef"<eyabouthouri00@gmail.com'."\n";
    $header.= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $header.='Content-Transfer-Encoding: 8bit';
    $message = '<!doctype html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
    </head>
    <body>
    <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.$message.'</span>
      <div class="container"> Cher Cient,<br/><br/>
               '.$message.'<br/><br/>
                  Cordialement.
                Coup de chef <br/>
      </div>
      <div>
      <img src="https://lh5.googleusercontent.com/p/AF1QipOg-LkC0AcjmaXOoS3MEodzVfOFwoJH5HrQBWST=w600-h321-p-k-no" height="150px"/>
      </div>
    </body>
    </html>';
    
    mail($to,"[félicitation]
vous êtes bien inscrit dans notre site ", $message, $header);

    echo '<script>alert("Email sent successfully !")</script>';
   echo '<script>window.location.href="afficherUtilisateurs.php";</script>';
}
?>