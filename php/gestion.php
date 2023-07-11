<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accés page de gestion</title>

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<!-- formulaire -->
<div class="login">
        <h1>Ce n'est pas ma première réservation !</h1>
        <form method="POST" action="gestionReservation.php">
            <input type="email" name="email" placeholder="Adresse mail" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large">Voir mes réservations</button>
        </form>
    </div>
    
</body>
</html>