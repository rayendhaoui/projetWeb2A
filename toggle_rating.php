<?php
require_once 'C:\xampp\htdocs\ecotrust11\ecotrust11\ecotrust\Controller\RatingController.php';

// Assuming user ID is available in your session or POST data
//require_once 'C:\xampp\htdocs\GestionResevation\Dashbord\Controller\RatingController.php';

// Assuming user ID is available in your PHP logic
$user_id = 2; // Example user ID

// Check if the user ID is available
if (!$user_id) {
    echo json_encode(array("error" => "User ID is not available."));
    exit;
}

// Check if post ID and rating type are set in the POST data
if (isset($_POST['postid'], $_POST['type'])) {
    $post_id = $_POST['postid'];
    $rating_type = $_POST['type'];

    // Create an instance of RatingController
    $ratingController = new RatingController();

    // Toggle the rating for the user
    $result = $ratingController->toggleRating($post_id, $user_id, $rating_type);

    // Check the result of the toggle operation
    if ($result) {
        // Get the updated counts
        $likes = $ratingController->getLikesCount($post_id);
        $dislikes = $ratingController->getDislikesCount($post_id);

        // Prepare the response
        $response = array("likes" => $likes, "dislikes" => $dislikes);
        echo json_encode($response);
    } else {
        echo json_encode(array("error" => "Failed to toggle rating."));
    }
} else {
    // Error handling if post ID or rating type is not set
    echo json_encode(array("error" => "Post ID or rating type is not set."));
}

?>
