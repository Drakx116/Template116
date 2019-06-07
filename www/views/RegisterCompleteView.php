<!-- VUE DE LA CONFIRMATION D'INSCRIPTION DE LA SECTION UTLISATEUR -->

<?php
    $email = "";
    foreach($data as $message) { $email = $message; }
?>

<body>
    <div class="main-container">
        <p> <?= "An email at " . $email . " has been sent." ?> </p>
        <a href="<?= URL ?>"> Back </a>
    </div>
</body>