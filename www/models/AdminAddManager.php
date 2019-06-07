<?php

class AdminAddManager extends Database
{
    // FONCTIONS PUBLIQUES, FAISANT LE LIEN AVEC LE CONTROLLEUR


    // VERIFIE SI LE MAIL DANS LA TABLE ADMININISTATEUR
    public function checkEmail($email)
    {
        $this->getDatabase();
        return $this->check($email);
    }


    // INSERE UN NOUVEL ADMINISTRATEUR
    public function insertAdmin($infos)
    {
        $this->getDatabase();
        return $this->insert($infos);
    }



    // FONCTIONS PRIVEES



    private function check($email)
    {
        $req_check = self::$_database->prepare("SELECT id FROM admin WHERE email = ?");
        $req_check->execute(array($email));
        $req_check->closeCursor();
        return $req_check->rowCount();
    }

    private function insert($infos)
    {
        $admin = new Admin($infos);
        $req_insert = self::$_database->prepare("INSERT INTO admin(username, email, password) VALUES(?, ?, ?)");
        $req_insert->execute(array($admin->getUsername(), $admin->getEmail(), $admin->getPassword()));
        $req_insert->closeCursor();
        return $req_insert->rowCount();
    }
}