<?php
include 'bdd/config.php';
include 'classes/Database.php';

class Etudiant {
    private $id;
    private $prenom;
    private $nom;
    private $email;
    private $date_naissance;
    private $num_etudiant;
    private $promo;
    public function __construct($id, $prenom, $nom, $date, $email, $numEtud, $promo) {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $email;
        $this->date_naissance = $date;
        $this->num_etudiant = $numEtud;
        $this->date_naissance = $date;
        $this->promo = $promo;
    }
    public static function getAll($pdo) {
        $sql = "SELECT * FROM etudiants";
        $stmt = $pdo->query($sql);
        
        // return $stmt->fetchAll(PDO::FETCH_CLASS,"Etudiant");
        $etudiants = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $etudiants[] = new Etudiant($row['id'], $row['prenom'], $row['nom'],$row['email'], $row['date'], $row['numEtud'], $row['promo']);
        }

        return $etudiants;
    }

    public function getId() {
        return $this->id;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDateNaissance() {
        return $this->date_naissance;
    }

    public function getNumEtudiant() {
        return $this->num_etudiant;
    }

    public function getPromo() {
        return $this->promo;
    }

    public function creerEtudiant($pdo, $prenom, $nom, $email, $dateNaissance, $numEtudiant) {
        $sql = "INSERT INTO etudiants (prenom, nom, email, dateNaissance, numEtudiant) VALUES (:prenom, :nom, :email, :dateNaissance, :numEtudiant)";
        $stmt = $pdo->prepare($sql);
        if($stmt->execute([
            ':prenom' => $prenom,
            ':nom' => $nom,
            ':email' => $email,
            ':dateNaissance' => $dateNaissance,
            ':numEtudiant' => $numEtudiant
        ])) {
            return "Formation created successfully!";
        }else{
            return "error: ".$stmt->errorInfo()[2];
        };
    }

    public function modifEtudiant($prenom, $nom, $email, $dateNaissance, $numEtudiant) {
        // Code pour mettre à jour les informations de l'étudiant dans la base de données
    }

    public function supprEtudiant() {
        // Code pour supprimer l'étudiant de la base de données
    }

    public function listeEtudiant(){}
    public function detailEtudiant(){}
}
?>