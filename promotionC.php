<?PHP
include "../config.php";
class promotionC {

	
function afficherpromotions ($promotion){
	echo "Nom: " . $promotion->getNom() . "<br>";
	echo "Num: " . $promotion->getNum() . "<br>";
	echo "Prix: " . $promotion->getPrix() . "<br>";
	echo "Prixf: " . $promotion->getPrixf() . "<br>";
	echo "Quantite: " . $promotion->getQte() . "<br>";
	echo "Description: " . $promotion->getQte() . "<br>";
	echo "Catégorie: " . $promotion->getCat() . "<br>";
	echo "Marque: " . $promotion->getMarque() . "<br>";
	echo "Photop: " . $promotion->getPhotop() . "<br>";
	}
function afficherpromotion(){
		//$sql="SElECT * From promotion e inner join formationphp.promotion a on e.ref= a.ref";
		$sql="SElECT * From promotion ORDER By cat";
		$db = config::getConnexion();
		try{
			$liste=$db->query($sql);
			return $liste;
			}
        catch (Exception $e){
            die('Erreur: '. $e->getMessage());
        					}	
	}
		function ajouterpromotions($promotion){
		$sql="insert into promotion (nom,prix,prixf,qte,descr,cat,marque,photop) values (:nom,:prix,:prixf,:qte,:descr,:cat,:marque,:photop)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
		$Nom = $promotion->getNom();
		//$Num=$promotion->getNum();
		$Prix = $promotion->getPrix();
		$Prixf = $promotion->getPrixf();
		$Qte = $promotion->getQte();
		$Desc = $promotion->getDesc();
		$Cat = $promotion->getCat();
		$Marque=$promotion->getMarque();
		$Photop=$promotion->getPhotop();
		$req->bindValue(':nom', $Nom);
		//$req->bindValue(':num',$Num);
		$req->bindValue(':prix', $Prix);
		$req->bindValue(':prixf', $Prixf);
		$req->bindValue(':qte', $Qte);
		$req->bindValue(':descr', $Desc);
		$req->bindValue(':cat', $Cat);
		$req->bindValue(':marque', $Marque);
		$req->bindValue(':photop', $Photop);
		
			$req->execute();
			echo "Promotion Ajoute";
           
        }
        catch (Exception $e){
			echo 'Erreur: '.$e->getMessage();
			echo "Promotion non Ajoute";
        }
		
	}

	function modifierpromotion($promotion,$num){
		$sql="UPDATE promotion SET nom=:nom, num=:num,prix=:prix,prixf=:prixf,qte=:qte,descr=:descr,cat=:cat,marque=:marque,photop:=photop  WHERE num=:num";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	try{		
	$req = $db->prepare($sql);
	$nom = $promotion->getNom();
	//$numm=$promotionint->getNum();
	$prix = $promotion->getPrix();
	$prixf = $promotion->getPrixf();
	$qte = $promotion->getQte();
	$descr = $promotion->getDesc();
	$cat = $promotion->getCat();
	$marque = $promotion->getMarque();
	$photop = $promotion->getPhotop();
	$datas = array(':nom' => $nom, ':num' => $num, ':prix' => $prix,':prixf' => $prixf,  ':qte' => $qte, ':descr' => $descr, ':cat' => $cat, ':marque' => $marque, ':photop' => $photop);
	$req->bindValue(':nom', $nom);
	$req->bindValue(':num', $num);
	$req->bindValue(':prix', $prix);
	$req->bindValue(':prixf', $prixf);
	$req->bindValue(':qte', $qte);
	$req->bindValue(':descr', $descr);
	$req->bindValue(':cat', $cat);
	$req->bindValue(':marque', $marque);
	$req->bindValue(':photop', $photop);
		
		
            $s=$req->execute();
			echo "update sucess";
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   			echo " Les datas : " ;
  			print_r($datas);
        }
		
	}
	function supprimerpromotion($num){
		$sql="DELETE FROM promotion where num= :num";
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

	function recupererpromotion($num){
		$sql="SELECT * from promotion where num=$num";
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