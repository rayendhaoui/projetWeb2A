<?php

require_once '../Model/cv.php'; // Importation de la classe cv
require_once '../config.php';
require_once '../Controller/cvC.php'; // Importation du contrôleur cvC


// Vérifier si les données du formulaire sont présentes
if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["num"]) &&
    isset($_POST["dte"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["nationalite"]) &&
    isset($_POST["objectifs"]) &&
    isset($_POST["diplomes"]) &&
    isset($_POST["postes"]) &&
    isset($_POST["comp"]) &&
    isset($_POST["interets"])
) {
    // Vérifier si les champs ne sont pas vides
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["num"]) &&
        !empty($_POST["dte"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["nationalite"]) &&
        !empty($_POST["objectifs"]) &&
        !empty($_POST["diplomes"]) &&
        !empty($_POST["postes"]) &&
        !empty($_POST["comp"]) &&
        !empty($_POST["interets"])
    ) {
        // Créer une nouvelle instance de la classe cv avec les données du formulaire
        $cv = new cv(
            $_POST["nom"],
            $_POST["prenom"],
            $_POST["email"],
            $_POST["num"],
            $_POST["dte"],
            $_POST["adresse"],
            $_POST["nationalite"],
            $_POST["objectifs"],
            $_POST["diplomes"],
            $_POST["postes"],
            $_POST["comp"],
            $_POST["interets"]
        );

        // Créer une instance du contrôleur cvC
        $cvC = new cvC;

        // Vérifier si le numéro de cv existe déjà
        $num = $_POST["num"];
        if ($cvC->chercher_num_cv($num) === NULL) {
            // Ajouter le cv si le numéro n'existe pas
             $cvC->addcv($cv)
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
                        <p class="welcome-text">Ajout avec succès</p>
                    </div>

                    <script>
                        setTimeout(function() {
                            window.location.href = "Cv.html";
                        }, 2000);
                    </script>
                </body>
                </html>
<?php
            } else {
                echo '<script>alert("Erreur lors de l\'ajout"); window.location.href = "Cv.html";</script>';
            }
        } else {
            // Si le numéro de cv existe déjà
            echo '<script>alert("Le numéro de cv existe déjà"); window.location.href = "Cv.html";</script>';
        }
    } else {
        // Si des champs sont vides
        echo '<script>alert("Veuillez remplir tous les champs"); window.location.href = "Cv.html";</script>';
    }
?>
