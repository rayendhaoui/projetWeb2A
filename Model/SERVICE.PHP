<?php


class service {


    private $nom ;
    private $prix;
    private $id;
    private $typee;
    private $mode;
    

    public function __construct($nom, $prix,$id, $typee, $mode)
    {
        $this->nom = $nom;
        $this->prix = $prix;
        $this->id= $id;
        $this->typee = $typee;
        $this->mode = $mode;
      
    }

    public function getnom()
    {
        return $this->nom;
    }

    public function getprix()
    {
        return $this->prix;
    }
   public function getid()
    {
        return $this->id;
    }

    public function getmode()
    {
        return $this->mode;
    }
    public function gettypee()
    {
        return $this ->typee;
    }

    public function setid($id)
    {
        $this->id = $id;
    }
    public function settypee($typee)
    {
        $this->typee = $typee;
    }
    public function setprix ($prix)
    {
        $this->prix  = $prix ;
    }

    public function setmode ($mode)
    {
        $this->mode  = $mode ;
    }
    
    public function setnom ($nom)
    {
        $this->nom  = $nom ;
    }
}
