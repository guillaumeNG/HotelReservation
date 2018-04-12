<?php

require_once '../lib_php/Connexion.class.php';
require_once '../lib_php/Transaxion.class.php';
require_once '../entities/Clients.php';
require_once '../daos/ClientsDAO.php';
//require_once '../';

$pdo = Connexion::seConnecter("../conf/UroomBD.ini");

$action = filter_input(INPUT_GET, "action");
if ($action == null) {
    $action = filter_input(INPUT_POST, "action");
}

$lsContenu = "";
$lsMessage = "";

$id = "";
$lsNon = "";

//if ($action == null) {
//    $action = "selectAll";
//}

switch ($action) {

    //...cas de l'insert
    case "ClientsInsert":
        include '../boundaries/ClientsInsertIHM.php';
        break;

    //...cas de l'InsertValidation en hidden
    case "ClientsInsertValidation":
        /*
         * APPEL AU DAO
         */
        $idClients = filter_input(INPUT_POST, "idClients");
        $nomClients= filter_input(INPUT_POST, "nomClients");

        if ($idClients != null && $nomClients != null) {
            Transaxion::initialiser($pdo);
            $ClientsDAO = new ClientsDAO($pdo);
            $Clients = new Clients($idClients, $nomClients);
            $lsMessage = $ClientsDAO->insert($Clients) . " enregistrement ajouté";
            Transaxion::valider($pdo);
        } else {
            $lsMessage = "Toutes les saisies sont obligatoires";
        }
        include '../boundaries/ClientsInsertIHM.php';
        break;

    //...cas du selectAll
    case "ClientsSelectAll":
        $lsContenu = "";
        //....instanciation de l'objet
        $ClientsDAO = new ClientsDAO($pdo);
        $tLines = $ClientsDAO->selectAll();

        //....on boucle sur chaque ligne et valorisation 
        foreach ($tLines as $line) {
            $lsContenu .= "<tr>\n";
            $lsContenu .= "<td class='borde'>" . $line->getIdClients() . "</td>\n";
            $lsContenu .= "<td class='borde'>" . $line->getNomClients() . "</td>\n";

            $lsContenu .= "</tr>\n";
        }
        include '../boundaries/HotelSelectAllIHM.php';
        break;

    //...cas du Delete
    case "ClientsDelete":
        include '../boundaries/ClientsDeleteIHM.php';
        break;

    //...cas du deleteValidation en hidden
    case "ClientsDeleteValidation":
        /*
         * APPEL AU DAO
         */
        $idClients = filter_input(INPUT_POST, "idClients");
        $nomClients= filter_input(INPUT_POST, "nomClients");

        if ($idClients != null) {
            Transaxion::initialiser($pdo);
            $ClientsDAO = new ClientsDAO($pdo);
            $Clients = new Hotel($idClients, $nomClients);
            $lsMessage = $ClientsDAO->delete($Clients) . " enregistrement supprimé";
            Transaxion::valider($pdo);
        } else {
            $lsMessage = "Toutes les saisies sont obligatoires";
        }
        include '../boundaries/ClientsDeleteIHM.php';
        break;

    case "ClientsUpdate":

        $ClientsDAO= new ClientsDAO($pdo);
        $tLines = $ClientsDAO->selectAll();

        include '../boundaries/ClientsUpdateIHM.php';
        break;

    case "ClientsUpdateSelection":
        
        $ClientsDAO = new ClientsDAO($pdo);
        
        $tLines = $ClientsDAO->selectAll();

                
        
        //... on stocke la valeur de l'option selectionnée dans une variable $id
        $id = filter_input(INPUT_POST, "listeClients");
   
        $dev = $ClientsDAO->selectOne($id);
        
       
        $lsNon = $dev->getNomClients();
        


        include '../boundaries/ClientsUpdateIHM.php';
        break;

    //...cas du UpdateValidation en hidden
    case "ClientsUpdateValidation":
        /*
         * APPEL AU DAO
         */
        // affiche la liste déroulante de façon permanente 
        $ClientsDAO = new ClientsDAO($pdo);
        $tLines = $ClientsDAO->selectAll();


        $idClients = filter_input(INPUT_POST, "idClients");
        $nomClients = filter_input(INPUT_POST, "nomClients");


        if ($idDeveloppeur != null && $nomClients != null) {
            Transaxion::initialiser($pdo);
            $clientsDAO = new ClientsDAO($pdo);
            $Clients = new Clients($idClients, $nomClients);
            $lsMessage = $ClientsDAO->update($Clients) . " enregistrement modifié";
            Transaxion::valider($pdo);
        } else {
            $lsMessage = "Toutes les saisies sont obligatoires";
        }
        include '../boundaries/ClientsUpdateIHM.php';
        break;

    default:
        include '../boundaries/AccueilIHM.php';
        break;
}
?>    














