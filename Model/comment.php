<?php
// Include your database connection file


class Comment {
    // List of attributes
    private ?int $id = null;
    private ?int $article_id = null;
    private ?string $commenter_name = null;
    private ?string $comment_text = null;
    private ?string $created_at = null;

    // Constructor
    public function __construct($article_id, $commenter_name, $comment_text, $created_at = null, $id = null)
    {
        $this->id = $id;
        $this->article_id = $article_id;
        $this->commenter_name = $commenter_name;
        $this->comment_text = $comment_text;
        $this->created_at = $created_at;
    }

    // Getter and Setter for id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    // Getter and Setter for article_id
    public function getArticleId()
    {
        return $this->article_id;
    }

    public function setArticleId($article_id)
    {
        $this->article_id = $article_id;
        return $this;
    }

    // Getter and Setter for commenter_name
    public function getCommenterName()
    {
        return $this->commenter_name;
    }

    public function setCommenterName($commenter_name)
    {
        $this->commenter_name = $commenter_name;
        return $this;
    }

    // Getter and Setter for comment_text
    public function getCommentText()
    {
        return $this->comment_text;
    }

    public function setCommentText($comment_text)
    {
        $this->comment_text = $comment_text;
        return $this;
    }

    // Getter and Setter for created_at
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }
}
?>
