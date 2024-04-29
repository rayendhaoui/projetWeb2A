<?PHP
include "../Entities/articlee.php";
include "../Controller/articleeC.php";

if (isset($_POST['idliv']) and isset($_POST['idcmd']) and isset($_POST['etat']) and isset($_POST['adresse']) and isset($_POST['date'])) {
    $livraison = new livraison($_POST['idliv'], $_POST['idcmd'], $_POST['etat'], $_POST['adresse'], $_POST['date']);
    echo $_POST['idliv'];
    echo $_POST['idcmd'];
    echo $_POST['etat'];
    echo $_POST['adresse'];
    echo $_POST['date'];
    $livraisonC =  new livraisonC();
    $livraisonC->ajouterlivraison($livraison);
   // echo "Commande passé";
   header('Location: commandepasser.php');

  
       
	

	
}
else{
	echo "vérifier les champs";
}

?>