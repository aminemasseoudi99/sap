<?php

class admin
{
	private $login;
	private $password;
	
	function __construct($login,$password)
	{
		$this->login=$login;
		$this->password=$password;
		
	}
	
        function getLogin()
	{return $this->login;}
	
        public function getPassword()
	{return $this->password;}
		
	function setLogin($login)
	{return $this->login=$login;}
	
        public function setPassword($password)
	{return $this->password=$password;}
	

	
}
?>