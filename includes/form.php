<?php
// $name = $existingFormation !== null ? $existingFormation->getName() : '';
// $duree = $existingFormation !== null ? $existingFormation->getduree() : '';
// $abreviation = $existingFormation !== null ? $existingFormation->getAbreviation() : '';
// $RNCP_niveau = $existingFormation !== null ? $existingFormation->getRNCP_niveau() : '';
// $is_public = $existingFormation !== null ? $existingFormation->getis_public() : '';
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="mb-2">
                    <label for="id" class="form-label">Formation ID:</label>
                    <input type="text" class="form-control" name="id" value="<?php echo $existingFormation !== null ? $existingFormation->getId() : ''; ?>" required readonly>
                </div>

                <div class="mb-2">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="duree" class="form-label">Duration:</label>
                    <input type="text" class="form-control" name="duree" value="<?php echo $duree; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="abreviation" class="form-label">Abbreviation:</label>
                    <input type="text" class="form-control" name="abreviation" value="<?php echo $abreviation; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="RNCP_niveau" class="form-label">RNCP Level:</label>
                    <input type="text" class="form-control" name="RNCP_niveau" value="<?php echo $RNCP_niveau; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="is_public" class="form-label">Is Public:</label>
                    <select class="form-select" name="is_public" required>
                        <option value="1" <?php echo ($is_public == 1) ? 'selected' : ''; ?>>Yes</option>
                        <option value="0" <?php echo ($is_public == 0) ? 'selected' : ''; ?>>No</option>
                    </select>
                </div>
 
                <button type="submit" class="btn btn-primary">
                    <?php echo $type === 'creer' ? 'Create Formation' : 'Update Formation'; ?>
                </button>
        <a href="Formation_list.php" class="btn btn-primary">back home</a>
            </form>
        </div>
    </div>
</div>
