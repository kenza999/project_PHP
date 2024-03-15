


<form action="">
                        <p>SIRET : Vérifié</p>
                        <p>Numero de siret:
    <label type="text" id="numero_siret" name="numero_siret" class="form-control my-2" placeholder="Numéro SIRET"><?= $user->getNumero_siret()?></label>
    </p>
    <div>
        <!-- affiche les informations pour le user -->
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= $user->getNom()?>">
    </div>
    <div>
        <label for="username">Prénom</label>
        <input type="text" name="username" id="username" class="form-control" value="<?= $user->getUsername()?>">
    </div>
    <!-- affiche adresse -->
    <div>
        <label for="adresse">Adresse</label>
        <input type="text" name="adresse" id="adresse" class="form-control" value="<?= $user->getAdresse()?>">
    </div>
    <!-- affiche ville -->
    <div>
        <label for="ville">Ville</label>
        <input type="text" name="ville" id="ville" class="form-control" value="<?= $user->getVille()?>">
    </div>
    <!-- affiche code postal -->
    <div>
        <label for="code_postal">Code postal</label>
        <input type="text" name="code_postal" id="code_postal" class="form-control" value="<?= $user->getCode_postal()?>">
    </div>
</form>