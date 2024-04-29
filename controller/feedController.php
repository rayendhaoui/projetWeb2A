<?php
require_once 'config.php';
require_once '../model/feedback.PHP';


class feedC
{

    public function display()
    {
        $sql = "SELECT * FROM feedback";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function affich($userId)
    {
        $sql = "SELECT * FROM feedback WHERE userId = :userId";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindValue(':userId', $userId);

        try {
            $liste = $query->fetch();
            var_dump($liste);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function delete($userId)
    {
        $sql = "DELETE FROM feedback WHERE userId = :userId";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':userId', $userId);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function create($feed) {
        $sql = "INSERT INTO feedback (userId, comment, rating) VALUES (:userId, :comment, :rating)";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'userId' => $feed->getuserId(), // Corrected getter name
                'comment' => $feed->getcomment(),
                'rating' => $feed->getrating(),
            ]);
        } catch (PDOException $e) {
            echo "Error inserting data: " . $e->getMessage();
        }
    }
    

    function edit($feed) {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE feedback 
                SET comment = :comment, 
                    rating = :rating
                    WHERE userId = :userId'
            );
            
            // Correct reference to userId from feedback
            $query->execute([
                'userId' => $feed->getuserId(), // Corrected here
                'comment' => $feed->getcomment(),
                'rating' => $feed->getrating()
                        ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage(); // Error handling with context
        }
    }


function statis() {
    $db = Config::getConnexion();
    
    $feed = [
        'total' => 0,
        'likes' => 0,
        'dislikes' => 0,
        'like_percentage' => 0,
        'dislike_percentage' => 0
    ];

    try {
        // Get total feedback count
        $query = $db->prepare("SELECT COUNT(*) as total FROM feedback");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $feed['total'] = $result['total'];

        if ($feed['total'] > 0) {
            // Get count of likes
            $query = $db->prepare("SELECT COUNT(*) as likes FROM feedback WHERE rating = 'like'");
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $feed['likes'] = $result['likes'];

            // Get count of dislikes
            $query = $db->prepare("SELECT COUNT(*) as dislikes FROM feedback WHERE rating = 'dislike'");
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $feed['dislikes'] = $result['dislikes'];

            // Calculate percentages
            $feed['like_percentage'] = ($feed['likes'] / $feed['total']) * 100;
            $feed['dislike_percentage'] = ($feed['dislikes'] / $feed['total']) * 100;
        }

    } catch (Exception $e) {
        echo "Error getting statistics: " . $e->getMessage();
    }

    return $feed;
}
}

?>


 

