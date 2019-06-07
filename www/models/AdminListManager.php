<?php

class AdminListManager extends Database
{

    // FONCTIONS PUBLIQUES, FAISANT LE LIEN AVEC LE CONTROLLEUR


    // RECUPERE TOUS LES COMPTES UTLISATEURS
    public function getUsers()
    {
        $this->getDatabase();
        return $this->getAllUsers();
    }


    // SUPPRIME UN COMPTE UTILISATEUR
    public function deleteUser($email)
    {
        $this->getDatabase();
        return $this->removeUser($email);
    }



    // FONCTIONS PRIVEES



    private function getAllUsers()
    {
        $infos = [];
        $req_users = self::$_database->prepare("SELECT id, gender, firstName, lastName, birthdate, job, region, country, email FROM users ORDER BY  country, region ASC");
        $req_users->execute(array());
        while($result = $req_users->fetch(PDO::FETCH_ASSOC))
            { $infos[] = new Users($result); }
        $req_users->closeCursor();
        return $infos;
    }

    private function removeUser($email)
    {
        $req_delete = self::$_database->prepare("DELETE FROM users WHERE email = ?");
        $req_delete->execute(array($email));
        $req_delete->closeCursor();
        return $req_delete->rowCount();
    }
}