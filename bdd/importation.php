<?php
include 'datas.php';
include 'config.php';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=Formatech;charset=utf8mb4', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    foreach ($formations as $formation) {
        if (!isset($formation['name']) || !isset($formation['duree']) || !isset($formation['abréviation']) || !isset($formation['RNCP_niveau'])) {
            continue;
        }
        
        $sql = "INSERT INTO formations (name, duree, abréviation, RNCP_niveau ) VALUES (:name, :duree, :abreviation, :niveau)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $formation['name'], 
            ':duree' => $formation['duree'],
            ':abreviation' => $formation['abréviation'],
            ':niveau' => $formation['RNCP_niveau'],
        ]);
    }

    echo "Data inserted successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>