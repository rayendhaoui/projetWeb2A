<?php
include '../Controller/userc.php'; // Inclure le contrôleur cvC
$userc = new userc(); // Créer une instance du contrôleur cvC
$list = $userc->listuser(); // Obtenir la liste des CV
?>
<html>

<head>
    <link rel="stylesheet" href="list.css"></head>

<body>
    <div id="dashboard">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="user.html">  Add user</a></li>
            <li><a href="list.php"> List user</a></li>
        </ul>
    </div>
    <center>
        <h1>List of user</h1>
        <h2>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th style="width: 100px;">nom</th>
            <th style="width: 100px;">prenom</th>
            <th style="width: 200px;">email</th>
            <th style="width: 200px;">region</th>
            <th style="width: 300px;">ville</th>
            <th style="width: 200px;">dernier_service</th>
            <th style="width: 300px;">date_n</th>
            <th style="width: 200px;">mot_d_passe </th>
            <th style="width: 100px;">Update</th>
            <th style="width: 100px;">Delete</th>
        </tr>
        <?php
        foreach ($list as $user) {
        ?>
            <tr>
                <td><?= $user['nom']; ?></td>
                <td><?= $user['prenom']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['region']; ?></td>
                <td><?= $user['ville']; ?></td>
                <td><?= $user['dernier_service']; ?></td>
                <td><?= $user['date_n']; ?></td>
                <td><?= $user['mot_d_passe']; ?></td>
                
                
                <td align="center">
                    <form method="POST" action="update.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value="<?= $user['nom']; ?>" name="nom">
                    </form>
                </td>
                <td>
                    <a href="delete.php?nom=<?php echo $user['nom']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>