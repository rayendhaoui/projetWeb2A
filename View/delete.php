<?php
include '../Controller/userc.php'; // Inclure le contrôleur ReclamationC
$userc = new userc();
$userc->deleteReclamation($_GET["nom"]);
header('Location:list.php');

?>
