<?php
require_once '../config.php';
require_once '../Model/cv.php'; // Importation de la classe Reclamation

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

    function updateReclamation($cv) // Renommage de la fonction updateuser en updateReclamation
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE cv SET 
                nom = :nom,
                prenom = :prenom,
                email = :email,
    dte = :dte,
    adresse = :adresse,
    nationalite = :nationalite,
    objectifs = :objectifs,
    diplomes = :diplomes,
    postes = :postes,
    comp = :comp,
    interets = :interets
                
            WHERE num = :num'
        );
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
                'comp' => $cv->getcomp(),
                'interets' => $cv->getInterets()
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo $e->getMessage(); // Print any errors
    }
}

    function deleteReclamation($num) // Renommage de la fonction deleteuser en deleteReclamation
    {
        $sql = "DELETE FROM client WHERE num = :num";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':num', $num);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function chercher_num_cv($num) // Renommage de la fonction chercher_id en chercher_id_reclamation
    {
        // Connexion à la base de données
        $db = config::getConnexion();
        
        $search_query = "SELECT * FROM client WHERE num = :num";
        $stmt = $db->prepare($search_query);
        $stmt->execute(array(':num' => $num));
        
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return NULL;
        }
    }
    
    public function listCv() // Renommage de la fonction listuser en listReclamation
    {
        $sql = "SELECT * FROM client"; // Modification pour utiliser la table "reclamation"
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function showReclamation($id)
    {
        $sql = "SELECT * from client where num = $num";
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
