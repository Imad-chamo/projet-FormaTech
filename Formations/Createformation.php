<?php

$titre = 'Création de fromation';
include '../includes/header.php';

$pdo = Database::getPDO();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $abreviation = isset($_POST['abreviation']) ? $_POST['abreviation'] : null;
    $is_public = isset($_POST['is_public']) ? $_POST['is_public'] : null;
    $success = Formation::create($pdo, $_POST['name'], $_POST['duree'], $abreviation, $_POST['RNCP_niveau'], $is_public);
    $message = $success ? 'Formation créée avec succès.' : 'Erreur dans la création.';
}

if (isset($_GET['id'])) {
    $formationId = $_GET['id'];
    $existingFormation = Formation::getFormationById($pdo, $formationId);
} else {
    $existingFormation = null;
}

if (!empty($message)) {
    echo '<p>' . htmlspecialchars($message) . '</p>';
}

Formation::renderForm('creer',$existingFormation);

include '../includes/footer.php'; 
?>

<?php if (!empty($message)) : ?>
    <div id="alert-message" class="alert alert-info d-flex justify-content-center align-items-center">
        <?php echo $message; ?>
    </div>
<?php endif; ?>
