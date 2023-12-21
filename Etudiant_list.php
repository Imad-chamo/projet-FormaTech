<?php
require_once 'classes/Autoloader.php';
Autoloader::register();


$pdo = Database::getPDO();
$etudiants = Etudiant::getAll($pdo);
?>

<!DOCTYPE html>
<html>
<head>
    <title>$etudiant List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-16">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Date de Naissance</th>
                            <th>Numéro Etudiant</th>
                            <th>Promo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($etudiants as $etudiant) : ?>
                            <tr>
                                <td><?= $etudiant->getPrenom() ?></td>
                                <td><?= $etudiant->getNom() ?></td>
                                <td><?= $etudiant->getEmail() ?></td>
                                <td><?= $etudiant->getDateNaissance() ?></td>
                                <td><?= $etudiant->getNumEtudiant() ?></td>
                                <td><?= $etudiant->getPromo() ?></td>
                                <td>
                                    <a href="suppretudiant.php?id=<?= $etudiant->getId() ?>" class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer cet(te) étudiant(e) ?')">Supprimer</a>
                                    <a href="modifetudiant.php?id=<?= $etudiant->getId() ?>" class="btn btn-primary" style="margin-left: 10px;">Modifier</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="text-center mt-3">
                    <a href="createetudiant.php" class="btn btn-primary">Créer un nouvel étudiant</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
