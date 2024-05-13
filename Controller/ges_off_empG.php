<?php
require_once '../../config.php';
require_once '../../Model/ges_off_emp.php'; // Importation de la classe Reclamation

class ges_off_empG // Renommage de la classe UserC en ReclamationC
{
    public function addoffre($ges_off_emp) {
        try {
            $db = config::getConnexion();           
            $sql = "INSERT INTO ges_off_emp ( photo, titre_off, nom_ent, lieu_ent, nbr_emp, type_off, mode_trav, nom_rec, date_rec, descrip)  VALUES ( :photo, :titre_off, :nom_ent, :lieu_ent, :nbr_emp, :type_off, :mode_trav, :nom_rec, :date_rec, :descrip)";
            $query = $db->prepare($sql);
            $query->execute([
                'photo' => $ges_off_emp->getphoto(),
                'titre_off' => $ges_off_emp->gettitre_off(),
                'nom_ent' => $ges_off_emp->getnom_ent(),
                'lieu_ent' => $ges_off_emp->getlieu_ent(),
                'nbr_emp' => $ges_off_emp->getnbr_emp(),
                'type_off' => $ges_off_emp->gettype_off(),
                'mode_trav' => $ges_off_emp->getmode_trav(),
                'nom_rec' => $ges_off_emp->getnom_rec(),
                'date_rec' => $ges_off_emp->getdate_rec(),
                'descrip' => $ges_off_emp->getdescrip()
            ]);      
            return true; // Succès de l'insertion
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false; // Échec de l'insertion
        }
    }
   


    function updateoffre($ges_off_emp) {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE ges_off_emp SET 
                    photo = :photo,
                    nom_ent = :nom_ent,
                    lieu_ent = :lieu_ent,
                    nbr_emp = :nbr_emp,
                    type_off = :type_off,
                    mode_trav = :mode_trav,
                    nom_rec = :nom_rec,
                    date_rec = :date_rec,
                    descrip = :descrip
                WHERE titre_off = :titre_off' // Ensure that 'titre_off' matches your column name
            );
            $query->execute([
                'photo' => $ges_off_emp->getphoto(),
                'titre_off' => $ges_off_emp->gettitre_off(), // Assuming this returns 'vtbt' or the correct value
                'nom_ent' => $ges_off_emp->getnom_ent(),
                'lieu_ent' => $ges_off_emp->getlieu_ent(),
                'nbr_emp' => $ges_off_emp->getnbr_emp(),
                'type_off' => $ges_off_emp->gettype_off(),
                'mode_trav' => $ges_off_emp->getmode_trav(),
                'nom_rec' => $ges_off_emp->getnom_rec(),
                'date_rec' => $ges_off_emp->getdate_rec(),
                'descrip' => $ges_off_emp->getdescrip()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage(); // Print any errors
        }
    }
    

    function deleteoffre($titre_off) // Renommage de la fonction deleteuser en deleteReclamation
    {
        $sql = "DELETE FROM ges_off_emp WHERE titre_off = :titre_off";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':titre_off', $titre_off);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function chercher_titre_offre($titre_off) // Renommage de la fonction chercher_id en chercher_id_reclamation
    {
        // Connexion à la base de données
        $db = config::getConnexion();
        
        $search_query = "SELECT * FROM ges_off_emp WHERE titre_off = :titre_off";
        $stmt = $db->prepare($search_query);
        $stmt->execute(array(':titre_off' => $titre_off));
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return NULL;
        }
    }
    function showsoffre($titre_off)
    {
        $db = config::getConnexion();
        $search_query = "SELECT * FROM ges_off_emp WHERE titre_off = :titre_off";
        $stmt = $db->prepare($search_query);
        $stmt->execute(array(':titre_off' => $titre_off));
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return NULL;
        }
    }
    public function listoffre() // Renommage de la fonction listuser en listReclamation
    {
        $sql = "SELECT * FROM ges_off_emp"; // Modification pour utiliser la table "reclamation"
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listsaved()
    {
        $sql = "SELECT * FROM saved_off"; // Modification pour utiliser la table "reclamation"
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function showoffre($titre_off)
    {
    $sql = "SELECT * FROM ges_off_emp WHERE titre_off = :titre_off"; // Use parameterized query
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':titre_off', $titre_off, PDO::PARAM_STR); // Bind parameter
        $query->execute();
        $employe = $query->fetch();
        return $employe;
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
    }

    public function getlastoffre()
    {
        $sql = "SELECT * FROM ges_off_emp ORDER BY date_rec DESC LIMIT 5"; 
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
}


public function getnboffre() {
    $sql = "SELECT COUNT(*) as nb_offres FROM ges_off_emp";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}
 
function statis() {
    $db = Config::getConnexion();
    
    $feed = [
        'total' => 0,
        'validé' => 0,
        'encours_de_traitemen' => 0,
        'validé_percentage' => 0,
        'encours_de_traitemen_percentage' => 0
    ];

    try {
        // Get total feedback count
        $query = $db->prepare("SELECT COUNT(*) as total FROM ges_off_emp");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $feed['total'] = $result['total'];
        if ($feed['total'] > 0) {
            // Get count of likes
            $query = $db->prepare("SELECT COUNT(*) as validé FROM ges_off_emp WHERE statu = 'validé'");
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $feed['validé'] = $result['validé'];

            // Get count of dislikes
            $query = $db->prepare("SELECT COUNT(*) as encours_de_traitemen FROM ges_off_emp WHERE statu = 'encours de traitemen'");
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $feed['encours_de_traitemen'] = $result['encours_de_traitemen'];

            // Calculate percentages
            $feed['validé_percentage'] = ($feed['validé'] / $feed['total']) * 100;
            $feed['encours_de_traitemen_percentage'] = ($feed['encours_de_traitemen'] / $feed['total']) * 100;
        }
    } catch (Exception $e) {
        echo "Error getting statistics: " . $e->getMessage();
    }

    return $feed;
}
}

?>
}

?>
