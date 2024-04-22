<?php
include '../controller/reclamationC.php'; // Inclure le contrôleur ReclamationC
$reclamationC = new ReclamationC(); // Créer une instance du contrôleur ReclamationC
$list = $reclamationC->listReclamation(); // Obtenir la liste des réclamations
?>
<html>

<head>
<link rel="stylesheet" href="list.css"></head>

<body>
<div id="dashboard">
        <h1>Dashboard</h1>
        <ul>
        <li><a href="inscri.html">  Add reclamation</a></li>
            <li><a href="list.php"> List reclamation</a></li>
            <li><a href="list.php">update</a></li>
        </ul>
    </div>
    <center>
        <h1>List of Reclamations</h1>
        <h2>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
    <tr>
    <th style="width: 70px;">id</th>
        <th style="width: 100px;">nom</th>
        <th style="width: 100px;">prenom</th>
        <th style="width: 200px;">email</th>
        <th style="width: 200px;">sujet</th>
        <th style="width: 700px;">description</th>
        <th style="width: 70px;">idUtilisateur</th>
        

        <th style="width: 100px;">Update</th>
        <th style="width: 100px;">Delete</th>
    </tr>
        <?php
        foreach ($list as $reclamation) {
        ?>
            <tr>
            <td><?= $reclamation['id']; ?></td>
            <td><?= $reclamation['nom']; ?></td>
            <td><?= $reclamation['prenom']; ?></td>
            <td><?= $reclamation['email']; ?></td>

                <td><?= $reclamation['sujet']; ?></td>
                <td class="description-cell"><?= $reclamation['description']; ?></td>
                <td><?= $reclamation['idUtilisateur']; ?></td>
                <td align="center">
                    <form method="POST" action="update.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value="<?= $reclamation['id']; ?>" name="id">
        </form>
    </td>
    <td>
        <a href="delete.php?id=<?php echo $reclamation['id']; ?>">Delete</a>
    </td>
</tr>

        <?php
        }
        ?>
    </table>
    <style>
        .description-cell {
            height: 100px; /* Ajustez cette valeur selon vos besoins */
            overflow-y: auto; /* Ajoutez une barre de défilement verticale si le contenu dépasse la hauteur spécifiée */
        }
    </style>
</body>

</html>
