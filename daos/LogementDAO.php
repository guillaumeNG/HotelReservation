<?php

/*
  LogementDAO.php
 */
/*
  LE DAO de la table [Logement] de la BD [GestionProjet]
 */
require_once '../entities/Logement.php';

//....instatiatiation de la classe LogementDAO
class LogementDAO {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function selectAll() {
        $liste = array();
        try {
            // ....requête SQL qui sera à executer: $lrs= local record set
            // ....$lrs = curseur = matrice rectangulaire avec lignes et 
            //....colonnes
            $sql = 'SELECT * FROM logement';
            //....on instancie l'objet PDO par la methode query
            $lrs = $this->pdo->query($sql);
            //.... on passe en fetchMode :
            //.... on parcourt un tableau associatif
            $lrs->setFetchMode(PDO::FETCH_ASSOC);
            while ($enr = $lrs->fetch()) {
                //....instanciation de l'objet  projet ayant les attributs
                //....idLogement - typeLogement - taille - disponibilite
                $objet = new Logement();
                $objet->setIdLogement($enr['idLogement']);
                $objet->setTypeLogement($enr['typeLogement']);
                $objet->setTaille($enr['taille']);
                $objet->setDisponibilite($enr['disponibilite']);
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
            $sql = 'SELECT * FROM logement WHERE idLogement = ?';
             // ....la requête est se fait avec un : prepare/execute
            // .... toujours dans le cas d'un selectOne ( avec un where )
            //.... != selectAll (pas de where) => on utilise query
            $lcmd = $this->pdo->prepare($sql);
            //....bindValue va valoriser les differents index du tableau
            $lcmd->bindValue(1, $id);
            $lrs = $lcmd->execute();
            $enr = $lcmd->fetch(PDO::FETCH_ASSOC);
            $objet = new Logement();
            $objet->setIdLogement($enr['idLogement']);
            $objet->setTypeLogement($enr['typeLogement']);
            $objet->setTaille($enr['taille']);
            $objet->setDisponibilite($enr['disponibilite']);
        } catch (PDOException $e) {
            $objet = null;
        }
        return $objet;
    }

    public function delete($objet) {
        $liAffectes = 0;
        try {
            // ....requête SQL qui sera à executer
            $sql = "DELETE FROM logement WHERE idLogement = ?";
            // ....la requête est préparée avec un : prepare/execute
            // .... toujours dans le cas d'un selectOne ( avec un where )
            $lcmd = $this->pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getIdLogement());
            $lcmd->execute();
            $liAffectes = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffectes = -1;
        }
        return $liAffectes;
    }

    public function insert($objet) {
        $liAffectes = 0;
        try {
             // ....requête SQL qui sera à executer
            $sql = "INSERT INTO logement(idLogement,typeLogement,taille,disponibilite) VALUES(?,?,?,?)";
            $lcmd = $this->pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getIdLogement());
            $lcmd->bindValue(2, $objet->getTypeLogement());
            $lcmd->bindValue(3, $objet->getTaille());
            $lcmd->bindValue(4, $objet->getDisponibilite());

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
            $sql = "UPDATE logement SET typeLogement=?,taille=?,disponibilite=? WHERE idLogement=?";
            $lcmd = $this->pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getTypeLogement());
            $lcmd->bindValue(2, $objet->getTaille());
            $lcmd->bindValue(3, $objet->getDisponibilite());
            $lcmd->bindValue(4, $objet->getIdLogement());
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
