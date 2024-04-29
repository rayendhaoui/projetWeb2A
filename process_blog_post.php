<?php
include 'C:\xampp\htdocs\ecotrust11\ecotrust11\ecotrust\Controller\BlogController.php';

$error = "";
$blogController = new BlogController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST['title'];
    $author = $_POST['author'];
    $date = $_POST['date'];
    $content = $_POST['content'];
    $user_id = $$_POSt['user_id'];
    // Check if an image was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Read the image file into a variable
        $image_data = file_get_contents($_FILES['image']['tmp_name']);
    } else {
        // No image uploaded, set default image data to empty
        $image_data = '';
    }

    // Add the blog post using the BlogController
    $blogController->addBlogPostb($title, $date, $author, $image_data, $content, $user_id);

    // Redirect to the blog list page or any other page after successful insertion
    header("Location: back_blog.php");
    exit();
} else {
    // If the form is not submitted via POST method, redirect to the create blog post page
    header("Location: create-blog.php");
    exit();
}
?>
