<?php
require "../config.php";
include "../entities/client.php";
class clientc
{

  function ajouter($client)
  {

      $sql ="insert into client (nom,pwd,email,adresse) values (:nom,:pwd,:email,:adresse)" ;
      $db = config::getConnexion();
      $req = $db->prepare($sql);
      $email = $client->getemail();
      $nom =$client->getnom();
      $pwd =$client->getpwd();
      $adresse =$client->getadresse();
      $req->bindValue(':email',$email);
      $req->bindValue(':nom',$nom);
      $req->bindValue(':pwd',$pwd);
      $req->bindValue(':adresse',$adresse);

try {
      $req->execute();
      return true;
    }
    catch (Exception $e)
    {
      echo '3andek 8alta :'.$e->getMessage() ;
      return false ;
    }
  }
  function supprimerclient($id){
  $sql="DELETE FROM client where id_client=:id";
  $db = config::getConnexion();
      $req=$db->prepare($sql);
  $req->bindValue(':id',$id);
  try{
          $req->execute();
          
      }
      catch (Exception $e){
          die('Erreur: '.$e->getMessage());
      }
  }
  function afficher()
  {
    $sql ="select * from client" ;
    $db = config::getConnexion();
    try {
          $tab = $db->query($sql);
          return $tab;

    } catch (Exception $e) {
       echo '3andek 8alta :'.$e->getMessage();
    }


  }
  
  
  
  public  function rechercher($n)
  {
   
    
    $sql="SELECT * FROM `client` WHERE id_client like '%".$n."%' or email like '%".$n."%' or nom like '%".$n."%' ";
          $connexion=config::getConnexion();
          $rep=$connexion->query($sql);
        
        $rep->execute();
            return $rep;

  }

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function modifierclient($client,$id,$pwda){
		$sql="UPDATE client SET email=:email,nom=:nom,pwd=:pwd,adresse=:adresse  WHERE id_client=:id";

		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{
        $req=$db->prepare($sql);
		    $email=$client->getemail();
        $nom=$client->getnom();
       
        $pwd1=$client->getpwd();
      
       if($pwd1 != ''){
          $pwd=$client->getpwd();
       }
       else 
        $pwd=$pwda;
        
        
      $adresse=$client->getadresse();

	  	$req->bindValue(':id',$id);
		  $req->bindValue(':email',$email);
      $req->bindValue(':nom',$nom);
      
      $req->bindValue(':pwd',$pwd);
      
		
		  $req->bindValue(':adresse',$adresse);


            $s=$req->execute();

           // header('Location: myAccount.html');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();

        }

	}

}

 ?>