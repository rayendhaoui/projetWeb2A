<?php
class ges_entreprise {
    private $photo;
    private $nom_ent;
    private $nom_rec;
    private $poste_rec;
    private $lieu_ent;
    private $type_ser;
    private $email;

  

    public function __construct( $photo, $nom_ent, $nom_rec, $poste_rec, $lieu_ent, $type_ser, $email) {

        $this->photo = $photo;
        $this->nom_ent = $nom_ent;
        $this->nom_rec = $nom_rec;
        $this->poste_rec = $poste_rec;
        $this->lieu_ent = $lieu_ent;
        $this->type_ser =$type_ser;
        $this->email = $email;
    }

   public function getphoto() {
        return $this->photo;
    }
    public function getnom_ent() {
        return $this->nom_ent;
    }
    public function getnom_rec() {
        return $this->nom_rec;
    }
    
    public function getposte_rec() {
        return $this->poste_rec;
    }
    public function getlieu_ent() {
        return $this->lieu_ent;
    } 

    public function gettype_ser() {
        return $this->type_ser;
    }

    public function getemail() {
        return $this->email;
    }

   

    
    public function setphoto($photo) {
        $this->photo = $photo;
    }

    public function setnom_ent($nom_ent) {
        $this->nom_ent = $nom_ent;
    }
    
    public function setnom_rec($nom_rec) {
        $this->nom_rec = $nom_rec;
    }
    public function setposte_rec($poste_rec) {
        $this->poste_rec = $poste_rec;
    }

    public function setlieu_ent($lieu_ent) {
        $this->lieu_ent = $lieu_ent;
    }

    public function settype_ser($type_ser) {
        $this->type_ser = $type_ser;
    }

    public function setemail($email) {
        $this->email = $email;
    }
}