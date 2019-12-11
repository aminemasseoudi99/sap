<?PHP  
class eventt
{
	private $nom;
	private $num;
	private $dated;
	private $datef;



    /**
     * Produitint constructor.
     * @param $nom
     * @param $num
     * @param $dated
     * @param $datef
     */
    public function __construct($nom/*, $num*/, $dated, $datef)
    {
        $this->nom = $nom;
        //$this->num = $num;
		$this->dated = $dated;
		$this->datef=$datef;    
    }


    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
  /* public function getNum()
    {
        return $this->num;
    }

    /**
     * @param mixed $num
     */
    /*public function setNum($num)
    {
        $this->num = $num;
    }

    /**
     * @return mixed
     */
    public function getDated()
    {
        return $this->dated;
    }

    /**
     * @param mixed $dated
     */
    public function setDated($dated)
    {
        $this->dated = $dated;
    }


    public function getDatef()
    {
        return $this->datef;
    }

    /**
     * @param mixed $datef
     */
    public function setDatef($datef)
    {
        $this->datef = $datef;
    }

	
}



?>