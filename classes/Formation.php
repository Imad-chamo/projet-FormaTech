<?php

include 'bdd/config.php';
include 'classes/database.php';

class Formation {
    private $id;
    private $name;

    private $duree;
    private $abreviation;
    private $RNCP_niveau;
    private $is_public;

    public function __construct($id, $name, $duree, $abreviation, $RNCP_niveau, $is_public) {
        $this->id = $id;
        $this->name = $name;
        $this->duree = $duree;
        $this->abreviation = $abreviation;
        $this->RNCP_niveau = $RNCP_niveau;
        $this->is_public = $is_public;
    }

    public static function getAll($pdo) {
        $sql = "SELECT * FROM formations";
        $stmt = $pdo->query($sql);
        
        // return $stmt->fetchAll(PDO::FETCH_CLASS,"Formation");
        $formations = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $formations[] = new Formation($row['id'], $row['name'], $row['duree'], $row['abreviation'], $row['RNCP_niveau'], $row['is_public']);
        }

        return $formations;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getduree(){
        return $this->duree;
    }

    public function getAbreviation() {
        return $this->abreviation;
    }

    public function getRNCP_niveau() {
        return $this->RNCP_niveau;
    }

    public function getis_public() {
        return $this->is_public;
    }

    public static function create_formation($pdo, $name, $duree, $abreviation, $RNCP_niveau, $is_public) {
        $sql = "INSERT INTO formations (name, duree, abreviation, RNCP_niveau, is_public) VALUES (:name, :duree, :abreviation, :RNCP_niveau, :is_public)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name, 
            ':duree' => $duree,
            ':abreviation' => $abreviation,
            ':RNCP_niveau' => $RNCP_niveau,
            ':is_public' => $is_public,
        ]);
    }
    

    public function getModules(){
            $sql = "SELECT * FROM modules WHERE formation_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':id' => $this->id]);
            $modules = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $modules[] = new Module($row['id'], $row['name'], $row['duree'], $row['abreviation'], $row['RNCP_niveau'], $row['nombre_module']);
            }
            return $modules;
        }


}


?>

