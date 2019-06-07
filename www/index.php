<?php
    // APPELLE LE ROUTER ET DEFINIT UNE CONSTANTE URL, PERMETTANT DE CREER DES LIENS PLUS FACILEMENT
    session_start();
    define("URL", str_replace("index.php", "" ,
        (isset($_SERVER["HTTPS"]) ? "https" : "http" . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]")
    ));
    require "controllers/Router.php";
    $router = new Router();
    $router->initRoute();