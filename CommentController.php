<?php

require_once 'C:\xampp\htdocs\ecotrust11\ecotrust11\ecotrust\config.php';

class CommentController {
    private $pdo;

    public function __construct() {
        $this->pdo = config::getConnexion();
    }

    public function listComments() {
        $sql = "SELECT * FROM comments";
        try {
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new Exception('Failed to fetch comments: ' . $e->getMessage());
        }
    }

    public function listCommentsByBlogId($id_blog) {
        $sql = "SELECT * FROM comments WHERE id_blog = :id_blog";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id_blog', $id_blog);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new Exception('Failed to fetch comments for blog post: ' . $e->getMessage());
        }
    }

    public function listCommentsByBlogIdu($id_userC) {
        $sql = "SELECT * FROM comments WHERE id_userC = :id_userC";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id_userC', $id_userC);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new Exception('Failed to fetch comments for blog post: ' . $e->getMessage());
        }
    }

    public function deleteComment($id_comment) {
        $sql = "DELETE FROM comments WHERE id_comment = :id_comment";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id_comment', $id_comment);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception('Failed to delete comment: ' . $e->getMessage());
        }
    }

    public function addComment($id_blog, $name, $content, $created_at = null, $id_comment = null) {
        $sql = "INSERT INTO comments (id_comment, id_blog, name, content, created_at) VALUES (:id_comment, :id_blog, :name, :content, :created_at)";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'id_comment' => $id_comment,
                'id_blog' => $id_blog,
                'name' => $name,
                'content' => $content,
                'created_at' => $created_at
            ]);
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception('Failed to add comment: ' . $e->getMessage());
        }
    }

    public function updateComment($id_comment, $id_blog, $name, $content) {
        $sql = "UPDATE comments SET id_blog = :id_blog, name = :name, content = :content WHERE id_comment = :id_comment";
        try {
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                'id_comment' => $id_comment,
                'id_blog' => $id_blog,
                'name' => $name,
                'content' => $content
            ]);
        } catch (PDOException $e) {
            throw new Exception('Failed to update comment: ' . $e->getMessage());
        }
    }
}

?>
