<?php
include 'classes/Formation.php';

$formations = Formation::getAll($pdo);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Formation List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<?php include 'header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom </th>
                        <th>Durée de formation</th>
                        <th>Abréviation</th>
                        <th>niveau RNCP</th>
                        <th>privee / public </th>
                    </tr>
                </thead>
                <tbody>
        <?php
            foreach ($formations as $formation) {
                echo '<tr>';
                echo '<td>' . $formation->getId() . '</td>'; 
                echo '<td>' . $formation->getName() . '</td>';
                echo '<td>' . $formation->getduree() . '</td>';
                echo '<td>' . $formation->getabreviation() . '</td>';
                echo '<td>' . $formation->getRNCP_niveau() . '</td>';
                echo '<td>' . $formation->getis_public() . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>