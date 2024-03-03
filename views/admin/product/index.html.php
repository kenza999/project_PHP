<?php
$mode = $mode ?? "insertion";
require "views/errors_form.html.php";
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group mt-3">
        <label for="category">Categorie <sup>*</sup></label>
        <select class="form-select" aria-label="Default select example" id="category" name="cat_id" required>
            <option value="">Selectionner une categorie</option>
            <?php foreach ($categories as $category): ?>
            <option value="<?= $category->getId() ?>" <?php if (isset($_POST['cat_id']) && ($_POST['cat_id'] == $category->getId())) { ?> selected <?php   } else { echo ''; } ?>><?= ($category->getType()) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group mt-3">
        <label for="title">Nom</label>
        <input type="text" name="title" id="title" class="form-control" value="<?= isset($_POST['title']) ? $_POST['title'] : null ?>" 
            <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>

    <div class="form-group mt-3">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control"><?= isset($_POST['description']) ? htmlspecialchars($_POST['description']) : null ?></textarea>
    </div>

    <div class="form-group mt-3">
        <label for="reference">Référence <sup>*</sup></label>
        <input type="text" name="reference" id="reference" class="form-control" value="<?= isset($_POST['reference']) ? $_POST['reference'] : null ?>" required>
    </div>

    <div class="form-group mt-3">
        <label for="price">Prix <sup>*</sup></label>
        <input type="text" name="price" id="price" class="form-control" value="<?= isset($_POST['price']) ? $_POST['price'] : null ?>" required>
    </div>

    <div class="form-group mt-3">
        <label for="stock">Stock <sup>*</sup></label>
        <input type="stock" name="stock" id="stock" class="form-control" value="<?= isset($_POST['stock']) ? $_POST['stock'] : null ?>">
    </div>

    <div class="form-group mt-3">
        <label for="photo">Photo</label>
        <input type="file" name="photo" id="photo" class="form-control">
    </div>
    <div class="d-flex justify-content-between mt-3">
        <button type="submit" class="btn btn-primary" name="register">
            <?= $mode == "suppression" ? "Confirmer" : "Enregistrer" ?>
        </button>
        <a href="<?= addLink("user") ?>" class="btn btn-danger">Annuler</a>
    </div>
</form>