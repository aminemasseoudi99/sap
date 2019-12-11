<?PHP
include "employeC.php";
class LivraisonC {
function afficherLivraison ($livraison){
		echo "id: ".$livraison->getId()."<br>";
		echo "client: ".$livraison->getClient()."<br>";
		echo "destination: ".$livraison->getDestination()."<br>";
		echo "livreur: ".$livraison->getLivreur()."<br>";
		echo "localisation: ".$livraison->getLocalisation()."<br>";
	}

	function ajouterLivraison($livraison){
		$sql="INSERT INTO livraison (id,destination,client,livreur,localisation) VALUES (:id, :destination, :client, :livreur, :localisation)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $id=$livraison->getId();
        $client=$livraison->getClient();
        $destination=$livraison->getDestination();
        $livreur=$livraison->getLivreur();
        $localisation=$livraison->getLocalisation();
		$req->bindValue(':id',$id);
		$req->bindValue(':client',$client);
		$req->bindValue(':destination',$destination);
		$req->bindValue(':livreur',$livreur);
		$req->bindValue(':localisation',$localisation);

            $req->execute();
            echo "^prod ajoute";

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
            echo "erreur";
        }

	}

	function afficherLivraisons(){
		$sql="SElECT * From livraison";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function supprimerLivraison($id){
		$sql="DELETE FROM livraison where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierLivraison($livraison,$id){
		$sql="UPDATE livraison SET id=:idd, client=:client,destination=:destination,livreur=:livreur,localisation=:localisation WHERE id=:id";

		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{
        $req=$db->prepare($sql);
		$idd=$livraison->getId();
        $client=$livraison->getClient();
        $destination=$livraison->getDestination();
        $livreur=$livraison->getLivreur();
        $localisation=$livraison->getLocalisation();
		$datas = array(':idd'=>$idd, ':id'=>$id, ':client'=>$client,':destination'=>$destination,':livreur'=>$livreur,':localisation'=>$localisation);
		$req->bindValue(':idd',$idd);
		$req->bindValue(':id',$id);
		$req->bindValue(':client',$client);
		$req->bindValue(':destination',$destination);
		$req->bindValue(':livreur',$livreur);
		$req->bindValue(':localisation',$localisation);

            $s=$req->execute();

           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }

	}
	function chercherLivraison($id){
		$sql="SELECT * from livraison where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function ajouterLivraisonFromFront($idcommande,$destination,$livreur){
		$sql="INSERT INTO livraison (destination,client,livreur) VALUES (:destination, :client, :livreur)";
		$db = config::getConnexion();
		try{
				$req=$db->prepare($sql);

		$req->bindValue(':client',$idcommande);
		$req->bindValue(':destination',$destination);
		$req->bindValue(':livreur',$livreur);


						$req->execute();
						echo "^prod ajoute";

				}
				catch (Exception $e){
						echo 'Erreur: '.$e->getMessage();
						echo "erreur";
				}

	}

}

?>
