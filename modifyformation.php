<?php
require_once 'classes/Autoloader.php';
Autoloader::register();

$pdo = Database::getPDO();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['nom'];
    $duree = $_POST['duree'];
    $abreviation = $_POST['abreviation'];
    $RNCP_niveau = $_POST['RNCP_niveau'];
    $is_public = $_POST['is_public'];

    Formation::modify($pdo, $id, $name, $duree, $abreviation, $RNCP_niveau, $is_public);
    header('Location: Formation_list.php');
} else {
    $id = $_GET['id'];
    $formation = Formation::getById($pdo, $id);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Modify Formation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<?php include 'header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <form method="POST" action="modifyformation.php">
                <input type="hidden" name="id" value="<?php echo $formation->getId(); ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $formation->getName(); ?>">
                </div>
                <!-- Add more input fields for the other properties of the formation here -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>