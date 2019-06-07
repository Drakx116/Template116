<?php

class LogoutController
{

    public function __construct()
    {
        // DECONNEXION DE LA SECTION ADMINISTRATION
        $_SESSION = array();
        session_destroy();
        header("Location: " . URL);
    }
}