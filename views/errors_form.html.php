<?php if (!empty($errors)) : ?>
    <div class="error-formulaire">
        <?php foreach ($errors as $err) : ?>
            <div class="text-danger"><?= $err ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>