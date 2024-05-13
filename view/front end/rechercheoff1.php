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
    <ul id="jobList">
        <li>
            <div class="group-10">
                <button style="position: absolute;height: 100%; width: 100%;background-color: transparent; border: none;" onclick="toggle(); fonction1('<?= $r['titre_off']; ?>');">
                    <td> 
                        <?php 
                            $image_data = base64_encode($r['photo']); 
                            $image_mine = 'image/jpeg';
                            $image_src = "data:{$image_mine};base64,{$image_data}";
                        ?>
                        <img style="position: absolute; top: 0px; left: -50px; width: 50px; height: 50px;" src="<?= $image_src; ?>" alt="image" >
                    </td>
                    <div class="text-wrapper-15" id="tit"><?= $r['titre_off']; ?></div>
                    <p class="span-wrapper"><span class="span"><?= $r['nom_ent']; ?></span></p>
                    <div class="gouvernorat-tunis-2"><?= $r['lieu_ent']; ?></div>
                    <div class="promu-e-candidature-2">Promu(e)<br /><?= $r['type_off']; ?></div>
                    <input type="hidden" value="<?= $r['titre_off']; ?>" name="titre_off">
                </button> 
            </div>
        </li>
    </ul>
<?php
    }
}
?>

<script>
    function toggle() {
        var x = document.getElementById('div1');
        if (x.style.display == "none") {
            x.style.display = 'block';
        } else {
            x.style.display = 'none';
        }
    }

    function fonction1(titreOff) {
        // Effectuer une requête AJAX vers le script PHP
        fetch(`get_offre.php?offre_id=${titreOff}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(ffff => {
                    var titreDiv1 = document.querySelector('.charg-e-commercial-e');
                    titreDiv1.textContent = ffff.id;
                    var discrptiondiv = document.querySelector('.nous-recherchons');
                    discrptiondiv.textContent = ffff.dis;
                    var nom_ent = document.querySelector('.text-wrapper-23');
                    nom_ent.textContent = ffff.nom_en;
                    var locations = document.querySelector('.text-wrapper-24');
                    locations.textContent = ffff.lieu;
                    var nombr = document.querySelector('.text-wrapper-25');
                    nombr.textContent = ffff.nbr;
                    var tyype = document.querySelector('.text-wrapper-26');
                    tyype.textContent = ffff.type;
                    var moode = document.querySelector('.text-wrapper-6');
                    moode.textContent = ffff.mode;
                    var nomr = document.querySelector('.text-wrapper-28');
                    nomr.textContent = ffff.nom_r;
                });
            })
            .catch(error => {
                console.error("Erreur lors de la récupération des données de l'offre:", error);
            });
    }
</script>
