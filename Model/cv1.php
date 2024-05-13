<?php
class cv1 {
    private $cin;
    private $niv;
    private $dat;
    private $etab;
    private $img; // New property for the image path
    public function __construct($cin, $niv, $dat, $etab, $img) {
        $this->cin = $cin;
        $this->niv = $niv;
        $this->dat = $dat;
        $this->etab = $etab;
        $this->img = $img; // Initialize the image property
    }

    // Getter and setter methods for the image property
    public function getImg() {
        return $this->img;
    }

    public function setImg($img) {
        $this->img = $img;
    }

    public function getcin() {
        return $this->cin;
    }

    public function getniv() {
        return $this->niv;
    }

    public function getdat() {
        return $this->dat;
    }

    public function getetab() {
        return $this->etab;
    }


    public function setcin($cin) {
        $this->cin = $cin;
    }

    public function setniv($niv) {
        $this->niv = $niv;
    }

    public function setdat($dat) {
        $this->dat = $dat;
    }

    public function setetab($etab) {
        $this->etab = $etab;
    }
}