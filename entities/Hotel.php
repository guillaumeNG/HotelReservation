<?php

//...crée la classe Hotel
class Hotel {

    //...attributs de la classe 
    private $nomHotel;
    private $idHotel;
    private $ville;
    private $cp;
    private $telHotel;

    //... Constructeur
    function __construct($idHotel = "", $nomHotel = "", $ville = "", $cp ="", $telHotel=""){
        $this->idHotel = $idHotel;
        $this->nomHotel = $nomHotel;
        $this->ville = $nomHotel;
        $this->cp = $nomHotel;
        $this->telHotel = $telHotel;

    }

    //...GETTERS & SETTERS
    public function getNomHotel() {
        return $this->nomHotel;
    }

    public function getIdHotel() {
        return $this->idHotel;
    }

    public function setNomHotel($nomHotel) {
        $this->nomHotel = $nomHotel;
    }

    public function setIdHotel($idHotel) {
        $this->idHotel = $idHotel;
    }



}
?> 

