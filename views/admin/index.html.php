<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    <!-- Inclure les styles Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Inclure FontAwesome pour les icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Liste des Utilisateurs Inscrits</h2>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Role</th>
                <th>Prenom</th>
                <th>Mot de passe</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user->getId() ?></td>
                    <td>
                        <?php
                        switch ($user->getRole()):
                            case ROLE_ADMIN:
                                echo "Administrateur";
                                break;
                            case ROLE_USER:
                                echo "Utilisateur";
                                break;
                                case ROLE_ENTREPRISE:
                                     echo "Entreprise";
                                    break;
                        endswitch;
                        ?>
                    </td>
                    <td><?= $user->getUsername() ?></td>
                    <td><?= $user->getPassword_hash() ? "****" : "" ?></td>
                    <td><?= $user->getNom() . " " . $user->getUsername() ?></td>
                    <td>
                        <a href="<?= addLink("users", "update", $user->getId()) ?>" class="btn btn-primary btn-sm me-2">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                        <a href="<?= addLink("users", "delete", $user->getId()) ?>" class="btn btn-danger btn-sm me-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                            <i class="fas fa-trash"></i> Supprimer
                        </a>
                        <a href="<?= addLink("admin","user", "show").'/'.$user->getId()?>" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Détails
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Inclure le script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
