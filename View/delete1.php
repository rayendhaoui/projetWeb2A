<?php
include '../Controller/societec.php'; // Inclure le contrôleur ReclamationC
$societec = new societec();
$societec->deleteReclamation1($_GET["nom"]);
header('Location:list1.php');

?>
