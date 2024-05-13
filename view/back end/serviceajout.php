<?php

require_once '../../config.php';
require_once '../../Model/SERVICE.php'; // Assuming SERVICE.PHP is located in the correct directory
require_once '../../Controller/service.php'; // Include the file containing the service class

$error = "";
 // Instantiate the ServiceModel class from the Myfunction namespace

if (
    isset($_POST["nom"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["mode"]) &&
    isset($_POST["id"]) &&
    isset($_POST["typee"]) 
    
) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["prix"]) &&
        !empty($_POST["typee"]) &&
        !empty($_POST["id"]) &&
        !empty($_POST["mode"]) 

    ) {
        // Create a new ServiceModel object with the provided data
        $service = new service (
            $_POST['nom'],
            $_POST['prix'],
            $_POST['typee'],
            $_POST['id'],
            $_POST['mode']
        );
        $serviceS = new serviceS;
       
        $serviceS->create($service);
        header('Location: serviceback.php'); 
    } else {
        $error = "Missing information";
    }
}

?>
      
        
<!DOCTYPE html>
<html>
<head>
    <style>
        h1 {
    font-size: 2.5em;       /* Controls the size of the font */
    font-weight: bold;      /* Makes the text bold */
    color: #333;            /* Sets a dark gray color */
    text-align: center;     /* Centers the text horizontally */
    margin-bottom: 20px;    /* Space below the heading */
    letter-spacing: 1px;    /* Slightly increases the spacing between characters */
    font-family: 'Arial', sans-serif;  /* Uses a common sans-serif font */
}

    </style>
<link rel="stylesheet" href="update.css">

    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="offred'emploi.css" />
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Ajouter un service</title>
    <script>
        function validateForm() {
            event.preventDefault();
            // Récupérer les éléments du formulaire
            var nom = document.getElementById('nom').value;
            var prix = parseFloat(document.getElementById('prix').value);
            var niveau = parseInt(document.getElementById('niveau').value);
            var typee = document.getElementById('typee').value;
            //var mode = document.getElementById('mode').value;

            // Vérifier que les champs obligatoires ne sont pas vides
            if (!nom || !prix || !niveau || !typee) {
                alert("Tous les champs sont obligatoires.");
                return false; // Empêche l'envoi du formulaire
            }

            // Vérifier que le prix est un nombre positif
            if (isNaN(prix) || prix <= 0) {
                alert("Le prix doit être un nombre positif.");
                return false;
            }

            // Vérifier que le niveau est un nombre entier positif
            if (isNaN(niveau) || niveau < 0) {
                alert("Le niveau doit être un entier positif.");
                return false;
            }

            // Vérifier la longueur maximale des chaînes
            if (nom.length > 20 || typee.length > 20) {
                alert("Le nom et le type ne doivent pas dépasser 20 caractères.");
                return false;
            }
            
            document.getElementById('myForm').submit(); // Si toutes les validations réussissent
        }
    </script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
    <h1>Ajouter Un Service</h1>
    <?php if (!empty($error)): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <div class="sign">
        <div class="sign-up">
        <!--<img class="logo-web"  src="img/logo-web-1.png" />-->


                <form action="" method="POST" id="myForm">
                <table align="center">
            <tr>
                <td><label for="nom">Nom du service</label></td>
                <td><input type="text" name="nom" id="nom" value="" maxlength="50"></td>
            </tr>
            <tr>
                <td><label for="prix">Prix du service</label></td>
                <td><input type="text" name="prix" id="prix" value="" maxlength="50"></td>
            </tr>
            <tr>
                <td><label for="typee">Type du service</label></td>
                <td><input type="text" name="typee" id="typee" value="" maxlength="50"></td>
            </tr>
            <tr>
                <td><label for="id">niveau d'esperience</label></td>
                <td><input type="text" name="id" id="id" value="" maxlength="50"></td>
            </tr>

            <tr>
                <td><label for="mode">Mode du service</label></td>
                <td>
                    <input type="radio" id="mode_en_ligne" name="mode" value="en ligne" >
                    <label for="mode_en_ligne">En ligne</label>
                </td>
                <td>
                    <input type="radio" id="mode_presentiel" name="mode" value="présentiel" >
                    <label for="mode_presentiel">Présentiel</label>
                </td>
                <td>
                    <input type="radio" id="mode_hybride" name="mode" value="hybride" >
                    <label for="mode_hybride">Hybride</label>
                </td>            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Ajouter">
                </td>
            </tr>
        </table>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
