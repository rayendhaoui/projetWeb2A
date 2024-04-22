<?php
    require_once '../Controller/articleeC.php';
    require_once '../Entities/articlee.php';


session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['e']))
{
	// Si inexistante ou nulle, on redirige vers le formulaire de login
	echo "<script type='text/javascript'>document.location.replace('login.php');</script>";
   }
   $livraisonC=new livraisonC();
   $list=$livraisonC->afficherlivraisons();
    if (isset($_GET['idliv'])){
       
         $result=$livraisonC-> recupererlivraison($_GET['idliv']);
		
       foreach($result as $row)
	   {
		   $idliv=$row['idliv'];
		   $idcmd=$row['idcmd'];
		   $etat=$row['etat'];
		   $adresse=$row['adresse'];
		   $date=$row['date'];
		  
	
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

	<title> EcoTrust </title>

	<link href="css/app.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
	<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.php">
          <span class="align-middle">EcoTrust Backoffice</span>
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
						<li class="sidebar-item  "><a class="sidebar-link" href="ajout-livraison.php">  Ajouter livraison </a></li>
						<li class="sidebar-item "><a class="sidebar-link" href="afficherarticle.php"> afficher livraisons </a></li>
						<li class="sidebar-item active "><a class="sidebar-link" href="triarticle.php"> Modifier livraison </a></li>
							<li class="sidebar-item  "><a class="sidebar-link" href="ajouterarticle.php"> Ajouter livreur </a></li>
							<li class="sidebar-item  "><a class="sidebar-link" href="Affich-article.php">Afficher livreurs </a></li>
							<li class="sidebar-item  "><a class="sidebar-link" href="triarticle.php"> Trier les livreurs </a></li>
							<li class="sidebar-item  "><a class="sidebar-link" href=""> Chercher livraisons </a></li>
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
	
			<form method="POST">
				<div class="container-fluid p-0">
				<div class="mb-3">
									
									</div>
					<h1 class="h3 mb-3">Modifier une livraison </h1>
                    
					<div class="row">
						<div class="col-12 col-xl-6">
							<div class="card">
								
								<div class="card-body">
									<form>
										<div class="form-group">
											<label class="form-label"> Id article</label>
											<input type="text"  name="idliv" id="idliv" class="form-control"  value="<?PHP echo $idliv ?>" disabled  >
										</div>
										<div class="form-group">
											<label class="form-label w-100"> type article </label>
											<input type="text" class="form-control" id="idcmd" value="<?PHP echo $idcmd ?>" name="idcmd">
											
										</div>
										<div class="form-group">
											<label class="form-label w-100"> Etat de l'article </label>
											<input type="text" class="form-control" id="etat" value="<?PHP echo $etat ?>" name="etat">
											
										</div>
										<div class="form-group">
											<label class="form-label">Adresse </label>
											<input type="text" class="form-control"  id="adresse"value="<?PHP echo $adresse ?>" name="adresse">
										</div>
                                        <div class="form-group">
											<label class="form-label"> Date  </label>
											<input type="date" class="form-control" id="date" value="<?PHP echo $date ?>" name="date">
										</div>
										
					
										<div class="mb-3">
										<input type="submit"  class="btn btn-outline-secondary" name="modifier" value="modifier" > 
										<input type="hidden"   name="idlivn" value="<?PHP echo $_GET['idliv'];?>">
										</div>

									
										<?php
									}}
	if(isset($_POST['modifier']) && !empty($_POST["idlivn"]) 
	&&!empty($_POST["idcmd"]) 
	&&!empty($_POST["etat"]) 
	&&!empty($_POST["adresse"])
	&&!empty($_POST["date"])
	){
		$livraison = new livraison($_POST['idlivn'], $_POST['idcmd'], $_POST['etat'], $_POST['adresse'], $_POST['date']);
		$livraisonC->modifierlivraison($livraison,$_POST['idlivn']);
		
		

		?> 
		<script>
				document.location.replace("afficherlivraison.php") ;
			</script>
	<?php		
	}
	?>   
								</div>
							</div>
						</div>
						

				</div>
			</main>

			

	<script src="js/vendor.js"></script>
	<script src="js/app.js"></script>

</body>

</html>