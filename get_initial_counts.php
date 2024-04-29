<?php
include 'C:\xampp\htdocs\ecotrust11\ecotrust11\ecotrust\config.php';

// Check if postid is set
if(isset($_POST['postid'])) {
    $postid = $_POST['postid'];

    // Get PDO connection
    $pdo = Config::getConnexion();

    try {
        // Count the number of likes for the specified post
        $query = "SELECT COUNT(*) AS cntLike FROM ratings WHERE rating_type='like' AND blog_id=:postid";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':postid', $postid);
        $statement->execute();
        $fetchlikes = $statement->fetch();
        $totalLikes = $fetchlikes['cntLike'];

        // Prepare response as JSON
        $response = array("likes" => $totalLikes);
        echo json_encode($response);
    } catch (PDOException $e) {
        // Error handling if query fails
        $response = array("error" => "Failed to fetch initial counts: " . $e->getMessage());
        echo json_encode($response);
    }
} else {
    // Error handling if postid is not set
    $response = array("error" => "postid parameter is missing");
    echo json_encode($response);
}
?>
