<?php
    require_once '../Controller/articleC.php';
    session_start();
    // On teste si la variable de session existe et contient une valeur
    if(empty($_SESSION['e']))
    {
        // Si inexistante ou nulle, on redirige vers le formulaire de login
        echo "<script type='text/javascript'>document.location.replace('login.php');</script>";
       }
	$livreurC =  new livreurC();
	$listeliv = $livreurC->afficherlivreur();
	
    
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
              <i class="align-middle" data-feather="truck"></i> <span class="align-middle">  Gestion des livraisons  </span>
            </a>
						<ul id="ui" class="sidebar-dropdown list-unstyled collapse show" data-parent="#sidebar">
						<li class="sidebar-item "><a class="sidebar-link" href=" ajout-livraison.php"> ajouter un article </a></li>
							<li class="sidebar-item "><a class="sidebar-link" href="afficherarticle.php"> afficher les articles </a></li>
							<li class="sidebar-item active  "><a class="sidebar-link" href="ajouterarticle.php"> Ajouter un article </a></li>
							<li class="sidebar-item  "><a class="sidebar-link" href="Affich-article.php">Afficher les articles </a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="triarticle.php"> Trier les articles </a></li>
							<li class="sidebar-item  "><a class="sidebar-link" href=".php"> Chercher un articles </a></li>

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

                    <h1 class="h3 mb-3">Ajouter un article </h1>

                    <div class="row">
                        
                                
                           <div class="col-12 col-xl-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Horizontal form</h5>
									<h6 class="card-subtitle text-muted">Horizontal Bootstrap layout.</h6>
								</div>
								<div class="card-body">
									<form  method="POST" action="ajout-article.php"   id="ajouterlivreur" name="ajouterlivreur">
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right">ID article</label>
											<div class="col-sm-10">
												<input type="text" id="ID" name="ID" class="form-control" placeholder="text">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right">type de l'article</label>
											<div class="col-sm-10">
												<input type="text" id="Nom" name="Nom" class="form-control" placeholder="text">
                                                
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right">Nom et prenom</label>
											<div class="col-sm-10">
												<input type="text" id="Prenom" name="Prenom"class="form-control" placeholder="text">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right">Date</label>
											<div class="col-sm-10">
												<input class="form-control" id="Daten" name="Daten" placeholder="text" type="date" rows="3"></input>
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right">CIN</label>
											<div class="col-sm-10">
												<input class="form-control" id="CIN" name="CIN" placeholder="text" rows="3"></input>
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right">Description</label>
											<div class="col-sm-10">
												<textarea class="form-control" id="Adresse" name="Adresse" placeholder="Textarea" rows="3"></textarea>
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right">Email</label>
											<div class="col-sm-10">
												<input class="form-control" id="Email" name="Email" placeholder="text" rows="3"></input>
											</div>
										</div>


										<div class="form-group row">
											<div class="col-sm-10 ml-sm-auto">
												<button type="submit" class="btn btn-primary">Ajouter</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>

      
    </main>

    <script src="js/vendor.js"></script>
    <script src="js/app.js"></script>

</body>

</html>