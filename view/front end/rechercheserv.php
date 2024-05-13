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
        foreach ($results as $r) {
?>
            <div class="card">
                <div class="card-body">
                    <h2><?= $r['nom']; ?></h2>
                    <p>Niveau: <?= $r['id']; ?></p>
                    <p>Prix: <?= $r['prix']; ?></p>
                    <p>Type: <?= $r['typee']; ?></p>
                    <p>Mode: <?= $r['mode']; ?></p>
                </div>
            </div>
<?php
        }
    } else {
        echo "Aucun résultat trouvé.";
    }
}
?>
