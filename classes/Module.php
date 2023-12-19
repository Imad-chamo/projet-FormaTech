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

}


?>
