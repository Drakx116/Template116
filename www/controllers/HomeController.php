<?php

class HomeController
{

    private $view;
    private $_manager;

    public function __construct($url)
    {
        // GENERE LA VUE DE L'ACCEUIL (UTILISATEUR)
        $this->view = new View($url[0]);
        $this->view->generate(array("Home"));
    }

}