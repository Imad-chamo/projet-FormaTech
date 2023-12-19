<?php
class Promo {
    private $id;
    private $annee;
    private $date_debut;
    private $date_fin;
    
    public function __construct($id, $annee, $date_debut, $date_fin,){
        $this->id = $id;
        $this->annee = $annee;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
    }
}
?>