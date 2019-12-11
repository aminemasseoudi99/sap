<?PHP  
class Produitint
{
	private $nom;
	private $num;
	private $prix;
	private $qte;
	private $cat;
	private $desc;
    private $marque;

    /**
     * Produitint constructor.
     * @param $nom
     * @param $num
     * @param $prix
     * @param $qte
     * @param $cat
     * @param $desc
     * @param $marque
     */
    public function __construct($nom/*, $num*/, $prix, $qte, $desc, $cat, $marque)
    {
        $this->nom = $nom;
        //$this->num = $num;
        $this->prix = $prix;
        $this->qte = $qte;
        $this->cat = $cat;
        $this->desc = $desc;
        $this->marque=$marque;
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
     * @param mixed $nom
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

	
}



?>