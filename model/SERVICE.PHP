<?php


class service {


    private $nom = null;
    private $prix = null;
    //private $niveau= null;
    private $typee= null;
    private $mode= null;
    

    public function __construct($nom, $prix, $typee, $mode)
    {
        $this->nom = $nom;
        $this->prix = $prix;
        //$this->niveau= $niveau;
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


    public function setprix ($prix )
    {
        $this->prix  = $prix ;

       // return $this;
    }


   // public function getniveau()
   // {
    //    return $this->niveau;
   // }


   // public function setniveau($niveau)
    //{
     //   $this->niveau = $niveau;

      //  return $this;
    //}


    public function gettypee()
    {
        return $this ->typee;
    }


    public function settypee($typee)
    {
        $this->typee = $typee;

       // return $this;
    }


    public function getmode()
    {
        return $this->mode;
    }


    public function setmode ($mode)
    {
        $this->mode  = $mode ;

        //return $this;
    }



   
}
