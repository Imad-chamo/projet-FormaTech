<?php
require_once 'classes/Autoloader.php';
Autoloader::register();

$pdo = Database::getPDO();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    Formation::delete($pdo, $id);
    header('Location: Formation_list.php');
}
?>