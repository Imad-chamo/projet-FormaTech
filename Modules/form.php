<?php
// $name = $existingFormation !== null ? $existingFormation->getName() : '';
// $duree = $existingFormation !== null ? $existingFormation->getduree() : '';
//$formation = $existingFormation !== null ? $existingFormation->getforma$formation() : '';
// $RNCP_niveau = $existingFormation !== null ? $existingFormation->getRNCP_niveau() : '';
// $is_public = $existingFormation !== null ? $existingFormation->getis_public() : '';
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="mb-2">
                    <label for="id" class="form-label">ID Module :</label>
                    <input type="text" class="form-control" name="id" value="<?php echo $existingFormation !== null ? $existingFormation->getId() : ''; ?>" required readonly>
                </div>

                <div class="mb-2">
                    <label for="nom" class="form-label">Nom :</label>
                    <input type="text" class="form-control" name="nom" value="<?php echo $nom; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="duree" class="form-label">Durée:</label>
                    <input type="text" class="form-control" name="duree" value="<?php echo $duree; ?>" required>
                </div>

                <div class="mb-3">
                <label for="formations" class="form-label">Formations associées :</label>
                    <select name="formations[]" class="form-control" multiple required>
                        <?php
                        foreach ($formations as $formation) {
                            echo '<option value="' . $formation->getId() . '">' . $formation->getName() . '</option>';
                        }
                        ?>
                    </select>
                    <input type="list" class="form-control" name="module_formation" value="<?php echo $module_formation; ?>" required>
                </div>

 
                <button type="submit" class="btn btn-primary">
                    <?php echo $type === 'creer' ? 'Creer Module' : 'Modifier Module'; ?>
                    <?php 
                        // if ($type == 'creer'){
                        //     echo 'Create Formation';
                        // }else{
                        //     echo 'Update Formation';
                        // } 
                    ?>
                </button>

                 <a href="Module_list.php" class="btn btn-primary">Retour</a>
            </form>
        </div>
    </div>
</div>
