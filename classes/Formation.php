<?php

include 'bdd/config.php';
include 'classes/database.php';

class Formation {
    private $id;
    private $name;
    private $duree;
    private $abrv;
    private $rncp;
    private $nb_module;

    public function __construct($id, $name, $duree, $abrv, $rncp, $nb_module) {
        $this->id = $id;
        $this->name = $name;
        $this->duree = $duree;
        $this->abrv = $abrv;
        $this->rncp = $rncp;
        $this->nb_module = $nb_module;
    }

    public static function getAll($pdo) {
        $sql = "SELECT * FROM formations";
        $stmt = $pdo->query($sql);
        $formations = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $formations[] = new Formation($row['id'], $row['name'], $row['durée'], $row['abréviation'], $row['RNCP_niveau'], $row['nombre_module']);
        }

        return $formations;
    }
}

?>


