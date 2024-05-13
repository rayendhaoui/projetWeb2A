<?php
require_once '../../config.php';
require_once '../../Model/SERVICE.PHP';


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
        $db = config::getConnexion();
        $sql = "INSERT INTO service(nom,prix,typee,id,mode)  VALUES (:nom, :prix, :id, :typee ,:mode)";
        $query = $db->prepare($sql);
        $query->execute([
            'nom' => $service->getnom(),
            'prix' => $service->getprix(),
            'typee' => $service->gettypee(),
            'id' => $service->getid(),
            'mode' => $service->getmode()
        ]);
        
    }

    function countt() {
        $sql = "SELECT COUNT(*) as count FROM service"; // Fixed the syntax error
        $db = config::getConnexion(); // Assuming you have a function to get DB connection
        try {
            $result = $db->query($sql); // Query execution
            if ($result) {
                $row = $result->fetch(); // Fetch the result as an associative array
                return $row['count']; // Return the count from the 'count' column
            } else {
                throw new Exception("Query failed");
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage()); // Handle any exceptions
        }
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
    

