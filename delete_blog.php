<?php
// Include the necessary files
include 'C:\xampp\htdocs\ecotrust11\ecotrust11\ecotrust\Controller\BlogController.php';


// Create an instance of BlogController
$blogController = new BlogController();

// Check if the required parameter is provided
if(isset($_GET["id_blog"])) {
    // Get the value from the URL parameter
    $blogId = $_GET["id_blog"];
    
    // Delete the blog post
    $result = $blogController->deleteBlogPost($blogId);
    
    // Check if the deletion was successful
    if($result) {
        // Redirect to the desired page
        header("Location: back_blog.php");
        exit();
    } else {
        // Handle the case where deletion failed
        // You can redirect to an error page or display an error message
        echo "Error: Failed to delete blog post.";
    }
} else {
    // Handle the case where parameter is missing
    // You can redirect to an error page or display an error message
    echo "Error: Missing blog ID parameter.";
}
?>
