<?php
require_once 'classes/Autoloader.php';
Autoloader::register();

$pdo = Database::getPDO();

$formations = Formation::getAll($pdo);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formation List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <!-- 'includes/header.php' -->

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
                                    <a href="deleteformation.php?id=<?= $formation->getId() ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this formation?')">Supprimer</a>
                                    <a href="modifyformation.php?id=<?= $formation->getId() ?>" class="btn btn-primary" style="margin-left: 10px;">Modifier</a>
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
</body>
</html>
