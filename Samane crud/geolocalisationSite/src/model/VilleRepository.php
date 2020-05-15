<?php
/*==================================================
MODELE MVC DEVELOPPE PAR Ngor SECK
samane@samanemvc.sn
(+221) 77 - 433 - 97 - 16
PERFECTIONNEZ CE MODELE ET FAITES MOI UN RETOUR
POUR TOUTE MODIFICATION VISANT A L'AMELIORER.
VOUS ETES LIBRE DE TOUTE UTILISATION.
===================================================*/
namespace src\model;

use libs\system\Model;

class VilleRepository extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
	 * Methods with DQL (Doctrine Query Language) 
	 */
    public function getAll()
    {
        return $this->db->getRepository("Ville")->findAll();
    }
    public function get($id)
    {
        return $this->db->getRepository("Ville")->find(array("id"=>$id));
    }
    /**
     * A noter que cette fonction est une obligation pour la gestion de la
     * cle etrangere
     */
    public function getPays($id)
    {
        return $this->db->getRepository("Pays")->find(array("id"=>$id));
    }
    public function insert($ville)
    {
        $this->db->persist($ville);
        $this->db->flush();
    }
    public function update($ville)
    {
        //La vill de la base de donnees
        $v = $this->get($ville->getId());
        /*Modification des donnees de ce ville avec les infos
        du ville passe en parametre cad $ville*/
        $v->setNom($ville->getNom());
        $v->setLatitude($ville->getLatitude());
        $v->setLongitude($ville->getLongitude());
        $v->setPays($ville->getPays());

        $this->db->flush();
    }

    public function delete($id)
    {
        $p = $this->get($id);

        $this->db->remove($p);
        $this->db->flush();
    }
}
