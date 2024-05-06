<?php

    require('../config.php');
    session_start();

    if (isset($_POST['mot_d_passe'])){
        $email=$_SESSION['email'] ;
        $mot_d_passe=$_POST['mot_d_passe'];
        if($_POST['confpassword']==$mot_d_passe){
            $sql="UPDATE user SET mot_d_passe= '" . $mot_d_passe . "' WHERE email='" . $email . "'";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                header("Location: connexion.php");
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        else {
                echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
                echo 'Verifier votre mot de passe ';}
    } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    
      
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


  
        <!-- Load font awesome icons -->

<!-- The social media icon bar -->
                    <a class="navbar-brand smoothie" href="addU.php"> <span class="theme-accent-color">COUP</span> DE <span class="theme-accent-color">CHEF</span></a>

 <header id="header" class="fixed-top">
    <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center">
        <h1 class=""><a href="../addU.php">coup de chef</h1>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="../home.php">Home</a></li>
          
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
                                    <h1 class="text-center font-weight-light my-4">Nouveau mot de passe</h1>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <table  align="center">
                                        
                                                <td>
                                                    <label class="small mb-1" for="pass">Mot de passe:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="password" name="pass" id="pass" placeholder="Entrer le mot de passe">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="confpassword">Verifier Mot de passe:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="password" name="confpassword" id="confpassword" placeholder="Confirmer le mot de passe">
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
                                                    <input class="btn btn-primary btn-block" type="reset" value="Annuler" >
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
   <div class="mode">
        Dark mode:             
        <span class="change">OFF</span>
    </div>
      
  
      
    <script>
        $( ".change" ).on("click", function() {
            if( $( "body" ).hasClass( "dark" )) {
                $( "body" ).removeClass( "dark" );
                $( ".change" ).text( "OFF" );
            } else {
                $( "body" ).addClass( "dark" );
                $( ".change" ).text( "ON" );
            }
        });
    </script>

            
    
        <!-- End Footer -->
        <div id="preloader"></div>
        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
        <!-- Vendor JS Files -->
      
    </body>
</html>
