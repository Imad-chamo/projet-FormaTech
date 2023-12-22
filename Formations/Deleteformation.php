<?php
include '../includes/header.php';

$pdo = Database::getPDO();

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id !== null) {
    Formation::delete($pdo, $id);
    header('Location: Formation_list.php');
}
?>