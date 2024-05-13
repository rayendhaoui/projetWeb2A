<?php

require_once '../../Model/ges_off_emp.php'; // Importation de la classe offre_emploi
require_once '../../config.php';
require_once '../../Controller/ges_off_empG.php'; // Importation du contrôleur offre_emploiG


// Vérifier si les données du formulaire sont présentes
if (
    isset($_FILES["photo"]['tmp_name'])&&
    isset($_POST["titre_off"]) &&
    isset($_POST["nom_ent"]) &&
    isset($_POST["lieu_ent"]) &&
    isset($_POST["nbr_emp"]) &&
    isset($_POST["type_off"]) &&
    isset($_POST["mode_trav"]) &&
    isset($_POST["nom_rec"]) &&
    isset($_POST["date_rec"]) &&
    isset($_POST["descrip"])  
) {
    // Vérifier si les champs ne sont pas vides
    if (
        !empty($_FILES["photo"]['tmp_name']) &&
        !empty($_POST["titre_off"]) &&
        !empty($_POST["nom_ent"]) &&
        !empty($_POST["lieu_ent"]) &&
        !empty($_POST["nbr_emp"]) &&
        !empty($_POST["type_off"]) &&
        !empty($_POST["mode_trav"]) &&
        !empty($_POST["nom_rec"]) &&
        !empty($_POST["date_rec"]) &&
        !empty($_POST["descrip"])
    ) {
        // Créer une nouvelle instance de la classe cv avec les données du formulaire
        $ges_off_emp = new ges_off_emp(
            $photo=file_get_contents($_FILES["photo"]['tmp_name']),
            $_POST["titre_off"],
            $_POST["nom_ent"],
            $_POST["lieu_ent"],
            $_POST["nbr_emp"],
            $_POST["type_off"],
            $_POST["mode_trav"],
            $_POST["nom_rec"],
            $_POST["date_rec"],
            $_POST["descrip"]
        );

        // Créer une instance du contrôleur cvC
        $ges_off_empG = new ges_off_empG;
        $titre_off = $_POST["titre_off"];
        if ($ges_off_empG->chercher_titre_offre($titre_off) === NULL) {
            // Ajouter le cv si le numéro n'existe pas
             $ges_off_empG->addoffre($ges_off_emp)
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
                            window.location.href = "offred\'emploi.php";
                        }, 2000);
                    </script>
                </body>
                </html>

<?php
        } else {
            echo
             '<script>alert("Le numéro de cv existe déjà"); window.location.href = "ajoutoffre.html";</script>';
        }
    } else {
        echo 
        '<script>alert("Erreur lors de l\'ajout"); window.location.href = "ajoutoffre.html";</script>';
    }
} else {
    echo 
    '<script>alert("remplir tous les chemps"); window.location.href = "ajoutoffre.html";</script>';
}
?>
