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

    /* selectionne le client en fonction de son mail */
    public function selectClient ($email){
        try{
            $requete = "SELECT id_utilisateur FROM utilisateur WHERE email = :email";
            $requete_prepare = $this->connexionPDO->prepare($requete);

            $requete_prepare->bindParam(':email',$email,PDO::PARAM_STR);


            $resultat = $requete_prepare->execute();
            $resultat = $requete_prepare->fetchAll(PDO::FETCH_ASSOC);

            return $resultat;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    /*enregistrement d'un nouveau client*/
    public function insertionClient($nom, $prenom, $email, $num){
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

    /*selectionne toutes les réservations du client grâce à son ID*/
    public function selectReservation($id){
        try {
            $requete = "SELECT * FROM reservation WHERE id_utilisateur = :id";
            $requete_prepare = $this->connexionPDO->prepare($requete);

            $requete_prepare->bindParam(':id', $id,PDO::PARAM_STR);

            $resultat = $requete_prepare->execute();
            $resultat = $requete_prepare ->fetchAll(PDO::FETCH_ASSOC);
            
            return $resultat;
            
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

        /*enregistrement d'un nouveau client*/
        public function insertionReservation($dprevue, $duree, $id, $salle){
            try {
                $requete = "INSERT INTO reservation (dateReservation, datePrevue, duree, id_utilisateur, id_salle) VALUES(:dresa, :dprevue, :duree, :id, :salle)";
                $requete_prepare = $this->connexionPDO->prepare($requete);
    
                $requete_prepare->bindParam(':dresa',date('Y-m-d',time()),PDO::PARAM_STR);
                $requete_prepare->bindParam(':dprevue',$dprevue,PDO::PARAM_STR);
                $requete_prepare->bindParam(':duree',$duree,PDO::PARAM_STR);
                $requete_prepare->bindParam(':id',$id,PDO::PARAM_STR);
                $requete_prepare->bindParam(':salle',$salle,PDO::PARAM_STR);
                
                $requete_prepare->execute();
                echo 'insertion reussie';
    
                return $requete_prepare;
                
            }catch (PDOException $e) {
                echo 'Erreur : ' . $e->getMessage();
            }
        }
    
        public function selectSalle(){
            try {
                $requete = "SELECT * FROM salle";
                $requete_prepare = $this->connexionPDO->prepare($requete);
    
                $resultat = $requete_prepare->execute();
                $resultat = $requete_prepare ->fetchAll(PDO::FETCH_ASSOC);
                
                return $resultat;
                
            } catch (PDOException $e) {
                echo 'Erreur : ' . $e->getMessage();
            }
        }
}

$test = new maConnexion("coworkingspace", "", "root", "localhost"); 



?>