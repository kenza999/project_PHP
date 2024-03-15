<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Inclure les styles Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Numéro de téléphone</th>
                    <th>Numéro de SIRET</th>
                    <th>Carte d'identité</th>
                    <th>Date de naissance</th>
                    <th>Genre</th>
                    <th>Photo de profil</th>
                    <th>Nationalité</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user as $verifications): ?>
                    <tr>
                        <td><?= $verifications->getUsername()?></td>
                        <td><?= $verifications->getNom() ?></td>
                        <td><?= $verifications->getEmail() ?></td>
                        <td><?= $verifications->getNumero_telephone() ?></td>
                        <td><?= $verifications->getNumero_siret()?></td>
                        <td><img style="height: 50px; width: 50px;" src="Public/image/<?= $verifications->getCarte_didentite() ?>" alt="carte d'identité"></td>
                        <td><?= $verifications->getDate_de_naissance() ?></td>
                        <td><?= $verifications->getGenre() ?></td>
                        <td><img style="height: 50px; width: 50px;" src="Public/photoProfile/<?= $verifications->getPhoto() ?>" alt="photo de profil"></td>
                        <td><?= $verifications->getNationalite() ?></td>
                        <td><?= $verifications->getDescription_dutilisateur()?></td>
                        <td>
                            
                           <a href="<?= addLink("admin", "user", "update").'/'.$verifications->getId()?>" class="btn btn-primary btn-sm me-2">
                            <i class="fas fa-edit"></i> Verification
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
