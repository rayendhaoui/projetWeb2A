<?php
 class user {
    private $nom;
    private $prenom;
    private $email;
    private $region;
    private $ville;
    private $dernier_service;
    private $date_n;
    private $mot_d_passe;
    
    public function __construct( $nom, $prenom, $email, $region, $ville, $dernier_service, $date_n,$mot_d_passe) {

        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->region = $region;
        $this->ville = $ville;
        $this->dernier_service= $dernier_service;
        $this->date_n = $date_n;
        $this->mot_d_passe=$mot_d_passe;
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
    public function getMot_d_passe() {
        return $this->mot_d_passe;
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
    public function setmot_d_passe($mot_d_passe) {
        $this->mot_d_passe = $mot_d_passe;
    }
    public static function consultUserByEmail($email) {
        require_once "../config2.php";
        $cnx = config::getConnexion();
        $stmt = $cnx->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    

    public function updatePassword($email, $mot_d_passe) {
        require_once "../config2.php";
        $cnx = config::getConnexion();
        $stmt = $cnx->prepare("UPDATE user SET mot_d_passe = :mot_d_passe WHERE email = :email");
        $stmt->bindParam(":mot_d_passe", $mot_d_passe);
        $stmt->bindParam(":email", $email);
        return $stmt->execute();
    }
    
}
?>