<?php
require_once '../config.php';
require_once '../model/reclamation.php'; // Importation de la classe Reclamation

class ReclamationC // Renommage de la classe UserC en ReclamationC
{
    public function addReclamation($reclamation) {
        try {
            $db = config::getConnexion();
                        
            $sql = "INSERT INTO reclamation (id, nom, prenom, email, sujet, description, idUtilisateur) VALUES (:id, :nom, :prenom, :email, :sujet, :description, :idUtilisateur)";
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $reclamation->getId(),
                'nom' => $reclamation->getNom(),
                'prenom' => $reclamation->getPrenom(),
                'email' => $reclamation->getEmail(),
                'sujet' => $reclamation->getSujet(),
                'description' => $reclamation->getDescription(),
                'idUtilisateur' => $reclamation->getIdUtilisateur()
            ]);
                        
            return true; // Succès de l'insertion
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false; // Échec de l'insertion
        }
    }

    function updateReclamation($reclamation) // Renommage de la fonction updateuser en updateReclamation
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE reclamation SET 
                nom = :nom,
                prenom = :prenom,
                email = :email,
                sujet = :sujet, 
                description = :description, 
                idUtilisateur = :idUtilisateur
            WHERE id = :id'
        );
        $query->execute([
            'id' => $reclamation->getId(),
            'nom' => $reclamation->getNom(),
            'prenom' => $reclamation->getPrenom(),
            'email' => $reclamation->getEmail(),
            'sujet' => $reclamation->getSujet(),
            'description' => $reclamation->getDescription(),
            'idUtilisateur' => $reclamation->getIdUtilisateur()
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo $e->getMessage(); // Print any errors
    }
}

    function deleteReclamation($id) // Renommage de la fonction deleteuser en deleteReclamation
    {
        $sql = "DELETE FROM reclamation WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function chercher_id_reclamation($id) // Renommage de la fonction chercher_id en chercher_id_reclamation
    {
        // Connexion à la base de données
        $db = config::getConnexion();
        
        $search_query = "SELECT * FROM reclamation WHERE id = :id";
        $stmt = $db->prepare($search_query);
        $stmt->execute(array(':id' => $id));
        
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return NULL;
        }
    }
    
    public function listReclamation() // Renommage de la fonction listuser en listReclamation
    {
        $sql = "SELECT * FROM reclamation"; // Modification pour utiliser la table "reclamation"
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
        $sql = "SELECT * from reclamation where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $reclamation = $query->fetch();
            return $reclamation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}

?>
