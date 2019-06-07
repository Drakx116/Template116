<?php

class AdministrationManager extends Database
{

    // FONCTIONS PUBLIQUES, FAISANT LE LIEN AVEC LE CONTROLLEUR


    // RECUPERE LES INFORMATIONS DE CONNEXION DU COMPTE ADMINISTRATEUR

    public function connectAdmin($email)
    {
        $this->getDatabase();
        return $this->checkLog($email);
    }


    // RECUPERE TOUS LES COMPTES ADMINISTRATEURS
    public function getAllAdmin()
    {
        $this->getDatabase();
        return $this->getAdmin();
    }


    // SUPPRIME UN COMPTE AMDINISTRATEUR
    public function delete($email)
    {
        $this->getDatabase();
        return $this->removeAdmin($email);
    }



    // FONCTIONS PRIVEES



    private function checkLog($email)
    {
        $infos = [];
        $req_check = self::$_database->prepare("SELECT username, password FROM admin WHERE email = ?");
        $req_check->execute(array($email));
        while($result = $req_check->fetch(PDO::FETCH_ASSOC))
        {
            $infos[] = new Admin($result);
        }
        $req_check->closeCursor();
        return $infos;
    }

    private function getAdmin()
    {
        $infos = [];
        $req_check = self::$_database->prepare("SELECT username, email FROM admin");
        $req_check->execute();
        while($result = $req_check->fetch(PDO::FETCH_ASSOC))
        {
            $infos[] = new Admin($result);
        }
        $req_check->closeCursor();
        return $infos;
    }

    private function removeAdmin($email)
    {
        $req_remove = self::$_database->prepare("DELETE FROM admin WHERE email = ?");
        $req_remove->execute(array($email));
        $req_remove->closeCursor();
        return$req_remove->rowCount();
    }

}