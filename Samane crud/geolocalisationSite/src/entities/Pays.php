<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity 
 * @Table(name="pays")
 **/
class Pays
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $nom;
    /** @Column(type="decimal") **/
    private $longitude;
    /** @Column(type="decimal") **/
    private $latitude;
     /**
     * One lieu has many formations. This is the inverse side.
     * @OneToMany(targetEntity="Ville", mappedBy="pays")
     */
    private $villes;
    
    public function __construct()
    {
        $this->villes = new ArrayCollection();
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

    public function getLongitude()
    {
        return $this->longitude;
    }
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }
    
    public function getVilles()
    {
        return $this->villes;
    }
    public function setVilles($villes)
    {
        $this->villes = $villes;
    }
}

?>
