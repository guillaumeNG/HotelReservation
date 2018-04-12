<?php

/*
 * LE DTO DE LA TABLE [Logement] DE LA BD [GestionProjet]
 */

class Logement {

    // ATTRIBUTS
    private $idLogement;
    private $typeLogement;
    private $taille;
    private $disponibilite;

    // CONSTRUCTEUR
    function __construct($idLogement = "", $typeLogement = "", $taille = "", $disponibilite = "") {
        $this->idLogement = $idLogement;
        $this->typeLogement = $typeLogement;
        $this->taille = $taille;
        $this->disponibilite = $disponibilite;
    }

    // GETTERS AND SETTERS
    public function setIdLogement($idLogement) {
        $this->idLogement = $idLogement;
    }

    public function setTypeLogement($typeLogement) {
        $this->typeLogement = $typeLogement;
    }

    public function setTaille($taille) {
        $this->taille = $taille;
    }

    public function setDescription($disponibilite) {
        $this->disponibilite = $disponibilite;
    }

    public function getIdLogement() {
        return $this->idLogement;
    }

    public function getTypeLogement() {
        return $this->typeLogement;
    }

    public function getTaille() {
        return $this->taille;
    }

    public function getDisponibilite() {
        return $this->disponibilite;
    }
    
    function setDisponibilite($disponibilite) {
        $this->disponibilite = $disponibilite;
    }



}

// / class Logement
?>
