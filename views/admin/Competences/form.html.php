<?php
$mode = $mode ?? "insertion";
require "views/errors_form.html.php";
?>
<section class="interface">
<form method="post">
    <div class="form-group mt-3">
        <label for="NomCompetence">Competences</label>
    <input type="text" name="NomCompetence" id="NomCompetence">
    <button type="submit" class="btn btn-primary" name="register">
            <?= $mode == "suppression" ? "Confirmer" : "Enregistrer" ?>
        </button>
        <a href="<?= addLink("User") ?>" class="btn btn-danger">Annuler</a>
    </div>
</form>
</section>