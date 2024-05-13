<?php
session_start();
require_once 'C:\xampp\htdocs\gs_service\config.php';

if (isset($_GET['input'])) {
    $db = config::getConnexion();
    $input = (string) trim($_GET['input']);
    $stmt = $db->prepare("SELECT * FROM prestataire WHERE id LIKE ? LIMIT 10");
    $stmt->execute(["$input%"]);
    $results = $stmt->fetchAll();
    foreach ($results as $r) {
?>
        <div style="margin-top: 20px; border-bottom: 2px solid #ccc;">
            <?= $r['id'] . " " . $r['nom'] ?>
        </div>
<?php
    }
}
?>