<?PHP
include "../config.php";
class eventtC {

	
function afficherevents ($eventt){
	echo "Nom: " . $eventt->getNom() . "<br>";
	echo "Num: " . $eventt->getNum() . "<br>";
	echo "Dated: " . $eventt->getDated() . "<br>";
	echo "Dated: " . $eventt->getDatef() . "<br>";
	}
function afficherevent(){
		//$sql="SElECT * From promotion e inner join formationphp.promotion a on e.ref= a.ref";
		$sql="SElECT * From eventt";
		$db = config::getConnexion();
		try{
			$liste=$db->query($sql);
			return $liste;
			}
        catch (Exception $e){
            die('Erreur: '. $e->getMessage());
        					}	
	}
		function ajouterevents($eventt){
		$sql="insert into eventt (nom,dated,datef) values (:nom,:dated,:datef)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
		$Nom = $eventt->getNom();
		//$Num=$eventt->getNum();
		$Dated = $eventt->getDated();
		$Datef = $eventt->getDatef();
		$req->bindValue(':nom', $Nom);
		//$req->bindValue(':num',$Num);
		$req->bindValue(':dated', $Dated);
		$req->bindValue(':datef', $Datef);
		
			$req->execute();
			echo "Evenement Ajoute";
           
        }
        catch (Exception $e){
			echo 'Erreur: '.$e->getMessage();
			echo "Evenement non Ajoute";
        }
		
	}

	function modifierevent($eventt,$num){
		$sql="UPDATE eventt SET nom=:nom, num=:num,dated=:dated,datef=:datef  WHERE num=:num";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	try{		
	$req = $db->prepare($sql);
	$nom = $eventt->getNom();
	//$numm=$eventt->getNum();
	$dated = $eventt->getDated();
	$datef = $eventt->getDatef();
	$datas = array(':nom' => $nom, ':num' => $num, ':dated' => $dated,':datef' => $datef);
	$req->bindValue(':nom', $nom);
	$req->bindValue(':num', $num);
	$req->bindValue(':dated', $dated);
	$req->bindValue(':datef', $datef);
		
		
            $s=$req->execute();
			echo "update sucess";
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   			echo " Les datas : " ;
  			print_r($datas);
        }
		
	}
	function supprimerevent($num){
		$sql="DELETE FROM eventt where num= :num";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':num',$num);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function recupererevent($num){
		$sql="SELECT * from eventt where num=$num";
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