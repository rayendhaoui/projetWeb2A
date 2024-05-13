<?php
require_once '../config.php';
require_once '../Entities/reclamation.php'; // Importation de la classe Reclamation

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
        $sql = "SELECT * FROM reclamation" ; // Modification pour utiliser la table "reclamation"
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listReclamation_orderby() // Renommage de la fonction listuser en listReclamation
    {
        $sql = "SELECT * FROM reclamation order by id"  ; // Modification pour utiliser la table "reclamation"
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

    function chercher_email($email) {
        // Connexion à la base de données
        $db = config::getConnexion();
        
        $search_query = "SELECT email FROM reclamation WHERE email = :email"; // Sélectionner l'e-mail en fonction de l'adresse e-mail
        $stmt = $db->prepare($search_query);
        $stmt->execute(array(':email' => $email));
        
        // Vérifier si une ligne est trouvée
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['email']; // Retourner l'e-mail trouvé
        } else {
            return NULL; // Aucun e-mail trouvé, retourner NULL
        }
    }

    public function countReclamationsWithResponses()
{
    try {
        // Connexion à la base de données
        $db = config::getConnexion();
        
        // Requête SQL pour compter le nombre total de réclamations avec des réponses
        $sql = "SELECT COUNT(DISTINCT reclaimID) AS count_reclamations_with_responses FROM reponse";
        
        // Exécution de la requête
        $stmt = $db->query($sql);
        
        // Récupération du résultat
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Retourner le nombre total de réclamations avec des réponses
        return $result['count_reclamations_with_responses'];
    } catch (PDOException $e) {
        // Gérer les erreurs de requête SQL
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}

    public function countTotalReclamations()
    {
        try {
            // Connexion à la base de données
            $db = config::getConnexion();
            
            // Requête SQL pour compter le nombre total de réclamations
            $sql = "SELECT COUNT(*) AS total_reclamations FROM reclamation";

            // Exécution de la requête
            $stmt = $db->query($sql);

            // Récupération du résultat
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Retourner le nombre total de réclamations
            return $result['total_reclamations'];
        } catch (PDOException $e) {
            // Gérer les erreurs de requête SQL
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    public function chercherUserParNom($nom) {
        try {
            $db = config::getConnexion();
            $query = $db->prepare("
                SELECT u.*, r.*
                FROM utilisateur u
                JOIN reclamation r ON u.nom = r.nom
                WHERE u.nom = :nom
            ");
            $query->execute(array(':nom' => $nom));
            
            if ($query->rowCount() > 0) {
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                return $results;
            } else {
                return NULL; // Ajustez cela selon votre logique, vous pouvez également renvoyer un message indiquant que l'utilisateur n'a pas été trouvé.
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return NULL;
        }
    }

    public function chercherReclamationParNomUtilisateur($nom) {
    try {
        $db = config::getConnexion();
        $query = $db->prepare("
            SELECT r.*
            FROM reclamation r
            JOIN utilisateur u ON r.nom = u.nom
            WHERE u.nom = :nom
        ");
        $query->execute(array(':nom' => $nom));
        
        if ($query->rowCount() > 0) {
            $reclamation = $query->fetch(PDO::FETCH_ASSOC);
            return $reclamation;
        } else {
            return NULL; // Ajustez cela selon votre logique, vous pouvez également renvoyer un message indiquant que la réclamation n'a pas été trouvée.
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return NULL;
    }
}
public function listReclamationByUser($nom) {
    try {
        $db = config::getConnexion();
        $query = $db->prepare("
            SELECT *
            FROM reclamation
            WHERE nom = :nom
        ");
        $query->execute(array(':nom' => $nom));
        
        if ($query->rowCount() > 0) {
            $reclamations = $query->fetchAll(PDO::FETCH_ASSOC);
            return $reclamations;
        } else {
            return array(); // Retourner un tableau vide si aucune réclamation n'est trouvée pour cet utilisateur
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return array(); // Retourner un tableau vide en cas d'erreur
    }
}

    
}

?>
