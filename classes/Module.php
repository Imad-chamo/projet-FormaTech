<?php

include_once '../bdd/config.php';

class Module
{
    private $id;
    private $name;
    private $duree;
    private $formation_Id;

    public function __construct($id, $name, $duree, $formation_Id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->duree = $duree;
        $this->formation_Id = $formation_Id;
    }

    public static function getAll($pdo)
    {
        $sql = "SELECT * FROM modules";
        $stmt = $pdo->query($sql);

        $modules = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $modules[] = new Module(
                $row['id'],
                htmlspecialchars($row['name']),
                htmlspecialchars($row['duree']),
                htmlspecialchars($row['formation_id'])
            );
        }

        return $modules;
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

    public function getFormation_Id()
    {
        return $this->formation_Id;
    }

    public static function createmodule($pdo, $name, $duree, $formation_Id)
    {
        $sql = "INSERT INTO modules (name, duree, formation_id) VALUES (:name, :duree, :formation_Id)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            ':name' => htmlspecialchars($name),
            ':duree' => htmlspecialchars($duree),
            ':formationId' => htmlspecialchars($formation_Id),
        ]);
    }

    public static function deletemodule($pdo, $id)
    {
        $sql = "DELETE FROM modules WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([':id' => htmlspecialchars($id)]);
    }

    public static function getModuleById($pdo, $id)
    {
        $sql = "SELECT * FROM modules WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Module($row['id'], $row['name'], $row['duree'], $row['formation_id']);
    }

    public function updatemodule($pdo, $name, $duree, $formation_Id)
    {
        try {
            $sql = "UPDATE modules SET name = :name, duree = :duree, formation_id = :formationId WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':id' => $this->id,
                ':name' => $name,
                ':duration' => $duree,
                ':formationId' => $formation_Id,
            ]);

            return true; // Update successful
        } catch (PDOException $e) {
            error_log("Error updating module: " . $e->getMessage());
            return false; // Update failed
        }
    }

    public static function renderForm($type, $existingModule = null)
    {
        $name = $existingModule !== null ? $existingModule->getName() : '';
        $duree = $existingModule !== null ? $existingModule->getduree() : '';
        $formation_Id = $existingModule !== null ? $existingModule->getformation_Id() : '';

        return include '../includes/form_module.php'; 
    }
}
