<?php
$this->_manager = new AdminEditManager;
if($this->_manager->checkUser($url[2])) // ON VERIFIE QUE L'ID EN PARAMETE CORRESPOND A UN COMPTE UTILISATEUR EXISTANT
{
    $infos = $this->_manager->getInfos($url[2]);

    if(isset($_POST["validateUserEdit"]))
    {
        $error = "";
        $gender = "";
        $firstName = "";
        $lastName = "";
        $birthdate = "";
        $job = "";
        $region = "";
        $country = "";


        // VERIFICATION DES CHAMPS

        if(!isset($_POST["gender"]) || !($_POST["gender"])) { $error .= "Missing Gender. <br>"; }
        else { $gender = $_POST["gender"]; }

        if(!isset($_POST["first-name"]) || !($_POST["first-name"])) { $error .= "Missing First Name. <br>"; }
        else { $firstName = $_POST["first-name"]; }

        if(!isset($_POST["last-name"]) || !($_POST["last-name"])) { $error .= "Missing Last Name. <br>"; }
        else { $lastName = $_POST["last-name"]; }

        if(!isset($_POST["birthdate"]) || !($_POST["birthdate"])) { $error .= "Missing Birthdate. <br>"; }
        else { $birthdate = $_POST["birthdate"]; }

        if(isset($_POST["check-job"]))
        {
            if(!isset($_POST["job"]) || !($_POST["job"])) { $error .= "Missing Job. <br>"; }
            else { $job = $_POST["job"]; }
        }
        else
        {
            if(!isset($_POST["current-job"]) || !($_POST["current-job"])) { $error .= "Error with the job. <br>"; }
            else { $job = $_POST["current-job"]; }
        }

        if(!isset($_POST["region"]) || !($_POST["region"])) { $error .= "Missing Region. <br>"; }
        else { $region = $_POST["region"]; }

        if(!isset($_POST["country"]) || !($_POST["country"])) { $error .= "Missing Country. <br>"; }
        else { $country = $_POST["country"]; }

        if(!$error)
        {
            $update = array(
                "gender" => $gender,
                "firstName" => $firstName,
                "lastName" => $lastName,
                "birthdate" => $birthdate,
                "job" => $job,
                "region" => $region,
                "country" => $country
            );


            // SI TOUT SE PASSE BIEN, ON MODIFIE LES DONNEES DE L'UTILISATEUR EN QUESTION

            if($this->_manager->updateUser($update, $url[2]))
            { header("Location: " . URL . "administration/list"); }
        }
        else
        {
            $this->_view = new View("AdminEdit");
            $this->_view->generate(array("error" => $error, "data" => $infos));
        }
    }



    $this->_view = new View("AdminEdit");
    $this->_view->generate(array($infos));
}
else { header("Location: " . URL . "administration/list"); }