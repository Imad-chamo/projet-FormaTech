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
    public function createPromotion($formation, $annee, $dateDebut, $dateFin){
        // vérification si la date de debut est inférieur à la date fin
        if ($dateDebut <= $dateFin) {  
        }
    }
    public function updatePromotion($annee, $dateDebut, $dateFin) {
    
    }

    public function deletePromotion() {

    }

    public function listePromo(){}
}
?>