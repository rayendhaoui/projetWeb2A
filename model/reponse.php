<?php
class reponse {

    private $id_rep;
    private $reclaimid_rep;
    private $message;
    private $date;

    public function __construct($id_rep, $reclaimid_rep, $message, $date) {
        $this->id_rep = $id_rep;
        $this->reclaimid_rep = $reclaimid_rep;
        $this->message = $message;
        $this->date = $date;
    }

    public function getid_rep() {
        return $this->id_rep;
    }

    public function getReclaimid_rep() {
        return $this->reclaimid_rep;
    }

    public function setReclaimid_rep($reclaimid_rep) {
        $this->reclaimid_rep = $reclaimid_rep;
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
