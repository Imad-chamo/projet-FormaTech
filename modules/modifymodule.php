<?php
include '../includes/header.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $module = Module::getModuleById($pdo, $_POST['id']);
    $success = $module->updatemodule($pdo, $_POST['module_name'], $_POST['module_duree'], $_POST['formation_id']);

    $message = $success ? 'Module updated successfully.' : 'Erreur dans la mise à jour du module.';
}

if (isset($_GET['id'])) {
    $moduleId = $_GET['id'];
    $existingModule = Module::getModuleById($pdo, $moduleId);
} else {
    $existingModule = null;
}

if (!empty($message)) {
    echo '<p>' . htmlspecialchars($message) . '</p>';
}

Module::renderForm('modifier', $existingModule);

include '../includes/footer.php';
?>
























