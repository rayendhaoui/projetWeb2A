<?php

require_once '../Model/societe.php'; // Importation de la classe cv
require_once '../config1.php';
require_once '../Controller/societec.php'; // Importation du contrôleur cvC


// Vérifier si les données du formulaire sont présentes
if (
    isset($_POST["nom"]) &&
    isset($_POST["region"]) &&
    isset($_POST["ville"]) &&
    isset($_POST["num_tel"]) &&
    isset($_POST["email"]) &&
    isset($_POST["mot_d_passe"])

) {
    // Vérifier si les champs ne sont pas vides
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["region"]) &&
        !empty($_POST["ville"]) &&
        !empty($_POST["num_tel"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["mot_d_passe"])
    ) {
        // Créer une nouvelle instance de la classe cv avec les données du formulaire
        $societe = new societe(
            $_POST["nom"],
            $_POST["region"],
            $_POST["ville"],
            $_POST["num_tel"],
            $_POST["email"],
            $_POST["mot_d_passe"],
        );

        // Créer une instance du contrôleur societec
        $societec = new societec ;

        // Vérifier si le numéro de cv existe déjà
        $nom = $_POST["nom"];
        if ($societec->chercher_nom_societe($nom) === NULL) {
            // Ajouter le cv si le numéro n'existe pas
             $societec->addsociete($societe)
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
                            window.location.href = "user.html";
                        }, 2000);
                    </script>
                </body>
                </html>
<?php
            } else {
                echo '<script>alert("Erreur lors de l\'ajout"); window.location.href = "user.html";</script>';
            }
        } else {
            // Si le numéro de cv existe déjà
            echo '<script>alert("Le nom de societe existe déjà"); window.location.href = "user.html";</script>';
        }
    } else {
        // Si des champs sont vides
        echo '<script>alert("Veuillez remplir tous les champs"); window.location.href = "user.html";</script>';
    }
?>
