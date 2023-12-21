<?php


class Module {
    private $id; 
    private $nom;
    private $duree;
    private $formations;

    public function __construct($id, $nom, $duree, $formation) {
        $this->id = $id;
        $this->nom = $nom;
        $this->duree = $duree;
        $this->formations = $formation;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getFormations() {
        return $this->formations;
    }
}


?>
