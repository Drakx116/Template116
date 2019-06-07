<?php

class RegisterController
{
    public $_infos = [];
    private $_manager;
    private $_view;

    public function __construct($url)
    {
        // GENERATION DU FORMULAIRE D'INSCRIPTION (UTILISATEUR)
        require_once "content/Geolocalization.php";
        $geo = new Geolocalization;
        $position = array(
            "region" => $geo->getRegion(),
            "country" => $geo->getCountry()
        );


        $this->_view = new View($url[0]);

        if(isset($_POST["validateRegistration"]))
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

            if($this->check($email)) { $error .= "This E-Mail Address is already used. <br>"; }

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
                $this->_infos = array(
                    "gender" => $gender,
                    "firstName" => $firstName,
                    "lastName" => $lastName,
                    "birthdate" => $birthdate,
                    "job" => $job,
                    "region" => $region,
                    "country" => $country,
                    "email" => $email,
                    "password" => password_hash($password, PASSWORD_BCRYPT)
                );

                $mailList = [];

                // SI TOUT SE PASSE BIEN, ON AJOUTE LE NOUVEL UTILISATEUR

                $this->_manager = new RegistrationManager;
                $this->_manager->insert($this->_infos);



                // PUIS ON ENVOIE UN MAIL A L'UTILISATEUR ET A TOUS LES COMPTES ADMINISTRATEURS


                $adminMail = $this->_manager->getAdminInfos();
                foreach($adminMail as $admin)
                    { array_push($mailList, $admin->getEmail()); }
                array_push($mailList, $email); // LISTE DES COMPTES ADMINISTRATEURS


                for($i = 0; $i < count($mailList); $i++)
                {
                    if($i == count($mailList) - 1)  // DERNIER ELEMENT : MAIL UTLISATEUR
                        {
                            $this->sendMail($mailList[$i], 0);
                        }
                    else  // MAILS ADMINISTRATEURS
                        {
                            $this->sendMail($mailList[$i], 1);
                        }
                }

                $this->_view = new View("RegisterComplete");
                $this->_view->generate(array($email));
            }
            else { $this->_view->generate(array("position" => $position, "error" => $error)); }



        }
        else
        { $this->_view->generate(array("position" => $position)); }
    }

    private function check($email)
    {
        // VERIFIE QUE L'ADDRESSE MAIL N'EST PAS DEJA PRISE
        $this->_manager = new RegistrationManager;
        return $this->_manager->check($email);
    }

    private function sendMail($to, $isAdmin)
    {
        // ENVOIE UN MAIL EN FONCTION DU ROLE (ADMINISTRATEUR OU NON)
        if($isAdmin)
            { $subject = "New Registration."; }
        else
            { $subject = "Registration Confirmation"; }
        $message =
                "<html>
                    <body>
                        <h3> Informations  </h3>
                        <p> 
                            <b> E-Mail : </b> " . $this->_infos["email"] . " <br>
                            <b> First Name : </b> " . ucwords($this->_infos["firstName"]) . " <br>
                            <b> Last Name : </b> " . ucwords($this->_infos["lastName"]) . " <br>
                            <b> Gender : </b> " . ucfirst($this->_infos["gender"]) . " <br>
                            <b> Job : </b> " . $this->_infos["job"] . " <br>
                            <b> Region : </b> " . $this->_infos["region"] . " <br>
                            <b> Country : </b> " . $this->_infos["country"] . " <br>
                        </p>
                    </body>
                </html>";

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf-8';
        $headers[] = 'From: Drakx Localhost <drakx.localhost@gmail.com>';
        mail($to, $subject, $message, implode("\r\n", $headers));
    }
}


