<?php
class ModuleFormation {
    
    public static function getFormationForModule($pdo, $moduleId) {
        $sql = "SELECT formation_id FROM module_formation WHERE module_id = :module_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':module_id' => $moduleId]);

        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
    public static function getModuleForFormation($pdo, $formationId) {
        $sql = "SELECT module_id FROM module_formation WHERE formation_id = :formation_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':formation_id' => $formationId]);

        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}

?>