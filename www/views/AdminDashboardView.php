<!-- VUE DE L'ACCUEIL DE LA SECTION ADMINISTRATION -->

<body>
    <div class="main-container">
        <h2> Dashboard </h2>
        <p> Welcome Back, <?= $_SESSION["AdminAccount"]; ?>.</p>

        <?php
        if(count($data["admin"]))
        {
            ?>
            <div>
                <table>
                    <tbody>
                    <tr>
                        <th id="head-table"> Username </th>
                        <th id="head-table"> E-Mail  </th>
                        <th id="head-table"> Delete </th>
                    </tr>
                    <?php
                    foreach($data["admin"] as $admin)
                    {
                        ?>
                        <tr>
                            <td> <?php echo $admin->getUsername(); if($admin->getUsername() == $_SESSION["AdminAccount"]) { echo " (You)";} ?>  </td>
                            <td> <?= $admin->getEmail() ?> </td>
                            <td>
                                <form method="POST">
                                    <input hidden type="text" name="email" value="<?= $admin->getEmail() ?>">
                                    <button class="btn-icon" name="validateDeleteAdmin" type="submit" id="delete"> <i class="fas fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php
        }
        else
        {
            ?>
            <p> <i> No account yet. </i></p>
            <a href="<?= URL ?> administration/add"> Add One. </a>
            <?php
        }
        ?>
    </div>
</body>