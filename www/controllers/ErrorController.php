<?php

class ErrorController
{
    private $_view;

    public function __construct($url)
    {
        // GENERE LA VUE EN CAS D'ERREUR (404)
        $this->_view = new View($url[0]);
        $this->_view->generate(array());

    }
}