<?php
include '../includes/header.php';

$pdo = Database::getPDO();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : null;

    if ($id) {
        $success = Formation::delete($pdo, $id);
        $message = $success ? 'Formation deleted successfully.' : 'Erreur dans la suppression.';
        header('Location: Formation_list.php');
        exit();
    } else {
        $message = 'Invalid formation ID.';
    }
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

Formation::renderForm('delete', $existingFormation);

include '../includes/footer.php';
?>
