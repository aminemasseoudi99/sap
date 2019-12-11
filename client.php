<?php

class client
{
  private $id_client;
  private $nom;
  private $email;
  private $pwd;
  private $adresse;

  function __construct($nom,$email,$pwd,$adresse)
  {
       
    $this->nom = $nom;
    $this->email = $email;
    $this->pwd = $pwd;
    $this->adresse = $adresse;
  }
  

  function getid_clent (){ return $this->id_client;}	
  function getnom (){return $this->nom;}
  function getemail (){ return $this->email;}  
  function getpwd (){return $this->pwd;}
  function getadresse (){ return $this->adresse;}
	
	


}
?>