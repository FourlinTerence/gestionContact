<?php
 class MaConnexion{
    
    private $nomBaseDeDonnees;
    private $motDePasse;
    private $nomUtilisateur;
    private $hote;
    private $connexionPDO;

    public function __construct($nomBaseDeDonnees, $motDePasse , $nomUtilisateur , $hote){
        
        $this->nomBaseDeDonnees = $nomBaseDeDonnees;
        $this->motDePasse = $motDePasse;
        $this->nomUtilisateur = $nomUtilisateur;
        $this->hote = $hote;
        
        try {
            $dsn = "mysql:host=$this->hote;dbname=$this->nomBaseDeDonnees;charset=utf8mb4";
            $this->connexionPDO = new PDO($dsn,$this->nomUtilisateur, $this->motDePasse);
            $this->connexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           // echo "Connexion reussi";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }   
    
    public function select($table, $column){
        try {
            $requete = "SELECT $column from $table";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }

    public function selectContact($id){
        try {
            $requete = "SELECT * from contact WHERE ID_Contact = $id";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }
    
    public function insertContact_Secure($nom, $prenom, $email,$imageProfil){
        try {
            $insertion = "INSERT INTO  `contact`(nom, prenom, email, imageProfil) VALUES (?, ?, ?, ?)";
            
            $requete = $this -> connexionPDO -> prepare($insertion);
            $requete->bindValue(1, $nom,PDO::PARAM_STR);
            $requete->bindValue(2, $prenom,PDO::PARAM_STR);
            $requete->bindValue(3, $email,PDO::PARAM_STR);
            $requete->bindValue(4, $imageProfil,PDO::PARAM_STR);

            $requete->execute();
            return"insersion reussie";

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    
    public function miseAJourContact_Secure($nom, $prenom, $email,$imageProfil,$ID_Contact)
    {
        try {
            $requete = "UPDATE contact SET nom = ?, prenom = ?, email = ?, email = ? WHERE ID_Contact = ?";
            $requete_preparee = $this->connexionPDO->prepare($requete);
            
            $requete_preparee->bindValue(1, $nom,PDO::PARAM_STR);
            $requete_preparee->bindValue(2, $prenom,PDO::PARAM_STR);
            $requete_preparee->bindValue(3, $email,PDO::PARAM_STR);
            $requete_preparee->bindValue(4, $imageProfil,PDO::PARAM_STR);
            $requete_preparee->bindValue(5, $ID_Contact,PDO::PARAM_INT);
            
            $requete_preparee->execute();
            return "mise à jour réussie";

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteContact_Secure($ID_Contact){
        try {
            $requete = "DELETE FROM contact WHERE ID_Contact = :id";
            $requete_preparee = $this->connexionPDO->prepare($requete);
        
        $requete_preparee->bindParam(':id',$ID_Contact,PDO::PARAM_INT);
        $requete_preparee->execute();
        return"suppression reussie";
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }
 }

//  $uneInsertion = new MaConnexion ("gestion des contacts","","root","localhost");
// $uneInsertion->insertContact_Secure('gogogo','gooooo','gogogogo@goooo.go','image\test.png');
 
?>