<?php
include '../controller/reclamationC.php'; // Inclure le contrôleur ReclamationC
$employeC = new ReclamationC();
$employeC->deleteReclamation($_GET["id"]);
header('Location:List.php');

?>
