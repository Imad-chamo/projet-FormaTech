<?php

class Promotion {
    private $id;
    private $formationId;
    private $year;
    private $start_date;
    private $end_date;
    
    public function __construct($id, $formationId, $year, $start_date, $end_date) {
        $this->id = $id;
        $this->formationId = $formationId;
        $this->year = $year;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public static function getAll($pdo) {
        $sql = "SELECT * FROM promotions";
        $stmt = $pdo->query($sql);

        $promotions = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $promotions[] = new Promotion(
                $row['id'],
                $row['formation_id'],
                $row['year'],
                $row['start_date'],
                $row['end_date']
            );
        }

        return $promotions;
    }

    public function getId() {
        return $this->id;
    }

    public function getFormationId() {
        return $this->formationId;
    }

    public function getYear() {
        return $this->year;
    }

    public function getStartDate() {
        return $this->start_date;
    }

    public function getEndDate() {
        return $this->end_date;
    }

    public static function createPromotion($pdo, $formationId, $year, $start_date, $end_date) {
        $sql = "INSERT INTO promotions (formation_id, year, start_date, end_date) VALUES (:formation_id, :year, :start_date, :end_date)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            ':formation_id' => htmlspecialchars($formationId),
            ':year' => htmlspecialchars($year),
            ':start_date' => htmlspecialchars($start_date),
            ':end_date' => htmlspecialchars($end_date),
        ]);
    }

    public static function deletePromotion($pdo, $id) {
        $sql = "DELETE FROM promotions WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([':id' => htmlspecialchars($id)]);
    }

    public static function getPromotionById($pdo, $id) {
        $sql = "SELECT * FROM promotions WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Promotion($row['id'], $row['formation_id'], $row['year'], $row['start_date'], $row['end_date']);
    }

    public function updatePromotion($pdo, $formationId, $year, $start_date, $end_date) {
        try {
            $sql = "UPDATE promotions SET formation_id = :formation_id, year = :year, start_date = :start_date, end_date = :end_date WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':id' => $this->id,
                ':formation_id' => $formationId,
                ':year' => $year,
                ':start_date' => $start_date,
                ':end_date' => $end_date,
            ]);

            return true; // Update successful
        } catch (PDOException $e) {
            // Log or handle the error appropriately
            // For example, you can log the error to a file or output it for debugging
            error_log("Error updating promotion: " . $e->getMessage());
            return false; // Update failed
        }
    }

    public static function renderForm($type, $existingPromotion = null)
    {
        $formationId = $existingPromotion !== null ? $existingPromotion->getFormationId() : '';
        $year = $existingPromotion !== null ? $existingPromotion->getYear() : '';
        $start_date = $existingPromotion !== null ? $existingPromotion->getStartDate() : '';
        $end_date = $existingPromotion !== null ? $existingPromotion->getEndDate() : '';
    
        return include '../includes/form_promotion.php';
    }
}

?>
