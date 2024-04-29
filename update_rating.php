<?php
// Include the definition of the config class
require_once 'config.php'; 

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user ID, blog ID, and rating type from the POST data
    $userId = $_POST['user_id'] ?? 0;
    $blogId = $_POST['blog_id'] ?? 0;
    $ratingType = $_POST['rating_type'] ?? '';

    // Validate input
    if ($userId <= 0 || $blogId <= 0 || !in_array($ratingType, ['like', 'dislike'])) {
        http_response_code(400);
        echo "Invalid input data.";
        exit();
    }

    try {
        // Create a database connection
        $pdo = config::getConnexion();

        // Check if the user has already rated the blog post
        $query = "SELECT * FROM rating WHERE user_id = $userId AND blog_id = $blogId";
        $result = $pdo->query($query);
        if ($result->rowCount() > 0) {
            // User has already rated, update the existing rating
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $ratingId = $row['id'];
            $updateQuery = "UPDATE rating SET rating_type = '$ratingType' WHERE id = $ratingId";
            if ($pdo->exec($updateQuery) !== false) {
                echo "Rating updated successfully.";
            } else {
                http_response_code(500);
                echo "Error updating rating.";
            }
        } else {
            // User has not rated, insert a new rating
            $insertQuery = "INSERT INTO rating (user_id, blog_id, rating_type) VALUES ($userId, $blogId, '$ratingType')";
            if ($pdo->exec($insertQuery) !== false) {
                echo "Rating added successfully.";
            } else {
                http_response_code(500);
                echo "Error adding rating.";
            }
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo "Database error: " . $e->getMessage();
    }
} else {
    // Method not allowed
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
