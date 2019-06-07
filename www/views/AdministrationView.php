<!-- VUE DE LA CONNEXION DE LA SECTION ADMINISTRATION -->

<?php
$error = "";

if(isset($data["error"]))
    { $error = $data["error"]; }
?>

<body>
    <div class="main-container">
        <h2> Administration </h2>
        <?php if($error) { ?> <div class="error-message"> <?= $error ?> </div> <?php } ?>
        <form method="POST" class="form-admin-login">
            <label for="email"> E-Mail Address </label>
            <input type="email" name="email" id="email" placeholder="E-Mail Address" value="<?php if(isset($_POST["email"])) { echo htmlspecialchars($_POST["email"]); } ?>">

            <label for="password"> Password </label>
            <input type="password" name="password" id="password" placeholder="Password">

            <input type="submit" name="validateAdminLogin" value="Login">
        </form>
    </div>
</body>