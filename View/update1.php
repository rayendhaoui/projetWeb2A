<?php
require_once '../config1.php';
include '../Controller/societec.php';

$error = "";

// create 
$societe = null;

// create an instance of the controller
$societec = new societec();
if (
    isset($_POST["nom"]) &&
    isset($_POST["region"]) &&
    isset($_POST["ville"]) &&
    isset($_POST["num_tel"]) &&
    isset($_POST["email"]) &&
    isset($_POST["mot_d_passe"]) 
) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["region"]) &&
        !empty($_POST["ville"]) &&
        !empty($_POST["num_tel"]) && 
        !empty($_POST["email"]) &&
        !empty($_POST["mot_d_passe"]) 
    ) {
        $societe = new societe (
        $_POST["nom"],
        $_POST["region"],
        $_POST["ville"],
        $_POST["num_tel"], 
        $_POST["email"],
        $_POST["mot_d_passe"]
        );
        $societec->updatesociete($societe, $_POST["nom"]);
        header('Location:list1.php');
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
        <li><a href="societe.html"> Add user</a></li>
            <li><a href="list1.php"> List</a></li>
            <li><a href="list1.php">Update</a></li>
        </ul>
        
    </div>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['nom'])) {
        $societe = $societec->showuser1($_POST['nom']);

    ?>
    
<form action="./update1.php" method="post" onsubmit="">

<table border="1" align="center" width="30%" height="40%">
    <tr>
        <td>
        <label for="nom">Nom</label>
        </td>
        <td><input type="text" name="nom" id="nom" value="<?php echo $societe['nom']; ?>" id="nom"></td>
    </tr>
    
    <tr>
        <td>
        <label  for="region">gerion</label>
        </td>
        <td>
        <input type="text" name="region" id="region" value="<?php echo $societe['region']; ?>" maxlength="50">
        </td>
    </tr>
    
        <tr>
            <td>
            <label for="ville">Adresse</label>
            </td>
            <td>
            <input type="text" name="ville" id="ville" value="<?php echo $societe['ville']; ?>" maxlength="50">
            </td>
        </tr>
        <tr>
            <td>
            <label for="num_tel">num_tel</label>
            </td>
            <td>
            <input type="text" name="num_tel" id="num_tel" value="<?php echo $societe['num_tel']; ?>" maxlength="20">
            </td>
        </tr>
        <tr>
         <td>
             <label for="email">Address émail</label>
           </td>
           <td>
              <input type="text" name="email" id="email" value="<?php echo $societe['email']; ?>" maxlength="20">
              </td>
         </tr>
        
        <tr>
            <td>
            <label for="mot_d_passe">mot_d_passe</label>
            </td>
            <td>
            <input type="password" name="mot_d_passe" id="mot_d_passe" value="<?php echo $societe['mot_d_passe']; ?>" maxlength="20">
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