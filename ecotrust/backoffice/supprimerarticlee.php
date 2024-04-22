<?PHP
include "../Controller/articleeC.php";
$livraisonC=new livraisonC();
if (isset($_POST["idliv"])){
	$livraisonC->supprimerlivraison($_POST["idliv"]);
	header('Location: afficherarticle.php');
}

?>