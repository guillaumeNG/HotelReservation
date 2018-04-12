
<?php

//require_once '../entities/Hotel.php';

/*
  HotelDAO.php
 */
/*
  LE DAO de la table [Hotel] de la BD [UroomProject]
 */
require_once '../entities/Hotel.php';

//....instatiatiation de la classe HotelDAO
class HotelDAO {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function insert($objet) {
        $liAffectes = 0;
        try {
            // ....requête SQL qui sera à executer
            $sql = "INSERT INTO hotel(idHotel, nomHotel) VALUES(?,?)";
            $lcmd = $this->pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getIdHotel());
            $lcmd->bindValue(2, $objet->getNomHotel());
            $lcmd->bindValue(3, $objet->getVille());
            $lcmd->bindValue(4, $objet->getCp());
            $lcmd->bindValue(5, $objet->getTelHotel());
             
            $lcmd->execute();
            $liAffectes = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffectes = -1;
        }
        return $liAffectes;
    }

    public function selectAll() {
        $liste = array();
        try {
            // ....requête SQL qui sera à executer: $lrs= local record set
            // ....$lrs = curseur = matrice rectangulaire avec lignes et 
            //....colonnes
            $sql = 'SELECT * FROM hotel';
            //....on instancie l'objet PDO par la methode query
            $lrs = $this->pdo->query($sql);
            //.... on passe en fetchMode :
            //.... on parcourt un tableau associatif
            $lrs->setFetchMode(PDO::FETCH_ASSOC);
            while ($enr = $lrs->fetch()) {
                //....instanciation de l'objet et ses attributs
              
                $objet = new Hotel();
                $objet->setIdHotel($enr['idHotel']);
                $objet->setNomHotel($enr['nomHotel']);
//                $objet->setVille($enr['ville']);
//                $objet->setCp($enr['cp']);
//
//                $objet->setTelHotel($enr['telHotel']);



                $liste[] = $objet;
            }
            // ....traitement des erreurs par PDO sous forme d'exception
        } catch (PDOException $e) {
            $objet = null;
            $liste[] = $objet;
        }
        return $liste;
    }

    public function selectOne($id) {
        try {
            // ....requête SQL qui sera à executer: $lrs= local record set
            $sql = 'SELECT * FROM hotel WHERE idHotel = ?';
            // ....la requête est se fait avec un : prepare/execute
            // .... toujours dans le cas d'un selectOne ( avec un where )
            //.... != selectAll (pas de where) => on utilise query
            $lcmd = $this->pdo->prepare($sql);
            //....bindValue va valoriser les differents index du tableau
            $lcmd->bindValue(1, $id);
            $lrs = $lcmd->execute();
            $enr = $lcmd->fetch(PDO::FETCH_ASSOC);
            $objet = new Hotel();
            $objet->setIdHotel($enr['idHotel']);
            $objet->setNomHotel($enr['nomHotel']);
            $objet->setVille($enr['ville']);
            $objet->setCp($enr['cp']);
            $objet->setTelHotel($enr['telHotel']);

            
            
        } catch (PDOException $e) {
            $objet = null;
        }
        return $objet;
    }

    public function delete($objet) {
        $liAffectes = 0;
        try {
            // ....requête SQL qui sera à executer
            $sql = "DELETE FROM hotel WHERE idHotel = ?";
            // ....la requête est préparée avec un : prepare/execute
            // .... toujours dans le cas d'un selectOne ( avec un where )
            $lcmd = $this->pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getIdHotel());
            $lcmd->execute();
            $liAffectes = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffectes = -1;
        }
        return $liAffectes;
    }

    public function update($objet) {
        $liAffectes = 0;
        try {
            // ....requête SQL qui sera à executer
            $sql = "UPDATE hotel SET nomHotel=?  WHERE idHotel=?";
            $lcmd = $this->pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getNomHotel());
            $lcmd->bindValue(2, $objet->getIdHotel());

            //....execution de la requête
            $lcmd->execute();
            //.... compte le nombre de lignes affectées/modifiées
            $liAffectes = $lcmd->rowcount();
            //....configuration des erreurs traitées comme des exceptions
        } catch (PDOException $e) {
            $liAffectes = -1;
        }
        //....retourne la ligne affectée/modifiée
        return $liAffectes;
    }

}
?>





