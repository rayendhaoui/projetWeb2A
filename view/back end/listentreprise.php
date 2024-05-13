<?php
include '../../Controller/ges_entrepriseG.php'; // Inclure le contrôleur cvC
$ges_entrepriseG = new ges_entrepriseG(); // Créer une instance du contrôleur cvC
$list = $ges_entrepriseG->listentreprise(); // Obtenir la liste des CV
?>
<html>

<head>
    <link rel="stylesheet" href="listoffre.css"></head>

<body>
    <div id="dashboard">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="ajoutentreprise.html">  Add entreprise</a></li>
            <li><a href="listentreprise.php"> List entreprise</a></li>
        </ul>
    </div>
    <center>
        <h1>List of Entreprise</h1>
        <h2>
        </h2>
    </center>
    <table border="1" align="center" width="100%">
        <tr>
            <th style="width: 100px;">Photo</th>
            <th style="width: 100px;">Nom Entreprise</th>
            <th style="width: 100px;">Nom du Recruteur</th>
            <th style="width: 100px;">Poste du Recruteur</th>
            <th style="width: 100px;">Lieu Entreprise</th>
            <th style="width: 100px;">Type de Service</th>
            <th style="width: 100px;">Email</th>
        </tr>
        <?php
        foreach ($list as $ges_entreprise) {
        ?>
            <tr>    
                <td> 
                   <?php
                    $image_data=base64_encode($ges_entreprise['photo']);
                    $image_mine ='image/jpeg';
                    $image_src="data:{$image_mine};base64,{$image_data}";
                    ?>
                    <img style="width: 50px; height: 50px;" src="<?php echo $image_src;?>"alt="image" >
                </td>
                <td><?= $ges_entreprise['nom_ent']; ?></td>
                <td><?= $ges_entreprise['nom_rec']; ?></td>
                <td><?= $ges_entreprise['poste_rec']; ?></td>
                <td><?= $ges_entreprise['lieu_ent']; ?></td>
                <td><?= $ges_entreprise['type_ser']; ?></td>
                <td><?= $ges_entreprise['email']; ?></td>
            </tr>


               
                <td >
                    <form method="POST" action="updateentreprise.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value="<?= $ges_entreprise['nom_ent']; ?>" name="nom_ent">
                    </form>
                </td>
                <td>
                    <a href="deleteentreprise.php?nom_ent=<?php echo $ges_entreprise['nom_ent']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>