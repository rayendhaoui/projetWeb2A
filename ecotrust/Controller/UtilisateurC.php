<?PHP
	include "../config.php";
	require_once '../Entities/Utilisateur.php';

	class UtilisateurC {

		function ajouterUtilisateur($utilisateur){
            $sql="INSERT INTO utilisateur (id, nom, prenom, role, login, password,image) VALUES (:id, :nom, :prenom, :role, :login, :password, :image)";
				$connexion=config::getConnexion();
				$rep=$connexion->prepare($sql);
				$rep->bindValue(":id",$utilisateur->getid());
				$rep->bindValue(":nom",$utilisateur->getnom());
				$rep->bindValue(":prenom",$utilisateur->getprenom());
				$rep->bindValue(":role",$utilisateur->getrole());
                $rep->bindValue(":login",$utilisateur->getlogin());
				$rep->bindValue(":password",$utilisateur->getpassword());
                $rep->bindValue(":image",$utilisateur->getimage());

				
				$rep->execute();

        }


        function afficherUtilisateurs(){
			
			try {
                $pdo = config::getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM utilisateur'
                );
                $query->execute();
                return $query->fetchAll();
            } 
			catch (PDOException $e) {
                $e->getMessage();
            }
		}
		function afficherimage($login){
			
			$sql="SELECT * From utilisateur  WHERE login = '$login' ";
            $db = config::getConnexion();
            try{
            $liste=$db->query($sql);
            return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }	
		}
		function afficherrole($login){
			
			$sql="SELECT * From utilisateur  WHERE role = '$login' ";
            $db = config::getConnexion();
            try{
            $liste=$db->query($sql);
            return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }	
		}

		function supprimerUtilisateur($id){
			$sql="DELETE FROM utilisateur WHERE id= :id";
			$db =config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function recupererUtilisateur($id){
			$sql="SELECT * from utilisateur where id=$id";
			$db =config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function recupererUtilisateur1($id){
			$sql="SELECT * from utilisateur where id=$id";
			$db =config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$user = $query->fetch(PDO::FETCH_OBJ);
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function connexionUser($login,$password){
            $sql="SELECT * FROM Utilisateur WHERE Login='" . $login . "' and Password = '". $password."'";
            $db =config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                $count=$query->rowCount();
                if($count==0) {
                    $message = "pseudo ou le mot de passe est incorrect";
                } else {
                    $x=$query->fetch();
                  
                }
            }
            catch (Exception $e){
                    $message= " ".$e->getMessage();
					
            }
			return  $message;
        }

	}



?>