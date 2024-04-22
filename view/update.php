<?php

include '../Controller/reclamationC.php';

$error = "";

// create Reclamation
$Reclamation = null;

// create an instance of the controller
$ReclamationC = new ReclamationC();
if (
    isset($_POST["id"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["sujet"]) &&
    isset($_POST["description"]) &&
    isset($_POST["idUtilisateur"]) 
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["sujet"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["idUtilisateur"]) 
    ) {
        $Reclamation = new Reclamation(
            $_POST['id'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['sujet'],
            $_POST['description'],
            $_POST['idUtilisateur']
        );
        $ReclamationC->updateReclamation($Reclamation, $_POST["id"]);
        header('Location:list.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
<link rel="stylesheet" href="update.css"></head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    
<div id="dashboard">
        <h1>Dashboard</h1>
        <ul>
        <li><a href="inscri.html">  Add reclamation</a></li>
            <li><a href="list.php"> List reclamation</a></li>
            <li><a href="list.php">Update</a></li>
        </ul>
        
    </div>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $Reclamation = $ReclamationC->showReclamation($_POST['id']);

    ?>
<form action="./update.php" method="post" onsubmit="return controller()">

<table border="1" align="center" width="30%" height="40%">
    <tr>
        <td>
            <label for="id">Id Reclamation:</label>
        </td>
        <td><input type="text" name="id" id="id" value="<?php echo $Reclamation['id']; ?>" maxlength="20"></td>
    </tr>
    <tr>
        <td>
            <label for="sujet">Sujet:</label>
        </td>
        <td>
            <input type="text" name="sujet" id="sujet" value="<?php echo $Reclamation['sujet']; ?>" maxlength="20">
        </td>
    </tr>
    <tr>
        <td>
            <label for="description">Description:</label>
        </td>
        <td>
            <textarea id="description" name="description" rows="7" cols="33" maxlength="120"></textarea>
        </td>
    </tr>
    <tr>
        <td>
            <label for="idUtilisateur">idUtilisateur:</label>
        </td>
        <td>
            <input type="text" name="idUtilisateur" value="<?php echo $Reclamation['idUtilisateur']; ?>" id="idUtilisateur">
        </td>
    </tr>
    <tr>
            <td>
                <label for="nom">Nom:</label>
            </td>
            <td>
                <input type="text" name="nom" id="nom" value="<?php echo $Reclamation['nom']; ?>" maxlength="50">
            </td>
        </tr>
        <tr>
            <td>
                <label for="prenom">Prénom:</label>
            </td>
            <td>
                <input type="text" name="prenom" id="prenom" value="<?php echo $Reclamation['prenom']; ?>" maxlength="50">
            </td>
        </tr>
        <tr>
            <td>
                <label for="email">Email:</label>
            </td>
            <td>
                <input type="email" name="email" id="email" value="<?php echo $Reclamation['email']; ?>" maxlength="100">
            </td>
        </tr>
    <tr>
        
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" value="Update">
        </td>
        <td>
            <input type="reset" value="Reset">
        </td>
    </tr>
</table>
</form>
        <script>
    function controller() {
        var id = document.getElementById("id").value;
        var sujet = document.getElementById("sujet").value;
        var description = document.getElementById("description").value;
        var idUtilisateur = document.getElementById("idUtilisateur").value;
        var nom = document.getElementById("nom").value;
         var prenom = document.getElementById("prenom").value;
           var email = document.getElementById("email").value;

        if (id === "") {
            alert("Veuillez entrer un identifiant.");
            return false; 
        } else if (isNaN(id) || id <= 0) {
            alert("L'identifiant doit être un nombre supérieur à zéro.");
            return false; 
        }

        if (sujet === "") {
            alert("Veuillez entrer un sujet.");
            return false; 
        } else if (sujet.length < 6) {
            alert("Le sujet doit contenir au moins 6 caractères.");
            return false; 
        }

        if (description === "") {
            alert("Veuillez entrer une description.");
            return false; 
        } else if (description.length < 30) {
            alert("La description doit contenir au moins 30 caractères.");
            return false; 
        }

        if (idUtilisateur === "") {
            alert("Veuillez entrer un identifiant d'utilisateur.");
            return false; 
        } else if (isNaN(idUtilisateur) || idUtilisateur <= 0) {
            alert("L'identifiant de l'utilisateur doit être un nombre supérieur à zéro.");
            return false; 
        } if (nom === "") {
        alert("Veuillez entrer un nom.");
        return false; 
    }

    if (prenom === "") {
        alert("Veuillez entrer un prénom.");
        return false; 
    }

    if (email === "") {
        alert("Veuillez entrer un email.");
        return false; 
    } else if (!validateEmail(email)) {
        alert("Veuillez entrer un email valide.");
        return false; 
    }
        

        return true; 
        function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
    }
</script>

    <?php
    }
    
    ?>
</body>

</html>
