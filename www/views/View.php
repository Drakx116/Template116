<?php

class View
{
    private $_file;
    private $_title;

    public function __construct($action)
    {
        // GENERE LA VUE EN FONCTION DU CONTROLLEUR
        $this->_file = "views/" . ucfirst($action) . "View.php";
        $this->_title = ucfirst($action);
    }

    public function generate($data)
    {
        // RENVOIE l'AFFICHAGE DANS LE TEMPLATE
        $viewContent = $this->generateFile($this->_file, $data);
        echo $this->generateFile("views/template.php", array("title" => $this->_title, "content" => $viewContent));
    }

    private function generateFile($file, $data)
    {
        // SI LE FICHIER EXISTE, ON TRAITE LES DONNEES POUR LES ENVOYER DANS LA VUE
        if(file_exists($file))
        {
            extract($data);
            ob_start();
            require_once $file;
            return ob_get_clean();
        }
    }
}