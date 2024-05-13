<?php
include '../../Controller/ges_entrepriseG.php'; // Inclure le contrôleur ReclamationC
$ges_entrepriseG = new ges_entrepriseG();
$ges_entrepriseG->deleteentreprise($_GET["nom_ent"]);
header('Location:listentreprise.php');

?>
