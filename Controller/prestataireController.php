<?php
require_once 'C:\xampp\htdocs\gs_service\config.php';
include_once '../../model/prestataireModel.php';

class prest
{

    public function display()
    {
        $sql = "SELECT * FROM prestataire";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function delete($id)
    {
        $sql = "DELETE FROM prestataire WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function create($prestataire)
    {
        $sql = "INSERT INTO prestataire 
                VALUES (:id ,:nom, :metier, :age, :salaire, :niveau)";
        $db = config::getConnexion();
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $prestataire->getid(),
                'nom' => $prestataire->getnom(),
                'metier' => $prestataire->getmetier(),
                'age' => $prestataire->getage(),
                'salaire' => $prestataire->getsalaire(),
                'niveau' => $prestataire->getniveau(),
            ]);
        
    }
    
    function edit($prestataire){   
        try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE prestataire 
            SET nom = :nom, metier = :metier, age = :age , salaire = :salaire, niveau = :niveau
            WHERE id= :id ');
            
            
            $query->execute([
                'id' => $prestataire->getid(),
                'nom' => $prestataire->getnom(),
                'metier' => $prestataire->getmetier(),
                'age' => $prestataire->getage(),
                'salaire' => $prestataire->getsalaire(),
                'niveau' => $prestataire->getniveau(),


                
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();        }
        }
    }

