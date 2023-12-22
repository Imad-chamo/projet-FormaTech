<?php
class Module {
    private $id; 
    private $nom;
    private $duree;
    private $formationIds;  // Utilise un tableau pour stocker les IDs des formations

    public function __construct($id, $nom, $duree, $formationIds) {
        $this->id = $id;
        $this->nom = $nom;
        $this->duree = $duree;
        $this->formationIds = $formationIds;
    }

    public function getId(){
        return $this->id;
    }

    public function getDuree(){
        return $this->duree;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getFormationIds() {
        return $this->formationIds;
    }

    // Retourne un tableau de noms de formations associées
    public function getFormations($pdo) {
        $formationNames = [];

        foreach ($this->formationIds as $formationId) {
            $sql = "SELECT name FROM formations WHERE id = :formation_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':formation_id' => $formationId]);

            $formationName = $stmt->fetch(PDO::FETCH_COLUMN);
            if ($formationName) {
                $formationNames[] = $formationName;
            }
        }

        return implode(', ', $formationNames);
    }
    public static function getModuleByFormation($pdo, $formationId) {
        $sql = "SELECT * FROM modules WHERE formation_id = :formation_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':formation_id' => $formationId]);
    
        $modules = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $modules[] = new Module(
                $row['id'],
                htmlspecialchars($row['nom']),
                htmlspecialchars($row['duree']),
                $row['formation_id']
            );
        }
    
        return $modules;
    }

    public static function getAll($pdo) {
        $sql = "SELECT * FROM modules";
        $stmt = $pdo->query($sql);

        $modules = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $formationIds = ModuleFormation::getFormationForModule($pdo, $row['id']);
            $modules[] = new Module(
                $row['id'],
                htmlspecialchars($row['nom']),
                htmlspecialchars($row['duree']),
                $formationIds
            );
        }

        return $modules;
    }
}
?>