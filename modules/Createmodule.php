<?php
include '../includes/header.php';

$pdo = Database::getPDO();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success = Module::createmodule($pdo, $_POST['module_name'], $_POST['module_duree'], $_POST['formation_id']);
    $message = $success ? 'Module created successfully.' : 'Erreur dans la création du module.';
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

Module::renderForm('creer', $existingModule);

include '../includes/footer.php';
?>

<?php if (!empty($message)) : ?>
    <div class="alert alert-info">
        <?php echo $message; ?>
    </div>
<?php endif; ?>
