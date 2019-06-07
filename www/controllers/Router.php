<?php

require_once "views/View.php";
class Router
{
    private $_controller;

    // APPELLE LE BON CONTROLLEUR EN FONCTION DE L'URL ET CHARGE LES MODELES

    public function initRoute()
    {
        spl_autoload_register(function($modelName){
            require_once "models/" . $modelName . ".php";
        });

        if(isset($_GET["action"]))
        {
            $url = explode("/", filter_var($_GET["action"], FILTER_SANITIZE_URL));
            $controllerName = ucfirst(strtolower($url[0]));
            $controllerClass = $controllerName . "Controller";
            $controllerFile = "controllers/" . $controllerClass . ".php";

            if(file_exists($controllerFile))
            {
                require_once $controllerFile;
                $this->_controller = new $controllerClass($url);
            }
            else
            {
                // SI UN CONTROLLEUR N'EST PAS TROUVE, ON REDIRIGE SUR UNE PAGE D'ERREUR

                $path = (count($url) > 1) ? "../404" : "error/404";
                header("Location:" . $path);
            }
        }
        else
        {
            header("Location: home");
        }
    }
}