<?php
    require_once '../Controller/articleC.php';
    require_once '../Entities/article.php';


session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['e']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    echo "<script type='text/javascript'>document.location.replace('login.php');</script>";
   }
   $livreurC=new livreurC();
   $list=$livreurC->afficherlivreur();
    if (isset($_GET['ID'])){
       
         $result=$livreurC-> recupererlivreur($_GET['ID']);
		
       foreach($result as $row)
	   {
		   $ID=$row['ID'];
		   $Nom=$row['Nom'];
		   $Prenom=$row['Prenom'];
		   $Daten=$row['Daten'];
		   $CIN=$row['CIN'];
		   $Adresse=$row['Adresse'];
		   $Email=$row['Email'];
		
	
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
              <i class="align-middle" data-feather="truck"></i> <span class="align-middle">  Gestion des articles  </span>
            </a>
						<ul id="ui" class="sidebar-dropdown list-unstyled collapse show" data-parent="#sidebar">

							<li class="sidebar-item  "><a class="sidebar-link" href="ajouterarticle.php"> Ajouter un article </a></li>
							<li class="sidebar-item  "><a class="sidebar-link" href="Affich-article.php">Afficher les articles </a></li>
							<li class="sidebar-item active "><a class="sidebar-link" href=""> modifier un article </a></li>
							<li class="sidebar-item "><a class="sidebar-link" href="triarticle.php"> Trier les article </a></li>
							<li class="sidebar-item  "><a class="sidebar-link" href=""> Chercher un article </a></li>
						</ul>
					</li>


					

				
			</div>
		</nav>
	
			<main class="content">
		
			<form method="POST">
				<div class="container-fluid p-0">
				<div class="mb-3">
									
									</div>
					<h1 class="h3 mb-3">Modifier un article </h1>
                    
					<div class="row">
						<div class="col-12 col-xl-6">
							<div class="card">
								
								<div class="card-body">
									<form>
										<div class="form-group">
											<label class="form-label"> ID article</label>
											<input type="text"  name="ID" id="ID" class="form-control"  value="<?PHP echo $ID ?>" disabled  >
										</div>
										<div class="form-group">
											<label class="form-label w-100"> Type article </label>
											<input type="text" class="form-control" id="Nom" value="<?PHP echo $Nom ?>" name="Nom">
											
										</div>
										<div class="form-group">
											<label class="form-label">Nom et Prenom </label>
											<input type="text" class="form-control"  id="Prenom"value="<?PHP echo $Prenom ?>" name="Prenom">
										</div>
                                        <div class="form-group">
											<label class="form-label"> Date   </label>
											<input type="date" class="form-control" id="Daten" value="<?PHP echo $Daten ?>" name="Daten">
										</div>
										<div class="form-group">
											<label class="form-label"> CIN  </label>
											<input type="text" class="form-control" id="CIN" value="<?PHP echo $CIN ?>" name="CIN">
										</div>
											<div class="form-group col-md-4">
											<label for="inputState">Description </label>
											<input type="text" class="form-control" id="Adresse" value="<?PHP echo $Adresse ?>" name="Adresse">
										</div>
											<div class="form-group col-md-4">
											<label for="inputState">Email </label>
											<input type="text" class="form-control" id="Email" value="<?PHP echo $Email ?>" name="Email">
										</div>
					
										<div class="mb-3">
										<input type="submit"  class="btn btn-outline-secondary" name="modifier" value="modifier" > 
										<input type="hidden"   name="id_ini" value="<?PHP echo $_GET['ID'];?>">
										</div>

									
										<?php
									}}
	if(isset($_POST['modifier']) && !empty($_POST["Nom"]) &&
	!empty($_POST["Prenom"]) 
	&&!empty($_POST["Daten"])
	&&!empty($_POST["CIN"])
	&&!empty($_POST["Adresse"])
	&&!empty($_POST["Email"])){
		$livreur = new livreur($_POST['id_ini'], $_POST['Nom'], $_POST['Prenom'], $_POST['Daten'], $_POST['CIN'], $_POST['Adresse'], $_POST['Email']);
		$livreurC->modifierlivreur($livreur,$_POST['id_ini']);
		
		

		?> 
		<script>
				document.location.replace("affich-livreur.php") ;
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