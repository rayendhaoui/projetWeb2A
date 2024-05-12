<?php
session_start();
  include "../controller/userC.php";
  include_once '../Model/user.php';
$message="";

$userC = new userC();
if (isset($_POST["email"]) &&
    isset($_POST["mot_d_passe"])) {
    if (!empty($_POST["email"]) &&
        !empty($_POST["mot_d_passe"]))
    {   $message=$userC->connexionUser($_POST["email"],$_POST["mot_d_passe"]);
         $_SESSION['e'] = $_POST["email"];// on stocke dans le tableau une colonne ayant comme nom "e",
        //  avec l'email à l'intérieur
        if($message!='pseudo ou le mot de passe est incorrect'){
           header('Location:bien.html');}
        else{
            $message='pseudo ou le mot de passe est incorrect';
        }}
    else
        $message = "Missing information";}
?>

<!DOCTYPE html>
<html lang="en">

  <head>
       <meta charset="utf-8">

       <link rel="stylesheet" href="connexion.css" />

    </head>

    
    <img class="logo-zeb" src="logo-web-1.png">

<body> 
        



  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center">
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="../homepage.html">Home</a></li>
          
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
                                    <h1 class="text-center font-weight-light my-4" >Se connecter </h1>
                                </div>
                                
                                <div class="card-body">
                                <form action="" method="POST">
  <div class="form-container">
    <div class="form-group">
      <label class="small mb-1" for="email">Email:</label>
      <input class="form-control" type="email" name="email" id="email" placeholder="Entrer l'email">
    </div>
    <div class="form-group">
      <label class="small mb-1" for="mot_d_passe">Mot de passe:</label>
      <input class="form-control" type="password" name="mot_d_passe" id="mot_d_passe" placeholder="Entrer le mot de passe">
    </div>
    <div class="form-group">
  
  <button class="btn btn-secondary btn-block" type="reset">Annuler</button>
  <button class="btn btn-primary btn-block" type="submit">Envoyer</button>
</div>
  </div>
</form>
                                    <div class="button-container">
  <button onclick="location.href='user.php'">j'ai pas de compte</button>
</div>
<div class="button-container">
  <button onclick="location.href='mpoublie.php'">Mot De Passe oublié ?</button>
</div>
                        </div>
                    </div>
                </div>                         
            </div>
        </div>


            
  
      
    </body>
</html>
