<?php


class Employe {
    private $id;
    private $prenom;
    private $nom;
    private $poste;
    private $mail;

    public function __construct($id, $prenom, $nom, $poste, $mail) {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->poste = $poste;
        $this->mail = $mail;
    }
}


?>