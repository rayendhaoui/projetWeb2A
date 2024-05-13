<?php
class ges_off_emp {
    private $photo;
    private $titre_off;
    private $nom_ent;
    private $lieu_ent;
    private $nbr_emp;
    private $type_off;
    private $mode_trav;
    private $nom_rec;
    private $date_rec;
    private $descrip;

  

    public function __construct( $photo, $titre_off, $nom_ent, $lieu_ent, $nbr_emp, $type_off, $mode_trav, $nom_rec, $date_rec, $descrip) {

        $this->photo = $photo;
        $this->titre_off = $titre_off;
        $this->nom_ent = $nom_ent;
        $this->lieu_ent = $lieu_ent;
        $this->nbr_emp = $nbr_emp;
        $this->type_off = $type_off;
        $this->mode_trav = $mode_trav;
        $this->nom_rec = $nom_rec;
        $this->date_rec = $date_rec;
        $this->descrip = $descrip;
    }

   public function getphoto() {
        return $this->photo;
    }

    public function gettitre_off() {
        return $this->titre_off;
    }

    public function getnom_ent() {
        return $this->nom_ent;
    }

    public function getlieu_ent() {
        return $this->lieu_ent;
    }

    public function getnbr_emp() {
        return $this->nbr_emp;
    }

    public function gettype_off() {
        return $this->type_off;
    }

    public function getmode_trav() {
        return $this->mode_trav;
    }

    public function getnom_rec() {
        return $this->nom_rec;
    }

    public function getdate_rec() {
        return $this->date_rec;
    }

    public function getdescrip() {
        return $this->descrip;
    }

    
    public function setphoto($photo) {
        $this->photo = $photo;
    }

    public function settitre_off($titre_off) {
        $this->titre_off = $titre_off;
    }

    public function setnom_ent($nom_ent) {
        $this->nom_ent = $nom_ent;
    }

    public function setlieu_ent($lieu_ent) {
        $this->lieu_ent = $lieu_ent;
    }

    public function setnbr_emp($nbr_emp) {
        $this->nbr_emp = $nbr_emp;
    }

    public function settype_off($type_off) {
        $this->type_off = $type_off;
    }

    public function setmode_trav($mode_trav) {
        $this->mode_trav = $mode_trav;
    }

    public function setnom_rec($nom_rec) {
        $this->nom_rec = $nom_rec;
    }

    public function setdate_rec($date_rec) {
        $this->date_rec = $date_rec;
    }

    public function setdescrip($descrip) {
        $this->descrip = $descrip;
    }

}