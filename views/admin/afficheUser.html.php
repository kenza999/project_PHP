
<body>
    <div class="container">
        <h1 class="mb-4"><?= $h1 ?></h1>
        <div class="card">
            <div class="card-header">
                Détails de l'utilisateur
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>username</th>
                            <th>nom</th>
                            <th>Email</th>
                            <th>Date de naissance</th>
                            <th>Adresse</th>
                            <th>Ville</th>
                            <th>Code postal</th> 
                            <th>Numero de téléphone</th>
                            <th>Numero de SIRET</th>
                            <th>Genre</th>
                            <th>Photo de Profil</th>
                            <th>Description d'utilisateur</th>
                            <th>Nationalité</th>
                            <th>ID</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
<?php if (isset($userfind) && !empty($userfind)) : ?>

    <?php if ($userfind) : ?>
        <tr>
            <td><?= $userfind->getUsername()?></td>
            <td><?= $userfind->getNom()?></td>
            <td><?= $userfind->getEmail()?></td>
            <td><?= $userfind->getDate_de_naissance()?></td>     
            <td><?= $userfind->getNumero_telephone()?></td>
            <td><?= $userfind->getNumero_siret()?></td>
            <td><?= $userfind->getGenre()?></td>
            <td><?= $userfind->getPhoto()?></td>
            <td><?= $userfind->getDescription_dutilisateur()?></td>
            <td><?= $userfind->getNationalite()?></td>
            <td><?= $userfind->getId()?></td>
            <td><?= $userfind->getRole()?></td>
        </tr>
    <?php else : ?>
        <tr>
            <td colspan="15">Cet utilisateur n'existe pas.</td>
        </tr>
    <?php endif; ?>

<?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>