<?php
include 'classes/Formation.php';
include_once 'classes/Database.php';

$pdo = Database::getPDO();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    Formation::delete($pdo, $id);
    header('Location: Formation_list.php');
}
?>