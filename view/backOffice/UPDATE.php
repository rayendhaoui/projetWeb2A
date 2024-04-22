<?php
require_once 'config.php';
include '../../controller/service.php';
$error = "";

$service = null;

$serviceS = new serviceS();
if (
  isset($_POST["nom"]) &&
  isset($_POST["prix"]) &&
  isset($_POST["typee"]) &&
  isset($_POST["mode"]) 

) {
    if (
      !empty($_POST['nom']) &&
      !empty($_POST['prix']) &&
      !empty($_POST["typee"])&&
      !empty($_POST["mode"]) 
 
    ) {
      $service = new service(
      $_POST['nom'],
      $_POST['prix'],
      $_POST['typee'],
      $_POST['mode'] 
      );
      $serviceS->edit($service,$_POST['nom']);
      header('Location:listeservice.php');
    } else
      $error = "Missing information";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Service</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
    <div id="dashboard">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="serviceajou.php">Ajouter un service</a></li>
            <li><a href="listeservice.php">Liste des services</a></li>
            <li><a href="UPDATE.php">Update</a></li>
        </ul>
    </div>

    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="./UPDATE.php" method="POST">
        <table align="center">
        <tr>
        <td><label  for="nom">Nom</label></td>
        <td><input  type="text" name="nom" id="nom" value="<?php echo $service['nom']; ?>" id="nom"></td>
    </tr>
            <tr>
                <td><label for="prix">Prix du service</label></td>
                <td><input type="text" name="prix" id="prix" value="<?php echo $service['prix']; ?>" maxlength="50"></td>
            </tr>
            <tr>
                <td><label for="typee">Type du service</label></td>
                <td><input type="text" name="typee" id="typee" value="<?php echo $service['typee']; ?>" maxlength="50"></td>
            </tr>
            <tr>
                <td><label for="mode">Mode du service</label></td>
                <td><label for="mode">Mode du service</label></td>
                <td>
                    <input type="radio" id="mode_en_ligne" name="mode" value="en ligne" <?php echo (isset($service['mode']) && $service['mode'] === 'en ligne') ? 'checked' : ''; ?>>
                    <label for="mode_en_ligne">En ligne</label>
                </td>
                <td>
                    <input type="radio" id="mode_presentiel" name="mode" value="présentiel" <?php echo (isset($service['mode']) && $service['mode'] === 'présentiel') ? 'checked' : ''; ?>>
                    <label for="mode_presentiel">Présentiel</label>
                </td>
                <td>
                    <input type="radio" id="mode_hybride" name="mode" value="hybride" <?php echo (isset($service['mode']) && $service['mode'] === 'hybride') ? 'checked' : ''; ?>>
                    <label for="mode_hybride">Hybride</label>
                </td>            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Update">
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
