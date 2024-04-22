<?php
require_once '../config.php';
require_once '../model/reponse.php'; // Importation de la classe ReponseReclamation

class reponseC
{
    public function ajouterReponse($reponse) {
        try {
            $db = config::getConnexion();
                        
            $sql = "INSERT INTO reponse(id_rep, reclaimID, message, date) VALUES (:id_rep, :reclaimID, :message, :date)";
            $query = $db->prepare($sql);
            $query->execute([
                'id_rep' => $reponse->getId_rep(),
                'reclaimID' => $reponse->getReclaimid_rep(),
                'message' => $reponse->getMessage(),
                'date' => $reponse->getDate()
            ]);
                        
            return true; // Succès de l'insertion
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false; // Échec de l'insertion
        }
    }

    public function supprimerReponse($reponseid_rep) {
        $sql = "DELETE FROM reponse WHERE id_rep = :id_rep";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_rep', $reponseid_rep);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function editerReponse($reponse) {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reponse SET 
                    message = :message,
                    date = :date
                WHERE id_rep = :id_rep'
            );
            $query->execute([
                'id_rep' => $reponse->getid_rep(),
                'message' => $reponse->getMessage(),
                'date' => $reponse->getDate()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage(); // Print any errors
        }
    }

    public function voirReponses($reclaimid_rep) {
        $sql = "SELECT * FROM reponse WHERE reclaimid_rep = :reclaimid_rep";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->execute(['reclaimid_rep' => $reclaimid_rep]);
        return $query->fetchAll();
    }
    public function listReponse() // Renommage de la fonction listuser en listReclamation
    {
        $sql = "SELECT * FROM reponse"; // Modification pour utiliser la table "reclamation"
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function chercherReponse($id_rep) {
        try {
            $db = config::getConnexion();
            
            // Requête SQL pour rechercher une réponse par son id_repentifiant
            $sql = "SELECT * FROM reponse WHERE id_rep = :id_rep";
            $query = $db->prepare($sql);
            $query->execute([':id_rep' => $id_rep]);
            
            // Vérifier si une réponse correspondant à l'id_repentifiant a été trouvée
            if ($query->rowCount() > 0) {
                $row = $query->fetch(PDO::FETCH_ASSOC);
                return $row; // Retourner les données de la réponse trouvée
            } else {
                return NULL; // Retourner NULL si aucune réponse n'a été trouvée
            }
        } catch (PDOException $e) {
            // Gérer les erreurs éventuelles
            echo 'Error: ' . $e->getMessage();
            return NULL;
        }
    }
    public function chercherReponseParReclamationid($reclamation_id) {
        try {
            $db = config::getConnexion();
            $query = $db->prepare("
                SELECT r.*, rc.*
                FROM reponse r
                JOIN reclamation rc ON r.reclaimID = rc.id
                WHERE rc.id= :reclamation_id
            ");
            $query->execute(array(':reclamation_id' => $reclamation_id));
            
            if ($query->rowCount() > 0) {
                $reponses = $query->fetchAll(PDO::FETCH_ASSOC);
                return $reponses;
            } else {
                return NULL;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return NULL;
        }
    }
    function chercher_id_rep($id_rep) // Renommage de la fonction chercher_id en chercher_id_reclamation
    {
        // Connexion à la base de données
        $db = config::getConnexion();
        
        $search_query = "SELECT * FROM reponse WHERE id_rep = :id_rep";
        $stmt = $db->prepare($search_query);
        $stmt->execute(array(':id_rep' => $id_rep));
        
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return NULL;
        }
    }
    
}


?>
