<?php

require_once '../../Model/ges_entreprise.php'; // Importation de la classe offre_emploi
require_once '../../config.php';
require_once '../../Controller/ges_entrepriseG.php'; // Importation du contrôleur offre_emploiG


// Vérifier si les données du formulaire sont présentes
if (
    isset($_FILES["photo"]['tmp_name']) &&
    isset($_POST["nom_ent"]) &&
    isset($_POST["nom_rec"]) &&
    isset($_POST["poste_rec"]) &&
    isset($_POST["lieu_ent"]) &&
    isset($_POST["type_ser"]) &&
    isset($_POST["email"]) 
    
  
) {
    // Vérifier si les champs ne sont pas vides
    if (
        !empty($_FILES["photo"]['tmp_name']) &&
        !empty($_POST["nom_ent"]) &&
        !empty($_POST["nom_rec"]) &&
        !empty($_POST["poste_rec"]) &&
        !empty($_POST["lieu_ent"]) &&
        !empty($_POST["type_ser"]) &&
        !empty($_POST["email"]) 
      
    ) {
        // Créer une nouvelle instance de la classe cv avec les données du formulaire
        $ges_entreprise = new ges_entreprise(
            $photo=file_get_contents($_FILES["photo"]['tmp_name']),
            $_POST["nom_ent"],
            $_POST["nom_rec"],
            $_POST["poste_rec"],
            $_POST["lieu_ent"],
            $_POST["type_ser"],
            $_POST["email"]
        );

        // Créer une instance du contrôleur cvC
        $ges_entrepriseG = new ges_entrepriseG;
        $nom_ent = $_POST["nom_ent"];
        if ($ges_entrepriseG->chercher_nom_ent($nom_ent) === NULL) {
            // Ajouter le cv si le numéro n'existe pas
             $ges_entrepriseG->addentreprise($ges_entreprise)
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
                            window.location.href = "listentreprise.php";
                        }, 5000);
                    </script>
                </body>
                </html>

<?php
        } else {
            echo
             '<script>alert("Le nom existe déjà"); window.location.href = "ajoutentreprise.html";</script>';
        }
    } else {
        echo 
        '<script>alert("Erreur lors de l\'ajout"); window.location.href = "ajoutentreprise.html";</script>';
    }
} else {
    echo 
    '<script>alert("remplir tous les chemps"); window.location.href = "ajoutentreprise.html";</script>';
}
?>
