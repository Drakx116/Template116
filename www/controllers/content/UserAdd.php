<?php
$error = "";


// AJOUT D'UN COMPTE UTILISATEUR DANS LA SECTION ADMINISTRATION

if(isset($_POST["validateUserAdd"]))
{
    $error = "";
    $gender = "";
    $firstName = "";
    $lastName = "";
    $birthdate = "";
    $email = "";
    $password = "";
    $confirm_password = "";
    $job = "";
    $region = "";
    $country = "";


    // VERIFICATION DES CHAMPS

    if(!isset($_POST["gender"]) || empty($_POST["gender"])) { $error .= "Missing Gender.<br>"; }
    else { $gender = $_POST["gender"]; }

    if(!isset($_POST["first-name"]) || empty($_POST["first-name"])) { $error .= "Missing First Name.<br>"; }
    else { $firstName = $_POST["first-name"]; }

    if(!isset($_POST["last-name"]) || !($_POST["last-name"])) { $error .= "Missing Last Name.<br>"; }
    else { $lastName = $_POST["last-name"]; }

    if(!isset($_POST["birthdate"]) || !($_POST["birthdate"])) { $error .= "Missing Birthdate.<br>"; }
    else { $birthdate = $_POST["birthdate"]; }

    if(!isset($_POST["email"]) || !($_POST["email"])) { $error .= "Missing Email.<br>"; }
    else { $email = $_POST["email"]; }

    if($email && !(filter_var($email, FILTER_VALIDATE_EMAIL))) { $error .= "Invalid E-Mail Address. <br>"; }

    $this->_manager = new RegistrationManager;
    if($this->_manager->check($email)) { $error .= "This E-Mail Address is already used. <br>"; }

    if(!isset($_POST["password"]) || !($_POST["password"])) { $error .= "Missing Password.<br>"; }
    else { $password = $_POST["password"]; }

    if(!isset($_POST["confirm_password"]) || !($_POST["confirm_password"])) { $error .= "Missing Password Confirmation.<br>"; }
    else { $confirm_password = $_POST["confirm_password"]; }

    if($password && $confirm_password && !($password == $confirm_password)) { $error .= "Different passwords. <br>"; }

    if(!isset($_POST["job"]) || !($_POST["job"])) { $error .= "Missing Job.<br>"; }
    else { $job = $_POST["job"]; }

    if(!isset($_POST["region"]) || !($_POST["region"])) { $error .= "Missing Region.<br>"; }
    else { $region = $_POST["region"]; }

    if(!isset($_POST["country"]) || !($_POST["country"])) { $error .= "Missing Country.<br>"; }
    else { $country = $_POST["country"]; }

    if(!$error)
    {
        $infos = array(
            "gender" => $gender,
            "firstName" => $firstName,
            "lastName" => $lastName,
            "birthdate" => $birthdate,
            "job" => $job,
            "region" => $region,
            "country" => $country,
            "email" => $email,
            "password" => password_hash($password, PASSWORD_BCRYPT) // ON HACHE LE MOT DE PASSE
        );



        // SI TOUT VA BIEN, ON INSERE LE NOUVEL UTILISATEUR
        $this->_manager = new RegistrationManager;
        if($this->_manager->insert($infos))
        { header("Location: " . URL . "administration/list"); }
    }
}





// AJOUT D'UN COMPTE ADMINISTRATEUR DANS LA SECTION ADMINISTRATION

if(isset($_POST['validateAdminAdd']))
{
    $error = "";
    $username = "";
    $email = "";
    $password = "";
    $confirm_password = "";


    // VERIFICATION DES CHAMPS

    if(!isset($_POST["username"]) || empty($_POST["username"])) { $error .= "Missing Username.<br>"; }
    else { $username = $_POST["username"]; }

    if(!isset($_POST["email"]) || !($_POST["email"])) { $error .= "Missing Email.<br>"; }
    else { $email = $_POST["email"]; }

    if($email && !(filter_var($email, FILTER_VALIDATE_EMAIL))) { $error .= "Invalid E-Mail Address. <br>"; }

    $this->_manager = new AdminAddManager;
    if($this->_manager->checkEmail($email)) { $error .= "This E-Mail is already stored. <br>"; }

    if(!isset($_POST["password"]) || !($_POST["password"])) { $error .= "Missing Password.<br>"; }
    else { $password = $_POST["password"]; }

    if(!isset($_POST["confirm_password"]) || !($_POST["confirm_password"])) { $error .= "Missing Password Confirmation.<br>"; }
    else { $confirm_password = $_POST["confirm_password"]; }

    if($password && $confirm_password && $password != $confirm_password) { $error .= "Passwords are different.<br>"; }

    if(!$error)
    {
        $infos = array(
            "username" => $username,
            "email" => $email,
            "password" => password_hash($password, PASSWORD_BCRYPT)  // ON HACHE LE MOT DE PASSE
        );


        // SI TOUT VA BIEN, ON INSERE LE NOUVEL ADMINISTRATEUR
        $this->_manager = new AdminAddManager;
        if($this->_manager->insertAdmin($infos))
            { header("Location: " . URL . "administration"); }
    }

}



// AFFICHE LA VUE PAR DEFAUT

$this->_view = new View("AdminAdd");
$this->_view->generate(array("error" => $error));