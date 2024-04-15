<?php
include '../Controller/cvC.php'; // Inclure le contrôleur ReclamationC
$cvC = new cvC();
$cvC->deleteReclamation($_GET["num"]);
header('Location:list.php');

?>
