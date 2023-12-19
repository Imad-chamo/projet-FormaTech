<?php
include 'classes/Formation.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    Formation::create($pdo, $_POST['name'], $_POST['duree'], $_POST['abréviation'], $_POST['RNCP_niveau'], $_POST['is_public']);
}
?>



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<?php include 'header.php' ?>
<div class="container mt-5">
    <form method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="duree">Duration:</label>
            <input type="text" class="form-control" id="duree" name="duree">
        </div>

        <div class="form-group">
            <label for="abréviation">Abbreviation:</label>
            <input type="text" class="form-control" id="abréviation" name="abréviation">
        </div>

        <div class="form-group">
            <label for="RNCP_niveau">RNCP Level:</label>
            <input type="text" class="form-control" id="RNCP_niveau" name="RNCP_niveau">
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="is_public" name="is_public">
            <label class="form-check-label" for="is_public">Is Public:</label>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Create Formation</button>
    </form>
</div>