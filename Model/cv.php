<?php
class cv {
    private $nom;
    private $prenom;
    private $email;
    private $num;
    private $dte;
    private $adresse;
    private $nationalite;
    private $objectifs;
    private $diplomes;
    private $postes;
    private $comp;
    private $interets;

    public function __construct( $nom, $prenom, $email, $num, $dte, $adresse, $nationalite, $objectifs, $diplomes, $postes, $comp, $interets) {

        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->num = $num;
        $this->dte = $dte;
        $this->adresse = $adresse;
        $this->nationalite = $nationalite;
        $this->objectifs = $objectifs;
        $this->diplomes = $diplomes;
        $this->postes = $postes;
        $this->comp = $comp;
        $this->interets = $interets;
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

    public function getNum() {
        return $this->num;
    }

    public function getdte() {
        return $this->dte;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getNationalite() {
        return $this->nationalite;
    }

    public function getObjectifs() {
        return $this->objectifs;
    }

    public function getDiplomes() {
        return $this->diplomes;
    }

    public function getPostes() {
        return $this->postes;
    }

    public function getComp() {
        return $this->comp;
    }

    public function getInterets() {
        return $this->interets;
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

    public function setnum($num) {
        $this->num = $num;
    }

    public function setdte($dte) {
        $this->dte = $dte;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setNationalite($nationalite) {
        $this->nationalite = $nationalite;
    }

    public function setObjectifs($objectifs) {
        $this->objectifs = $objectifs;
    }

    public function setDiplomes($diplomes) {
        $this->diplomes = $diplomes;
    }

    public function setPostes($postes) {
        $this->postes = $postes;
    }

    public function setcom($comp) {
        $this->comp = $comp;
    }

    public function setInterets($interets) {
        $this->interets = $interets;
    }
}