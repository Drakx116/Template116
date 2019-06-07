<!-- AFFICHE LA BARRE DE NAVIGATION EN FONCTION DE L'ETAT DE CONNEXION A LA SECTION ADMINISTRATION  -->


<?php
if(isset($_SESSION["AdminAccount"]))
{
?>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-header">
                <div class="navbar-brand">
                    <a id="brand" href="<?= URL?>administration"> BRAND </a>
                </div>

                <div class="navbar-toggle-button" id="toggle-btn">
                    <i class="fas fa-bars"></i>
                </div>
            </div>

            <div class="navbar-items">
                <div class="navbar-left-content">
                    <a href="<?= URL ?>administration"><i class="fas fa-home"></i> <span class="text-description"> Dashboard </span> </a>
                </div>

                <div class="navbar-right-content">
                    <a class="last" href="<?= URL ?>administration/add"> <span class="navbar-icon"><i class="fas fa-user-plus"></i> </span>  Add </a>
                    <a class="last" href="<?= URL ?>administration/list"> <span class="navbar-icon"><i class="fas fa-th-list"></i> </span>  List </a>
                    <a class="last" href="<?= URL ?>logout"> <span class="navbar-icon"><i class="fas fa-sign-out-alt"></i> </span>  Logout </a>
                </div>
            </div>
        </div>
    </nav>
<?php
}
else
{
?>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-header">
                <div class="navbar-brand">
                    <a id="brand" href="<?= URL?>home"> BRAND </a>
                </div>

                <div class="navbar-toggle-button" id="toggle-btn">
                    <i class="fas fa-bars"></i>
                </div>
            </div>

            <div class="navbar-items">
                <div class="navbar-left-content">
                    <a href="<?= URL ?>"><i class="fas fa-home"></i> <span class="text-description"> Home </span> </a>
                </div>

                <div class="navbar-right-content">
                    <a class="last" href="<?= URL ?>register"> <span class="navbar-icon"><i class="fas fa-user-edit"></i> </span>  Register </a>
                </div>
            </div>
        </div>
    </nav>
<?php
}