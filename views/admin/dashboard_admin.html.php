<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Inclure les styles Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Barre de navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Dashboard Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
 
             <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Utilisateurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Paramètres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= addLink("user","logout")?>" tabindex="-1" aria-disabled="true">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Contenu du dashboard -->
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-3">
            <!-- Menu latéral -->
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">Tableau de bord</a>
                <a href="#" class="list-group-item list-group-item-action">Articles</a>
                <a href="#" class="list-group-item list-group-item-action">Utilisateurs</a>
                <a href="<?= addLink("admin","User","checkUser")?>" class="list-group-item list-group-item-action">verificationUser</a>
            </div>
        </div>
        <div class="col-md-9">
            <!-- Contenu principal -->
            <h2>Tableau de bord</h2>
            <p>Bienvenue sur le tableau de bord admin.</p>
        </div>
    </div>
</div>

<!-- Inclure le script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
