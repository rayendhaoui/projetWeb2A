<?php

  include_once '../Model/user.php';
    require('../config.php');
    session_start();

        if (isset($_POST['email'])){
            $email=$_POST['email'];
            $sql="SELECT * FROM user WHERE email='" . $email . "'";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                $count=$query->rowCount();
                if($count==1){
                    $user=$query->fetch();
                    $_SESSION['email'] = $email;
                    $_SESSION['region'] = $user['region'];
                    $region=$user['region'];
                    $code=mt_rand(1000,9999);
                    $sql="UPDATE user SET code= '" . $code . "' WHERE email='" . $email . "'";
                    $db = config::getConnexion();
                    $query1=$db->prepare($sql);
                    $query1->execute();
 ini_set('SMTP','myserver');
ini_set('smtp_port',25);
                    $email1="mohbenkhebbab004@gmail.com";    
                    $dest = $email;
                    $sujet = "Réinitialisation du mot de passe";
                    $corp =" Bonjour $login voici votre code de verification $code " ;
                    $headers = 'From: ' .$email1 . "\r\n".'Reply-To: ' . $email1. "\r\n".'X-Mailer: PHP/' . phpversion();
                    if (mail($dest, $sujet, $corp, $headers)) {
                        echo "Email envoyé avec succès à $dest ...";
                    } 
                    else {
                         echo "Échec de l'envoi de l'email...";
                    }
                    header("Location: verifpassword.php");
                }
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        } 



?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/ico/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/ico/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/ico/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" href="assets/img/ico/apple-touch-icon-57x57.png">

    <title>Coup de Chef</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/plugins.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/pe-icons.css" rel="stylesheet">

  <!-- Favicons -->

  <!-- Vendor CSS Files -->
    <link href="style.css" rel="stylesheet">


  <!-- Template Main CSS File -->

  <!-- =======================================================
  * Template Name: Medilab - v2.0.0
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

      <script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js">
    </script>
      
    <style>
        body{
        padding:10% 3% 10% 3%;
        text-align:center;
        }
        img{
            height:140px;
                width:140px; 
        }
               .mode {
            float:right;
        }
        .change {
            cursor: pointer;
            border: 1px solid #555;
            border-radius: 40%;
            width: 20px;
            text-align: center;
            padding: 5px;
            margin-left: 8px;
        }
        .dark{
            background-color: #222;
            color: #e6e6e6;
        }
    </style>
    </head>
<body>
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
   
      <
    </div>
  </div>
  <header id="header" class="fixed-top">
    <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center">
        <h1 class=""><a href="../user.html">coup de chef</h1>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="homepage.html">Home</a></li>
          
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h1 class="text-center font-weight-light my-4">Mot de passe oublié</h1>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <table  align="center">
                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="email" >Adresse mail:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="email" name="email" id="email" pattern=".+@gmail.com|.+@esprit.tn|.+@yahoo.com|.+@yahoo.fr" placeholder="Entrer l'adresse mail">
                                                </td>
                                            </tr>
                                </div>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input class="btn btn-primary btn-block" type="submit" value="Envoyer" >
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input class="pushboton" type="reset" value="Annuler" >
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>                         
            </div>
        </div>
     
  
      
   
            
    <
        <!-- End Footer -->
        <div id="preloader"></div>
        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
        <!-- Vendor JS Files -->
      
    </body>
</html>
