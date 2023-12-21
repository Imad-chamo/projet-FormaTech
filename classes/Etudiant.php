<?php
class Etudiant {
    private $id;
    private $prenom;
    private $nom;
    private $mail;
    private $date_naissance;
    private $num_etudiant;
    private $promo;
    public function __construct($id, $prenom, $nom, $date, $mail, $numEtud, $promo) {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->mail = $mail;
        $this->date_naissance = $date;
        $this->num_etudiant = $numEtud;
        $this->date_naissance = $date;
        $this->promo = $promo;
    }
}
?>