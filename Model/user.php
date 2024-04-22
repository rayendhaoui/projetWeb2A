<?php
class user {
    private $nom;
    private $prenom;
    private $email;
    private $region;
    private $ville;
    private $dernier_service;
    private $date_n;
    
    public function __construct( $nom, $prenom, $email, $region, $ville, $dernier_service, $date_n) {

        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->region = $region;
        $this->ville = $ville;
        $this->dernier_service= $dernier_service;
        $this->date_n = $date_n;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRegion() {
        return $this->region;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getDernier_service() {
        return $this->dernier_service;
    }

    public function getDate_n() {
        return $this->date_n;
    }
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setemail($email) {
        $this->email = $email;
    }

    public function setregion($region) {
        $this->region = $region;
    }

    public function setville($ville) {
        $this->ville = $ville;
    }

    public function setdernier_service($dernier_service) {
        $this->dernier_service = $dernier_service;
    }

    public function setdate_n($date_n) {
        $this->date_n = $date_n;
    }
}