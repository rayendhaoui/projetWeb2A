<?php
require_once '../config.php';
include '../Controller/userc.php';

$error = "";

// create 
$user = null;

// create an instance of the controller
$userc = new userc();
if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["region"]) &&
    isset($_POST["ville"]) &&
    isset($_POST["dernier_service"]) &&
    isset($_POST["date_n"]) 
) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["region"]) &&
        !empty($_POST["ville"]) &&
        !empty($_POST["dernier_service"]) &&
        !empty($_POST["date_n"]) 
    ) {
        $user = new user (
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["email"],
        $_POST["region"],
        $_POST["ville"],
        $_POST["dernier_service"],
        $_POST["date_n"]
        );
        $userc->updateuser($user, $_POST["nom"]);
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
        <li><a href="user.html"> Add user</a></li>
            <li><a href="list.php"> List</a></li>
            <li><a href="list.php">Update</a></li>
        </ul>
        
    </div>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['nom'])) {
        $user = $userc->showuser($_POST['nom']);

    ?>
    
<form action="./update.php" method="post" onsubmit="">

<table border="1" align="center" width="30%" height="40%">
    <tr>
        <td>
        <label for="nom">Nom</label>
        </td>
        <td><input type="text" name="nom" id="nom" value="<?php echo $user['nom']; ?>" id="nom"></td>
    </tr>
    <tr>
        <td>
        <label for="prenom">Prénom</label>
        </td>
        <td>
            <input type="text" name="prenom" id="prenom" value="<?php echo $user['prenom']; ?>" maxlength="50">
        </td>
    </tr>
    <tr>
        <td>
        <label for="email">Address émail</label>
        </td>
        <td>
        <input type="text" name="email" id="email" value="<?php echo $user['email']; ?>" maxlength="20">
        </td>
    </tr>
    <tr>
        <td>
        <label  for="region">gerion</label>
        </td>
        <td>
        <input type="text" name="region" id="region" value="<?php echo $user['region']; ?>" maxlength="50">
        </td>
    </tr>
    
        <tr>
            <td>
            <label for="ville">Adresse</label>
            </td>
            <td>
            <input type="text" name="ville" id="ville" value="<?php echo $user['ville']; ?>" maxlength="50">
            </td>
        </tr>
        <tr>
            <td>
            <label for="dernier_service">dernier_service</label>
            </td>
            <td>
            <input type="text" name="dernier_service" id="dernier_service" value="<?php echo $user['dernier_service']; ?>" maxlength="20">
            </td>
        </tr>
        <tr>
            <td>
            <label for="date_n">Date De Naissance</label>
            </td>
            <td>
            <input type="date" name="date_n" id="date_n" value="<?php echo$user ['date_n']; ?>" maxlength="50">
            </td>
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
    <?php
    }
    
    ?>
</table>

</form>

</body>
</html>