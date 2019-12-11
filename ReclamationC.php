<?PHP
include_once "../config.php";
class ReclamationC {

    function afficherReclamation ()
    {
        $sql="SELECT * FROM reclamation ORDER BY NOW_R ASC";
        $db=config::getConnexion();
        $list=$db->query($sql);
        return $list;
    }


    function ajouterReclamation($Reclamation)
    {
        $sql="INSERT INTO reclamation (NOW_R,OBJET_R,DETAILS_R,ETAT,USER_ID) VALUES ( :NOW_R,:OBJET_R,:DETAILS_R,:ETAT, :USER_ID)";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);

            $OBJET_R=$Reclamation->getOBJET_R();
            $DETAILS_R=$Reclamation->getDETAILS_R();
            $ETAT=$Reclamation->getETAT();
            $USER_ID=$Reclamation->getUSER_ID();
            $NOW_R=$Reclamation->getNOW_R();

            $req->bindValue(':OBJET_R',$OBJET_R);
            $req->bindValue(':DETAILS_R',$DETAILS_R);
            $req->bindValue(':ETAT',$ETAT);
            $req->bindValue('USER_ID',$USER_ID);
            $req->bindValue('NOW_R',$NOW_R);
            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }

    function afficherReclamations()
    {
        //$sql="SElECT * From rdv s inner join utilisateur u on s.USER_ID= u.USER_ID";
        $sql="SElECT d.ID_R,d.OBJET_R,d.DETAILS_R,d.ETAT,d.NOW_R,u.nom,u.prenom FROM reclamation d INNER JOIN membres u ON u.cin=d.USER_ID  ORDER BY NOW_R DESC";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }



    function supprimerReclamation($ID_R){

        $sql="DELETE FROM reclamation where ID_R= :ID_R";
        $db = config::getConnexion();
        $req=$db->prepare($sql);

        $req->bindValue(':ID_R',$ID_R);
        try{
            $req->execute();
            // header('Location: ../views/Contact.php');

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function traiterR($ID_R)
    {
        $sql = "UPDATE reclamation SET ETAT = 'Traitee' where ID_R = :ID_R";
        $db = config::getConnexion();
        $req = $db->prepare($sql);

        $req->bindValue(':ID_R', $ID_R);
        try {
            $req->execute();
            // header('Location: ../views/Demande.php');

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererReclamation($ID_R){
        $sql="SELECT * from reclamation where ID_R=$ID_R";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }




function modifierReclamation($Reclamation,$ID_R)
{
    $sql = "UPDATE `reclamation` SET `OBJET_R`= OBJET_R,`DETAILS_R`= DETAILS_R, `NOW_R`=NOW_R  WHERE  `reclamation`.`ID_R` = ID_R";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $ID_R=$Reclamation->getID_R();
    $DETAILS_R = $Reclamation->getDETAILS_R();
    $OBJET_R = $Reclamation->getOBJET_R();
    $NOW_R = $Reclamation->getNOW_R();

    $req->bindValue(":ID_R",$ID_R);
    $req->bindValue(':DETAILS_R', $DETAILS_R);
    $req->bindValue(':OBJET_R', $OBJET_R);
    $req->bindValue(':NOW_R', $NOW_R);

    $req->execute();

}

function RechercheReclamationC($haja){

  $sql="SELECT d.ID_R,d.OBJET_R,d.DETAILS_R,d.ETAT,d.NOW_R FROM reclamation d WHERE d.ETAT LIKE '%$haja%' or d.OBJET_R LIKE '%$haja%' or d.NOW_R  LIKE '%$haja%'";


  $db = config::getConnexion();
  try{
  $liste=$db->query($sql);
  return $liste;

  }
       catch (Exception $e){
           die('Erreur: '.$e->getMessage());
       }
}

function NBRLivraisonNonRecu(){

  $sql="SELECT COUNT(ID_R) nbr FROM reclamation WHERE OBJET_R='Livraison non reçu' ";


  $db = config::getConnexion();
  try{
  $liste=$db->query($sql);
  return $liste;

  }
       catch (Exception $e){
           die('Erreur: '.$e->getMessage());
       }
}

function NBRLivraison_non_coforme(){

  $sql="SELECT COUNT(ID_R) nbr FROM reclamation WHERE OBJET_R='Livraison non coforme' ";


  $db = config::getConnexion();
  try{
  $liste=$db->query($sql);
  return $liste;

  }
       catch (Exception $e){
           die('Erreur: '.$e->getMessage());
       }
}
function NBRRetM_sousGrantie(){

  $sql="SELECT COUNT(ID_R) nbr FROM reclamation WHERE OBJET_R='Réparation et maintenance sous garantie' ";


  $db = config::getConnexion();
  try{
  $liste=$db->query($sql);
  return $liste;

  }
       catch (Exception $e){
           die('Erreur: '.$e->getMessage());
       }
}
function NBRAutre(){

  $sql="SELECT COUNT(ID_R) nbr FROM reclamation WHERE OBJET_R='Autre..' ";


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
