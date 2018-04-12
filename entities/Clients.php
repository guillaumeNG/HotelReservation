<?php

//...crée la classe Clients
class Clients {

    //...attributs de la classe 
    private $idClients;
    private $nomClients;
    private $email;
    private $mdp;
    private $tel;

    //... Constructeur
    function __construct($idClients = "", $nomClients = "", $email="", $mdp="", $tel="") {
        $this->idClients = $idClients;
        $this->nomClients = $nomClients;
        $this->nomClients = $email;
        $this->nomClients = $mdp;
        $this->nomClients = $tel;

    }

    //...GETTERS & SETTERS
    public function getIdClients() {
        return $this->idClients;
    }

    public function getNomClients() {
        return $this->nomClients;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function getMdp() {
        return $this->mdp;
    }
    
    public function getTel() {
        return $this->tel;
    }



    public function setIdClients($idClients) {
        $this->idClients = $idClients;
    }

    public function setNomClients($nomClients) {
        $this->nomClients = $nomClients;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }
    
    public function setTel($tel) {
        $this->tel = $tel;
    }

    //...Classe Clients !!!!
}
?> 

