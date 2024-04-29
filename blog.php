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
           
            <li class="sidebar-item "><a class="sidebar-link" href="client_add_post.php"> ajouter un article par client</a></li>
							<li class="sidebar-item "><a class="sidebar-link" href="client_view.php"> afficher les articles client </a></li>
							<li class="sidebar-item  "><a class="sidebar-link" href="ajouterarticle.php"> Ajouter article </a></li>
							<li class="sidebar-item active "><a class="sidebar-link" href="blog.php">Afficher les articles admin </a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="stat_view.php"> stats </a></li>
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
			
<form action="" method="get">
        <input type="text" placeholder="Search blogs..." name="search">
        <button type="submit">Search</button>
    </form>
</table>
                <div class="container-fluid p-0">
                <div class="text-center">
                         
                    <h1 class="h3 mb-3">Afficher liste des articles </h1>

                    <div class="row">
                        <div class="col-12 col-xl-15">
                            <div class="card">
                                
                            <div class="container">
            <?php
            if ($blogs) {
            // Loop through each blog post and generate HTML dynamically
            foreach ($blogs as $blog) {
                $image_data = base64_encode($blog['image_url']); // Convert the binary image data to base64
            $image_mime = 'image/jpeg'; // Change this to the appropriate MIME type if needed
            $image_src = "data:{$image_mime};base64,{$image_data}";
                ?>
                <div class="blog-card">
                <a href="blog_detail_back.php?id=<?php echo $blog['id_blog']; ?>">
        <img class="blog-image" src="<?php echo $image_src; ?>" alt="Blog Image">
            </a>                    
                        <div class="blog-details">
                        <h2 class="blog-title"><?php echo $blog['title']; ?></h2>
                        <p class="blog-meta">Published on <?php echo $blog['created_at']; ?> by <?php echo $blog['author']; ?></p>
                        <div class="blog-content">
                            <p><?php echo $blog['content']; ?></p>
                        </div>
                        <div class="action-buttons">
                            <form action="edit_blog.php" method="get">
                                <input type="hidden" name="id_blog" value="<?php echo $blog['id_blog']; ?>">
                                <button type="submit" class="edit-btn">Edit</button>
                            </form>
                            <form action="delete_blog.php" method="get">
                                <input type="hidden" name="id_blog" value="<?php echo $blog['id_blog']; ?>">
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>

                            </div>
                    </div>
                </div>
                <?php
            }
        } else {
            // No blog posts found
            echo "<p>No blog posts found.</p>";
        }
        ?>
    </div>
</div>

<script>
    function deleteBlog(blogId) {
        // Confirm deletion
        if (confirm("Are you sure you want to delete this blog post?")) {
            // Log the deletion action
            console.log(`Deleting blog post with ID ${blogId}`);
        } else {
            // If user cancels deletion, do nothing
            return;
        }
    }
</script>     





    
  
                        
</main>


</div>
</div>

<script src="js/vendor.js"></script>
<script src="js/app.js"></script>

</body>

</html>