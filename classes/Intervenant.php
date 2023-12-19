<?php
class Intervenant {
    private $id;
    private $prenom;
    private $nom;
    private $mail;
    public function __construct($id, $prenom, $nom, $mail) {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->mail = $mail;
    }
}
?>