<?php
session_start();
require_once '../../config.php';

if (isset($_GET['input'])) {
    $db = config::getConnexion();
    $input = (string) trim($_GET['input']);
    $stmt = $db->prepare("SELECT * FROM service WHERE nom LIKE ? LIMIT 10");
    $stmt->execute(["$input%"]);
    $results = $stmt->fetchAll();
    
    if (count($results) > 0) { // Check if results are found
?>
    <table>
        <thead>
            <tr>
                <td>nom</td>
                <td>niveau</td>
                <td>prix</td>
                <td>type</td>
                <td>mode</td>
                <td>Actions</td> <!-- Added a header for actions -->
            </tr>
        </thead>
        <tbody>
<?php
        foreach ($results as $r) {
?>
            <tr>
                <td><?= $r['nom']; ?></td>
                <td><?= $r['id']; ?></td>
                <td><?= $r['prix']; ?></td>
                <td><?= $r['typee']; ?></td>
                <td><?= $r['mode']; ?></td>
                <td>
                    <form method="GET" action="UPDATE.php">
                        <input type="submit" name="mise a jour" class="btn btn-default btn-sm" value="mise a jour">
                        <input type="hidden" value="<?= $r["nom"] ?>" name="nom">
                    </form>
                    <a class="btn btn-info btn-lg" href="delete.php?nom=<?= $r["nom"] ?>">
                        <span class="glyphicon glyphicon-remove"></span>Delete
                    </a>
                </td>
            </tr>
<?php
        }
?>
        </tbody>
    </table>
<?php
    } else {
        echo "No results found.";
    }
}
?>
