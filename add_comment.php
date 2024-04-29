<?php

// Include the necessary files and classes
require_once 'C:\xampp\htdocs\ecotrust11\ecotrust11\ecotrust\config.php';
require_once 'C:\xampp\htdocs\ecotrust11\ecotrust11\ecotrust\Controller\CommentController.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $article_id = $_POST['article_id'];
    $commenter_name = $_POST['commenter_name'];
    
    // Ensure that the key matches the actual column name 'comment' in the 'comments' table
    $comment = $_POST['comment']; 

    // Create an instance of the CommentController
    $commentController = new CommentController();

    // Add the comment to the database
    $result = $commentController->addComment($article_id, $commenter_name, $comment);

    // Check if the comment was added successfully
    if ($result) {
        // Redirect back to the blog post with the added comment
        header("Location: blog_post.php?id=$article_id");
        exit();
    } else {
        // Handle error if comment addition fails
        echo "Failed to add comment.";
    }
} else {
    // Redirect to the blog post page if accessed directly without form submission
    header("Location: index.php");
    exit();
}
?>
