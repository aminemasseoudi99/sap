	<?PHP
class Commande{
	private $id_com;
	private $id_panier;
	private $methode;
	private $etat;
	private $id_client;
	private $date_com;
	function __construct($id_panier,$methode,$etat,$id_client,$date_com){
		$this->date_com=$date_com;
		$this->id_client=$id_client;
		$this->id_panier=$id_panier;
		$this->methode=$methode;
		$this->etat=0;
	
	}
	
	function getIdCom(){
		return $this->id_com;
	}function getIdClient(){
		return $this->id_client;
	}function getDateCom(){
		return $this->date_com;
	}
	function getIdPanier(){
		return $this->id_panier;
	}
	function getEtat(){
		return $this->etat;
	}
	function getMethode(){
		return $this->methode;
	}

	function setIdCom($id_com){
		$this->id_com=$id_com;
	}
	function setIdPanier($id_panier){
		$this->id_panier;
	}function setIdClient($id_client){
		$this->id_client=$id_client;
	}
	function setDateCom($date_com){
		$this->date_com;
	}
	function setMethode($methode){
		$this->methode=$methode;
	}
	function setEtat($etat){
		$this->etat=$etat;
	}
	
}

?>