<?php

$h1 = "ERREUR 404 : La page n'existe pas";
include __DIR__ . "/../public/header.html.php";
?>

<h2>🛑 L'URL demandé n'existe pas</h2>

<a href="<?= ROOT ?>" class="btn btn-primary">
    <i class="fa fa-home"></i> Retourner à la page d'accueil
</a>

<?php
include __DIR__ . "/../public/footer.html.php";