<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 **/
class Etudiant extends User
{
    /** @Column(type="string") **/
    private $classe;
   
    
    public function __construct()
    {
        
    }
   
    public function getClasse()
    {
        return $this->classe;
    }
    public function setClasse($classe)
    {
        $this->classe = $classe;
    }
}

?>