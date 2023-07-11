<!-- non terminé -->
<?php include_once 'php/connexion.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisissez votre salle</title>

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<!-- formulaire -->
<div class="login">
        <h1>Salles disponibles</h1>
        <form method="POST" action="information.php">
            <label for="nom">Choissisez votre salle</label>
            <select name="nom" id="nom">
            <?php
                $salles = $test->selectSalle();

                foreach($salles as $salle){
                
                    echo '<option>' .$salle['nom'] . '</option>';
                }

            ?>
            </select>
            <input type="datetime" name="date" placeholder="choissiez votre date" required="required" />
            <input type="text" name="m" placeholder="Adresse mail" required="required" />
            <input type="text" name="t" placeholder="Numéro de téléphone" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large">Me connecter</button>
        </form>
    </div>
    
</body>
</html>