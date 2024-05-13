<?php
require_once '../config.php';
require_once '../Entities/cv.php'; // Importation de la classe Reclamation

class cvC // Renommage de la classe UserC en ReclamationC
{
    public function addcv($cv) {
        try {
            $db = config::getConnexion();            
            $sql = "INSERT INTO client (nom, prenom, email, num, dte, adresse, nationalite, objectifs, diplomes, postes, comp, interets) VALUES (:nom, :prenom, :email, :num, :dte, :adresse, :nationalite, :objectifs, :diplomes, :postes, :comp, :interets)";
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $cv->getNom(),
                'prenom' => $cv->getPrenom(),
                'email' => $cv->getEmail(),
                'num' => $cv->getnum(),
                'dte' => $cv->getdte(),
                'adresse' => $cv->getAdresse(),
                'nationalite' => $cv->getNationalite(),
                'objectifs' => $cv->getObjectifs(),
                'diplomes' => $cv->getDiplomes(),
                'postes' => $cv->getPostes(),
                'comp' => $cv->getComp(),
                'interets' => $cv->getInterets()
            ]);
                      
            return true; // Succès de l'insertion
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false; // Échec de l'insertion
        }
    }
    public function getCvById($id) {
        try {
            $db = config::getConnexion();
            $stmt = $db->prepare("SELECT * FROM client WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false; // Return false or handle the error as needed
        }
    }
    
    

    public function updateReclamation($cv,$id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE client SET 
                    nom = :nom,
                    prenom = :prenom,
                    email = :email,
                    num = :num,
                    dte = :dte,
                    adresse = :adresse,
                    nationalite = :nationalite,
                    objectifs = :objectifs,
                    diplomes = :diplomes,
                    postes = :postes,
                    comp = :comp,
                    interets = :interets
                    WHERE id = :id'
            );
            $query->execute([
                'id' => $id, // Add getId() method to get the ID of the current record
                'nom' => $cv->getNom(),
                'prenom' => $cv->getPrenom(),
                'email' => $cv->getEmail(),
                'num' => $cv->getNum(),
                'dte' => $cv->getDte(),
                'adresse' => $cv->getAdresse(),
                'nationalite' => $cv->getNationalite(),
                'objectifs' => $cv->getObjectifs(),
                'diplomes' => $cv->getDiplomes(),
                'postes' => $cv->getPostes(),
                'comp' => $cv->getComp(),
                'interets' => $cv->getInterets(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage(); // Print any errors
        }
    }
    
    
    

    function deleteReclamation($id) // Renommage de la fonction deleteuser en deleteReclamation
    {
        $sql = "DELETE FROM client WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function chercher_num_cv($id) {
        $db = config::getConnexion();
        
        $search_query = "SELECT * FROM client WHERE id = :id";
        $stmt = $db->prepare($search_query);
        $stmt->execute(array(':id' => $id));
        
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return NULL;
        }
    }
    public function searchByNom($searchQuery) {
        $sql = "SELECT * FROM client WHERE nom LIKE :searchQuery"; // Assuming 'nom' is the name field in your database
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['searchQuery' => '%' . $searchQuery . '%']);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    
    
    public function listCv($page, $limit)
{
    $start = ($page - 1) * $limit;
    $sql = "SELECT * FROM client LIMIT $start, $limit"; // Modify to use LIMIT clause
    $db = config::getConnexion();
    try {
        $stmt = $db->query($sql);
        $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $liste;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

    
    public function listCv1()
{
    $sql = "SELECT * FROM client ORDER BY id DESC LIMIT 1"; // Retrieve the newest row based on the id column
    $db = config::getConnexion();
    try {
        $result = $db->query($sql);
        return $result->fetch(); // Fetch the newest row
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}
public function getLastCvs()
{
    $sql = "SELECT * FROM client ORDER BY id DESC LIMIT 5"; // Get the last 5 added CVs, assuming 'id' is the primary key
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

// In cvC controller


    
    function showReclamation($id)
    {
        $sql = "SELECT * from client where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $employe = $query->fetch();
            return $employe;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}

?>
