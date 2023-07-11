<?php include_once 'connexion.php';

$email = $_POST['email'];

$connexion = $test -> selectClient($email);
var_dump($affichage = $test ->selectReservation($connexion[0]['id_utilisateur']));
header('location : gestionReservation.php')

?>