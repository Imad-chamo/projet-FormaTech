<?php
include '../includes/header.php';

$modules = Module::getAll($pdo);
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-16">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Duration</th>
                        <th>Formation ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($modules as $module) : ?>
                        <tr>
                            <td><?= $module->getId() ?></td>
                            <td><?= $module->getName() ?></td>
                            <td><?= $module->getduree() ?></td>
                            <td><?= $module->getFormation_Id() ?></td>
                            <td>
                                <a href="deletemodule.php?id=<?= $module->getId() ?>" class="btn btn-danger">Delete</a>
                                <a href="modifymodule.php?id=<?= $module->getId() ?>" class="btn btn-primary" style="margin-left: 10px;">Modify</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="text-center mt-3">
                <a href="createmodule.php" class="btn btn-primary">Create a new module</a>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
