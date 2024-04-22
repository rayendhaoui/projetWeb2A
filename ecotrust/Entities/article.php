<?php
    class livreur {
        private $nom;
        private $prenom;
        private $daten;
        private $cin;
        private $adresse;
        private $email;
        private $id;

        public function __construct($id,$nom, $prenom, $daten, $cin,$adresse,$email){
            
            $this->id=$id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->daten = $daten;
            $this->cin = $cin;
            $this->adresse = $adresse;
            $this->email=$email;
           
        }


        public function getnom (){
            return $this->nom ;
        }

        public function getprenom (){
            return $this->prenom;
        }

        public function getage (){
            return $this->daten ;
        }

        public function getcin (){
            return $this->cin ;
        }
        public function getadresse (){
            return $this->adresse ;
        }
        public function getemail(){
            return $this->email;
        }
        public function getid(){
           return $this->id;
        }

        

        public function setnom ($nom){
            $this->nom = $nom;
        }
        
        public function setprenom ($prenom){
            $this->prenom = $prenom;
        }

        public function setage ($daten){
            $this->daten = $daten;
        }
        public function setcin($cin){
            $this->cin=$cin;
        }
        public function setadresse ($adresse){
            $this->adresse = $adresse;
        }
        public function setemail ($email){
            $this->email = $email;
        }
        public function setid ($id){
            $this->id=$id;
        }
    }
?>