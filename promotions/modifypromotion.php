












<?php
include '../includes/header.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formationId = isset($_POST['formation_id']) ? $_POST['formation_id'] : null;

    if ($formationId) {
        $promotion = Promotion::getPromotionById($pdo, $_POST['id']);
        $success = $promotion->updatePromotion($pdo, $formationId, $_POST['year'], $_POST['start_date'], $_POST['end_date']);
        $message = $success ? 'Promotion updated successfully.' : 'Erreur dans la mise à jour.';
    } else {
        $message = 'Invalid promotion ID.';
    }
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

Promotion::renderForm('modifier', $existingPromotion);

include '../includes/footer.php';
?>








