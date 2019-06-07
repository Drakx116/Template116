<!-- VUE DE LA LISTE DES COMPTES UTLISATEURS DE LA SECTION ADMINISTRATION -->

<body>
    <div class="main-container">
        <h2> All Users </h2>
        <?php
        if(count($data))
        {
            ?>
            <div class="list-container">
            <?php
                $currentCountry = "";
                foreach($data as $user)
                {
                    if($currentCountry != $user->getCountry())
                    {
                        $currentCountry = $user->getCountry();
                        ?> <h3> <?= $user->getCountry(); ?> </h3> <?php
                    }

                    $isFemale = 0;
                    if($user->getGender() == "female") { $isFemale = 1; }
                    ?>

                    <div class="list-user-content">
                        <div class="list-user-infos">
                            <p>
                                <b> Gender : </b>
                                <?php
                                    if($isFemale)
                                    { ?> <span id="female"> <?= ucfirst($user->getGender()) ?> <i class="fas fa-female"></i></span> <?php }
                                    else
                                    { ?> <span id="male"> <?= ucfirst($user->getGender()) ?> <i class="fas fa-male"></i></span> <?php }
                                ?><br>
                                <b> Full Name </b> : <?= $user->getFirstName() ?> <?= $user->getLastName() ?> <br>
                                <b> Birthdate : </b> <?= date("d/m/Y", strtotime($user->getBirthDate())) ?> <br>
                                <b> Email : </b> <?= $user->getEmail() ?> <br>
                                <b> Job : </b> <?= $user->getJob() ?> <br>
                                <b> Region : </b> <?= $user->getRegion() ?>
                            </p>
                        </div>
                        <div class="list-user-edit">
                            <div id="user-edit">
                                <a href="<?= URL . "administration/edit/".$user->getId() ?>" id="edit"><i class="fas fa-pen-alt"></i></a>
                                <form method="POST">
                                    <input hidden type="text" name="email" value="<?= $user->getEmail() ?>">
                                    <button name="delete" id="delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            ?>
            </div>
            <?php
        }
        else
        {
            ?>
            <p> No user yet. <br>
                <a href="<?= URL ?>administration/add"> Add One </a>
            </p> <?php
        }
        ?>
    </div>
</body>