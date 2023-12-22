<?php
include '../includes/header.php';

$pdo = Database::getPDO();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : null;

    if ($id) {
        $success = Promotion::deletePromotion($pdo, $id);
        $message = $success ? 'Promotion deleted successfully.' : 'Erreur dans la suppression.';
        header('Location: Promotion_list.php');
        exit();
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

Promotion::renderForm('delete', $existingPromotion);

include '../includes/footer.php';
?>
