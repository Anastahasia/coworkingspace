<?php include_once 'php/connexion.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include_once 'php/header.php';?>
       <!-- code de la première section avec le gros titre + un bouton-->
    <section class="section sectionUne">
        <div class="gauche">
            <div id="grosTitre">
                <h1>Le bon espace de travail au bon moment ! </h1>
            </div>

            <div>
                <a href="php/salles.php" class="bouton">Voir les salles</a>
            </div>
        </div>

        <div class="droite">
            <ul id="listeSalles">
        <?php
        $salles = $test->selectSalle();

        foreach($salles as $salle){
        
            echo '<li>' .$salle['nom'] . '</li>';
        }

        ?>
            </ul>
        </div>        
    </section>

    <section class="section sectionDeux">
        <div class="gauche">
            <img src="images/photo2.jpg" class="imgAccueil" alt="">
            <div class="text">
                <h2>
                    Mettez le coworking au coeur de vos pratiques de travail
                </h2>
                <p>
                    Trouvez vos prochains bureaux en un temps record
                    Donnez à vos équipes un accès à la carte aux meilleurs espaces : coworking, réunions, teambuilding
                </p>  
                <a href="php/formulaire.php" class="bouton">Réservez</a>
            </div>

        </div>
        <div class="droite">
            <img src="" alt="">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore blanditiis vero, voluptas in omnis dolorum eum et iusto sint veritatis repellendus laudantium nemo iure? Natus quas similique minus voluptates ab.
            </p>
        </div>
    </section>
</body>

</html>