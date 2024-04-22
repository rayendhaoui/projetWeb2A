<?php
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['e']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    echo "<script type='text/javascript'>document.location.replace('login.php');</script>";
   }
$servername="localhost";
$username="root";
$password="";
$bdd="ecotrust";
$con=mysqli_connect($servername,$username,$password,$bdd);



?>
     
     <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Web UI Kit &amp; Dashboard Template based on Bootstrap">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, web ui kit, dashboard template, admin template">

	<link rel="shortcut icon" href="../img/icons/icon-48x48.png" />

	<title>Tables | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
	<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.php">
          <span class="align-middle">Gestion article</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						
					</li>

					<li class="sidebar-item ">
						<a class="sidebar-link" href="index.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle"> accueil </span>
            </a>
					</li>

                    <li class="sidebar-item active">
						<a href="#ui" data-toggle="collapse" class="sidebar-link">
              <i class="align-middle" data-feather="truck"></i> <span class="align-middle">  Gestion des livraisons  </span>
            </a>
						<ul id="ui" class="sidebar-dropdown list-unstyled collapse show" data-parent="#sidebar">

							<li class="sidebar-item  "><a class="sidebar-link" href="ajouterlivreur.php"> Ajouter un article </a></li>
							<li class="sidebar-item  "><a class="sidebar-link" href="Affich-article.php">Afficher les articles </a></li>
							<li class="sidebar-item active "><a class="sidebar-link" href="triarticle.php"> Trier les articles</a></li>
							<li class="sidebar-item  "><a class="sidebar-link" href="chercherlivreur.php"> Chercher un article </a></li>
                           
						</ul>
					</li>


					

				
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          <i class="hamburger align-self-center"></i>
        </a>

				

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
								
						
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
								
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											
										</div>
									</a>
									
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											
											
										</div>
									</a>
									
								</div>
								<div class="dropdown-menu-footer">
									
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                <img src="<?php echo$_SESSION['i'];?>" class="avatar img-fluid rounded mr-1" alt="Charles Hall" /> <span class="text-dark"><?php echo$_SESSION['e'];?></span>
              </a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="deconnexion.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
	

            <main class="content">
                <div class="container-fluid p-0">
				<button id="export-button">Export to PDF</button>
                    <h1 class="h3 mb-3">Liste des articles par ID </h1>

                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <div class="card">
                                
            

                                  <?PHP
                             if(!$con)
                             {
                               die("probleme de connexion".mysqli_connect_error());
                
                                     }
                                 $sql="SELECT * FROM livreur ORDER BY ID";
                                  $result=mysqli_query($con,$sql);
                                 if(mysqli_num_rows($result)>0)
                                  {
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        
                              echo "ID : " .$row["ID"].   "<br/>Type article : ".$row["Nom"]. "<br/>Nom et Prenom : ".$row["Prenom"]. "<br/>Date : ".$row["Daten"]. "<br/>CIN : ".$row["CIN"].  "<br/>Description : ".$row["Adresse"].  "<br/>Email : ".$row["Email"]. "<br/><br/><br/><br/><br/>";
                                      
                            
                        }
                                  }
                               else {echo "0 resultats";}
                                 mysqli_close($con);
                             ?>
            
         
                            </div>
                        </div>
                        </div>
                        </div>
                        

                        
                        

            </main>




    
            
    
<script>
	document.getElementById("export-button").addEventListener("click", function() {
    // make an AJAX request to the PHP file that generates the PDF
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "generate-pdf.php");
    xhr.setRequestHeader("Content-Type", "application/pdf");
    xhr.responseType = "blob";
    xhr.onload = function() {
        if (xhr.status === 200) {
            // create a URL for the PDF blob
            var url = URL.createObjectURL(xhr.response);
            // create a link to the URL and click it to download the PDF
            var a = document.createElement("a");
            a.href = url;
            a.download = "Listedesarticles.pdf";
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }
    };
    xhr.send();
});
</script>
    <script src="js/vendor.js"></script>
    <script src="js/app.js"></script>

</body>

</html>