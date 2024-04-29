<?php
require_once '../config1.php';
require_once '../Model/societe.php'; // Importation de la classe Reclamation

class societec // Renommage de la classe UserC en ReclamationC
{
    public function addsociete($societe) {
        try {
            $db = config1::getConnexion();            
            $sql = "INSERT INTO societe (nom, region, ville, num_tel, email, mot_d_passe) VALUES (:nom, :region, :ville,  :num_tel, :email , :mot_d_passe)";
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $societe->getNom(),
                'region' => $societe->getRegion(),
                'ville' => $societe->getVille(),
                'num_tel' => $societe->getNum_tel(),
                'email' => $societe->getEmail(),
                'mot_d_passe' => $societe->getMot_d_passe()
            ]);
                      
            return true; // Succès de l'insertion
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false; // Échec de l'insertion
        }
    }

    function updatesociete($societe) // Renommage de la fonction updateuser en updateuser
{
    try {
        $db = config1::getConnexion();
        $query = $db->prepare(
            'UPDATE societe SET 
                region = :region,
                ville = :ville,
                num_tel = :num_tel,
                email = :email,
                mot_d_passe = :mot_d_passe
                
            WHERE nom = :nom'
        );
        $query->execute([
            'nom' => $societe->getNom(),
            'region' => $societe->getRegion(),
            'ville' => $societe->getVille(),
            'num_tel' => $societe->getNum_tel(),
            'email' => $societe->getEmail(),
            'mot_d_passe' => $societe->getMot_d_passe()
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo $e->getMessage(); // Print any errors
    }
}

    function deleteReclamation1($nom) // Renommage de la fonction deleteuser en deleteReclamation
    {
        $sql = "DELETE FROM societe WHERE nom = :nom";
        $db = config1::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':nom', $nom);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function chercher_nom_societe($nom) // Renommage de la fonction chercher_id en chercher_id_reclamation
    {
        // Connexion à la base de données
        $db = config1::getConnexion();
        
        $search_query = "SELECT * FROM societe WHERE nom = :nom";
        $stmt = $db->prepare($search_query);
        $stmt->execute(array(':nom' => $nom));
        
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return NULL;
        }
    }
    
    public function listuser1() // Renommage de la fonction listuser en listReclamation
    {
        $sql = "SELECT * FROM societe"; // Modification pour utiliser la table "reclamation"
        $db = config1::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function showuser1($nom)
    {
        $sql = "SELECT * from societe where nom = :nom";
        $db = config1::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam('nom', $nom, PDO::PARAM_STR);
            $query->execute();

            $employe = $query->fetch();
            return $employe;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}

?>
