<?php
class reponse {

    private $id_rep;
    private $reclaimID;
    private $message;
    private $date;
    private $email;


    public function __construct($id_rep, $reclaimID, $message, $date, $email) {
        $this->id_rep = $id_rep;
        $this->reclaimID = $reclaimID;
        $this->email = $email;
        $this->message = $message;
        $this->date = $date;
    }

    public function getid_rep() {
        return $this->id_rep;
    }

    public function getReclaimid_rep() {
        return $this->reclaimID;
    }

    public function setReclaimid_rep($reclaimID) {
        $this->reclaimID = $reclaimID;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }
}
?>
