<?php
// Include the necessary files with require_once to avoid multiple declarations
require_once '../../config.php';
include_once '../../Controller/prestataireController.php';  // Correct path for other required files

$error = "";
$prestataire = null;

$prest = new  prest();

 // Instantiate the ServiceModel class from the Myfunction namespace
if (
    isset($_POST["id"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["metier"]) &&
    isset($_POST["age"]) &&
    isset($_POST["salaire"]) &&
    isset($_POST["niveau"])     
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["metier"]) &&
        !empty($_POST["age"]) &&
        !empty($_POST["salaire"]) &&
        !empty($_POST["niveau"]) 

    ) {
        // Create a new ServiceModel object with the provided data
        $prestataire = new prestataire (
            $_POST['id'],
            $_POST['nom'],
            $_POST['metier'],
            $_POST['age'],
            $_POST['salaire'],
            $_POST['niveau']
        );
       
        $prest->edit($prestataire,$_POST['id']);
        header('Location: listeprest.php'); 
    } else {
        $error = "Missing information";
    }
}

?>
      
        
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="update.css">

    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <title>Ajouter un prestataire</title>
</head>
<body>
    <?php if (!empty($error)): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
    <div class="sign">
        <div class="sign-up">
        <img class="logo-web"  src="img/logo-web-1.png" />

        <div id="dashboard">
        <h1>Dashboard</h1>
        <ul>
        <li><a href="ajoutprest.php"> Ajouter un prestataire</a></li>
            <li><a href="listeprest.php"> Liste des prestataires</a></li>
            <li><a href="updateprest.php">Update</a></li>
        </ul> 
</div>

                <form action="" method="POST" id="myF">
                <table align="center">
            <tr>
                <td><label for="id">Identifiant</label></td>
                <td><input type="text" name="id" id="id" value="" maxlength="50"></td>
            </tr>
            <tr>
                <td><label for="prix">Nom </label></td>
                <td><input type="text" name="nom" id="nom" value="" maxlength="50"></td>
            </tr>
            <tr>
                <td><label for="metier">Métier</label></td>
                <td><input type="text" name="metier" id="metier" value="" maxlength="50"></td>
            </tr>
            <tr>
                <td><label for="age">Age</label></td>
                <td><input type="number" name="age" age="id" value="" maxlength="50"></td>
            </tr>
            <tr>
                <td><label for="salaire">Salaire </label></td>
                <td><input type="number" name="salaire" id="salaire" value="" maxlength="50"></td>
            </tr>
            <tr>
                <td><label for="niveau">Niveau d'experience</label></td>
                <td><input type="number" name="niveau" id="niveau" value="" maxlength="50"></td>
            </tr>

                <td></td>
                <td>
                    <input type="submit" value="Update">
                    <input type="reset" value="reset">

                </td>
            </tr>
        </table>

                </form>
            </div>
        </div>
</body>
</html>
