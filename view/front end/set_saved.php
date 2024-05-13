<?php
require_once '../../config.php';

// Vérification de l'existence de l'offre_id dans les paramètres GET
if(isset($_GET['offre_id'])) {
    $titre = $_GET['offre_id'];
    $db = config::getConnexion();
    $sql = "INSERT INTO saved_off (titre_off) VALUES (:titre_off)";
    $query = $db->prepare($sql);
    $query->execute(['titre_off' => $titre]);
}
?>
