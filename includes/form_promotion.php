<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="mb-2">
                    <label for="id" class="form-label">Promotion ID:</label>
                    <input type="text" class="form-control" name="id" value="<?php echo $existingPromotion !== null ? $existingPromotion->getId() : ''; ?>" required readonly>
                </div>

                <div class="mb-2">
                    <label for="formation_id" class="form-label">Formation ID:</label>
                    <input type="text" class="form-control" name="formation_id" value="<?php echo $existingPromotion !== null ? $existingPromotion->getFormationId() : ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="year" class="form-label">Year:</label>
                    <input type="text" class="form-control" name="year" value="<?php echo $existingPromotion !== null ? $existingPromotion->getYear() : ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date:</label>
                    <input type="text" class="form-control" name="start_date" value="<?php echo $existingPromotion !== null ? $existingPromotion->getStartDate() : ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="end_date" class="form-label">End Date:</label>
                    <input type="text" class="form-control" name="end_date" value="<?php echo $existingPromotion !== null ? $existingPromotion->getEndDate() : ''; ?>" required>
                </div>
 
                <button type="submit" class="btn btn-primary">
                    <?php echo $type === 'creer' ? 'Create Promotion' : 'Update Promotion'; ?>
                </button>
                <a href="Promotions_list.php" class="btn btn-primary">Back to Promotion List</a>
            </form>
        </div>
    </div>
</div>

