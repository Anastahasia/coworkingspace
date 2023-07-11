<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer mes reservation</title>
</head>
<body>
    <?php include_once 'connexion.php';    

$email = $_POST['email'];

$connexion = $test -> selectClient($email);
$affichage = $test ->selectReservation($connexion[0]['id_utilisateur']);
    foreach($affichage as $affiche){

        echo '<p>'. $affiche['dateReservation'] . $affiche['datePrevue'] . '<p>';
    }

?>
</body>
</html>