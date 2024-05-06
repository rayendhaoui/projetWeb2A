<?php

    require('../config.php');
    session_start();

    if (isset($_POST['code'])){

        $email=$_SESSION['email'];
        $code=$_POST['code'];
        $sql="SELECT * FROM user WHERE email='" . $email . "' && code = '". $code."'";
                $db = config::getConnexion();
                try{
                    $query=$db->prepare($sql);
                    $query->execute();
                    $count=$query->rowCount();
                    if($count==1){
                        $user=$query->fetch(); 
                        header("Location: nouveaupassword.php");
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
        

  

  


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center">
        <h1 class=""><a href="../user.html">inscrit</h1>
      
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
                                    <h1 class="text-center font-weight-light my-4">Code de vérification</h1>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <table  align="center">
                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="code">code de verification:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="int" name="code" id="code"  placeholder="Entrer le code">
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
