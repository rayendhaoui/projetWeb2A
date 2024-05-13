<?php
include '../../Controller/ges_off_empG.php'; // Inclure le contrôleur ReclamationC
$ges_off_empG = new ges_off_empG();
$ges_off_empG->deleteoffre($_GET["titre_off"]);
header('Location:offred\'emploi.php');

?>
