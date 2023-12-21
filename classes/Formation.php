<?php

include_once '../bdd/config.php';
// include_once 'classes/Database.php';

class Formation
{
    private $id;
    private $name;
    private $duree;
    private $abreviation;
    private $RNCP_niveau;
    private $is_public;

    public function __construct($id, $name, $duree, $abreviation, $RNCP_niveau, $is_public)
    {
        $this->id = $id;
        $this->name = $name;
        $this->duree = $duree;
        $this->abreviation = $abreviation;
        $this->RNCP_niveau = $RNCP_niveau;
        $this->is_public = $is_public;
    }

    public static function getAll($pdo)
    {
        $sql = "SELECT * FROM formations";
        $stmt = $pdo->query($sql);

        $formations = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $formations[] = new Formation(
                $row['id'],
                htmlspecialchars($row['name']),
                htmlspecialchars($row['duree']),
                htmlspecialchars($row['abreviation']),
                htmlspecialchars($row['RNCP_niveau']),
                htmlspecialchars($row['is_public'])
            );
        }

        return $formations;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getduree()
    {
        return $this->duree;
    }

    public function getAbreviation()
    {
        return $this->abreviation;
    }

    public function getRNCP_niveau()
    {
        return $this->RNCP_niveau;
    }

    public function getis_public()
    {
        return $this->is_public;
    }

    public static function create($pdo, $name, $duree, $abreviation, $RNCP_niveau, $is_public)
    {
        $sql = "INSERT INTO formations (name, duree, abreviation, RNCP_niveau, is_public) VALUES (:name, :duree, :abreviation, :RNCP_niveau, :is_public)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            ':name' => htmlspecialchars($name),
            ':duree' => htmlspecialchars($duree),
            ':abreviation' => htmlspecialchars($abreviation),
            ':RNCP_niveau' => htmlspecialchars($RNCP_niveau),
            ':is_public' => htmlspecialchars($is_public),
        ]);
    }

    public static function delete($pdo, $id)
    {
        $sql = "DELETE FROM formations WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([':id' => htmlspecialchars($id)]);
    }
    

    public static function getFormationById($pdo, $id)
    {
        $sql = "SELECT * FROM formations WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Formation($row['id'], $row['name'], $row['duree'], $row['abreviation'], $row['RNCP_niveau'], $row['is_public']);
    }

    public function update($pdo, $name, $duree, $abreviation, $RNCP_niveau, $is_public)
    {
        try {
            $sql = "UPDATE formations SET name = :name, duree = :duree, abreviation = :abreviation, RNCP_niveau = :RNCP_niveau, is_public = :is_public WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':id' => $this->id,
                ':name' => $name,
                ':duree' => $duree,
                ':abreviation' => $abreviation,
                ':RNCP_niveau' => $RNCP_niveau,
                ':is_public' => $is_public
            ]);

            return true; // Update successful
        } catch (PDOException $e) {
            // Log or handle the error appropriately
            // For example, you can log the error to a file or output it for debugging
            error_log("Error updating formation: " . $e->getMessage());
            return false; // Update failed
        }
    }

    public static function renderForm($type,  $existingFormation = null)
    {
        $name = $existingFormation !== null ? $existingFormation->getName() : '';
        $duree = $existingFormation !== null ? $existingFormation->getduree() : '';
        $abreviation = $existingFormation !== null ? $existingFormation->getAbreviation() : '';
        $RNCP_niveau = $existingFormation !== null ? $existingFormation->getRNCP_niveau() : '';
        $is_public = $existingFormation !== null ? $existingFormation->getis_public() : '';
    
        return include '../includes/form.php';
    }
    
}

