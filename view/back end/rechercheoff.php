<?php
session_start();
require_once '../../config.php';

if (isset($_GET['input'])) {
    $db = config::getConnexion();
    $input = (string) trim($_GET['input']);
    $stmt = $db->prepare("SELECT * FROM ges_off_emp WHERE titre_off LIKE ? LIMIT 10");
    $stmt->execute(["$input%"]);
    $results = $stmt->fetchAll();
    foreach ($results as $r) {
?>
    <table >
        <thead>
            <tr>
                <td>photo</td>
                <td>titre_off</td>
                <td>nom_ent</td>
                <td>lieu_ent</td>
                <td>nbr_emp</td>
                <td>type_off</td>
                <td>mode_trav</td>
                <td>nom_rec</td>
                <td>date_rec</td>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> 
                    <?php
                        $image_data=base64_encode($r['photo']);
                        $image_mine ='image/jpeg';
                        $image_src="data:{$image_mine};base64,{$image_data}";
                        ?>
                        <img style="width: 50px; height: 50px;" src="<?php echo $image_src;?>"alt="image" >
                </td>
                <td><?= $r['titre_off']; ?></td>
                <td><?= $r['nom_ent']; ?></td>
                <td><?= $r['lieu_ent']; ?></td>
                <td><?= $r['nbr_emp']; ?></td>
                <td><?= $r['type_off']; ?></td>
                <td><?= $r['mode_trav']; ?></td>
                <td><?= $r['nom_rec']; ?></td>
                <td><?= $r['date_rec']; ?></td>
                <td> 
                    <form method="POST" action="PDF.php">
                        <input type="submit" name="PDF" value="PDF">
                        <input type="hidden" value="<?= $r['titre_off']; ?>" name="titre_off">
                    </form>
                </td>
                <td >
                    <form method="POST" action="updateoffre.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value="<?= $r['titre_off']; ?>" name="titre_off">
                    </form>
                </td>
                <td>
                    <a href="deleteoffre.php?titre_off=<?php echo $r['titre_off']; ?>">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
<?php
    }
}
?>
