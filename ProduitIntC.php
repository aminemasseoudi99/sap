<?PHP
include_once "../config.php";
class ProduitIntC
{
    function detailsproduit($Produit)
    {
        echo "Nom: " . $Produit->getNom() . "<br>";
        echo "Num: " . $Produit->getNum() . "<br>";
        echo "Prix: " . $Produit->getPrix() . "<br>";
        echo "Quantite: " . $Produit->getQte() . "<br>";
        echo "Description: " . $Produit->getQte() . "<br>";
        echo "Catégorie: " . $Produit->getCat() . "<br>";
         echo "Marque: " . $Produit->getMarque() . "<br>";

    }

    function ajouterProd($Produit)
    {
        $sql = "insert into produits (nom,prix,qte,descr,cat,marque) values (:nom,:prix,:qte,:descr,:cat,:marque)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $Nom = $Produit->getNom();
            //$Num=$Produit->getNum();
            $Prix = $Produit->getPrix();
            $Qte = $Produit->getQte();
            $Desc = $Produit->getDesc();
            $Cat = $Produit->getCat();
            $Marque=$Produit->getMarque();
            $req->bindValue(':nom', $Nom);
            //$req->bindValue(':num',$Num);
            $req->bindValue(':prix', $Prix);
            $req->bindValue(':qte', $Qte);
            $req->bindValue(':descr', $Desc);
            $req->bindValue(':cat', $Cat);
            $req->bindValue(':marque', $Marque);
            $req->execute();
            echo "Produit Ajoute";

        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
            echo "Produit non Ajoute";
        }

    }

    function afficherProduits()
    {
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        $sql = "SElECT * From produits ORDER By cat";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function supprimerProduit($num)
    {
        $sql = "DELETE FROM produits where num= :num";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':num', $num);
        try {
            $req->execute();
            // header('Location: index.php');
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function rechercherProduit($nom)
    {
        $sql = "SELECT * FROM produits WHERE nom LIKE '%$nom%' OR prix LIKE '%$nom%' OR qte LIKE '%$nom%' OR descr LIKE '%$nom%' OR cat LIKE '%$nom%'";
        $db = config::getConnexion();
        try {
            return $db->query($sql);

            // header('Location: index.php');
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }

    function modifier_produit($produitint, $num)
    {
       $sql = "UPDATE produits SET nom=:nom, num=:num,prix=:prix,qte=:qte,descr=:descr,cat=:cat,marque=:marque WHERE num=:num";

        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try {
            $req = $db->prepare($sql);
            $nom = $produitint->getNom();
            //$numm=$produitint->getNum();
            $prix = $produitint->getPrix();
            $qte = $produitint->getQte();
            $descr = $produitint->getDesc();
            $cat = $produitint->getCat();
            $marque = $produitint->getMarque();
            $datas = array(':nom' => $nom, ':num' => $num, ':prix' => $prix, ':qte' => $qte, ':descr' => $descr, ':cat' => $cat, ':marque' => $marque);
            $req->bindValue(':nom', $nom);
            $req->bindValue(':num', $num);
            $req->bindValue(':prix', $prix);
            $req->bindValue(':qte', $qte);
            $req->bindValue(':descr', $descr);
            $req->bindValue(':cat', $cat);
            $req->bindValue(':marque', $marque);

            $s = $req->execute();
            echo "update sucess";
            // header('Location: index.php');
        } catch (Exception $e) {
            echo " Erreur ! " . $e->getMessage();
            echo " Les datas : ";
            print_r($datas);
        }
}

    function recupererProduit($num)
    {
        $sql = "SELECT * from produits where num=$num";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function MaxStock()
    {
        $sql = "SELECT * FROM produits WHERE qte=(SELECT max(qte) FROM produits)";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->execute();
        $liste = $req->fetchAll(PDO::FETCH_OBJ);
        return $liste;

    }

    function MinStock()
    {
        $sql = "SELECT * FROM produits WHERE qte=(SELECT min(qte) FROM produits where qte!=0) ";
        //$sql="SELECT * FROM produits WHERE qte<5000 AND qte IS NOT NULL ";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->execute();
        $liste = $req->fetchAll(PDO::FETCH_OBJ);
        return $liste;
    }
    function NbrProd()
    {
        $sql = "SELECT COUNT(*) FROM produits";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->execute();
        $liste = $req->fetch();
        return $liste;
    }
   /* function Nbrclients()
    {
        $sql = "SELECT COUNT(*) FROM membres";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->execute();
        $liste = $req->fetch();
        return $liste;
    }*/

    function RuptureStock()
    {
        $sql = "SELECT COUNT(num)FROM produits where qte=0";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->execute();
        //$liste=$req->fetchAll(PDO::FETCH_OBJ);
        //var_dump($liste3);
        //$max->fetchAll(PDO::FETCH_OBJ);
        $rup = $req->fetch(PDO::FETCH_NUM);
        return (int)$rup[0];
    }

    function SousStock()
    {
        $sql = "SELECT COUNT(num)FROM produits where qte<=500";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->execute();
        //$liste=$req->fetchAll(PDO::FETCH_OBJ);
//var_dump($liste4);
        $ss = $req->fetch(PDO::FETCH_NUM);
        return (int)$ss[0];
    }

    function EstimationTotVente()
    {
        $sql = "SELECT SUM(qte*prix) FROM produits";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->execute();
//$tot=$req->fetchAll(PDO::FETCH_NUM);
        $tot = $req->fetch(PDO::FETCH_NUM);
        //var_dump((int)$tot[0]);
        return (int)$tot[0];
    }

    function Plus_cher()
    {
        $sql = "SELECT * FROM produits WHERE prix=(SELECT max(prix) FROM produits)";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->execute();
        $liste = $req->fetchAll(PDO::FETCH_OBJ);
        return $liste;
    }
    function recherche_frontobj($nom)
    {
        $sql=$sql = "SELECT * FROM produits WHERE nom LIKE '%$nom%' OR prix LIKE '%$nom%' OR qte LIKE '%$nom%' OR descr LIKE '%$nom%' OR cat LIKE '%$nom%'";
        $db = config::getConnexion();
        $liste1=$db->query($sql);
        $liste=($liste1->fetchAll(PDO::FETCH_OBJ));
        return $liste;
    }

}
    ?>
