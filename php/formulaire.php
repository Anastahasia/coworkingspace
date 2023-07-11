<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire d'informations</title>

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<!-- formulaire -->
<div class="login">
        <h1>Informations de réservation</h1>
        <form method="POST" action="entreeInformation.php">
            <input type="text" name="nom" placeholder="Nom" required="required" />
            <input type="text" name="prenom" placeholder="Prénom" required="required" />
            <input type="email" name="email" placeholder="Adresse mail" required="required" />
            <input type="text" name="num" placeholder="Numéro de téléphone" required="required" />
            <button type="submit" name="new" class="btn btn-primary btn-block btn-large">Poursuivre</button>
        </form>
        <a href="gestion.php">J'ai déjà réserver ici</a>
    </div>
    
</body>
</html>