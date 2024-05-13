<?php
require_once '../../config.php';


    $titre = $_GET['offre_id'];
    $db = config::getConnexion();
    $search_query = "SELECT titre_off,nom_ent,lieu_ent,nbr_emp,type_off,mode_trav,nom_rec,DATE_FORMAT(date_rec, '%Y-%m-%d') AS d,descrip FROM ges_off_emp WHERE titre_off = :titre_off";
    $stmt = $db->prepare($search_query);
    $stmt->execute(array(':titre_off' => $titre));
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $fffff[] = [
            'id' => $row['titre_off'],
            'nom_en' => $row['nom_ent'],
            'lieu' => $row['lieu_ent'],
            'nbr' => $row['nbr_emp'],
            'type' => $row['type_off'],
            'mode' => $row['mode_trav'],
            'nom_r' => $row['nom_rec'],
            'date_r' => $row['d'],
            'dis'=> $row['descrip']
        
        ];
    }
    echo json_encode($fffff);
?>
