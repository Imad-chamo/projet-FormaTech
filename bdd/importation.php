<?php
include 'datas.php';
include 'config.php';

try {
    $pdo = Database::getPDO();

    $errors = false;
    
    foreach ($formations as $formation) {
        if (!isset($formation['nom']) || !isset($formation['duree']) || !isset($formation['abreviation'])) {
            $errors = true;
            continue;
        }
        
        $sql = "INSERT INTO formations (name, duree, abreviation, RNCP_niveau, is_public ) VALUES (:name, :duree, :abreviation, :niveau, :is_public)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $formation['nom'], 
            ':duree' => $formation['duree'],
            ':abreviation' => $formation['abreviation'],
            ':niveau' => $formation['niveau'],
            ':is_public' => true,
        ]);

        // Creer les modules associes a la formation
    }

    if($errors){
        echo "Une erreur est survenue.";
    }else{
        echo "Data inserted successfully.";
    }
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>