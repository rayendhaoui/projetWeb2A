<?php
     include '../Controller/articleC.php';
     include '../Controller/BlogController.php';
     include '../Controller/CommentController.php';
     session_start();
     // On teste si la variable de session existe et contient une valeur
     if(empty($_SESSION['e']))
     {
         // Si inexistante ou nulle, on redirige vers le formulaire de login
         echo "<script type='text/javascript'>document.location.replace('login.php');</script>";
        }
        $blogController = new BlogController();
        //$blogController = new BlogController();

// Fetch blog data
//$blogs = $blogController->listBlogPosts();
$commentController = new CommentController();
	
//$commentController = new CommentController();

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page number
$perPage = 1; // Number of blog posts per page

// Fetch blog data with pagination
//$blogs = $blogController->listBlogPostss($page, $perPage);

$blogs = $blogController->listAcceptedBlogPosts($page, $perPage);
function calculate_read_time($content) {
    // Average reading speed in words per minute
    $words_per_minute = 200;
    // Calculate the number of words in the content
    $word_count = str_word_count(strip_tags($content));
    // Calculate the read time in minutes
    $read_time = ceil($word_count / $words_per_minute);
    return $read_time;
}
        // Fetch blog posts from the database
        // $blogs = $blogController->listBlogPosts();
        // if(isset($_GET['search'])) {
        //     // Fetch blog posts matching search query
        //     $blogs = $blogController->searchBlogPosts($_GET['search']);
        // } else {
        //     // Fetch all blog posts if no search query
        //     $blogs = $blogController->listBlogPosts();
        // }
 
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
<style>
  .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            text-decoration: none;
            color: #17a2b8;
            margin-right: 5px;
            padding: 8px 12px;
            border-radius: 5px;
            background-color: #f0f0f0;
        }

        .pagination a:hover {
            background-color: #e0e0e0;
        }

        .pagination .active {
            background-color: #6c757d;
            color: white;
        }
  </style>
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
    <div class="row">
    <?php
        // Check if there are any blog posts
        if ($blogs) {
            // Loop through each blog post and generate HTML dynamically
            foreach ($blogs as $blog) {
                // Construct the data URI for the image
                $image_data = base64_encode($blog->getimage_url());
                // $image_data = base64_encode($blog['image_url']); // Convert the binary image data to base64
                $image_mime = 'image/jpeg'; // Change this to the appropriate MIME type if needed
                $image_src = "data:{$image_mime};base64,{$image_data}";

                // Fetch the comments for this blog post
                $comments = $commentController->listCommentsByBlogId($blog->getid_blog());
                // Count the number of comments
                $num_comments = count($comments);

                ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="blog_detail.php?id=<?php echo $blog->getid_blog(); ?>"><img class="card-img-top" src="<?php echo $image_src; ?>" alt=""></a>
                        <div class="card-body">
                            <h3 class="blog-title">
                            <h2 class="blog-title"> Title: <?php echo $blog->gettitle(); ?></h2>
                            </h3>
                            <p class="card-text">Content: <br><?php echo $blog->getcontent(); ?></p>
                            <div class="author-info">
                                <h2 class="text-muted">
                                    <i class="bi bi-person user-icon"></i>
                                    Author:<?php echo $blog->getauthor() ; ?> 
                                </h2>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Published: <?php echo date('M j, Y', strtotime($blog->getcreated_at())); ?></small><br>
                            <small class="text-muted">Estimated read time: <?php echo calculate_read_time($blog->getcontent()); ?> minutes</small><br>
                            <small class="text-muted">Comments: <?php echo $num_comments; ?></small>
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
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <ul class="pagination justify-content-center">
                <?php if ($page > 1) : ?>
                    <a href="?page=<?php echo $page - 1; ?>">Previous</a>
                <?php endif; ?>
                <?php for ($i = 1; $i <= ceil($blogController->countBlogPosts(isset($_GET['search']) ? $_GET['search'] : null) / $perPage); $i++) : ?>
                    <?php
                    // Preserve existing query parameters while adding the 'page' parameter to the pagination links
                    $queryParams = $_GET;
                    $queryParams['page'] = $i;
                    $queryString = http_build_query($queryParams);
                    ?>
                    <a class="<?php echo $i == $page ? 'active' : ''; ?>" href="?<?php echo $queryString; ?>"><?php echo $i; ?></a>
                <?php endfor; ?>
                <?php if ($page < ceil($blogController->countBlogPosts(isset($_GET['search']) ? $_GET['search'] : null) / $perPage)) : ?>
                    <a href="?page=<?php echo $page + 1; ?>">Next</a>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>




    
  
                        
</main>


</div>
</div>

<script src="js/vendor.js"></script>
<script src="js/app.js"></script>

</body>

</html>