<?php

require_once '../config.php';
require_once '../Entities/cv1.php'; // Importation de la classe Reclamation

class cvC1 // Recinmage de la classe UserC en ReclamationC
{
    public function addcv($cv1) {
        try {
            $db = config::getConnexion();

            $sql = "INSERT INTO etude (cin, niv, dat, etab, img) VALUES (:cin, :niv, :dat, :etab, :img)";
            $query = $db->prepare($sql);
            $query->execute([
                'cin' => $cv1->getcin(),
                'niv' => $cv1->getniv(),
                'dat' => $cv1->getdat(),
                'etab' => $cv1->getetab(),
                'img' => $cv1->getImg() // Use the image path in the database
            ]);
                      
            return true; // Success
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false; // Failure
        }
    }

    function updateReclamation($cv1) {
        try {
            $db = config::getConnexion();

            $query = $db->prepare(
                'UPDATE etude SET 
                    niv = :niv,
                    dat = :dat,
                    etab = :etab,
                    img = :img
                     WHERE cin = :cin'
            );
            $query->execute([
                'cin' => $cv1->getcin(),
                'niv' => $cv1->getniv(),
                'dat' => $cv1->getdat(),
                'etab' => $cv1->getetab(),
                'img' => $cv1->getImg() // Use the updated image path
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage(); // Print any errors
        }
    }

    function deleteReclamation($cin) // Recinmage de la fonction deleteuser en deleteReclamation
    {
        $sql = "DELETE FROM etude WHERE cin = :cin";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':cin', $cin);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function chercher_num_cv($cin) // Recinmage de la fonction chercher_id en chercher_id_reclamation
    {
        // Connexion à la base de données
        $db = config::getConnexion();
        
        $search_query = "SELECT * FROM etude WHERE cin = :cin";
        $stmt = $db->prepare($search_query);
        $stmt->execute(array(':cin' => $cin));
        
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return NULL;
        }
    }
    
    public function listCv($page, $limit)
    {
        $start = ($page - 1) * $limit;
        $sql = "SELECT * FROM etude LIMIT $start, $limit"; // Modify to use LIMIT clause
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function showReclamation($cin)
    {
        $sql = "SELECT * from etude where cin = $cin";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $employe = $query->fetch();
            return $employe;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    } public function getLast()
    {
        $sql = "SELECT * FROM etude ORDER BY ide DESC LIMIT 5"; // Get the last 5 added CVs, assuming 'id' is the primary key
        $db = config::getConnexion();
        try { 
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}

?>
