<?php

class Users
{
    private $_id;
    private $_gender;
    private $_firstName;
    private $_lastName;
    private $_birthdate;
    private $_job;
    private $_region;
    private $_country;
    private $_email;
    private $_password;

    // CONSTRUCTEUR

    public function __construct(array $users) { $this->hydrate($users); }

    // HYDRATATION

    public function hydrate(array $users)
    {
        foreach($users as $key => $info)
        {
            $setter = 'set'.ucfirst($key);
            if(method_exists($this, $setter))
            {
                $this->$setter($info);
            }
        }
    }

    // MUTATEURS

    public function getId() { return $this->_id; }
    public function setId($id) { $this->_id = $id; }

    public function getGender() { return $this->_gender; }
    public function setGender($gender) { $this->_gender = $gender; }

    public function getFirstName() { return $this->_firstName; }
    public function setFirstName($firstName) { $this->_firstName = $firstName; }

    public function getLastName() { return $this->_lastName; }
    public function setLastName($lastName) { $this->_lastName = $lastName; }

    public function getBirthdate() { return $this->_birthdate; }
    public function setBirthdate($birthdate) { $this->_birthdate = $birthdate; }

    public function getJob() { return $this->_job; }
    public function setJob($job) { $this->_job = $job; }

    public function getRegion() { return $this->_region; }
    public function setRegion($region) { $this->_region = $region; }

    public function getCountry() { return $this->_country; }
    public function setCountry($country) { $this->_country = $country; }

    public function getEmail() { return $this->_email; }
    public function setEmail($email) { $this->_email = $email; }

    public function getPassword() { return $this->_password; }
    public function setPassword($password) { $this->_password = $password; }
}