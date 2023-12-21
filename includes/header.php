<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Formatech</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand ml-auto mr-6" href="../Formations/formation_list.php"><img src="../imgs/logo.png" alt="" style="width: 100px; height: 100px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto mr-6">
      <li class="nav-item active mr-4">
        <a class="nav-link" href="../Formations/Formation_list.php">les formations <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item mr-4">
        <a class="nav-link" href="../promotions/Promotions_list.php">les promotions</a>
      </li>
      <li class="nav-item mr-4">
        <a class="nav-link" href="../modules/modules_list.php">Les modules</a>
      </li>
      <li class="nav-itemmr-4">
        <a class="nav-link" href="#">Contact</a>
      </li>
    </ul>
  </div>
</nav>

<!-- A RE:PLACER PAR AUTOLOAD  -->
<?php
require_once '../Autoloader.php';
Autoloader::register();

$pdo = Database::getPDO();

?>