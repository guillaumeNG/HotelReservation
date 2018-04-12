<?php

require_once '../lib_php/Connexion.class.php';
require_once '../lib_php/Transaxion.class.php';
require_once '../daos/ClientsDAO.php';
require_once '../entities/Clients.php';

$pdo = Connexion::seConnecter("../conf/UroomBD.ini");

$action = filter_input(INPUT_GET, "action");
if ($action == null) {
    $action = filter_input(INPUT_POST, "action");
}

$lsContenu = "";
$lsMessage = "";
$id = "";
$nom = "";

$idClients = "";
$nomClients = "";
$email = "";
$mdp = "";
$tel = "";

switch ($action) {
    case "ClientsSelectAll":
        $lsContenu = "";
        //....instanciation de l'objet ClientsDAO   
        $clientsDAO = new ClientsDAO($pdo);
        $tLines = $clientsDAO->selectAll($pdo);

        //....on boucle sur chaque ligne et valorisation 
        foreach ($tLines as $line) {
            $lsContenu .= "<tr>\n";
            $lsContenu .= "<td class='borde'>" . $line->getIdClients() . "</td>\n";
            $lsContenu .= "<td class='borde'>" . $line->getNomClients() . "</td>\n";
            $lsContenu .= "<td class='borde'>" . $line->getEmail() . "</td>\n";
            $lsContenu .= "<td class='borde'>" . $line->getMdp() . "</td>\n";
            $lsContenu .= "<td class='borde'>" . $line->getTel() . "</td>\n";
            $lsContenu .= "</tr>\n";
        }
        include '../boundaries/ClientsSelectAllIHM.php';
        break;

    case "ProjetInsert":
        include '../boundaries/ClientsInsertIHM.php';
        break;

    case "ClientsInsertValidation":
        /*
         * APPEL AU DAO
         */
        $idClients = filter_input(INPUT_POST, "idClients");
        $nomClients = filter_input(INPUT_POST, "nomClients");
        $email = filter_input(INPUT_POST, "email");
        $mdp = filter_input(INPUT_POST, "mdp");
        $tel = filter_input(INPUT_POST, "tel");

        if ($idClients != null && $nomClients != null) {
            Transaxion::initialiser($pdo);
            $ClientsDAO = new ClientsDAO($pdo);
            $clients = new Clients($idClients, $nomClients, $email, $mdp, $tel);
            $lsMessage = $ClientsDAO->insert($clients) . " enregistrement ajouté";
            Transaxion::valider($pdo);
        } else {
            $lsMessage = "Toutes les saisies sont obligatoires";
        }
        include '../boundaries/ClientsInsertIHM.php';
        break;


    case "ClientsDelete":
        $ClientsDAO = new ClientsDAO($pdo);
        $tLines = $ClientsDAO->selectAll();

        include '../boundaries/ClientsDeleteIHM.php';
        break;

    case "ProjetDeleteSelection":
        $clientsDAO = new ClientsDAO($pdo);
        $tLines = $clientsDAO->selectAll();

        /*
         * SELECT ONE
         */

        $listeClients = filter_input(INPUT_POST, "listeClients");

        $idClients = $listeClients;

        $clients = $ClientsDAO->selectOne($idClients);

        $nomClients = $clients->getNomClients();

        $email = $clients->getEmail();

        $mdp = $clients->getMdp();

        $tel = $clients->getTel();



        include '../boundaries/ClientsDeleteIHM.php';

        break;

    case "ClientsDeleteValidation":
        /*
         * APPEL AU DAO
         */


        $idClients = filter_input(INPUT_POST, "idClients");
        $nomClients = filter_input(INPUT_POST, "nomClients");
        $email = filter_input(INPUT_POST, "email");
        $mdp = filter_input(INPUT_POST, "mdp");
        $tel = filter_input(INPUT_POST, "tel");
        if ($idClients != null) {
            Transaxion::initialiser($pdo);
            $clientsDAO = new ClientsDAO($pdo);
            $clients = new Clients($idClients, $nomClients, $email, $tel);
            $lsMessage = $ClientsDAO->delete($clients) . " enregistrement supprimé";
            Transaxion::valider($pdo);
        } else {
            $lsMessage = "Toutes les saisies sont obligatoires";
        }
        include '../boundaries/ClientsDeleteIHM.php';
        break;


    case "ClientsUpdate":
        $clientsDAO = new ClientsDAO($pdo);
        $tLines = $clientsDAO->selectAll();
        include '../boundaries/ClientsUpdateIHM.php';
        break;


    case "ClientsUpdateSelection":

        $clientsDAO = new ClientsDAO($pdo);
        $tLines = $clientsDAO->selectAll();

        /*
         * SELECT ONE
         */

        $listeClients = filter_input(INPUT_POST, "listeClients");

        $idClients = $listeClients;

        $clients = $clientsDAO->selectOne($idClients);

        $nomClients = $clients->getNomClients();

        $email = $clients->getEmail();

        $mdp = $clients->getMdp();

        $tel = $clients->getTel();
        //echo "<br>$idProjet";

        include '../boundaries/ClientsUpdateIHM.php';

        break;





    case "ClientsUpdateValidation":
        $clientsDAO = new clients($pdo);
        $tLines = $clientsDAO->selectAll();
        /*
         * APPEL AU DAO
         */
        $idClients = filter_input(INPUT_POST, "idClients");
        $nomClients = filter_input(INPUT_POST, "nomClients");
        $email = filter_input(INPUT_POST, "email");
        $mdp = filter_input(INPUT_POST, "mdp");
        $tel = filter_input(INPUT_POST, "tel");

        if ($idClients != null && $nomClients != null) {
            Transaxion::initialiser($pdo);
            $clientsDAO = new clientsDAO($pdo);
            $clients = new Clients($idClients, $nomProjet, $email, $mdp, $tel);
            $lsMessage = $ClientsDAO->update($clients) . " enregistrement modifié";
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
