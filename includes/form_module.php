<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="mb-2">
                    <label for="id" class="form-label">Module ID:</label>
                    <input type="text" class="form-control" name="id" value="<?php echo $existingModule !== null ? $existingModule->getId() : ''; ?>" required readonly>
                </div>

                <div class="mb-2">
                    <label for="module_name" class="form-label">Module Name:</label>
                    <input type="text" class="form-control" name="module_name" value="<?php echo $existingModule !== null ? $existingModule->getName() : ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="module_duration" class="form-label">Module Duration:</label>
                    <input type="text" class="form-control" name="module_duration" value="<?php echo $existingModule !== null ? $existingModule->getDuration() : ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="formation_id" class="form-label">Formation ID:</label>
                    <input type="text" class="form-control" name="formation_id" value="<?php echo $existingModule !== null ? $existingModule->getFormationId() : ''; ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    <?php echo $type === 'creer' ? 'Create Module' : 'Update Module'; ?>
                </button>
                <a href="Module_list.php" class="btn btn-primary">Back to Module List</a>
            </form>
        </div>
    </div>
</div>
