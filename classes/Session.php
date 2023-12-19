<?php
class Session {
    private $id;
    private $date;
    private $heure_debut;
    private $heure_fin;
    private $module;
    private $promo;
    private $intervenant;
    
    public function __construct($id, $date, $heure_debut, $heure_fin, $module, $promo, $intervenant){
        $this->id = $id;
        $this->date = $date;
        $this->heure_debut = $heure_debut;
        $this->heure_fin = $heure_fin;
        $this->module = $module;
        $this->promo = $promo;
        $this->intervenant = $intervenant;
    }
}
?>