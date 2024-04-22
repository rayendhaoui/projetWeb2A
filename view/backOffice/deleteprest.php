<?php
include '../../Controller/prestataireController.php';
$prest = new  prest();
$prest->delete($_GET["id"]);
header('Location:listeprest.php');