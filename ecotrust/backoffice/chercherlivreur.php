<?PHP
include "../Controller/articleC.php";
session_start();
     // On teste si la variable de session existe et contient une valeur
     if(empty($_SESSION['e']))
     {
         // Si inexistante ou nulle, on redirige vers le formulaire de login
         echo "<script type='text/javascript'>document.location.replace('login.php');</script>";
        }
if (isset($_POST["Search"]))
{ 
  if($_POST["choix"]=='id')
{$avisC=new livreurC();
$listeUsers=$avisC->recupererid($_POST["Search"]);
}
if($_POST["choix"]=='nom')
{$AvisC=new livreurC();
$listeUsers=$AvisC->recherchernom($_POST["Search"]);
}
if($_POST["choix"]=='prenom')
{$AvisC=new livreurC();
$listeUsers=$AvisC->rechercherprenom($_POST["Search"]);
}


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



	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>EcoTrust</title>

	<link href="css/app.css" rel="stylesheet">
</head>
<style>
    /* Add your CSS styles here */
    #map {
      height: 400px;
      width: 100%;
    }
    /* Other styles... */
  </style>
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
              <i class="align-middle" data-feather="truck"></i> <span class="align-middle">  Gestion des articles  </span>
            </a>
						<ul id="ui" class="sidebar-dropdown list-unstyled collapse show" data-parent="#sidebar">
            <li class="sidebar-item active "><a class="sidebar-link" href="ajout-livraison.php">  Ajouter un article </a></li>
							<li class="sidebar-item  "><a class="sidebar-link" href="afficherarticle.php"> afficher les articles</a></li>
							<li class="sidebar-item  "><a class="sidebar-link" href="ajouterarticle.php"> Ajouter article </a></li>
							<li class="sidebar-item  "><a class="sidebar-link" href="Affich-article.php">Afficher les articles </a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="triarticle.php"> Trier les articles </a></li>
                            <li class="sidebar-item  "><a class="sidebar-link" href=""> Chercher un article </a></li>

						</ul>

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
				<a href="affich-livreur.php" >Retour à la liste</a></button>
				<div class="container-fluid p-0">
				<div class="card-body text-center">
									<div class="mb-3">		
	
</div>
</div>
</div>
					<h1 class="h3 mb-3"> Gestion des livreurs  </h1>
                     
					<div class="row">
						<div class="col-12 col-xl-6">
							<div class="card">
								<table class="table">
									<thead>
										<tr>
                                       
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Daten</th>
                <th>CIN</th>
                <th>Adresse</th>
                <th>Email</th>
                <th>Supprimer</th>
                <th>Modifier </th>
                <th>Trier </th>
										
										</tr>
									</thead>
									<tbody>
									<?PHP
foreach($listeUsers as$livreurC){
?>
<tr>
<td><?PHP echo $livreurC['ID']; ?></td>
                    <td><?PHP echo $livreurC['Nom']; ?></td>
                    <td><?PHP echo $livreurC['Prenom']; ?></td>
                    <td><?PHP echo $livreurC['Daten']; ?></td>
                    <td><?PHP echo $livreurC['CIN']; ?></td>
                    <td><?PHP echo $livreurC['Adresse']; ?></td>
                    <td><?PHP echo $livreurC['Email']; ?></td>
                    
                    <td>
                        <form method="POST" action="supprimerarticle.php">
                        <input type="submit" name="supprimer" value="supprimer">
                        <input type="hidden" value=<?PHP echo $livreurC['ID']; ?> name="ID">
                        </form>
                    </td>
                    <td>
                        <a href="modifierarticle.php?ID=<?PHP echo $livreurC['ID']; ?>"> Modifier </a>
                    </td>
                    <td>
                        <a href="trilivreur.php?id=<?PHP echo $livreurC['ID']; ?>"> trier </a>
                    </td>

</tr>

<?PHP
}}
                    ?>
							</tbody>
							</table>
</div>
						</div>

						</div>
						</div>
					
			</main>
			

	<script src="js/vendor.js"></script>
	<script src="js/app.js"></script>

</body>

</html>

