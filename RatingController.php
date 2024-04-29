<?php
require_once 'C:\xampp\htdocs\ecotrust11\ecotrust11\ecotrust\config.php';
class RatingController {
    private $pdo;

    public function __construct() {
        $this->pdo = Config::getConnexion();
    }

    public function toggleRating($post_id, $user_id, $rating_type) {
        // Check if the user has already rated the post
        $existing_rating = $this->getRatingByUser($post_id, $user_id);

        if ($existing_rating) {
            // If the user has already rated the post, check if the rating type is the same
            if ($existing_rating['rating_type'] == $rating_type) {
                // If the rating type is the same, remove the rating
                $this->removeRating($existing_rating['id']);
            } else {
                // If the rating type is different, update the rating
                $this->updateRating($existing_rating['id'], $rating_type);
            }
        } else {
            // If the user has not rated the post yet, add a new rating
            $this->addRating($post_id, $user_id, $rating_type);
        }

        return true; // Return true indicating successful toggle
    }

    public function addRating($post_id, $user_id, $rating_type) {
        $sql = "INSERT INTO ratings (blog_id, user_id, rating_type) VALUES (:post_id, :user_id, :rating_type)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':rating_type', $rating_type);
        $stmt->execute();
    }

    public function updateRating($rating_id, $rating_type) {
        $sql = "UPDATE ratings SET rating_type = :rating_type WHERE id = :rating_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':rating_id', $rating_id, PDO::PARAM_INT);
        $stmt->bindParam(':rating_type', $rating_type);
        $stmt->execute();
    }

    public function removeRating($rating_id) {
        $sql = "DELETE FROM ratings WHERE id = :rating_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':rating_id', $rating_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getRatingByUser($post_id, $user_id) {
        $sql = "SELECT * FROM ratings WHERE blog_id = :post_id AND user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getLikesCount($post_id) {
        $sql = "SELECT COUNT(*) FROM ratings WHERE blog_id = :post_id AND rating_type = 'like'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getDislikesCount($post_id) {
        $sql = "SELECT COUNT(*) FROM ratings WHERE blog_id = :post_id AND rating_type = 'dislike'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}
?>
