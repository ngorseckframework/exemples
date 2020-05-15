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

class PaysRepository extends Model
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
        return $this->db->getRepository("Pays")->findAll();
    }
    public function get($id)
    {
        return $this->db->getRepository("Pays")->find(array("id"=>$id));
    }
    public function insert($pays)
    {
        $this->db->persist($pays);
        $this->db->flush();
    }
    public function update($pays)
    {
        //Le pays de la base de donnees
        $p = $this->get($pays->getId());
        /*Modification des donnees de ce pays avec les infos
        du pays passe en parametre cad $pays*/
        $p->setNom($pays->getNom());
        $p->setLatitude($pays->getLatitude());
        $p->setLongitude($pays->getLongitude());

        $this->db->flush();
    }

    public function delete($id)
    {
        $p = $this->get($id);

        $this->db->remove($p);
        $this->db->flush();
    }
}
