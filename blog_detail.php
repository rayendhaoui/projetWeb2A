<?php
	session_start();
include("../Controller/BlogController.php");
include("../Controller/CommentController.php");
include("../Controller/RatingController.php");
// Create an instance of BlogController
$blogController = new BlogController();

// Fetch blog data
$blogs = $blogController->listBlogPosts();
$commentController = new CommentController();
$ratingController = new RatingController();
$commentController = new CommentController();

$user_id = 1; // Assuming this is how you're defining $user_id

$post_id = $_GET['id'] ?? 0; // Assuming the ID is passed in the URL
$post = $blogController->getBlogPost($post_id);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the comment form submission
    $article_id = $_POST['article_id'] ?? 0;
    $commenter_name = $_POST['commenter_name'] ?? '';
    $comment_text = $_POST['comment'] ?? '';

    // Add the comment
    $commentController->addComment($article_id, $commenter_name, $comment_text);

    // Redirect back to the same page after adding the comment
    header("Location: blog_detail.php?id=$post_id");
    exit(); // Stop further execution
}
    
// if(isset($_POST['submit']))
// {
//     $listeVoyage=$voyageC->afficherVoyage();
// }

?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Get the initial counts and user's rating when the page loads
    var user_id = <?php echo $user_id; ?>;
    $.ajax({
        url: 'get_initial_counts.php',
        type: 'post',
        data: { postid: <?php echo $post_id; ?> }, // Pass user_id variable directly
        dataType: 'json',
        success: function(data) {
            // Update the like count on the page
            $("#likeCount").text(data.likes);
            // Update the dislike count on the page
            $("#dislikeCount").text(data.dislikes);

            // Check if the user has already rated the post
            if (data.userRating === 'like') {
                // User has already liked the post
                $('.like-btn').addClass('rated');
            } else if (data.userRating === 'dislike') {
                // User has already disliked the post
                $('.dislike-btn').addClass('rated');
            }
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error(xhr.responseText);
        }
    });

    // Add event listener for like button click
    $('.like-btn').click(function() {
        var postid = $(this).data('postid');
        $.ajax({
            url: 'toggle_rating.php',
            type: 'post',
            data: { postid: postid, type: 'like'  },
            dataType: 'json',
            success: function(data) {
                // Update the like count on the page
                $("#likeCount").text(data.likes);
                // Mark the like button as rated
                $('.like-btn').addClass('rated');
                // Remove rated class from dislike button
                $('.dislike-btn').removeClass('rated');
                window.location.reload();
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    });

    // Add event listener for dislike button click
    $('.dislike-btn').click(function() {
        var postid = $(this).data('postid');
        $.ajax({
            url: 'toggle_rating.php',
            type: 'post',
            data: { postid: postid, type: 'dislike' },
            dataType: 'json',
            success: function(data) {
                // Update the dislike count on the page
                $("#dislikeCount").text(data.dislikes);
                // Mark the dislike button as rated
                $('.dislike-btn').addClass('rated');
                // Remove rated class from like button
                $('.like-btn').removeClass('rated');
                window.location.reload();
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    });
});


</script>
  </style>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Web UI Kit &amp; Dashboard Template based on Bootstrap">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, web ui kit, dashboard template, admin template">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.0/font/bootstrap-icons.css" rel="stylesheet">
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
    
    <?php
    $username="yassin";
    // Check if the post exists
    if ($post) {
        ?>
        <?php
        if ($post['author']==$username) {
            ?>
            <form action="edit_blog.php" method="get">
            <?php if(isset($post['id_blog'])): ?>
            <input type="hidden" name="id_blog" value="<?php echo $post['id_blog']; ?>">
            <?php endif; ?>
            <button type="submit" class="edit-btn">Edit</button>
            </form>
        <?php } ?>
        <h1><?php echo $post['title']; ?></h1>
        <p class="blog-meta">Published on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></p>
        <div class="content">
            <?php
            // Convert the binary image data to base64 for displaying
            $image_data = base64_encode($post['image_url']);
            $image_mime = 'image/jpeg'; // Assuming the image MIME type is JPEG
            $image_src = "data:{$image_mime};base64,{$image_data}";
            ?>
            <img src="<?php echo $image_src; ?>" alt="Blog Image">
            <p class="blog-content">Content: <br><?php echo $post['content']; ?></p>
        </div>
        <div class="comments">
            <h2>Comments</h2>
            
            <?php
            // Load comments related to this blog post
            $user_id=2;
            $comments = $commentController->listCommentsByBlogId($post_id);
            $yours=$commentController->listCommentsByBlogIdu($user_id);
            if ($comments) {
                foreach ($comments as $comment) {
                    foreach ($yours as $your) {
                        ?>
                    
                    <div class="comment">
                        <p><strong> your comment:<?php echo $your['name']; ?>:</strong> <?php echo $your['content']; ?></p>
                    </div>
                    <?php
                    }
                    ?>
                    
                    <div class="comment">
                        <p><strong><?php echo $comment['name']; ?>:</strong> <?php echo $comment['content']; ?></p>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No comments yet.</p>";
            }
            ?>
            <div class="rating">
        <!-- Like button -->
        <!-- Like button -->
                <button class="like-btn" data-postid="<?php echo $post_id; ?>"><i class="bi bi-hand-thumbs-up"></i></button>
                <!-- Display like count -->
                <span id="likeCount"><?php echo $ratingController->getLikesCount($post_id); ?></span>

                <!-- Dislike button -->
                <button class="dislike-btn" data-postid="<?php echo $post_id; ?>"><i class="bi bi-hand-thumbs-down"></i></button>
                <!-- Display dislike count -->
                <span id="dislikeCount"><?php echo $ratingController->getDislikesCount($post_id); ?></span>

            </div>



        </div>
        <div class="comment-form">
            <h2>Add Comment</h2>
            <form action="" method="post"> <!-- Updated action to empty -->
                <input type="hidden" name="article_id" value="<?php echo $post_id; ?>">
                <input type="text" name="commenter_name" placeholder="Your Name" required><br>
                <textarea name="comment" placeholder="Your Comment" required></textarea><br>
                <input type="submit" value="Submit Comment">
            </form>
        </div>
        <form action="blog_pdf.php" method="get">
    <input type="hidden" name="id" value="<?php echo $post_id; ?>">
    <input type="hidden" name="title" value="<?php echo urlencode($post['title']); ?>">
    <input type="hidden" name="created_at" value="<?php echo urlencode($post['created_at']); ?>">
    <input type="hidden" name="author" value="<?php echo urlencode($post['author']); ?>">
    <input type="hidden" name="content" value="<?php echo urlencode($post['content']); ?>">
    
    <input type="submit" value="Generate PDF">
</form>
        <?php
    } else {
        // No post found
        echo "<p>No post found.</p>";
    }
    ?>
    </div>
</div>




    
  
                        
</main>


</div>
</div>

<script src="js/vendor.js"></script>
<script src="js/app.js"></script>

</body>

</html>