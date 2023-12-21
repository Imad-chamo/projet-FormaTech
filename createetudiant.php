<?php
require_once 'classes/Autoloader.php';
Autoloader::register();


$pdo = Database::getPDO();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success = Etudiant::create($pdo, $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['date_naissance'], $_POST['num_etudiant'], $_POST['promo']);
    $message = $success ? 'Formation created successfully.' : 'Failed to create formation.';
}
?>



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<?php include 'header.php' ?>
<div class="container mt-5">
    <form method="POST">
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" id="nom" name="nom">
        </div>

        <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" class="form-control" id="prenom" name="prenom">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="date_naissance">Date de naissance:</label>
            <input type="date" class="form-control" id="date_naissance" name="date_naissance">
        </div>

        <div class="form-group">
            <label for="num_etudiant">Numéro étudiant:</label>
            <input type="text" class="form-control" id="num_etudiant" name="num_etudiant">
        </div>

        <div class="form-group">
            <label for="promo">Promo:</label>
            <input type="text" class="form-control" id="promo" name="promo">
        </div>
        

        <button type="submit" class="btn btn-primary mt-3">Créer l'étudiant(e)</button>
    </form>
</div>
<?php if (!empty($message)) : ?>
    <div class="alert alert-info">
        <?php echo $message; ?>
    </div>
<?php endif; ?>