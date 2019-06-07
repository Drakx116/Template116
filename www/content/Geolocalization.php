<?php

class Geolocalization
{
    private $_city;
    private $_region;
    private $_country;

    public function __construct() {
        $public_ip = file_get_contents('https://api.ipify.org');

        // Récupération de la position en fonction de l'adresse IP
        $infos = unserialize(file_get_contents('http://ip-api.com/php/'. $public_ip));
        if($infos['status'] == 'success')
        {
            $this->_city = $infos['city'];
            $this->_region = $infos['regionName'];
            $this->_country = $infos['country'];
        }
    }

    // MUTATEURS

    public function getCity() { return $this->_city; }

    public function getRegion() { return $this->_region; }

    public function getCountry() { return $this->_country; }
}