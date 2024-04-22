<?php

require_once '../model/reponse.php'; // Importation de la classe Reponse
require_once '../config.php';
require_once '../controller/reponseC.php'; // Importation du contrôleur ReponseC

// Vérifier si les données du formulaire sont présentes
if (
    isset($_POST["id_rep"]) &&
    isset($_POST["reclaimID"]) &&
    isset($_POST["message"]) &&
    isset($_POST["date"]) 
) {
    // Vérifier si les champs ne sont pas vides
    if (
        !empty($_POST["id_rep"]) &&
        !empty($_POST["reclaimID"]) &&
        !empty($_POST["message"]) &&
        !empty($_POST["date"]) 
    ) {
        // Créer une nouvelle instance de la classe Reponse avec les données du formulaire
        $reponse = new reponse(
            $_POST["id_rep"],
            $_POST["reclaimID"],
            $_POST["message"],
            $_POST["date"]
        );

        // Créer une instance du contrôleur ReponseC
         $reponseC = new reponseC;

        // Ajouter la réponse
        $id_rep = $_POST["id_rep"];
        if ($reponseC->chercher_id_rep($id_rep) == NULL) {
            // Ajouter la réclamation si l'id n'existe pas
            $reponseC->ajouterReponse($reponse);        


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: #f4f4f4; /* Couleur de fond */
        }

        .welcome-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .welcome-text {
            font-size: 5em;
            animation: fadeInOut 3s forwards;
            color: #1d2d44; /* Couleur du texte */
        }

        @keyframes fadeInOut {
            0% { opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { opacity: 0; }
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <p class="welcome-text">ajout avec succès</p>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = "reponse.html";
        }, 2000);
    </script>
</body>
</html>
<?php
    } else {
        // Si l'id de la réclamation existe déjà
        echo '<script>alert("impossible , l id de reponse existe deja"); window.location.href = "reponse.html";</script>';
    }
} 
}

?>




?>
