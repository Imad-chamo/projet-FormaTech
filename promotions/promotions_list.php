<?php
include '../includes/header.php';

$promotions = Promotion::getAll($pdo);
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-16">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Formation ID</th>
                        <th>Year</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($promotions as $promotion) : ?>
                        <tr>
                            <td><?= $promotion->getId() ?></td>
                            <td><?= $promotion->getFormationId() ?></td>
                            <td><?= $promotion->getYear() ?></td>
                            <td><?= $promotion->getStartDate() ?></td>
                            <td><?= $promotion->getEndDate() ?></td>
                            <td>
                                <a href="deletepromotion.php?id=<?= $promotion->getId() ?>" class="btn btn-danger">Delete</a>
                                <a href="modifypromotion.php?id=<?= $promotion->getId() ?>" class="btn btn-primary" style="margin-left: 10px;">Modify</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="text-center mt-3">
                <a href="../promotions/createpromotion.php" class="btn btn-primary">Create a new promotion</a>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
