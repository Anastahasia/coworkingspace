<?php
class maConnexion{

    private $nomBaseDeDonnees/* = ""*/;
    private $motDePasse/* = ""*/;
    private $utilisateur/* = "root"*/;
    private $hote/* = "localhost"*/;
    private $connexionPDO;

    public function __construct($nomBaseDeDonnees, $motDePasse, $utilisateur, $hote){
        $this ->nomBaseDeDonnees = $nomBaseDeDonnees;
        $this ->motDePasse = $motDePasse;
        $this ->utilisateur = $utilisateur;
        $this ->hote = $hote;

        try {
            $dsn = "mysql:host=$this->hote;dbname=$this->nomBaseDeDonnees;charset=utf8mb4";
            $this->connexionPDO = new PDO($dsn, $this ->utilisateur, $this ->motDePasse);
            $this->connexionPDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }

    }

    public function select($table,$colonne){
        try {
            $requete = "SELECT $colonne FROM $table";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat ->fetchAll(PDO::FETCH_ASSOC);
            
            return $resultat;
            
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }

    }

    public function insertionClient($nom, $prenom, $num, $email){
        try {
            $requete = "INSERT INTO utilisateur (nom, prenom, email, num) VALUES(:nom, :prenom, :email, :num)";
            $requete_prepare = $this->connexionPDO->prepare($requete);

            $requete_prepare->bindParam(':nom',$nom,PDO::PARAM_STR);
            $requete_prepare->bindParam(':prenom',$prenom,PDO::PARAM_STR);
            $requete_prepare->bindParam(':email',$email,PDO::PARAM_STR);
            $requete_prepare->bindParam(':num',$num,PDO::PARAM_STR);
            
            $requete_prepare->execute();
            echo 'insertion reussie';

            return $requete_prepare;
            
        }catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

}

$test = new maConnexion("authentification", "", "root", "localhost"); 
?>