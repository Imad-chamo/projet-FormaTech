<?php
include 'classes/Formation.php';
include_once 'classes/Database.php';

$pdo = Database::getPDO();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $duree = isset($_POST['duree']) ? $_POST['duree'] : null;
    $abreviation = isset($_POST['abreviation']) ? $_POST['abreviation'] : null;
    $RNCP_niveau = isset($_POST['RNCP_niveau']) ? $_POST['RNCP_niveau'] : null;
    $is_public = isset($_POST['is_public']) ? $_POST['is_public'] : null;

    try {
        Formation::update($pdo, $id, $name, $duree, $abreviation, $RNCP_niveau, $is_public);

        echo "<div class='alert alert-success mt-3'>Formation updated successfully!</div>";
    } catch (PDOException $e) {
        // Handle database errors
        echo "<div class='alert alert-danger mt-3'>Error: " . $e->getMessage() . "</div>";
    }
}

if (isset($_GET['id'])) {
    $formationId = $_GET['id'];
    $existingFormation = Formation::getFormationById($pdo, $formationId);

    include 'header.php'; // Include the header here

    renderForm($existingFormation);
} else {
    include 'header.php'; // Include the header here

    renderForm();
}

function renderForm($existingFormation = null)
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Formation</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <h2 class="mb-4">Update Formation</h2>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="mb-3">
                    <label for="id" class="form-label">Formation ID:</label>
                    <input type="text" class="form-control" name="id" value="<?php echo $existingFormation['id'] ?? ''; ?>" required readonly>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $existingFormation['name'] ?? ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="duree" class="form-label">Duration:</label>
                    <input type="text" class="form-control" name="duree" value="<?php echo $existingFormation['duree'] ?? ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="abreviation" class="form-label">Abbreviation:</label>
                    <input type="text" class="form-control" name="abreviation" value="<?php echo $existingFormation['abreviation'] ?? ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="RNCP_niveau" class="form-label">RNCP Level:</label>
                    <input type="text" class="form-control" name="RNCP_niveau" value="<?php echo $existingFormation['RNCP_niveau'] ?? ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="is_public" class="form-label">Is Public:</label>
                    <select class="form-select" name="is_public" required>
                        <option value="1" <?php echo ($existingFormation['is_public'] ?? '') == 1 ? 'selected' : ''; ?>>Yes</option>
                        <option value="0" <?php echo ($existingFormation['is_public'] ?? '') == 0 ? 'selected' : ''; ?>>No</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Formation</button>
            </form>
        </div>

        <!-- Bootstrap JS (optional) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    <?php
}
?>
