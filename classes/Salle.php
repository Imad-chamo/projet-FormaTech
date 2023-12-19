<?php
class Session {
    private $id;
    private $batiment;
    private $nom;
    private $capacite;
    
    public function __construct($id, $batiment, $nom, $capacite){
        $this->id = $id;
        $this->batiment = $batiment;
        $this->nom = $nom;
        $this->capacite = $capacite;
    }
}
?>