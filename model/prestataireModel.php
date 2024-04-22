<?php


class prestataire {


    private  $id = null;
    private  $nom = null;
    private  $metier= null;
    private  $age= null;
    private  $salaire= null;
    private  $niveau= null;

    

    public function __construct($id, $nom, $metier, $age, $salaire,$niveau)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->metier= $metier;
        $this->age = $age;
        $this->salaire = $salaire;
        $this->niveau = $niveau;

      
    }

    public function getid()
    {
        return $this->id;
    }


    public function getnom()
    {
        return $this->nom;
    }


    public function setnom ($nom )
    {
        $this->nom  = $nom ;

       // return $this;
    }


    public function getmetier()
    {
        return $this->metier;
    }


    public function setmetier($metier)
    {
        $this->metier = $metier;

        //return $this;
    }


    public function getage()
    {
        return $this ->age;
    }


    public function setage($age)
    {
        $this->age = $age;

        //return $this;
    }


    public function getsalaire()
    {
        return $this->salaire;
    }


    public function setsalaire ($salaire)
    {
        $this->salaire  = $salaire ;

        //return $this;
    }
    public function getniveau()
    {
        return $this->niveau;
    }


    public function setniveau ($niveau )
    {
        $this->niveau  = $niveau ;

        //return $this;
    }




   
}
