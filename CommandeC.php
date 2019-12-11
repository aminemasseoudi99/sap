<?PHP
include_once "../config.php";
class CommandeC {
function afficherC ($com){
		echo "Id Commande: ".$com->getIdCom()."<br>";
		echo "Id Panier: ".$com->getIdPanier()."<br>";
		echo "Methode: ".$com->getMethode()."<br>";
		echo "Etat: ".$com->getEtat()."<br>";
	}
	function GetInfo($id)
	{
		$sql="SElECT login,role From users where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function ajouterCC($cc){
		$sql="insert into Commande (id_panier,etat,methode,id_client,date_com) values ( :id_panier,:etat,:methode,:id_client,:date_com)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        
        $id_panier=$cc->getIdPanier();
        $etat=$cc->getEtat();
        $methode=$cc->getMethode();
        $id_client=$cc->getIdClient();
        $date_com=$cc->getDateCom();
      
		
		$req->bindValue(':methode',$methode);
		$req->bindValue(':id_client',$id_client);
		$req->bindValue(':date_com',$date_com);
		$req->bindValue(':id_panier',$id_panier);
		$req->bindValue(':etat',$etat);
	

		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherListCC($id){
		$sql="SElECT * From Commande where id_client=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function afficherEtatcc($id)
	{
		$sql="SELECT COUNT(*) as 'total' FROM Commande WHERE (id_client=$id and etat = 0)";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
		function afficherEtatcc1()
	{
		$sql="SELECT COUNT(*) as 'total' FROM Commande WHERE  etat = 0";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
			function afficherEtattt1()
	{
		$sql="SELECT COUNT(*) as 'total' FROM Commande WHERE etat = 1";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}



	function afficherEtataa1()
	{
		$sql="SELECT COUNT(*) as 'total' FROM Commande WHERE etat = 2";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}


	
		function afficherEtattt($id)
	{
		$sql="SELECT COUNT(*) as 'total' FROM Commande WHERE (id_client=$id and etat = 1)";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
			function afficherEtataa($id)
	{
		$sql="SELECT COUNT(*) as 'total' FROM Commande WHERE (id_client=$id and etat = 2)";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
		function afficherNontraite($id){
		$sql="SElECT * From Commande WHERE (id_client=$id and etat = 0)";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
			function afficherConfirmer($id){
		$sql="SElECT * From Commande WHERE (id_client=$id and etat = 1)";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
			function afficherAnnule($id){
		$sql="SElECT * From Commande WHERE (id_client=$id and etat = 2)";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function afficherListCCTrie(){
		$sql="SElECT * From Commande order by date_com DESC";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerCC($id_com){
		$sql="DELETE FROM Commande where id_com= :id_com";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_com',$id_com);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierCC($id){
		$sql="UPDATE Commande SET etat=:etat WHERE id_com=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$etat=1;
       
		$datas = array( ':etat'=>$etat);
		
		$req->bindValue(':id',$id);
		
		$req->bindValue(':etat',$etat);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }

        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function annulerCC($id){
		$sql="UPDATE Commande SET etat=:etat WHERE id_com=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$etat=2;
       
		$datas = array( ':etat'=>$etat);
		
		$req->bindValue(':id',$id);
		
		$req->bindValue(':etat',$etat);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function setEtat($etat){
		$this->etat=$etat;
	}
	function recupererCC($id_com){
		$sql="SELECT * from Commande where id_com=$id_com";
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