<?PHP
class Demande{
	private $ID_D;
	private $DATE_DEMANDE;
	private $NOM_D;
    private $NUM_D;
    private $OBJET_D;
    private $DETAILS_D;
    private $ETAT_D;
    private $user_id;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

	function __construct($DATE_DEMANDE,$NOM_D,$NUM_D,$OBJET_D,$DETAILS_D,$ETAT_D,$user_id){

		$this->DATE_DEMANDE=$DATE_DEMANDE;
		$this->NOM_D=$NOM_D;
        $this->NUM_D=$NUM_D;
        $this->OBJET_D=$OBJET_D;
        $this->DETAILS_D=$DETAILS_D;
        $this->ETAT_D=$ETAT_D;
        $this->user_id=$user_id;
	}
	
	public function getID_D(){
		return $this->ID_D;
	}
	public function getDATE_DEMANDE(){
		return $this->DATE_DEMANDE;
	}
	public function getNOM_D(){
		return $this->NOM_D;
	}

	public function getNUM_D(){
		return $this->NUM_D;
    }
    public function getOBJET_D(){
		return $this->OBJET_D;
    }
    public function getDETAILS_D(){
		return $this->DETAILS_D;
	}
    public function getETAT_D()
    {
        return $this->ETAT_D;
    }
	public function setID_D($ID_D){
		$this->ID_D=$ID_D;
    }
    //date_default_timezone_set('Africa/Tunisia');
    public function setDATE_DEMANDE($DATE_DEMANDE){
		$this->DATE_DEMANDE=$DATE_DEMANDE;
	}
	public function setNOM_D($NOM_D){
		$this->NOM_D=$NOM_D;
	}
	public function setNUM_D($NUM_D){
		$this->NUM_D=$NUM_D;
    }
    public function setOBJET_D($OBJET_D){
		$this->OBJET_D=$OBJET_D;
    }
    public function setDETAILS_D($DETAILS_D){
		$this->DETAILS_D=$DETAILS_D;
	}
    public function setETAT_D($ETAT_D){
        $this->ETAT_D=$ETAT_D;
    }
	
}

?>