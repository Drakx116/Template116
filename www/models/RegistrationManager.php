<?php

class RegistrationManager extends Database
{

    // FONCTIONS PUBLIQUES, FAISANT LE LIEN AVEC LE CONTROLLEUR


    // VERIFIE L'UNICITE DE L'ADRESSE MAIL
    public function check($email)
    {
        $this->getDatabase();
        return $this->isUniqueEmail($email);
    }


    // RECUPERE LES ADDRESSES E-MAILS DES COMPTES AMDINISTRATEUR
    public function getAdminInfos()
    {
        $this->getDatabase();
        return $this->getAdminEmail();
    }


    // AJOUTE UN NOUVEAU COMPTE UTLISATEUR
    public function insert($infos)
    {
        $this->getDatabase();
        return $this->addUser($infos);
    }



    // FONCTIONS PRIVEES



    private function isUniqueEmail($email)
    {
        $req_unique = self::$_database->prepare("SELECT email FROM users WHERE email = ?");
        $req_unique->execute(array($email));
        $req_unique->closeCursor();
        return $req_unique->rowCount();
    }

    private function getAdminEmail()
    {
        $infos = [];
        $req_admin = self::$_database->prepare("SELECT email FROM admin");
        $req_admin->execute();
        while($result = $req_admin->fetch(PDO::FETCH_ASSOC))
        {
            $infos[] = new Admin($result);
        }
        $req_admin->closeCursor();
        return $infos;
    }

    private function addUser($infos)
    {
        $user = new Users($infos);
        $req_add = self::$_database->prepare("INSERT INTO users(gender, firstName, lastName, birthdate, job, region, country, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $req_add->execute(array($user->getGender(), $user->getFirstName(), $user->getLastName(), $user->getBirthdate(), $user->getJob(), $user->getRegion(), $user->getCountry(), $user->getEmail(), $user->getPassword()));
        $req_add->closeCursor();
        return $req_add->rowCount();
    }
}