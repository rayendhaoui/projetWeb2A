<?php
// update_blog.php
// Include the BlogController
require_once 'C:\xampp\htdocs\GestionResevation\Dashbord\Controller\BlogController.php';

// Check if the request method is POST and if the 'id_blog' parameter is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_blog"])) {
    // Get the blog post ID from the POST parameters
    $blogId = $_POST["id_blog"];

    // Get updated blog post details from the POST parameters
    $title = $_POST["title"];
    $author = $_POST["author"];
    $content = $_POST["content"];
    $created_at = $_POST["date"];
    // Handle image upload
    $image_data = ''; // Default value for image data
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Process image upload
        $image_data = file_get_contents($_FILES['image']['tmp_name']);
        if (!$image_data) {
            echo "Failed to read image data.";
            exit(); // Exit if image data read fails
        }
    }

    // Create an instance of BlogController
    $blogController = new BlogController();

    

    // Attempt to update the blog post
    $updated = $blogController->updateBlogPost($blogId, $title, $created_at, $author, $image_data, $content);
    // Check if the blog post was successfully updated
    if ($updated) {
        // Redirect the user to the updated blog post or to a confirmation page
        header("Location: blog_detail.php?id_blog=" . $blogId);
        exit(); // Ensure that no other output is sent
    } else {
        // Failed to update blog post
        echo "Failed to update blog post.";
    }
} else {
    // Invalid request
    http_response_code(400);
    echo "Invalid request.";
}
?>
