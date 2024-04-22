<?php
require_once '../controller/reponseC.php'; // Inclure le contrôleur ReponseC

// Vérifier si l'ID de réclamation est passé en tant que paramètre GET
if (isset($_GET['reclamation_id'])) {
    $reclamation_id = $_GET['reclamation_id'];

    // Créer une instance du contrôleur ReponseC
    $reponseC = new reponseC();

    // Appeler la méthode chercherReponseParReclamationID pour trouver les réponses avec l'identifiant de réclamation donné
    $reponse = $reponseC->chercherReponseParReclamationID($reclamation_id);

    // Vérifier si des réponses ont été trouvées
    if ($reponse !== NULL) {
        // Afficher les réponses trouvées
        foreach ($reponse as $reponse) {
            
            echo "<p>ID de la Réponse: " . $reponse['id_rep']. "</p>";
            echo "<p>ID de la Réclamation: " . $reponse['reclaimID'] . "</p>";
            echo "<p>Message: " . $reponse['message'] . "</p>";
            echo "<p>Date: " . $reponse['date'] . "</p>";
            echo "<hr>"; // Séparateur entre chaque réponse
        } 
    }
    else {
            // Afficher un message si aucune réponse n'a été trouvée pour l'identifiant de réclamation donné
            echo "Aucune réponse trouvée pour l'identifiant de réclamation $reclamation_id.";
        }
    } else {
        // Rediriger vers la page chercher_reponse.html si aucun ID de réclamation n'est spécifié
        header('Location: chercher_reponse.html');
        exit(); // Arrêter l'exécution du script après la redirection
    }
    ?>