<!-- TEMPLATE DE BASE APPELLANT LES DIFFERENTES DEPENDANCES -->

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $cpt = count(explode("/", filter_var($_GET["action"], FILTER_SANITIZE_URL))); // Nombre de paramètres en URL
    $path = "";
    for($i = 0; $i < $cpt-1; $i++) { $path .= "../"; } // Permet de remonter l'arborescence
    ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Domine" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?= $path ?>public/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= $path ?>public/css/navbar.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initiale-scale=1">
    <title><?= $title; ?></title>
</head>

<header>
    <?php require_once "views/content/navbar.php" ?>
</header>

<body>
<?= $content ?>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?=$path?>public/js/animation.js"></script>
<script type="text/javascript" src="<?=$path?>public/js/form-add.js"></script>
<script type="text/javascript" src="<?=$path?>public/js/form-edit.js"></script>
</body>

</html>