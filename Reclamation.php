<?PHP
class Reclamation{

    private $NOW_R;
    private $ID_R;
	private $OBJET_R;
	private $DETAILS_R;
	private $ETAT;
    private $USER_ID;


	function __construct($NOW_R,$OBJET_R, $DETAILS_R, $ETAT,$USER_ID){

        $this->NOW_R=$NOW_R;
	    $this->OBJET_R=$OBJET_R;
		$this->DETAILS_R=$DETAILS_R;
		$this->ETAT=$ETAT;
		$this->USER_ID=$USER_ID;


	}


    public function getNOW_R()
    {
        return $this->NOW_R;
    }


    public function setNOW_R($NOW_R)
    {
        $this->NOW_R = $NOW_R;
    }

	
	public function getUSER_ID(){
		return $this->USER_ID;
	}
	public function getID_R(){
		return $this->ID_R;
	}
	public function getOBJET_R(){
		return $this->OBJET_R;
	}
	public function getDETAILS_R(){
		return $this->DETAILS_R;
	}
	public function getETAT(){
		return $this->ETAT;
	}

	public function setUSER_ID($USER_ID){
		$this->USER_ID=$USER_ID;
	}
	public function setID_R($ID_R){
		$this->ID_R=$ID_R;
	}
	public function setOBJET_R($OBJET_R){
		$this->OBJET_R=$OBJET_R;
	}
	public function setDETAILS_R($DETAILS_R){
		$this->DETAILS_R=$DETAILS_R;
	}
    public function setETAT($ETAT){
        $this->ETAT=$ETAT;
    }
	
}

?>