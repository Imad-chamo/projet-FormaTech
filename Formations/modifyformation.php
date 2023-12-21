<?php
include '../includes/header.php'; 


$message = ''; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $abreviation = isset($_POST['abreviation']) ? $_POST['abreviation'] : null;
    $is_public = isset($_POST['is_public']) ? $_POST['is_public'] : null;
    
    // om recupere la formation
    $formation = Formation::getFormationById($pdo, $_POST['id']);
    // om modifie la formation
    $success = $formation->update($pdo, $_POST['name'], $_POST['duree'], $abreviation, $_POST['RNCP_niveau'], $is_public);

    // $success = Formation::update($pdo, $_POST['id'], $_POST['name'], $_POST['duree'], $abreviation, $_POST['RNCP_niveau'], $is_public);
    $message = $success ? 'Formation updated successfully.' : 'Erreur dans la mise à jour.';
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

Formation::renderForm('modifier',$existingFormation);

include '../includes/footer.php'; 
?>






























