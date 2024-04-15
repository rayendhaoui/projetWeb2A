<?php

include '../Controller/cvC.php';

$error = "";

// create cv
$cv = null;

// create an instance of the controller
$cvC = new cvC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["num"]) &&
    isset($_POST["dte"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["nationalite"]) &&
    isset($_POST["objectifs"]) &&
    isset($_POST["diplomes"]) &&
    isset($_POST["postes"]) &&
    isset($_POST["comp"]) &&
    isset($_POST["interets"])
) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["num"]) &&
        !empty($_POST["dte"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["nationalite"]) &&
        !empty($_POST["objectifs"]) &&
        !empty($_POST["diplomes"]) &&
        !empty($_POST["postes"]) &&
        !empty($_POST["comp"]) &&
        !empty($_POST["interets"])
    ) {
        $cv
     = new cv
    (
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["email"],
        $_POST["num"],
        $_POST["dte"],
        $_POST["adresse"],
        $_POST["nationalite"],
        $_POST["objectifs"],
        $_POST["diplomes"],
        $_POST["postes"],
        $_POST["comp"],
        $_POST["interets"]
        );
        $cv
    C->updatecv
    ($cv
    , $_POST["id"]);
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
        <li><a href="inscri.html">  Add cv
        
        </a></li>
            <li><a href="list.php"> List cv
            
            </a></li>
            <li><a href="list.php">Update</a></li>
        </ul>
        
    </div>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $cv
     = $cv
    C->showcv
    ($_POST['id']);

    ?>
<form action="./update.php" method="post" onsubmit="return controller()">

<table border="1" align="center" width="30%" height="40%">
    <tr>
        <td>
            <label for="id">Id cv
            :</label>
        </td>
        <td><input type="text" name="id" id="id" value="<?php echo $cv
    ['id']; ?>" maxlength="20"></td>
    </tr>
    <tr>
        <td>
            <label for="sujet">Sujet:</label>
        </td>
        <td>
            <input type="text" name="sujet" id="sujet" value="<?php echo $cv
        ['sujet']; ?>" maxlength="20">
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
            <input type="text" name="idUtilisateur" value="<?php echo $cv
        ['idUtilisateur']; ?>" id="idUtilisateur">
        </td>
    </tr>
    <tr>
            <td>
                <label for="nom">Nom:</label>
            </td>
            <td>
                <input type="text" name="nom" id="nom" value="<?php echo $cv
            ['nom']; ?>" maxlength="50">
            </td>
        </tr>
        <tr>
            <td>
                <label for="prenom">Prénom:</label>
            </td>
            <td>
                <input type="text" name="prenom" id="prenom" value="<?php echo $cv
            ['prenom']; ?>" maxlength="50">
            </td>
        </tr>
        <tr>
            <td>
                <label for="email">Email:</label>
            </td>
            <td>
                <input type="email" name="email" id="email" value="<?php echo $cv
            ['email']; ?>" maxlength="100">
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
      

    <?php
    }
    
    ?>
</body>

</html>
