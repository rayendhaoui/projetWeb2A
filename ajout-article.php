<?PHP
include "../Entities/article.php";
include "../Controller/articleC.php";

if (isset($_POST['ID']) and isset($_POST['Nom']) and isset($_POST['Prenom']) and isset($_POST['Daten']) and isset($_POST['CIN']) and isset($_POST['Adresse']) and isset($_POST['Email'])) {
    $livreur = new livreur($_POST['ID'], $_POST['Nom'], $_POST['Prenom'], $_POST['Daten'], $_POST['CIN'], $_POST['Adresse'], $_POST['Email']);

    $livreurC =  new livreurC();
    $livreurC->ajouterlivreur($livreur);

    header('Location: affich-article.php');

  
       
	

	
}
else{
	echo "vérifier les champs";
}

?>