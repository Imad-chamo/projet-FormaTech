<?php
include '../includes/header.php';

$formations = Formation::getAll($pdo);
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-16">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Durée de formation</th>
                        <th>Abréviation</th>
                        <th>niveau RNCP</th>
                        <th>Privé / Public</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($formations as $formation) : ?>
                        <tr>
                            <td><?= $formation->getId() ?></td>
                            <td><?= $formation->getName() ?></td>
                            <td><?= $formation->getduree() ?></td>
                            <td><?= $formation->getAbreviation() ?></td>
                            <td><?= $formation->getRNCP_niveau() ?></td>
                            <td><?= ($formation->getis_public() ? 'Public' : 'Private') ?></td>
                            <td>
                                <a href="deleteformation.php?id=<?= $formation->getId() ?>" class="btn btn-danger" >Delete</a>
                                <a href="modifyformation.php?id=<?= $formation->getId() ?>" class="btn btn-primary" style="margin-left: 10px;">Modify</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="text-center mt-3">
                <a href="createformation.php" class="btn btn-primary">Créer une nouvelle formation</a>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>