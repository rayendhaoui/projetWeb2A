<?php
include '../../Controller/service.php';
$serviceS = new  serviceS();
$serviceS->delete($_GET["nom"]);
header('Location:serviceback.php');