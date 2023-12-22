<?php
include '../includes/header.php';

$pdo = Database::getPDO();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formationId = $_POST['formation_id'];
    $year = $_POST['year'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];

    $success = Promotion::createpromotion($pdo, $formationId, $year, $startDate, $endDate);
    $message = $success ? 'Promotion created successfully.' : 'Erreur dans la création.';
}

if (isset($_GET['id'])) {
    $promotionId = $_GET['id'];
    $existingPromotion = Promotion::getPromotionById($pdo, $promotionId);
} else {
    $existingPromotion = null;
}

if (!empty($message)) {
    echo '<p>' . htmlspecialchars($message) . '</p>';
}

Promotion::renderForm('creer', $existingPromotion);

include '../includes/footer.php';
?>

<?php if (!empty($message)) : ?>
    <div class="alert alert-info">
        <?php echo $message; ?>
    </div>
<?php endif; ?>

