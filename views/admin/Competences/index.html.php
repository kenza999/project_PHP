

<section class="interface">
    <h2>Liste des competence</h2>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Competence</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listeCompetences as $competences) : ?>
                <tr>
                    <td><?= $competences->getNomCompetence() ?></td>
                    <td>
<a href="<?= addLink("admin", "Competences", "delete" )."/". $competences->getId() ?>" class="btn btn-secondary">
                    <i class="fa fa-trash"></i>
</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>


<!-- Inclure le script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
