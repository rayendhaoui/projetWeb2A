<?php


class feed {


    private $userId;
    private $comment;
    private $rating;
    

    public function __construct($userId, $comment, $rating)
    {
        $this->userId = $userId;
        $this->comment = $comment;
        $this->rating = $rating;
      
    }

    public function getuserId()
    {
        return $this->userId;
    }


    public function getcomment()
    {
        return $this->comment;
    }


    public function setcomment ($comment )
    {
        $this->comment  = $comment ;

       // return $this;
    }




    public function getrating()
    {
        return $this ->rating;
    }


    public function setrating($rating)
    {
        $this->rating = $rating;

       // return $this;
    }



   
}
