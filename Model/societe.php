<?php
class societe {
    private $nom;
    private $region;
    private $ville;
    private $num_tel;
    private $email;
    private $mot_d_passe;
    
    public function __construct( $nom, $region, $ville, $num_tel, $email,$mot_d_passe) {

        $this->nom = $nom;
        $this->region = $region;
        $this->ville = $ville;
        $this->num_tel= $num_tel;
        $this->email = $email;
        $this->mot_d_passe=$mot_d_passe;
    }

    public function getNom() {
        return $this->nom;
    }
    public function getRegion() {
        return $this->region;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getNum_tel() {
        return $this->num_tel;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getMot_d_passe() {
        return $this->mot_d_passe;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setregion($region) {
        $this->region = $region;
    }

    public function setville($ville) {
        $this->ville = $ville;
    }

    public function setnum_tel($num_tel) {
        $this->num_tel = $num_tel;
    }
    
    public function setemail($email) {
        $this->email = $email;
    }
    public function setmot_d_passe($mot_d_passe) {
        $this->mot_d_passe = $mot_d_passe;
    }
}