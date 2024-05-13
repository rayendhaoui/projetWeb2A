<?php
require_once '../config2.php';
require_once '../Entities/user.php'; // Importation de la classe Reclamation

class userc // Renommage de la classe UserC en ReclamationC
{
    public function adduser($user) {
        try {
            $db = config2::getConnexion();            
            $sql = "INSERT INTO user (nom, prenom, email, region, ville, dernier_service, date_n,mot_d_passe) VALUES (:nom, :prenom, :email, :region, :ville, :dernier_service, :date_n , :mot_d_passe)";
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                'email' => $user->getEmail(),
                'region' => $user->getRegion(),
                'ville' => $user->getVille(),
                'dernier_service' => $user->getDernier_service(),
                'date_n' => $user->getDate_n(),
                'mot_d_passe' => $user->getMot_d_passe()
            ]);
                      
            return true; // Succès de l'insertion
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false; // Échec de l'insertion
        }
    }

    function updateuser($user) // Renommage de la fonction updateuser en updateuser
{
    try {
        $db = config2::getConnexion();
        $query = $db->prepare(
            'UPDATE user SET 
                prenom = :prenom,
                email = :email,
                region = :region,
                ville = :ville,
                dernier_service = :dernier_service,
                date_n = :date_n,
                mot_d_passe = :mot_d_passe
                
            WHERE nom = :nom'
        );
        $query->execute([
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'email' => $user->getEmail(),
            'region' => $user->getRegion(),
            'ville' => $user->getVille(),
            'dernier_service' => $user->getDernier_service(),
            'date_n' => $user->getDate_n(),
            'mot_d_passe' => $user->getMot_d_passe()
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo $e->getMessage(); // Print any errors
    }
}

    function deleteReclamation($nom) // Renommage de la fonction deleteuser en deleteReclamation
    {
        $sql = "DELETE FROM user WHERE nom = :nom";
        $db = config2::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':nom', $nom);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function chercher_nom_user($nom) // Renommage de la fonction chercher_id en chercher_id_reclamation
    {
        // Connexion à la base de données
        $db = config2::getConnexion();
        
        $search_query = "SELECT * FROM user WHERE nom = :nom";
        $stmt = $db->prepare($search_query);
        $stmt->execute(array(':nom' => $nom));
        
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return NULL;
        }
    }
    
    public function listuser() // Renommage de la fonction listuser en listReclamation
    {
        $sql = "SELECT * FROM user"; // Modification pour utiliser la table "reclamation"
        $db = config2::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function showuser($nom)
    {
        $sql = "SELECT * from user where nom = :nom";
        $db = config2::getConnexion();
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
    function connexionUser($email,$mot_d_passe){

        $sql="SELECT * FROM user WHERE email='" . $email . "' and mot_d_passe = '". $mot_d_passe ."'";
        $db = config2::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();
            $count=$query->rowCount();
            if($count==0) {
                $message = "pseudo ou le mot de passe est incorrect";
            } else {
                $x=$query->fetch();
                $message = $x['role'];
            }
        }
        catch (Exception $e){
                $message= " ".$e->getMessage();
        }
      return $message;
    }
}

?>
