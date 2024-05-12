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
        .container {
    position: absolute;
    width: 732px;
    height: 350px;
    top: 125px;
    left: 400px;
    background-color: #f0ebd8;
    border-radius: 50px;
}
.form-control {
    width: 100%;  /* Make input fields fill the available space within cells */
  }
  /* Form Container */
.form-container {
    background-color: #fff; /* Set background color for the form */
    padding: 3rem; /* Add some padding for spacing */
    border-radius: 5px; /* Add some rounded corners */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a light shadow */
  }
  
  /* Form Groups */
  .form-group {
    margin-bottom: 1rem; /* Add some space between form groups */
  }
  
  /* Labels and Input */
  label {
    font-weight: bold;
    display: block;  /* Make labels display on separate lines */
    margin-bottom: 5px; /* Add some space between label and input */
  }
  
  .form-control {
    width: 100%;  /* Make input fields fill the available space */
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }
  
  /* Buttons */
  .btn {
    margin-top: 1rem;  /* Add some space between buttons */
  }
  .btn {
    margin: 0.5rem 1rem; /* Adjust margins for spacing between buttons */
    padding: 10px 20px; /* Adjust padding for button size */
    border-radius: 5px; /* Add rounded corners */
    font-size: 16px; /* Adjust font size for button text */
    cursor: pointer; /* Indicate interactivity on hover */
  }
  
  .btn-primary {
    background-color: #4CAF50; /* Blue color for primary button */
    color: #fff; /* White text for primary button */
     /* Blue border for primary button */
  }
  
  .btn-primary:hover {
    background-color: #6c757d; /* Gray color for secondary button */
    color: #fff; /* White text for secondary button */
   
  }
  
  .btn-secondary {
    background-color: #6c757d; /* Gray color for secondary button */
    color: #fff; /* White text for secondary button */
   
  }
  
  .btn-secondary:hover {
    background-color: #5a6268; /* Darker gray on hover for secondary button */
    border-color: #5a6268; /* Darker gray border on hover for secondary button */
  }
  .logo-zeb {
    position: absolute;
    top: 20px;
    left: 20px;
    width: 1000px; /* Adjust image width as needed */
    height: auto; /* Maintain aspect ratio */
   
    
}
    </style>
    </head>

<body> 
        

  

  


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center">
        <h1 class=""><a href="../user.php">inscrit</h1>
      
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
