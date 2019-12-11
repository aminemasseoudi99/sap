<?PHP
class Rdv{
    private $ID_RDV;
    private $NOW_RDV;
    private $DATE_RDV;
    private $OBJET_RDV;
    private $ETAT_RDV;
    private $USER_ID;


    function __construct($NOW_RDV,$DATE_RDV, $OBJET_RDV, $ETAT_RDV,$USER_ID){

        $this->NOW_RDV=$NOW_RDV;
        $this->DATE_RDV=$DATE_RDV;
        $this->OBJET_RDV=$OBJET_RDV;
        $this->ETAT_RDV=$ETAT_RDV;
        $this->USER_ID=$USER_ID;

    }


    public function getNOW_RDV()
    {
        return $this->NOW_RDV;
    }

    public function setNOW_RDV($NOW_RDV)
    {
        $this->NOW_RDV = $NOW_RDV;
    }

    public function getUSER_ID(){
        return $this->USER_ID;
    }
    public function getID_RDV(){
        return $this->ID_RDV;
    }
    public function getOBJET_RDV(){
        return $this->OBJET_RDV;
    }
    public function getDATE_RDV(){
        return $this->DATE_RDV;
    }
    public function getETAT_RDV(){
        return $this->ETAT_RDV;
    }

    public function setUSER_ID($USER_ID){
        $this->USER_ID=$USER_ID;
    }
    public function setID_RDV($ID_RDV){
        $this->ID_RDV=$ID_RDV;
    }
    public function setOBJET_RDV($OBJET_RDV){
        $this->OBJET_RDV=$OBJET_RDV;
    }
    public function setDATE_RDV($DATE_RDV){
        $this->DATE_RDV=$DATE_RDV;
    }
    public function setETAT_RDV($ETAT_RDV){
        $this->ETAT_RDV=$ETAT_RDV;
    }

}

?>