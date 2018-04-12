
<?php

//require_once '../entities/Clients.php';

/*
  ClientsDAO.php
 */
/*
  LE DAO de la table [Clients] de la BD [Uroom]
 */
require_once '../entities/Clients.php';

//....instatiatiation de la classe ClientsDAO
class ClientsDAO {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function insert($objet) {
        $liAffectes = 0;
        try {
            // ....requête SQL qui sera à executer
            $sql = "INSERT INTO clients(idClients, nomClientsClients, email, mdp, tel) VALUES(?,?,?,?,?)";
            $lcmd = $this->pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getIdClients());
            $lcmd->bindValue(2, $objet->getNomClients());
            $lcmd->bindValue(3, $objet->getEmail());
            $lcmd->bindValue(4, $objet->getMdp());
            $lcmd->bindValue(5, $objet->getTel());
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
            $sql = 'SELECT * FROM clients';
            //....on instancie l'objet PDO par la methode query
            $lrs = $this->pdo->query($sql);
            //.... on passe en fetchMode :
            //.... on parcourt un tableau associatif
            $lrs->setFetchMode(PDO::FETCH_ASSOC);
            while ($enr = $lrs->fetch()) {
                //....instanciation de l'objet  et ses attributs
            
                $objet = new Clients();
                $objet->setIdClients($enr['idClients']);
                $objet->setNomClients($enr['nomClients']);
                $objet->setEmail($enr['email']);
                $objet->setMdp($enr['mdp']);
                $objet->setTel($enr['tel']);

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
            $sql = 'SELECT * FROM clients WHERE idClients = ?';
            // ....la requête est se fait avec un : prepare/execute
            // .... toujours dans le cas d'un selectOne ( avec un where )
            //.... != selectAll (pas de where) => on utilise query
            $lcmd = $this->pdo->prepare($sql);
            //....bindValue va valoriser les differents index du tableau
            $lcmd->bindValue(1, $id);
            $lrs = $lcmd->execute();
            $enr = $lcmd->fetch(PDO::FETCH_ASSOC);
            $objet = new Clients();
            $objet->setIdClients($enr['idClients']);
            $objet->setNomClients($enr['nomClientsClients']);
            $objet->setEmail($enr['email']);
            $objet->setMdp($enr['mdp']);
            $objet->setTel($enr['tel']);
            
            
        } catch (PDOException $e) {
            $objet = null;
        }
        return $objet;
    }

    public function delete($objet) {
        $liAffectes = 0;
        try {
            // ....requête SQL qui sera à executer
            $sql = "DELETE FROM clients WHERE idClients = ?";
            // ....la requête est préparée avec un : prepare/execute
            // .... toujours dans le cas d'un selectOne ( avec un where )
            $lcmd = $this->pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getIdClients());
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
            $sql = "UPDATE clients SET nomClientsClients=? email=? mdp=? tel=? WHERE idClients=?";
            $lcmd = $this->pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getNomClients());
            $lcmd->bindValue(2, $objet->getIdClients());
            $lcmd->bindValue(3, $objet->getEmail());
            $lcmd->bindValue(4, $objet->getTel());

            //....execution de la requête
            $lcmd->execute();
            //.... compte le nomClientsbre de lignes affectées/modifiées
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





