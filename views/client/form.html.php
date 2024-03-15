<?php
$mode = $mode ?? "insertion";
require "views/errors_form.html.php";
?>

<form method="post">
    <div class="form-group mt-3">
        <label for="gender">Civilité <sup>*</sup></label>
        <select class="form-select" aria-label="Default select example" id="gender" name="gender" required>
            <option value="m" <?= ($user->getGender() === 'm') ? 'selected' : ''; ?>>Monsieur</option>
            <option value="f" <?= ($user->getGender() === 'f') ? 'selected' : ''; ?>>Madame</option>
        </select>
    </div>
    <div class="form-group mt-3">
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" id="firstname" class="form-control" value="<?= $user->getFirstname() ?>"
            <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>

    <div class="form-group mt-3">
        <label for="lastname">Nom</label>
        <input type="text" name="lastname" id="lastname" class="form-control" value="<?= $user->getLastname() ?>"
            <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>

    <div class="form-group mt-3">
        <label for="surname">Pseudo <sup>*</sup></label>
        <input type="text" name="surname" id="surname" class="form-control" value="<?= $user->getSurname() ?>"
            <?= $mode == "suppression" ? "disabled" : "" ?> required>
    </div>

    <div class="form-group mt-3">
        <label for="password">Mot de passe <sup>*</sup></label>
        <input type="text" name="password" id="password" class="form-control"
            <?= $mode == "suppression" ? "disabled" : "" ?> required>
    </div>

    <div class="form-group mt-3">
        <label for="email">Email <sup>*</sup></label>
        <input type="email" name="email" id="email" class="form-control" value="<?= $user->getEmail() ?>"
            <?= $mode == "suppression" ? "disabled" : "" ?> required>
    </div>

    <div class="form-group mt-3">
        <label for="birthday">Birthday</label>
        <input type="date" name="birthday" id="birthday" class="form-control" value="<?= $user->getBirthday() ?>"
            <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>

    <div class="form-group mt-3">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control" value="<?= $user->getPhone() ?>"
            <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>
    <?php if ($user->getRole() == ROLE_ADMIN):  ?>
    <div class="form-group mt-3">
        <label for="role">Role</label>
        <input type="text" name="role" id="role" class="form-control" value="<?= $user->getRole() ?>"
            <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>
    <?php endif;  ?>
    <div class="d-flex justify-content-between mt-3">
        <button type="submit" class="btn btn-primary" name="register">
            <?= $mode == "suppression" ? "Confirmer" : "Enregistrer" ?>
        </button>
        <a href="<?= addLink("user") ?>" class="btn btn-danger">Annuler</a>
    </div>
</form>