<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 **/
class Professeur extends User
{
    /** @Column(type="string") **/
    private $matiere;
   
    public function __construct()
    {
        
    }
    
    public function getMatiere()
    {
        return $this->matiere;
    }
    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;
    }
}

?>