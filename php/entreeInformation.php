<?php include_once 'connexion.php';
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$num = $_POST['num'];

// $new = $_POST['new'];

$connexion = $test -> selectClient($email);
$count = count($connexion); //vérifie si le nombre d'éléments dans la selection

if ($count == 0){ //si la selection est vide, donc =0, faire la fonction insertionClient pour ajouter un nouveau client dans la bdd
    $test ->insertionClient($nom, $prenom, $email, $num);
    header("location : reservation.php"); //renvoie le client vers le formulaire de reservation
}else{
    header("location: gestion.php"); // si le client a un déjà réservé envoie vers un formulaire pour ouvrir ses réservations passés 
}


?>