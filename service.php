<?php
require_once 'config.php';
require_once '../../model/SERVICE.PHP';


class serviceS
{

    public function display()
    {
        $sql = "SELECT * FROM service";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function affich($nom)
    {
        $sql = "SELECT * FROM service WHERE nom = :nom";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindValue(':nom', $nom);

        try {
            $liste = $query->fetch();
            var_dump($liste);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function delete($nom)
    {
        $sql = "DELETE FROM service WHERE nom = :nom";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':nom', $nom);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function create($service)
    {
        
        $sql = "INSERT INTO service  
        VALUES (:nom, :prix, :id, :typee ,:mode)";
        $db = config::getConnexion();
        
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $service->getnom(),
                'prix' => $service->getprix(),
                'typee' => $service->gettypee(),
                'id' => $service->getid(),
                'mode' => $service->getmode(),
            ]);
        
    }


    function edit($service) {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE service 
                SET prix = :prix, 
                    typee = :typee, 
                    id = :id,
                    mode = :mode 
                WHERE nom = :nom'
            );
            
            // Correct reference to nom from service
            $query->execute([
                'nom' => $service->getNom(), // Corrected here
                'prix' => $service->getPrix(),
                'typee' => $service->getTypee(),
                'id' => $service->getId(),
                'mode' => $service->getMode(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage(); // Error handling with context
        }
    }
}

 function chercheridparPrest($id) {
    try {
        $db = config::getConnexion();

        // Prepare the SQL statement with proper JOIN and condition
        $query = $db->prepare("
            SELECT  p.niveau
            FROM prestataire p
            JOIN service s  ON s.id = p.id
            WHERE p.id = :id
        ");

        // Execute the query with parameterized input to prevent SQL injection
        $query->execute(array(':id' => $id));
        
        // Fetch results as associative array if records are found
        if ($query->rowCount() > 0) {
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            return $results; // Return the fetched data
        } else {
            return []; // Return an empty array if no results found
        }
    } catch (PDOException $e) {
        // Log the error and return an appropriate response
        error_log('Error in chercheridparPrest: ' . $e->getMessage()); // Log the error
        return []; // Return an empty array if there's an error
    }
}


?>
    

