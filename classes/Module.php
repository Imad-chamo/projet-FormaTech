<?php


class Module {
    private $id; 
    private $name;
    private $duree;
    private $module_id;

    public function __construct($id, $name, $duree, $module_id) {
        $this->id = $id;
        $this->name = $name;
        $this->duree = $duree;
        $this->module_id = $module_id;
    }

    public function getallinformations(){
        // Recupere toutes les formations
        $sql = "SELECT * FROM modules";
        $result = $conn->query($sql);
        $modules = [];
        while ($row = $result->fetch_assoc()) {
            $modules[] = new Module($row['id'], $row['name'], $row['duration'], $row['formation_id']);
        }
        return $modules;
    }
}


?>

