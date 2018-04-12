<?php
require_once '../daos/LogementDAO.php';
require_once '../lib_php/Connexion.class.php';
require_once '../lib_php/Transaxion.class.php';
require_once '../entities/Logement.php';
//require_once '../';

$pdo = Connexion::seConnecter("../conf/UroomBD.ini");

$action = filter_input(INPUT_GET, "action");
if ($action == null) {
    $action = filter_input(INPUT_POST, "action");
}
$LogementDAO = "";
$lsContenu = "";
$lsMessage = "";
$typeLogement ="";
$idLogement = "";
$lsNon = "";

//if ($action == null) {
//    $action = "selectAll";
//}

switch ($action) {

    //...cas de l'insert
    case "LogementInsert":
        include '../boundaries/LogementInsertIHM.php';
        break;

    //...cas de l'InsertValidation en hidden
    case "LogementInsertValidation":
        /*
         * APPEL AU DAO
         */
        $idLogement = filter_input(INPUT_POST, "idLogement");
        $typeLogement= filter_input(INPUT_POST, "typeLogement");

        if (idLogement != null && typeLogement != null) {
            Transaxion::initialiser($pdo);
            $LogementDAO = new LogementDAO($pdo);
            $Logement = new Logement($idLogement, $typeLogement);
            $lsMessage = $LogementDAO->insert($Logement) . " enregistrement ajouté";
            Transaxion::valider($pdo);
        } else {
            $lsMessage = "Toutes les saisies sont obligatoires";
        }
        include '../boundaries/LogementInsertIHM.php';
        break;

    //...cas du selectAll
    case "LogementSelectAll":
        $lsContenu = "";
        //....instanciation de l'objet
        $LogementDAO = new LogementDAO($pdo);
        $tLines = $LogementDAO->selectAll();

        //....on boucle sur chaque ligne et valorisation 
        foreach ($tLines as $line) {
            $lsContenu .= "<tr>\n";
            $lsContenu .= "<td class='borde'>" . $line->getIdLogement() . "</td>\n";
            $lsContenu .= "<td class='borde'>" . $line->getTypeLogement() . "</td>\n";

            $lsContenu .= "</tr>\n";
        }
        include '../boundaries/LogementSelectAllIHM.php';
        break;

    //...cas du Delete
    case "LogementDelete":
         $LogementDAO= new LogementDAO($pdo);
        $tLines = $LogementDAO->selectAll();;
        
        include '../boundaries/LogementDeleteIHM.php';
        break;

    //...cas du deleteValidation en hidden
    case "LogementDeleteValidation":
        /*
         * APPEL AU DAO
         */
        $idLogement = filter_input(INPUT_POST, "idLogement");
        $typeLogement= filter_input(INPUT_POST, "typeLogement");

        if ($idLogement != null) {
            Transaxion::initialiser($pdo);
            $LogementDAO = new LogementDAO($pdo);
            $Logement = new Logement($idLogement, $typeLogement);
            $lsMessage = $LogementDAO->delete($Logement) . " enregistrement supprimé";
            Transaxion::valider($pdo);
        } else {
            $lsMessage = "Toutes les saisies sont obligatoires";
        }
        include '../boundaries/LogementDeleteIHM.php';
        break;

    case "LogementUpdate":

        $LogementDAO= new LogementDAO($pdo);
        $tLines = $LogementDAO->selectAll();

        include '../boundaries/LogementUpdateIHM.php';
        break;

    case "LogementUpdateSelection":
        
        $LogementDAO = new LogementDAO($pdo);
        
        $tLines = $LogementDAO->selectAll();

                
        
        //... on stocke la valeur de l'option selectionnée dans une variable $id
        $id = filter_input(INPUT_POST, "listeLogement");
   
        $dev = $LogementDAO->selectOne($id);
        
       
        $lsNon = $dev->getTypeLogement();
        


        include '../boundaries/LogementUpdateIHM.php';
        break;

    //...cas du UpdateValidation en hidden
    case "LogementUpdateValidation":
        /*
         * APPEL AU DAO
         */
        // affiche la liste déroulante de façon permanente 
        $LogementDAO = new LogementDAO($pdo);
        $tLines = $LogementDAO->selectAll();


        $idLogement = filter_input(INPUT_POST, "idLogement");
        $typeLogement = filter_input(INPUT_POST, "typeLogement");


        if ($idLogement != null && $typeLogement != null) {
            Transaxion::initialiser($pdo);
            $LogementDAO = new LogementDAO($pdo);
            $Logement = new Logement($idLogement, $typeLogement);
            $lsMessage = $LogementDAO->update($Logement) . " enregistrement modifié";
            Transaxion::valider($pdo);
        } else {
            $lsMessage = "Toutes les saisies sont obligatoires";
        }
        include '../boundaries/LogementUpdateIHM.php';
        break;

    default:
        include '../boundaries/AccueilIHM.php';
        break;
}
?>    














