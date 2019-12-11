<?PHP  
class promotion
{
	private $nom;
	private $num;
	private $prix;
	private $prixf;
	private $qte;
	private $cat;
	private $desc;
    private $marque;
    private $photop;


    /**
     * Produitint constructor.
     * @param $nom
     * @param $num
     * @param $prix
     * @param $prixf
     * @param $qte
     * @param $cat
     * @param $desc
     * @param $marque
     * @param $photop
     */
    public function __construct($nom/*, $num*/, $prix, $prixf, $qte, $desc, $cat, $marque, $photop)
    {
        $this->nom = $nom;
        //$this->num = $num;
		$this->prix = $prix;
		$this->prixf=$prixf;
        $this->qte = $qte;
        $this->cat = $cat;
        $this->desc = $desc;
        $this->marque=$marque;
        $this->photop=$photop;
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
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }


    public function getPrixf()
    {
        return $this->prixf;
    }

    /**
     * @param mixed $prixf
     */
    public function setPrixf($prixf)
    {
        $this->prixf = $prixf;
    }

    /**
     * @return mixed
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * @param mixed $qte
     */
    public function setQte($qte)
    {
        $this->qte = $qte;
    }

    /**
     * @return mixed
     */
    public function getCat()
    {
        return $this->cat;
    }

    /**
     * @param mixed $cat
     */
    public function setCat($cat)
    {
        $this->cat = $cat;
    }

    /**
     * @return mixed
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param mixed $desc
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }
 public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @param mixed $marque
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }


    public function getPhotop()
    {
        return $this->photop;
    }

    /**
     * @param mixed $photop
     */
    public function setPhotop($photop)
    {
        $this->photop = $photop;
    }


    

	
}



?>