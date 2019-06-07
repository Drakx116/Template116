<?php

class Admin
{
    private $_id;
    private $_username;
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

    public function getUsername() { return $this->_username; }
    public function setUsername($username) { $this->_username = $username; }

    public function getEmail() { return $this->_email; }
    public function setEmail($email) { $this->_email = $email; }

    public function getPassword() { return $this->_password; }
    public function setPassword($password) { $this->_password = $password; }
}