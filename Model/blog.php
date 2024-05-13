<?php
class blog
{
    // List of attributes
    private ?int $id_blog = null;
    private ?string $title = null;
    private ?string $created_at = null;
    private ?string $author = null;
    private ?string $image_url = null;
    private ?string $content = null;

    // Constructor
    public function __construct($id_blog = null, $title, $created_at, $author, $image_url, $content)
    {
        $this->id_blog = $id_blog;
        $this->title = $title;
        $this->created_at = $created_at;
        $this->author = $author;
        $this->image_url = $image_url;
        $this->content = $content;
        
    }

    // Getter for id_blog
    public function getid_blog()
    {
        return $this->id_blog;
    }

    // Getter and Setter for title
    public function gettitle()
    {
        return $this->title;
    }

    public function settitle($title)
    {
        $this->title = $title;
        return $this;
    }

    // Getter and Setter for created_at
    public function getcreated_at()
    {
        return $this->created_at;
    }

    public function setcreated_at($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }

    // Getter and Setter for author
    public function getauthor()
    {
        return $this->author;
    }

    public function setauthor($author)
    {
        $this->author = $author;
        return $this;
    }

    // Getter and Setter for image_url
    public function getimage_url()
    {
        return $this->image_url;
    }

    public function setimage_url($image_url)
    {
        $this->image_url = $image_url;
        return $this;
    }

    // Getter and Setter for content
    public function getcontent()
    {
        return $this->content;
    }

    public function setcontent($content)
    {
        $this->content = $content;
        return $this;
    }
}
?>
