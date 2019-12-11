<?PHP
include_once "../config.php";
class DemandeC
{

    function afficherDemande()
    {
        $sql = "SELECT * FROM demande ORDER BY DATE_DEMANDE ASC";
        $db = config::getConnexion();
        $list = $db->query($sql);
        return $list;
    }


    function ajouterDemande($Demande)
    {
        $sql = "INSERT INTO demande (DATE_DEMANDE,NOM_D,NUM_D,OBJET_D,DETAILS_D,ETAT_D,user_id) VALUES (:DATEtime,:NOM_D,:NUM_D,:OBJET_D,:DETAILS_D,:ETAT_D,:user_id)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            //$ID_D=$Demande->getID_D();
            $Date = $Demande->getDATE_DEMANDE();
            $NOM_D = $Demande->getNOM_D();
            $NUM_D = $Demande->getNUM_D();
            $OBJET_D = $Demande->getOBJET_D();
            $DETAILS_D = $Demande->getDETAILS_D();
            $etat = $Demande->getETAT_D();
            $user = $Demande->getUserId();
            //$req->bindValue(':ID_D',$ID_D);
            $req->bindValue(':DATEtime', $Date);
            $req->bindValue(':NOM_D', $NOM_D);
            $req->bindValue(':NUM_D', $NUM_D);
            $req->bindValue(':OBJET_D', $OBJET_D);
            $req->bindValue(':DETAILS_D', $DETAILS_D);
            $req->bindValue(':ETAT_D', $etat);
            $req->bindValue('user_id', $user);
            $req->execute();

        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }

    }

    function afficherDemandes()
    {
        //$sql="SElECT * From demande d inner join utilisateur u on d.USER_ID= u.USER_ID";
        $sql = "SElECT d.ID_D,d.DATE_DEMANDE,d.NOM_D,d.NUM_D,d.OBJET_D,d.DETAILS_D,d.ETAT_D,u.nom,u.prenom FROM demande d INNER JOIN  membres u ON u.cin=d.user_id ORDER BY DATE_DEMANDE DESC";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    function supprimerDemande($ID_D)
    {
        //$date= date_create()->format('Y-m-d');

        //$d ="SELECT DATE_DEMANDE FROM demande WHERE ID_D = :ID_D ";
        //$bd = config::getConnexion();

            $sql = "DELETE FROM demande where ID_D= :ID_D";
            $db = config::getConnexion();
            $req = $db->prepare($sql);

            $req->bindValue(':ID_D', $ID_D);
            try {
                $req->execute();
                // header('Location: ../views/Demande.php');

            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }

           // echo "<script type=\"text/javascript\">window.alert('Vous ne pouvez plus supprimer.')</script>";

    }

    function traiterD($ID_D)
    {
        $sql = "UPDATE demande SET ETAT_D= 'Traitee' where ID_D= :ID_D";
        $db = config::getConnexion();
        $req = $db->prepare($sql);

        $req->bindValue(':ID_D', $ID_D);
        try {
            $req->execute();
            // header('Location: ../views/Demande.php');

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererDemande($ID_D)
    {
        $sql = "SELECT * from demande where ID_D=$ID_D";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierDemande($Demande,$ID_D)
    {
        $sql = "UPDATE demande SET  NOM_D=:nom, NUM_D=:num , OBJET_D=:objet,DETAILS_D =:details WHERE demande ID_D=:ID_D";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $ID_D=$Demande->getID_D();
        $nom = $Demande->getNOM_D();
        $num = $Demande->getNUM_D();
        $objet = $Demande->getOBJET_D();
        $details = $Demande->getDETAILS_D();

        $req->bindValue(":ID_D",$ID_D);
        $req->bindValue(':nom', $nom);
        $req->bindValue(':num', $num);
        $req->bindValue(':objet', $objet);
        $req->bindValue(':details', $details);

        $req->execute();

    }
 function RechercheDemande($haja){

   $sql="SELECT d.ID_D,d.DATE_DEMANDE,d.NOM_D,d.NUM_D,d.OBJET_D,d.DETAILS_D,d.ETAT_D FROM demande d  WHERE d.DATE_DEMANDE LIKE '%$haja%' or d.NUM_D like '%$haja%' or d.ETAT_D like '%$haja%' or d.OBJET_D like '%$haja%' or d.NOM_D like '%$haja%'   ";


    $db = config::getConnexion();
    	try{
    	$liste=$db->query($sql);
    	return $liste;

    	}
    			 catch (Exception $e){
    				 die('Erreur: '.$e->getMessage());
    		 }
    }

    function NBRPART(){

      $sql="SELECT COUNT(ID_D) nbr FROM demande WHERE OBJET_D='partenariat' ";


      $db = config::getConnexion();
      try{
      $liste=$db->query($sql);
      return $liste;

      }
           catch (Exception $e){
               die('Erreur: '.$e->getMessage());
           }
    }

    function NBRSPON(){

      $sql="SELECT COUNT(ID_D) nbr FROM demande WHERE OBJET_D='sponsoring' ";


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
