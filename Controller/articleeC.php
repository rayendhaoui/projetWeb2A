<?PHP
include "../config.php";
class livraisonC {
function afficherlivraison ($livraison){
		echo "idliv: ".$livraison->getidliv()."<br>";
		echo "idcmd: ".$livraison->getidcmd()."<br>";
        echo "etat: ".$livraison->getetat()."<br>";
		echo "adresse: ".$livraison->getadresse()."<br>";
		echo "date: ".$livraison->getdate()."<br>";
		
	}
	
	function ajouterlivraison($livraison){
		$sql = "insert INTO livraison (idcmd,etat,adresse,date) VALUES (:idcmd,:etat,:adresse,:date)";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
	
		$req->bindValue(':idcmd',$livraison->getidcmd());
		$req->bindValue(':etat',$livraison->getetat());
        $req->bindValue(':adresse',$livraison->getadresse());
		$req->bindValue(':date',$livraison->getdate());
		$sql .= " INNER JOIN livreur ON livraison.id_livreur = livreur.id_livreur";
		try{
		$req->execute();
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
		
	}
	
	function afficherlivraisons(){

			try {
                $pdo =config::getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM livraison'
                );
                $query->execute();
                return $query->fetchAll();
            } 
			catch (PDOException $e) {
                $e->getMessage();
            }
	}
	function supprimerlivraison($idliv){
		$sql="DELETE FROM livraison WHERE idliv= :idliv";
		$db =config::getConnexion();
		$req=$db->prepare($sql);
		$req->bindValue(':idliv',$idliv);
		try{
			$req->execute();
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
	}
	function modifierlivraison($livraison,$idliv){
		$sql="UPDATE livraison SET  idcmd=:idcmd,etat=:etat,adresse=:adresse,date=:date WHERE idliv=:idlivn";
		
		$db =config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $idcmd=$livraison->getidcmd();
        $etat=$livraison->getetat();
        $adresse=$livraison->getadresse();
        $date=$livraison->getdate();
		
		$req->bindValue(':idlivn',$idliv);
		$req->bindValue(':idcmd',$idcmd);
		$req->bindValue(':etat',$etat);
        $req->bindValue(':adresse',$adresse);
		$req->bindValue(':date',$date);
		
		
            $s=$req->execute();
			
          
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
 
 
        }
		
	}
	function recupererlivraison($idliv){
		$sql="SELECT * from livraison where idliv=$idliv";
		$db =config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListelivraison($idcmd){
		$sql="SELECT * from livraison where idcmd=$idcmd";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>