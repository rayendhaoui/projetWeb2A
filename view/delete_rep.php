<?php
include '../controller/reponseC.php'; // Inclure le contrôleur ReponseC

$reponseC = new reponseC();

// Vérifiez si l'ID de la réponse à supprimer est présent dans l'URL
if(isset($_GET["id_rep"]) && !empty($_GET["id_rep"])) {
    // Supprimez la réponse en utilisant la méthode deleteReponse du contrôleur
    $reponseC->supprimerReponse($_GET["id_rep"]);
    // Redirigez l'utilisateur vers une autre page
    header('Location: list_rep.php');
} else {
    // Si l'ID n'est pas fourni dans l'URL, affichez un message d'erreur ou effectuez une autre action
    echo "ID de réponse manquant.";
}
?>
