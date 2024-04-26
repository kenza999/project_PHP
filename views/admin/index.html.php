
<section class="container">
    <h2>Liste des Utilisateurs Inscrits</h2>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Role</th>
                <th>Prenom</th>
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
                    <td><?= $user->getNom() . " " . $user->getUsername() ?></td>
                    <td>
                    <a href="<?= addLink("admin", "user", "delete", $user->getId()) ?>" class="btn btn-secondary">
    <i class="fa fa-trash"></i>
</a>

                        <a href="<?= addLink("admin","user", "show").'/'.$user->getId()?>" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Détails
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php include __DIR__ . "/../views/message.html.php";?>
<!-- Inclure le script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
