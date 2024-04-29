<?php
define('CONTROLLER_PATH', 'C:\xampp\htdocs\ecotrust11\ecotrust11\ecotrust\Controller\\');

// Include the BlogController.php file
include(CONTROLLER_PATH . 'BlogController.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get article ID and current acceptance status from the form submission
    $article_id = $_POST['article_id'] ?? 0;
    $current_accepted = $_POST['accepted'] ?? 0;

    // Toggle acceptance status
    $new_accepted = $current_accepted ? 0 : 1;

    // Create an instance of BlogController
    $blogController = new BlogController();

    // Update acceptance status
    $result = $blogController->updateAcceptance($article_id, $new_accepted);

    if ($result) {
        // Return success response
        // echo "Article " . ($new_accepted ? "accepted" : "unaccepted") . " successfully";
        echo "<script>alert('Article " . ($new_accepted ? "accepted" : "unaccepted") . " successfully'); window.location.href = 'blog.php';</script>";
        // Optionally, redirect back to the previous page or provide other feedback to the user
    } else {
        // Return error response
        echo "Error: Unable to update article acceptance status";
    }
}
?>
