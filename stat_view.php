<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Mentor Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Web UI Kit &amp; Dashboard Template based on Bootstrap">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, web ui kit, dashboard template, admin template">

	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>Tables | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Updated: Mar 19 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    .body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .blog-card {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 20px;
        }

        .blog-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .statistics-container {
            margin: 20px;
            padding: 20px;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pie-chart {
            width: 60%; /* Adjust the width as needed */
            height: auto;
        }
        .blog-details {
            padding: 20px;
        }

        .blog-title {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333; /* Applied color */
        }

        .blog-meta {
            color: #777;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .blog-content {
            margin-top: 10px;
            color: #555; /* Applied color */
        }
        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            text-decoration: none;
            color: #007bff;
            margin-right: 5px;
            padding: 8px 12px;
            border-radius: 5px;
            background-color: #f0f0f0;
        }

        .pagination a:hover {
            background-color: #e0e0e0;
        }

        .pagination .active {
            background-color: green;
            color: white;
        }
        .read-more-btn {
            display: block;
            width: 100%;
            text-align: center;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .read-more-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <!-- Include Sidebar Menu -->
    
  </header>
    <!-- Main Content -->
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
    <div class="container-scroller">
        <div class="main-panel">
            <div class="content-wrapper">
                <!-- Statistics Container -->
                <div class="statistics-container">
                    <h2>Blog Statistics by Author</h2>
                    <!-- Display Pie Chart -->
                    <div class="pie-chart" id="pieChart"></div>
                </div>
            </div>
        </div>
    

    <!-- Load necessary scripts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // Fetch data from PHP controller and create pie chart
        <?php
            // Include the necessary files and initialize the controller
            require_once 'C:\xampp\htdocs\ecotrust11\ecotrust11\ecotrust\Controller\BlogController.php';
            $blogController = new BlogController();

            // Call the listPaiements_stat() function to get paiement statistics
            $blogs = $blogController->listBlogPostsss();

            // Initialize an array to store card types and their counts
            $authors = [];
            foreach ($blogs as $blog) {
                $author = $blog->getauthor();
                if (!isset($authors[$author])) {
                    $authors[$author] = 1;
                } else {
                    $authors[$author]++;
                }
            }

            // Convert data to JavaScript array format
            $labels = [];
            $data = [];
            foreach ($authors as $author => $count) {
                $labels[] = $author;
                $data[] = $count;
            }
        ?>

        // Create pie chart using ApexCharts
        var options = {
            chart: {
                type: 'pie',
            },
            labels: <?php echo json_encode($labels); ?>,
            series: <?php echo json_encode($data); ?>,
            responsive: [{
                breakpoint: 400,
                options: {
                    chart: {
                        width: 170
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        }

        var chart = new ApexCharts(document.querySelector("#pieChart"), options);

        chart.render();
    </script>
</body>
</html>
