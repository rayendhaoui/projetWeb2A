<?php
require_once '../../config.php';
require_once '../../Model/ges_entreprise.php'; // Importation de la classe Reclamation
class ges_entrepriseG // Renommage de la classe UserC en ReclamationC
{
    public function addentreprise($ges_entreprise) {
        try {
            $db = config::getConnexion();           
            $sql = "INSERT INTO ges_entreprise ( photo, nom_ent, nom_rec, poste_rec, lieu_ent, type_ser, email)  VALUES (  :photo, :nom_ent, :nom_rec, :poste_rec, :lieu_ent, :type_ser, :email)";
            $query = $db->prepare($sql);
            $query->execute([
                'photo' => $ges_entreprise->getphoto(),
                'nom_ent' => $ges_entreprise->getnom_ent(),
                'nom_rec' => $ges_entreprise->getnom_rec(),
                'poste_rec' => $ges_entreprise->getposte_rec(),
                'lieu_ent' => $ges_entreprise->getlieu_ent(),
                'type_ser' => $ges_entreprise->gettype_ser(),
                'email' => $ges_entreprise->getemail()
            ]);      
            return true; // Succès de l'insertion
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false; // Échec de l'insertion
        }
    }

    function updateentreprise($ges_entreprise) {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE ges_entreprise SET 
                    photo = :photo,    
                    nom_rec = :nom_rec,
                    poste_rec = :poste_rec,
                    lieu_ent = :lieu_ent,
                    type_ser = :type_ser,
                    email = :email
                WHERE nom_ent = :nom_ent' // Ensure that 'titre_off' matches your column name
            );
            $query->execute([
                'photo' => $ges_entreprise->getphoto(),
                'nom_ent' => $ges_entreprise->getnom_ent(),
                'nom_rec' => $ges_entreprise->getnom_rec(),
                'poste_rec' => $ges_entreprise->getposte_rec(),
                'lieu_ent' => $ges_entreprise->getlieu_ent(),
                'type_ser' => $ges_entreprise->gettype_ser(),
                'email' => $ges_entreprise->getemail()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage(); // Print any errors
        }
    }
    

    function deleteentreprise($nom_ent) // Renommage de la fonction deleteuser en deleteReclamation
    {
        $sql = "DELETE FROM ges_entreprise WHERE nom_ent = :nom_ent";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':nom_ent', $nom_ent);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function chercher_nom_ent($nom_ent) // Renommage de la fonction chercher_id en chercher_id_reclamation
    {
        // Connexion à la base de données
        $db = config::getConnexion();
        
        $search_query = "SELECT * FROM ges_entreprise WHERE nom_ent = :nom_ent";
        $stmt = $db->prepare($search_query);
        $stmt->execute(array(':nom_ent' => $nom_ent));
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return NULL;
        }
    }
    
    public function listentreprise() // Renommage de la fonction listuser en listReclamation
    {
        $sql = "SELECT * FROM ges_entreprise"; // Modification pour utiliser la table "reclamation"
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function showentreprise($nom_ent)
    {
    $sql = "SELECT * FROM ges_entreprise WHERE nom_ent = :nom_ent"; // Use parameterized query
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':nom_ent', $nom_ent, PDO::PARAM_STR); // Bind parameter
        $query->execute();
        $employe = $query->fetch();
        return $employe;
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
    }
    public function getlastentreprise()
    {
        $sql = "SELECT * FROM ges_entreprise ORDER BY nom_ent DESC LIMIT 8"; // Get the last 5 added CVs, assuming 'id' is the primary key
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function getnbent() {
        $sql = "SELECT COUNT(*) as nbent FROM ges_entreprise";
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

}

?>
