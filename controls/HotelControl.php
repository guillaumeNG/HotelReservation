<?php
require_once '../daos/HotelDAO.php';
require_once '../lib_php/Connexion.class.php';
require_once '../lib_php/Transaxion.class.php';
require_once '../entities/Hotel.php';
//require_once '../';

$pdo = Connexion::seConnecter("../conf/UroomBD.ini");

$action = filter_input(INPUT_GET, "action");
if ($action == null) {
    $action = filter_input(INPUT_POST, "action");
}
$HotelDAO = "";
$lsContenu = "";
$lsMessage = "";
$nomHotel ="";
$idHotel = "";
$lsNon = "";

//if ($action == null) {
//    $action = "selectAll";
//}

switch ($action) {

    //...cas de l'insert
    case "HotelInsert":
        include '../boundaries/HotelInsertIHM.php';
        break;

    //...cas de l'InsertValidation en hidden
    case "HotelInsertValidation":
        /*
         * APPEL AU DAO
         */
        $idHotel = filter_input(INPUT_POST, "idHotel");
        $nomHotel= filter_input(INPUT_POST, "nomHotel");
        $ville= filter_input(INPUT_POST, "ville");
        $cp= filter_input(INPUT_POST, "cp");
        $telHotel= filter_input(INPUT_POST, "telHotel");
        


        if ($idHotel != null && $nomHotel != null && $ville != null && $cp != null && $telHotel != null ) {
            
            Transaxion::initialiser($pdo);
            $HotelDAO = new HotelDAO($pdo);
            $Hotel = new Hotel($idHotel, $nomHotel, $ville, $cp, $telHotel);
            $lsMessage = $HotelDAO->insert($Hotel) . " enregistrement ajouté";
            Transaxion::valider($pdo);
        } else {
            $lsMessage = "Toutes les saisies sont obligatoires";
        }
        include '../boundaries/HotelInsertIHM.php';
        break;

    //...cas du selectAll
    case "HotelSelectAll":
        $lsContenu = "";
        //....instanciation de l'objet
        $HotelDAO = new HotelDAO($pdo);
        $tLines = $HotelDAO->selectAll();

        //....on boucle sur chaque ligne et valorisation 
        foreach ($tLines as $line) {
            $lsContenu .= "<tr>\n";
            $lsContenu .= "<td class='borde'>" . $line->getIdHotel() . "</td>\n";
            $lsContenu .= "<td class='borde'>" . $line->getNomHotel() . "</td>\n";

            $lsContenu .= "</tr>\n";
        }
        include '../boundaries/HotelSelectAllIHM.php';
        break;

    //...cas du Delete
    case "HotelDelete":
        
        $HotelDAO= new HotelDAO($pdo);
        $tLines = $HotelDAO->selectAll();
        include '../boundaries/HotelDeleteIHM.php';
        break;

    //...cas du deleteValidation en hidden
    case "HotelDeleteValidation":
        /*
         * APPEL AU DAO
         */
        $idHotel = filter_input(INPUT_POST, "idHotel");
        $nomHotel= filter_input(INPUT_POST, "nomHotel");

        if ($idHotel != null) {
            Transaxion::initialiser($pdo);
            $HotelDAO = new HotelDAO($pdo);
            $Hotel = new Hotel($idHotel, $nomHotel);
            $lsMessage = $HotelDAO->delete($Hotel) . " enregistrement supprimé";
            Transaxion::valider($pdo);
        } else {
            $lsMessage = "Toutes les saisies sont obligatoires";
        }
        include '../boundaries/HotelDeleteIHM.php';
        break;

    case "HotelUpdate":

        $HotelDAO= new HotelDAO($pdo);
        $tLines = $HotelDAO->selectAll();

        include '../boundaries/HotelUpdateIHM.php';
        break;

    case "HotelUpdateSelection":
        
        $HotelDAO = new HotelDAO($pdo);
        
        $tLines = $HotelDAO->selectAll();

                
        
        //... on stocke la valeur de l'option selectionnée dans une variable $id
        $id = filter_input(INPUT_POST, "listeHotel");
   
        $dev = $HotelDAO->selectOne($id);
        
       
        $lsNon = $dev->getNomHotel();
        


        include '../boundaries/HotelUpdateIHM.php';
        break;

    //...cas du UpdateValidation en hidden
    case "HotelUpdateValidation":
        /*
         * APPEL AU DAO
         */
        // affiche la liste déroulante de façon permanente 
        $HotelDAO = new HotelDAO($pdo);
        $tLines = $HotelDAO->selectAll();


        $idHotel = filter_input(INPUT_POST, "idHotel");
        $nomHotel = filter_input(INPUT_POST, "nomHotel");


        if ($idHotel != null && $nomHotel != null) {
            Transaxion::initialiser($pdo);
            $HotelDAO = new HotelDAO($pdo);
            $Hotel = new Hotel($idHotel, $nomHotel);
            $lsMessage = $HotelDAO->update($Hotel) . " enregistrement modifié";
            Transaxion::valider($pdo);
        } else {
            $lsMessage = "Toutes les saisies sont obligatoires";
        }
        include '../boundaries/HotelUpdateIHM.php';
        break;

    default:
        include '../boundaries/AccueilIHM.php';
        break;
}
?>    














