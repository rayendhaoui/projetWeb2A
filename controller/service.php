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
        VALUES (:nom, :prix,:typee,:mode)";
        $db = config::getConnexion();
        
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $service->getnom(),
                'prix' => $service->getprix(),
                'typee' => $service->gettypee(),
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
                    mode = :mode 
                WHERE nom = :nom'
            );
            
            // Correct reference to nom from service
            $query->execute([
                'nom' => $service->getNom(), // Corrected here
                'prix' => $service->getPrix(),
                'typee' => $service->getTypee(),
                'mode' => $service->getMode(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage(); // Error handling with context
        }
    }
}

?>
    

