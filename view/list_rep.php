<?php
include '../controller/reponseC.php'; // Inclure le contrôleur ReponseC
$reponseC = new reponseC(); // Créer une instance du contrôleur ReponseC
$list = $reponseC->listReponse(); // Obtenir la liste des réponses
?>
<html>

<head>
<link rel="stylesheet" href="list.css"></head>

<body>
<div id="dashboard">
        <h1>Dashboard</h1>
        <ul>
        <li><a href="reponse.html">Ajouter une réponse</a></li> <!-- Lien vers la page pour ajouter une réponse -->
            <li><a href="list_rep.php">List Responses</a></li> <!-- Lien vers la page pour afficher la liste des réponses -->
        </ul>
    </div>
    <center>
        <h1>List of Responses</h1>
    </center>
    <table border="1" align="center" width="70%">
    <tr>
        <th style="width: 70px;">ID</th>
        <th style="width: 100px;">Reclaim ID</th>
        <th style="width: 400px;">Message</th>
        <th style="width: 150px;">Date</th>
        <th style="width: 100px;">Update</th>
        <th style="width: 100px;">Delete</th>
    </tr>
        <?php
        foreach ($list as $reponse) {
        ?>
            <tr>
                <td><?= $reponse['id_rep']; ?></td>
                <td><?= $reponse['reclaimID']; ?></td>
                <td><?= $reponse['message']; ?></td>
                <td><?= $reponse['date']; ?></td>
                <td align="center">
                    <form method="POST" action="update_response.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value="<?= $reponse['id_rep']; ?>" name="id_rep">
                    </form>
                </td>
                <td>
                    <a href="delete_rep.php?id_rep=<?= $reponse['id_rep']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
