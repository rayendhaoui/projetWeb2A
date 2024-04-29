<?php
     include '../Controller/articleC.php';
     include '../Controller/BlogController.php';
     session_start();
     // On teste si la variable de session existe et contient une valeur
     if(empty($_SESSION['e']))
     {
         // Si inexistante ou nulle, on redirige vers le formulaire de login
         echo "<script type='text/javascript'>document.location.replace('login.php');</script>";
        }
        $blogController = new BlogController();

        // Fetch blog posts from the database
        // $blogs = $blogController->listBlogPosts();
        if(isset($_GET['search'])) {
            // Fetch blog posts matching search query
            $blogs = $blogController->searchBlogPosts($_GET['search']);
        } else {
            // Fetch all blog posts if no search query
            $blogs = $blogController->listBlogPosts();
        }
 
 /*$descprod1="alimentation";
 $descprod2="hygiene";
 $descprod3="accessoire";

 $ndescprod1=$produitC->calculerProduit($descprod1);   
 $ndescprod2=$produitC->calculerProduit($descprod2);
 $ndescprod3=$produitC->calculerProduit($descprod3);*/

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
           
            <li class="sidebar-item "><a class="sidebar-link" href=" ajout-livraison.php"> ajouter un article </a></li>
							<li class="sidebar-item "><a class="sidebar-link" href="afficherarticle.php"> afficher les articles </a></li>
							<li class="sidebar-item  "><a class="sidebar-link" href="ajouterarticle.php"> Ajouter article </a></li>
							<li class="sidebar-item active "><a class="sidebar-link" href="Affich-article.php">Afficher les articles </a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="triarticle.php"> Trier les articles </a></li>
              <li class="sidebar-item  "><a class="sidebar-link" href=""> Chercher un article </a></li>
							
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
                <div class="text-center">
                         
                <div class="container">
        <h1>Create Blog Post</h1>
        <form id="blogPostForm" action="process_blog_post.php" method="post" enctype="multipart/form-data" novalidate>
            <label for="title">Title       :   </label>
            <input type="text" id="title" name="title" required>
            <div id="titleError" class="error"></div>
            <label for="author">Author     :   </label>
            <input type="text" id="author" name="author" required>
            <div id="authorError" class="error"></div>
            <label for="date">Date         :   </label>
            <input type="text" id="date" name="date" placeholder="YYYY-MM-DD" required>
            <div id="dateError" class="error"></div>
            <label for="content">Content   :  </label>
            <textarea id="content" name="content" required></textarea>
            <div id="contentError" class="error"></div>
            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
            <div id="imageError" class="error"></div>
            <input type="hidden" name="user_id" value="<?php echo isset($_SESSION['i']) ? $_SESSION['i'] : ''; ?>">
            <input type="submit" value="Create Post">
        </form>
    </div>
</div>

<script>
    document.getElementById('blogPostForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Validate form fields
        var title = document.getElementById('title').value.trim();
        var author = document.getElementById('author').value.trim();
        var date = document.getElementById('date').value.trim();
        var image = document.getElementById('image').value.trim();
        var content = document.getElementById('content').value.trim();

        var isValid = true;

        // Title validation
        if (title === "") {
            alert("Please enter a title.");
            isValid = false;
        }

        // Author validation
        if (author === "") {
            alert("Please enter an author.");
            isValid = false;
        }

        // Date validation
        if (date === "") {
            alert("Please enter a date in the format YYYY-MM-DD.");
            isValid = false;
        }

        // Image validation
        if (image === "") {
            alert("Please upload an image.");
            isValid = false;
        }

        // Content validation
        if (content === "") {
            alert("Please enter content for the post.");
            isValid = false;
        }

        // If form is valid, submit it
        if (isValid) {
            this.submit();
        }
    });
</script>   





    
  
                        
</main>


</div>
</div>

<script src="js/vendor.js"></script>
<script src="js/app.js"></script>

</body>

</html>