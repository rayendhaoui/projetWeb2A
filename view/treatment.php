<?php

require_once '../model/reclamation.php'; // Importation de la classe Reclamation
require_once '../config.php';
require_once '../controller/reclamationC.php'; // Importation du contrôleur ReclamationC

// Vérifier si les données du formulaire sont présentes
if (
    isset($_POST["id"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["sujet"]) &&
    isset($_POST["description"]) &&
    isset($_POST["idUtilisateur"]) 
) {
    // Vérifier si les champs ne sont pas vides
    if (
        !empty($_POST["id"]) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["sujet"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["idUtilisateur"]) 
    ) {
        // Créer une nouvelle instance de la classe Reclamation avec les données du formulaire
        $reclamation = new Reclamation(
            $_POST["id"],
            $_POST["nom"],
            $_POST["prenom"],
            $_POST["email"],
            $_POST["sujet"],
            $_POST["description"],
            $_POST["idUtilisateur"]
        );

        // Créer une instance du contrôleur ReclamationC
         $reclamationC = new ReclamationC;

        // Vérifier si l'id de la réclamation existe déjà
        $id = $_POST["id"];
        if ($reclamationC->chercher_id_reclamation($id) == NULL) {
            // Ajouter la réclamation si l'id n'existe pas
            $reclamationC->addReclamation($reclamation);
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
            color: #007bff; /* Couleur du texte */
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
            window.location.href = "inscri.html";
        }, 2000);
    </script>
</body>
</html>
<?php
    } else {
        // Si l'id de la réclamation existe déjà
        echo '<script>alert("impossible"); window.location.href = "inscri.html";</script>';
    }
} else {
    // Si des champs sont vides
    echo '<script>alert("Veuillez remplir tous les champs"); window.location.href = "inscri.html";</script>';
}
}

?>
