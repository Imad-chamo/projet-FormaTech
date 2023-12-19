<?php


class Module {
    private $id; 
    private $name;
    private $durée;
    private $module_id;

    public function __construct($id, $name, $duration, $formation_id) {
        $this->id = $id;
        $this->name = $name;
        $this->durée = $durée;
        $this->module_id = $module_id;
    }

}


?>
