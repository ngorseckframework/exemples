<?php
use Doctrine\ORM\Annotation as ORM;

/**
 * @Entity @Table(name="ville")
 **/
class Ville
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $nom;
    /** @Column(type="decimal") **/
    private $latitude;
    /** @Column(type="decimal") **/
    private $longitude;
    /**
     * Many formation have one lieu. This is the owning side.
     * @ManyToOne(targetEntity="Pays", inversedBy="villes")
     * @JoinColumn(name="pays_id", referencedColumnName="id")
     */
    private $pays;
    
    public function __construct()
    {

    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function getPays()
    {
        return $this->pays;
    }
    public function setPays($pays)
    {
        $this->pays = $pays;
    }
}

?>
