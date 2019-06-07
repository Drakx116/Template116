<?php

class AdminEditManager extends Database
{
    // FONCTIONS PUBLIQUES, FAISANT LE LIEN AVEC LE CONTROLLEUR


    // VERIFIE SI L'ID PASSE EN URL CORRESPOND A UN COMPTE UTLISATEUR INSCRIT
    public function checkUser($id)
    {
        $this->getDatabase();
        return $this->isValidUser($id);
    }


    // RECUPERE CERTAINES INFORMATIONS D'UN UTLISATEUR INSCRIT
    public function getInfos($id)
    {
        $this->getDatabase();
        return $this->getUsersInfos($id);
    }


    // MET A JOUR LES DONNEES DE L'UTILISATEUR
    public function updateUser($infos, $id)
    {
        $this->getDatabase();
        return $this->updateUserInfos($infos ,$id);
    }



    // FONCTIONS PRIVEES



    private function isValidUser($id)
    {
        $req_check = self::$_database->prepare("SELECT email FROM users WHERE id = ?");
        $req_check->execute(array($id));
        $req_check->closeCursor();
        return $req_check->rowCount();
    }

    private function getUsersInfos($id)
    {
        $infos = [];
        $req_infos = self::$_database->prepare("SELECT id, gender, firstName, lastName, birthdate, job, region, country FROM users WHERE id = ?");
        $req_infos->execute(array($id));
        while($result = $req_infos->fetch(PDO::FETCH_ASSOC))
        {
            $infos = new Users($result);
        }
        $req_infos->closeCursor();
        return $infos;
    }

    private function updateUserInfos($infos, $id)
    {
        $user = new Users($infos);
        $req_update = self::$_database->prepare("UPDATE users SET gender = ?, firstName = ?, lastName = ?, birthdate = ?, job = ?, region = ?, country = ? WHERE id = ?");
        $req_update->execute(array($user->getGender(), $user->getFirstName(), $user->getLastName(), $user->getBirthdate(), $user->getJob(), $user->getRegion(), $user->getCountry(), $id));
        $req_update->closeCursor();
        return $req_update->rowCount();
    }
}