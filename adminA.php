<?php
require "../config.php";
include "../entities/admin.php";
class admina
{

  function ajouter($admin)
  {

      $sql ="insert into admin (login,password) values (:login,:password)" ;
      $db = config::getConnexion();
      $req = $db->prepare($sql);
     
      $login =$admin->getLogin();
      $password =$admin->getPassword();
      
     
      $req->bindValue(':login',$login);
      $req->bindValue(':password',$password);
      

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
  function supprimeradmin($login1){
  $sql="DELETE FROM admin where login=:login1";
  $db = config::getConnexion();
      $req=$db->prepare($sql);
  $req->bindValue('login1',$login1);
  try{
          $req->execute();
          header('Location: data-table.php');
      }
      catch (Exception $e){
          die('Erreur: '.$e->getMessage());
      }
  }
  function afficher()
  {
    $sql ="select * from admin" ;
    $db = config::getConnexion();
    try {
          $tab = $db->query($sql);
          return $tab;

    } catch (Exception $e) {
       echo '3andek 8alta :'.$e->getMessage();
    }


  }
  

}

 ?>