<?php
include '../Controller/cvC.php'; // Inclure le contrôleur cvC
$cvC = new cvC(); // Créer une instance du contrôleur cvC
$list = $cvC->listCv(); // Obtenir la liste des CV
?>
<html>

<head>
    <link rel="stylesheet" href="list.css"></head>

<body>
    <div id="dashboard">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="Cv.html">  Add cv</a></li>
            <li><a href="list.php"> List cv</a></li>
        </ul>
    </div>
    <center>
        <h1>List of CVs</h1>
        <h2>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th style="width: 100px;">nom</th>
            <th style="width: 100px;">prenom</th>
            <th style="width: 200px;">email</th>
            <th style="width: 200px;">numéro</th>
            <th style="width: 200px;">date de naissance</th>
            <th style="width: 300px;">adresse</th>
            <th style="width: 200px;">nationalité</th>
            <th style="width: 300px;">objectifs</th>
            <th style="width: 300px;">diplômes</th>
            <th style="width: 300px;">postes</th>
            <th style="width: 300px;">compétences</th>
            <th style="width: 300px;">intérêts</th>
            <th style="width: 100px;">Update</th>
            <th style="width: 100px;">Delete</th>
        </tr>
        <?php
        foreach ($list as $cv) {
        ?>
            <tr>
                <td><?= $cv['nom']; ?></td>
                <td><?= $cv['prenom']; ?></td>
                <td><?= $cv['email']; ?></td>
                <td><?= $cv['num']; ?></td>
                <td><?= $cv['dte']; ?></td>
                <td><?= $cv['adresse']; ?></td>
                <td><?= $cv['nationalite']; ?></td>
                <td><?= $cv['objectifs']; ?></td>
                <td><?= $cv['diplomes']; ?></td>
                <td><?= $cv['postes']; ?></td>
                <td><?= $cv['comp']; ?></td>
                <td><?= $cv['interets']; ?></td>
                <td align="center">
                    <form method="POST" action="update.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value="<?= $cv['num']; ?>" name="num">
                    </form>
                </td>
                <td>
                    <a href="delete.php?num=<?php echo $cv['num']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>