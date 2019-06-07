<?php

class AdministrationController
{
    private $_manager;
    private $_view;

    public function __construct($url)
    {
        // SI L'ADMINISTRATEUR EST CONNECTE
        if(isset($_SESSION["AdminAccount"]))
        {
            if(isset($url[1]))
            {

                // EN FONCTION DE L'URL, /administration/...
                switch($url[1])
                {
                    case "add":
                        // AJOUT D'UN COMPTE
                        require_once("controllers/content/UserAdd.php");
                        break;

                    case "edit":
                        // EDITION d'UN COMPTE
                        if(isset($url[2]))
                        {
                            require_once("controllers/content/UserEdit.php");
                        }
                        else { header("Location: " . URL . "administration/list"); } // ON REDIRIGE SI LE PARAMETRE N'EST PAS BON
                        break;

                    case "list":
                        // AFFICHAGE DES COMPTES UTLISATEUR
                        $this->_manager = new AdminListManager;

                        if(isset($_POST["delete"]) && isset($_POST["email"]) && $_POST["email"])
                            { if($this->_manager->deleteUser($_POST["email"])) // SUPPRESSION
                                { header("Location: ".URL."administration/list"); } }

                        $users = $this->_manager->getUsers();
                        $this->_view = new View("AdminList");
                        $this->_view->generate($users);
                        break;
                    default:
                        header("Location: ../administration");
                        break;
                }
            }
            else
            {
                // AFFICHAGE PAR DEFAUT DES COMPTES ADMINISTRATEURS

                $this->_manager = new AdministrationManager;
                if(isset($_POST["validateDeleteAdmin"]))
                    { if($this->_manager->delete($_POST["email"]))
                        { header("Location: " . URL . "administration"); } }

                $admin = $this->_manager->getAllAdmin();
                $this->_view = new View("AdminDashboard");
                $this->_view->generate(array("admin" => $admin));
            }
        }
        else
        {
            // CONNEXION AU PANEL D'ADMINISTRATION

            if(isset($_POST["validateAdminLogin"]))
            {
                $error = "";
                $email = "";
                $password = "";
                $hash = "";
                $session = "";


                // VERIFICATION DES CHAMPS

                if(!isset($_POST["email"]) || !($_POST["email"])) { $error .= "Missing E-Mail Address. <br>"; }
                else { $email = $_POST["email"]; }

                if(!isset($_POST["password"]) || !($_POST["password"])) { $error .= "Missing Password. <br>"; }
                else { $password = $_POST["password"]; }

                $this->_manager = new AdministrationManager;
                foreach($this->_manager->connectAdmin($email) as $info)
                {
                    $session = $info->getUsername();
                    $hash = $info->getPassword();
                }

                if($password && !(password_verify($password, $hash))) { $error .= "Invalid Identifiers. <br>"; }

                if(!$error)
                {
                    // SI TOUT SE PASSE BIEN, ON CREE LA SESSION

                    $_SESSION["AdminAccount"] = $session;
                    header("Location: ".URL."administration");
                }
                else
                {
                    $this->_view = new View($url[0]);
                    $this->_view->generate(array("error" => $error));
                }
            }


            $this->_view = new View($url[0]);
            $this->_view->generate(array());
        }
    }
}