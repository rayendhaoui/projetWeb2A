<?php
include '../Controller/societec.php'; // Inclure le contrôleur cvC
$societec = new societec(); // Créer une instance du contrôleur cvC
$list1 = $societec->listuser1(); // Obtenir la liste des CV
?>
<html>

<head>
    <link rel="stylesheet" href="list.css"></head>

<body>
    <div id="dashboard">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="societe.html">  Add societer</a></li>
            <li><a href="list1.php"> List societer</a></li>
        </ul>
    </div>
    <center>
        <h1>List of societe</h1>
        <h2>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th style="width: 100px;">nom</th>
            <th style="width: 200px;">region</th>
            <th style="width: 200px;">ville</th>
            <th style="width: 300px;">num_tel</th>
            <th style="width: 200px;">email</th>
            <th style="width: 200px;">mot_d_passe </th>
            <th style="width: 100px;">Update</th>
            <th style="width: 100px;">Delete</th>
        </tr>
        <?php
        foreach ($list1 as $societe) {
        ?>
            <tr>
                <td><?= $societe['nom']; ?></td>
                <td><?= $societe['region']; ?></td>
                <td><?= $societe['ville']; ?></td>
                <td><?= $societe['num_tel']; ?></td>
                <td><?= $societe['email']; ?></td>
                <td><?= $societe['mot_d_passe']; ?></td>
                
                
                <td align="center">
                    <form method="POST" action="update1.php">
                        <input type="submit" name="update1" value="Update1">
                        <input type="hidden" value="<?= $societe['nom']; ?>" name="nom">
                    </form>
                </td>
                <td>
                    <a href="delete1.php?nom=<?php echo $societe['nom']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>